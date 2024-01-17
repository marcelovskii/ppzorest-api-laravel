<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PersonController extends Controller
{
    public function index()
    {
        $people = Person::all();
        if($people->count() > 0)
        {
            return response()->json([
                'status' => 200,
                'people' => $people  
            ], 200);
        }
        else
        {
            return response()->json([
                'status' => 404,
                'people' => 'No Records Found'  
            ], 404);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:15',
            'last_name' => 'required|string|max:15',
            'phone_number' => 'required|digits:9',
            'email' => 'required|string|max:30',
            'country' => 'required|string|max:30',
            'city' => 'required|string|max:30',
            'street' => 'required|string|max:50',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        }
        else
        {
            $person = Person::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'phone_number' => $request->phone_number,
                'email' => $request->email,
                'country' => $request->country,
                'city' => $request->city,
                'street' => $request->street,
            ]);

            if($person){

                return response()->json([
                    'status' =>200,
                    'message' => "Person Created Succesfully"
                ],200);
            }
            else
            {
                return response()->json([
                    'status' =>500,
                    'message' => "Something Went Wrong"
                ],500);
            }

        }
    }

    public function show($id)
    {
       $person = Person::find($id);
       if ($person) 
       {
        return response()->json([
            'status' => 200,
            'person' => $person
        ], 200);
       }
       else
       {
        return response()->json([
            'status' => 404,
            'message' => "No Such Person Found"
        ], 404);
       }
    }

    public function edit($id)
    {
        $person = Person::find($id);
        if ($person) 
        {
         return response()->json([
             'status' => 200,
             'person' => $person
         ], 200);
        }
        else
        {
         return response()->json([
             'status' => 404,
             'message' => "No Such Person Found"
         ], 404);
        } 
    }

    public function update(request $request, int $id)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:15',
            'last_name' => 'required|string|max:15',
            'phone_number' => 'required|digits:9',
            'email' => 'required|string|max:30',
            'country' => 'required|string|max:30',
            'city' => 'required|string|max:30',
            'street' => 'required|string|max:50',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        }
        else
        {   
            $person = Person::find($id);
            if($person)
            {
            $person -> update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'phone_number' => $request->phone_number,
                'email' => $request->email,
                'country' => $request->country,
                'city' => $request->city,
                'street' => $request->street,
            ]);

                return response()->json([
                    'status' =>200,
                    'message' => "Person Updated Succesfully"
                ],200);
            }
            else
            {
                return response()->json([
                    'status' =>404,
                    'message' => "No Such Person Found"
                ],404);
            }

        }
    }

        public function destroy($id)
    {
        $person = Person::find($id);
        if($person)
        {
            $person->delete();
            return response()->json([
                'status' =>200,
                'message' => "Person Deleted Succesfully"
            ],200);
        }
        else
        {
            return response()->json([
                'status' =>404,
                'message' => "No Such Person Found"
            ],404);
        }
    }
        
}

   