<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listBerita = News::all();
        return view('admin.berita.index', compact('listBerita'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.berita.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'required|image',
        ]);

        $path = null;
        if ($request->image->isValid()) {
            $file = $request->image;
            $path = $file->store('images');
        }

        try {
            News::create([
                'title' => $request->title,
                'content' => $request->content,
                'image' => $path ? '/storage/' . $path : '',
            ]);

            return to_route('admin.berita')->with('success', 'Berita berhasil ditambahkan');
        } catch (\Throwable $th) {
            return to_route('admin.berita')->with('error', 'Berita gagal ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $berita = News::findOrFail($id);
            $image = $berita->image;
            $berita->delete();
            if ($image) {
                Storage::delete(str_replace('/storage/', '', $image));
            }
            return to_route('admin.berita')->with('success', 'Berita berhasil dihapus');
        } catch (\Exception $e){
            return to_route('admin.berita')->with('error', 'Gagal menghapus gambar');
        }
    }
}
