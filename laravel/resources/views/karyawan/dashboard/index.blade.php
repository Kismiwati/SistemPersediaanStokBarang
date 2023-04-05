<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Sitem Informasi Persedian Stok Pakaian</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Novus Admin Panel Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="{{ asset('web') }}/css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="{{ asset('web') }}/css/style.css" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<!-- font-awesome icons -->
<link href="{{ asset('web') }}/css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
 <!-- js-->
<script src="{{ asset('web') }}/js/jquery-1.11.1.min.js"></script>
<script src="{{ asset('web') }}/js/modernizr.custom.js"></script>
<!--webfonts-->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<!--//webfonts--> 
<!--animate-->
<link href="{{ asset('web') }}/css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="{{ asset('web') }}/js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
<!-- chart -->
<script src="{{ asset('web') }}/js/Chart.js"></script>
<!-- //chart -->
<!--Calender-->
<link rel="stylesheet" href="{{ asset('web') }}/css/clndr.css" type="text/css" />
<script src="{{ asset('web') }}/js/underscore-min.js" type="text/javascript"></script>
<script src= "{{ asset('web') }}/js/moment-2.2.1.js" type="text/javascript"></script>
<script src="{{ asset('web') }}/js/clndr.js" type="text/javascript"></script>
<script src="{{ asset('web') }}/js/site.js" type="text/javascript"></script>
<!--End Calender-->
<!-- Metis Menu -->
<script src="{{ asset('web') }}/js/metisMenu.min.js"></script>
<script src="{{ asset('web') }}/js/custom.js"></script>
<link href="{{ asset('web') }}/css/custom.css" rel="stylesheet">
<!--//Metis Menu -->
</head> 
<body class="cbp-spmenu-push">
	<div class="main-content">
		<!--left-fixed -navigation-->
		@include('karyawan.komponen.sidebar')
		<!--left-fixed -navigation-->
		<!-- header-starts -->
		@include('karyawan.komponen.navbar')
		<!-- //header-ends -->
		{{-- <section id="main-content">
		@yield('sidebar') --}}
		<!-- main content start-->
		<section id="main-content">
            @yield('content')
		<!--footer-->
		<div class="footer">
			<p>&copy; 2023 Sistem Informasi Persedian Stok Pakain  </p>
		</div>
        <!--//footer-->
	</div>
	<!-- Classie -->
		<script src="{{ asset('web') }}/js/classie.js"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
				
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			

			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>
	<!--scrolling js-->
	<script src="{{ asset('web') }}/js/jquery.nicescroll.js"></script>
	<script src="{{ asset('web') }}/js/scripts.js"></script>
	<!--//scrolling js-->
	<!-- Bootstrap Core JavaScript -->
   <script src="{{ asset('web') }}/js/bootstrap.js"> </script>
</body>
</html>