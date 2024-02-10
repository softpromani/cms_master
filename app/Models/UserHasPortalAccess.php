<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
use App\Models\Portals\User as PortalsUser;
use Illuminate\Support\Facades\Hash;
use Log;
class UserHasPortalAccess extends Model
{
    use HasFactory;

    protected $guarded = [];


    public static function  boot()
    {
        parent::boot();
        static::created(function($item) {
            $portal = $item->portal;
            $user = $item->user;
            Config::set('database.connections.dynamic', [
                'driver' => 'mysql',
                'host' => $portal->host,
                'database' => $portal->dynamic_database,
                'username' => $portal->dynamic_username,
                'password' => $portal->dynamic_password,
            ]);
            PortalsUser::on('dynamic')->create([
                'name'=>$user->fname .' '.$user->lname,
                'email'=>$user->email,
                'password'=>Hash::make('123456789'),
            ]);
        });
    }

    public function portal(){
        return $this->belongsTo(Portal::class,'portal_id','id');
    }
    
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }


}
