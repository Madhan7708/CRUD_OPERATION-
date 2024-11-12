<?php

namespace App\Http\Controllers;
use App\Models\Tih;
use Illuminate\Http\Request;

class crudController extends Controller
{
    public function index(){
        $data=Tih::all();
        return view('welcome',compact("data")); 
    }

    public function adduser(Request $add)
    {
        try {
            $add->validate([
                'name' => 'required',
                'dept' => 'required'
            ]);

            Tih::create([
               'Name' => $add->name,     //left side is the Database table column Name
                'dept' => $add->dept
            ]);

            // Tih::create($add->all());    //both input and table column match use this

            return response()->json([
                'status' => 200,
                'message' => 'User added successfully!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Something went wrong!'
            ]);
        }
    }

    public function deluser($id)
    {
        try {
            $deluser = Tih::findOrFail($id);
            $deluser->delete();

            return response()->json([
                'status' => 200,
                'message' => 'User deleted successfully!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Something went wrong!'
            ]);
        }
    }
    
    public function editviewuser($id)
    {
        try {
            $edituser = Tih::findOrFail($id);

            return response()->json([
                'status' => 200,
                'data' => [
                    'id' => $edituser->id,
                    'Name' => $edituser->Name,                     //for edit both side match same element name
                    'dept' => $edituser->dept
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 404,
                'message' => 'User not found!'
            ]);
        }  
    }

    public function edituser(Request $request, $id)
    {
        try {

            $edituser = Tih::findOrFail($id);


            $edituser->update([
                'Name' => $request->name,
                'dept' => $request->dept
            ]);
            // $edituser->update($request->all());

            return response()->json([
                'status' => 200,
                'message' => 'User Updated successfully!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Something went wrong!'
            ]);
        }
    }
}
