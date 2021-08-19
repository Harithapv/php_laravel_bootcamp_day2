<?php

namespace App\Http\Controllers;
use App\Models\student;
use Facade\Ignition\Solutions\SuggestUsingCorrectDbNameSolution;
use Illuminate\Http\Request;

class usercontroller extends Controller
{

    public function index(){
        $student = student::all();
        return response()->json(['student'=>$student],200);
    }
    public function show($id){
        $student = student::find($id);
        if($student){
            return response()->json(['student'=>$student],200);
        }
        else{
            return response()->json(['message'=>'No record found'],404);
        }
    }
    public function store(Request $request)
    {
        $request->validate([
           'first_name'=>'required',
            'last_name'=>'required',
        ]);
        $student =  new Student;
        $student->first_name = $request->first_name;
        $student->last_name  = $request->last_name;
        $student->save();

        return response()->json(['message'=>'created successfully'],200);
    }


    public function delete($id)
    {
        $student = student::find($id);
        if($student){
            $student->delete();
            return response()->json(['message'=>'deleted successfully'],200);
        }
        else{
            return response()->json(['message'=>'not found'],404);
        }
    }
}
