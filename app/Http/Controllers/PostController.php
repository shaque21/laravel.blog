<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function all_post(){
        $data['result']=DB::table('posts')->orderBy('id','DESC')->get();
        return view('admin.post.all',$data);
    }
    public function submit_post(Request $request){
        //form validation
        $request->validate([
            'title'=>'required',
            'slug'=>'required|unique:posts,slug',
            'short_desc'=>'required',
            'full_desc'=>'required',
            'post_img'=>'required|mimes:png,jpg,jpeg',
            'post_date'=>'required'
        ]);
        //image file upload
        //$image=$request->file('post_img')->store('public/post');

        $image=$request->file('post_img');
        $ext=$image->extension();
        $file=time().'.'.$ext;
        $image->storeAs('/public/post',$file);
        
        //retrive all input data
        $data=array(
            'title'=>$request->input('title'),
            'slug'=>$request->input('slug'),
            'short_desc'=>$request->input('short_desc'),
            'full_desc'=>$request->input('full_desc'),
            'image'=>$file,
            'post_date'=>$request->input('post_date'),
            'status'=>1,
            'added_on'=>date('Y-m-d m:i:s')
        );

        //insert data into database's posts table
        DB::table('posts')->insert($data);
        $request->session()->flash('flash_smsg','Post Inserted Successfully !');
        return redirect('/admin/all_post');


    }

    public function delete_post(Request $request,$id){
        DB::table('posts')->where('id',$id)->delete();
        $request->session()->flash('flash_dmsg','Post Deleted Successfully !');
        return redirect('/admin/all_post');
    }
    public function edit_post(Request $request,$id){
        $data['result']=DB::table('posts')->where('id',$id)->get();
        return view('admin.post.edit',$data);
    }
    public function update_post(Request $request,$id){
        //form validation
        $request->validate([
            'title'=>'required',
            'slug'=>'required|unique:posts,slug',
            'short_desc'=>'required',
            'full_desc'=>'required',
            'post_img'=>'mimes:png,jpg,jpeg',
            'post_date'=>'required'
        ]);
        
        
        //retrive all form data
        $data=array(
            'title'=>$request->input('title'),
            'slug'=>$request->input('slug'),
            'short_desc'=>$request->input('short_desc'),
            'full_desc'=>$request->input('full_desc'),
            'post_date'=>$request->input('post_date'),
            'status'=>1,
            'added_on'=>date('Y-m-d m:i:s')
        );

        //image file upload
        //$image=$request->file('post_img')->store('public/post');

        if($request->hasFile('post_img')){
            $image=$request->file('post_img');
            $ext=$image->extension();
            $file=time().'.'.$ext;
            $image->storeAs('/public/post',$file);
            $data['image']=$file;
        }

        //update data into database's posts table
        DB::table('posts')->where('id',$id)->update($data);
        $request->session()->flash('flash_smsg','Post Updated Successfully !');
        return redirect('/admin/all_post');


    }
}
