<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'show_title',
        'subtitle',
        'details',
        'link',
        'type',
        'image',
        'poster',
        'mp4video',
        'webmvideo',
        'ogvvideo',
        'serial',
    ];
}
