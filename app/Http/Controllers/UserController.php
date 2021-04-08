<?php

namespace App\Http\Controllers;

use App\Mail\MembershipMail;
use App\Mail\RegisteredMail;
use App\Models\JobTitle;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isAdmin')->except('show','edit','update','index');
        $this->middleware('isWebmaster')->only('validation','index');
        $this->middleware('isRealUser')->only('show','edit','update','password');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users',[
            'users'=>User::all(),
            'currentPage'=>'Our Team',
            'middlePage'=>null,
            'job_titles'=>JobTitle::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create.users',[
            'roles'=>Role::all(),
            'job_titles'=>JobTitle::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'src' => ['required', 'image'],
            'description' => ['max:1000'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);
        $user = new User();
        Storage::put('public/img/team',$request->file('src'));
        $user->src = $request->file('src')->hashName();
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->description) {
            $user->description = $request->description;
        }
        $tempPassword = Str::random(8);
        $user->password = Hash::make($tempPassword);
        $user->validated = true;
        $user->role_id = $request->role_id;
        $user->save();
        foreach ($request->job_title_id as $item) {
            $user->job_titles()->attach($item); 
        }
        $registered = [
            'name'=> $user->name,
            'email'=> $user->email,
            'password'=> $tempPassword,
            'description'=> $user->description,
            'src'=> $user->src,
            'validated'=>true,
        ];

        Mail::to($user['email'])->send(new RegisteredMail($registered));
        return redirect()->route('users.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user, Request $request)
    {
        return view('admin.profile',[
            'currentPage'=>$user->name."'s Profile",
            'middlePage'=>null,
            'user'=>$user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.edit.users',[
            'roles'=>Role::all(),
            'job_titles'=>JobTitle::all(),
            'user'=>$user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validate = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'src' => ['image'],
            'description' => ['required', 'string','max:1000'],
        ]);
        if ($request->email != $user->email) {
            $validate = $request->validate([
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                ]);
            $user->email = $request->email;
            }
        if($request->file('src')){
            // Storage::delete('public/img/team'.$user->src);
            Storage::put('public/img/team',$request->file('src'));
            $user->src = $request->file('src')->hashName();
        };
        $user->name = $request->name;
        $user->description = $request->description;
        if ($request->role_id) {
            $user->role_id = $request->role_id;
        }
        $user->save();
        if($request->job_title_id){
            $user->job_titles()->sync($request->job_title_id);
        }

        return redirect('/admin/users/'.$user->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index');
    }

    public function validation(User $user)
    {
        $user->validated = true;
        $user->save();

        Mail::to($user->email)->send(new MembershipMail($user));
        return redirect()->back();
    }

    public function editPassword(User $user)
    {
        return view('admin.edit.password',compact('user'));
    }

    public function password(User $user, Request $request){
        
        if (Hash::check($request->password, $user->password)) {
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect()->back()->with('status', 'Password Updated');
        } else {
            return redirect()->back()->with('status', "Passwords do not match");
        };
        
    }
}
