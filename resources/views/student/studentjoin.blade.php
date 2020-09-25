@extends('layouts.studentlayout')
@section('content')
@section('title','Student Exam portal')
<style>
.question_main {
    list-style: none;
    cursor: pointer;
    line-height: 28px;
    height: 113px;
}
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">All Exam List</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Exam Portal</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <h5>Time: 3 Hrs</h5>
                                </div>
                                <div class="col-md-4">
                                    <h5 class="text-center">Timer:<span class="js-timeout">60:00</span> </h5>
                                </div>
                                <div class="col-md-4">
                                    <h5 class="text-right">Status: Running</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <form action="{{url('student/submitexm')}}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="exmid" value="{{Request::segment(3)}}">
                            <div class="card-body">
                                <div class="row">
                                    @foreach($allquestion as $key=> $d)
                                    <div class="col-sm-12 qdiv">
                                        <p><b>{{$key+1}}.{{$d['question']}}</b></p>
                                    <?php
                                        $op = json_decode(json_encode(json_decode($d['option'])),true);
                                    ?>
                                        <ul class="question_main">
                                            <input type="hidden" name="ques{{$key+1}}" value="{{$d['id']}}">
                                            <li> <input type="radio" value="{{ $op['option1'] }}" name="ans{{$key+1}}"> {{ $op['option1'] }} </li>
                                            <li> <input type="radio" value="{{ $op['option2'] }}" name="ans{{$key+1}}"> {{ $op['option2'] }} </li>
                                            <li> <input type="radio" value="{{ $op['option3'] }}" name="ans{{$key+1}}"> {{ $op['option3'] }} </li>
                                            <li> <input type="radio" value="{{ $op['option4'] }}" name="ans{{$key+1}}"> {{ $op['option4'] }} </li>
                                        </ul>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="col-sm-12">
                                    <input type="hidden" name="index" value="{{$key+1}}">
                                    <button type="submit" class="btn btn-block btn-success">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- ./col -->
            </div>
        </div>
    </section>
</div>
@endsection