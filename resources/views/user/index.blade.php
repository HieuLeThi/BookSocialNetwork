<!DOCTYPE html>
<html>
<head>
	<title>home - user</title>
    <link rel="stylesheet" media="screen" href="https://s.gr-assets.com/assets/gr/application-2a8fdf619e08c24d5212446dd0848b94.css" />
    <link rel="stylesheet" href="{{ URL::asset('frontend/css/home_user.css')}}" />
    <link rel="stylesheet" media="screen" href="https://s.gr-assets.com/assets/gr/application-e83211a8f70d3e6bb1ebad59d99d3736.css" />
	<script src="https://s.gr-assets.com/assets/react_client_side/sprockets_dependencies-30f123719317f85caddeb01ca7b5493c.js"></script>
	<script src="https://s.gr-assets.com/assets/react_client_side/external_dependencies-48241921bf.js"></script>
	<script src="https://s.gr-assets.com/assets/react_client_side/home-41a67ed5b8.js"></script>
	<script src="https://use.fontawesome.com/079150a0fc.js"></script>
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('frontend/css/mystyle.css')}}">
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	
	

	<script src="https://s.gr-assets.com/assets/webfontloader-f2373eb97b67c818c1db5c9392e387af.js"></script>
</head>
<body style="background: #f9f7f4">
	@include('frontend.layouts.header')	
	<main>
		<div class='homeSecondaryColumn'>
			<section class='gr-homePageRailContainer u-paddingBottomMedium'>
				<section class="currentlyReadingShelf">
					<h3 class="gr-h3 gr-h3--noTopMargin">Currently Reading</h3>
						@foreach($books as $book)
						<div class="gr-mediaBox gr-book--medium gr-book">
							<a href="{{ route('showbook.show', ['id' => $book->id]) }}">
								<img alt="{{ $book->title}}" class="gr-mediaBox__media gr-book__image" src="images/books/{{ $book->picture}}"/>
							</a>
							<div class="gr-mediaBox__desc gr-mediaBox__desc--clearfixOverflow" data-reactid=".1yh1fdqpgxs.0.1.$=1$34273236.1">
								<div class="gr-book__title" ><a href="{{ route('showbook.show', ['id' => $book->id]) }}" class="gr-book__titleLink gr-hyperlink gr-hyperlink--naked">{{ $book->title}}</a>
								</div>
								<div class="gr-book__author">
									<span data-reactid=".1yh1fdqpgxs.0.1.$=1$34273236.1.2.0">by </span>
									<a href="https://www.goodreads.com/author/show/164692.Celeste_Ng" class="gr-book__authorLink gr-hyperlink gr-hyperlink--naked" data-reactid=".1yh1fdqpgxs.0.1.$=1$34273236.1.2.1">{{$book->name_author}}</a>
								</div>
							</div>
						</div>
						@endforeach
						
				</section>
				<footer data-reactid=".1yh1fdqpgxs.1">
					<div class="u-marginTopXSmall" data-reactid=".1yh1fdqpgxs.1.0">
						
					</div>
					<span data-reactid=".1yh1fdqpgxs.1.1">
						<span data-reactid=".1yh1fdqpgxs.1.1.$0">
							<a href="/review/list/78270916-tom?shelf=currently-reading">View all books</a>
						</span>
						<span data-reactid=".1yh1fdqpgxs.1.1.$1">
							<span data-reactid=".1yh1fdqpgxs.1.1.$1.0"> · </span>
						</span>
						<span data-reactid=".1yh1fdqpgxs.1.1.$2">
							<input class="gr-buttonAsLink currentlyReadingShelf__addBook" value="Add a book" type="button" autocomplete="off" data-reactid=".1yh1fdqpgxs.1.1.$2.0"/>
						</span>
						<span data-reactid=".1yh1fdqpgxs.1.1.$3">
							<span data-reactid=".1yh1fdqpgxs.1.1.$3.0"> · </span>
						</span>
					</span>
				</footer>
			</section>
			<section class='gr-homePageRailContainer u-paddingBottomMedium showForLargeWidth'>
            <h3 class="gr-h3 gr-h3--noTopMargin">Want to Read</h3>
				<div class="shelfDisplay">
					@foreach ($wtr as $readwantto)
					<a class="shelfDisplay__bookCoverLink" href="{{ route('showbook.show', ['id' => $readwantto->id]) }}">
						<img alt="{{ $readwantto->title}}" src="images/books/{{ $readwantto->picture}}" class="gr-bookCover gr-bookCover--thumbnailSmall"/>
					</a>
					@endforeach
						<div class="u-marginTopXSmall">
							<a href="https://www.goodreads.com/review/list?shelf=to-read" aria-label="View your to-read shelf" data-reactid=".3p3gp8bitc.1.0">View all books</a>
						</div>
				</div>
			</section>
			<section class="showForLargeWidth">
            <h3 class="gr-h3 gr-h3--noTopMargin">BOOKSHELVES</h3>
				<div class="userShelvesBookCounts">
					<div class="userShelvesBookCounts__counts" data-reactid=".1oycz45z9j4.0">
					<a class="u-displayBlock" href="/user_shelves/255139600" aria-label="Read shelf. 1 books." data-reactid=".1oycz45z9j4.0.$read">1</a>
					<a class="u-displayBlock" href="/user_shelves/255139599" aria-label="Currently Reading shelf. 3 books." data-reactid=".1oycz45z9j4.0.$currently-reading">3</a>
					<a class="u-displayBlock" href="/user_shelves/255139598" aria-label="Want to Read shelf. 2 books." data-reactid=".1oycz45z9j4.0.$to-read">2</a>
				</div>
				<div data-reactid=".1oycz45z9j4.1"><a class="userShelvesBookCounts__nameLink" href="/user_shelves/255139600" aria-label="Read shelf. 1 books." data-reactid=".1oycz45z9j4.1.$read">Read</a>
					<a class="userShelvesBookCounts__nameLink" href="/user_shelves/255139599" aria-label="Currently Reading shelf. 3 books." data-reactid=".1oycz45z9j4.1.$currently-reading">Currently Reading</a>
					<a class="userShelvesBookCounts__nameLink" href="/user_shelves/255139598" aria-label="Want to Read shelf. 2 books." data-reactid=".1oycz45z9j4.1.$to-read">Want to Read</a>
				</div>
				</div>
			</section>
		</div>
		<div class='homePrimaryColumn'>
			<div class="u-clearBoth">
				@foreach ($posts as $post)
					<div class="gr-newsfeed u-defaultType">
						@foreach($post->user as $puser)
						<div class="gr-newsfeedItem gr-mediaBox">
							<div class="gr-newsfeedItem__headerIcon gr-mediaBox__media gr-mediaBox__media--marginSmall">
								<a href="/user/show/78309217-hung">
									<img class="circularIcon circularIcon--medium circularIcon--border" src="{{ $puser->avatar_url}}" alt="{{ $puser->name}}">
								</a>
							</div>
							<div class="gr-mediaBox__desc gr-newsfeedItem__body">
								@foreach($post->book as $pbook)
								<div class="gr-newsfeedItem__header gr-newsfeedItem__header--timestamp">
									<a class="gr-hyperlink gr-hyperlink--bold gr-user__profileLink u-marginRightTiny" href="/user/show/78309217-hung" data-tracking-dfp="true" data-tracking-pmet="{&quot;click_type&quot;:&quot;social&quot;}">{{ $puser->name}}</a>
									<span class="gr-newsfeedItem__headerText">reviewed</span>
									<a class="gr-hyperlink gr-hyperlink--bold" href="/book/show/2184798.Blood_River">{{ $pbook->title}}</a>
								</div>
								<small class="gr-newsfeedItem__headerTimestamp">
									<a href="https://www.goodreads.com/review/show/2310079643" class="gr-hyperlink gr-hyperlink--naked" aria-label="Permanent link to Hung’s review of Blood River: A Journey to Africa's Broken Heart">
										<time datetime="2018-02-26T23:15:33.000-08:00" aria-label="19 days ago">{{ date( 'd-m-Y', strtotime($post->created_at)) }}</time></a>
								</small>
								<div class="gr-newsfeedItem__socialBookUpdateDetails">
								<div class="gr-newsfeedItem__readCountText">Read 3 times</div>
								<div class="gr-metaText u-marginBottomXSmall">
									<span class="u-marginRightTiny">
										<span>Rating </span>
										<div class="communityRating u-inlineBlock" aria-label="Rated 3.00 of 5">
											<span>
												<div class="communityRating__starsWrapper communityRating__starsWrapper--medium">
													<div class="communityRating__stars communityRating__stars--medium" style="width:60%;" aria-label="Rated 3.00 of 5">
													</div>
												</div>
											</span>
										</div>
									</span>
								</div>
								<!-- <a href="https://www.goodreads.com/review/show/2310079643" class="gr-hyperlink">
									<span>Read </span>
									<span>Hung</span>
									<span>’s review</span>
								</a> -->
								<div class="gr-metaText">
									<span">Read in Feb 2018</span>
								</div>
								<div class="gr-newsfeedItem__reviewText">
									<div class="expandableHtml">
										<span>{{ $post->content}}</span>
									</div>
								</div>
								<div class="gr-mediaBox gr-book--large gr-book gr-book--border">
									<a href="{{route('showbook.show',['id' => $pbook->id])}}">
										<img alt="{{ $pbook->title}}" class="gr-mediaBox__media gr-book__image gr-book__image--large" src="images/books/{{ $pbook->picture}}" data-tracking-dfp="true" data-tracking-pmet="{&quot;click_type&quot;:&quot;book_image&quot;}">
									</a>
									<div class="gr-mediaBox__desc">
										<div class="gr-book__title">
											<a href="/book/show/2184798.Blood_River" class="gr-book__titleLink gr-book__titleLink--large gr-hyperlink gr-hyperlink--naked" data-tracking-dfp="true" data-tracking-pmet="{&quot;click_type&quot;:&quot;book_title&quot;}">{{ $pbook->title}}</a>
										</div>
										<div class="gr-book__author gr-book__author--large">
											<span>by </span>
											<a href="https://www.goodreads.com/author/show/534082.Tim_Butcher" class="gr-book__authorLink gr-hyperlink gr-hyperlink--naked" data-tracking-dfp="true">{{ $pbook->name_author}}</a>
										</div>
										<div class="gr-book__additionalContent">
											<div data-tracking-dfp="true" data-tracking-pmet="{&quot;click_type&quot;:&quot;wtr_button&quot;}">
											<div class='wtrButtonContainer'>
										    	<div class="form-group" style="width: 160px;">
										    		<select class="form-control" id="sel1"  style="background: #409D69">
												        <option>Want to read</option>
												        <option>Currently Reading</option>
												        <option>Read</option>
												    </select>
										    	</div>
											</div>
												<div class="userRating">
													<small class="userRating__label">Rate it:</small>
													<div class="userRating__starsWrapper" tabindex="0" role="group">
														<button class="userRating__star" title="Rate 1 star" data-tracking-dfp="true" data-tracking-pmet="{&quot;click_type&quot;:&quot;rating&quot;}">
														</button>
														<button class="userRating__star" title="Rate 2 stars" data-tracking-dfp="true" data-tracking-pmet="{&quot;click_type&quot;:&quot;rating&quot;}"></button>
														<button class="userRating__star" title="Rate 3 stars" data-tracking-dfp="true" data-tracking-pmet="{&quot;click_type&quot;:&quot;rating&quot;}"></button>
														<button class="userRating__star" title="Rate 4 stars" data-tracking-dfp="true" data-tracking-pmet="{&quot;click_type&quot;:&quot;rating&quot;}"></button>
														<button class="userRating__star" title="Rate 5 stars" data-tracking-dfp="true" data-tracking-pmet="{&quot;click_type&quot;:&quot;rating&quot;}"></button>
													</div>
												</div>
												<div class="u-marginTopXSmall gr-book__description">
													<span>{{ $pbook->description}}</span>
													<a class="u-marginLeftTiny fullContentLink" href="{{ route('showbook.show', ['id' => $pbook->id])}}" data-tracking-dfp="true" data-tracking-pmet="{&quot;click_type&quot;:&quot;body_click&quot;}">Continue reading</a>
												</div>
											</div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
							</div>
							<div class="gr-newsfeedItem__footer">
								<div class="gr-newsfeedItem__footerActions">
									<button aria-label="Unlike Hung’s review of Blood River: A Journey to Africa's Broken Heart" class="gr-buttonAsLink">Unlike</button>
									<span> · </span>
									<button class="gr-buttonAsLink">Comment</button>
								</div>
								<div class="likeInformation u-defaultType">
									<span class="likeInformation__name">You</span>
									<span > and </span>
									<a href="/user/show/5527956" class="gr-hyperlink gr-hyperlink--bold likeInformation__name">Tim Butcher</a>
									<span> liked this</span>
								</div>
								<noscript></noscript>
								<div class="gr-commentForm gr-mediaBox">
									<div class="gr-mediaBox__media u-noLineHeight">
										<a href="/user/show/78270916-tom">
											<img class="circularIcon circularIcon--border" src="{{ Auth::user()->avatar_url }}" alt="Tom">
										</a>
									</div>
										<form class="gr-mediaBox__desc" method="post" action="/comment"><input type="hidden" name="id" value="2310079643">
											<input type="hidden" name="type" value="Review">
											<textarea class="gr-textarea gr-commentForm__textarea" name="comment[body_usertext]" rows="1" placeholder="Write a comment…" aria-label="Write a comment…">
											</textarea>
										</form>
									</div>
								</div>
							</div>
							@endforeach
					</div>
				@endforeach
			</div>
		</div>
			
		</div>
	</div>
		<div class="homeTertiaryColumn">
			<div class="rightContainer">
			        <div id="listsTeaserBox" class="featureTeaserBox">
			          <h2 class="gr-h3">List books by category</h2>
						@foreach($categories as $category)
							@if(count($category->relateBook) > 0 )
							<div class="listTeaser">
								<div class="listTitle" style="padding: 5px 0px 10px">
							    <a href="{{ route('topics.show', ['id' => $category->id]) }}">{{ $category->title }}</a>
							</div>
								  <div class="listImg" style="margin-bottom: 16px">
							  @foreach($category->relateBook as $relatebook)
								      <a href="{{ route('showbook.show', ['id' => $relatebook->id]) }}"><img width="49" height="75" alt="{{ $relatebook->title}}" title="{{$relatebook->title}}" src="images/books/{{$relatebook->picture}}"></a>
							  @endforeach
								  </div>
							</div>
							@endif
						@endforeach
			        </div>
			    <section class='gr-homePageRailContainer u-paddingBottomMedium' style="border-top: 1px solid #D8D8D8;padding-top: 16px;">
				<section class="currentlyReadingShelf">
					<h3 class="gr-h3 gr-h3--noTopMargin">New Books</h3>
						@foreach($newbook as $nb)
						<div class="gr-mediaBox gr-book--medium gr-book">

							<a href="{{ route('showbook.show', ['id' => $nb->id]) }}">
								<img alt="{{ $nb->title}}" class="gr-mediaBox__media gr-book__image" src="images/books/{{ $nb->picture}}"/>
							</a>
						
							<div class="gr-mediaBox__desc gr-mediaBox__desc--clearfixOverflow" data-reactid=".1yh1fdqpgxs.0.1.$=1$34273236.1">
								<div class="gr-book__title" data-reactid=".1yh1fdqpgxs.0.1.$=1$34273236.1.1"><a href="/book/show/34273236-little-fires-everywhere" class="gr-book__titleLink gr-hyperlink gr-hyperlink--naked" data-reactid=".1yh1fdqpgxs.0.1.$=1$34273236.1.1.0">{{ $nb->title}}</a>
								</div>
								<div class="gr-book__author" data-reactid=".1yh1fdqpgxs.0.1.$=1$34273236.1.2">
									<span data-reactid=".1yh1fdqpgxs.0.1.$=1$34273236.1.2.0">by </span>
									<a href="https://www.goodreads.com/author/show/164692.Celeste_Ng" class="gr-book__authorLink gr-hyperlink gr-hyperlink--naked" data-reactid=".1yh1fdqpgxs.0.1.$=1$34273236.1.2.1">{{ $nb->name_author}}</a>
								</div>
								
							</div>
						</div>
						@endforeach
				</section>
			</section>
				</div>

		</div>
	</main>
</body>
</html>