<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserHasPortalAccess extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function portal(){
        return $this->belongsTo(Portal::class,'portal_id','id');
    }


}
