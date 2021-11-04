<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Provinces;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function __construct()
    {
        //middleware for permission create read update delete
        $this->middleware(['permission:users_read'])->only('index');
        $this->middleware(['permission:users_create'])->only('create');
        $this->middleware(['permission:users_update'])->only('edit');
        $this->middleware(['permission:users_delete'])->only('destroy');

    } // end for __construct

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd($request->search);
        $users = User::whereRoleIs('admin')->when($request->search,function ($query) use ($request){
            return $query->where('first_name', 'like', '%' . $request->search . '%')
            ->orWhere('last_name', 'like', '%' . $request->search . '%');
        })->latest()->paginate(7);

        // if($request->search){
        //     $users = User::where('name' ,'like', '%'.  $request->search .'%')->get();
        // }else{
        //     $users =  User::whereRoleIS('admin')->get();
        // }

        return view('ethics_booth.admin.users.index', compact('users'));

    }// end of index

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $provinces =  Provinces::all();
        return view('ethics_booth.admin.users.create',compact('provinces'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // for store new supervisor
        // dd($request->all());
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'location' => 'required',
            'job_title' => 'required',
            'mobile' => 'required|unique:users',
            'email' =>'required|unique:users',
            'permissions' =>'required',
            'password' =>'required|confirmed',
        ]);




        $request_data = $request->except(['password','password_confirmation','permissions']);
        $request_data['password'] = bcrypt($request->password);
        $user = User::create($request_data);
        $user->attachRole('admin');
        $user->syncPermissions($request->permissions);

        // session()->flash('success',__('app.added_Successfully'));
         return redirect()->route('users.index')->with('success' , __('app.added_Successfully'));
     }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        $provinces =  Provinces::all();
        return view('ethics_booth.admin.users.edit',compact('user','provinces'));
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
        //

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'job_title' => 'required',

        ]);




        $request_data = $request->except(['permissions']);
        $user->update($request_data);
        $user->syncPermissions($request->permissions);

        // session()->flash('success',__('app.added_Successfully'));
         return redirect()->route('users.index')->with('success' , __('app.updated_Successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        $user->delete();
        return  redirect()->route('users.index')->with('success' , __('app.removed_Successfully'));
    }
}
