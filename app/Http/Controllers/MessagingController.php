<?php

namespace App\Http\Controllers;

use App\Models\Messaging;
use Illuminate\Http\Request;
use App\Http\Resources\MessagingResource;
use Illuminate\Support\Facades\Validator;

class MessagingController extends Controller
{
    public function index()
    {
        return view('messaging.messaging');
    }

    public function fetchMessages()
    {
        $messages = Messaging::all();
        return response()->json([
            'messages'=>MessagingResource::collection($messages),
        ]);
    }

    public function store(Request $request)
    {   
        $validator = Validator::make($request->all(), [
             'message'=> 'required|max:100',
             'send_to.*'=> 'required',
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
                Messaging::create([
                    "message"=>$request->message,
                    "send_to"=>implode(',', $request->send_to),
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

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {
        
    }
}
