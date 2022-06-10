<?php

namespace App\Http\Controllers;

use App\Models\TaskStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;
use App\Models\User;
use App\Models\RoleDetail;
use Carbon\Carbon;
use Auth;
use Spatie\Permission\Models\Role;
use App\Traits\FileUploadTrait;

class TaskStatusController extends Controller
{
    use FileUploadTrait;

    public function index(Request $request)
    {
        if($request->ajax()) {
            $users = User::get();
            //dd($users);
            return response()->json(['user'=>$users]);
        }
        $roles = Role::whereIn('name',['Mandal Prabhari','Ward Prabhari','Booth Prabhari','Gali Prabhari'])->select('id','name')->pluck('id','name')->toArray();
        
            
        $mandals = RoleDetail::where('role_id',$roles['Mandal Prabhari'])->select('id','name')->get();
        $wards = RoleDetail::where('role_id',$roles['Ward Prabhari'])->select('id','name')->get();
        $booths = RoleDetail::where('role_id',$roles['Booth Prabhari'])->select('id','name')->get();
        $galies = RoleDetail::where('role_id',$roles['Gali Prabhari'])->select('id','name')->get();
        
        return view('task_status.task_status',compact('mandals','wards','booths','galies'));
    }

    public function fetchtaskstatus()
    {
        $taskStatus = TaskStatus::with(['role','roleDetail'])->get();
        
        return response()->json([
            'taskStatus'=>$taskStatus,
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
                TaskStatus::create([
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
        $taskStatus = TaskStatus::with('role')->find($id);
        if($taskStatus)
        {
            return response()->json([
                'status'=>200,
                'taskStatus'=> $taskStatus,
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
