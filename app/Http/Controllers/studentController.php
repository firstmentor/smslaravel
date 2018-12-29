<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\student;
use Validator;
class studentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $students  = student::orderby('id','desc')->get();
        return view('students.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) //from data
    {
        $data = Validator::make($request->all(),[   //rules 
        "name"=>"required|max:255",
        "email"=>"required|max:255|unique:students|email"

        ],[

            "name.required" => "Name is nedded",
            "email.required" =>"Email is needed",
            "email.email" =>"Email should be valid email"

          ])->validate(); //auto redirect is page par

        $obj = new student;
        $obj->name = $request->name;
        $obj->email= $request->email;
        $is_saved = $obj->save();

        if($is_saved){

            session()->flash("studentMessage", "Student has been inserted");
            return redirect("students/create");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {  
       $student =  student::find($id);
        return view("students.edit",compact("student"));
        //return "this is my edit";

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $data = Validator::make($request->all(),[   //rules 
        "name"=>"required|max:255",
        "email"=>"required|max:255|email"

        ],[

            "name.required" => "Name is nedded",
            "email.required" =>"Email is needed",
            "email.email" =>"Email should be valid email"

          ])->validate(); //auto redirect is page par

          $student= student::find($id);
          $student->name=$request->name;
          $student->email =$request->email;
          $is_saved =$student->save();
          if($is_saved){

            session()->flash("studentMessage","Student has been update");
            return redirect("students");
               

    }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $student =student::find($id);
         $is_deleted = $student->delete();
         if($is_deleted){

            session()->flash("studentMessage","Student has been deleted");
            return redirect("students");
         }
    }
}
