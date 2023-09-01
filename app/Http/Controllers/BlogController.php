<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required|min:3|max:100',
            'content' => 'required|max:1000',
            'blogImage' => 'nullable|image|mimes:jpeg,png,jpg',
        ]);
        $post = new Blog();
        $post->title = $request->title;
        $post->content = $request->input('content');
        if($request->hasFile('blogImage')){
            $filename = time().'_'.$request->file('blogImage')->getClientOriginalName();
            $request->file('blogImage')->storeAs('blogpostimages',$filename,'public');
            $post->image = $filename;
        }
        $user = Auth::user();
        $post->user_id = $user->id;
        $post->status = "active";
        $post->save();
        return redirect()->route('post')->with('success', 'Blog created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $blog = Blog::find($id);
        return view('Blog/edit',compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        //
        $request->validate([
            'title' => 'required|min:3|max:100',
            'content' => 'required|max:1000',
            'blogImage' => 'nullable|image|mimes:jpeg,png,jpg',
            'status'=> 'required|in:active,inactive',
        ]);
        $post = Blog::find($id);
        $post->title = $request->title;
        $post->content = $request->input('content');
        $post->status = $request->status;
        if($request->hasFile('blogImage')){
            $filename = time().'_'.$request->file('blogImage')->getClientOriginalName();
            $request->file('blogImage')->storeAs('blogpostimages',$filename,'public');
            $post->image = $filename;
        }
        $user = Auth::user();
        $post->user_id = $user->id;
        $post->save();
        return redirect()->route('post')->with('success', 'Blog updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $deletedpost = Blog::find($id);
        $deletedpost -> delete();
        return redirect()->route('post')->with('success', 'Blog deleted successfully!');
    }
}
