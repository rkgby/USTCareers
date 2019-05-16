<?php

namespace App\Http\Controllers\Counselor;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AnnouncementRequest;
use Illuminate\Support\Facades\Session;
use App\Announcement;
use App\Photo;
use App\Category;
use Illuminate\Http\Request;
use App\User;
use Log;



class CounselorAnnouncementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user();
        $users = User::where('id', Auth::user()->id)->get();
        $announcements = Announcement::sortable()->paginate(10);
        $categories = Category::pluck('category_name', 'id')->all();
        return view('counselor.announcements.index', compact('announcements', 'users','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = Auth::user();
        $users = User::where('id', Auth::user()->id)->get();
        $categories = Category::pluck('category_name', 'id')->all();
        return view('counselor.announcements.create', compact('categories', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnnouncementRequest $request)
    {
        $input = $request->all();
        $user = Auth::user();
        if($file = $request->file('photo_id')){
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id; 
        }
        $first_name = Auth::user()->first_name;
        $last_name = Auth::user()->last_name;
        $category_name = Category::findOrfail($request->category_id)->category_name;
        $message = $first_name . ' ' . $last_name . ' <<CREATED A ANNOUNCEMENT>> ' . '{' . 'title:' . $request->title . ' ' . 
                  'body:' . $request->body . ' '. 'category:'. $category_name.'}';
        Log::info($message);

        $user->announcements()->create($input);
        Session::flash('success', 'You successfully created an announcement');
        return redirect('/counselor/announcements');
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
        $idd = Auth::user();
        $users = User::where('id', Auth::user()->idd)->get();
        $announcement = Announcement::findorfail($id);
        $categories = Category::pluck('category_name', 'id')->all();
        return view('counselor.announcements.edit', compact('announcement','categories', 'users'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AnnouncementRequest $request, $id)
    {
        $input = $request->all();

        if($file = $request->file('photo_id')){
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id; 
        }
        $announcement = Announcement::findOrfail($id);
       
        if($announcement->category_id == null){
            $category_name = "null";
        }
        else{
            $category_name = Announcement::findorFail($id)->category->category_name;
        }
        $first_name = Auth::user()->first_name;
        $last_name = Auth::user()->last_name;
        $category = Category::findOrFail($request->category_id)->category_name;
        $message = $first_name . ' ' . $last_name . ' <<UPDATED A ANNOUNCEMENT FROM>> ' . '{' . 'title:' . $announcement->title . ' ' . 
                  'body:' . $announcement->body . ' '. 'category:'. $category_name.'}'. ' <<TO>> ' . 
                  '{' . 'title:' . $request->title . ' ' . 'body:' . $request->body . ' '. 'category:'. $category.'}';
        Log::info($message);

        Auth::user()->announcements()->whereId($id)->first()->update($input);
        Session::flash('success', 'You successfully updated an announcement');
        return redirect('/counselor/announcements');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if (empty($request->ann_val)){
            $anno_id = $id;
        }
        else{
            $anno_id = $request->ann_val;
        }
        $announcement = Announcement::findorfail($anno_id);
        $first_name = Auth::user()->first_name;
        $last_name = Auth::user()->last_name;
        if($announcement->category_id == null){
            $category_name = "null";
        }
        else{
            $category_name = $announcement->category->category_name;
        }
        $message = $first_name . ' ' . $last_name . ' <<TRASHED A ANNOUNCEMENT>> ' . '{' . 'title:' . $announcement->title . ' ' . 
                  'body:' . $announcement->body . ' '. 'category:'. $category_name.'}';
        Log::info($message);
       $announcement->delete();
       Session::flash('success', 'You successfully trashed an announcement');
       return redirect('/counselor/announcements');
    }

    public function trashed(){
        
        $users = User::where('id', Auth::user()->id)->get();
        $announcements = Announcement::onlyTrashed()->get();
     
        return view('counselor.announcements.trashed', compact('announcements', 'users'));
    }

    public function kill(Request $request){
        
        $anno_id = $request->anno_val;
        $announcement = Announcement::withTrashed()->where('id', $anno_id)->first();
        $first_name = Auth::user()->first_name;
        $last_name = Auth::user()->last_name;
        if($announcement->category_id == null){
            $category_name = "null";
        }
        else{
            $category_name = $announcement->category->category_name;
        }
        $message = $first_name . ' ' . $last_name . ' <<DELETED A ANNOUNCEMENT>> ' . '{' . 'title:' . $announcement->title . ' ' . 
                  'body:' . $announcement->body . ' '. 'category:'. $category_name.'}';
        Log::info($message);
        if($announcement->photo != null){
            unlink(public_path() . $announcement->photo->file);
        }
        $announcement->forceDelete();
        Session::flash('success', 'You successfully permanently deleted an announcement');
        return redirect('/counselor/announcements/trashed');
    }

    public function restore(Request $request){
        $anno_id = $request->anno_val;
        $announcement = Announcement::withTrashed()->where('id', $anno_id)->first();
        $first_name = Auth::user()->first_name;
        $last_name = Auth::user()->last_name;
        if($announcement->category_id == null){
            $category_name = "null";
        }
        else{
            $category_name = $announcement->category->category_name;
        }
        $message = $first_name . ' ' . $last_name . ' <<RESTORED A ANNOUNCEMENT>> ' . '{' . 'title:' . $announcement->title . ' ' . 
                  'body:' . $announcement->body . ' '. 'category:'. $category_name.'}';
        Log::info($message);
        $announcement->restore();
        Session::flash('success', 'You successfully restored an announcement');
        return redirect('/counselor/announcements');
    }
    public function searchevent(Request $request)
    {
        $event = $request->input('searchevent');
        // $jobs = Job::where([
        //     ['company', 'like', '%' . request('searchevent') . '%'],
        //     ['job_title', 'like', '%' . request('searchevent') . '%'],
        
        // ])->get();
        $announcements = Announcement::where('title', 'like', '%' . request('searchevent') . '%')->get();  
        $users = User::where('id', Auth::user()->id)->get();    
        $categories = Category::pluck('category_name', 'id')->all();
        return view('counselor.announcements.search', compact('announcements', 'users','categories'));
        
    }

   
}