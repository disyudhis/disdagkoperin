<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\User;
use App\Mail\SendEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class PublicController extends Controller
{
    public function portal()
    {
        return view('portal');
    }

    public function loginPortal()
    {
        return view('loginUser');
    }

    public function postLogin(Request $request)
    {
        $credentials = $request->only('nib', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed, redirect to home
            $request->session()->put('user_id', Auth::id());
            $request->session()->regenerate();
            return redirect()->route('home');
        }

        // Authentication failed, redirect back with an error
        return redirect()->route('loginPortal')->with('error', 'NIB atau password salah, silahkan masukkan.');
    }

    public function registerPortal()
    {
        return view('registerUser');
    }

    public function postRegister(Request $request)
    {
        if ($request->isMethod('post')) {
            $validator = Validator::make(
                $request->all(),
                [
                    'name' => 'required|string|max:255|unique:users',
                    'email' => 'required|string|email|max:255|unique:users',
                    'password' => 'required|string|min:8|confirmed',
                    'birthdate' => 'required|date',
                    'gender' => 'required|string',
                    'nib' => 'required|string|unique:users',
                ],
                [
                    'name.unique' => 'Nama sudah terdaftar, silahkan masukkan lagi.',
                    'email.unique' => 'Email sudah terdaftar, silahkan masukkan lagi.',
                    'nib.unique' => 'NIB sudah terdaftar, silahkan masukkan lagi.',
                    'password.confirmed' => 'Password tidak sesuai, silahkan masukkan lagi.',
                ],
            );

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'birthdate' => $request->birthdate,
                'gender' => $request->gender,
                'nib' => $request->nib,
            ]);

            return redirect()->route('loginPortal')->with('success', 'Registration successful, please login.');
        }

        return view('registerUser');
    }

    public function home()
    {
        $listBerita = News::orderBy('created_at', 'desc')->limit(4)->get();
        return view('home', compact('listBerita'));
    }

    public function profile()
    {
        return view('profile');
    }

    public function services()
    {
        return view('pelayanan');
    }

    public function news()
    {
        $listBerita = News::all();
        return view('berita.index', compact('listBerita'));
    }

    public function newsDetail($id)
    {
        $berita = News::find($id);
        return view('berita.detail', compact('berita'));
    }

    public function contact()
    {
        return view('kontak');
    }

    public function sendEmail(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nik' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'pesan' => 'required',
        ]);

        $data = [
            'nama' => $request->nama,
            'nik' => $request->nib,
            'phone' => $request->phone,
            'email' => $request->email,
            'pesan' => $request->pesan,
        ];

        try {
            Mail::to('feralpickle03@gmail.com')->send(new SendEmail($data));
            return redirect()->back()->with('success', 'Email berhasil dikirim');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout(); // Log out the user

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/'); // Redirect to the homepage or any other route after logout
    }
}
