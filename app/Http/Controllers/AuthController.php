<?php

namespace App\Http\Controllers;

use Storage;
use Carbon\Carbon;
use App\Models\News;
use App\Models\User;
use App\Models\Topics;
use App\Models\Progress;
use App\Models\Workshop;
use App\Models\Subtopics;
use App\Models\Attendance;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function tas()
    {
        return view('wub.tas');
    }

    public function loginWub()
    {
        return view('wub.login');
    }

    public function dashboardWub()
    {
        Carbon::setLocale('id');
        $user = Auth::user();
        $news = News::paginate(6);
        $announcements = Announcement::all();
        return view('wub.dashboardWub', compact('user', 'announcements', 'news'));
    }

    public static function getUrlForImage($imagePath)
    {
        if (is_null($imagePath)) {
            return null;
        }
        $imageUrl = Storage::disk('disdagkoperin')->url($imagePath);
        return $imageUrl ?: null;
    }

    public function pelatihan()
    {
        $user = Auth::user();
        $workshops = Workshop::whereDoesntHave('attendances', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->get();
        $attendances = Attendance::where('user_id', $user->id)->with(['workshop.topics.subtopics', 'progress'])->paginate(3);
        return view('wub.pelatihan', compact('user', 'workshops', 'attendances'));
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'nib' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        if (!Auth::attempt($request->only('nib', 'password'))) {
            throw ValidationException::withMessages([
                'nib' => __('auth.failed'),
            ]);
        }
        $request->session()->put('user_id', Auth::id());
        $request->session()->regenerate();

        return redirect()->intended('dashboard');
    }

    public function registerWub()
    {
        return view('wub.register');
    }

    public function postRegister(Request $request)
    {
        $messages = [
            'nib.unique' => 'NIB sudah terdaftar, silahkan coba lagi',
            'email.unique' => 'Email sudah terdaftar, silahkan coba lagi',
        ];

        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|string|max:255',
                'nib' => 'required|string|max:255|unique:users',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|confirmed|min:8',
            ],
            $messages,
        );

        if ($validator->fails()) {
            return redirect()->route('registerWub')->with('error', $validator->messages()->first());
        }

        try {
            $data = $request->all();
            $data['password'] = Hash::make($request->input('password'));
            User::create($data);

            return redirect()->route('registerWub')->with('success', 'Regitrasi sukses, silahkan untuk melakukan login.');
        } catch (\Exception $e) {
            return redirect()->route('registerWub')->with('error', 'Register Gagal!');
        }
    }

    public function enrollCourse($id)
    {
        $user = Auth::user();
        $workshops = Workshop::find($id);
        $topics = $workshops->topics;
        foreach($topics as $topic){
            $subtopics = Subtopics::where('topic_id', $topic->id)->get();
        }
        try {
            $attendance = Attendance::create([
                'user_id' => $user->id,
                'workshop_id' => $id,
            ]);

            if (!$user->is_enrolled) {
                User::where('id', $user->id)->update( [
                    'is_enrolled' => true,
                ]);
            }
            foreach ($subtopics as $subtopic) {
                Progress::create([
                    'attendance_id' => $attendance->id,
                    'subtopic_id' => $subtopic->id,
                    'is_completed' => false,
                ]);
            }
            return redirect()->back()->with('success', 'Selamat, anda berhasil enroll!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Maaf, enroll gagal!');
        }
    }

    public function detailWorkshop($id){
        $user = Auth::user();
        $attendance = Attendance::find($id);
        // $workshop = Workshop::find($attendance->workshop_id);
        $workshop = Workshop::with([
            'topics.subtopics',
            'attendances' => function ($query) {
                $query->where('user_id', auth()->id());
            },
            'attendances.progress'
        ])->find($id);
        return view('wub.detailWorkshop', compact('user', 'workshop', 'attendance'));
    }

    public function downloadFile($id){
        $sub_materi = Subtopics::find($id);
        $path = substr($sub_materi->file, 8);
        return Storage::download($path);
    }

    public function completeSubMateri($id){
        Progress::where('subtopic_id', $id)->update([
            'is_completed' => true
        ]);

        return redirect()->back();
    }

    public function absensi(){
        return view('wub.absensi');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
