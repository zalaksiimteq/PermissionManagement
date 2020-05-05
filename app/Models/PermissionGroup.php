<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Permission;

class PermissionGroup extends Model
{
    protected $table = 'permissions_group';
    protected $primaryKey = 'permission_group_id';
    protected $fillable = ['permission_group_id', 'name'];
    public $timestamps = false;

    public function permission(){
        return $this->hasMany(Permission::class, 'group_id', 'permission_group_id');
    }
}
