<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()) {
            $contacts = Contact::get();
            //dd($users);
            return response()->json(['contacts'=>$contacts]);
        }
        
        return view('contact.contact',compact());
    }

    public function fetchtaskstatus()
    {
        $contacts = Contact::get();
        
        return response()->json([
            'contacts'=>$contacts,
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
             'task_title'=> 'required|max:100',
             'assign_to'=> 'required|max:100',
             'task_description'=> 'required|max:200',
             'address'=>'required|max:200'
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
                Contact::create([
                    "task_title"=>$request->task_title,
                    "assign_to"=>$request->assign_to,
                    "task_description"=>$request->task_description,
                    "volunteer"=>$role_details_id,
                    "address"=>$request->address,
                ]);

                return response()->json([
                    'status'=>200,
                    'message'=>'Task Status Added Successfully.'
                ]);
            }catch(Exception $e){
                return response()->json([
                    'status'=>500,
                    'error'=>$e->getMessage()
                ]);
            }
        }

    }

    public function edit($id)
    {
        $contacts = Contact::with('role')->find($id);
        if($contacts)
        {
            return response()->json([
                'status'=>200,
                'contacts'=> $contacts,
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'No Volunteer Found.'
            ]);
        }

    }

    public function update(Request $request, $id)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
             'task_title'=> 'required|max:100',
             'assign_to'=> 'required|max:100',
             'task_description'=> 'required|max:200',
             'address'=>'required|max:200'
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
            $taskStatus = TaskStatus::find($id);
            if($taskStatus)
            {
                try{
                    $role = Role::find($request->assign_to);
                
                    $role_details_id = 0;
                    
                    if($role->name=='Mandal Prabhari'){
                        $role_details_id = $request->mandal_id;
                    }
                    if($role->name=='Ward Prabhari'){
                        $role_details_id = $request->ward_id;
                    }
                    if($role->name=='Booth Prabhari'){
                        $role_details_id = $request->booth_id;
                    }
                    if($role->name=='Gali Prabhari'){
                        $role_details_id = $request->gali_id;
                    }
                    $file_name = "";
                    if($request->hasFile('image')){
          
                        $file_name = $this->fileUpload($request,'image','public/task-documents');
                    }

                    $taskStatus->task_title = $request->input('task_title');
                    $taskStatus->assign_to = $request->input('assign_to');
                    $taskStatus->task_description = $request->input('task_description');
                    $taskStatus->volunteer = $role_details_id;
                    $taskStatus->address = $request->input('address');
                    if($file_name!=''){
                        $taskStatus->image = $file_name;
                    }
                    $taskStatus->remarks = $request->remark;
                    $taskStatus->status = $request->status;

                    $taskStatus->update();
                    
                    return response()->json([
                        'status'=>200,
                        'message'=>'Task Status Updated Successfully.'
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
                    'message'=>'No Task Status Found.'
                ]);
            }

        }
    }

    public function destroy($id)
    {
        $taskStatus = TaskStatus::find($id);
        if($taskStatus)
        {
            $taskStatus->delete();
            return response()->json([
                'status'=>200,
                'message'=>'Task Status Deleted Successfully.'
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'No Task Status Found.'
            ]);
        }
    }


    /*public function getVolunteers($volunteer_id)
    {
        $volunteers = RoleDetail::select('id','name')->where("parent_id",$volunteer_id)->get();
        dd($volunteers);
        return response()->json(['status'=>200,'volunteers'=>$volunteers]);
    }*/

   /* public function getVolunteers($volunteer_id)
    {
        $wards = RoleDetail::where('role_id',$volunteer_id)->select('id','name')->get();
        //$volunteers = RoleDetail::select('id','name')->where("parent_id",$volunteer_id)->get();
        return response()->json(['status'=>200,'wards'=>$wards]);
    }*/

    public function getVolunteers($volunteer_id)
    {
        //$wards = RoleDetail::select('id','name')->where("parent_id",$mandal_id)->get();
        $wards = RoleDetail::where('parent_id',$volunteer_id)->select('id','name')->get();
        return response()->json(['status'=>200,'wards'=>$wards]);
    }

}
