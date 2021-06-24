<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use App\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $posts = Post::all();
        return view('admin.posts.index', compact('posts', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $categories = Category::all();
        $types = Type::all();

        return view('admin.posts.create', compact('categories', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|unique:posts|max:50',
            'content' => 'required',
            'author' => 'required|min:4',
            'category_id' => 'exists:categories,id|nullable',
            'types' => 'nullable|exists:types,id'
        ]);

        $data = $request->all();

        $new_post = new Post();

        $new_post['slug'] = Str::slug($data['title']);

        $new_post->fill($data);

        $new_post->save();

        if (array_key_exists('types', $data)) {
            $new_post->types()->attach($data['types']);
        }

        return redirect()->route('admin.posts.show', $new_post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        if (! $post) {
            abort(404);
        }
        
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $types = Type::all();


        return view('admin.posts.edit', compact('post', 'categories', 'types'));
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
        $request->validate([
            'category_id' => 'nullable|exists:categories,id',
            'title' => ['required', 'max:50', Rule::unique('posts')->ignore($id)],
            'content' => 'required',
            'author' => 'required|min:4',
            'type' => 'nullable|exists:types',

        ]);

        $data = $request->all();

        $post['slug'] = Str::slug($data['title']);

        $post = Post::find($id);
        
        $post->update($data);

        if (array_key_exists('types', $data)) {
            $post->types()->sync($data['types']);
        }
        

        return redirect()->route('admin.posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->types()->detach();

        $post->delete();

        return redirect()->route('admin.posts.index')->with('deleted', $post->title);
    }
}
