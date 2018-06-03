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
      {{ __('EDIT USER') }}
    </h1>
    @if (session('status'))
      <div class="alert alert-success" style="margin-top: 10px">
          <span>{{ session('status') }}</span>
      </div>
    @endif
    <ol class="breadcrumb">
      <li>
        <a href="#">
          <i class="fa fa-dashboard"></i> {{ __('Home') }}</a>
      </li>
      <li class="active">{{ __('User') }}</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="{{ Auth::user()->avatar_url}}" alt="User profile picture">

              <h3 class="profile-username text-center">{{ Auth::user()->name}}</h3>

              <p class="text-muted text-center">Author</p>

              <ul class="list-group list-group-unbordered">
                
                <li class="list-group-item">
                  <b>Books</b> <a class="pull-right" href="{{ route('books.index')}}" >{{ $book }}</a>
                </li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
      </div>
      <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              
              <li><a href="#settings" data-toggle="tab">Settings</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane" id="settings">
                <form  class="form-horizontal" action="{{ route('author.update', ['id' => Auth::user()->id])}}" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
                      {{ method_field('PUT') }}
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Gender</label>

                    <div class="col-sm-10" style="padding-top: 8px">
                      <span style="margin-right: 20px">
                         <input type="radio" value="female" name="gender"
                          @if(Auth::user()->gender == 1)
                            {{"checked"}}
                          @endif >
                          Female
                      </span>
                    <span>
                        <input type="radio" value="male" name="gender" @if(Auth::user()->gender == 2)
                          {{"checked"}}
                        @endif > Male
                    </span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input style="background-color: #f9f7f4" type="email" class="form-control" name="email" value="{{Auth::user()->email}} " readonly="" id="user_url">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">About me</label>

                    <div class="col-sm-10">
                      <textarea class="form-control" name="liking" id="inputExperience" rows="6" placeholder="Experience">{!! Auth::user()->liking !!}</textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">New Password</label>
                    <div class="col-sm-10">
                      <input type="password" name="password" class="form-control" id="inputSkills">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Avatar</label>
                    <div class="col-sm-10">
                      <input type="file" name="avatar_url">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
    </div>
  </section>
@endsection