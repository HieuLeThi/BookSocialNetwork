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
								<h1 id="profileNameTopHeading" class="userProfileName">
							      {{ Auth::user()->name}}
							        <a class="smallText" href="{{ route('user.edit', ['id' =>  Auth::user()->id]) }}">(edit profile)</a>
							        @if (session('status'))
					                  <div class="alert alert-success">
					                      <span>{{ session('status') }}</span>
					                  </div>
					                @endif
							    </h1>
									<div class="infoBoxRowTitle">Gender</div>
	      							<div class="infoBoxRowItem">
								        @if(Auth::user()->gender == NULL)
	      									<p>None</p>
	      								@elseif (Auth::user()->gender == 1)
	      									<p>Female</p>
	      								@elseif (Auth::user()->gender == 2)
	      									<p>Male</p>
	      								@endif
								    </div>
	  								<div class="infoBoxRowTitle">Activity</div>
	      							<div class="infoBoxRowItem">
								       Joined in {{ date( 'd-m-Y', strtotime(Auth::user()->created_at)) }}
								    </div>
	      							<div class="infoBoxRowTitle">Thinking</div>
	      							<div class="infoBoxRowItem">
	      								@if(Auth::user()->liking == NULL)
	      									<p>None</p>
	      								@endif
	      								<p>{{ Auth::user()->liking}}</p>
								    </div>
	      							
							</div>
		    			</div>
		    			<br>
					</div>
	    			
	    		</div>
	    	</div>
	    </div>
	</div>
</body>
</html>