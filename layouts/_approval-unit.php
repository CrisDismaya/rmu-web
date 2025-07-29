
<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>
	<title> Approval | RMU </title>
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
								<h4 class="mb-sm-0" id="header-breadcram">Request Approval of Units</h4>
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
										<button id="request" type="button" class="btn btn-soft-primary btn-sm" onclick="Request_reprice()">
											Create Request 
										</button>
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
												<th style="text-align: left !important;">Current Price </th>
												<th> Request Selling Price </th>
												<th> Status </th>
												<th> Current Holder </th>
												<th> Remarks </th>
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
		<div class="modal-dialog modal-xl" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="myExtraLargeModalLabel"> Repo Details </h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="closeModal()"></button>
				</div>
				<div class="modal-body container">
					
						<div class="row" id="list">
								<table id="list-table" class="table table-bordered nowrap align-middle mdl-data-table" style="width:100%">
										<thead>
											<tr>
												<th>Branch</th>
												<th> Brand </th>
												<th> Model </th>
												<th> Color </th>
												<th> Engine </th>
												<th> Chassis </th>
												<th style="text-align: left !important;">Current Price </th>
												
												<th> Action </th>
											</tr>
										</thead>
									</table>
						</div>
						<div class="row" id="details">
							<div class="col-lg-6 col-md-6 col-sm-6 col-12 seperator">
									<div class="col-12">
									
										<label for="customer-name" class="col-form-label"> Branch</label>
										<input type="hidden"  id="received_id">
										<input type="hidden"  id="branch_id">
										<input type="text" class="form-control" id="branch_name" placeholder="Branch" autocomplete="off" disabled>
									</div>
									<div class="col-12">
										<label for="customer-name" class="col-form-label">Brand</label>
										<input type="text" class="form-control" id="brand" placeholder="Brand" autocomplete="off" disabled>
									</div>
									<div class="col-12">
										<div class="row">
											<div class="col-6">
												<label for="customer-name" class="col-form-label">Model</label>
												<input type="hidden"  id="repo_id">
												<input type="text" class="form-control" id="model" placeholder="Model" autocomplete="off" disabled>
											</div>
											<div class="col-6">
												<label for="customer-name" class="col-form-label">Color</label>
											
												<input type="text" class="form-control" id="color" placeholder="Model" autocomplete="off" disabled>
											</div>
										</div>
										
									</div>
									
									<div class="col-12">
										<label for="customer-name" class="col-form-label">Date Sold</label>
										<input type="text" class="form-control" id="date-sold" placeholder="Date Sold" autocomplete="off" disabled>
									</div>
									<div class="col-12">
										<div class="row">
											<div class="col-lg-6 col-md-6 col-sm-6 col-12">
												<label for="customer-name" class="col-form-label">Engine</label>
												<input type="text" class="form-control" id="engine" placeholder="Engine #" autocomplete="off" disabled>
											</div>
											<div class="col-lg-6 col-md-6 col-sm-6 col-12">
												<label for="customer-name" class="col-form-label">Chassis #</label>
												<input type="text" class="form-control" id="chassis" placeholder="Chassis #" autocomplete="off" disabled>
											</div>
										</div>
									</div>
									<div class="col-12">
										<label for="customer-name" class="col-form-label">Current Price</label>
										<input type="text" class="form-control" id="srp" placeholder="Current Price" autocomplete="off" disabled>
									</div>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="col-12">
									<label for="customer-name" class="col-form-label">Unit Aging / Days</label>
									<input type="number" class="form-control" id="days"  autocomplete="off" disabled>
								</div>
								<div class="col-12">
									<label for="customer-name" class="col-form-label">Depreciation Cost</label>
									<input type="number" class="form-control" id="dc"  autocomplete="off" disabled>
								</div>
								<div class="col-12">
									<label for="customer-name" class="col-form-label">Missing and Damaged Parts Cost</label>
									<input type="number" class="form-control" id="emdp"  autocomplete="off" disabled>
								</div>
								<div class="col-12">
									<label for="customer-name" class="col-form-label">Total Depreciation</label>
									<input type="number" class="form-control" id="mdp"  autocomplete="off" disabled>
								</div>
								<div class="col-12">
									<label for="customer-name" class="col-form-label">Standard Matrix Value (SMV)</label>
									<input type="number" class="form-control" id="suggested_price"  autocomplete="off" disabled>
								</div>
								<div class="col-12">
									<label for="customer-name" class="col-form-label">New Price</label>&nbsp;<i style="color:blue;height:50px;cursor:pointer" title="update price" class="ri-edit-box-line" id="update_price" onclick="update_price()"></i>
									<input type="number" class="form-control" id="approved_price"  autocomplete="off">
								</div>
							</div>

							<div class="col-12 note">
								<center><i class="fa-solid fa-triangle-exclamation"></i><span>Note: New Unit Price is subject for approval. !</span></center>
							</div>
							<div class="col-12 remarks">
								<label for="customer-name" class="col-form-label">Remarks</label>
								<textarea class="form-control" id="remarks" rows="3"></textarea>
							</div>
							<!-- end card body -->

							<div class="modal-footer btn-save-footer note1">
								<!-- <a href="javascript:void(0);" class="btn btn-link link-success fw-medium" data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i> Close</a> -->
								<button id="save-details" data-id="0" type="button" class="btn btn-primary" data-receive-unit-id="0">Submit</button>
								<button id="back-search"  type="button" class="btn btn-primary">Back</button>
							</div>

							<div class="modal-footer btn-save-footer remarks1">
								
								<button id="btn-approve" data-id="0" type="button" class="btn btn-primary" data-receive-unit-id="0" onclick="decision(1)">Approve</button>
								<button id="btn-disapprove" data-id="0" type="button" class="btn btn-danger" data-receive-unit-id="0" onclick="decision(2)">Disapprove</button>
								<!-- <a href="javascript:void(0);" class="btn btn-link link-success fw-medium" data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i> Close</a> -->
							</div>
						</div>

				</div>
				
			</div>
		</div>
	</div>

	<div class="modal fade" id="history" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-xl" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="myExtraLargeModalLabel"> Approval Log Details </h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="closeModal()"></button>
				</div>
				<div class="modal-body container">
					
					<div class="card pa-2">
				
					<table id="history-table" class="table table-bordered nowrap align-middle mdl-data-table" style="width:100%">
							<thead>
								<tr>
									<th> Approver </th>
									<th>Remarks</th>
									<th> Date </th>
								</tr>
							</thead>
						</table>
					
					</div>
				</div>
				
			</div>
		</div>
	</div>
		<!--start loader-->
		<div class="loading-overlay" id="loading-overlay">
			<div class="overlay"></div>
			<div class="spanner">
			<div class="loader"></div>
			<p>Please wait. . . .</p>
			</div>
		</div> 
		<!--end loader-->
	<input type="hidden" id="mod" />
	<?php include_once './_partials/__footer-template.php'; ?>
	
	<script>
		
		var data_id = null
		var edit_price = false
		// note: current_module_id and current_roles is global variable to see in assets > js > js-custom.js

		function Request_reprice(){
			getListOfUnits()
		}

		function closeModal(){
			$('#details').hide()
			$('#list').show()
		}

		$(document).ready(function(){
			$('#details').hide()
			$('#update_price').hide()
			display_table(current_module_id)
			
			$('#save-details').click(function(event){
				event.preventDefault();

				var id = $(this).data('receive-unit-id')
				var url = (id == 0 ? `${baseUrl}/requestRepoPrice` : `${baseUrl}/updaterequestRepoPrice/${ id }`)
				
				const data = {
					received_unit_id :				$('#received_id').val(),
					branch: 						$('#branch_id').val(),
					repo_id: 						$('#repo_id').val(),
					unit_age_days:  				$('#days').val(),
					depreciation_cost:				$('#dc').val(),
					estimated_missing_dmg_parts: 	$('#emdp').val(),
					total_missing_dmg_parts: 		$('#mdp').val(),
					suggested_price:				$('#suggested_price').val(),
					approved_price:					$('#approved_price').val(),
					module_id:						current_module_id
				}

				showLoader()

				$.ajax({
					url: url, 
					type: 'POST', 
					headers:{
						'Authorization':`Bearer ${ auth.token }`,
					},
					data : data,
					dataType: 'json',
					success: function (data) { 
						// console.log(data)
						if(!data.success){
							hideLoader()
							toast(data.message, 'danger');
						}
						else{
							hideLoader()
							let msg = id == 0 ? 'New Unit Price Succesfully submit!' : 'New Unit Price Succesfully updated!'
							toast(msg, 'success');
							$('#staticBackdrop').modal('hide')
							display_table(current_module_id)
						}
					},
					error: function(response) {
						hideLoader()
						toast(response.responseJSON.message, 'danger');
						forceLogout(response.responseJSON) //if token is expired
					}
				});

			});

			$('#back-search').click(function(){
				$('#details').hide()
				$('#list').show()
				
			})
		})

		function decision(status){
			    if($('#remarks').val() == ''){
					toast('Remarks is required', 'danger');
					return false
				}

				const data = {
					data_id:data_id,
					remarks:$('#remarks').val(),
					status:status,
					approved_price:$('#approved_price').val(),
					old_price:$('#srp').val(),
					edit_price:edit_price,
					module_id:current_module_id
				}

				showLoader()

				$.ajax({
					url: `${baseUrl}/submitDecision`, 
					type: 'POST', 
					headers:{
						'Authorization':`Bearer ${ auth.token }`,
					},
					data : data,
					dataType: 'json',
					success: function (data) { 
						// console.log(data)
						if(!data.success){
							hideLoader()
							toast(data.message, 'danger');
						}
						else{
							hideLoader()
							let msg = status == 1 ? 'New Unit Price Succesfully approved!' : 'New Unit Price disapproved!'
							toast(msg, 'success');
							$('#staticBackdrop').modal('hide')
							display_table(current_module_id)
							getAllForApproval()
							data_id = null
						}
					},
					error: function(response) {
						hideLoader()
						toast(response.responseJSON.message, 'danger');
						forceLogout(response.responseJSON) //if token is expired
					}
				});
		}

		function getListOfUnits(){

			if ($.fn.DataTable.isDataTable("#list-table")) {
				$('#list-table').DataTable().clear().destroy();
			}

			$("#list-table").DataTable({
				processing: true,
				serverSide: true,
				ajax: {
					url: `${baseUrl}/listReceivedUnit`,
					type: 'GET',
					dataType: 'json',
					headers:{
						'Authorization':`Bearer ${ auth.token }`,
					}
				},
		  		scrollX: true,
				scrollCollapse: true,
				columns: [
					{ data: "branchname" },
					{ data: "brandname" },
					{ data: "model_name" },
					{ data: "color" },
					{ data: "model_engine" },
					{ data: "model_chassis" },
					{ data: "current_price", render: $.fn.dataTable.render.number( '\, ', '.', 2, '', '' ), className: "text-end" },
					{ data: null, defaultContent: '',
						fnCreatedCell: function(nTd, sData, oData, iRow, iCol){
						//	
							html = `
							<button class="btn btn-sm btn-soft-warning" 
									onclick="edit(${ oData.id }, '${ oData.branch }', '${ oData.branchname }', 
										'${ oData.brandname }', '${ oData.repo_id }', '${ oData.model_name }',
										 '${ oData.model_chassis }', '${ oData.model_engine }','${ oData.date_sold }',
										  '${ current_roles }','new','${ oData.color }','${ oData.current_price }')">  
									<i class="ri-edit-box-line"></i> Appraise
								</button> 
							`;
							
							$(nTd).html(html);
						}
					},
				]
			});


			$('#staticBackdrop').modal('show');
		}

		async function display_table(current_module_id){		
			var moduleid = current_module_id;

			if(current_roles == 'Approver'){
				$('#request').hide()
			}

			if ($.fn.DataTable.isDataTable("#received-unit-table")) {
				$('#received-unit-table').DataTable().clear().destroy();
			}

			$("#received-unit-table").DataTable({
				processing: true,
				serverSide: true,
				ajax: {
					url: `${baseUrl}/allReceivedUnit/${ moduleid }`,
					type: 'GET',
					dataType: 'json',
					headers:{
						'Authorization':`Bearer ${ auth.token }`,
					}
				},
		  		scrollX: true,
				scrollCollapse: true,
				columns: [
					
					{ data: "branchname" },
					{ data: "brandname" },
					{ data: "model_name" },
					{ data: "color" },
					{ data: "model_engine" },
					{ data: "model_chassis" },
					{ data: "current_price", render: $.fn.dataTable.render.number( '\, ', '.', 2, '', '' ), className: "text-end" },
					{ data: "approved_price", render: $.fn.dataTable.render.number( '\, ', '.', 2, '', '' ), className: "text-end" },
					{ data: "status" },
					{ data: "current_holder" },
					{ data: "remarks" },
					{ data: null, defaultContent: '',
						fnCreatedCell: function(nTd, sData, oData, iRow, iCol){
						//	

						html = 'No action available';
							if(oData.status == 'PENDING' && current_roles == 'Maker' && oData.approved_price == null){
								html = `
									<button class="btn btn-sm btn-soft-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
									onclick="edit(${ oData.id }, '${ oData.branch }', '${ oData.branchname }', 
										'${ oData.brandname }', '${ oData.repo_id }', '${ oData.model_name }',
										 '${ oData.model_chassis }', '${ oData.model_engine }','${ oData.date_sold }',
										  '${ current_roles }','update','${ oData.color }','${ oData.current_price }')"> 
										<i class="ri-edit-box-line"></i> Review Unit
									</button> 
								`;
							}

							if(oData.status == 'DISAPPROVED' && current_roles == 'Maker' && oData.approved_price != null){
								html = `
									<button class="btn btn-sm btn-soft-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
									onclick="edit(${ oData.id }, '${ oData.branch }', '${ oData.branchname }', 
										'${ oData.brandname }', '${ oData.repo_id }', '${ oData.model_name }',
										 '${ oData.model_chassis }', '${ oData.model_engine }','${ oData.date_sold }',
										  '${ current_roles }','update','${ oData.color }','${ oData.current_price }')"> 
										<i class="ri-edit-box-line"></i> Review Unit
									</button> 
								`;
							}

							if(oData.status == 'PENDING' && current_roles == 'Maker' && oData.approved_price != null){
								html = 'Waiting for approval';
							}

							if(oData.status == 'PENDING' && current_roles == 'Approver'){
								$('#update_price').show()
								
								html = `
									<button class="btn btn-sm btn-soft-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
									onclick="viewForApproval(${ oData.id }, '${ oData.branch }', '${ oData.branchname }', 
										'${ oData.brandname }', '${ oData.repo_id }', '${ oData.model_name }',
										 '${ oData.model_chassis }', '${ oData.model_engine }','${ oData.date_sold }',
										  '${ oData.approved_price }', '${ current_roles }','update','${ oData.color }','${ oData.current_price }')"> 
										<i class="ri-check-circle"></i> Approve
									</button> 
								`;
							}
							
							$(nTd).html(html);
						}
					},
				]
			});
		}

		function update_price(){
			edit_price = true
			$('#approved_price').prop('disabled',false)
		}
		
		function edit(id,branchid,branchname,brand,repo_id,modelname,chassis,engine,date_sold,role,categ,color,srp){
			
			if(categ == 'new'){
				$('#back-search').show()
			}else{
				$('#back-search').hide()
			}

			$('#list').hide()
			$('#details').show()

			if(role == 'Maker'){
				
				$('.remarks').css('display','none')
				$('.remarks1').css('display','none')
			}else{
				$('.note').css('display','none')
				$('.note1').css('display','none')
			}
			
			$.ajax({
				url: `${baseUrl}/repoSuggestedPrice/${id}/${date_sold}`, 
				type: 'GET', 
				headers:{
					'Authorization':`Bearer ${ auth.token }`,
				},
				success: function (data) {
					// console.log(data)
					//let obJ = JSON.Parse(data)

					$('#received_id').val(id)
					$('#branch_id').val(branchid)
					$('#branch_name').val(branchname)
					$('#brand').val(brand)
					$('#repo_id').val(repo_id)
					$('#model').val(modelname)
					$('#date-sold').val(date_sold)
					$('#engine').val(engine)
					$('#chassis').val(chassis)
					$('#srp').val(srp)
					$('#color').val(color)
					$('#days').val(data.days)
					$('#dc').val(data.depreciation)
					$('#emdp').val(data.emdp)
					$('#mdp').val(data.t_mdp)
					$('#suggested_price').val(data.sp)
				}
			});
		}

		function viewForApproval(id,branchid,branchname,brand,repo_id,modelname,chassis,engine,date_sold,approveprice,role,categ,color,srp){

			$('#list').hide()
			$('#details').show()

			if(role == 'Approver'){
				$('.note').css('display','none')
				$('.note1').css('display','none')
			}else{
				$('.remarks').css('display','none')
				$('.remarks1').css('display','none')
			}

			$.ajax({
				url: `${baseUrl}/repoSuggestedPrice/${id}/${date_sold}`, 
				type: 'GET', 
				headers:{
					'Authorization':`Bearer ${ auth.token }`,
				},
				success: function (data) {
					//let obJ = JSON.Parse(data)
					$('#received_id').val(id)
					$('#branch_id').val(branchid)
					$('#branch_name').val(branchname)
					$('#brand').val(brand)
					$('#repo_id').val(repo_id)
					$('#model').val(modelname)
					$('#date-sold').val(date_sold)
					$('#engine').val(engine)
					$('#chassis').val(chassis)
					$('#srp').val(srp)
					$('#color').val(color)
					$('#days').val(data.days)
					$('#dc').val(data.depreciation)
					$('#emdp').val(data.emdp)
					$('#mdp').val(data.t_mdp)
					$('#suggested_price').val(data.sp)
					$('#approved_price').val(approveprice).attr('disabled',true)
					data_id = id
				},
				error: function(response) {
					toast(response.responseJSON.message, 'danger');
					forceLogout(response.responseJSON) //if token is expired
				}
			});
		}

		async function history(recid){
			const tableData = await $.ajax({
				url: `${baseUrl}/appraisalActivityLog/${recid}`,
				method: 'GET',
				dataType: 'json',
				headers:{
					'Authorization':`Bearer ${ auth.token }`,
				}
			});

		
			$("#history-table").DataTable().destroy();
			$("#history-table").DataTable({
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
					
					{ data: "approver" },
					{ data: "remarks" },
					{ data: "date_disapproved" },
					
				]
			});
		}
	</script>
</body>
</html>