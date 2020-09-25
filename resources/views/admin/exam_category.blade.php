@extends('layouts.adminheader')
@section('content')
@section('title','Exam Category')
<!-- category modal -->
<!-- Modal -->
<div class="modal fade" id="addcategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <form method="post" action="{{url('admin/add_category')}}" id="addcategoryform">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Enter Category name</label>
                                <input type="text" class="form-control" id="catname" name="catname" required>
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
                    <h1 class="m-0 text-dark">Add categories</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">categories</li>
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
                        <div class="card-header">
                            <div class="card-title">Create New</div>
                            <a href="javascript:;" style="margin-left:92%;" data-toggle="modal"
                                data-target="#addcategory" class="btn btn-info btn-sm">Add New</a>
                        </div>

                        <div class="card-body">
                            <table id="categorylist" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Sno</th>
                                        <th>Category Name</th>
                                        <th>Status</th>
                                        <th>Created at</th>
                                        <th>Updated At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($category as $key => $cat)
                                    <tr>
                                        <td><?php echo $key+1 ?></td>
                                        <td><?php echo $cat['name']; ?></td>
                                        <td><?php echo $cat['status']; ?></td>
                                        <td><?php echo $cat['created_at']; ?></td>
                                        <td><?php echo $cat['updated_at']; ?></td>
                                        <td>
                                        <a href="{{url('admin/edit/'.$cat['id'])}}" class="btn btn-sm btn-info">Edit</a>
                                            <a href="{{url('admin/deletecat/'.$cat['id'])}}" class="btn btn-sm btn-secondary">Delete</a>
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