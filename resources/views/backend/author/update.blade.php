@extends('backend.layouts.app')
@section('title')
    {{ __('Dashboard') }}
@endsection
@section('role') 
{{ __('AUTHOR') }} 
@endsection 
@section('side-bar') 
<li class="active treeview">
          <a href="{{ route('author') }}">
            <i class="fa fa-dashboard"></i> <span>DASHBOARD</span>
          </a>
        </li>
        <li>
          <a href="pages/widgets.html">
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

  <section class="content-header">
    <h1>
      {{ __('EDIT BOOK') }}
    </h1>
    <ol class="breadcrumb">
      <li>
        <a href="#">
          <i class="fa fa-dashboard"></i> {{ __('Home') }}</a>
      </li>
      <li class="active">{{ __('Books') }}</li>
    </ol>
  </section>
  <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <form action="{{route('books.update', $book->id)}}" role="form" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
              <div class="box-body" style="margin: 0px 15px 0px 15px">
                
                <div class="row">
                  <div class="col-xs-12">
                    <div class="form-group">
                      <div class="row">
                        <div class="col-xs-12">
                          <label for="exampleInputTitle">{{ __('Title') }}</label>
                          <input type="text" class="form-control" name="title" placeholder="{{ __('Title') }}" value="{{ $book->title }}">
                          @if($errors->first('title')) 
                            <span class="text-danger">{{ $errors->first('title') }}</span>
                          @endif
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-xs-4">
                          <label>{{ __('List Topics') }}</label>
                          <select class="form-control" name="topic_id" >
                          @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $book->category_id == $category->id ? "selected" : "" }}>{{ $category->title }}</option>
                          @endforeach
                          </select>
                        </div>
                        <div class="col-xs-3" style="margin-top: 23px;">
                          <div class="col-xs-1" style="padding-left: 0px">
                            <a href="#"> 
                              <button class="btn btn-danger" title="Add new topic" onclick="loadSubject()"><b><i class="fa fa-plus"></i></b></button>
                            </a>
                          </div>
                          <div class="col-xs-8" style="margin-top: 7px; padding-left: 25px;">Add new topic</div>
                        </div>
                        <div class="col-xs-4">
                          <label for="exampleInputIDDonator">{{ __('ISBN') }}</label>
                          <input type="text" class="form-control" name="isbn" placeholder="{{ __('Place ISBN') }}" value="{{ $book->isbn }}">
                          @if($errors->first('isbn')) 
                            <span class="text-danger">{{ $errors->first('isbn') }}</span>
                          @endif
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                          <label for="exampleInputTitle">{{ __('Description') }}</label>
                          <input type="text" class="form-control" name="description" placeholder="{{ __('Place text here') }}" value="{{ $book->description }}">
                          @if($errors->first('description')) 
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                          @endif
                        </div>
                    <div class="form-group">
                      <label for="exampleInputDescription">{{ __('More Description') }}</label>
                      <textarea rows="8" class="textarea form-control" placeholder="Place some text here" name="more_description">{!! $book->more_description !!}</textarea>
                      @if($errors->first('more_description')) 
                            <span class="text-danger">{{ $errors->first('more_description') }}</span>
                          @endif
                    </div>
                  </div>
                </div>
                  <div class="form-group">
                    <label for="exampleInputFile">{{ __('Picture') }}</label>
                    <div>
                        <img style="margin:0px 0px 15px 15px" width="50px" height="70px" alt="ahihi" src="../images/books/{{$book->picture}}">
                    </div>
                    <input type="file" name="picture">
                    @if($errors->first('picture')) 
                      <span class="text-danger">{{ $errors->first('picture') }}</span>
                    @endif
                  </div>
                </div>
                <div>
                </div>
              <div class="box-footer" style="margin: 0px 15px 0px 15px">
                <button type="submit" class="btn btn-primary">{{ __('Edit') }}</button>
                <button type="button" class="btn btn-primary" onclick="window.history.back();">{{ __('Back') }}</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
@endsection