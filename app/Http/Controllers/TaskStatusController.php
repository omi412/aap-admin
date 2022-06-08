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

class TaskStatusController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()) {
            $users = User::get();
            //dd($users);
            return response()->json(['user'=>$users]);
        }
        return view('task_status.task_status');
    }

    public function fetchtaskstatus()
    {
        $taskStatus = TaskStatus::all();
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
             'volunteer'=>'required|max:150',
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
                TaskStatus::create([
                    "task_title"=>$request->task_title,
                    "assign_to"=>$request->assign_to,
                    "task_description"=>$request->task_description,
                    "volunteer_name"=>$request->volunteer,
                    "address"=>$request->address,
                    "status"=>'',
                    "remarks"=>'',

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
        $taskStatus = TaskStatus::find($id);
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
        $validator = Validator::make($request->all(), [
             'task_title'=> 'required|max:100',
             'assign_to'=> 'required|max:100',
             'task_description'=> 'required|max:200',
             'volunteer'=>'required|max:150',
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
                    $taskStatus->task_title = $request->input('task_title');
                    $taskStatus->assign_to = $request->input('assign_to');
                    $taskStatus->task_description = $request->input('task_description');
                    $taskStatus->volunteer_name = $request->input('volunteer');
                    $taskStatus->address = $request->input('address');
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
