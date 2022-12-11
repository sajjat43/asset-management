<?php

namespace App\Models;

use App\Models\RequestAsset;
// use App\Models\RequestDetails;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RequestDetails extends Model
{
    use HasFactory;
    protected $guarded=[];


    public function request()
    {
        return $this->belongsTo(RequestAsset::class);
    }


    public function asset()
    {
        return $this->belongsTo(Asset::class,'asset_id','id');
    }
}
