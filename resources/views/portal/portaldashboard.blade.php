@extends('layouts.portallayout')
@section('content')
@section('title','dashboard')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Portal Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
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
                @foreach($portal_exam as $key=>$exm)
                <?php
                   if(strtotime(date('y-m-d')) > strtotime($exm['exam_date'])){
                        $cls = 'bg-danger';
                   }else{
                    if(($key+1) % 2 == 0)
                        $cls = "bg-info";
                    else
                        $cls = "bg-success";
                   }
                ?>
                <div class="col-lg-6 col-6">
                    <!-- small box -->
                    <div class="small-box {{$cls }}">
                        <div class="inner">
                            <h3>{{$exm['title']}}</h3>

                            <p>{{$exm['catname']}}</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        @if(strtotime(date('y-m-d')) < strtotime($exm['exam_date']))
                        <a href="exam_from/{{$exm['id']}}" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i></a> @endif
                    </div>
                </div>
                @endforeach
                <!-- ./col -->    
            </div>
        </div>
    </section>
</div>
@endsection