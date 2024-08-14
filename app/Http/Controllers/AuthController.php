<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Announcement;
use App\Models\News;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;

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
        $announcements = Announcement::all();
        $news = News::paginate(3); 
        return view('wub.dashboardWub', compact('user', 'announcements', 'news'));
    }

    public function pelatihan()
    {
        $user = Auth::user();
        return view('wub.pelatihan', compact('user'));
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'nik' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        if (! Auth::attempt($request->only('nik', 'password'))) {
            throw ValidationException::withMessages([
                'nik' => __('auth.failed'),
            ]);

            $request->session()->regenerate();
        }

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
            'nik.unique' => 'NIK sudah terdaftar, silahkan coba lagi',
            'email.unique' => 'Email sudah terdaftar, silahkan coba lagi',
    ];    

    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'nik' => 'required|string|max:255|unique:users',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|confirmed|min:8',
    ], $messages);

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

    
    public function logout(Request $request)
    {
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/');
    }
}
