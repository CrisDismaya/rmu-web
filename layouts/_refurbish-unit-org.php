<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>
	<title> Refurbish | RMU </title>
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
								<h4 class="mb-sm-0" id="header-breadcram">Request Refurbish of Units</h4>
							</div>
						</div>
					</div>

					<div class="row">
						<!-- table -->
						<div class="col-lg-12">
							<div class="card">
								<div class="card-header align-items-center d-flex">
									<h4 class="card-title mb-0 flex-grow-1">List of Request</h4>
									<div class="flex-shrink-0">
										<button id="request" type="button" class="btn btn-soft-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="Request_reprice()">
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
					<div class="card pa-2">
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
										<th> Action </th>
									</tr>
								</thead>
							</table>
						</div>
						<div class="row" id="details">
							<div class="col-lg-6 col-md-6 col-sm-6 col-12 seperator">
								<div class="col-12">

									<label for="customer-name" class="col-form-label"> Branch</label>
									<input type="hidden" id="received_id">
									<input type="hidden" id="branch_id">
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
											<input type="hidden" id="repo_id">
											<input type="text" class="form-control" id="model" placeholder="Model" autocomplete="off" disabled>
										</div>
										<div class="col-6">
											<label for="customer-name" class="col-form-label">Color</label>

											<input type="text" class="form-control" id="color" placeholder="Model" autocomplete="off" disabled>
										</div>
									</div>

								</div>

								<div class="col-12">
									<label for="customer-name" class="col-form-label">Engine</label>
									<input type="text" class="form-control" id="engine" placeholder="Engine #" autocomplete="off" disabled>
								</div>
								<div class="col-12">
									<label for="customer-name" class="col-form-label">Chassis #</label>
									<input type="text" class="form-control" id="chassis" placeholder="Chassis #" autocomplete="off" disabled>
								</div>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-6 col-12">
								<h5>Missing and Damages Parts</h5>
								<div id="part-list" style="height:250px; overflow-y:auto;"></div>
								<h5>Upload Qoutation</h5>
								<div style="height:100px; overflow-y:scroll;" id="upload">
									<table>
										<tr>
											<input type="file" id="q1" onchange="uploadQoute(this.id,1)" />
										</tr>
										<tr>
											<input type="file" id="q2" onchange="uploadQoute(this.id,2)" />
										</tr>
										<tr>
											<input type="file" id="q3" onchange="uploadQoute(this.id,3)" />
										</tr>
									</table>

								</div>
								<div style="height:100px; overflow-y:scroll;" id="qoute-list">
									<table id="uploaded-qoutation">
									</table>
								</div>
							</div>
							<div class="col-12 note">
								<center><i class="fa-solid fa-triangle-exclamation"></i>
									<span>Note: This request is subject for approval. !</span>
								</center>
							</div>
							<div class="col-12 remarks">
								<label for="customer-name" class="col-form-label">Remarks</label>
								<textarea class="form-control" id="remarks" rows="3"></textarea>
							</div>
							<!-- end card body -->

							<div class="modal-footer btn-save-footer note1">
								<!-- <a href="javascript:void(0);" class="btn btn-link link-success fw-medium" data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i> Close</a> -->
								<button id="save-details" type="button" class="btn btn-primary">Submit</button>
								<button id="back-search" type="button" class="btn btn-primary">Back</button>
							</div>

							<div class="modal-footer btn-save-footer remarks1">

								<button id="btn-approve" type="button" class="btn btn-primary" onclick="decision(1)">Approve</button>
								<button id="btn-disapprove" type="button" class="btn btn-danger" onclick="decision(2)">Disapprove</button>
								<!-- <a href="javascript:void(0);" class="btn btn-link link-success fw-medium" data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i> Close</a> -->
							</div>
						</div>

					</div>
				</div>

			</div>
		</div>
	</div>
	<input type="hidden" id="mod" />

	<!--start loader-->
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
		var data_id = null
		var edit_price = false
		var qoute1 = null
		var qoute2 = null
		var qoute3 = null
		var spares = []
		var qoute_data = []

		function Request_reprice() {
			getListOfUnits()
		}

		function uploadQoute(id, hiearchy) {
			const file = $('#q' + hiearchy)[0].files[0];
			let reader = new FileReader();
			reader.onload = function(event) {
				if (hiearchy == 1) {
					qoute1 = event.target.result;
				} else if (hiearchy == 2) {
					qoute2 = event.target.result;
				} else {
					qoute3 = event.target.result;
				}

			}
			reader.readAsDataURL(file);
		}

		function closeModal() {
			spares = []
			$('#details').hide()
			$('#list').show()
			$('#qoute-list').hide()
			$('#upload').show()
		}

		$(document).ready(function() {
			$('#details').hide()
			$('#qoute-list').hide()
			getModuleId()

			$('#save-details').click(function(event) {
				event.preventDefault();


				var url = (data_id == null ? `${baseUrl}/requestRefurbish` : `${baseUrl}/updateRefurbish/${ data_id }`)


				var formData = new FormData();

				formData.append("q1", $('#q1')[0].files[0]);
				formData.append("q2", $('#q2')[0].files[0]);
				formData.append("q3", $('#q3')[0].files[0]);
				formData.append("repo_id", $('#repo_id').val());
				formData.append("module_id", $('#mod').val());

				let parts = []

				for (let i = 0; i < spares.length; i++) {
					parts.push({
						received_parts_id: $('#received-id-' + spares[i].parts).val(),
						parts_id: spares[i].parts,
						price: $('#parts-' + spares[i].parts).val()
					})
				}
				formData.append("spares", JSON.stringify(parts));

				console.log(parts)

				// showLoader()
				// $.ajax({
				// 	url: url, 
				// 	type: 'POST', 
				// 	headers:{
				// 		'Authorization':`Bearer ${ auth.token }`,
				// 	},
				// 	data : formData,
				// 	processData: false,
				// 	contentType: false,
				// 	enctype: 'multipart/form-data',
				// 	success: function (data) { 
				// 		console.log(data)
				// 		if(!data.success){
				// 			hideLoader()
				// 			toast(data.message, 'danger');
				// 		}
				// 		else{
				// 			hideLoader()
				// 			let msg = data_id == 0 ? 'New Refurbish Request Succesfully submit!' : 'Refurbish Request Succesfully updated!'
				// 			toast(msg, 'success');
				// 			$('#staticBackdrop').modal('hide')
				// 			display_table($('#mod').val())
				// 			 qoute1 = null
				// 			 qoute2 = null
				// 			 qoute3 = null
				// 			 data_id = null
				// 		}
				// 	},
				// 	error: function(response) {
				// 		hideLoader()
				// 		toast(response.responseJSON.message, 'danger');
				// 		forceLogout(response.responseJSON) //if token is expired
				// 	}
				// });

			});

			$('#back-search').click(function() {
				$('#details').hide()
				$('#list').show()

			})
		})

		function decision(status) {
			if ($('#remarks').val() == '') {
				toast('Remarks is required', 'danger');
				return false
			}

			let parts = []

			for (let i = 0; i < spares.length; i++) {
				parts.push({
					parts_id: spares[i].parts,
					price: $('#parts-' + spares[i].parts).val()
				})
			}

			const data = {
				data_id: data_id,
				remarks: $('#remarks').val(),
				status: status,
				module_id: $('#mod').val(),
				spares: JSON.stringify(parts)
			}

			showLoader()

			$.ajax({
				url: `${baseUrl}/refurbishDecision`,
				type: 'POST',
				headers: {
					'Authorization': `Bearer ${ auth.token }`,
				},
				data: data,
				dataType: 'json',
				success: function(data) {
					console.log(data)
					if (!data.success) {
						hideLoader()
						toast(data.message, 'danger');
					} else {
						hideLoader()
						let msg = status == 1 ? 'Request Refurbish Succesfully approved!' : 'Request Refurbish disapproved!'
						toast(msg, 'success');

						qoute_data = []
						$('#staticBackdrop').modal('hide')
						display_table($('#mod').val())
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

		async function getListOfUnits() {

			let data = null
			const tableData = await $.ajax({
				url: `${baseUrl}/listOfForRefurbish`,
				method: 'GET',
				dataType: 'json',
				headers: {
					'Authorization': `Bearer ${ auth.token }`,
				}
			});
			data = tableData.data

			$("#list-table").DataTable().destroy();
			$("#list-table").DataTable({
				deferRender: true,
				searching: true,
				scrollY: 400,
				scrollX: true,
				scrollCollapse: true,
				paging: false,
				data: data,
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
						data: "color"
					},
					{
						data: "model_engine"
					},
					{
						data: "model_chassis"
					},
					{
						data: null,
						defaultContent: '',
						fnCreatedCell: function(nTd, sData, oData, iRow, iCol) {
							//	
							html = `
							<button class="btn btn-sm btn-soft-warning" 
									onclick="edit(${ oData.repoid },'${ oData.receive_id }', '${ oData.branch }', '${ oData.branchname }', 
										'${ oData.brandname }', '${ oData.repo_id }', '${ oData.model_name }',
										 '${ oData.model_chassis }', '${ oData.model_engine }',
										  '${ tableData.role }','new','${ oData.color }')">  
									<i class="ri-edit-box-line"></i> Refurbish
								</button> 
							`;


							$(nTd).html(html);
						}
					},
				]
			});
		}

		async function display_table(modid) {
			let data = null
			const tableData = await $.ajax({
				url: `${baseUrl}/getListForApprovalRefurbish/${modid}`,
				method: 'GET',
				dataType: 'json',
				headers: {
					'Authorization': `Bearer ${ auth.token }`,
				}
			});

			data = tableData.data

			if (tableData.role == 'Approver') {
				$('#request').hide()
			}
			$("#received-unit-table").DataTable().destroy();
			$("#received-unit-table").DataTable({
				deferRender: true,
				searching: true,
				scrollY: 400,
				scrollX: true,
				scrollCollapse: true,
				paging: false,
				data: data,
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
						data: "color"
					},
					{
						data: "model_engine"
					},
					{
						data: "model_chassis"
					},
					{
						data: "status"
					},
					{
						data: "current_holder"
					},
					{
						data: "remarks"
					},
					{
						data: null,
						defaultContent: '',
						fnCreatedCell: function(nTd, sData, oData, iRow, iCol) {
							//	

							html = 'No action available';
							if (oData.status == 'WAITING FOR APPROVAL' && tableData.role == 'Maker') {
								html = `
									No Action Available
								`;
							}

							if (oData.status == 'DISAPPROVED' && tableData.role == 'Maker') {
								html = `
									<button class="btn btn-sm btn-soft-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
									onclick="edit(${ oData.repo_id },'${ oData.refurbish_id }', '${ oData.branch }', '${ oData.branchname }', 
										'${ oData.brandname }', '${ oData.repo_id }', '${ oData.model_name }',
										 '${ oData.model_chassis }', '${ oData.model_engine }',
										  '${ tableData.role }','update','${ oData.color }')"> 
										<i class="ri-edit-box-line"></i> Review Request
									</button> 
								`;
							}

							if (oData.status == 'WAITING FOR APPROVAL' && tableData.role == 'Maker') {
								console.log(oData.approved_price)
								html = 'Waiting for approval';
							}

							if (oData.status == 'WAITING FOR APPROVAL' && tableData.role == 'Approver') {

								qoute_data.push({
									"qoute_id": oData.refurbish_id,
									"qoute_data": oData.qoute

								})
								html = `
									<button class="btn btn-sm btn-soft-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
									onclick="viewForApproval(${ oData.repo_id },'${ oData.refurbish_id }', '${ oData.branch }', '${ oData.branchname }', 
										'${ oData.brandname }', '${ oData.repo_id }', '${ oData.model_name }',
										 '${ oData.model_chassis }', '${ oData.model_engine }',
										  '${ tableData.role }','new','${ oData.color }')"> 
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

		function edit(repo_id, receive_id, branchid, branchname, brand, repo_id, modelname, chassis, engine, role, categ, color) {

			if (categ == 'new') {
				data_id = null
				$('#back-search').show()
			} else {
				$('#back-search').hide()
				data_id = receive_id
			}

			$('#list').hide()
			$('#details').show()

			$('#qoute-list').hide()
			$('#upload').show()

			if (role == 'Maker') {

				$('.remarks').css('display', 'none')
				$('.remarks1').css('display', 'none')
			} else {
				$('.note').css('display', 'none')
				$('.note1').css('display', 'none')
			}




			//let obJ = JSON.Parse(data)
			$('#received_id').val(receive_id)
			$('#branch_id').val(branchid)
			$('#branch_name').val(branchname)
			$('#brand').val(brand)
			$('#repo_id').val(repo_id)
			$('#model').val(modelname)

			$('#engine').val(engine)
			$('#chassis').val(chassis)
			$('#color').val(color)


			//get list of missing and damages parts
			$.ajax({
				url: `${baseUrl}/getMissingDamageParts/${receive_id}`,
				type: 'GET',
				headers: {
					'Authorization': `Bearer ${ auth.token }`,
				},
				success: function(data) {
					let tbl = `<table border="1" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Parts</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                `
					for (let i = 0; i < data.length; i++) {
						spares.push({
							parts: data[i].id
						})
						tbl += `<tr>
                                    <td>
                                    <input type="hidden" class="form-control" id="received-id-${data[i].id}" value="${data[i].received_ids}" autocomplete="off" disabled>
                                    <input type="text" class="form-control" id="${data[i].id}" value="${data[i].name}" autocomplete="off" disabled>
                                    </td>
                                    <td>
                                    <input type="number" class="form-control" id="parts-${data[i].id}" value="${data[i].price}"  autocomplete="off">
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

		function getModuleId() {
			let page_url = window.location.href
			let pagename = page_url.split('/').pop()

			$.ajax({
				url: `${baseUrl}/getCurrentModule/${pagename}`,
				type: 'GET',
				headers: {
					'Authorization': `Bearer ${ auth.token }`,
				},
				success: function(data) {
					display_table(data)
					$('#mod').val(data)
				},
				error: function(response) {
					toast(response.responseJSON.message, 'danger');
					forceLogout(response.responseJSON) //if token is expired
				}
			});
		}

		function viewForApproval(repo_id, refurbish_id, branchid, branchname, brand, repo_id, modelname, chassis, engine, role, categ, color) {

			$('#list').hide()
			$('#details').show()

			$('#upload').hide()
			$('#qoute-list').show()


			if (role == 'Approver') {
				$('.note').css('display', 'none')
				$('.note1').css('display', 'none')
			} else {
				$('.remarks').css('display', 'none')
				$('.remarks1').css('display', 'none')
			}

			let qoute = qoute_data.filter(d => {
				return d.qoute_id == refurbish_id
			})[0]

			let qoutations = JSON.parse(qoute.qoute_data)
			let row = ''

			let link = baseUrl.replace('/api', '')
			for (let i = 0; i < qoutations.length; i++) {
				row += `<tr>
							<td>
								<a href="#" onclick="downloadURI('${link}/${qoutations[i].path}','${qoutations[i].filename}')"><span title="Download Qoutation">${qoutations[i].filename}</span></a>
							</td>
						</tr>`
			}

			$('#uploaded-qoutation').html(row)


			data_id = refurbish_id
			$('#branch_id').val(branchid)
			$('#branch_name').val(branchname)
			$('#brand').val(brand)
			$('#repo_id').val(repo_id)
			$('#model').val(modelname)

			$('#engine').val(engine)
			$('#chassis').val(chassis)
			$('#color').val(color)

			$.ajax({
				url: `${baseUrl}/getRefurbishParts/${refurbish_id}`,
				type: 'GET',
				headers: {
					'Authorization': `Bearer ${ auth.token }`,
				},
				success: function(data) {
					let tbl = `<table border="1" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Parts</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                `
					for (let i = 0; i < data.length; i++) {
						spares.push({
							parts: data[i].id
						})
						tbl += `<tr>
                                    <td>
													<input type="text" class="form-control" id="${data[i].id}" value="${data[i].name}" autocomplete="off" disabled>
                                    </td>
                                    <td>
                                   		<input type="number" class="form-control" id="parts-${data[i].id}" value="${data[i].price}"  autocomplete="off">
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

		function downloadURI(uri, name) {
			// var link = document.createElement("a");
			// link.download = name;
			// link.href = uri;
			// document.body.appendChild(link);
			// link.click();
			// document.body.removeChild(link);
			// delete link;
			const linkSource = uri;
			const downloadLink = document.createElement("a");
			window.open(linkSource, "_blank").focus();
			//downloadLink.href = linkSource;
			downloadLink.download = name;
			downloadLink.click();
		}
	</script>
</body>

</html>