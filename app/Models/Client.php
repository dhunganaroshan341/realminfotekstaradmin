<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable=['name','email','address','contact','image','description','order'];
    public function albums()
    {
        return $this->hasMany(GalleryAlbum::class);
    }

}
