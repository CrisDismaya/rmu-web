
<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>
	<title> Appraised Units | RMU </title>
	<?php include_once './_partials/__header-template.php'; ?>
	<style>
		.seperator {
			border-right: 1px solid;
			padding-right:20px;
		}
		.note {
			background-color:#f5f3b3;
			margin-top:10px;
			border-radius:6px;
			height:70px;
			padding:20px;
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
								<h4 class="mb-sm-0" id="header-breadcram">List Of Appraised Units</h4>
							</div>
						</div>
					</div>

					<div class="row">
						<!-- table -->
						<div class="col-lg-12">
							<div class="card">
								<div class="card-header align-items-center d-flex">
									<h4 class="card-title mb-0 flex-grow-1">List of  Units</h4>
									<div class="flex-shrink-0 col-md-3" id="branches-selection">
										<select id="status" class="form-select form-select-sm select-single">
											<option value="all">ALL</option>
											<option value="0">PENDING</option>
											<option value="1">APPROVED</option>
											<option value="2">DISAPPROVED</option>
										</select>   
									</div>
								</div>
								<div class="card-body">
									<table id="received-unit-table" class="table table-bordered nowrap align-middle mdl-data-table" style="width:100%">
									<thead>
											<tr>
												<th>Branch</th>
												<th> Brand </th>
												<th> Model </th>
												<th> Color </th>
												<th style="text-align: left !important;">Request Price </th>
												<th> Engine </th>
												<th> Chassis </th>
												<th> Approved Date </th>
												<th> Ex. Owner </th>
												<th> Status </th>
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
		$(document).ready(function(){
			display_table('all')

			$('#status').change(function(){
				const value = this.value;
				display_table(value)
			});
		})

		async function display_table(status){

			if ($.fn.DataTable.isDataTable("#received-unit-table")) {
				$('#received-unit-table').DataTable().clear().destroy();
			}
			
			$("#received-unit-table").DataTable({
				processing: true,
				serverSide: true,
				ajax: {
					url: `${baseUrl}/appraisedUnitList`,
					type: 'GET',
					headers: {
						'Authorization': `Bearer ${auth.token}`,
						'Content-Type': 'application/json',
					},
					data: {
						status: status 
					},
					error: function (xhr, error, thrown) {
						console.error('DataTables AJAX error:', error, thrown);
					}
				},
				scrollX: true,
				scrollCollapse: true,
				columns: [
					
					{ data: "branchname" },
					{ data: "brandname" },
					{ data: "model_name" },
                    { data: "color" },
					{ data: "approved_price", render: $.fn.dataTable.render.number( '\, ', '.', 2, '', '' ), className: "text-end" },
					{ data: "model_engine" },
					{ data: "model_chassis" },
                    { data: "date_approved" },
                    { data: null, defaultContent: '',
						fnCreatedCell: function(nTd, sData, oData, iRow, iCol){
						//	
						    html = `<span>${ oData.o_firstname } ${ oData.o_middlename } ${ oData.o_lastname }</span>`;
							
							$(nTd).html(html);
						}
					},
					{ data: "status" },
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