@extends('backend.layouts.app') 
@section('title') 
{{ __('dashboard.dashboard') }} 
@endsection 
@section('role') 
{{ __('AUTHOR') }} 
@endsection 
@section('side-bar') 
<li class="active treeview">
          <a href="{{ route('author.index') }}">
            <i class="fa fa-dashboard"></i> <span>DASHBOARD</span>
          </a>
        </li>
        <li>
          <a href="{{ route('author.edit', ['id' => Auth()->user()->id])}}">
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
  <!-- <section class="content-header">
    <h1>
      {{ __('dashboard.dashboard') }}
    </h1>
    <ol class="breadcrumb">
      <li>
        <a href="#">
          <i class="fa fa-dashboard"></i> {{ __('dashboard.home') }}</a>
      </li>
      <li class="active">{{ __('dashboard.dashboard') }}</li>
      </ol>
  </section> -->
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-aqua"><i class="ion ion-ios-book-outline"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">{{ __('books') }}</span>
            <span class="info-box-number">3</span>
            <a href="#" class="small-box-footer">{{ __('more_info') }}
              <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-purple"><i class="ion ion-ios-calculator-outline"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">{{ __('borrows') }}</span>
            <span class="info-box-number">2</span>
            <a href="#" class="small-box-footer">{{ __('more_info') }}
              <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
      </div>       
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-yellow"><i class="ion ion-ios-person"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">{{ __('users') }}</span>
            <span class="info-box-number">3</span>
            <a href="#" class="small-box-footer">{{ __('more_info') }}
              <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-red"><i class="ion ion-ios-bookmarks"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">{{ __('posts') }}</span>
            <span class="info-box-number">2</span>
            <a href="#" class="small-box-footer">{{ __('more_info') }}
              <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
<!-- /.content -->
@endsection