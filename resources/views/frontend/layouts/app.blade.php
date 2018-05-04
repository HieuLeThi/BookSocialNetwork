<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>@yield('title_pahe')</title>
	<!-- <link rel="stylesheet" media="all" href="https://s.gr-assets.com/assets/goodreads-479eda3f659b065fab977d3b90262b48.css" /> -->
  	<!-- <link rel="stylesheet" media="screen" href="https://s.gr-assets.com/assets/gr/pages/home/signed_out_hp-eab4665c54e79e40622762ba2c868cf3.css" /> -->
  	
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('frontend/css/style.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('frontend/css/img68cf3.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('frontend/css/mystyle.css')}}">
	<link rel="stylesheet" media="screen" href="https://s.gr-assets.com/assets/gr/pages/home/signed_out_hp-ed7a599d7709f2dfe7104a2c8d31cd9d.css" />	

</head>
<body>
	@yield('content')
</body>
</html>