<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    use HasFactory;
    protected $table = 'images';
    protected $guarded= ['imgid'];
    protected $primaryKey = 'imgid';
    public $timestamps = false;


public function getImgfilenameAttribute($value){
    return "http://127.0.0.1:8000".$value;
} 
public function galleryImg()
{
    return $this->belongsTo(Gallery::class,'foreign_key','linked_galleryid');
}

}

     
