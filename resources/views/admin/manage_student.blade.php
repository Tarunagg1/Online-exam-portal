@extends('layouts.adminheader')
@section('content')
@section('title','Manage Student')
<!-- category modal -->
<!-- Modal -->
<div class="modal fade" id="addexam" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Exam Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <form method="post" action="{{url('admin/add_student')}}" id="add_stu">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="name">Enter Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Enter name" name="name"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="email">Enter Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter email"
                                    name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="number">Enter number</label>
                                <input type="number" class="form-control" minlength="10" id="number"
                                    placeholder="Enter number" name="number" required>
                            </div>
                            <div class="form-group">
                                <label for="dob">Enter Dob</label>
                                <input type="date" class="form-control" id="dob" placeholder="Enter Date"
                                    name="dob" required>
                            </div>
                            <div class="form-group">
                                <label for="title">Select Category</label>
                                <select name="exmcategory" class="form-control" id="exmcategory" required>
                                    <option value="">----------- Select Category ------------ </option>
                                    @foreach($category as $cat)
                                    <option value="{{$cat['id']}}">{{$cat['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="password">Enter Password</label>
                                <input type="Password" class="form-control" id="Password" placeholder="Enter Password"
                                    name="Password" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end category modal -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Manage Student</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Manage Student</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="content">
        <div class="conteiner-fluid">
            <div class="roe">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Create New</div>
                            <a href="javascript:;" style="margin-left:92%;" data-toggle="modal" data-target="#addexam"
                                class="btn btn-info btn-sm">Add Exam</a>
                        </div>

                        <div class="card-body">
                            <table id="categorylist" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Sno</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Number</th>
                                        <th>Exam</th>
                                        <th>Exam Date</th>
                                        <th>Created At</th>
                                        <th>Result</th>
                                        <th>status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($studentlist as $key=> $data)
                                        <tr>
                                             <td>{{ $key+1 }}</td>  
                                             <td>{{ $data['name'] }}</td>  
                                             <td>{{ $data['email'] }}</td>  
                                             <td>{{ $data['number'] }}</td>  
                                             <td>{{ $data['title'] }}</td>  
                                             <td>{{ $data['exam_date'] }}</td>  
                                             <td>{{ $data['created_at'] }}</td>  
                                             <td>Na</td>  
                                             <td><input type="checkbox"  class="studentstatus" data-id="<?php echo $data['id']; ?>" <?php if($data['status'] == 1){ echo "checked"; }?>></td>  
                                             <td>
                                             <a href="{{url('admin/studentdelete/'.$data['id'])}}" class="btn btn-sm btn-danger">Delete</a>
                                             </td>    
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.content-wrapper -->
@endsection