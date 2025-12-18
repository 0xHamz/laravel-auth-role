<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Video;
use App\Models\VideoRequest;
use App\Models\VideoPermission;

class CustomerVideoController extends Controller
{
    // ===============================
    // LIST VIDEO
    // ===============================
    public function index()
    {
        $videos = Video::all();

        return view('customer.videos', compact('videos'));
    }

    // ===============================
    // REQUEST AKSES VIDEO
    // ===============================
    public function requestAccess($id)
    {
        // Cegah request dobel
        $exists = VideoRequest::where('user_id', auth()->id())
            ->where('video_id', $id)
            ->where('status', 'pending')
            ->exists();

        if ($exists) {
            return back()->with('error', 'Permintaan sudah dikirim');
        }

        VideoRequest::create([
            'user_id' => auth()->id(),
            'video_id' => $id,
            'status' => 'pending'
        ]);

        return back()->with('success', 'Permintaan akses berhasil dikirim');
    }

    // ===============================
    // TONTON VIDEO (CEK WAKTU)
    // ===============================
    public function watch($id)
    {
        $permission = VideoPermission::where('user_id', auth()->id())
            ->where('video_id', $id)
            ->where('start_time', '<=', now())
            ->where('end_time', '>=', now())
            ->first();

        if (!$permission) {
            return redirect('/customer/videos')
                ->with('error', 'Akses video belum disetujui atau sudah habis');
        }

        $video = Video::findOrFail($id);

        return view('customer.watch', compact('video'));
    }

}
