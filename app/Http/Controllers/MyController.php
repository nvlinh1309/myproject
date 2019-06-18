<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
	//Controller
    public function getController($i,$j){
    	return $tong=$i+$j;
    }
    //View
    public function getView(){
    	//$data['user']=['My View 1','My View 2','My View 3'];
    	$data1['number']=1;
    	//return view('MyView',$data);
    	return view('MyView',$data1);
    }



    public function getPost(){
    	return view('TestBlade');
    }

    public function getLaravel(){
        if(isset($_SESSION['user'])){
            return view('home');
        }else{
            return view('login');
        }
        
    }
    public function postLaravel(Request $request){
         $request->validate([
             'mail'=> 'required|email',
             'pwd'=> 'required'
         ],[
             'mail.required'=>'Username must not null',
             'mail.email'=>'Email invalidate',
             'pwd.required'=>'Password must not null'
         ]);
        
    }
}
