<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use App\PostTag;

class PostController extends Controller
{
    public function index() {
        $posts = Post::all();

        return view('post.index', compact('posts'));
    }

    public function create() {
        $categories = Category::all();
        $tags = Tag::all();

        return view('post.create', compact('categories', 'tags'));
    }

    public function store() {
        $data = request()->validate([
            'title' => 'required|string',
            'content' => 'string',
            'image' => 'string',
            'category_id' => '',
            'tags' => ''
        ]);
        $tags = $data['tags'];
        unset($data['tags']);

        $post = Post::create($data);
        $post->tags()->attach($tags);
        
        return redirect()->route('post.index');
    }

    public function show(Post $post) {
        return view('post.show', compact('post'));
    }

    public function edit(Post $post) {
        $categories = Category::all();
        $tags = Tag::all();

        return view('post.edit', compact('post', 'categories', 'tags'));
    }

    public function update(Post $post) {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
            'category_id' => '',
            'tags' => ''
        ]);
        $tags = $data['tags'];
        unset($data['tags']);
        $post->update($data);
        $post->tags()->sync($tags);
        return redirect()->route('post.show', $post->id);
    }

    public function destroy(Post $post) {
        $post->delete();
        return redirect()->route('post.index');
    }

    public function delete() {
        $post = Post::withTrashed()->find(2);
        $post->restore();
        dd('deleted');
    }

    // firstOrCreate
    // updateOrCreate

    public function firstOrCreate() {
        $anotherPost = [
            'title' => 'Some post',
            'content' => 'Some content',
            'image' => 'someimg',
            'likes' => 500,
            'is_published' => 1,
        ];

        $post = Post::firstOrCreate([
            'title' => 'Some title from VS'
        ],[
            'title' => 'Some title from VS',
            'content' => 'Some content',
            'image' => 'someimg',
            'likes' => 500,
            'is_published' => 1,
        ]);
        dump($post->content);
        dd('finished');
    }

    public function updateOrCreate() {
        $anotherPost = [
            'title' => 'Update or create post',
            'content' => 'Update or create content',
            'image' => 'Update or create img',
            'likes' => 1200,
            'is_published' => 0,
        ];

        $post = Post::updateOrCreate([
            'title' => 'Some title from VS 2'
        ],[
            'title' => 'Some title from VS 2',
            'content' => 'Update or create content',
            'image' => 'Update or create img',
            'likes' => 100,
            'is_published' => 0,
        ]);
        dump($post->content);
        dd('finished');
    }
}
