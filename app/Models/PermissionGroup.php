<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PermissionGroup extends Model
{
    protected $table = 'permissions_group';
    protected $primaryKey = 'permission_group_id';
    protected $fillable = ['permission_group_id', 'name'];
    public $timestamps = false;
}
