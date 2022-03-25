<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class link extends Model
{
    use HasFactory;
    protected $fillable = ['platform_url', 'platform_name','icon_id','user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
     public function icon(){
        return $this->belongsTo(iconModel::class);
     }
}
