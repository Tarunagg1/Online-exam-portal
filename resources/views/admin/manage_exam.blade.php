@extends('layouts.adminheader')
@section('content')
@section('title','Manage Exam')
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
                        <form method="post" action="{{url('admin/add_exm')}}" id="exam_add">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="title">Enter Title</label>
                                <input type="text" class="form-control" id="exmtitle" placeholder="Enter Title"
                                    name="exmtitle" required>
                            </div>
                            <div class="form-group">
                                <label for="title">Enter Exam Date</label>
                                <input type="date" class="form-control" id="exmdate" placeholder="Enter Date"
                                    name="exmdate" required>
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
                    <h1 class="m-0 text-dark">Manage Exam</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Manage Exam</li>
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
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Status</th>
                                        <th>Exam Date</th>
                                        <th>Updated At</th>
                                        <th>Action</th>
                                        <th>Add Question</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($exmlist as $key1 => $exam)
                                    <tr>
                                        <td>{{ $key1+1 }}</td>
                                        <td>{{ $exam['title'] }}</td>
                                        <td>{{ $exam['catname'] }}</td>
                                        <td> <input type="checkbox"  data-id="{{$exam['id']}}" name="status" class="exmstatus" <?php if($exam['status'] == 1) { echo "checked"; } ?> >  </td>
                                        <td>{{ $exam['exam_date'] }}</td>
                                        <td>{{ $exam['updated_at'] }}</td>
                                        <td>
                                            <a href="{{url('admin/deleteexm/'.$exam['id'])}}" class="btn btn-sm btn-danger">Delete</a>
                                        </td>
                                        <td>
                                            <a href="{{url('admin/addquestion/'.$exam['id'])}}" class="btn btn-sm btn-info">Add Question</a>
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