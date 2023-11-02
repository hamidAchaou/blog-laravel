<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Blog::all(); 
        return view('blogs.index', ['posts' => $posts]);
        // ->with();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image_post' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
    
        $slug = Str::slug($request->title, '-');
        $newImageName = uniqid() . '-' . $slug . '.' . $request->file('image_post')->extension();
        $request->image_post->move(public_path('images'), $newImageName);
    
        $posts = new Blog();
        
        $posts->slug = $slug;
        $posts->title = strip_tags($request->input('title'));
        $posts->description = strip_tags($request->input('description'));
        $posts->image_path = $newImageName;
        $posts->user_id = Auth::id();
    
        $posts->save();
    
        // return redirect()->route('blogs.show', ['id' => $posts->id]);
        return redirect()->route('blogs.show', $slug)
        ->with('success', 'Post added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $post = Blog::where('slug', $slug)->firstOrFail();
        return view('blogs.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $post = Blog::where('slug', $slug)->firstOrFail();
        return view('blogs.edit')
        ->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image_post' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $post = Blog::where('slug', $slug)->firstOrFail();
    
        $newslug = Str::slug($request->title, '-');
        if (!$post) {
            return redirect()->back()->with('error', 'Post not found.');
        }
    
        if ($request->hasFile('image_post')) {
            // Delete old image
            Storage::delete('public/images/'.$post->image_path);
        
            // Upload new image
            $newImageName = uniqid() . '-' . $newslug . '.' . $request->file('image_post')->extension();
            // $request->image_post->storeAs('public/images/', $newImageName);
            $request->image_post->move(public_path('images'), $newImageName);
            $post->image_path = $newImageName;
        }
    

        
        $post->slug = $newslug;
        $post->title = strip_tags($request->input('title'));
        $post->description = strip_tags($request->input('description'));
        $post->user_id = Auth::id();
    
        $post->save();
    
        return redirect()->route('blogs.show', $post->slug)->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        Blog::where('slug', $slug)->delete();
        // $to_delete = Blog::findOrFaile('$slug');
        // $to_delete->delete();
        return redirect()->route('blogs.index')->with('danger', 'Youre Post Deleted');
    }
}
