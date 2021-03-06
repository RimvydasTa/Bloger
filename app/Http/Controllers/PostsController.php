<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Session;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::orderBy('id', 'asc')->paginate(3);
        return view('pages.posts.index')->with('posts', $posts);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.posts.createPost');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Data validation
        $request->validate([
            'title' => 'required|max:255|unique:posts,title',
            'slug' => 'required|alpha_dash|max:255|min:5|unique:posts,slug',
            'body' => 'required|max:500'
        ]);
        //Store to db
        $post = new Post;

        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->body = $request->input('body');

        $request->session()->flash('success', 'The blog post was successfully saved!');
        //Redirect
        if ($post->save()){
            return redirect()->route('posts.show', $post->id);
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
        $post = Post::find($id);
        return view('pages.posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = Post::find($id);
        return view('pages.posts.edit')->withPost($post);
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
        //
        //Data validation
        $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|alpha_dash|max:255|min:5|unique:posts,slug',
            'body' => 'required|max:500'
        ]);
        //Store to db
        $post = Post::find($id);

        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->body = $request->input('body');

        $request->session()->flash('success', 'The blog post was successfully updated!');
        //Redirect
        if ($post->save()){
            return redirect()->route('posts.show', $post->id);
        }else {
            die();
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
        //

        $post = Post::find($id);
        $post->delete();
        session()->flash('success-delete', 'The blog post was successfully DELETED!');
        return redirect()->route('posts.index');
    }
}
