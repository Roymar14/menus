<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Complaint extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'status',
        'image',
        'guest_name',
        'guest_telp',
        'guest_email',
        'user_id'
    ];

    public function complaint()
    {
        return $this->hasMany(ComplaintResponse::class);
    }
    //cara pertama untuk menampilkan badge enum status (penggunaan check di file semua-pendaduan.blade.php) 
    public function getStatusBadgeAttribute()
    {
        //switch cash
        return match ($this->status) {
            'pending' => '<span class="badge" style="background-color: #ff7976;">PENDING</span>',
            'selesai' => '<span class="badge" style="background-color: #5ddab4;">SELESAI</span>',
            default => '<span class="badge" style="background-color: #57caeb;">' . strtoupper($this->status) . '</span>',
        };
    }
    function user()
    {
        return $this->belongsTo(User::class);
    }

    protected function imageUpload(): Attribute
        {
            return Attribute::make(
                get: fn ($image) =>
                url('storage/complaints_pengguna/' . $image),
            );
        }    
}
