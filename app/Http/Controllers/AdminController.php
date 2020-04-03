<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\application;
class AdminController extends Controller
{
    public function index(){
        $posts=application::all();
        return view('admin.dashboard')->with('posts',$posts);
    }
    public function edit(Request $request,$id){
        $post=application::find($id);
        return view('admin.edit')->with('post',$post);
    }
    public function update(Request $request,$id){
        // $id=$request->input('id');   
        $post=application::find($id);
        $selected=$request->input('Option');
        $post->status=$selected;
        
        if($post->update())
        return redirect('/admin')->with('success','Request Updated');
        else
        return redirect('/admin')->with('error','There is SOme Error');

    }
}
