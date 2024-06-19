
<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>
	<title> Refurbish Units | RMU </title>
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
								<h4 class="mb-sm-0" id="header-breadcram">List Of Refurbish Units</h4>
							</div>
						</div>
					</div>

					<div class="row">
						<!-- table -->
						<div class="col-lg-12">
							
							<div class="card">
								<!-- <div class="card-header align-items-center d-flex">
									<h4 class="card-title mb-0 flex-grow-1">List of  Units</h4>
									<div class="flex-shrink-0">
										<select id="status" class="form-select form-select-sm">
											<option value="ALL">ALL Status</option>
											<option value="PENDING">PENDING</option>
											<option value="APPROVED">APPROVED</option>
											<option value="ON GOING REFURBISH">ON GOING REFURBISH</option>
											<option value="DONE">DONE</option>
											<option value="DISAPPROVED">DISAPPROVED</option>
										</select>
									</div>
								</div> -->
								<div class="card-header align-items-center d-flex">
									<h4 class="card-title mb-0 flex-grow-1">List of Units</h4>
									<div class="flex-shrink-0">
										<select id="refurb-status" class="form-select form-select-sm">
											<option value="ALL">ALL Status</option>
											<option value="PENDING">PENDING</option>
											<option value="APPROVED">APPROVED</option>
											<option value="ON GOING REFURBISH">ON GOING REFURBISH</option>
											<option value="DONE">DONE</option>
											<option value="DISAPPROVED">DISAPPROVED</option>
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
												<th> Engine </th>
												<th> Chassis </th>
												<th> Request Date </th>
												<th> Ex. Owner </th>
												<th> Status </th>
												<th> Action </th>
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

	<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="myExtraLargeModalLabel"> Missing and Damages Parts </h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
				</div>
				<div class="modal-body container">
					<div class="card pa-2">
						<div class="row">
							<div class="col-12">
                                <div id="part-list" style="height:250px; overflow-y:auto;"></div>
							</div>
							
						
						</div>

					</div>
				</div>
				
			</div>
		</div>
	</div>

	<?php include_once './_partials/__footer-template.php'; ?>

	<script>

	var spares = []
	
		$(document).ready(function(){

			display_table('PRELOAD')

			$('#refurb-status').change(function(){
				display_table('CHANGE')
			})
			
		})



		async function display_table(action){
			const tableData = await $.ajax({
				url: `${baseUrl}/refurbishUnitList`,
				method: 'GET',
				dataType: 'json',
				headers:{
					'Authorization':`Bearer ${ auth.token }`,
				}
			});

			let list = (action == 'PRELOAD' ||  $('#refurb-status').val() == 'ALL' ? tableData : tableData.filter((d) => { return d.status == $('#refurb-status').val()}))

			$("#received-unit-table").DataTable().destroy();
			$("#received-unit-table").DataTable({
				deferRender: true,
				searching: true,
				scrollY: 400,
		  		scrollX: true,
				scrollCollapse: true,
				paging: false,
				data: list,
				// aoColumnDefs: [
				// 	{ className: "text-end", targets: [ 4 ] },
				// ],
				columns: [
					
					{ data: "branchname" },
					{ data: "brandname" },
					{ data: "model_name" },
                    { data: "color" },
					{ data: "model_engine" },
					{ data: "model_chassis" },
                    { data: "date_req" },
                    { data: null, defaultContent: '',
						fnCreatedCell: function(nTd, sData, oData, iRow, iCol){
						//	
						    html = `<span>${ oData.o_firstname } ${ oData.o_middlename } ${ oData.o_lastname }</span>`;
							
							$(nTd).html(html);
						}
					},
					{ data: "status" },
                    { data: null, defaultContent: '',
						fnCreatedCell: function(nTd, sData, oData, iRow, iCol){

							var status = oData.status;
							var classes = (status != 'A' ? 'success' : 'danger');
							var text = (status != 'A' ? 'Activate' : 'Deactivate');

							html = `
							<button class="btn btn-sm btn-soft-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
									onclick="viewParts(${ oData.repo_id })"> 
										<i class="ri-check-circle"></i> View Parts
									</button>
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

		function viewParts(id){
			$.ajax({
				url: `${baseUrl}/getRefurbishParts/${id}`, 
				type: 'GET', 
				headers:{
					'Authorization':`Bearer ${ auth.token }`,
				},
				success: function (data) {
                    let tbl =   `<table class="table" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Parts</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                `
					for(let i = 0; i < data.length; i++){
						spares.push({
							parts:data[i].id
						})
                        tbl += `<tr>
                                    <td>
                                    <input type="text" class="form-control" id="${data[i].id}" value="${data[i].name}" autocomplete="off" disabled>
                                    </td>
                                    <td>
                                    <input type="number" class="form-control" id="parts-${data[i].id}" value="${data[i].price}"  autocomplete="off" disabled>
                                    </td>
                                </tr>`
                    }
                    tbl += `</table>`
                    $('#part-list').html(tbl)
				},
				error: function(response) {
					toast(response.responseJSON.message, 'danger');
					forceLogout(response.responseJSON) //if token is expired
				}
			});
		}
	</script>
</body>
</html>