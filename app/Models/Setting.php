<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable=['logo','title','email','address','contact','contact_2','description','work_description','facebook_url','twitter_url','github_url','instagram_url','welcome_image','about_image'];
}
