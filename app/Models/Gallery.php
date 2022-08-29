<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    protected $table = 'gallery';
    protected $fillable = ['galleryaname', 'galleryename', 'gallerydate', 'albumnames'];
    protected $primaryKey = 'galleryid';
    public $timestamps = false;
}
