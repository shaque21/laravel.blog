<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function contact_page(){
        $data['result']=DB::table('contacts')->orderBy('id','DESC')->get();
        return view('admin.contact.all',$data);
    }
}
