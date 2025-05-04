<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'deskripsi', 'user_id', 'agenda_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function agenda(){
        return $this->belongsTo(Agenda::class);
    }
}
