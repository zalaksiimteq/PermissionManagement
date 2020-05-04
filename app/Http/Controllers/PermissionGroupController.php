<?php

namespace App\Http\Controllers;

use App\Models\PermissionGroup;
use App\Http\Managers\PermissionGroupManager;
use Illuminate\Http\Request;

class PermissionGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permission_groups = PermissionGroupManager::getPermissionGroup();
        return view('permissionGroup.index', compact('permission_groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('permissionGroup.create');
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
        $store_group = PermissionGroupManager::store($input);
        if($store_group) {
            return redirect()->route('permission-group.index')->withSuccess('Permission Group created successfully.');
        }else{
            return redirect()->route('permission-group.create')->withSuccess('Please try again.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PermissionGroup  $permissionGroup
     * @return \Illuminate\Http\Response
     */
    public function show(PermissionGroup $permissionGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PermissionGroup  $permissionGroup
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission_group = PermissionGroup::find($id);
        return view('permissionGroup.edit', compact('permission_group'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PermissionGroup  $permissionGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        echo "asdfasfd";
        $input = $request->all();
        $update_permission_group = PermissionGroupManager::update($input, $id);

        if ($update_permission_group) {
            return redirect()->route('permission-group.index')->withSuccess('Permission Group updated successfully.');
        } else {
            return redirect()->route('permission-group.index')->withSuccess('Please try again');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PermissionGroup  $permissionGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_permission_group = false;
        $permission_group = PermissionGroup::find($id);
        $result = $permission_group->delete();

        if ($result == true) {
            return redirect()->route('permission-group.index')->withSuccess('Permission Group deleted successfully.');
        } else {
            return redirect()->route('permission-group.index')->withSuccess('Please try again.');
        }

    }
}
