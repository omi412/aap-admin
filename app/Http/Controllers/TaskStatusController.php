<?php

namespace App\Http\Controllers;

use App\Models\TaskStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskStatusController extends Controller
{
    public function index()
    {
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
             'task_title'=> 'required|max:191',
             'assign_to'=> 'required|max:191',
             'task_description'=> 'required|max:191',
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
            $taskStatus = new TaskStatus;
            $taskStatus->task_title = $request->input('task_title');
            $taskStatus->assign_to = $request->input('assign_to');
            $taskStatus->task_description = $request->input('task_description');
            $taskStatus->save();
            return response()->json([
                'status'=>200,
                'message'=>'Task Status Added Successfully.'
            ]);
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
             'task_title'=> 'required|max:191',
             'assign_to'=> 'required|max:191',
             'task_description'=> 'required|max:191',
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
                $taskStatus->task_title = $request->input('task_title');
                $taskStatus->assign_to = $request->input('assign_to');
                $taskStatus->task_description = $request->input('task_description');
                $taskStatus->update();
                return response()->json([
                    'status'=>200,
                    'message'=>'Task Status Updated Successfully.'
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
}
