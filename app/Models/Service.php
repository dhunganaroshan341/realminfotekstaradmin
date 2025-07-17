<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $table = 'services';
    protected $fillable = ['image','name', 'short_desc','description', 'status','order'];

    public function queries()
{
    return $this->hasMany(ServiceQuery::class);
}


}
