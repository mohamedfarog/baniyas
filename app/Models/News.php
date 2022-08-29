<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $table = 'news';
    protected $guarded= ['newsid'];
    protected $appends = ['cat'];
    protected $primaryKey = 'newsid';
    public $timestamps = false;
    //protected $hidden = ['updated_at', 'created_at'];

public function getAddonimagesAttribute($value){
    return "http://127.0.0.1:8000".$value;
}


public function getNewsimagesAttribute($value){
    return "http://127.0.0.1:8000".$value;
} 

public function getCatAttribute(){
  switch($this->newscategory){
    case 0:
        return 'First Team';
        break;
    case 1:
        return 'Academy';
        break;
    case 2:
        return 'Football School';
        break;
    case 3:
        return 'Volley ball';
        break;
    case 4:
        return 'Jiujitsu';
        break;
    case 5:
        return 'Basket ball';
        break;
    case 6:
        return 'Fencing';
        break;
    case 7:
        return 'Hand ball';
        break;
    case 8:
        return 'Community';
        break;
    default:
            return 'No Category';
            break;
    }
}
}
