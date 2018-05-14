<!DOCTYPE html>
<html>
<head>
	<title>Show book by search</title>
	<meta name="csrf-token" content="{{ csrf_token() }}" />
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
                            All Books
                        </h1>
                    </div>
                    <br/>
                    <div class="coverBigBox clearFloats bigBox" show_header="true"><div class="h2Container gradientHeaderContainer"><h2 class="brownBackground"><a href="#">List Book All System</a></h2></div><div class="bigBoxBody"><div class="bigBoxContent containerWithHeaderContent">

                        <div class="coverRow">
						@foreach($allBook as $book)
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