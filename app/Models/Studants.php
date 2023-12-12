<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studants extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function attedns (){
        return $this->hasMany(Attedn::class);
    }
}
