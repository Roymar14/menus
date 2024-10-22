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
    'status',
    'image',
    'guest_name',
    'guest_telp',
    'guest_email',
    'user_id'
];

public function complaint() {
    return $this->hasMany(complaintrespons::class);
}

}