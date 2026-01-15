<?php

namespace App\Http\Controllers;

use App\Models\posts;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = posts::get();

        return view('Polymorph.post', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Polymorph.create-post');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul_posts' => 'required|max:50',
            'content_posts' => 'required',
        ], [
            'judul_posts.required' => 'Nama wajib diisi',
            'judul_posts.max' => 'Judul video maksimal 50 karakter!',
            'content_posts.required' => 'url wajib diisi',
        ]);

        // dd($request);

        posts::create([
            'title' => $request->judul_posts,
            'content' => $request->content_posts,
        ]);

        return redirect('/posts')->with('message', 'Post berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = posts::findOrFail($id);

        return view('Polymorph.detail-post', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = posts::findOrFail($id);

        return view('Polymorph.edit-post', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = posts::findOrFail($id);

        $request->validate([
            'judul_posts' => 'required|max:50',
            'content_posts' => 'required',
        ], [
            'judul_posts.required' => 'Nama wajib diisi',
            'judul_posts.max' => 'Judul video maksimal 50 karakter!',
            'content_posts.required' => 'url wajib diisi',
        ]);

        // dd($request);

        $post->update([
            'title' => $request->judul_posts,
            'content' => $request->content_posts,
        ]);

        return redirect('/posts')->with('message', 'Post berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = posts::findOrFail($id);
        $post->delete();

        return redirect('/posts')->with('message', 'Post berhasil dihapus');
    }
}
