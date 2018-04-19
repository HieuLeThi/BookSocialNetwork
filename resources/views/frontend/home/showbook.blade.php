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
	<script src="https://s.gr-assets.com/assets/react_client_side/sprockets_dependencies-30f123719317f85caddeb01ca7b5493c.js"></script>
	<script src="https://s.gr-assets.com/assets/react_client_side/external_dependencies-48241921bf.js"></script>
	<script src="https://s.gr-assets.com/assets/react_client_side/home-41a67ed5b8.js"></script>
	<script src="https://use.fontawesome.com/079150a0fc.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
	<div class="content">
		@include('frontend.layouts.header')
		<div class="mainContentContainer">
	    	<div class="mainContent">
	    		<div class="mainContentFloat">
	    			<div class="leftContainer">
		    			<div id="topcol" class="last col stacked">
		    				<div id="imagecol" class="col">
							  	<div class="bookCoverContainer">
								    <div class="bookCoverPrimary">
								          <a rel="nofollow" itemprop="image" href="/book/photo/1137215.Boneshaker">
								          	<img id="coverImage" alt="Boneshaker (The Clockwork Century, #1)" src="../images/books/{{$book->picture}}" />
								          </a>
								    </div>
							    </div>
							    <div class='wtrButtonContainer'>
							    	<div class="form-group">
							    		<select class="form-control" id="sel1"  style="background: #409D69">
									        <option>Want to read</option>
									        <option>Currently Reading</option>
									        <option>Read</option>
									    </select>
							    	</div>
								</div>
							    
							</div>
							<div id="metacol" class="last col" style="width: 435px;margin-left: 10px">
								<h1 id="bookTitle" class="bookTitle" itemprop="name">
								      {{ $book->title}}
								</h1>

								<div id="bookAuthors" class="stacked">
								  <span class='by smallText'>by</span>
									<span itemprop='author' itemscope='' itemtype='http://schema.org/Person'>
										<a class="authorName" itemprop="url" href="https://www.goodreads.com/author/show/221253.Cherie_Priest">
											<span itemprop="name">{{ $book->name_author}}</span></a>
									</span>

								</div>
								<div id="descriptionContainer">
	  
	      							<div id="description" class="readable stacked" style="right:0;font-size: 16px;">
	        
										<span id="freeTextContainer8227207913880771659">{{ $book->description}}<br /></span>
	  									<span id="more_description" style="display:none">{{ $book->more_description}}</span>
	  									<a id="more">...more</a>
										<a id="less" style="display:none" >(less)</a>
	      							</div>
								</div>
								<script>
									$(document).ready(function(){
										$("#more").click(function(){
											$("#more_description").css("display", "inline");
											$("#more").css("display", "none");
											$("#less").css("display", "inline");
										});
										$("#less").click(function(){
											$("#more_description").css("display", "none");
											$("#more").css("display", "inline");
											$("#less").css("display", "none");
										});
										$("#add_review").click(function(){
											$("#show_form_review").css("display", "inline");
										});
										$("#cancel_review").click(function(){
											$("#show_form_review").css("display", "none");
										});
									});
								</script>
								<br>
								<div style="font-size: 17px;">
									<span>Rate this book</span>
									<i class="fa fa-star" style="color: yellow"></i>
									<i class="fa fa-star" style="color: yellow"></i>
									<i class="fa fa-star" style="color: yellow"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									@if(Auth::check())
										<a id="add_review" style="margin-left: 70px;">Add a review</a>
									@else
										<a href="{{ route('home') }}" style="margin-left: 70px;">Add a review</a>
									@endif
								</div>
								<br>
								<form method="POST" action="{{ route('review.store', ['id' =>$book->id])}}">
			                        {{ csrf_field() }}
									<div id="show_form_review"class="readable stacked" style="display:none">
									<span>What do you think?</span>
									<textarea class="textBox largeTextBox reviewUserText js-reviewUserText" id="review_review_usertext" maxlength="20000" name="content" placeholder="Enter your review" rows="6" cols="60" style="display: block; height: auto;"></textarea>
									@if($errors->first('content')) 
			                            <span class="text-danger">{{ $errors->first('content') }}</span>
			                        @endif
									<div>
										<input type="checkbox" value="0" name="check_post" id="review_spoiler_flag">
											<span>Add to the post</span>
											<div class="right" style="text-align: right; font-size: 12px;">
												<span id="review_edit_characterCount"></span>
											</div>
									</div>
									<div class="formAction gr-form__actions">
										<button class="primaryAction submitAction gr-form__submitButton" type="submit">
										Review
										</button>
										<div id="cancel_review" class="secondaryAction cancelAction gr-form__secondaryAction">
										Cancel
										</div>
									</div>
								</div>
								</form>
								
							</div>
		    			</div>
		    			<br>
		    			<div id='lazy_loadable_view'>
			    			<div class="h2Container gradientHeaderContainer">
			    				<h2 class="brownBackground">Reviews</h2>
			    			</div>
		    				
		    			</div>

		    			<div class="friendReviews elementListBrown">
    						<div class="section firstReview">
								<div id="review_91338657" class="review" itemprop="reviews" itemscope="" itemtype="http://schema.org/Review">
    								<a title="Michael" class="left imgcol" href="/user/show/1036930-michael">
    								<img alt="Michael" src="https://images.gr-assets.com/users/1402947913p2/1036930.jpg"></a>

									  	<div class="left bodycol" style="width: 510px;">
										    <div class="reviewHeader uitext stacked">
										        <a class="reviewDate createdAt right" href="/review/show/91338657?book_show_action=true">Feb 25, 2010</a>

										      <span itemprop="author" itemscope="" itemtype="http://schema.org/Person">
										        <a title="Michael" class="user" itemprop="url" name="Michael" href="/user/show/1036930-michael">Michael</a>
										      </span>

										        rated it
										    </div>
	        								<div class="reviewText stacked">
	              								<span id="reviewTextContainer91338657" class="readable" style="font-size: 15px;">
	            
													<span id="freeTextContainer1229566540314906503">``Miss Eliza Bennet, let me persuade you to follow my example, and take a turn about the room. -- I assure you the anti-gravity hoverchannel is very refreshing after sitting so long in one attitude.''<br><br>Eliza was surprised, but agreed to it immediately. She unstrapt herself from her leather seat restraints and stood, careful to maintain her balance as the airship encountered turbulence. When she entered the hoverchannel, she activated the polarity redistribution magnets within her combat suit and b</span>
													  <span id="freeText1229566540314906503" style="display:none">``Miss Eliza Bennet, let me persuade you to follow my example, and take a turn about the room. -- I assure you the anti-gravity hoverchannel is very refreshing after sitting so long in one attitude.''<br><br>Eliza was surprised, but agreed to it immediately. She unstrapt herself from her leather seat restraints and stood, careful to maintain her balance as the airship encountered turbulence. When she entered the hoverchannel, she activated the polarity redistribution magnets within her combat suit and began floating comfortably around the perimeter of the foyer.<br><br>Miss Bingley's attention was quite engaged in watching Mr. Darcy's progress through his book, so much so that at one point she nearly navigated the ship into the side of Pemberley; and she was perpetually making some inquiry.<br><br>At length, finally exhausted by her tenacious attempts to force a conversation regarding his book, Darcy relented. "It's entitled Boneshaker. An American novel."<br><br>"What do you think of it?" Eliza said as she drifted by. <br><br>"A bit nonsensical, really. Steampunk claptrap about the Civil War going on much longer than it actually did, which caused technological advances that didn't really happen until much later. And a zombie-infested city called Seattle. It has been blocked off from the rest of the country, and our heroine must go in to rescue her foolish son." <br><br>Mr. Bingley crossed the room, his steam-powered mechanical legs stomping their way across the carpet to the cabinet where he refilled his glass. "Zombies in America? That does sound quite silly. Everyone knows that zombies are native to Britain. That's how I lost my legs."<br><br>"Please, Bingley, don't tell us that old story again," Mr. Hurst said, adjusting himself on the sofa before falling back asleep.<br><br>Darcy said, "The plot moves along at a good pace, but the characters are a bit uninspired. A teenage boy constantly doing something inadvisable; the protective mother, blasting zombies and trying to save him."<br><br>Eliza smiled. "Darcy, certainly you aren't saying literature is full of strong female characters who run around rescuing male characters."<br><br>"Nor should it be," Mr. Hurst said, drifting slowly in and out of consciousness.<br><br>Ignoring Mr. Hurst's interjection, Darcy said, "I suppose the fairer sex aren't shown in powerful roles that often, even in these books written in the far future about the distant past . . . er, or perhaps about the same time as now . . . When were we written?"<br><br>Miss Bingley inquired, "Are you sure the dinner agreed with you?"<br><br>"I feel fine, thank you," Darcy said. <br><br>"Admit it," Sherlock Holmes said, standing in the doorway, Watson at his side. "You enjoy all the fashionable gimmicks flying left and right, and the pace keeps you entertained. Yet you wonder why nothing surprising was done with any of these elements."<br><br>Darcy moved over as Holmes sat on the sofa beside him, lighting a pipe. "You're right, Holmes. The whole reinvention of the Civil War is fascinating in theory. Then the author does nothing with it. The book has nothing to say. No reflections on the civil war, racism, or politics. Nor does it say anything about the true nature of zombies. In fact, it says little about love, which is the very heart of the story."<br><br>J. K. Rowling, refilling her glass of zinfandel, said, "And it's practically a young adult novel, isn't it? Other than one or two mildly violent zombie moments and one four letter 'S' word, this could be the next film from Pixar. There's not even a gay sorcerer to throw off the prudes." <br><br>Darcy met Eliza's eyes as she orbited the room. "Have you read it as well, Miss Bennett?"<br><br>"Braaaains," Mr. Hurst moaned softly.<br><br>"I found it diverting," Eliza said. "I always read the books nominated for the Nebula awards. But, like you, I found the novel didn't meet my expectations. When you look beyond the stylish trappings, you have a run-of-the-mill adventure story written in a workmanlike fashion. I imagine the query letter was spectacular, though."<br><br>Darcy was on the verge of speaking when Mr. Hurst lunged up from the sofa, saliva splattering from his vicious maw, his eyes sunken in and rolled back into his head. He lurched across the room toward Bingley, whose back was facing him.<br><br>Eliza kicked off of the wall and rolled over to Darcy, pulling his pistol from his belt, and fired several rounds through Mr. Hurst's head. A splatter of blood, brain and skull chips showered down on Harold Bloom.<br><br>"Well," Mr. Harold Bloom said, wiping blood from his face and wiping it on the sofa, "that was entirely unnecessary, but what HASN'T been? The whole book review is sound and fury, signifying nothing. And how many times is this hack going to parody <u>Pride and Prejudice</u>? He seems to think it's much more funny than it is, just as Oscar Wilde thought himself hilarious, when he is in fact highly over-esteemed."<br><br>Holmes puffed his pipe, a gray cloud of smoke rising above him. "I can't believe I didn't notice Mr. Hurst was turning. Usually I'm so attentive to details."<br><br>"Nobody's perfect," Darcy said. "Would you mind putting that pipe out? We are in a zeppelin, you know."<br><br>Holmes sighed and stood up, pulling on his overcoat. "I'm going next door to the Kurt Vonnegut review. Pipe smoking is encouraged over there." <br><br>And as Holmes left the room, suddenly the review stopped.<br></span>
	  												<a data-text-id="1229566540314906503" href="#" onclick="swapContent($(this));; return false;">...more</a>

	          										</span>
	        									</div>
	      									<div class="reviewFooter uitext buttons">
	    										<div class="updateActionLinks">
	      											<span class="likeItContainer">
	      												<a id="like_count_review_91338657" rel="nofollow" href="/rating/voters/91338657?resource_type=Review">
	      													<span class="likesCount">317 likes</span>
	      												</a>&nbsp;·&nbsp;
	      													<span class="loadingLinkSpan"><a>Like</a>
	      													</span>&nbsp;·&nbsp;
	      												      <a id="commentLink_2344330972" href="#" onclick="comment_form_for(&#39;review&#39;, 2344330972, true, &#39;&#39;); return false;">comment</a>


	      											</span>
	   											 </div>
											</div>
											<div class="brown_comment" id="comments_form_review_91338657" style="display: none">
												<textarea class="placeholder_text" onclick="expand_comment_form_for('review', 91338657, true, '')">Write a comment...</textarea>
											</div>

  									</div>
								</div>
							</div>
							<div class="section firstReview">
								<div id="review_91338657" class="review" itemprop="reviews" itemscope="" itemtype="http://schema.org/Review">
    								<a title="Michael" class="left imgcol" href="/user/show/1036930-michael">
    								<img alt="Michael" src="https://images.gr-assets.com/users/1402947913p2/1036930.jpg"></a>

									  	<div class="left bodycol" style="width: 510px;">
										    <div class="reviewHeader uitext stacked">
										        <a class="reviewDate createdAt right" href="/review/show/91338657?book_show_action=true">Feb 25, 2010</a>

										      <span itemprop="author" itemscope="" itemtype="http://schema.org/Person">
										        <a title="Michael" class="user" itemprop="url" name="Michael" href="/user/show/1036930-michael">Michael</a>
										      </span>

										        rated it
										    </div>
	        								<div class="reviewText stacked">
	              								<span id="reviewTextContainer91338657" class="readable" style="font-size: 15px;">
	            
													<span id="freeTextContainer1229566540314906503">``Miss Eliza Bennet, attitude.''<br><br>Eliza combat suit and b</span>
													  <span id="freeText1229566540314906503" style="display:none">``Miss Eliza Bennet, let me persuade you to follow my example, and take a turn about the room. -- I assure you the anti-gravity hoverchannel is very refreshing after sitting so long in one attitude.''<br><br>Eliza was surprised, but agreed to it immediately. She unstrapt herself from her leather seat restraints and stood, careful to maintain her balance as the airship encountered turbulence. When she entered the hoverchannel, she activated the polarity redistribution magnets within her combat suit and began floating comfortably around the perimeter of the foyer.<br><br>Miss Bingley's attention was quite engaged in watching Mr. Darcy's progress through his book, so much so that at one point she nearly navigated the ship into the side of Pemberley; and she was perpetually making some inquiry.<br><br>At length, finally exhausted by her tenacious attempts to force a conversation regarding his book, Darcy relented. "It's entitled Boneshaker. An American novel."<br><br>"What do you think of it?" Eliza said as she drifted by. <br><br>"A bit nonsensical, really. Steampunk claptrap about the Civil War going on much longer than it actually did, which caused technological advances that didn't really happen until much later. And a zombie-infested city called Seattle. It has been blocked off from the rest of the country, and our heroine must go in to rescue her foolish son." <br><br>Mr. Bingley crossed the room, his steam-powered mechanical legs stomping their way across the carpet to the cabinet where he refilled his glass. "Zombies in America? That does sound quite silly. Everyone knows that zombies are native to Britain. That's how I lost my legs."<br><br>"Please, Bingley, don't tell us that old story again," Mr. Hurst said, adjusting himself on the sofa before falling back asleep.<br><br>Darcy said, "The plot moves along at a good pace, but the characters are a bit uninspired. A teenage boy constantly doing something inadvisable; the protective mother, blasting zombies and trying to save him."<br><br>Eliza smiled. "Darcy, certainly you aren't saying literature is full of strong female characters who run around rescuing male characters."<br><br>"Nor should it be," Mr. Hurst said, drifting slowly in and out of consciousness.<br><br>Ignoring Mr. Hurst's interjection, Darcy said, "I suppose the fairer sex aren't shown in powerful roles that often, even in these books written in the far future about the distant past . . . er, or perhaps about the same time as now . . . When were we written?"<br><br>Miss Bingley inquired, "Are you sure the dinner agreed with you?"<br><br>"I feel fine, thank you," Darcy said. <br><br>"Admit it," Sherlock Holmes said, standing in the doorway, Watson at his side. "You enjoy all the fashionable gimmicks flying left and right, and the pace keeps you entertained. Yet you wonder why nothing surprising was done with any of these elements."<br><br>Darcy moved over as Holmes sat on the sofa beside him, lighting a pipe. "You're right, Holmes. The whole reinvention of the Civil War is fascinating in theory. Then the author does nothing with it. The book has nothing to say. No reflections on the civil war, racism, or politics. Nor does it say anything about the true nature of zombies. In fact, it says little about love, which is the very heart of the story."<br><br>J. K. Rowling, refilling her glass of zinfandel, said, "And it's practically a young adult novel, isn't it? Other than one or two mildly violent zombie moments and one four letter 'S' word, this could be the next film from Pixar. There's not even a gay sorcerer to throw off the prudes." <br><br>Darcy met Eliza's eyes as she orbited the room. "Have you read it as well, Miss Bennett?"<br><br>"Braaaains," Mr. Hurst moaned softly.<br><br>"I found it diverting," Eliza said. "I always read the books nominated for the Nebula awards. But, like you, I found the novel didn't meet my expectations. When you look beyond the stylish trappings, you have a run-of-the-mill adventure story written in a workmanlike fashion. I imagine the query letter was spectacular, though."<br><br>Darcy was on the verge of speaking when Mr. Hurst lunged up from the sofa, saliva splattering from his vicious maw, his eyes sunken in and rolled back into his head. He lurched across the room toward Bingley, whose back was facing him.<br><br>Eliza kicked off of the wall and rolled over to Darcy, pulling his pistol from his belt, and fired several rounds through Mr. Hurst's head. A splatter of blood, brain and skull chips showered down on Harold Bloom.<br><br>"Well," Mr. Harold Bloom said, wiping blood from his face and wiping it on the sofa, "that was entirely unnecessary, but what HASN'T been? The whole book review is sound and fury, signifying nothing. And how many times is this hack going to parody <u>Pride and Prejudice</u>? He seems to think it's much more funny than it is, just as Oscar Wilde thought himself hilarious, when he is in fact highly over-esteemed."<br><br>Holmes puffed his pipe, a gray cloud of smoke rising above him. "I can't believe I didn't notice Mr. Hurst was turning. Usually I'm so attentive to details."<br><br>"Nobody's perfect," Darcy said. "Would you mind putting that pipe out? We are in a zeppelin, you know."<br><br>Holmes sighed and stood up, pulling on his overcoat. "I'm going next door to the Kurt Vonnegut review. Pipe smoking is encouraged over there." <br><br>And as Holmes left the room, suddenly the review stopped.<br></span>
	  												<a data-text-id="1229566540314906503" href="#" onclick="swapContent($(this));; return false;">...more</a>

	          										</span>
	        									</div>
	      									<div class="reviewFooter uitext buttons">
	    										<div class="updateActionLinks">
	      											<span class="likeItContainer">
	      												<a id="like_count_review_91338657" rel="nofollow" href="/rating/voters/91338657?resource_type=Review">
	      													<span class="likesCount">317 likes</span>
	      												</a>&nbsp;·&nbsp;
	      													<span class="loadingLinkSpan"><a>Like</a>
	      													</span>&nbsp;·&nbsp;
	      												      <a id="commentLink_2344330972" href="#" onclick="comment_form_for(&#39;review&#39;, 2344330972, true, &#39;&#39;); return false;">comment</a>


	      											</span>
	   											 </div>
											</div>
											<div class="brown_comment" id="comments_form_review_91338657" style="display: none">
												<textarea class="placeholder_text" onclick="expand_comment_form_for('review', 91338657, true, '')">Write a comment...</textarea>
											</div>

  									</div>
								</div>
							</div>
						</div>
					</div>
	    			<div class="rightContainer" style="padding-left: 30px">
	    				<div class=" clearFloats bigBox">
	    					<div class="h2Container gradientHeaderContainer">
	    						<h2 class="brownBackground">
	    							<a href="/author/list/221253.Cherie_Priest">other books in the series</a>
	    						</h2>
	    					</div>
	    					<div class="bigBoxBody">
	    						<div class="bigBoxContent containerWithHeaderContent">
	    							<br>
							        
							        <div class="js-tooltipTrigger tooltipTrigger">
							          <a href="/book/show/7911067-dreadnought">
							          	<img id="more_book_7911067" alt="Dreadnought (The Clockwork Century, #2)" title="Dreadnought (The Clockwork Century, #2)" width="50" src="https://images.gr-assets.com/books/1389139447m/7911067.jpg" />
							          </a>
							        </div>
    							</div>
    						</div>
    					</div>
    					<br>
	    				<div id="aboutAuthor" class=" clearFloats bigBox">
	    					<div class="h2Container gradientHeaderContainer">
	    						<h2 class="brownBackground"><a href="/author/show/221253.Cherie_Priest">About {{ $book->name_author}}</a></h2>
	    					</div>
	    					<div class="bigBoxBody">
	    						<div class="bigBoxContent containerWithHeaderContent">
	    							<br>
          							<div class="bookAuthorProfile">
										<div class="bookAuthorProfile__topContainer">
											<div class="bookAuthorProfile__photoContainer">
											<a href="/author/show/221253.Cherie_Priest">
												<div class="bookAuthorProfile__photo" style="background-image: url({{ $book->avatar_author }});">
												</div>
											</a>
											</div>
											<div class="bookAuthorProfile__widgetContainer">
												<div class="bookAuthorProfile__name">
												{{ $book->name_author}}
												</div>
												<div class="bookAuthorProfile__followerCount">
												{{ $book->count_book_author}}
												</div>
											</div>
										</div>
										<div class="bookAuthorProfile__about">
											<span id="freeTextContainer17471756927507434106">{{ $book->name_author}} {{ $book->liking_author}}</span>
										</div>
									</div>
								</div>
							</div>
						</div>
	    			</div>
	    		</div>
	    	</div>
	    </div>
	</div>
</body>
</html>