@extends('karyawan.dashboard.index')
@section('title','Form')
@section('content')
<!DOCTYPE HTML>
<html>
<head>
<title>Novus Admin Panel an Admin Panel Category Flat Bootstrap Responsive Website Template | Basic Forms :: w3layouts</title>
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
<!-- Metis Menu -->
<script src="{{ asset('web') }}/js/metisMenu.min.js"></script>
<script src="{{ asset('web') }}/js/custom.js"></script>
<link href="{{ asset('web') }}/css/custom.css" rel="stylesheet">
<!--//Metis Menu -->
</head> 
<body class="cbp-spmenu-push">
	<div class="main-content">
		<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">
					{{-- <h3 class="title1">Ukuran Barang</h3> --}}
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						<div class="form-title">
							<h4>Form Ukuran:</h4>
						</div>
						<div class="form-body">
							<form action="{{ url('/karyawan/ukuran/createukuran/') }}" role="form" method="POST">
                                @csrf 
                                    <div class="form-group"> 
                                        <label for="nama_ukuran" >Ukuran</label> 
                                        <input  name="nama_ukuran" type="text" class="form-control" id="nama_ukuran" placeholder="Masukkan Ukuran"> 
                                    </div> 
                                    <button type="submit" class="btn btn-default">Simpan</button> 
                                </form> 
						</div>
					</div>
				</div>
			</div>
		</div>
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
@endsection