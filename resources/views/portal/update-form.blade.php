@extends('layouts.portallayout')
@section('content')
@section('title','update form')
<!-- Content Header (Page header) -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Update Exam</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Update form</li>
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
                                <div class="col-sm-12">
                                    <form method="post" action="/exam_system/portal/fetchformdata" id="fetchformdata">
                                        {{csrf_field() }}
                                        <div class="form-group">
                                            <label for="number">Enter Number</label>
                                            <input type="number" class="form-control" name="number" id="number"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="dob">Enter Dob</label>
                                            <input type="date" class="form-control" name="dob" id="dob" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Select Course</label>
                                            <select class="form-control" name="exam" id="exam" required>
                                                <option value="select" selected disabled>Select Exam</option>
                                                @foreach($exmcategory as $cat)
                                                     <option value="{{$cat['id']}}">{{$cat['title']}}</option>
                                                @endforeach
                                            </select>
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