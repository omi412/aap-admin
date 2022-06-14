<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoleDetail;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class MandalController extends Controller
{
    public function index()
    {
        //$data['mandals'] = RoleDetail::orderBy('id','desc')->paginate(5);
        $data['mandals']  = RoleDetail::where('role_id',3)->select('id','name')->get();
   
        return view('master.mandal.mandal',$data);
    }
    
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = Role::where('name','Mandal Prabhari')->first();
        //dd($role);
        $roleDetail = new RoleDetail;
        $roleDetail->role_id = $role->id;
        $roleDetail->name = $request->name;
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
        $mandal  = RoleDetail::where($where)->first();
 
        return response()->json($mandal);
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
                        'name'=>$request->name
                    ]);
                    return response()->json([
                        'status'=>200,
                        'message'=>'Mandal Updated Successfully.'
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
                    'message'=>'Mandal Not Found'
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
        $mandal = RoleDetail::where('id',$request->id)->delete();
   
        return response()->json(['success' => true]);
    }
}
