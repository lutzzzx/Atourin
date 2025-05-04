<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function like($agendaId)
    {
        $userId = Auth::id();
    
        $like = Like::where('agenda_id', $agendaId)->where('user_id', $userId)->first();
    
        if ($like) {
            // Jika pengguna telah menyukai agenda, hapus suka tersebut
            $like->delete();
            $liked = false;
        } else {
            // Jika belum, tambahkan suka pada agenda
            Like::create([
                'agenda_id' => $agendaId,
                'user_id' => $userId,
            ]);
            $liked = true;
        }
    
        $likesCount = Like::where('agenda_id', $agendaId)->count();
    
        return response()->json(['liked' => $liked, 'likes_count' => $likesCount]);
    }
}
