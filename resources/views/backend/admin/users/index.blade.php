@extends('backend.layouts.app')
@section('title')
    {{ __('Dashboard') }}
@endsection
@section('role') 
{{ __('ADMIN') }} 
@endsection 
@section('side-bar') 
        <li>
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
        <li><a href="{{ route('posts.index')}}"><i class="fa fa-book"></i> <span>POST</span></a></li>
@endsection 
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        LIST USERS
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
         <div class="col-sm-12">
                @if (session('status'))
                  <div class="alert alert-success">
                      {{ session('status') }}
                  </div>
                @endif
                </div>
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              @include('backend.layouts.modal')
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                 <tr>
                  <th><center>{{ __('No') }}</center></th>
                  <th><center>{{ __('Name') }}</center></th>
                  <th><center>{{ __('Email') }}</center></th>
                  <th><center>{{ __('Total Friend') }}</center></th>
                  <th><center>{{ __('Total Post') }}</center></th>
                  <th><center>{{ __('Action') }}</center></th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $index => $user)
                <tr>
                  <td class="center">{{ $index + 1 }}</td>
                  <td>{{$user->name}}</td>
                  <td>{{$user->email}}</td>
                  <td><center>{{count($user->totalFriend)}}</center></td>
                  <td><center>{{count($user->totalPost)}}</center></td>
                  <td><center>
                    <button style="color: red; border: 0; background:none;" title="detail" type="button" class="fa fa-info-circle btn-detail-item"
                      data-title="{{ __('DETAIL AUTHORS') }}"
                      data-confirm='
                        <div class="row" style="margin-left:20px">
                          <div class="row" style="margin-top:0px">
                            <div class="control-label col-sm-3">
                                <h7 style="font-size:16px; margin-top:5px;"><b>Name</b></h7>
                            </div>
                            <div class="col-sm-9">
                                <p>{{$user->name}}</p>
                            </div>
                          </div>
                          <div class="row" style="margin-top:15px">
                              <div class="control-label col-sm-3">
                                  <h7 style="font-size:16px; margin-top:5px;"><b>Gender</b></h7>
                              </div>
                              <div class="col-sm-9">
                                @if($user->gender == NULL)
                                  <p>None</p>
                                @elseif ($user->gender == 1)
                                  <p>Female</p>
                                @elseif ($user->gender == 2)
                                  <p>Male</p>
                                @endif
                              </div>
                          </div> 
                          <div class="row" style="margin-top:15px">
                              <div class="control-label col-sm-3">
                                  <h7 style="font-size:16px; margin-top:5px;"><b>Email</b></h7>
                              </div>
                              <div class="col-sm-9">
                                  <p>{{$user->email}}</p>
                              </div>
                          </div> 
                          <div class="row" style="margin-top:15px">
                            <div class="control-label col-sm-3">
                                <h7 style="font-size:16px; margin-top:5px;"><b>Total Posts</b></h7>
                            </div>
                            <div class="col-sm-9">
                                <p>{{count($user->totalPost)}}</p>
                            </div>
                          </div>
                          <div class="row" style="margin-top:15px">
                              <div class="control-label col-sm-3">
                                  <h7 style="font-size:16px; margin-top:5px;"><b>Avatar</b></h7>
                              </div>
                              <div class="col-sm-9">
                                <img src="{{$user->avatar_url}}" width="60px" height="80px">  
                              </div>
                          </div>
                          <div class="row" style="margin-top:15px">
                            <div class="control-label col-sm-3">
                                <h7 style="font-size:16px; margin-top:5px;"><b>Liking</b></h7>
                            </div>
                            <div class="col-sm-8">
                                <p>{{$user->liking}}</p>
                            </div>
                          </div>   
                        </div>
                      '>
                    </button>
                    <button style="color: red; border: 0; background:none;" id="btnBlock.4" data-toggle="modal" title="Block" data-target="#"><i class="fa fa-lock"></i></button>
                    </center></td>
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