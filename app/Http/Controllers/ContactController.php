<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Validator;
use Exception;
use App\Models\HouseData;
use Carbon\Carbon;
use Auth;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        /*if($request->ajax()) {
            $contacts = Contact::get();
            //dd($users);
            return response()->json(['contacts'=>$contacts]);
        }*/

        $house_data = HouseData::get();
        ///dd($house_data);
        return view('contacts.contact',compact('house_data'));
    }

    public function fetchContact()
    {
        $contacts = Contact::with('houseData')->get();
        
        return response()->json([
            'contacts'=>$contacts,
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
             'house_id'=> 'required|max:100',
             'first_name'=> 'required|max:100',
             'last_name'=> 'required|max:200',
             'gender'=>'required|max:200',
             'age'=>'required|max:200',
             'user_type'=>'required|max:200'
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
                    "house_id"=>$request->house_id,
                    "first_name"=>$request->first_name,
                    "last_name"=>$request->last_name,
                    "gender"=>$request->gender,
                    "age"=>$request->age,
                    "user_type"=>$request->user_type,
                ]);

                return response()->json([
                    'status'=>200,
                    'message'=>'Contact Added Successfully.'
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
        $contact = Contact::find($id);
        if($contact)
        {
            return response()->json([
                'status'=>200,
                'contact'=> $contact,
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'No Contact Found.'
            ]);
        }

    }

    public function update(Request $request, $id)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
             'house_id'=> 'required|max:100',
             'first_name'=> 'required|max:100',
             'last_name'=> 'required|max:200',
             'gender'=>'required|max:200',
             'age'=>'required|max:200',
             'user_type'=>'required|max:200'
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
            $contact = Contact::find($id);
            if($contact)
            {
                try{

                    $contact->house_id = $request->input('house_id');
                    $contact->first_name = $request->input('first_name');
                    $contact->last_name = $request->input('last_name');
                    $contact->gender = $request->input('gender');
                    $contact->age = $request->input('age');
                    $contact->user_type = $request->user_type;

                    $contact->update();
                    
                    return response()->json([
                        'status'=>200,
                        'message'=>'Contact Updated Successfully.'
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
                    'message'=>'No Contact Found.'
                ]);
            }

        }
    }

    public function destroy($id)
    {
        $contact = Contact::find($id);
        if($contact)
        {
            $contact->delete();
            return response()->json([
                'status'=>200,
                'message'=>'Contact Deleted Successfully.'
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'No Contact Found.'
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
