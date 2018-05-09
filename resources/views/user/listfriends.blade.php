<!DOCTYPE html>
<html>
<head>
	<title>List friends</title>
	<script type="text/javascript" src="{{asset('scripts/jquery.rateit.min.js')}}"></script>
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('scripts/rateit.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('frontend/css/mystyle.css')}}">
	<script type="text/javascript" src="{{ asset('js/jquery.min.js')}}"></script>
	<link rel="stylesheet" href="{{ URL::asset('frontend/css/showbook.css')}}" />
</head>
<body>
	<div class="content">
	@include('frontend.layouts.header')		
		<div class="mainContentContainer">
	    	<div class="mainContent">
	    		<div class="mainContent">
                <div class="row">
                    
                    <div class="genreHeader">
                        <h1 class="left">
                            Friends
                        </h1>
                    </div>
                    <br/>
                    <div class="coverBigBox clearFloats bigBox" show_header="true">
                    	<div class="h2Container gradientHeaderContainer"><h2 class="brownBackground">
                    		<a href="/genres/new_releases/art">&quot; REQUEST FRIENDS &quot;</a></h2>
                    	</div>
                    	<br>
                    	<div class="bigBoxBody">
                    		<div class="bigBoxContent containerWithHeaderContent">
                    			<!-- lap -->
                    			@foreach($friendRequest as $friendRq)
                    			<div class="col-md-6">
                    				<div class="elementList" style="margin-left: 40px; width: 350px;">
			          					<a title="{{$friendRq->friendReq->name}}" class="leftAlignedImage" href="{{ route('user.show', ['id' => $friendRq->user_id]) }}" style="width: 70px" ><img alt="{{$friendRq->friendReq->name}}" width="50px" height="66px" src="{{$friendRq->friendReq->avatar_url}}"></a>

								          <div class="friendInfo">
								            <a class="userLink" href="{{ route('user.show', ['id' => $friendRq->user_id]) }}">{{$friendRq->friendReq->name}}</a>
								            <br>
								            <a href="/review/list/78309217">2 books</a> |
								            <br>
								          </div>
				        				<div class="clear"></div>
			        				</div>
			        			</div>
			        			@endforeach
                    			<!-- het lap -->
	        				</div>
	        			</div>
	        		</div>
		            

					<div class="coverBigBox clearFloats bigBox" show_header="true">
                    	<div class="h2Container gradientHeaderContainer"><h2 class="brownBackground">
                    		<a href="/genres/new_releases/art">&quot; FRIENDS &quot;</a></h2>
                    	</div>
                    	<br>
                    	<div class="bigBoxBody">
                    		<div class="bigBoxContent containerWithHeaderContent">
                    			@foreach($friend as $fr)
								<div class="col-md-6">
	                    			@if($fr->user_id === Auth::user()->id)
                    				<div class="elementList" style="margin-left: 40px; width: 350px;">
			          					<a title="Hung" class="leftAlignedImage" href="{{route('user.show', ['id' => $fr->friend_id])}}" style="width: 70px" ><img alt="{{$fr->name_friend}}" width="50" height="66" src="{{$fr->avatar_friend}}"></a>

								          <div class="friendInfo">
								            <a class="userLink" href="{{route('user.show', ['id' => $fr->friend_id])}}">{{$fr->name_friend}}</a>
								            <br>
								            <a href="/review/list/78309217">2 books</a> |
								            <br>
								          </div>
				        				<div class="clear"></div>
			        				</div>
	                    			@elseif($fr->friend_id === Auth::user()->id)
	                    			<div class="elementList" style="margin-left: 40px; width: 350px;">
			          					<a title="Hung" class="leftAlignedImage" href="{{route('user.show', ['id' => $fr->user_id])}}" style="width: 70px" ><img alt="{{ $fr->friendReq->name}}" width="50" height="66" src="{{ $fr->friendReq->avatar_url}}"></a>

								          <div class="friendInfo">
								            <a class="userLink" href="{{route('user.show', ['id' => $fr->user_id])}}">{{ $fr->friendReq->name}}</a>
								            <br>
								            <a href="/review/list/78309217">2 books</a> |
								            <br>
								          </div>
				        				<div class="clear"></div>
			        				</div>
	                    			@endif
			        			</div>
			        			@endforeach
	        				</div>
	        			</div>
	        		</div>	


                </div>
            </div>
        </div>
    </div>
</body>
</html>