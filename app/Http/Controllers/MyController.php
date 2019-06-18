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
}
