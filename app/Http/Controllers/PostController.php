<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function listPosts(){
        $posts = Post::all();
        return view('posts.posts', compact('posts'));

    }
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3|max:255',
            'Description' => 'required|min:3|max:255',
            'category_id'=>'required|exists:categories,id',
            'cover'=>'mimes:jpg,jpeg,png|max:5040'
        ]);

        $posts = new Post();
        $posts->title = $request->title;
        $posts->Description = $request->Description;
        if ($request->hasFile('cover')) {
            $posts->cover = $request->file('cover')->store('images/posts');
        }
        $posts->category_id = $request->category_id;
        $posts->save();
        return redirect()-> route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $details = Post::find($id);
        $details->increment('views');
        return view('posts.details', compact('details'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $posts = Post::findOrFail($id);
        return view('posts.edit', compact('posts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'Required|min:2|max:255',
            'Description' => 'required|min:3|max:255',
            'category_id'=>'required|exists:categories,id',
            'cover'=>'mimes:jpg,jpeg,png|max:5040'
        ]);
        $posts = Post::findOrFail($id);
        $posts->title = $request->title;
        $posts->Description = $request->Description;
        if ($request->hasFile('cover')) {
            $posts->cover = $request->file('cover')->store('images/posts');
        }
        $posts->category_id = $request->category_id;
        $posts->save();
        return redirect()->route('posts.index')->with('success', 'Le post a été mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('posts.index');
    }
}
