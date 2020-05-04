<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\PermissionGroup;
use App\Http\Managers\PermissionManager;
use App\Http\Managers\PermissionGroupManager;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = PermissionManager::getPermission();
        return view('permission.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission_group = PermissionGroupManager::permissionGroup();
        return view('permission.create', compact('permission_group'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        
        $permission = PermissionManager::store($input);
        if($permission) {
            return redirect()->route('permission.index')->withSuccess('Permission inserted successfully.');
        }else{
            return redirect()->route('permission.index')->withError('Permission inserted successfully.');
        }
    }

}
