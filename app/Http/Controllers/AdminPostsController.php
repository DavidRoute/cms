<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CreateAdminPostsRequest;

use Illuminate\Support\Facades\Auth;

use App\Post;
use App\Category;
use App\Photo;


class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()    
    {
        $posts = Post::all();

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::lists('name', 'id')->all();

        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAdminPostsRequest $request)
    {
        $input = $request->all();

        $user = Auth::user();

        #For Photo
        if($request->hasFile('photo_id')) {

            $file = $request->file('photo_id');

            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name);

            $photo = Photo::create(['file' => $name]);

            $input['photo_id'] = $photo->id;                         
        }

        $user->posts()->create($input);

        return redirect('/admin/posts')->with('info', 'Create Post Successfully');
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
        $post = Post::findOrFail($id);

        $categories = Category::lists('name', 'id')->all();

        return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateAdminPostsRequest $request, $id)
    {
        $input = $request->all();

        $user = Auth::user();

        if($request->hasFile('photo_id')) {

            $file = $request->file('photo_id');

            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name);

            $photo = Photo::create(['file' => $name]);

            $input['photo_id'] = $photo->id;
        }

        $user->posts()->whereId($id)->first()->update($input);

        return redirect('/admin/posts')->with('info', 'Update Posts Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        unlink(public_path(). $post->photo->file);

        $post->delete();

        $post->photo()->delete();

        return redirect('/admin/posts')->with('info', 'Delete Post Successfyully');
    }
    
}
