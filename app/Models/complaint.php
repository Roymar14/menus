<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class complaint extends Model
{
    use HasFactory;


protected $fillabe = [
    'title',
    'description',
    'status', // pending, proses, selesai
    'image',
    'guest_name',
    'guest_telp',
    'guest_email',
    'user_id'
];

public function getStatusBadgeAttribute() {
    return match ($this->status) {
        'pending' => '<span class="badge" style="background-color: #ff7976;">pending</span>',
        'selesai' => '<span class="badge" style="background-color: #5ddab4;">selesai</span>',
        default => '< class="badge" style="background-color: #57caeb;">' . strtoupper($this->status) . '</span>' ,
        
    };
}



public function complaint() {
    return $this->hasMany(complaintrespons::class);
}

    function user() {
        return $this->belongsTo(user::class);
    }

}