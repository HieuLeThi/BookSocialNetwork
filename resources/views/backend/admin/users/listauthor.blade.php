@extends('backend.layouts.app')
@section('title')
    {{ __('Dashboard') }}
@endsection
@section('role') 
{{ __('ADMIN') }} 
@endsection 
@section('side-bar') 
        <li class="active treeview">
          <a href="{{ route('admin.index') }}">
            <i class="fa fa-dashboard"></i> <span>DASHBOARD</span>
          </a>
        </li>
        
        <li class="treeview">
            <a href="#">
            <i class="fa fa-user"></i>
            <span>ACCOUNT</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: none;">
            <li><a href="{{route('users.index')}}"><i class="fa fa-circle-o"></i> User</a></li>
            <li><a href="{{route('authors.index')}}"><i class="fa fa-circle-o"></i> Author</a></li>
          </ul>
        </li>
        <li class="treeview">
            <a href="#">
            <i class="fa fa-book"></i>
            <span>LIST BOOKS</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: none;">
            <li><a href="{{ route('listbook.index')}}"><i class="fa fa-circle-o"></i>BOOKS</a></li>
            <li><a href="{{ route('bookapproval.index')}}"><i class="fa fa-circle-o"></i>BOOKS REQUIRE APPROVAL</a></li>
          </ul>
        </li>
@endsection 
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        LIST AUTHORS
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Account</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                 <tr>
                  <th><center>{{ __('No') }}</center></th>
                  <th><center>{{ __('Name') }}</center></th>
                  <th><center>{{ __('Email') }}</center></th>
                  <th><center>{{ __('Total Book') }}</center></th>
                  <th><center>{{ __('Action') }}</center></th>
                </tr>
                </thead>
                <tbody>
                @foreach($authors as $index => $author)
                <tr>
                  <td class="center"><center>{{ $index + 1 }}</center></td>
                  <td>{{$author->name}}</td>
                  <td>{{$author->email}}</td>
                  <td><center>{{$author->bookByAuthor->count()}}</center></td>
                  <td><center>
                    <button style="color: red; border: 0; background:none;" id="btnBlock.0" data-toggle="modal" title="Detail" data-target="#showProfile" onclick="showProfile(&quot;1&quot;)"><i class="fa fa-info-circle"></i></button>
                    <button style="color: red; border: 0; background:none;" id="btnBlock.0" data-toggle="modal" title="Block" data-target="#" onclick="blockUser(&quot;1&quot;,&quot;1&quot;)"><i class="fa fa-lock"></i></button></center></td>
                </tr>
                @endforeach
                </tbody>
              </table>
              <!-- .pagination -->
              <div class="text-right">
                
              </div>
              <!-- /.pagination -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

    
    <!-- /.content -->
@endsection