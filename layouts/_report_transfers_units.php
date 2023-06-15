
<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>
	<title> Report of Transferred Units | RMU </title>
	<?php include_once './_partials/__header-template.php'; ?>
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
								<h4 class="mb-sm-0"> Report of Transferred Units </h4>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-12">
							<div class="card">
								<div class="card-header align-items-center d-flex">
									<h4 class="card-title mb-0 flex-grow-1"> Report of Transferred Units </h4>
								</div>
								<div class="card-body">
									<table id="report-of-transferred-units-table" class="table table-bordered nowrap align-middle mdl-data-table" style="width:100%">
										<thead>
											<th> Customer ID </th>
											<th> Customer Name </th>
											<th> Brand </th>
											<th> Model </th>
											<th> Engine </th>
											<th> Chassis </th>
											<th> Color </th>
											<th> Plate </th>
											<th> Compare <br> Spare Parts </th>
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

	<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document" style="--vz-modal-width: 1500px;">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="myExtraLargeModalLabel"> Missing and Damages Comparison </h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body ">
					<div class="row g-2">
						<div class="col-xxl col-6">
							<div class="card h-100">
								<div class="card-header">
									<h4 class="card-title mb-0"> New </h4>
								</div>
								<div class="card-body" data-simplebar data-simplebar-auto-hide="false" data-simplebar-track="primary" style="height: 550px;">
									<div class="append-spare-parts-new"></div>
								</div>
							</div>
						</div>

						<div class="col-xxl col-6">
							<div class="card h-100">

								<div class="card-header">
									<h4 class="card-title mb-0"> Old </h4>
								</div>
								<div class="card-body" data-simplebar data-simplebar-auto-hide="false" data-simplebar-track="primary" style="height: 550px;">
									<div class="append-spare-parts-old"></div>
								</div>
							</div>
						</div>

					</div>
					<!-- <div class="card mb-0">
						<div class="card-body checkout-tab">

						</div>
					</div> -->
				</div>
				<div class="modal-footer btn-save-footer">
					<a href="javascript:void(0);" class="btn btn-link link-success fw-medium" data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i> Close</a>
				</div>
			</div>
		</div>
	</div>

	
	<?php include_once './_partials/__footer-template.php'; ?>
	<script>
		$(document).ready(function(){
			display_table();
		});

		async function display_table(){
			const tableData = await $.ajax({
				url: `${baseUrl}/getTransferredUnits`,
				method: 'GET',
				dataType: 'json',
				headers:{
					'Authorization':`Bearer ${ auth.token }`,
				}
			});

			$("#report-of-transferred-units-table").DataTable().destroy();
			$("#report-of-transferred-units-table").DataTable({
				deferRender: true,
				searching: true,
				scrollY: 400,
		  		scrollX: true,
				scrollCollapse: true,
				paging: false,
				data: tableData,
				columns: [
					{ data: "acumatica_id", className: "text-center" },
					{ data: "customer_name", className: "fw-semibold" },
					{ data: "brandname" },
					{ data: "model_name" },
					{ data: "model_engine" },
					{ data: "model_chassis" },
					{ data: "color_name" },
					{ data: "plate_number" },
					{ data: null, defaultContent: '', class: 'text-center',
						fnCreatedCell: function(nTd, sData, oData, iRow, iCol){

							html = `
								<button class="btn btn-sm btn-soft-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" 
									onclick="view_comparison(${ oData.origin }, ${ oData.compareid_to })"> 
									<i class="ri-eye-line"></i>
								</button> 
							`;

							$(nTd).html(html);
						}
				},
				]
			});
		}

		function view_comparison(origin, compare_to){
			$('.append-spare-parts-new').empty()
			$('.append-spare-parts-old').empty()
			$.ajax({
				url: `${ baseUrl }/getComparisionSpareParts`, 
				type: 'GET', 
				headers:{
					'Authorization':`Bearer ${ auth.token }`,
				},
				data: {
					origin : origin,
					compare_to : compare_to
				},
				success: function (response) {
					var res = response.data;
					console.log(res)
					
					var new_spare = res.new_list;
					var old_spare = res.old_list;

					if(new_spare.length > 0){
						for (let index = 0; index < new_spare.length; index++) {
							const el = new_spare[index];

							var html = `
								<div class="card card-body border card-border-dark">
									<table class="table table-borderless w-100 mb-0">
										<tr>
											<td width="11%" class="fw-semibold">Code</td>
											<td width="39%"><b>:</b> ${ el.inventory_code }</td>
											<td width="11%" class="fw-semibold">Name</td>
											<td width="39%"><b>:</b> ${ el.name }</td>
										</tr>
										<tr>
											<td class="fw-semibold">Status</td>
											<td><b>:</b> ${ el.parts_status }</td>
											<td class="fw-semibold">Price</td>
											<td><b>:</b> ${ roundOf(el.price) }</td>
										</tr>
										<tr>
											<td class="fw-semibold">Reason</td>
											<td colspan="3"><b>:</b> ${ el.parts_remarks }</td>
										</tr>
									</table>
								</div>
							`;

							$('.append-spare-parts-new').append(html)
						}
					}
					else {
						var html = `
							<div class="card card-body border card-border-dark">
								<table class="table table-borderless w-100 mb-0">
									<tr>
										<td colspan="4"> NO Available Data</td>
									</tr>
								</table>
							</div>
						`;

						$('.append-spare-parts-new').append(html)
					}

					if(old_spare.length > 0){
						for (let index = 0; index < old_spare.length; index++) {
							const el = old_spare[index];

							var html = `
								<div class="card card-body border card-border-dark">
									<table class="table table-borderless w-100 mb-0">
										<tr>
											<td width="11%" class="fw-semibold">Code</td>
											<td width="39%"><b>:</b> ${ el.inventory_code }</td>
											<td width="11%" class="fw-semibold">Name</td>
											<td width="39%"><b>:</b> ${ el.name }</td>
										</tr>
										<tr>
											<td class="fw-semibold">Status</td>
											<td><b>:</b> ${ el.parts_status }</td>
											<td class="fw-semibold">Price</td>
											<td><b>:</b> ${ roundOf(el.price) }</td>
										</tr>
										<tr>
											<td class="fw-semibold">Reason</td>
											<td colspan="3"><b>:</b> ${ el.parts_remarks }</td>
										</tr>
									</table>
								</div>
							`;

							$('.append-spare-parts-old').append(html)
						}
					}
					else {
						var html = `
							<div class="card card-body border card-border-dark">
								<table class="table table-borderless w-100 mb-0">
									<tr>
										<td colspan="4"> NO Available Data</td>
									</tr>
								</table>
							</div>
						`;

						$('.append-spare-parts-old').append(html)
					}
				}
			});
		}
	</script>
</body>
</html>