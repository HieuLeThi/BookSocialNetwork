<!DOCTYPE html>
<html>
<head>
    <title>User Profile</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="{{ URL::asset('frontend/css/profile.css')}}" />
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('frontend/css/mystyle.css')}}">
	<script type="text/javascript" src="{{ asset('js/jquery.min.js')}}"></script>
</head>
<body>
	<div class="content">
		@include('frontend.layouts.header')
		<div class="mainContentContainer">
	    	<div class="mainContent">
	    		<div class="mainContentFloat">
	    			<div class="leftContainer" style="font-size: 14px">
		    			<div id="topcol" class="last col stacked">
		    				<div id="imagecol" class="col">
							  	<div class="bookCoverContainer">
								    <div class="bookCoverPrimary">
								          <a rel="nofollow" itemprop="image" href="{{ $userProfile->avatar_url}}">
								          	<img id="coverImage" alt="{{ $userProfile->name}}" src="{{ $userProfile->avatar_url}}" />
								          </a>
								    </div>
							    </div>
							</div>
							<div id="metacol" class="last col" style="width: 425px;margin-left: 10px">
								<h1 id="profileNameTopHeading" class="userProfileName">
							      {{ $userProfile->name}}
							      @if($userProfile->name == Auth::user()->name)
							        <a class="smallText" href="{{ route('user.edit', ['id' =>  Auth::user()->id]) }}">(edit profile)</a>
							      @else 
								      	@if($statusFriend == null)
										    @if($friendCheck == null)
										    	<form  style="display: inline" data-friend_id="{{$userProfile->id}}" class="form" methord="{{ route('friend.store', ['id' => $userProfile->id]) }}">
												    	<button id="btn_add_friend" class="gr-commentForm__submitButton gr-button gr-button--small" style="margin-left: 47px;">Add As Friend</button>
												      	<button id="re_friend" class="gr-commentForm__submitButton gr-button gr-button--small" style="margin-left: 47px; background-color: pink;display: none"  type="submit">Friend Request</button>
											    </form>
									  		@elseif($friendCheck->status == '2')
									  			<form style="display: inline" method="POST" action="{{ route('acceptFriend.store', ['id' =>$userProfile->id]) }}">
					                				{{ csrf_field() }}
									  				<button id="btn_ac_friend" class="gr-commentForm__submitButton gr-button gr-button--small" style="margin-left: 47px; background-color: red;"  type="submit">Accept Friend Request</button>
									  			</form>
							      				
							      			@elseif($friendCheck->status == '1')
									      		<button id="re_friend" class="gr-commentForm__submitButton gr-button gr-button--small" style="margin-left: 47px; background-color: yellow;"  type="submit">Friend</button>
									      	@endif
										@else
								      			@if($statusFriend->status == '2')
								      				<button id="re_friend" class="gr-commentForm__submitButton gr-button gr-button--small" style="margin-left: 47px; background-color: pink;"  type="submit">Friend Request</button>
								      			@elseif($statusFriend->status == '1')
								      				<button id="re_friend" class="gr-commentForm__submitButton gr-button gr-button--small" style="margin-left: 37px; background-color: yellow;"  type="submit">Friend</button>

								      			@endif
							      	@endif
							      @endif

							      <script>

								    $.ajaxSetup({

								        headers: {

								            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
								        }

								    });

								    $("#btn_add_friend").click(function(e){
								        e.preventDefault();
								        var friend_id = $('.form').attr('data-friend_id')
								        var url = $('.form').attr('methord');
								        $.ajax({

								           type:'POST',

								           url:url,

								           data: {'friend_id': friend_id},

								           success:function(friend){
								           	if(friend.status == 2) {

								           	$('#re_friend').css('display','inline')
								           	$('#btn_add_friend').css('display', 'none')
								           	}
								           	else {
								           		alert('to lo');
								           	}
								           	}
								        });

									});

								</script>



							        @if (session('status'))
					                  <div class="alert alert-success">
					                      <span>{{ session('status') }}</span>
					                  </div>
					                @endif
							    </h1>
									<div class="infoBoxRowTitle">Gender</div>
	      							<div class="infoBoxRowItem">
								        @if($userProfile->gender == NULL)
	      									<p>None</p>
	      								@elseif ($userProfile->gender == 1)
	      									<p>Female</p>
	      								@elseif ($userProfile->gender == 2)
	      									<p>Male</p>
	      								@endif
								    </div>
	  								<div class="infoBoxRowTitle">Activity</div>
	      							<div class="infoBoxRowItem">
								       Joined in {{ date( 'd-m-Y', strtotime($userProfile->created_at)) }}
								    </div>
	      							<div class="infoBoxRowTitle">Thinking</div>
	      							<div class="infoBoxRowItem">
	      								@if($userProfile->liking == NULL)
	      									<p>None</p>
	      								@endif
	      								<p>{{ $userProfile->liking}}</p>
								    </div>
	      							
							</div>
		    			</div>
		    			<br>
					</div>
					@if(isset($friendCheck))
						@if($friendCheck->status == '1')
						<div id="rightCol" class="last col">
						  		<table id="books" class="table stacked" border="0">
	      							<thead>
	      								<tr id="booksHeader" class="tableList">
	      									<th alt="cover" class="header field author" style="padding-left: 10px;">
								                  <a href="/review/list/78270916?sort=cover">cover</a>
								            </th>
								            <th alt="title" class="header field title" style="">
								                  <a href="/review/list/78270916?sort=title">title</a>
								            </th>
								            <th alt="author" class="header field author" style="">
								                  <a href="/review/list/78270916?sort=author">author</a>
								            </th>
								            <th alt="shelves" class="header field author" style="padding-left: 10px;">
								                  shelves
								            </th>
								           	<th alt="date_read" class="header field date_read" style="">
							                  <a href="/review/list/78270916?sort=date_read">date read</a>
							            	</th>
	      								</tr>
	      							</thead>
	      							<tbody id="booksBody">
	      								@foreach($books as $book)
	      								<tr id="review_2314565026" class="bookalike review" style="padding-left: 50px;">
	      									<td class="field cover" width="5px" style="margin-right: 20px">
										            <a href="images/books/{{$book->picture}}">
										            	<img alt="{{$book->title}}" width="55px" height="70px" src="../images/books/{{$book->picture}}" />
										            </a>
	          								</td>
	          								<td class="field title">
	          									<a href="{{route('showbook.show', ['id' => $book->id])}}">{{$book->title}}</a>
	          								</td>
	          								<td class="field author">
	          									<a href="#">{{$book->name_author}}</a>
	          								</td>
	          								<td class="field author" style="padding-left: 10px;">
	          									@if($book->status == 1)
	          									<a href="#">Want to read</a>
	          									@elseif ($book->status == 2)
	          									<a href="#">Currently reading</a>
	          									@elseif ($book->status == 3)
	          									<a href="#">Read</a>
	          									@endif
	          								</td>
	          								<td class="field date_read">
	          									{{ date( 'M, d - Y', strtotime($book->updated_at)) }}
	          								</td>
	      								</tr>
	      								@endforeach
		      							</tbody>
	      						</table>
						</div>
		    			@endif
		    		@endif
		    		@if(isset($statusFriend))
						@if($statusFriend->status == '1')
						<div id="rightCol" class="last col">
						  		<table id="books" class="table stacked" border="0">
	      							<thead>
	      								<tr id="booksHeader" class="tableList">
	      									<th alt="cover" class="header field author" style="padding-left: 10px;">
								                  <a href="/review/list/78270916?sort=cover">cover</a>
								            </th>
								            <th alt="title" class="header field title" style="">
								                  <a href="/review/list/78270916?sort=title">title</a>
								            </th>
								            <th alt="author" class="header field author" style="">
								                  <a href="/review/list/78270916?sort=author">author</a>
								            </th>
								            <th alt="shelves" class="header field author" style="padding-left: 10px;">
								                  shelves
								            </th>
								           	<th alt="date_read" class="header field date_read" style="">
							                  <a href="/review/list/78270916?sort=date_read">date read</a>
							            	</th>
	      								</tr>
	      							</thead>
	      							<tbody id="booksBody">
	      								@foreach($books as $book)
	      								<tr id="review_2314565026" class="bookalike review" style="padding-left: 50px;">
	      									<td class="field cover" width="5px" style="margin-right: 20px">
										            <a href="images/books/{{$book->picture}}">
										            	<img alt="{{$book->title}}" width="55px" height="70px" src="../images/books/{{$book->picture}}" />
										            </a>
	          								</td>
	          								<td class="field title">
	          									<a href="{{route('showbook.show', ['id' => $book->id])}}">{{$book->title}}</a>
	          								</td>
	          								<td class="field author">
	          									<a href="#">{{$book->name_author}}</a>
	          								</td>
	          								<td class="field author" style="padding-left: 10px;">
	          									@if($book->status == 1)
	          									<a href="#">Want to read</a>
	          									@elseif ($book->status == 2)
	          									<a href="#">Currently reading</a>
	          									@elseif ($book->status == 3)
	          									<a href="#">Read</a>
	          									@endif
	          								</td>
	          								<td class="field date_read">
	          									{{ date( 'M, d - Y', strtotime($book->updated_at)) }}
	          								</td>
	      								</tr>
	      								@endforeach
		      							</tbody>
	      						</table>
						</div>
		    			@endif
		    		@endif
	    		</div>
	    	</div>
	    </div>
	</div>
</body>
</html>