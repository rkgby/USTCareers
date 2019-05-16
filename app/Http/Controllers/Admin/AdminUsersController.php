<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\UsersCreateRequest;
use App\Http\Requests\UsersEditRequest;
use Illuminate\Support\Facades\Session;
use App\User;
use App\Role;
use App\Photo;
use Illuminate\Http\Request;
use Auth;
use Hash;
use Log;



class AdminUsersController extends Controller
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
        $userss = User::sortable()->paginate(10);
        $roles = Role::pluck('name', 'id')->all();
        return view('admin.users.index', compact('users', 'userss','roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $roles = Role::pluck('name', 'id')->all();
        return view('admin.users.create', compact('roles', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersCreateRequest $request)
    {
        if(trim($request->password) == trim($request->password_confirmation)){
            $input = $request->all();
            $input['password'] = bcrypt($request->password);

            if($file = $request->file('photo_id')){
                $name = time() . $file->getClientOriginalName();
                $file->move('images', $name);
                $photo = Photo::create(['file'=>$name]);
                $input['photo_id'] = $photo->id; 
            }
            else{
                $input['photo_id'] = null;
            }
            User::create($input);
            $role = Role::findorFail($request->role_id)->name;
            if($request->is_active == 1){
                $active = 'active';
            }
            else{
                $active = 'not active';
            }
            $first_name = Auth::user()->first_name;
            $last_name = Auth::user()->last_name;
            $message = $first_name . ' ' . $last_name . ' <<CREATED A USER>> ' . '{' . 'name:' . $request->first_name .' '. 
                       $request->last_name. ' '.'email:'. $request->email.' ' .'role:'. $role . ' ' . 'is_active:'. 
                       $active . '}';
                    
            Log::info($message);
            Session::flash('success', 'You successfully created a user');
            return redirect('/admin/users');
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
        $user = User::findOrFail($id);
        $roles = Role::pluck('name', 'id')->all();
        return view('admin.users.edit', compact('user', 'roles', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersEditRequest $request, $id)
    {
        $request->validate([
            'first_name' => 'required|regex:/^[\pL\s]+$/u|max:50',
            'last_name' => 'required|regex:/^[\pL\s]+$/u|max:20',
            'email' => "required|email|unique:users,email,$id",
            'is_active' => 'required',
            'password' => 'confirmed|nullable',
            'photo_id' => 'mimes:jpeg,jpg,png | max:4096 | nullable',
        ]); 

        $user = User::findOrFail($id);
            $input = $request->all();
            if(!empty($request->password)) {
                $request->validate([
                    'password' => 'confirmed|min:8'
                ]); 
                $input['password'] = bcrypt($request->password);
            }
            else{
                $input['password'] = $user->password;
            }
            if($file = $request->file('photo_id')){
                $name = time() . $file->getClientOriginalName();
                $file->move('images', $name);
                $photo = Photo::create(['file'=>$name]);
                $input['photo_id'] = $photo->id;
            }
                
            if($user->is_active == 1){
                $activebefore = 'active';
            }
            else{
                $activebefore = 'not active';
            }
            if($request->is_active == 1){
                $active = 'active';
            }
            else{
                $active = 'not active';
            }
            $first_name = Auth::user()->first_name;
            $last_name = Auth::user()->last_name;
            $message = $first_name . ' ' . $last_name . ' <<UPDATED A USER FROM>> ' . '{' . 'name:' . $user->first_name .' '. 
                        $user->last_name. ' '.'email:'. $user->email.' ' .'role:'. $user->role->name . ' ' . 'is_active:'. 
                        $activebefore . '}' . ' <<TO>> ' . '{' . 'name:' . $request->first_name .' '. 
                        $request->last_name. ' '.'email:'. $request->email. ' ' . 'is_active:'. 
                        $active . '}';
            Log::info($message);
            $user->update($input);
            Session::flash('success', 'You successfully updated a user');
            return redirect('/admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if (empty($request->user_val)){
            $user_id = $id;
        }
        else{
            $user_id = $request->user_val;
        }
        $user = User::findOrFail($user_id);
        if($user->is_active == 1){
            $active = 'active';
        }
        else{
            $active = 'not active';
        }
        
        $first_name = Auth::user()->first_name;
        $last_name = Auth::user()->last_name;
        $message = $first_name . ' ' . $last_name . ' <<TRASHED A USER>> ' . '{' . 'name:' . $user->first_name .' '. 
            $user->last_name. ' '.'email:'. $user->email.' ' .'role:'. $user->role->name . ' ' . 'is_active:'. 
                    $active . '}';
        Log::info($message);
        $user->delete();
        Session::flash('success', 'You successfully trashed a user');
        return redirect('admin/users');
    }
    public function trashed(){
        $id = Auth::user();
        $users = User::where('id', Auth::user()->id)->get();
        $userss = User::onlyTrashed()->get();
        return view('admin.users.trashed', compact('userss', 'users'));
    }

    public function kill(Request $request){
        $user_id = $request->user_val;
        $user = User::withTrashed()->where('id', $user_id)->first();
        if($user->is_active == 1){
            $active = 'active';
        }
        else{
            $active = 'not active';
        }
        $first_name = Auth::user()->first_name;
        $last_name = Auth::user()->last_name;
        $message = $first_name . ' ' . $last_name . ' <<DELETED A USER>> ' . '{' . 'name:' . $user->first_name .' '. 
            $user->last_name. ' '.'email:'. $user->email.' ' .'role:'. $user->role->name . ' ' . 'is_active:'. 
                    $active . '}';
        Log::info($message);
        if($user->photo != null){
            unlink(public_path() . $user->photo->file);
        }
        $user->forceDelete();
        Session::flash('success', 'You successfully permanently deleted a user');
        return redirect('/admin/users/trashed');
    }

    public function restore(Request $request){
        $user_id = $request->user_val;
        $user = User::withTrashed()->where('id', $user_id)->first();
        if($user->is_active == 1){
            $active = 'active';
        }
        else{
            $active = 'not active';
        }
        $first_name = Auth::user()->first_name;
        $last_name = Auth::user()->last_name;
        $message = $first_name . ' ' . $last_name . ' <<RESTORED A USER>> ' . '{' . 'name:' . $user->first_name .' '. 
            $user->last_name. ' '.'email:'. $user->email.' ' .'role:'. $user->role->name . ' ' . 'is_active:'. 
                    $active . '}';
        Log::info($message);
        $user->restore();
        Session::flash('success', 'You successfully restored a user');
        return redirect('/admin/users');
    }

    public function searchuser(Request $request)
    {
        $event = $request->input('searchuser');
        // $jobs = Job::where([
        //     ['company', 'like', '%' . request('searchuser') . '%'],
        //     ['job_title', 'like', '%' . request('searchuser') . '%'],
        
        // ])->get();
        $userss = User::where('email', 'like', '%' . request('searchuser') . '%')->get();  
        $users = User::where('id', Auth::user()->id)->get();    
        $roles = Role::pluck('name', 'id')->all();
        return view('admin.users.search', compact('roles', 'users','userss'));
        
    }
}