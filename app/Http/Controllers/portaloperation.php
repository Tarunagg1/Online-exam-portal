<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\oex_category;
use App\oxe_exam_master;
use App\oex_students;
use App\oex_portal;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class portaloperation extends Controller
{
    public function dashboard(Request $req){
        if(!$req->session()->get("portaluser")){
            return redirect(url('portal/login'));
        }
        $data['portal_exam'] = oxe_exam_master::select('oxe_exam_masters.*','oex_categories.name as catname')->join('oex_categories','oxe_exam_masters.category','=','oex_categories.id')->orderBy('id','desc')->where('oxe_exam_masters.status','1')->get()->toArray();
        return view('portal/portaldashboard',$data);
    }
    public function exam_from($id){
        $data['id'] = $id;
        $examinfo = oxe_exam_master::where('id',$id)->get()->first();
        $data['exmtitle'] = $examinfo->title;
        $data['exmdate'] = $examinfo->exam_date;
        return view('portal/exam_form',$data);
    }

    public function exam_fromsubmit(Request $req){
        if(!$req->session()->get("portaluser")){
            return redirect(url('portal/login'));
        }
        $exmms = new oex_students();
        $exmms->name = $req->name;
        $exmms->email = $req->email;
        $exmms->number = $req->number;
        $exmms->password = $req->password;
        $exmms->dob = $req->dob;
        $exmms->exam = $req->examid;
        $exmms->status = 0;
        if($exmms->save()){
            $arr = array('status'=>'true','message'=>'Data Insert succeess','tsid'=>$exmms->id);
        }else{
            $arr = array('status'=>'false','message'=>'Database Error');
        }
        echo json_encode($arr);  
    }
    public function printr(Request $req,$id){
        if(!$req->session()->get("portaluser")){
            return redirect(url('portal/login'));
        }
        $userinfo = oex_students::where('id',$id)->get()->first();
        $exmtitle = oxe_exam_master::where('id',$userinfo->exam)->get()->first()->title;
        return view('portal/print',['userinfo'=>$userinfo,'exmtitle'=>$exmtitle]);
    }
    public function update_form(Request $req){
        if(!$req->session()->get("portaluser")){
            return redirect(url('portal/login'));
        }
        $data['exmcategory'] = oxe_exam_master::where('status','1')->get()->toArray();
        return view('portal/update-form',$data);
    }
    public function fetchformdata(Request $req){
        $data['examinfo'] = oxe_exam_master::where('id',$req->exam)->get()->first();
        $data['userinfo'] = oex_students::where('number',$req->number)->where('dob',$req->dob)->where('number',$req->number)->where('exam',$req->exam)->get()->first();
        if($data['userinfo']){
            return view('portal/userupdateform',$data);
        }else{
            return redirect('portal/update-form');
        }
    }
    public function exam_fromupdate(Request $req){
        if(!$req->session()->get("portaluser")){
            return redirect(url('portal/login'));
        }
        $exmms = oex_students::where('id',$req->id)->get()->first();
        $exmms->name = $req->name;
        $exmms->email = $req->email;
        $exmms->number = $req->number;
        $exmms->password = $req->password;
        $exmms->dob = $req->dob;
        if($exmms->update()){
            $arr = array('status'=>'true','message'=>'Data Updated succeess');
        }else{
            $arr = array('status'=>'false','message'=>'Database Error');
        }
        echo json_encode($arr);  
    }
    public function portallogout(Request $req)
    {
        $req->session()->forget('portaluser');
        return redirect('portal/login');
    }

}