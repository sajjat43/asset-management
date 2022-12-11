<?php

namespace App\Models;

use App\Models\User;
// use App\Models\RequestAsset;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RequestAsset extends Model
{
    use HasFactory;
    protected $table="requests";
    protected $guarded=[];

    
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }



    public function details()
    {
        return $this->hasMany(RequestDetails::class,'request_id','id');
    }
}
