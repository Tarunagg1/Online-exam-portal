<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\oex_category;
use App\oxe_exam_master;
use App\oex_students;
use App\oxe_question_master;
use App\oex_portal;
use App\oxe_result;

class studentcont extends Controller
{
    public function login(Request $req)
    {
        if($req->session()->get('studentexm')){
            return redirect('student/dashboard');
        }
        return view('student/login');
    }
    public function plogin(Request $req)
    {
        $stu = oex_students::where('email',$req->email)->get()->first();
        if($stu){
            if($stu->password == $req->password){
                $req->session()->put('studentexm',$stu->id);
                $arr = array('status'=>'true','message'=>'ijuhyg','load'=>"dashboard");                        
            }else{
                $arr = array('status'=>'false','message'=>'Password is wrong');                        
            }
        }else{
            $arr = array('status'=>false,'message'=>'user not exist');        
        }
        echo json_encode($arr);
    }
    public function logout(Request $req)
    {
        $req->session()->forget('studentexm');
        return redirect('student/login');
    }
    public function dashboard(Request $req)
    {
        if(!$req->session()->get('studentexm')){
            return redirect('student/login');
        }
        return view('student.studashboard');
    }
    public function exam(Request $req)
    {
        $id = $req->session()->get('studentexm');
        $data= oex_students::select('oex_students.*','oxe_exam_masters.title','oxe_exam_masters.exam_date')->join('oxe_exam_masters','oex_students.exam','=','oxe_exam_masters.id')->where('oex_students.id',$id)->get()->first();
        return view('student/stuexam',['data' => $data]);
    }
    public function joinexam(Request $req)
    {
        $data['allquestion'] = oxe_question_master::where('exam_id',$req->id)->get()->toArray();
        return view('student/studentjoin',$data);   
    }
    public function showresult($id)
    {
        $resultinfo =  oxe_result::where('id',$id)->get()->first();
        print_r($resultinfo);
    }

    public function submitexm(Request $req)
    {
        $writeans = 0;
        $wrongans = 0;
        $result = array();
        $data = $req->all();
        for($i=1; $i<=$req->index; $i++){
            if(isset($data['ques'.$i])){
                $dbquestion = oxe_question_master::where('id',$data['ques'.$i])->get()->first();
                if($dbquestion->ans == isset($data['ans'.$i])){
                    $result[$data['ques'.$i]] = 'True';
                    $writeans++;
                }else{
                    $result[$data['ques'.$i]] = 'False';
                    $wrongans++;
                }
            }   
        }
        $genres = new oxe_result;
        $genres->examid = $req->exmid;
        $genres->userid = $req->session()->get('studentexm');
        $genres->totalQ = $req->index;
        $genres->writeQ = $writeans;
        $genres->wrongQ = $wrongans;
        $genres->totalmark = $writeans;
        $genres->Resultjson = json_encode($result);
        $genres->save();
        if($genres->save()){
            $this->showresult($genres->id);
        }
    }
}
