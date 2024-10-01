
<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>
	<title> Sold Units | RMU </title>
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
								<h4 class="mb-sm-0" id="header-breadcram">List Of Units Sold</h4>
							</div>
						</div>
					</div>

					<div class="row">
						<!-- table -->
						<div class="col-lg-12">
							<div class="card">
								<div class="card-header align-items-center d-flex">
									<h4 class="card-title mb-0 flex-grow-1">List of  Units</h4>
									<div class="flex-shrink-0">
										<!-- <button type="button" class="btn btn-soft-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="add_receive_units()">
											Create Request 
										</button> -->
									</div>
								</div>
								<div class="card-body">
									<table id="received-unit-table" class="table table-bordered nowrap align-middle mdl-data-table" style="width:100%">
									<thead>
											<tr>
												<th>Branch</th>
												<th>Invoice Reference #</th>
												<th> Brand </th>
												<th> Model </th>
												<th> Color </th>
                                                
												<th style="text-align: left !important;">Price </th>
												<th> Engine </th>
												<th> Chassis </th>
												<th> Sale Type </th>
												<th> Sold Date </th>
												<th> Ex. Owner </th>
												<th> Sold To </th>
												<th> Downpayment </th>
												<th> Monthly Amortization </th>
												<th> Rebate </th>
												<th> Terms </th>
												<th> Form </th>
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

	<div class="modal fade" id="generateForm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-xl" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="myExtraLargeModalLabel"> </h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body container">
					<div class="card pa-2">
						<div class="row" id="iframe-content" style="height:800px;">

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php include_once './_partials/__footer-template.php'; ?>

	<script>

	
		$(document).ready(function(){
			display_table()
		})

		async function display_table(){
			if ($.fn.DataTable.isDataTable("#received-unit-table")) {
				$('#received-unit-table').DataTable().clear().destroy();
			}

			$("#received-unit-table").DataTable({
				processing: true,
				serverSide: true,
				ajax: function(data, callback, settings) {
					fetch(`${baseUrl}/SoldMasterList`, {
						method: 'GET',
						headers: {
							'Authorization': `Bearer ${auth.token}`,
							'Content-Type': 'application/json',
						},
					})
					.then(response => response.json())
					.then(data => {
						callback({
							draw: settings.iDraw,
							recordsTotal: data.recordsTotal,
							recordsFiltered: data.recordsFiltered, 
							data: data.data
						});
					})
					.catch(error => {
						console.error('Error fetching data:', error);
					});
				},
		  		scrollX: true,
				scrollCollapse: true,
				columns: [
					{ data: "branchname" },
					{ data: "invoice_reference_no" },
					{ data: "brandname" },
					{ data: "model_name" },
					{ data: "color" },
					{ data: "approved_price", render: $.fn.dataTable.render.number( '\, ', '.', 2, '', '' ), className: "text-end" },
					{ data: "model_engine" },
					{ data: "model_chassis" },
					{ data: "sale_type" },
					{ data: "sold_date" },
					{ data: null, defaultContent: '',
						fnCreatedCell: function(nTd, sData, oData, iRow, iCol){
						//	
						    html = `<span>${ oData.o_firstname } ${ oData.o_middlename } ${ oData.o_lastname }</span>`;
							
							$(nTd).html(html);
						}
					},
					{ data: null, defaultContent: '',
						fnCreatedCell: function(nTd, sData, oData, iRow, iCol){
						//	
						    html = `<span>${ oData.firstname } ${ oData.middlename } ${ oData.lastname }</span>`;
							
							$(nTd).html(html);
						}
					},
					{ data: "dp" },
					{ data: "monthly_amo" },
					{ data: "rebate" },
					{ data: "terms" },
					{
						data: null,
						defaultContent: '',
						fnCreatedCell: function(nTd, sData, oData, iRow, iCol) {
							//	
							html = `
								<a id="forms-${iRow}" class="btn btn-sm btn-outline-primary" onclick="generateForm(${ oData.repo_id }, ${ iRow }, 'SOLD')">
									<b>Delivery Receipt</b>
								</a>
							`;

							$(nTd).html(html);
						}
					},
					
				],
				dom: 'Bfrtip',
					buttons: [
						'excelHtml5'
					]
			});
		}

		function generateForm(recordId, index, forms) {
				$('#myExtraLargeModalLabel').html(forms + ' Form')
				$('#iframe-content').html(`
					<iframe  height="100%" width="100%" src="${ baseUrl }/generateReport/${ forms }/${ recordId }/inventory" frameborder="0"></iframe>
				`)
				$('#generateForm').modal('show')
		}
	</script>
</body>
</html>