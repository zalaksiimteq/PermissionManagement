<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\PermissionGroup;

class Permission extends Model
{
    protected $table = 'permissions';
    protected $primaryKey = 'permission_id';
    protected $fillable = ['permission_id', 'permission_key', 'permission_title', 'group_id'];
    public $timestamps = false;

    public function permission_group(){
        return $this->belongsTo(PermissionGroup::class, 'permission_group_id', 'group_id');
    }
    
}
