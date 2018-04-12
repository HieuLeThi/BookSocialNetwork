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
					<a href="/">
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
		 				</div>
					    <div class="fieldPara">
					    	<input placeholder="Email Address" type="email" name="email">
					    </div>
					    <div class="fieldPara">
					      <input id="user_password_signup" placeholder="Password" maxlength="128" size="128" type="password" name="password">
					    </div>
					    <div class="fieldPara">
					    	<input type="checkbox" name="check_author" tabindex="3" value="1">
					    	<label for="remember_me">Author or a publisher?</label>
					    </div>
		  				<div class="fieldPara">
						    <div id="homePageSignupBlurb">
						      By clicking “Sign up”
						      I agree to the Goodreads
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
					      (and least favorite) books on Goodreads.
					    </p>
					</div>
				    <div id="discoveryBox">
				      <h2>What will <em>you</em> discover?</h2>
				        <div class="discoveryBoxDiscovery sourceBooks4">
				          <div class="discoverySourceBooks">
				            <p class="discoverySourceActionText">List Top Books Rating ...</p>
				              <a  style="margin-right:25px" href="/book/show/1137215.Boneshaker"><img alt="Boneshaker by Cherie Priest" title="Boneshaker by Cherie Priest" width="80" class="bookImgSimilar" src="https://images.gr-assets.com/books/1433161048m/1137215.jpg"></a>
				              <a href="/book/show/142296.The_Anubis_Gates"><img alt="The Anubis Gates by Tim Powers" title="The Anubis Gates by Tim Powers" width="80" class="bookImgSimilar" src="https://images.gr-assets.com/books/1344409006m/142296.jpg"></a>
				              <a href="/book/show/7670800-clementine"><img alt="Clementine by Cherie Priest" title="Clementine by Cherie Priest" width="80" class="bookImgSimilar" src="https://images.gr-assets.com/books/1277163268m/7670800.jpg"></a>
				              <a href="/book/show/8253037-the-buntline-special"><img alt="The Buntline Special by Mike Resnick" title="The Buntline Special by Mike Resnick" width="80" class="bookImgSimilar" src="https://images.gr-assets.com/books/1284431932m/8253037.jpg"></a>
											<a href="/book/show/8253037-the-buntline-special"><img alt="The Buntline Special by Mike Resnick" title="The Buntline Special by Mike Resnick" width="80" class="bookImgSimilar" src="https://images.gr-assets.com/books/1442953450l/420297.jpg"></a>
											<a href="/book/show/8253037-the-buntline-special"><img alt="The Buntline Special by Mike Resnick" title="The Buntline Special by Mike Resnick" width="80" class="bookImgSimilar" src="https://images.gr-assets.com/books/1442953450l/420297.jpg"></a>
				          </div>
				          
				        </div>
				        <div class="discoveryBoxDiscovery sourceBooks4">
				          <div class="discoverySourceBooks">
				            <p class="discoverySourceActionText">List New Books ...</p>
				              <a href="/book/show/9648068-the-first-days"><img alt="The First Days by Rhiannon Frater" title="The First Days by Rhiannon Frater" width="80" class="bookImgSimilar" src="https://images.gr-assets.com/books/1388800064m/9648068.jpg"></a>
				              <a href="/book/show/7094569-feed"><img alt="Feed by Mira Grant" title="Feed by Mira Grant" width="80" class="bookImgSimilar" src="https://images.gr-assets.com/books/1408500437m/7094569.jpg"></a>
				              <a href="/book/show/7157310-rot-ruin"><img alt="Rot &amp; Ruin by Jonathan Maberry" title="Rot &amp; Ruin by Jonathan Maberry" width="80" class="bookImgSimilar" src="https://images.gr-assets.com/books/1348805097l/10361330.jpg"></a>
				              <a href="/book/show/7157310-rot-ruin"><img alt="Rot &amp; Ruin by Jonathan Maberry" title="Rot &amp; Ruin by Jonathan Maberry" width="80" class="bookImgSimilar" src="https://images.gr-assets.com/books/1264898635m/7157310.jpg"></a>
				              <a href="/book/show/7157310-rot-ruin"><img alt="Rot &amp; Ruin by Jonathan Maberry" title="Rot &amp; Ruin by Jonathan Maberry" width="80" class="bookImgSimilar" src="https://images.gr-assets.com/books/1503066414l/19501.jpg"></a>
											
											<a href="/book/show/7716140-married-with-zombies"><img alt="Married with Zombies by Jesse Petersen" title="Married with Zombies by Jesse Petersen" width="80" class="bookImgSimilar" src="https://images.gr-assets.com/books/1265814659m/7716140.jpg"></a>
				          </div>
				        </div>
				    </div>
			      	<div id="browseBox">
			        	<h2>Search and browse books</h2>
			        	<div id="searchBox">
			          		<div id="sitesearch">
								<form id="headerSearchForm" action="/search" accept-charset="UTF-8" method="get">
									<input name="utf8" type="hidden" value="✓">
									<div class="auto_complete_field_wrapper">
										<input type="text" name="query" id="sitesearch_field" placeholder="Title / Author / ISBN">
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
			        <div id="listsTeaserBox" class="featureTeaserBox">
			          <h3 style="margin-bottom: 15px;">LIST BOOKS BY AUTHOR</h3>
			            <div class="listTeaser">
						  <div class="listImg">
						      <a href="/book/show/2657.To_Kill_a_Mockingbird"><img alt="To Kill a Mockingbird by Harper Lee" title="To Kill a Mockingbird by Harper Lee" src="https://images.gr-assets.com/books/1361975680s/2657.jpg"></a>
						      <a href="/book/show/5470.1984"><img alt="1984 by George Orwell" title="1984 by George Orwell" src="https://images.gr-assets.com/books/1348990566s/5470.jpg"></a>
						      <a href="/book/show/4671.The_Great_Gatsby"><img alt="The Great Gatsby by F. Scott Fitzgerald" title="The Great Gatsby by F. Scott Fitzgerald" src="https://images.gr-assets.com/books/1490528560s/4671.jpg"></a>
						      <a href="/book/show/3.Harry_Potter_and_the_Sorcerer_s_Stone"><img alt="Harry Potter and the Sorcerer's Stone by J.K. Rowling" title="Harry Potter and the Sorcerer's Stone by J.K. Rowling" src="https://images.gr-assets.com/books/1474154022s/3.jpg"></a>
							</div>
						  <div class="listTitle">
								
						    <a href="#">ahihi</a>
							</div>
						</div>
						<div class="listTeaser">
						  <div class="listImg">
						      <a href="/book/show/2429135.The_Girl_with_the_Dragon_Tattoo"><img alt="The Girl with the Dragon Tattoo by Stieg Larsson" title="The Girl with the Dragon Tattoo by Stieg Larsson" src="https://images.gr-assets.com/books/1327868566s/2429135.jpg"></a>
						      <a href="/book/show/16299.And_Then_There_Were_None"><img alt="And Then There Were None by Agatha Christie" title="And Then There Were None by Agatha Christie" src="https://images.gr-assets.com/books/1391120695s/16299.jpg"></a>
						      <a href="/book/show/960.Angels_Demons"><img alt="Angels &amp; Demons by Dan Brown" title="Angels &amp; Demons by Dan Brown" src="https://images.gr-assets.com/books/1303390735s/960.jpg"></a>
						      <a href="/book/show/17899948-rebecca"><img alt="Rebecca by Daphne du Maurier" title="Rebecca by Daphne du Maurier" src="https://images.gr-assets.com/books/1386605169s/17899948.jpg"></a>
						  </div>
						  <div class="listTitle">
						    <a href="/list/show/11.Best_Crime_Mystery_Books">Best Crime &amp; Mystery Books</a>
						  </div>
						</div>
						<div class="listTeaser">
						  <div class="listImg">
						      <a href="/book/show/4667024-the-help"><img alt="The Help by Kathryn Stockett" title="The Help by Kathryn Stockett" src="https://images.gr-assets.com/books/1346100365s/4667024.jpg"></a>
						      <a href="/book/show/77203.The_Kite_Runner"><img alt="The Kite Runner by Khaled Hosseini" title="The Kite Runner by Khaled Hosseini" src="https://images.gr-assets.com/books/1484565687s/77203.jpg"></a>
						      <a href="/book/show/43641.Water_for_Elephants"><img alt="Water for Elephants by Sara Gruen" title="Water for Elephants by Sara Gruen" src="https://images.gr-assets.com/books/1494428973s/43641.jpg"></a>
						      <a href="/book/show/19063.The_Book_Thief"><img alt="The Book Thief by Markus Zusak" title="The Book Thief by Markus Zusak" src="https://images.gr-assets.com/books/1390053681s/19063.jpg"></a>
						  </div>
						  <div class="listTitle">
						    <a href="/list/show/19.Best_for_Book_Clubs">Best for Book Clubs</a>
						  </div>
						</div>
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
					<a rel="nofollow" href="#">about us</a>
					</li>
					<li>
					<a rel="nofollow" href="/jobs">privacy</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	</div>
</div>

@endsection