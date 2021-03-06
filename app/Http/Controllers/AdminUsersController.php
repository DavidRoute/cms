<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CreateAdminUsersRequest;
use App\Http\Requests\UpdateAdminUsersRequest;

use App\User;
use App\Role;
use App\Photo;

class AdminUsersController extends Controller
{
    // public function __construct() {
    //     $this->middleware(['auth', 'admin']);
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::lists('name', 'id')->all();

        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAdminUsersRequest $request)
    {              
        $input = $request->all();

        #For Photo 
        if($request->hasFile('photo_id')) {

            $file = $request->file('photo_id');

            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name);

            $photo = Photo::create(['file' => $name]);

            $input['photo_id'] = $photo->id;            

        }

        // $input['password'] = bcrypt($request->password);

        User::create($input);

        return redirect()->route('admin.users.index')->with('info', 'Create User Successfully');

        
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
        $user = User::findOrFail($id);

        $roles = Role::lists('name', 'id')->all();

        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdminUsersRequest $request, $id)
    {
        $user = User::findOrFail($id);       

        #For Password
        if( trim($request->password) == '') {

            $input = $request->except('password');

        } else {

            $input = $request->all();
        }        

        #For Photo
        if($request->hasFile('photo_id')) {

            $file = $request->file('photo_id');

            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name);

            $photo = Photo::create(['file' => $name]);

            $input['photo_id'] = $photo->id;
        }

        $user->update($input);

        return redirect('/admin/users')->with('info', 'Update User Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        unlink(public_path(). $user->photo->file);

        $user->delete();

        $user->photo()->delete();  

        // session()->flash('info', 'Delete User Successfully');

        return redirect()->route('admin.users.index')->with('info', 'Delete User Successfully');
    }
    
}
