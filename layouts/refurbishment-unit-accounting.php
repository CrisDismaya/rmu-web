<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>
	<title> Refurbish Process | RMU </title>
	<?php include_once './_partials/__header-template.php'; ?>
	<style>
		.seperator {
			border-right: 1px solid;
			padding-right: 20px;
		}

		.note {
			background-color: #f5f3b3;
			margin-top: 10px;
			border-radius: 6px;
			height: 70px;
			padding: 20px;

		}

		.upload-class {
			float: right;
			top: -25px;
			position: relative;
			right: 20px;
			font-size: large;
			color: #7cebeb;
			cursor: pointer;
		}
	</style>
</head>

<body>
	<!-- Begin page -->
	<div id="layout-wrapper">
		<?php include_once './_partials/__sidebar-menu.php'; ?>

		<div class="main-content">
			<div class="page-content">
				<div class="container-fluid">

					<div class="row">
						<div class="col-12">
							<div class="page-title-box d-sm-flex align-items-center justify-content-between">
								<h4 class="mb-sm-0" id="header-breadcram">REFURBISHMENT REPORT (ACCOUNTING)</h4>
							</div>
						</div>
					</div>

					<div class="row">
						<!-- table -->
						<div class="col-lg-12">
							<div class="card">
								<div class="card-header align-items-center d-flex">
									<h4 class="card-title mb-0 flex-grow-1">REFURBISHMENT REPORT (ACCOUNTING)</h4>
									<div class="flex-shrink-0">
										<!-- <button id="request" type="button" class="btn btn-soft-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="Request_reprice()">
											Create Request 
										</button> -->
									</div>
								</div>
								<div class="card-body">
									<table id="refurbish-accounting" class="table table-bordered nowrap align-middle mdl-data-table" style="width:100%">
										<thead>
											<tr>
												<th>Branch</th>
												<th> Brand </th>
												<th> Model </th>
												<th> Color </th>
												<th> Engine </th>
												<th> Chassis </th>
												<th> Ex. Owner </th>
												<th> Date Settled </th>
												<th> Principal Balance </th>
												<th> Added Cost </th>
											</tr>
										</thead>
									</table>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>

		</div>
	</div><!--start loader-->

	<div class="loading-overlay" id="loading-overlay">
		<div class="overlay"></div>
		<div class="spanner">
			<div class="loader"></div>
			<p>Please wait. . . .</p>
		</div>
	</div>
	<!--end loader-->
	<?php include_once './_partials/__footer-template.php'; ?>

   <script>
      $(document).ready(function(){
         display_table()
      })

      async function display_table(){
			const tableData = await $.ajax({
				url: `${baseUrl}/settledRefurbishAccounting`,
				method: 'GET',
				dataType: 'json',
				headers:{
					'Authorization':`Bearer ${ auth.token }`,
				}
			});

			$("#refurbish-accounting").DataTable().destroy();
			$("#refurbish-accounting").DataTable({
				deferRender: true,
				searching: true,
				scrollY: 400,
		  		scrollX: true,
				scrollCollapse: true,
				paging: false,
				data: tableData.data,
				columns: [
					{ data: "branchName" },
					{ data: "brand" },
					{ data: "model" },
					{ data: "color" },
					{ data: "engine" },
					{ data: "chassis" },
					{ data: "exOwner" },
					{ data: "SettledDate", className: "text-center" },
					{ data: "principal_balance", render: $.fn.dataTable.render.number('\, ', '.', 2, '', ''), className: "text-end" },
					{ data: "total_cost_parts", render: $.fn.dataTable.render.number('\, ', '.', 2, '', ''), className: "text-end" },
				], 
				dom: 'Bfrtip',
					buttons: [
						'excelHtml5'
					]
			});
		}
   </script>
</body>
</html>
 