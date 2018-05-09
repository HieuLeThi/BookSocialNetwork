<!DOCTYPE html>
<html>
<head>
	<title>Show book by topic</title>
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
                            {{ $categories->title}}
                        </h1>
                    </div>
                    <br/>
                    <div class="coverBigBox clearFloats bigBox" show_header="true"><div class="h2Container gradientHeaderContainer"><h2 class="brownBackground"><a href="/genres/new_releases/art">New Releases Tagged &quot; {{ $categories->title}} &quot;</a></h2></div><div class="bigBoxBody"><div class="bigBoxContent containerWithHeaderContent">

                        <div class="coverRow">
						@foreach($book as $boook)
                            <div class="leftAlignedImage bookBox">
								<div class="coverWrapper">
									<a href="{{ route('showbook.show', ['id' => $boook->id]) }}"><img alt="{{ $boook->title}}" title="" width="115" class="bookImage" src="../images/books/{{$boook->picture}}" /></a>
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