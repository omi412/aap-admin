<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         // $this->middleware('permission:Permission-list', ['only' => ['index']]);
         // $this->middleware('permission:Permission-create', ['only' => ['create','store']]);
         // $this->middleware('permission:Permission-edit', ['only' => ['edit','update']]);
         // $this->middleware('permission:Permission-delete', ['only' => ['destroy']]);
    }

    public function index()
        {
        $data['permissions'] = Permission::orderBy('id','desc')->paginate(5);
        return view('permission.index', $data);
        }
        /**
        * Show the form for creating a new resource.
        *
        * @return \Illuminate\Http\Response
        */
        public function create()
        {
        return view('permission.create');
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
        'name' => 'required|unique:permissions'
        ]);
        $permission = new Permission;
        $permission->name = $request->name;
        $permission->guard_name = 'web';
        $permission->save();
        return redirect()->route('permission.index')
        ->with('success','Permission has been created successfully.');
        }
        /**
        * Display the specified resource.
        *
        * @param  \App\company  $company
        * @return \Illuminate\Http\Response
        */
        public function show(Permission $permission)
        {
        return view('permission.show',compact('permission'));
        } 
        /**
        * Show the form for editing the specified resource.
        *
        * @param  \App\Company  $company
        * @return \Illuminate\Http\Response
        */
        public function edit(Permission $permission)
        {
        return view('permission.edit',compact('permission'));
        }
        /**
        * Update the specified resource in storage.
        *
        * @param  \Illuminate\Http\Request  $request
        * @param  \App\company  $company
        * @return \Illuminate\Http\Response
        */
        public function update(Request $request, $id)
        {
        $request->validate([
        'name' => 'required|unique:permissions,name,'.$id,
        ]);
        $permission = Permission::find($id);
        $permission->name = $request->name;
        $permission->guard_name = 'web';
        $permission->save();
        return redirect()->route('permission.index')
        ->with('success','Permission Has Been updated successfully');
        }
        /**
        * Remove the specified resource from storage.
        *
        * @param  \App\Company  $company
        * @return \Illuminate\Http\Response
        */
        public function destroy(Permission $permission)
        {
        $permission->delete();
        return redirect()->route('permission.index')
        ->with('success','Permission has been deleted successfully');
        }


}
