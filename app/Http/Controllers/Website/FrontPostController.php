<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class FrontPostController extends Controller
{
    public function home(){
        $data['result']=DB::table('posts')->orderBy('id','DESC')->get();
        return view('website.home',$data);
    }
    public function post($id){
        $data['result']=DB::table('posts')->where('slug',$id)->get();
        return view('website.post',$data);
    }
    public static function page_menu(){
        $result=DB::table('pages')->where('status',1)->get();
        return $result;
    }
    public function about_page($id){
        $data['result']=DB::table('pages')->where('slug',$id)->get();
        return view('website.about',$data);
    }
    public function contact_page($id){
        $data['result']=DB::table('pages')->where('slug',$id)->get();
        return view('website.contact',$data);
    }
    public function contact_submit(Request $request){
        //form validation
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'mobile'=>'required',
            'message'=>'required',
        ]);
        
        //retrieve all input data
        $data=array(
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'mobile'=>$request->input('mobile'),
            'message'=>$request->input('message'),
            'added_on'=>date('Y-m-d m:i:s')
        );

        //insert data into database's contacts table
        DB::table('contacts')->insert($data);
        return redirect('/');


    }
}
