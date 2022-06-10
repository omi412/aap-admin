<?php

namespace App\Http\Controllers;

use App\Models\Messaging;
use Illuminate\Http\Request;
use App\Http\Resources\MessagingResource;
use Illuminate\Support\Facades\Validator;
use App\Models\RoleDetail;
use Spatie\Permission\Models\Role;

class MessagingController extends Controller
{
    public function index()
    {
        $roles = Role::whereIn('name',['Mandal Prabhari','Ward Prabhari','Booth Prabhari','Gali Prabhari'])->select('id','name')->pluck('id','name')->toArray();
        
        $mandals = RoleDetail::where('role_id',$roles['Mandal Prabhari'])->select('id','name')->get();
        $wards = RoleDetail::where('role_id',$roles['Ward Prabhari'])->select('id','name')->get();
        $booths = RoleDetail::where('role_id',$roles['Booth Prabhari'])->select('id','name')->get();
        $galies = RoleDetail::where('role_id',$roles['Gali Prabhari'])->select('id','name')->get();
        
        return view('messaging.messaging',compact('mandals','wards','booths','galies'));
    }

    public function fetchMessages()
    {
        $messages = Messaging::with(['role','roleDetail'])->get();
        return response()->json([
            'messages'=>$messages,
        ]);
    }

    public function store(Request $request)
    {   
        $validator = Validator::make($request->all(), [
             'message'=> 'required|max:100',
             'send_to'=> 'required',
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
            try{
                $role = Role::find($request->send_to);
                
                $role_details_id = 0;
                
                if($role->name=='Mandal Prabhari'){
                    $role_details_id = $request->mandal_id;
                }
                if($role->name=='Ward Prabhari'){
                    $role_details_id = $request->ward_id;
                }
                if($role->name=='Booth Prabhari'){
                    $role_details_id = $request->booth_id;
                    //dd($role_details_id);
                }
                if($role->name=='Gali Prabhari'){
                    $role_details_id = $request->gali_id;
                }

                Messaging::create([
                    "message"=>$request->message,
                    "send_to"=>$request->send_to,
                    "volunteer"=>$role_details_id,
                ]);
            
                return response()->json([
                    'status'=>200,
                    'message'=>'Message Added Successfully.'
                ]);
            }catch(Exception $e){
                return response()->json([
                    'status'=>500,
                    'message'=>$e->getMessage()
                ]);
            }
        }

    }

   public function edit($id)
    {
        $all_message = Messaging::find($id);
        dd($all_message);
        if($all_message)
        {
            return response()->json([
                'status'=>200,
                'all_message'=> $all_message,
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'No Messaging Found.'
            ]);
        }

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {
        
    }
}
