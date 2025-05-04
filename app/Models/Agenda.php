<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;
    protected $table = 'agendas';
    protected $fillable = [
        'judul',
        'lokasi_berangkat',
        'mulai',
        'selesai',
        'private', 
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function details(){
        return $this->hasMany(Detail::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    
    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class);
    }
    
    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function getDurasiAttribute()
    {
        $mulaiPalingAwal = $this->details()->min('mulai');
        $selesaiPalingAkhir = $this->details()->max('selesai');

        if ($mulaiPalingAwal && $selesaiPalingAkhir) {
            $mulai = Carbon::parse($mulaiPalingAwal);
            $selesai = Carbon::parse($selesaiPalingAkhir);

            $diffInDays = $mulai->copy()->startOfDay()->diffInDays($selesai->copy()->startOfDay());

            if ($diffInDays < 1) {
                $diffInHours = round($mulai->diffInHours($selesai, true), 1);
                return $diffInHours . ' jam';
            } else {
                return $diffInDays . ' hari';
            }
        }

        return 0 . ' jam';
    }

    public function getTotalBiayaAttribute()
    {
        return $this->details->sum('biaya');
    }
    public function getMulaiAttribute()
    {
        return $this->details()->min('mulai');
    }
    public function getSelesaiAttribute()
    {
        return $this->details()->max('selesai');
    }
}

