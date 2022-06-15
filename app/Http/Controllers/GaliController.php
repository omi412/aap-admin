<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoleDetail;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class GaliController extends Controller
{
    public function index()
    {
        $roles = Role::whereIn('name',['Mandal Prabhari','Ward Prabhari','Booth Prabhari','Gali Prabhari'])->select('id','name')->pluck('id','name')->toArray();

        $booths = RoleDetail::where('role_id',$roles['Booth Prabhari'])->select('id','name')->get();
        $galies = RoleDetail::where('role_id',$roles['Gali Prabhari'])->select('id','name','parent_id')->get();

        //$roleDetails = RoleDetail::orderBy('id','desc')->paginate(5);
        
        //dd($galies);
   
        return view('master.gali.gali',compact('booths','galies'));
    }
    
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$booths = RoleDetail::where('role_id',5)->select('id','name')->get();
        $role = Role::where('name','Gali Prabhari')->first();
        //dd($mandals);
        $roleDetail = new RoleDetail;
        $roleDetail->role_id = $role->id;
        $roleDetail->parent_id = $request->parent_id;
        $roleDetail->name = $request->name;
        //dd($roleDetail);
        $roleDetail->save();
    
        return response()->json(['success' => true]);
    }
    
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {   
        $where = array('id' => $request->id);
        $gali  = RoleDetail::where($where)->first();
 
        return response()->json($gali);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
             'name'=> 'required|max:100',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }
        else
        {
            $roleDetail = RoleDetail::find($id);
            if($roleDetail)
            {
                try{
                    $roleDetail->update([
                        'name'=>$request->name,
                        'parent_id'=>$request->parent_id

                    ]);
                    return response()->json([
                        'status'=>200,
                        'message'=>'Gali Updated Successfully.'
                    ]);
                }catch(Exception $e){
                    return response()->json([
                        'status'=>500,
                        'message'=>$e->getMessage()
                    ]);
                }
                
            }
            else
            {
                return response()->json([
                    'status'=>404,
                    'message'=>'Gali Not Found'
                ]);
            }

        }
    }
 
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $gali = RoleDetail::where('id',$request->id)->delete();
   
        return response()->json(['success' => true]);
    }
}
