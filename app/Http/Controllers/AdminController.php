<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\News;
use App\Models\Announcement;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function dashboard()
    {
        $announcementCount = Announcement::count();
        $newsCount = News::count();

        return view('admin.dashboard', compact('announcementCount', 'newsCount'));
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        $request()->session()->invalidate();
        $request()->session()->regenerateToken();
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
            'date' => 'required|date',
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
            'date' => $request->date,
        ]);
    
        return redirect()->route('admin.dashboard')->with('success', 'Announcement created successfully!');
    }

    public function updateAnnouncement(Request $request, $id)
    {
    $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'image' => 'nullable|image',
        'date' => 'required|date',
    ]);

    $announcement = Announcement::findOrFail($id);

    $path = $announcement->image;
    if ($request->hasFile('image') && $request->file('image')->isValid()) {
        $file = $request->file('image');
        $path = $file->store('images');
    }

    $announcement->update([
        'title' => $request->title,
        'description' => $request->description,
        'image' => $path ? '/storage/' . $path : $announcement->image,
        'date' => $request->date,
    ]);

    return redirect()->route('admin.listAnnouncements')->with('success', 'Announcement updated successfully!');
    }

    public function deleteAnnouncement($id)
    {
    $announcement = Announcement::findOrFail($id);
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
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'nullable|image',
            'date' => 'required|date',
        ]);

        $path = null;
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $file = $request->file('image');
            $path = $file->store('images');
        }

        News::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $path ? '/storage/' . $path : null,
            'date' => $request->date,
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
        'description' => 'required',
        'image' => 'nullable|image',
        'date' => 'required|date',
    ]);
    
    $news = News::findOrFail($id);

    $path = $news->image;
    if ($request->hasFile('image') && $request->file('image')->isValid()) {
        $file = $request->file('image');
        $path = $file->store('images');
    }

    $news->update([
        'title' => $request->title,
        'description' => $request->description,
        'image' => $path ? '/storage/' . $path : $news->image,
        'date' => $request->date,
    ]);

    return redirect()->route('admin.listNews')->with('success', 'News updated successfully!');
    }

    public function deleteNews($id)
    {
    $news = News::findOrFail($id);
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

    
}