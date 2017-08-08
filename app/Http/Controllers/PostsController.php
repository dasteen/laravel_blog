<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Post;
use Gate;

class PostsController extends Controller
{
    public function index(){
        
        $posts = Post::all();

        return view('index', compact('posts'));
    }
    
    public function show(Post $post){ //метод - Неявное привязывание модели
        
        // для использования в функцию show должен передаваться аргумент id
//        $post = Post::find($id);

        return view('posts.show', compact('post'));
    }
    
    public function create(){
        if (Gate::denies('make_post')) {
            abort(403);
        }
        else{
            return view('posts.create');
        }
    }
    
    public function store(){
        // один вариант создания записи
//        $post = new Post;                         
//        $post->title = request('title');          
//        $post->alias = request('alias');
//        $post->intro= request('intro');
//        $post->body = request('body');
//        $post->save();
        
        if (Gate::denies('make_post')) {
            abort(403);
        }
        else{
        
            $this->validate(request(), [
                'title' => 'required|min:2',
                'alias' => 'required',
                'intro' => 'required',
                'body' => 'required',
            ]);

            // второй вариант
            Post::create(
               request(array('title', 'alias', 'intro', 'body'))
            );

            return redirect('/');
        }
    }
    
    
    public function edit(Post $post){
        if (Gate::denies('make_post')) {
            abort(403);
        }
        else{
            return view('posts.edit', compact('post'));
        }
    }
    
    public function update(Post $post){
        
              
        
        if (Gate::denies('make_post')) {
            abort(403);
        }
        else{
            $this->validate(request(), [
                'title' => 'required|min:2',
                'alias' => 'required',
                'intro' => 'required',
                'body' => 'required',
            ]);

            $post->update(request(['title', 'alias', 'intro', 'body']));
            
            return redirect('/');
        }
    }
    
    public function destroy(Post $post){
        
        if (Gate::denies('make_post')) {
            abort(403);
        }
        else{
            $post->delete();
            return redirect('/');
        }
    }
    
}
