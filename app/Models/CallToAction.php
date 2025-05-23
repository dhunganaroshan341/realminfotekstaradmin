<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CallToAction extends Model
{
    use HasFactory;
    protected $table = 'call_to_actions';
    protected $primaryKey = "id";
    protected $fillable = ['title','page','description', 'image','link'];


}
