<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contactinformation extends Model
{
    use HasFactory;
    protected $guards = [];

    public function contact(){
        return $this->belongsTo(contact::class);
    }
}
