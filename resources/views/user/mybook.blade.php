<!DOCTYPE html>
<html>
<head>
	<title>My Books page</title>
	<link rel="stylesheet" href="{{asset('frontend/css/mybooka.css')}}" />
	  <!-- <link rel="stylesheet" media="all" href="https://s.gr-assets.com/assets/goodreads-b6d05e04f0a745bb03b7b8e6e4c8901a.css" /> -->
	<link rel="stylesheet" href="{{asset('frontend/css/mybook_2.css')}}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('frontend/css/mystyle.css')}}">

</head>
<body>
	<div class="content">
		@include('frontend.layouts.header')
		<div class="mainContentContainer">
	    	<div class="mainContent">
	    		<div class="mainContentFloat">
	    			<div id="leadercol">
						<div id="header" style="float: left">
						    <h1>
						        <a href="/review/list/78270916?page=1">My Books</a>
						    </h1>
						</div>
						<div id="controls" class="uitext right">
						   
				          	<div class="myBooksSearch">
								<form id="myBooksSearchForm" class="inlineblock" action="/review/list/78270916-tom" accept-charset="UTF-8" method="get">
									<input name="utf8" type="hidden" value="✓">
									<input id="sitesearch_field" size="22" class="smallText" placeholder="Search books" type="text" name="search[query]">
								</form>
								<a class="myBooksSearchButton" href="#" onclick="$j('#myBooksSearchForm').submit(); return false;"><img title="my books search" alt="search" src="https://s.gr-assets.com/assets/layout/magnifying_glass-a2d7514d50bcee1a0061f1ece7821750.png"></a>
							</div>		
						</div>
	    			</div>
	    			<div id="columnContainer" class="myBooksPage">
					    <div id="leftCol" class="col reviewListLeft">
					      	<div id="sidewrapper">
					        	<div id="side">
					          		<div id="shelvesSection">
					           	 		<h3>Bookshelves</h3>
					            		<a class="selectedShelf" href="/review/list/78270916?shelf=%23ALL%23">All ({{$count1 + $count2 + $count3}})</a>
					            		<div id="paginatedShelfList" class="stacked">
						                	<div class="userShelf">
						    					<a title="Tom&#39;s Read shelf" class="actionLinkLite" href="{{ route('showbook.index', ['shelf'=>3])}}">Read  &lrm;({{$count3}})</a>
						  					</div>
						  					<div class="userShelf">
						    					<a title="Tom&#39;s Currently Reading shelf" class="actionLinkLite" href="{{ route('showbook.index', ['shelf'=>2])}}">Currently Reading  &lrm;({{$count2}})</a>
						  					</div>
								  			<div class="userShelf">
								    			<a title="Tom&#39;s Want to Read shelf" class="actionLinkLite" href="{{ route('showbook.index', ['shelf'=>1])}}">Want to Read  &lrm;({{$count1}})</a>
								  			</div>
					  					</div>
					  				</div>
					  			</div>
							</div>
					  	</div>
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
							            <th alt="title" class="header field title" style="padding-left: 50px;">
							                  <a href="/review/list/78270916?sort=title">Action</a>
							            </th>
      								</tr>
      							</thead>
      							<tbody id="booksBody">
      								@foreach($books as $book)
      								<tr id="review_2314565026" class="bookalike review" style="padding-left: 50px;">
      									<td class="field cover">
									            <a href="images/books/{{$book->picture}}">
									            	<img alt="{{$book->title}}" width="55px" height="70px" src="images/books/{{$book->picture}}" />
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
          								<td class="field title" style="padding-left: 50px;">
          									<form method="POST" action="{{ route('showbook.destroy', $book->id) }}">
          										{{ csrf_field() }}
										        {{ method_field('DELETE') }}
          										<button type="submit" class="close">
          										<span aria-hidden="true">&times;</span></button>
          									</form>
          									
          								</td>
      								</tr>
      								@endforeach
      							</tbody>
      						</table>
					</div>
	    		</div>
			</div>
		</div>
	</div>
</body>
</html>