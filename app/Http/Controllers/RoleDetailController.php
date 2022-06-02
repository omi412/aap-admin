<?php

namespace App\Http\Controllers;

use App\Models\RoleDetail;
use Illuminate\Http\Request;

class RoleDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$data['permissions'] = Permission::orderBy('id','desc')->paginate(5);
        return view('role_details.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('role_details.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
        'user_name' => 'required',
        'manager_name' => 'required',
        'name' => 'required'
        ]);
        $roleDetail = new RoleDetail;
        $roleDetail->role_id = $request->user_name;
        $roleDetail->parent_id = $request->manager_name;
        $roleDetail->name = $request->name;
        $roleDetail->status = $request->status;
        $roleDetail->save();
        return redirect()->route('role-details.index')
        ->with('success','Role Detail has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RoleDetail  $roleDetail
     * @return \Illuminate\Http\Response
     */
    public function show(RoleDetail $roleDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RoleDetail  $roleDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(RoleDetail $roleDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RoleDetail  $roleDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RoleDetail $roleDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RoleDetail  $roleDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(RoleDetail $roleDetail)
    {
        //
    }
}
