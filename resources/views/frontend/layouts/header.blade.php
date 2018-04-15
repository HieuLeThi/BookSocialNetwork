<style>
.dropbtn {
	/*background-color: yellow;*/
    color: white;
    font-size: 18px;
    border: none;
    cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
    background-color: #382110;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #ffffff;
    min-width: 125px;
    overflow: auto;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown a:hover {background-color: #ddd}

.show {display:block;}
</style>
<div class="siteHeader__topLine gr-box gr-box--withShadow">
		<div class="siteHeader__contents">
			<div class="siteHeader__topLevelItem siteHeader__topLevelItem--searchIcon">
				<button class="siteHeader__searchIcon gr-iconButton" aria-label="Toggle search" type="button""></button>
            </div>
            @if(Auth::check())
                <a href="{{ route('user.index')}}" class="siteHeader__primaryNavInline"><h3 style="color: #81593d; font-style: cursive; margin-top:10px">ReadBook</h3></a>
            @else
                <a href="{{ route('home')}}" class="siteHeader__primaryNavInline"><h3 style="color: #81593d; font-style: cursive; margin-top:10px">ReadBook</h3></a>
            @endif            
			<nav class="siteHeader__primaryNavInline">
				<ul role="menu" class="siteHeader__menuList">
                    @if(Auth::check())
                        <li class="siteHeader__topLevelItem siteHeader__topLevelItem--home">
                            <a href="{{ route('user.index')}}" class="siteHeader__topLevelLink">Home</a></li>
                        <li class="siteHeader__topLevelItem">
                        <a href="#" class="siteHeader__topLevelLink">My Books</a></li>
                    @else
                        <li class="siteHeader__topLevelItem siteHeader__topLevelItem--home">
                            <a href="{{ route('home')}}" class="siteHeader__topLevelLink">Home</a></li>
                        <li class="siteHeader__topLevelItem">
                        <a href="{{ route('home')}}" class="siteHeader__topLevelLink">My Books</a></li>
                    @endif
				</ul>
			</nav>
			<div accept-charset="UTF-8" class="searchBox searchBox--navbar">
				<form autocomplete="off" action="/search" class="searchBox__form" role="search" aria-label="Search for books to add to your shelves">
				    <input class="searchBox__input searchBox__input--navbar" autocomplete="off" name="q" type="text" placeholder="Search books" aria-label="Search books" aria-controls="searchResults"/>
				    <button type="submit" class="searchBox__icon--magnifyingGlass gr-iconButton searchBox__icon searchBox__icon--navbar" aria-label="Search"></button>
				</form>
            </div>
            @if(Auth::check())
            <nav class="siteHeader__primaryNavInline">
				<ul role="menu" class="siteHeader__menuList">
					<li class="siteHeader__topLevelItem siteHeader__topLevelItem--home">
						<!-- <a href="/" class="siteHeader__topLevelLink">Home</a></li> -->
						<marquee  class="siteHeader__topLevelLink" >Welcome - Hi! {{ Auth::user()->name }}</marquee>
					
				</ul>
			</nav>
            @endif
			<div class="siteHeader__personal">
				<ul class="personalNav">
                @if(Auth::check())
                <li class="personalNav__listItem">
	      			<!-- <div> -->
        				<div class="dropdown dropdown--notifications">
					        <a class="dropdown__trigger dropdown__trigger--notifications dropdown__trigger--personalNav" href="/notifications" role="button" aria-haspopup="true" aria-expanded="false" title="Notifications">
					            <span class="headerPersonalNav__icon
					                       headerPersonalNav__icon--notifications" aria-label="Notifications">
					            </span>
					        </a>
					    </div>
		                <!-- <div class="dropdown__menu dropdown__menu--notifications gr-box gr-box--withShadowLarge" role="menu"">
	                       	<div class="dropdown__container gr-notifications gr-notifications--sparse">
	                        <div class="spinnerContainer">
	                        	<div class="spinner">
	                        		<div class="spinner__mask">
                        				<div class="spinner__maskedCircle">
                        				
                        			</div>
                        		</div>
                        	</div>
                        	<div class="spinnerFallbackText">Loading…</div>
                        </div> -->
                    <!-- </div> -->
                	</li>
                    <li class="personalNav__listItem">
                    	<a href="/message/inbox" title="Messages" class="headerPersonalNav">
                    		<span class="headerPersonalNav__icon headerPersonalNav__icon--inbox" aria-label="Inbox">
                    		</span>
                    	</a>
                    </li>
                    <li class="personalNav__listItem">
                    	<a href="/friend" title="Friends" class="headerPersonalNav">
                    		<span class="headerPersonalNav__icon headerPersonalNav__icon--friendRequests" aria-label="Friend Requests"></span>
                   		</a>
                    </li>
                    <li class="personalNav__listItem">

                    	<div class="dropdown dropdown--profileMenu">
                           <button onclick="myFunction()" class="dropbtn">
                                <span class="headerPersonalNav__icon" data-reactid=".2fvgd7ogb28.1.0.5.0.4.0.0.0"><img class="circularIcon circularIcon--border" src="{{ Auth::user()->avatar_url}}" alt="{{Auth::user()->name}}"></span>
                            </button>
                    		
							  <div id="myDropdown" class="dropdown-content">
							  	<span class="siteHeader__subNavLink gr-h3 gr-h3--noMargin" style="padding-top: 10px">{{ Auth::user()->name }}</span>
							    <a href="{{ route('user.show', ['id' => Auth::user()->id]) }}">Profile</a>
							    <a href="#about">My Book</a>
							    <a href="#contact">Friend</a>
							    <a href="{{ route('logout') }}"
			                      onclick="event.preventDefault();
			                               document.getElementById('logout-form').submit();">
			                      {{ __('Sign out') }}
			                  </a>

			                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
			                      {{ csrf_field() }}
			                  </form>

							  </div>
                    	</div>
                    	<script>
							/* When the user clicks on the button, 
							toggle between hiding and showing the dropdown content */
							function myFunction() {
							    document.getElementById("myDropdown").classList.toggle("show");
							}

							// Close the dropdown if the user clicks outside of it
							window.onclick = function(event) {
							  if (!event.target.matches('.dropbtn')) {

							    var dropdowns = document.getElementsByClassName("dropdown-content");
							    var i;
							    for (i = 0; i < dropdowns.length; i++) {
							      var openDropdown = dropdowns[i];
							      if (openDropdown.classList.contains('show')) {
							        openDropdown.classList.remove('show');
							      }
							    }
							  }
							}
							</script>
                    </li>
                @else
                    <li class="personalNav__listItem">
                        <a href="{{ route('home')}}" rel="nofollow" class="siteHeader__topLevelLink">Sign In</a>
                    </li>
                    <li class="personalNav__listItem">
                        <a href="{{ route('home')}}" rel="nofollow" class="siteHeader__topLevelLink">Sign Up</a>
                    </li>
                @endif
                </ul>
            </div>
            
                
        </div>
		</div>