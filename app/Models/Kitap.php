<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kitap extends Model
{
    use HasFactory;
   public function yazarbilgi(){
      return  $this->hasOne(Yazar::class, 'id', 'yazar_id'); 
    }
}
