@extends('layouts.adminheader')
@section('content')
@section('title','Add Question')
<!-- category modal -->
<!-- Modal -->
<div class="modal fade" id="addexam" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Exam Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form method="post" action="{{url('admin/addquestion')}}" id="add_question">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="title">Enter Question</label>
                                <input type="text" class="form-control" id="question" placeholder="Enter Question"
                                    name="question" required>
                            </div>
                            <input type="hidden" name="exam_id" value="{{Request::segment(3)}}">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="title">Enter Option 1</label>
                                        <input type="text" class="form-control" id="op1" placeholder="Enter option 1"
                                            name="op1" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="title">Enter Option 2</label>
                                        <input type="text" class="form-control" id="op2" placeholder="Enter option 2"
                                            name="op2" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="title">Enter Option 3</label>
                                        <input type="text" class="form-control" id="op3" placeholder="Enter option 3"
                                            name="op3" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="title">Enter Option 4</label>
                                        <input type="text" class="form-control" id="op4" placeholder="Enter option 4"
                                            name="op4" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="title">Enter Right Option in [alphabet]</label>
                                        <input type="text" class="form-control" id="rq" placeholder="Enter option 4"
                                            name="rq" required>
                                </div>
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
                    <h1 class="m-0 text-dark">View all Question</h1>
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
                            <a href="javascript:;" style="margin-left:85%;" data-toggle="modal" data-target="#addexam"
                                class="btn btn-info btn-sm">Add Question</a>
                        </div>

                        <div class="card-body">
                            <table id="categorylist" class="table table-striped table-bordered" style="width:100%">
                                <thead> 
                                    <tr>
                                        <th>Sno</th>
                                        <th>Exam Title</th>
                                        <th>Question</th>
                                        <th>Status</th>
                                        <th>Exam Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($question as $key=> $que)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$que['title']}}</td>
                                            <td>{{$que['question']}}</td>
                                            <td> <input type="checkbox"  data-id="{{$que['id']}}" name="status" class="addquesstatus" <?php if($que['status'] == 1) { echo "checked"; } ?> >  </td>
                                            <td>{{$que['created_at']}}</td>
                                            <td>
                                            <a href="{{url('admin/deletequestion/'.$que['id'])}}" class="btn btn-sm btn-danger">Delete</a>
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