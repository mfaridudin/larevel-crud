<?php

namespace App\Http\Controllers;

use App\Models\posts;
use App\Models\videos;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function storeVideo(Request $request, $videoId)
    {
        $request->validate([
            'body' => 'required',
        ]);

        $video = videos::findOrFail($videoId);

        $video->comments()->create([
            'body' => $request->body,
        ]);

        return back()->with('message', 'Komentar berhasil ditambahkan');
    }

    public function storePost(Request $request, $postId)
    {
        $request->validate([
            'body' => 'required',
        ]);

        $post = posts::findOrFail($postId);

        $post->comments()->create([
            'body' => $request->body,
        ]);

        return back()->with('message', 'Komentar berhasil ditambahkan');
    }
}
