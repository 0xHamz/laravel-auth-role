<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VideoRequest;
use App\Models\VideoPermission;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminRequestController extends Controller
{
    public function index()
    {
        $requests = VideoRequest::with('user','video')
            ->where('status','pending')
            ->get();
        
            // Riwayat approve/revoke
        $history = VideoRequest::whereIn('status',['approved','revoked'])->orderBy('updated_at','desc')->get();

        return view('admin.requests', compact('requests','history'));
    }

    public function approve(Request $request, $id)
    {
        $videoRequest = VideoRequest::findOrFail($id);
        $hours = (int) $request->input('hours'); // CAST ke integer

        // Update status request
        $videoRequest->status = 'approved';
        $videoRequest->start_time = now();
        $videoRequest->end_time = now()->addHours($hours);
        $videoRequest->duration_hours = $hours;
        $videoRequest->save();

        // Tambahkan permission di video_permissions
        DB::table('video_permissions')->insert([
            'user_id' => $videoRequest->user_id,
            'video_id' => $videoRequest->video_id,
            'start_time' => $videoRequest->start_time,
            'end_time' => $videoRequest->end_time,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return back()->with('success', 'Akses video disetujui.');
    }

    public function revoke($id)
    {
        $videoRequest = VideoRequest::findOrFail($id);

        // Ubah status request
        $videoRequest->status = 'revoked';
        $videoRequest->end_time = now();
        $videoRequest->save();

        // Hapus permission customer
        DB::table('video_permissions')
            ->where('user_id', $videoRequest->user_id)
            ->where('video_id', $videoRequest->video_id)
            ->delete();

        return back()->with('success', 'Akses video customer telah dicabut.');
    }

    public function updateDuration(Request $request, $id)
    {
        $videoRequest = VideoRequest::findOrFail($id);
        $hours = (int) $request->input('hours');

        // Pastikan start_time menjadi Carbon
        $start = \Carbon\Carbon::parse($videoRequest->start_time);

        // Update durasi dan end_time
        $videoRequest->duration_hours = $hours;
        $videoRequest->end_time = $start->copy()->addHours($hours);
        $videoRequest->save();

        // Update juga di video_permissions
        DB::table('video_permissions')
            ->where('user_id', $videoRequest->user_id)
            ->where('video_id', $videoRequest->video_id)
            ->update([
                'end_time' => $videoRequest->end_time,
                'updated_at' => now(),
            ]);

        return back()->with('success', 'Durasi video berhasil diperbarui.');
    }
    public function countPending()
    {
        $count = VideoRequest::where('status', 'pending')->count();
        return response()->json(['count' => $count]);
    }
    public function ajaxRequests()
    {
        $requests = \App\Models\VideoRequest::with('user','video')
            ->where('status','pending')
            ->latest()
            ->get();

        return response()->json($requests);
    }


}
