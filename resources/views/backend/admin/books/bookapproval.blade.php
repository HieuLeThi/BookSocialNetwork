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
        LIST BOOKS BE APPROVAL
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Book be approval</li>
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
                  <th>{{ __('No') }}</th>
                  <th>{{ __('Title') }}</th>
                  <th>{{ __('Author') }}</th>
                  <th>{{ __('Picture') }}</th>
                  <th>{{ __('Date Add') }}</th>
                  <th>{{ __('Action') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($books as $index => $book)
                <tr>
                  <td>{{ $index + 1}}</td>
                  <td>{{ $book->title }}</td>
                  <td>{{$book->name_author}}</td>
                  <td><img src="../images/books/{{$book->picture}}" width="60px" height="80px"></td>
                  <td>{{ date( 'd-M-Y', strtotime($book->created_at)) }}</td>
                  <td>
                    <form action="{{route('bookapproval.update', $book->id)}}" role="form" method="POST" enctype="multipart/form-data" class="inline">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                          <button style="color: red; border: 0; background:none;" title="detail" type="button" class="fa fa-info-circle btn-approval-item"
                            data-title="{{ __('DETAIL BOOKS') }}"
                            data-confirm='
                              <div class="row" style="margin-left:20px">
                                <div class="row" style="margin-top:0px">
                                  <div class="control-label col-sm-3">
                                      <h7 style="font-size:16px; margin-top:5px;"><b>Title</b></h7>
                                  </div>
                                  <div class="col-sm-9">
                                      <p>{{$book->title}}</p>
                                  </div>
                                </div>
                                <div class="row" style="margin-top:15px">
                                    <div class="control-label col-sm-3">
                                        <h7 style="font-size:16px; margin-top:5px;"><b>Topic</b></h7>
                                    </div>
                                    <div class="col-sm-9">
                                        <p>{{$book->name_topic}}</p>
                                    </div>
                                </div> 
                                <div class="row" style="margin-top:15px">
                                  <div class="control-label col-sm-3">
                                      <h7 style="font-size:16px; margin-top:5px;"><b>Author</b></h7>
                                  </div>
                                  <div class="col-sm-9">
                                      <p>{{$book->name_author}}</p>
                                  </div>
                                </div>
                                <div class="row" style="margin-top:15px">
                                  <div class="control-label col-sm-3">
                                      <h7 style="font-size:16px; margin-top:5px;"><b>ISBN</b></h7>
                                  </div>
                                  <div class="col-sm-9">
                                      <p>{{$book->isbn}}</p>
                                  </div>
                                </div>
                                <div class="row" style="margin-top:15px">
                                    <div class="control-label col-sm-3">
                                        <h7 style="font-size:16px; margin-top:5px;"><b>Picture</b></h7>
                                    </div>
                                    <div class="col-sm-9">
                                      <img src="../images/books/{{$book->picture}}" width="60px" height="80px">  
                                    </div>
                                </div>
                                <div class="row" style="margin-top:15px">
                                  <div class="control-label col-sm-3">
                                      <h7 style="font-size:16px; margin-top:5px;"><b>Description</b></h7>
                                  </div>
                                  <div class="col-sm-8">
                                      <p>{{$book->description}}</p>
                                  </div>
                                </div>   
                              </div>
                            '>
                          </button>
                    </form> 
                  <form action="{{route('bookapproval.update', $book->id)}}" role="form" method="POST" enctype="multipart/form-data" class="inline">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <button style="color: red; border: 0; background:none;" type="button" class="fa fa-check-circle btn-approval-item"
                      data-title="{{ __('Confirm approval') }}"
                      data-confirm="{{ __('Are you sure you want to approval') }} <strong>{{ $book->title }}</strong>">
                    </button>
                  </form> 
                  <form method="POST" action="{{ route('bookapproval.destroy', $book->id) }}" class="inline">
                          {{ csrf_field() }}
                          {{ method_field('DELETE') }}
                    <button style="color: red; border: 0; background:none;" type="button" class="fa fa-trash-o btn-delete-item"
                      data-title="{{ __('Confirm deletion') }}"
                      data-confirm="{{ __('Are you sure you want to delete') }} <strong>{{ $book->title }}</strong>">
                    </button>
                  </form> 
                  </td>
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