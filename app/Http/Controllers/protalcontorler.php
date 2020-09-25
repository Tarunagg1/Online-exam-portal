<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\oex_portal;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
class protalcontorler extends Controller
{
    public function portalsignup()
    {
        return view("portal/portalsignup");
    }
    public function userportalsignup(Request $req)
    {
        $isexit = oex_portal::where('email',$req->email)->get()->toArray();
        if($isexit){
            $arr = array('status'=>'fail','message'=>"user is exist");                
        }else{
            $portal = new  oex_portal();
            $portal->name = $req->name;
            $portal->email = $req->email;
            $portal->mobileno = $req->number;
            $portal->password = $req->password;
            $portal->status = 1;
            if($portal->save()){
                $arr = array('status'=>'true','message'=>"Portal Added success",'reload'=>url('portal/portal'));
            }else{
                $arr = array('status'=>'fail','message'=>"Database error accure");                
            }
        }
        echo json_encode($arr);
    }
    public function vlogin(){
        if(Session()->get("portaluser")){
            return redirect(url('portal/dashboard'));
        }
        return view("portal/login");
    }
    public function login(Request $req){
        $portal = oex_portal::where('email',$req->email)->where('password',$req->password)->get()->toArray();
        if($portal){
            if($portal[0]['status'] == 1){
                $req->session()->put("portaluser",$portal[0]['id']);
                $arr = array('status'=>'true','load'=>url('portal/dashboard'));                
            }else{
                $arr = array('status'=>'false','message'=>"User portal account is not active");                
            }
        }else{
            $arr = array('status'=>'false','message'=>"user email or password is incorrect");                
        }
        echo json_encode($arr);
    }
}