<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Carbon\Carbon;
use Validator;
use App\Models\News;
use App\Models\Admin;
use App\Models\Topics;
use App\Models\Workshop;
use App\Models\Subtopics;
use App\Models\Attendance;
use App\Models\Announcement;
use Illuminate\Http\Request;
use GuzzleHttp\Psr7\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->put('user_id', Auth::id());
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }

        return redirect()
            ->back()
            ->withErrors(['email' => 'Invalid credentials']);
    }

    public function dashboard()
    {
        $announcementCount = Announcement::count();
        $newsCount = News::count();

        return view('admin.dashboard', compact('announcementCount', 'newsCount'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }

    public function createAnnouncement()
    {
        return view('admin.createAnnouncement');
    }

    public function listAnnouncements()
    {
        $announcements = Announcement::paginate(10);
        return view('admin.listAnnouncements', compact('announcements'));
    }

    public function editAnnouncement($id)
    {
        $announcement = Announcement::findOrFail($id);
        return view('admin.editAnnouncement', compact('announcement'));
    }

    public function storeAnnouncement(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'nullable|image',
        ]);

        $path = null;
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $file = $request->file('image');
            $path = $file->store('images');
        }

        Announcement::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $path ? '/storage/' . $path : null,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Announcement created successfully!');
    }

    public function updateAnnouncement(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'nullable|image',
        ]);

        $announcement = Announcement::findOrFail($id);
        $path = $announcement->image;
        $image = substr($path, 8);
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $file = $request->file('image');
            Storage::delete($image);
            $path = $file->store('images');
        }

        $announcement->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $path ? '/storage/' . $path : $announcement->image,
        ]);

        return redirect()->route('admin.listAnnouncements')->with('success', 'Announcement updated successfully!');
    }

    public function deleteAnnouncement($id)
    {
        $announcement = Announcement::findOrFail($id);
        $image = substr($announcement->image, 8);
        Storage::delete($image);
        $announcement->delete();
        return redirect()->route('admin.listAnnouncements')->with('success', 'Announcement deleted successfully!');
    }

    public function createNews()
    {
        return view('admin.createIklan');
    }

    public function listNews()
    {
        $news = News::paginate(10);
        return view('admin.listNews', compact('news'));
    }

    public function storeNews(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'nullable|image',
        ]);

        $path = null;
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $file = $request->file('image');
            $path = $file->store('images');
        }

        News::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $path ? '/storage/' . $path : null,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'News created successfully!');
    }

    public function editNews($id)
    {
        $news = News::findOrFail($id);
        return view('admin.editNews', compact('news'));
    }

    public function updateNews(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'nullable|image',
        ]);

        $news = News::findOrFail($id);

        $path = $news->image;
        $image = substr($path, 8);
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $file = $request->file('image');
            Storage::delete($image);
            $path = $file->store('images');
        }

        $news->update([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $path ? '/storage/' . $path : $news->image,
        ]);

        return redirect()->route('admin.listNews')->with('success', 'News updated successfully!');
    }

    public function deleteNews($id)
    {
        $news = News::findOrFail($id);
        $image = substr($news->image, 8);
        Storage::delete($image);
        $news->delete();
        return redirect()->route('admin.listNews')->with('success', 'News deleted successfully!');
    }

    public function createMateri()
    {
        return view('admin.createMateri');
    }

    public function createPelatihan()
    {
        return view('admin.createPelatihan');
    }

    public function listAbsensi(Request $request)
    {
        $selectedDate = $request->input('selected_date', now()->toDateString());
        $start = Carbon::parse($selectedDate)->startOfDay();
        $end = Carbon::parse($selectedDate)->endOfDay();
        $attendances = Absensi::whereBetween('created_at', [$start, $end])->paginate(10);
        return view('admin.listAbsensi', compact('selectedDate', 'attendances'));
    }

    public function storePelatihan(Request $request)
    {
        $path = null;
        $path_file = null;

        if ($request->has('materials')) {
            foreach ($request->materials as $key => $material) {
                if (isset($material['sub_materials'])) {
                    foreach ($material['sub_materials'] as $index => $sub_material) {
                        Validator::make($request->all(), [
                            'name' => 'required',
                            'description' => 'required',
                            'type' => 'required',
                            'image' => 'required',
                            'materials.*.title' => 'required',
                            'materials.*.description' => 'required',
                            'materials.*.sub_materials.*.title' => 'required',
                            'materials.*.sub_materials.*.content' => 'required',
                            'materials.*.sub_materials.*.file' => 'nullable|image|mimes:pdf,jpg,png,mp4',
                        ])->validate();
                    }
                } else {
                    Validator::make($request->all(), [
                        'materials[][sub_materials][][]' => 'required',
                    ])->validate();
                }
            }
        } else {
            Validator::make($request->all(), [
                'materials[][]' => 'required',
            ])->validate();
        }

        try {
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $file = $request->file('image');
                $path = $file->store('images');
            }

            $workshop = Workshop::create([
                'name' => $request->name,
                'description' => $request->description,
                'type' => $request->type,
                'image' => $path ? '/storage/' . $path : null,
            ]);

            foreach ($request->materials as $material) {
                $topic = Topics::create([
                    'title' => $material['title'],
                    'description' => $material['description'],
                    'workshop_id' => $workshop->id,
                ]);
                if (isset($material['sub_materials'])) {
                    foreach ($material['sub_materials'] as $sub_material) {
                        if (isset($sub_material['file'])) {
                            $path_file = $sub_material['file']->store('images');
                        }
                        Subtopics::create([
                            'topic_id' => $topic->id,
                            'title' => $sub_material['title'],
                            'content' => $sub_material['content'],
                            'file' => $path_file ? '/storage/' . $path_file : null,
                        ]);
                    }
                }
            }

            session()->forget('materials');
            return redirect()->back()->with('success', 'Pelatihan berhasil ditambah');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function editWorkshop($id)
    {
        $pelatihan = Workshop::with(['topics.subtopics'])->findOrFail($id);
        // dd($pelatihan);

        $materials = $pelatihan->topics
            ->map(function ($topic) {
                return [
                    'title' => $topic->title,
                    'description' => $topic->description,
                    'sub_materials' => $topic->subtopics
                        ->map(function ($sub) {
                            return [
                                'title' => $sub->title,
                                'content' => $sub->content,
                                'file' => $sub->file_path,
                            ];
                        })
                        ->toArray(),
                ];
            })
            ->toArray();

            // dd($materials);


        session(['materials' => $materials]);
        // session(['sub_materials' => ])
        return view('admin.editWorkshop', compact('pelatihan'));
    }

    public function addMaterial(Request $request)
    {
        $materials = session('materials', []);
        $materials[] = [];
        session(['materials' => $materials]);

        return redirect()->back();
    }

    public function addSubMaterial(Request $request, $materialIndex)
    {
        $materials = session('materials', []);
        if (!isset($materials[$materialIndex]['sub_materials'])) {
            $materials[$materialIndex]['sub_materials'] = [];
        }
        $materials[$materialIndex]['sub_materials'][] = [];
        session(['materials' => $materials]);

        return redirect()->back();
    }

    public function removeMaterial(Request $request, $index)
    {
        $materials = session('materials', []);
        if (isset($materials[$index])) {
            unset($materials[$index]);
            $materials = array_values($materials); // Reindex array
        }
        session(['materials' => $materials]);

        return redirect()->back();
    }

    public function removeSubMaterial(Request $request, $materialIndex, $subIndex)
    {
        $materials = session('materials', []);
        if (isset($materials[$materialIndex]['sub_materials'][$subIndex])) {
            unset($materials[$materialIndex]['sub_materials'][$subIndex]);
            $materials[$materialIndex]['sub_materials'] = array_values($materials[$materialIndex]['sub_materials']);
        }
        session(['materials' => $materials]);

        return redirect()->back();
    }

    public function listWorkshop()
    {
        $workshops = Workshop::with('topics.subtopics')->paginate(10);
        return view('admin.listWorkshop', compact('workshops'));
    }
}
