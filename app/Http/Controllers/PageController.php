<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function all_page(){
        $data['result']=DB::table('pages')->orderBy('id','DESC')->get();
        return view('admin.page.all',$data);
    }
    public function submit_page(Request $request){
        //form validation
        $request->validate([
            'name'=>'required',
            'slug'=>'required|unique:pages,slug',
            'description'=>'required',
        ]);
        
        //retrieve all input data
        $data=array(
            'name'=>$request->input('name'),
            'slug'=>$request->input('slug'),
            'description'=>$request->input('description'),
            'status'=>1,
            'added_on'=>date('Y-m-d m:i:s')
        );

        //insert data into database's pages table
        DB::table('pages')->insert($data);
        $request->session()->flash('flash_smsg','Page Inserted Successfully !');
        return redirect('/admin/all_page');


    }

    public function delete_page(Request $request,$id){
        DB::table('pages')->where('id',$id)->delete();
        $request->session()->flash('flash_dmsg','Page Deleted Successfully !');
        return redirect('/admin/all_page');
    }
    public function edit_page(Request $request,$id){
        $data['result']=DB::table('pages')->where('id',$id)->get();
        return view('admin.page.edit',$data);
    }
    public function update_page(Request $request,$id){
        //form validation
        $request->validate([
            'name'=>'required',
            'slug'=>'required',
            'description'=>'required',
        ]);
        
        
        //retrieve all form data
        $data=array(
            'name'=>$request->input('name'),
            'slug'=>$request->input('slug'),
            'description'=>$request->input('description'),
            'status'=>1,
            'added_on'=>date('Y-m-d m:i:s')
        );

        //update data into database's pages table
        DB::table('pages')->where('id',$id)->update($data);
        $request->session()->flash('flash_smsg','Page Updated Successfully !');
        return redirect('/admin/all_page');


    }
}
