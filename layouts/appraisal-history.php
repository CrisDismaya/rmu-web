<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>
	<title> Appraisal History | RMU </title>
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
								<h4 class="mb-sm-0" id="header-breadcram">Appraisal History Of Units</h4>

							</div>
						</div>
					</div>

					<div class="row">
						<!-- table -->
						<div class="col-lg-12">
							<div class="card">
								<div class="card-header align-items-center d-flex">
									<h4 class="card-title mb-0 flex-grow-1">List of History</h4>
								</div>
								<div class="card-body">
									<table id="received-unit-table" class="table table-bordered nowrap align-middle mdl-data-table" style="width:100%">
										<thead>
											<tr>
												<th>Branch</th>
												<th> Brand </th>
												<th> Model </th>
												<th> Engine </th>
												<th> Chassis </th>
												<th> Color </th>
												<th style="text-align: left !important;">Old Price </th>
												<th style="text-align: left !important;">Latest Price </th>
												<th> Date Appraised </th>
												<th> Reason </th>
                                                <th> Request By </th>
												<th> Approved By </th>
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
	</div>

	<?php include_once './_partials/__footer-template.php'; ?>

	<script>
		$(document).ready(function() {
			display_table()
		})



		async function display_table() {
			const tableData = await $.ajax({
				url: `${baseUrl}/appraisalHistory`,
				method: 'GET',
				dataType: 'json',
				headers: {
					'Authorization': `Bearer ${ auth.token }`,
				}
			});

			$("#received-unit-table").DataTable().destroy();
			$("#received-unit-table").DataTable({
				deferRender: true,
				searching: true,
				scrollY: 400,
				scrollX: true,
				scrollCollapse: true,
				paging: false,
				data: tableData,
				// aoColumnDefs: [
				// 	{ className: "text-end", targets: [ 4 ] },
				// ],
				columns: [
					{
						data: "branchname"
					},
					{
						data: "brandname"
					},
					{
						data: "model_name"
					},
					{
						data: "model_engine"
					},
					{
						data: "model_chassis"
					},
					{
						data: "color"
					},
					{
						data: "old_price",
						render: $.fn.dataTable.render.number('\, ', '.', 2, '', ''),
						className: "text-end"
					},
					{
						data: "appraised_price",
						render: $.fn.dataTable.render.number('\, ', '.', 2, '', ''),
						className: "text-end"
					},
                    {
						data: "date_approved"
					},
                    {
						data: "remarks"
					},
                    {
						data: "maker"
					},
                    {
						data: "approver"
					},
				],
				dom: 'Bfrtip',
				buttons: [
					'excelHtml5',
					'csvHtml5',
					'pdfHtml5'
				]
			});
		}
	
	</script>
</body>

</html>