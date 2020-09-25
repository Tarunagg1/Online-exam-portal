<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\oex_category;
use App\oxe_exam_master;
use App\oex_students;
use App\oex_portal;
use App\oxe_question_master;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class admin extends Controller
{
    public function index(){
        return view("admin.dashboard");
    }
    public function exam_category(){
        $data['category'] = oex_category::get()->toArray();
        return view('admin.exam_category',$data);
    }

    public function add_category(Request $request){
        $validator = validator::make($request->all(),['catname'=>'required']);
        if($validator->passes()){
             $re = DB::table('oex_categories')->where('name',$request->catname)->count();
            if($re){
                $arr = array('status'=>'false','message'=>"AllReady Exits");
            }else{
                $cat = new oex_category();
                $cat->name = $request->catname;
                $cat->status = '1';
                $cat->save();
                $arr = array('status'=>'true','message'=>'success','reload'=>url('admin\examcategory'));        
            }
        }else{
            $arr = array('status'=>'false','message'=>$validator->errors()->all());
        }
        echo json_encode($arr);
    }

    public function deletecat($id){
        $cat = oex_category::where('id',$id)->first();
        $cat->delete();
        return redirect(url('admin/examcategory'));   
    }

    public function editcat($id){
        $cat = oex_category::where('id',$id)->get()->first();
        return view('admin.editcat',['cat'=>$cat]);
    }

    public function updatcat(Request $request){
        $cat = oex_category::where('id',$request->id)->get()->first();
        $cat->name = $request->catname;
        $cat->updated_at = now();
        $cat->update();
        return redirect(url('admin/examcategory'));
    }

    public function manage_exam(){
        $data['category'] = oex_category::orderBy('id','desc')->where('status','1')->get()->toArray();
        $data['exmlist'] = oxe_exam_master::select('oxe_exam_masters.*','oex_categories.name as catname')->join('oex_categories','oxe_exam_masters.category','=','oex_categories.id')->orderBy('id','desc')->get()->toArray();
        return view("admin.manage_exam",$data);
    }
    public function addexm(Request $req){
        $validator = Validator::make($req->all(),['exmtitle'=>'required','exmdate'=>'required','exmcategory'=>'required']);
        if($validator->passes()){
            $exmmaster = new oxe_exam_master();
            $exmmaster->title = $req->exmtitle;
            $exmmaster->category = $req->exmcategory;
            $exmmaster->exam_date = $req->exmdate;
            $exmmaster->status  = 1;
            if($exmmaster->save()){
                $arr = array('status'=>'true','message'=>"Exam Added success",'reload'=>url('admin/manage_exam'));
            }else{
                $arr = array('status'=>'false','message'=>'Some error accure');                
            }
        }else{
            $arr = array('status'=>'false','message'=>$validator->errors()->all());
        }
        echo json_encode($arr);
    }
    public function exmstatus($id){
        $exm = oxe_exam_master::where('id',$id)->get()->first();
        if($exm->status == 1)
            $status = 0;
        else
            $status = 1;
        $exm1 = oxe_exam_master::where('id',$id)->get()->first();
        $exm1->status = $status;
        if($exm1->update())
            echo "Status Updated";
        else
            echo "error";
    }
    public function deleteexm($id){
        $exm = oxe_exam_master::where('id',$id)->get()->first();
        $exm->delete();
        return redirect(url('admin/manage_exam'));
    }
    public function addquestion(Request $req)
    {
        $data['question'] = oxe_question_master::select('oxe_question_masters.*','oxe_exam_masters.title')->join('oxe_exam_masters','oxe_question_masters.exam_id','=','oxe_exam_masters.id')->where('oxe_question_masters.exam_id',$req->id)->get()->toArray();
        return view('admin/addquestion',$data);
    }
    public function addquesstatus(Request $req)
    {
        $id = $req->id;
        $exm = oxe_question_master::where('id',$id)->get()->first();
        if($exm->status == 1)
            $status = 0;
        else
            $status = 1;
        $exm1 = oxe_question_master::where('id',$id)->get()->first();
        $exm1->status = $status;
        if($exm1->update())
            echo "Status Updated";
        else
            echo "error";
    }
    public function deletequestion(Request $req)
    {
        $ddata = oxe_question_master::where('id',$req->id)->get()->first();
        $exmid = $ddata->exam_id;
        $ddata->delete();
        return redirect('admin/addquestion/'.$exmid);
    }
    public function manage_student(){
        $data['category'] = oex_category::orderBy('id','desc')->where('status','1')->get()->toArray();
        $data['studentlist'] = oex_students::select('oex_students.*','oxe_exam_masters.title','oxe_exam_masters.exam_date')->join('oxe_exam_masters','oex_students.exam','=','oxe_exam_masters.id')->get()->toArray();
        return view('admin/manage_student',$data);
    }
    public function addstudent(Request $req){
        $validator = Validator::make($req->all(),['name'=>'required','email'=>'required','number'=>'required','dob'=>'required','exmcategory'=>'required','Password'=>'required']);
        if($validator->passes()){
            $student = new oex_students();
            $student->name = $req->name;
            $student->email = $req->email;
            $student->number= $req->number;
            $student->dob = $req->dob;
            $student->exam = $req->exmcategory;
            $student->password = $req->Password;
            $student->status = 1;
            if($student->save())
                $arr = array('status'=>'true','message'=>"Exam Added success",'reload'=>url('admin/manage_exam'));
            else
            $arr = array('status'=>'fail','message'=>"Database error accure");                
        }else{
            $arr = array('status'=>'fail','message'=>$validator->error()->all());
        }
        echo json_encode($arr);
    }
    
    public function studentstatus($id){
        $exm = oex_students::where('id',$id)->get()->first();
        if($exm->status == 1)
            $status = 0;
        else
            $status = 1;
        $exm1 = oex_students::where('id',$id)->get()->first();
        $exm1->status = $status;
        if($exm1->update())
            echo "Status Updated";
        else
            echo "error";
    }
    public function studentdelete($id){
        $stu = oex_students::where('id',$id)->first();
        $stu->delete();
        return redirect(url('admin/manage_student'));   
    }
    public function portal(){
        $data['plotallist'] = oex_portal::orderby('id','desc')->get()->toArray();
        return view('admin/manageportal',$data);
    }
    public function addquestiondb(Request $req)
    {
        $validator = Validator::make($req->all(),['question'=>'required','exam_id'=>'required','op1'=>'required','op2'=>'required','op4'=>'required','op3'=>'required','rq'=>'required']);
        if($validator->passes()){
            $newques = new oxe_question_master();
            $newques->exam_id = $req->exam_id;
            $newques->question = $req->question;
            $newques->ans = $req->rq;
            $newques->option = json_encode(array('option1'=>$req->op1,'option2'=>$req->op2,'option3'=>$req->op3,'option4'=>$req->op4));
            $newques->status = 1;
            if($newques->save()){
                $arr = array('status'=>'true','message'=>"Question Added success");
            }else{
                $arr = array('status'=>'fail','message'=>"Database error accure");                
            }
        }else{
            $arr = array('status'=>'fail','message'=>$validator->error()->all());
        }
        echo json_encode($arr);
    }
    public function addportal(Request $req)
    {
        $validator = Validator::make($req->all(),['name'=>'required','email'=>'required','number'=>'required','Password'=>'required']);
        if($validator->passes()){
            $portal = new  oex_portal();
            $portal->name = $req->name;
            $portal->email = $req->email;
            $portal->mobileno = $req->number;
            $portal->password = $req->Password;
            $portal->status = 1;
            if($portal->save()){
                $arr = array('status'=>'true','message'=>"Portal Added success",'reload'=>url('admin/portal'));
            }else{
                $arr = array('status'=>'fail','message'=>"Database error accure");                
            }
        }else{
            $arr = array('status'=>'fail','message'=>'All field require');
        }
        echo json_encode($arr);   
    }
    public function deleteportauser($id)
    {
        $pos = oex_portal::where('id',$id)->get()->first();
        $pos->delete();
        return redirect(url('admin/portal'));
    }
}           
