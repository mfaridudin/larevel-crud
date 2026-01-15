<?php

namespace App\Http\Controllers;

use App\Models\videos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VideosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $videos = videos::get();

        return view('Polymorph.videos', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Polymorph.create-videos');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul_videos' => 'required|max:50',
            'url_videos' => 'required|file|mimes:mp4,mov,avi|max:51200', // Hapus koma ganda di sini
        ], [
            'judul_videos.required' => 'Nama wajib diisi',
            'judul_videos.max' => 'Judul video maksimal 50 karakter!',
            'url_videos.required' => 'File video wajib diisi',
        ]);

        if ($request->hasFile('url_videos')) {
            $video = $request->file('url_videos');

            $path = $video->store('videos', 'public');

            videos::create([
                'title' => $request->judul_videos,
                'url' => $path,
            ]);

            return redirect('/videos')->with('message', 'Video berhasil ditambah');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $video = videos::findOrFail($id);

        return view('Polymorph.detail-video', compact('video'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $video = videos::findOrFail($id);

        return view('Polymorph.edit-video', compact('video'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $video = videos::findOrFail($id);

        if ($request->hasFile('url_videos')) {
            $uploadedFile = $request->file('url_videos');

            $path = $uploadedFile->store('videos', 'public');

            $video->update([
                'title' => $request->judul_videos,
                'url' => $path,
            ]);
        } else {
            $video->update([
                'title' => $request->judul_videos,
            ]);
        }

        return redirect('/videos')->with('message', 'Video berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $video = videos::findOrFail($id);

        $video->delete();

        return redirect('/videos')->with('message', 'Video berhasil dihapus');
    }
}
