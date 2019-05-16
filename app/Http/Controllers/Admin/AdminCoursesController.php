<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use App\College;
use App\Course;
use App\User;
use App\Job;
use Session;
use Auth;
use Log;


class AdminCoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $users = User::where('id', Auth::user()->id)->get();
        $courses = Course::sortable()->paginate(10);;
        $colleges = College::pluck('college_name', 'id')->all();
        return view('admin.courses.index', compact('courses', 'users', 'colleges'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = Auth::user();
        $users = User::findOrFail($id);
        $colleges = College::pluck('college_name', 'id')->all();
        return view('admin.courses.create', compact('users', 'colleges'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseRequest $request)
    {
        $first_name = Auth::user()->first_name;
        $last_name = Auth::user()->last_name;
        $college_name = College::findOrfail($request->college_id)->college_name;
        $message = $first_name . ' ' . $last_name . ' <<CREATED A COURSE>> ' . '{' . 'course name:' . $request->course_name . ' ' . 
                  'college name:' . $college_name .'}';
        Log::info($message);
        Course::create($request->all());
        Session::flash('success', 'You successfully created a College');
        return redirect('/admin/courses');
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
        
        $users = User::where('id', Auth::user()->id)->get();
        $course = Course::findorfail($id);
        $colleges = College::pluck('college_name', 'id')->all();
        return view('admin.courses.edit', compact('course', 'users', 'colleges'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CourseRequest $request, $id)
    {
        $course = Course::findorFail($id);
        $first_name = Auth::user()->first_name;
        $last_name = Auth::user()->last_name;
        $college_name_new = College::findOrfail($request->college_id)->college_name;    
        $message = $first_name . ' ' . $last_name . ' <<UPDATED A COURSE FROM>> ' . '{' . 'course name:' . $course->course_name . ' ' . 
            'college name:' . $course->college->college_name .'}' . ' <<TO>> ' . '{' . 'course name:' . $request->course_name . ' ' . 'college name:' . $college_name_new .'}';
        Log::info($message);
        $course->update($request->all());
        Session::flash('success', 'You successfully updated a course');
        return redirect('/admin/courses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if (empty($request->course_val)){
            $cr_id = $id;
        }
        else{
            $cr_id = $request->course_val;
        }
        $course = Course::findorfail($cr_id);
        $job = Job::where('course_id', $cr_id)->get()->count();
        for($i = 0; $i < $job; $i++){
            $count = Job::where('course_id', $cr_id)->first();
            $count->course_id = null;
            $count->update();
        }
        $job = Job::withTrashed('course_id', $cr_id)->get()->count();
        for($i = 0; $i < $job; $i++){
            $count = Job::withTrashed('course_id', $cr_id)->first();
            $count->course_id = null;
            $count->update();
        }
        if($course->category_id == null){
            $college_name = "null";
        }
        else{
            $college_name = Announcement::findorFail($course)->college->college_name;
        }
        $first_name = Auth::user()->first_name;
        $last_name = Auth::user()->last_name;
        $message = $first_name . ' ' . $last_name . ' <<DELETED A COURSE>> ' . '{' . 'course name:' . $course->course_name . ' ' . 'college name:' . $college_name . '}';
        Log::info($message);
        $course->delete();
        Session::flash('success', 'You successfully deleted a course');
        return redirect('/admin/courses');
    }

    public function searchcourses(Request $request)
    {
        $event = $request->input('searchcourses');
        // $jobs = Job::where([
        //     ['company', 'like', '%' . request('searchcourses') . '%'],
        //     ['job_title', 'like', '%' . request('searchcourses') . '%'],
        
        // ])->get();
        $courses = Course::where('course_name', 'like', '%' . request('searchcourses') . '%')->get();  
        $users = User::where('id', Auth::user()->id)->get();
        $colleges = College::pluck('college_name', 'id')->all();    
        return view('admin.courses.search', compact('colleges', 'users','courses'));   
    }
}
