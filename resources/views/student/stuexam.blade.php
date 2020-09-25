@extends('layouts.studentlayout')
@section('content')
@section('title','Student Exam')
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
                        <li class="breadcrumb-item active">Exam</li>
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
                            <table id="categorylist" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Sno</th>
                                        <th>Exam Name</th>
                                        <th>Exam Date</th>
                                        <th>Status</th>
                                        <th>Result</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>{{$data->title}}</td>
                                        <td>{{$data->exam_date}}</td>
                                        <td> <?php
                                            if(strtotime($data->exam_date)< strtotime(date('Y-m-d'))){
                                                echo "Completed";
                                            }else if(strtotime($data->exam_date)== strtotime(date('Y-m-d'))){
                                                echo "running";
                                            }else{
                                                echo "Pending";
                                            }
                                        ?>
                                        </td>
                                        <td>Not updated</td>
                                        <td>
                                             <a href="{{url('student/joinexam/'.$data->exam)}}" class="btn btn-warning">Join</a>
                                        </td>
                                   </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- ./col -->    
            </div>
        </div>
    </section>
</div>
@endsection