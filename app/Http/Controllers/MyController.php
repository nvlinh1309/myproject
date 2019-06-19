<?php
namespace App\Http\Controllers;
use App\Http\Requests\myRequest;
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

    

    public function postLaravel(myRequest $request){
        $mail=$_POST['mail'];
        $pwd=$_POST['pwd'];
        if($mail=='laravel@gmail.com' && $pwd=='1234'){
            session()->put('mail',$mail);
            return redirect('home');
        }else{
           // $errors = new MessageBag(['errorlogin' => 'Email hoặc mật khẩu không đúng']);
    		//return redirect()->back()->withInput()->withErrors($errors);
        }
         
    }


    public function Logout(){
        session()->forget('mail');
        // delete all sesion
        // session()->flush();
        echo '<META http-equiv="refresh" content="0;URL=./">';
        
    }
    public function Login(){

        if(session()->has('mail')){
            return redirect('home');
        }else{
            return view('login');
        }
        
    }

    public function Home(){

        if(session()->has('mail')){
            return view('home');
        }else{
            return redirect('login');
        }
        
    }
}
