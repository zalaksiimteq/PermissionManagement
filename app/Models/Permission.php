<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permissions';
    protected $primaryKey = 'permission_id';
    protected $fillable = ['permission_id', 'permission_key', 'permission_title', 'group_id'];
    public $timestamps = false;
    
}
