@extends('backend.layouts.app') 
@section('title') 
{{ __('List Books') }} 
@endsection 
@section('role') 
{{ __('AUTHOR') }} 
@endsection 
@section('side-bar') 
<li class="active">
          <a href="{{ route('author.index') }}">
            <i class="fa fa-dashboard"></i> <span>DASHBOARD</span>
          </a>
        </li>
        <li>
          <a href="{{route('author.edit', ['id' => Auth::user()->id])}}">
            <i class="fa fa-user"></i> <span>PROFILE</span>
          </a>
        </li>
        <li>
          <a href="{{ route('books.index') }}">
            <i class="fa fa-book"></i> <span>LIST BOOK</span>
          </a>
        </li>
@endsection 
@section('content')
<!-- Content Wrapper. Contains page content -->
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      {{ __('LIST BOOKS') }}
    </h1>
    <ol class="breadcrumb">
      <li>
        <a href="#">
          <i class="fa fa-dashboard"></i> {{ __('Home') }}</a>
      </li>
      <li>
        <a href="#">{{ __('Books') }}</a>
      </li>
      <li class="active">{{ __('List') }}</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
          </div>
          <!-- /.box-header -->
          <div class="box-body">
          @include('backend.layouts.modal')
            <table id="example2" class="table table-bordered table-hover">
              <div class="row">
                <div class="col-sm-9">
                @if (session('status'))
                  <div class="alert alert-success">
                      <strong>{{ session('status') }}</strong>
                  </div>
                @endif
                </div>
                <div class="col-sm-1" style="margin-bottom: 15px;padding-left: 55px">
                  <a href="{{ route('books.create')}}"> 
                    <button class="btn btn-danger" title="Add new book" onclick="loadSubject()"><b><i class="fa fa-plus"></i></b></button>
                  </a>
                </div>
                <div class="col-sm-2" style="margin-top: 7px">Add new book</div>
              </div>
              
              <thead>
                <tr>
                  <th>{{ __('No') }}</th>
                  <th>{{ __('Name') }}</th>
                  <th>{{ __('Picture') }}</th>
                  <th>{{ __('Times Read')}}</th>
                  <th>{{ __('Time Reading') }}</th>
                  <th>{{ __('Rating') }}</th>
                  <th>{{ __('Action')}}</th>
                </tr>
              </thead>
              <tbody>
                @foreach($books as $index => $book)
                <tr class="item-{{ $book->id }}">
                  <td>{{ $index + $books->firstItem() }}</td>
                  <td>{{ $book->title}}</td>
                  <td><img width="50px" height="70px" src="../images/books/{{ $book->picture}}"></td>
                  <td>3</td>
                  <td>5</td>
                  <td>3.5</td>
                  <td>
                    <a href="{{ route('books.edit', $book->id) }}"><button style="color: red; border: 0; background:none;" title="update"><b><i class="fa fa-pencil-square-o"></i></b></button></a>
                    <form method="POST" action="{{ route('books.destroy', $book->id) }}" class="inline">
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
            <div class="text-right">
              {{ $books->appends(Request::except('page'))->links() }}
            </div>
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
<!-- /.content-wrapper -->
@endsection