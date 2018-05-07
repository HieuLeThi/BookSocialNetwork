@extends('backend.layouts.app')
@section('title')
    {{ __('Dashboard') }}
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

  <section class="content-header">
    <h1>
      {{ __('CREATE BOOK') }}
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
            <form action="{{route('books.store')}}" role="form" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="box-body" style="margin: 0px 15px 0px 15px">
                
                <div class="row">
                  <div class="col-xs-12">
                    <div class="form-group">
                      <div class="row">
                        <div class="col-xs-12">
                          <label for="exampleInputTitle">{{ __('Title') }}</label>
                          <input type="text" class="form-control" name="title" placeholder="{{ __('Title') }}" value="{!! old('title') !!}">
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
                            @foreach ($categories as $category)
                              <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="col-xs-3" style="margin-top: 23px;">
                          <div class="col-xs-1" style="padding-left: 0px">
                            <a href="#"> 
                              <button class="btn btn-danger" title="Add new book" onclick="loadSubject()"><b><i class="fa fa-plus"></i></b></button>
                            </a>
                          </div>
                          <div class="col-xs-8" style="margin-top: 7px; padding-left: 25px;">Add new topic</div>
                        </div>
                        <div class="col-xs-4">
                          <label for="exampleInputIDDonator">{{ __('ISBN') }}</label>
                          <input type="text" class="form-control" name="isbn" placeholder="{{ __('Place ISBN') }}" value="{!! old('isbn') !!}">
                          @if($errors->first('isbn')) 
                            <span class="text-danger">{{ $errors->first('isbn') }}</span>
                          @endif
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                          <label for="exampleInputTitle">{{ __('Description') }}</label>
                          <input type="text" class="form-control" name="description" placeholder="{{ __('Place text here') }}" value="{!! old('description') !!}">
                          @if($errors->first('description')) 
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                          @endif
                        </div>
                    <div class="form-group">
                      <label for="exampleInputDescription">{{ __('More Description') }}</label>
                      <textarea rows="8" class="textarea form-control" placeholder="Place some text here" name="more_description">{!! old('more_description') !!}</textarea>
                      @if($errors->first('more_description')) 
                            <span class="text-danger">{{ $errors->first('more_description') }}</span>
                          @endif
                    </div>
                  </div>
                </div>
                  <div class="form-group">
                    <label for="exampleInputFile">{{ __('Picture') }}</label>
                    <input type="file" name="picture" value="{!! old('picture') !!}">
                    @if($errors->first('picture')) 
                      <span class="text-danger">{{ $errors->first('picture') }}</span>
                    @endif
                  </div>
                </div>
                <div>
                </div>
              <div class="box-footer" style="margin: 0px 15px 0px 15px">
                <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
                <button type="button" class="btn btn-primary" onclick="window.history.back();">{{ __('Back') }}</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
@endsection