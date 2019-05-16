<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SubmissionRequest;
use App\Notifications\NewSubmissionNotification;
use App\Submission;
use App\User;
use Illuminate\Support\Facades\Session;
use Log;
use App\Student;
use Auth;

class StudentSubmissionController extends Controller
{
    public function index()
    {
        $student = Student::where('user_id', 'LIKE', Auth::user()->id)->get();
        return view('student.submission.submission', compact('student'));
    }

    public function store(SubmissionRequest $request)
    {
       
        
        
        try {

            if($request->hasFile('resume')){
                $filenameWithExt = $request->file('resume')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('resume')->getClientOriginalExtension();
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                $path = $request->file('resume')->move('resumes', $fileNameToStore);
            }
            $submission = new Submission;
            $submission->fname = $request->input('fname');
            $submission->lname = $request->input('lname');
            $submission->studnum = $request->input('studnum');
            $submission->course = $request->input('course');
            $submission->emailadd = $request->input('emailadd');
            if($request->hasFile('resume')){
                $submission->resume = encrypt($fileNameToStore);
            }
           
            $submission->save();
            $sub_id = $submission->id;
            $counselors = User::where('role_id', 2)->get();
            foreach($counselors as $counselor){
                User::find($counselor->id)->notify(new NewSubmissionNotification($sub_id,$submission));
            }
            $message = $request->fname . ' ' . $request->fname . ' <<SUBMITTED A RESUME>> ' . '{'. 'student_number:'. 
                       $request->studnum. ' '. 'course:' . $request->course. ' '.   'email:'. $request->emailadd. '}';
            Log::info($message);
            // Session::flash('success', 'You successfully uploaded your resume.');
            return redirect('/student/resume');
        }
        catch (QueryException $e){
                return redirect('/submission/create')->with('error', 'Duplicate in the database found. Please fill-up the form properly.');
        }
    }
}