<!DOCTYPE html>
<html>
<head>
	<title>Show book by topic</title>
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
		<div class="siteHeader__topLine gr-box gr-box--withShadow">
		<div class="siteHeader__contents">
			<div class="siteHeader__topLevelItem siteHeader__topLevelItem--searchIcon">
				<button class="siteHeader__searchIcon gr-iconButton" aria-label="Toggle search" type="button""></button>
			</div>
			<a href="/" class="siteHeader__logo" aria-label="Goodreads Home" title="Goodreads Home"></a>
			<nav class="siteHeader__primaryNavInline">
				<ul role="menu" class="siteHeader__menuList">
					<li class="siteHeader__topLevelItem siteHeader__topLevelItem--home">
						<a href="/" class="siteHeader__topLevelLink">Home</a></li>
					<li class="siteHeader__topLevelItem">
						<a href="/review/list/78270916" class="siteHeader__topLevelLink">My Books</a></li>
				</ul>
			</nav>
			<div accept-charset="UTF-8" class="searchBox searchBox--navbar">
				<form autocomplete="off" action="/search" class="searchBox__form" role="search" aria-label="Search for books to add to your shelves">
				    <input class="searchBox__input searchBox__input--navbar" autocomplete="off" name="q" type="text" placeholder="Search books" aria-label="Search books" aria-controls="searchResults"/>
				    <button type="submit" class="searchBox__icon--magnifyingGlass gr-iconButton searchBox__icon searchBox__icon--navbar" aria-label="Search"></button>
				</form>
			</div>
			<div class="siteHeader__personal">
				<ul class="personalNav">
                    <li class="personalNav__listItem">
                        <a href="{{ route('home')}}" rel="nofollow" class="siteHeader__topLevelLink">Sign In</a>
                    </li>
                    <li class="personalNav__listItem">
                    <a href="{{ route('home')}}" rel="nofollow" class="siteHeader__topLevelLink">Sign Up</a>
                    </li>
                </ul>
            </div>
        </div>
		</div>
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

                        <div class="coverRow   ">

                            <div class="leftAlignedImage bookBox">
							@foreach($book as $boook)
								<div class="coverWrapper" id="bookCover498942_35540804">
										<a href="/book/show/35540804-blood-water-paint"><img alt="Blood Water Paint" title="" width="115" class="bookImage" src="../images/books/{{$boook->picture}}" /></a>
									</div>
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