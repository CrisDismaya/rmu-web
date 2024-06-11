   <meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
	<meta content="Themesbrand" name="author" />
	<!-- App favicon -->
	<link rel="shortcut icon" href="../assets/images/favicon.ico">
	
	<!-- select2 -->
	<link rel="stylesheet" href="../assets/libs/select2/select2.min.css">
	
	<!-- datatables -->
	<link rel="stylesheet" href="../assets/libs/datatables/dataTables.bootstrap5.min.css">
	<link rel="stylesheet" href="../assets/libs/datatables/responsive.bootstrap.min.css">
	<link rel="stylesheet" href="../assets/libs/datatables/buttons.dataTables.min.css">
	
	<!-- Layout config Js -->
	<script src="../assets/js/layout.js"></script>
	<!-- Bootstrap Css -->
	<link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<!-- Icons Css -->
	<link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css" />
	<!-- App Css-->
	<link href="../assets/css/app.min.css" rel="stylesheet" type="text/css" />
	<!-- custom Css-->
	<link href="../assets/css/custom.min.css" rel="stylesheet" type="text/css" />

	<script src="../assets/js/jquery.js"></script>
	<script>

		var page_url = window.location.href
		var page_name = page_url.split('/').pop()
   		
		$(document).ready(function(){
			getModuleId(page_name)
		})

		function getModuleId(pagename){
			$.ajax({
				url: `${baseUrl}/getCurrentModule/${pagename}`, 
				type: 'GET', 
				headers:{
					'Authorization':`Bearer ${ auth.token }`,
				},
				success: function (data) {
					
					$('#moduleid').val(data)
					return data
				},
				error: function(response) {
					toast(response.responseJSON.message, 'danger');
				}
			});
		}

		function showLoader(){
			let overlay = document.getElementById('loading-overlay')
			overlay.style.display = 'block'

			$("div.spanner").addClass("show");
  			$("div.overlay").addClass("show");
		}

		function hideLoader(){

			setTimeout(() => {
				let overlay = document.getElementById('loading-overlay')
				overlay.style.display = 'none'
				$("div.spanner").removeClass("show");
				$("div.overlay").removeClass("show");
			}, 500);
			
		}

		function forceLogout(response){
			if(response.message == 'Unauthenticated.'){
				alert('Your token session is expired.! Please relogin')
				let link =  location.protocol == "https:" ? '/index.php' : '/rmu_web/index.php'
				localStorage.removeItem('data')
				window.location.replace(link)	
			}
			
		}
	</script>
	<style>
		.loading-overlay {
			display: none;
			background: rgba(255, 255, 255, 0.7);
			position: fixed;
			bottom: 0;
			left: 0;
			right: 0;
			top: 0;
			z-index: 9998;
			align-items: center;
			justify-content: center;
			}

			.loading-overlay.is-active {
			display: flex;
			}

			.code {
			font-family: monospace;
			/*   font-size: .9em; */
			color: #dd4a68;
			background-color: rgb(238, 238, 238);
			padding: 0 3px;
			} 

			.spanner{
		position:absolute;
		top: 50%;
		left: 0;
		background: #2a2a2a55;
		width: 100%;
		display:block;
		text-align:center;
		height: 100%;
		color: #FFF;
		transform: translateY(-50%);
		z-index: 1000;
		visibility: hidden;
		}

		.overlay{
		position: fixed;
			width: 100%;
			height: 100%;
		background: rgba(0,0,0,0.5);
		visibility: hidden;
		}

		.loader,
		.loader:before,
		.loader:after {
		border-radius: 50%;
		width: 2.5em;
		height: 2.5em;
		-webkit-animation-fill-mode: both;
		animation-fill-mode: both;
		-webkit-animation: load7 1.8s infinite ease-in-out;
		animation: load7 1.8s infinite ease-in-out;
		}
		.loader {
		color: #ffffff;
		font-size: 10px;
		margin: 80px auto;
		margin-top:20%;
		/* margin-bottom:50%; */
		position: relative;
		text-indent: -9999em;
		-webkit-transform: translateZ(0);
		-ms-transform: translateZ(0);
		transform: translateZ(0);
		-webkit-animation-delay: -0.16s;
		animation-delay: -0.16s;
		}
		.loader:before,
		.loader:after {
		content: '';
		position: absolute;
		top: 0;
		}
		.loader:before {
		left: -3.5em;
		-webkit-animation-delay: -0.32s;
		animation-delay: -0.32s;
		}
		.loader:after {
		left: 3.5em;
		}
		@-webkit-keyframes load7 {
		0%,
		80%,
		100% {
			box-shadow: 0 2.5em 0 -1.3em;
		}
		40% {
			box-shadow: 0 2.5em 0 0;
		}
		}
		@keyframes load7 {
		0%,
		80%,
		100% {
			box-shadow: 0 2.5em 0 -1.3em;
		}
		40% {
			box-shadow: 0 2.5em 0 0;
		}
		}

		.show{
		visibility: visible;
		}

		.spanner, .overlay{
			opacity: 0;
			-webkit-transition: all 0.3s;
			-moz-transition: all 0.3s;
			transition: all 0.3s;
		}

		.spanner.show, .overlay.show {
			opacity: 1
		}

			
	</style>
	
	

