<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class qr_img extends Model
{
    use HasFactory;
    protected $fillable= ['Qr-img','user_id'];
}
