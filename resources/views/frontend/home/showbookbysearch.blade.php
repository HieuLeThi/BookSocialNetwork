<!DOCTYPE html>
<html>
<head>
	<title>Show book by search</title>
	<link rel="stylesheet" media="all" href="https://s.gr-assets.com/assets/goodreads-b4a91517aa00c2ede826962c83c1ea16.css" />
	
	<link rel="stylesheet" media="screen,print" href="https://s.gr-assets.com/assets/review/list-999f3695f560f96c8637b3d3bb2677dc.css" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('frontend/css/mystyle.css')}}">
  	<link rel="canonical" href="https://www.goodreads.com/review/list/78270916" />
	<script src="https://s.gr-assets.com/assets/react_client_side/sprockets_dependencies-30f123719317f85caddeb01ca7b5493c.js"></script>
	<script src="https://s.gr-assets.com/assets/react_client_side/external_dependencies-48241921bf.js"></script>
	<script src="https://s.gr-assets.com/assets/react_client_side/home-41a67ed5b8.js"></script>

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
                            Book Search
                        </h1>
                    </div>
                    <br/>
                    <div class="coverBigBox clearFloats bigBox" show_header="true"><div class="h2Container gradientHeaderContainer"><h2 class="brownBackground"><a href="/genres/new_releases/art">New Releases Tagged &quot; {{ request('search') }} &quot;</a></h2></div><div class="bigBoxBody"><div class="bigBoxContent containerWithHeaderContent">

                        <div class="coverRow">
						@foreach($bookSearch as $book)
                            <div class="leftAlignedImage bookBox">
								<div class="coverWrapper">
									<a href="{{ route('showbook.show', ['id' => $book->id]) }}"><img alt="{{ $book->title}}" title="{{ $book->title}}" width="115" class="bookImage" src="images/books/{{$book->picture}}" /></a>
								</div>
							</div>
						@endforeach
			            </div>
		            </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>