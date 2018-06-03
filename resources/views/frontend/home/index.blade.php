@extends('frontend.layouts.app')
@section('title_page')
	Home
@endsection

@section('content')
<div id='signedOutHome' class="home">
	<div class="content">
		<div class="uitext" id="siteheader">
		<div class="signedOutHomeMastheadContainer">
			<div id="navBar">
				<div id="logo">
					<a href="{{ route('home')}}">
						<h1 style="color: #81593d; font-style: cursive;font-size: 37px; padding-top:12px">READBOOK</h1>
					</a>
				</div>
				<div id="signInForm">
					<form method="POST" action="{{ route('login') }}">
                        @csrf
					  	<div class="formBox">
						    <input id="userSignInFormEmail" type="email" name="email" placeholder="Email address" tabindex="1"><br>

						    <input type="checkbox" id="remember_me" name="remember_me" checked="" tabindex="3">
						    <label for="remember_me" class="greyText">Remember me</label>
					    </div>
				  		<div class="formBox">
						    <div style="position:relative">
						      <input value="" placeholder="Password" tabindex="2" type="password" name="password" id="user_password">
						      <label for="user_password" id="userPasswordLabel" class="greyText">Password</label>
						      <br>
						      <a class="greyText" id="userForgotPassword" rel="nofollow" href="/user/forgot_password">Forgot it?</a>
						    </div>
				  		</div>
					    <div class="formBox">
						    <input type="submit" value="Sign in" tabindex="4" class="gr-button gr-button--dark">
					    </div>

					</form>
				</div>
			</div>
			<div id="masthead">
				<div id="headline">
					<img alt="Meet your next favorite book." src="https://s.gr-assets.com/assets/home/headline-e2cd420e71737ff2815d09af5b65c4e4.png">
				</div>
				<div id="newAccountBox">
					<h2>
					New here? Create a free account!
					</h2>
					@if (session('status'))
						<span class="invalid-feedback" >
								<h3 style="color: #00CC00">{{ session('status') }}</h3>
						</span>
            		@endif  
					<form method="POST" action="{{ route('register') }}">
						@csrf
		  				<div class="fieldPara">
		    				<input placeholder="Name" type="text" name="name">
		    				@if($errors->first('name')) 
                            <span style="color: red">{{ $errors->first('name') }}</span>
                          	@endif
		 				</div>
					    <div class="fieldPara">
					    	<input placeholder="Email Address" type="email" name="email">
					    	@if($errors->first('email')) 
                            <span style="color: red" class="text-danger">{{ $errors->first('email') }}</span>
                          	@endif
					    </div>
					    <div class="fieldPara">
					      <input id="user_password_signup" placeholder="Password" maxlength="128" size="128" type="password" name="password">
					      @if($errors->first('password')) 
                            <span style="color: red" class="text-danger">{{ $errors->first('password') }}</span>
                          @endif
					    </div>
					    <div class="fieldPara">
					    	<input type="checkbox" name="check_author" tabindex="3" value="1">
					    	<label for="remember_me">Author or a publisher?</label>
					    </div>
		  				<div class="fieldPara">
						    <div id="homePageSignupBlurb">
						      By clicking “Sign up”
						      I agree to the ReadBook
						      <a target="_blank" href="/about/terms">Terms of Service</a>
						      and confirm that I am at least 13 years old.
						    </div>
						    <input type="submit" name="signup" class="button" value="Sign up">
		  				</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="mainContentContainer ">
	    <div class="mainContent ">
	        <div class="mainContentFloat ">
				<div class="leftContainer">
  					<div class="sellingPointBoxLeft">
					    <h2>Deciding what to read next?</h2>
					    <p class="u-defaultType">
					    You’re in the right place. Tell us what titles or genres you’ve enjoyed in the past, and we’ll give you surprisingly insightful recommendations.
					    </p>
  					</div>

	  				<div class="sellingPointBoxRight">
					    <h2>What are your friends reading?</h2>
					    <p class="u-defaultType">
					      Chances are your friends are discussing their favorite
					      (and least favorite) books on ReadBook.
					    </p>
					</div>
				    <div id="discoveryBox">
				      <h2>What will <em>you</em> discover?</h2>
				        <div class="discoveryBoxDiscovery sourceBooks4">
				          <div class="discoverySourceBooks">
				            <p class="discoverySourceActionText">List Top Books Rating ...</p>
				              @foreach($topBooks as $bookRating)
				              	<a href="{{ route('showbook.show', ['id' =>$bookRating->id])}}"><img alt="{{$bookRating->title}}" title="{{$bookRating->title}}" width="80" class="bookImgSimilar" src="images/books/{{ $bookRating->picture}}"></a>
				              @endforeach
				          </div>
				          
				        </div>
				        <div class="discoveryBoxDiscovery sourceBooks4">
				          <div class="discoverySourceBooks">
				            <p class="discoverySourceActionText">List New Books ...</p>
				            @foreach($books as $book)
				              	<a href="{{ route('showbook.show', ['id' =>$book->id])}}"><img alt="{{$book->title}}" title="{{$book->title}}" width="80" class="bookImgSimilar" src="images/books/{{ $book->picture}}"></a>
				              @endforeach
				          </div>
				        </div>
				        <!-- <div class="discoveryBoxDiscovery sourceBooks4"> -->
				          <div class="discoverySourceBooks" style="margin-left: 20px">
				            <a href="{{route('topics.index')}}" class="discoverySourceActionText">All Books ...</a>
				             
				          </div>
				          
				        <!-- </div> -->
				    </div>
			      	<div id="browseBox">
			        	<h2>Search and browse books</h2>
			        	<div id="searchBox">
			          		<div id="sitesearch">
								<form id="headerSearchForm" action="{{ route('review.index') }}" method="GET" accept-charset="UTF-8" >
									<div class="auto_complete_field_wrapper">
										<form > 
											<input type="text"  id="sitesearch_field" placeholder="Title" value="{{ request('search') }}" name="search">
											<div id="sitesearch_autocomplete"></div>
											<img style="display: none" id="sitesearch_field_loading" class="loading" src="https://s.gr-assets.com/assets/loading-trans-ced157046184c3bc7c180ffbfc6825a4.gif" alt="Loading trans">
									</div>
									<a class="submitLink" href="#" onclick="$j('#headerSearchForm').submit(); return false;"><img width="16" title="Title / Author / ISBN" alt="search" src="https://s.gr-assets.com/assets/layout/magnifying_glass-a2d7514d50bcee1a0061f1ece7821750.png"></a>
								</form>
							</div>

	        			</div>

	        			<div class="u-defaultType">
	          
									@foreach($categories as $category)
		      				<div class="left" style="width: 25%">
				            <a class="gr-hyperlink" href="{{ route('topics.show', ['id' => $category->id]) }}">{{ $category->title}}</a><br>
		      				</div>
									@endforeach
	      				</div>
	      			</div>
	      		</div>
      			<div class="rightContainer">
			        <div id="listsTeaserBox" class="featureTeaserBox" style="max-height: 60px">
			          <h3 style="margin-bottom: 15px;">LIST BOOKS BY AUTHOR</h3>

						@foreach($authors as $author )						
							@if(count($author->bookByAuthor) > 0 )
							<div class="listTeaser"  style="height: 70px;">
							  <div class="listImg" style="max-width: 400px;">
							     @foreach($author->bookByAuthor as $bookbyauthor)
						      		<a href="{{ route('showbook.show', ['id' => $bookbyauthor->id]) }}"><img alt="{{ $bookbyauthor->title}}" title="{{ $bookbyauthor->title}}" width="45" height="60" src="images/books/{{ $bookbyauthor->picture}}"></a>
						    	@endforeach
							  </div>
							  <div class="listTitle">
							    <a href="#">{{ $author->name}}</a>
							  </div>
							</div>
							@endif
						@endforeach
			        </div>
				</div>
        	</div>
      	</div>
    </div>
    <div class='footerContainer'>
		<div class='footer'>
			<div class='copyright'>
			    &copy;
			    2018
			    ĐATN Hiếu Lê
			</div>
			<div class='adminLinksContainer'>
				<ul class='adminLinks'>
					<li>
					<a rel="nofollow" class="first" href="{{ route('home')}}">home</a>
					</li>
					<li>
					<a rel="nofollow" href="{{ route('home')}}">author</a>
					</li>
					<li>
					<a rel="nofollow" href="{{ route('home')}}">about us</a>
					</li>
					<li>
					<a rel="nofollow" href="{{ route('home')}}">privacy</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	</div>
</div>

@endsection