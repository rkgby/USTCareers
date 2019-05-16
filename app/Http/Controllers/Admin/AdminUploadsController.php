<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Student;
use Session;
use Auth;

class AdminUploadsController extends Controller
{
    public function index()
    {
        $users = User::where('id', Auth::user()->id)->get();
        return view('admin.uploads.index',compact('users'));
    }
    public function store(Request $request)
    {
        
        //get file
        $upload = $request->file('upload-file');
        $filePath = $upload->getRealPath();
        //open file
        $file = fopen($filePath, 'r');
        $header =fgetcsv($file);
        
        $escapedHeader = [];
        foreach($header as $key => $value){
            $lheader = strtolower($value);
            $escapedItem = preg_replace('/[^a-z_]/', '', $lheader);
            array_push($escapedHeader, $escapedItem);
        }
        // looping through other columns
        while($columns=fgetcsv($file)){
            if($columns[0]==""){
                continue;
            }
            foreach($columns as $key => $value){
                $val = preg_replace('/\D/', '', $value);

            }
            $data = array_combine($escapedHeader, $columns);
           

            foreach($data as $key => $value){
                $value=($key == 'role_id' || $key == 'is_active')?(integer)$value:(string)$value ;
            }

            $role_id = $data['role_id'];
            $is_active = $data['is_active'];
            $first_name = $data['first_name'];
            $last_name = $data['last_name'];
            $email = $data['email'];
            $password = $data['password'];
            $course = $data['course'];
            $student_number = $data['student_number'];
            
            $user = User::create();
            $user->role_id = $role_id;
            $user->is_active = $is_active;
            $user->first_name = $first_name;
            $user->last_name = $last_name;
            $user->email = $email;
            $user->password = bcrypt($password) ;
            $user->save();

            
            
            $student = Student::create();
            $student->user_id = $user->id;
            $student->course = $course;
            $student->student_number = $student_number;
            $student->save();
        
           
        }
        Session::flash('success', 'You successfully created new users.');
        return redirect('/admin/users');
    }
}