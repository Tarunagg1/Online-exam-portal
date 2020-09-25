@extends('layouts.portallayout')
@section('content')
@section('title','Exam Form')
<!-- Content Header (Page header) -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Manage Exam</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Exam form</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="content">
        <div class="conteiner-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h1 class="float-right">{{$exmtitle}}</h1>
                                </div>
                                <div class="col-sm-6">
                                    <h1 class="float-right">{{ date('d M Y',strtotime($exmdate)) }}</h1>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <form method="post" action="/exam_system/portal/exam_fromsubmit" id="exm-form" >
                                    {{csrf_field() }}
                                        <div class="form-group">
                                            <label for="name">Enter name</label>
                                            <input type="text" class="form-control" id="name" name="name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email address</label>
                                            <input type="email" class="form-control" name="email" id="email" required>
                                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                        </div>
                                        <input type="hidden" name="examid" value="<?php echo $id; ?>">
                                        <div class="form-group">
                                            <label for="number">Enter Number</label>
                                            <input type="number" class="form-control" name="number" id="number" required >
                                        </div>
                                        <div class="form-group">
                                            <label for="dob">Enter Dob</label>
                                            <input type="date" class="form-control" name="dob" id="dob" required >
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" name="password" id="password" required>
                                        </div>
                                       
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-wrapper -->
</div>
@endsection