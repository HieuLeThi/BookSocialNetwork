<!DOCTYPE html>
<html>
<head>
	<title>home - user</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="{{ URL::asset('frontend/css/home_user.css')}}" />
	<!-- <link rel="stylesheet" type="text/css" href="{{ URL::asset('frontend/css/mystyle.css')}}">	 -->
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
	<script type="text/javascript" src="{{ asset('js/jquery.min.js')}}"></script>

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
									<a href="{{route('user.show', ['id' => $book->author])}}" class="gr-book__authorLink gr-hyperlink gr-hyperlink--naked">{{$book->name_author}}</a>
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
							<a href="{{ route('showbook.index', ['shelf'=>2])}}">View all books</a>
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
							<a href="{{ route('showbook.index', ['shelf'=>1])}}">View all books</a>
						</div>
				</div>
			</section>
			<section class="showForLargeWidth">
            <h3 class="gr-h3 gr-h3--noTopMargin">BOOKSHELVES</h3>
				<div class="userShelvesBookCounts">
					<div class="userShelvesBookCounts__counts" data-reactid=".1oycz45z9j4.0">
					<a class="u-displayBlock" href="{{ route('showbook.index', ['shelf'=>3])}}">{{$count3}}</a>
					<a class="u-displayBlock" href="{{ route('showbook.index', ['shelf'=>2])}}">{{$count2}}</a>
					<a class="u-displayBlock" href="{{ route('showbook.index', ['shelf'=>1])}}">{{$count1}}</a>
				</div>
				<div><a class="userShelvesBookCounts__nameLink" href="{{ route('showbook.index', ['shelf'=>3])}}">Read</a>
					<a class="userShelvesBookCounts__nameLink" href="{{ route('showbook.index', ['shelf'=>2])}}">Currently Reading</a>
					<a class="userShelvesBookCounts__nameLink" href="{{ route('showbook.index', ['shelf'=>1])}}">Want to Read</a>
				</div>
				</div>
			</section>
		</div>
		<div class='homePrimaryColumn'>
			<div class="u-clearBoth">
				@foreach ($posts as $post)
					<div class="gr-newsfeed u-defaultType" style="margin-bottom: 35px">
						@foreach($post->user as $puser)
						<div class="gr-newsfeedItem gr-mediaBox">
							<div class="gr-newsfeedItem__headerIcon gr-mediaBox__media gr-mediaBox__media--marginSmall">
								<a href="{{route('user.show', ['id' => $puser->id])}}">
									<img class="circularIcon circularIcon--medium circularIcon--border" src="{{ $puser->avatar_url}}" alt="{{ $puser->name}}">
								</a>
							</div>
							<div class="gr-mediaBox__desc gr-newsfeedItem__body">
								@foreach($post->book as $pbook)
								<div class="gr-newsfeedItem__header gr-newsfeedItem__header--timestamp">
									<a class="gr-hyperlink gr-hyperlink--bold gr-user__profileLink u-marginRightTiny" href="{{route('user.show', ['id' => $puser->id])}}" data-tracking-dfp="true" data-tracking-pmet="{&quot;click_type&quot;:&quot;social&quot;}">{{ $puser->name}}</a>
									<span class="gr-newsfeedItem__headerText">reviewed</span>
									<a class="gr-hyperlink gr-hyperlink--bold" href="{{route('showbook.show',['id' => $pbook->id])}}">{{ $pbook->title}}</a>
								</div>
								<small class="gr-newsfeedItem__headerTimestamp">
									<a href="#" class="gr-hyperlink gr-hyperlink--naked">
										<time datetime="2018-02-26T23:15:33.000-08:00" aria-label="19 days ago">
											{{ date( 'h:i a d-m', strtotime($post->created_at)) }}</time></a>
								</small>
								<div class="gr-newsfeedItem__socialBookUpdateDetails">
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
											<a href="{{route('showbook.show',['id' => $pbook->id])}}" class="gr-book__titleLink gr-book__titleLink--large gr-hyperlink gr-hyperlink--naked" data-tracking-dfp="true" data-tracking-pmet="{&quot;click_type&quot;:&quot;book_title&quot;}">{{ $pbook->title}}</a>
										</div>
										<div class="gr-book__author gr-book__author--large">
											<a href="https://www.goodreads.com/author/show/534082.Tim_Butcher" class="gr-book__authorLink gr-hyperlink gr-hyperlink--naked" data-tracking-dfp="true">{{ $pbook->name_author}}</a>
										</div>
										<div class="gr-book__additionalContent">
											<div data-tracking-dfp="true" data-tracking-pmet="{&quot;click_type&quot;:&quot;wtr_button&quot;}">

											<div class="userRating" style="margin-left: 0px;">
												<small class="userRating__label">Public at:</small>
												<div class="userRating__starsWrapper" tabindex="0" role="group">
													<small class="userRating__label">{{ date( 'd-m-Y', strtotime($pbook->created_at)) }}</small>
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
								@if(count($post->likeByUser) === 1)
									<form data-post_id ="{{$post->id}}" class="form">
										<button  style="display: inline" id="delete_like_{{$post->id}}" class="gr-buttonAsLink">UnLike</button>
									</form>
								@elseif(count($post->likeByUser) === 0)
										<form data-post_id ="{{$post->id}}" class="form">
											<button style="display: inline" id="btn_like_{{$post->id}}" class="gr-buttonAsLink">Like</button>
										</form>	
								@endif	
								<script>

								    $.ajaxSetup({

								        headers: {

								            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
								        }

								    });

								    $("#btn_like_{{$post->id}}").click(function(e){
								        e.preventDefault();
								        var post_id = {{$post->id}};
								        var url = window.location.origin + '/BookSocialNetwork/public/like?id=' + post_id;
								        $.ajax({

								           type:'POST',

								           url:url,

								           data: {'post_id': post_id},

								           success:function(likeCreate){
								           	if(likeCreate.like == 1) {
									           	$('#user_like_{{$post->id}}').css('display','inline')
									           	$('#btn_like_{{$post->id}}').text("UnLike")
									           	}
								           	}
								        });

									});



									
								</script>
								</div>
								<div class="likeInformation u-defaultType">
									@if(count($post->likeByUser) === 1)
										<span style="display: inline" class="likeInformation__name"  id="un_user_like_{{$post->id}}">You and </span>
										<a href="/user/show/5527956"  class="gr-hyperlink gr-hyperlink--bold likeInformation__name">{{$post->like->count() -1 }}</a>
									@endif
									<span class="likeInformation__name" id="user_like_{{$post->id}}" style="display: none">You and </span>
									@if(count($post->likeByUser) === 0)
										<a href="/user/show/5527956"  class="gr-hyperlink gr-hyperlink--bold likeInformation__name">{{$post->like->count() }}</a>
									@endif
									
									
									<span>other people liked this</span>
								</div>
								<script>
									$.ajaxSetup({

								        headers: {

								            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
								        }

								    });
									$("#delete_like_{{$post->id}}").click(function(e){
								        e.preventDefault();
								        var post_id = {{$post->id}};
								        var url = window.location.origin + '/BookSocialNetwork/public/like?id=' + post_id;
								        debugger;
								        $.ajax({

								           type:'POST',

								           url:url,

								           data: {'post_id': post_id },

								           success:function(likeCreate){
								           		$("#delete_like_{{$post->id}}").text("Like");
								           		$("#un_user_like_{{$post->id}}").css('display', 'none');
								           }
								        });
									});

								</script>	
								<div class="gr-commentForm gr-mediaBox">
									<div class="gr-mediaBox__media u-noLineHeight">
										<a href="{{route('user.show', ['id' => Auth::user()->id])}}">
											<img class="circularIcon circularIcon--border" src="{{ Auth::user()->avatar_url }}" alt="Tom">
										</a>
									</div>
										<form class="gr-mediaBox__desc form" method="post" action="{{ route('comment.store', ['id' =>$post->id])}}">
			                				{{ csrf_field() }}
											<textarea class="gr-textarea gr-commentForm__textarea" name="content" rows="1"  placeholder="Write a comment…" aria-label="Write a comment…">
											</textarea>
											@if($errors->first('content')) 
                            					<p class="text-danger">{{ $errors->first('content') }}</p>
                          					@endif
											<button id="btn_cmt" class="gr-commentForm__submitButton gr-button gr-button--small"  type="submit">Comment</button>
										</form>
									</div>
								</div>
								
								@foreach($post->comments as $cmt)
								<div class="gr-commentForm gr-mediaBox">

									<div class="gr-mediaBox__media">
										<a href="{{ $cmt->userComment->avatar_url }}">
											<img class="circularIcon circularIcon--border" src="{{ $cmt->userComment->avatar_url }}" alt="">
										</a>
									</div>
									<div class="gr-mediaBox__desc gr-mediaBox__desc--clearfixOverflow">
                              			<div class="gr-comment__rightSideInformation">
                              				<small class="gr-comment__timestamp">
                              					<time">{{ date( 'h:i a d-m', strtotime($cmt->created_at)) }}</time>
                              					<p></p>
                              				</small>
                              				@if(Auth::check())
		    									@if($cmt->userComment->name == Auth::user()->name)
	                              				<form method="POST" action="{{ route('comment.destroy', $cmt->id) }}" style="display: inline;">
						                          {{ csrf_field() }}
						                          {{ method_field('DELETE') }}
						                          <button type="submit" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
											    </form>
                              					</button>
                              					@endif
                              				@endif	
                              			</div>
                              			<a class="gr-hyperlink gr-hyperlink--bold gr-user__profileLink" href="{{route('user.show', ['id' => $cmt->userComment->id])}}"" data-tracking-dfp="true" data-tracking-pmet="{&quot;click_type&quot;:&quot;social&quot;}">{{ $cmt->userComment->name }}</a>
                              			<div class="gr-comment__body">
                              				<div class="expandableHtml">
                              					<span data-reactid=".1od8uww6bk0.2.0.$=1$Update_4730448877.0.1.2.2.1:$kca=2//comment/amzn1=1gr=1comment=1v1=14mSXlXrqBlHNjsqA0KN9ww.1.3.0.0">{{ $cmt->content }}</span>
                              				</div>
                              			</div>
                              		</div>
                              		
                              	</div>
                              	@endforeach
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
								<div class="gr-book__title" data-reactid=".1yh1fdqpgxs.0.1.$=1$34273236.1.1"><a href="{{ route('showbook.show', ['id' => $nb->id]) }}" class="gr-book__titleLink gr-hyperlink gr-hyperlink--naked">{{ $nb->title}}</a>
								</div>
								<div class="gr-book__author" data-reactid=".1yh1fdqpgxs.0.1.$=1$34273236.1.2">
									<span data-reactid=".1yh1fdqpgxs.0.1.$=1$34273236.1.2.0">by</span>
									<a href="{{route('user.show', ['id' => $nb->author])}}" class="gr-book__authorLink gr-hyperlink gr-hyperlink--naked">{{ $nb->name_author}}</a>
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