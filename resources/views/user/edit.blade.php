<!DOCTYPE html>
<html>
<head>
    <title>Book show</title>
  <link rel="stylesheet" media="all" href="https://s.gr-assets.com/assets/goodreads-b4a91517aa00c2ede826962c83c1ea16.css" />
    
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- <link rel="stylesheet" media="all" href="https://s.gr-assets.com/assets/goodreads-479eda3f659b065fab977d3b90262b48.css" /> -->
	<link rel="stylesheet" media="screen,print" href="https://s.gr-assets.com/assets/review/list-999f3695f560f96c8637b3d3bb2677dc.css" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('frontend/css/mystyle.css')}}">
	  <link rel="canonical" href="https://www.goodreads.com/review/list/78270916" />
</head>
<body>
	<div class="content">
		@include('frontend.layouts.header')
		<div class="mainContentContainer">
	    	<div class="mainContent">
	    		<div class="mainContentFloat">
	    			<div class="leftContainer" style="font-size: 15px">
		    			<div id="topcol" class="last col stacked">
		    				<form action="{{ route('user.update', ['id' => Auth::user()->id])}}" method="post" enctype="multipart/form-data">
		    					{{ csrf_field() }}
            					{{ method_field('PUT') }}
		    					<div id="imagecol" class="col">
							  	<div class="bookCoverContainer">
								    <div class="bookCoverPrimary">
								          <a rel="nofollow" itemprop="image" href="{{ route('user.show', ['id' => Auth::user()->id]) }}">
								          	<img id="coverImage" alt="{{ Auth::user()->name}}" src="{{ Auth::user()->avatar_url}}" />
								          </a>
								    </div>
							    </div>
							</div>
							<div id="metacol" class="last col" style="width: 435px;margin-left: 10px">
								<h1 id="profileNameTopHeading" class="userProfileName" style="width: 605px">
							      {{ Auth::user()->name}}
							    </h1>
									<div class="infoBoxRowTitle">Gender</div>
	      							<div class="infoBoxRowItem">
								        <input type="radio" value="female" name="gender"
								        @if(Auth::user()->gender == 1)
								        	{{"checked"}}
								        @endif >
								        <span style="margin-right: 20px" for="user_name_pref_p">Female</span>
								        <input type="radio" value="male" name="gender" @if(Auth::user()->gender == 2)
								        	{{"checked"}}
								        @endif >
								        <span for="user_name_pref_p">Male</span>
								    </div>
	      								<div class="infoBoxRowTitle">Thinking</div>
		      							<span >What do you think?</span>
		      							@if($errors->first('liking')) 
				                            <span class="text-danger">{{ $errors->first('liking') }}</span>
				                        @endif
		      							<div style="padding-top: 10px" class="infoBoxRowItem">
											
		      								<textarea class="textBox largeTextBox reviewUserText js-reviewUserText" id="review_review_usertext" maxlength="20000" name="liking" placeholder="Enter your favorite" rows="10" cols="60" style="display: block; height: auto;margin-bottom: 15px">{!! $user->liking !!}</textarea>
										</div>
										<div class="infoBoxRowTitle">Email</div>
		      							<div class="infoBoxRowItem">
									        <input style="width:503px;margin-bottom: 15px; background-color: #f9f7f4" type="email" name="email" value="{{Auth::user()->email}} " readonly="" id="user_url">
										</div>
										<div class="infoBoxRowTitle">New Password</div>
		      							<div class="infoBoxRowItem">
									        <input style="width:503px;margin-bottom: 15px" type="password" name="password" id="user_url">
										</div>
									    <div class="infoBoxRowTitle">Avatar</div>
		      							<div class="infoBoxRowItem">
					                	    <input type="file" name="avatar_url" style="margin-bottom: 15px">
					                	    <div class="formAction gr-form__actions">
											<button class="primaryAction submitAction gr-form__submitButton" type="submit">
											Edit
											</button>
											<div id="cancel" class="secondaryAction cancelAction gr-form__secondaryAction" onclick="window.history.back();">
											Cancel
											</div>
										</div>
									    </div>
								    	
								    </div>

							</div>
		    				</form>
		    				
		    			</div>
		    			<br>
					</div>
	    			
	    		</div>
	    	</div>
	    </div>
	</div>
</body>
</html>