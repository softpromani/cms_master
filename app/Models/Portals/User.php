<?php

namespace App\Models\Portals;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class User extends Model
{
    use HasFactory,HasRoles;

    protected $connection = 'dynamic';

    protected $fillable = [
        "name",
        "password",
        "email",
    ];


}
