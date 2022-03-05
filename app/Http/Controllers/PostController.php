<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        return Post::all();
    }

    protected function show($id)
    {
        return Post::findOrFail($id);
    }

    public function store(Request $request){
       return Post::create([
            'title' => $request->input('title'),
            'content' => $request->input('content')
        ]);
    }

    public function destroy($id){
        return Post::destroy($id);
    }

    public function update($id){
        return Post::updated($id);
    }

    public function edit($id){
        return Post::updating($id);
    }
}
