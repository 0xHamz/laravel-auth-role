<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;

class AdminVideoController extends Controller
{
    public function index()
    {
        $videos = Video::all();
        return view('admin.videos.index', compact('videos'));
    }

    public function create()
    {
        return view('admin.videos.create');
    }

    public function store(Request $request)
    {
        $url = $request->video_url;

        // AUTO CONVERT LINK YOUTUBE
        if (str_contains($url, 'youtube.com/watch')) {
            $url = str_replace('watch?v=', 'embed/', $url);
        }

        Video::create([
            'title' => $request->title,
            'video_url' => $url
        ]);

        return redirect('/admin/videos')->with('success', 'Video ditambahkan');
    }

    public function edit($id)
    {
        $video = Video::findOrFail($id);
        return view('admin.videos.edit', compact('video'));
    }

    public function update(Request $request, $id)
    {
        $url = $request->video_url;

        if (str_contains($url, 'youtube.com/watch')) {
            $url = str_replace('watch?v=', 'embed/', $url);
        }

        Video::findOrFail($id)->update([
            'title' => $request->title,
            'video_url' => $url
        ]);

        return redirect('/admin/videos')->with('success', 'Video diperbarui');
    }


    public function destroy($id)
    {
        Video::destroy($id);
        return back()->with('success', 'Video dihapus');
    }
}
