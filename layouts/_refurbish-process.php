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
								<h4 class="mb-sm-0" id="header-breadcram">Refurbish Process of Units</h4>
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
										<!-- <button id="request" type="button" class="btn btn-soft-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="Request_reprice()">
											Create Request 
										</button> -->
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
												<th> Process Status </th>
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
					<h5 class="modal-title" id="myExtraLargeModalLabel"> Refurbish Tagging </h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="closeModal()"></button>
				</div>
				<div class="modal-body container">
					<div class="card pa-2">
						<div class="row" id="details">
							<div class="col-lg-5 col-md-6 col-sm-6 col-12 seperator">
								<div class="col-12">

									<label for="customer-name" class="col-form-label"> Branch</label>
									<input type="hidden" id="refurbish_id">
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
									<div class="row">
										<div class="col-6">
											<label for="customer-name" class="col-form-label">Engine</label>
											<input type="text" class="form-control" id="engine" placeholder="Engine #" autocomplete="off" disabled>
										</div>
										<div class="col-6">
											<label for="customer-name" class="col-form-label">Chassis #</label>
											<input type="text" class="form-control" id="chassis" placeholder="Chassis #" autocomplete="off" disabled>
										</div>
									</div>
								</div>
								<div class="col-12">
									<label for="customer-name" class="col-form-label">Classification</label>
									<select id="unit-classification" class="select-single-modal" disabled>
										<option value="">Select Classification</option>
										<option value="A">A</option>
										<option value="B">B</option>
										<option value="C">C</option>
										<option value="D">D</option>
										<option value="E">E</option>
									</select>
								</div>
							</div>

							<div class="col-lg-7 col-md-6 col-sm-6 col-12">
								<h5>Missing and Damages Parts</h5>
								<div id="part-list" style="height:250px; overflow-y:auto;"></div>
								<h5>Unit picture and Other Related Documents</h5>
								<i class="ri-file-add-line upload-class" title="Upload Documents" onclick="addNewDocument()"></i>
								<div style="height:100px; overflow-y:scroll;" id="upload">
									<table id="uploaded-qoutation">
									</table>
									<table id="table-docs"></table>
								</div>
								<!-- <div style="height:100px; overflow-y:scroll;" id="qoute-list">
                                    <table id="uploaded-qoutation">
									</table>
								</div> -->
							</div>
							<span style="color:red" id="maker-remarks"></span>
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
							<input type="hidden" id="record_id" />
							<div class="modal-footer btn-save-footer ">
								<!-- <a href="javascript:void(0);" class="btn btn-link link-success fw-medium" data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i> Close</a> -->
								<button type="button" id="save-refurbish-process" data-id="0" type="button" class="btn btn-primary btnmaker" data-receive-unit-id="0">Submit</button>
								<button data-id="0" type="button" class="btn btn-primary btnapprover" data-receive-unit-id="0" onclick="decision('1')">Approve</button>
								<button data-id="0" type="button" class="btn btn-primary btnapprover" data-receive-unit-id="0" onclick="decision('2')">Disapprove</button>
								<button type="button" class="btn btn-primary" data-bs-dismiss="modal" aria-label="Close" onclick="closeModal()">Back</button>
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
		var spares = []
		var qoute_data = []
		var arr = []
		var user_action = null
		// note: current_module_id and current_roles is global variable to see in assets > js > js-custom.js

		function Request_reprice() {
			getListOfUnits()
		}

		function addNewDocument() {
			let docs = ''

			arr.push({
				id: '',
				value: ''
			})

			for (let i = 0; i < arr.length; i++) {
				arr[i].id = i + 1

				if (i + 1 === arr.length) {
					docs = `<tr id="docs-uploaded">
							<td><input type="file" id="doc-${arr[i].id}" onchange="uploadQoute(this.id,${arr[i].id})"/></td>
							<td><i class="ri-delete-back-2-line" style="color:red;cursor:pointer;" onclick="removeDocs(${arr[i].id})" title="Remove"/></td>
						</tr>
						`
				}

			}

			$('#table-docs').append(docs)
		}

		function removeDocs(index) {


			let tmp = arr.filter(d => {
				return d.id != index
			})

			arr = tmp
			$("#table-docs").on("click", "#docs-uploaded", function() {
				$(this).closest("tr").remove();
			});
		}

		function uploadQoute(id, index) {

			const file = $('#doc-' + index)[0].files[0];
			let reader = new FileReader();
			reader.onload = function(event) {
				arr[index - 1].value = event.target.result;

			}
			reader.readAsDataURL(file);
		}

		function closeModal() {
			spares = []
			// $('#details').hide()
			// $('#list').show()
			$('#qoute-list').hide()
			$('#upload').show()
		}

		$(document).ready(function() {
			// $('#details').hide()
			$('#qoute-list').hide()
			display_table(current_module_id)

			$('#save-refurbish-process').click(function(event) {

				event.preventDefault();

				var id = $('#record_id').val()
				var url = (user_action === 'create' ? `${baseUrl}/proceedRefurbish` : `${baseUrl}/updateRefurbishProcess/${ id }`)

				var formData = new FormData();

				for (let i = 0; i < arr.length; i++) {
					formData.append("related_documents_" + arr[i].id, $('#doc-' + arr[i].id)[0].files[0]);
				}
				formData.append("total_documents", arr.length);
				formData.append("refurbish_id", $('#refurbish_id').val());
				formData.append("repo_id", $('#repo_id').val());
				formData.append("module_id", current_module_id);
				formData.append("classification", $('#unit-classification').val());

				let parts = []

				for (let i = 0; i < spares.length; i++) {
					parts.push({
						received_parts_id: $(`#received-id-${ spares[i].parts }`).val(),
						parts_id: spares[i].parts,
						status: $('#repo_stats-' + spares[i].parts).val(),
						actual_price: $('#actual-price-' + spares[i].parts).val()
					})
				}
				formData.append("spares", JSON.stringify(parts));

				showLoader()
				$.ajax({
					url: url,
					type: 'POST',
					headers: {
						'Authorization': `Bearer ${ auth.token }`,
					},
					data: formData,
					processData: false,
					contentType: false,
					enctype: 'multipart/form-data',
					success: function(data) {
						
						if (!data.success) {
							hideLoader()
							toast(data.message, 'danger');
						} else {
							hideLoader()
							let msg = user_action === 'create' ? 'New Refurbish Request Succesfully submit!' : 'Refurbish Request Succesfully updated!'
							toast(msg, 'success');
							$('#staticBackdrop').modal('hide')
							display_table(current_module_id)
							qoute1 = null
							qoute2 = null
							qoute3 = null
						}
					},
					error: function(response) {
						hideLoader()
						toast(response.responseJSON.message, 'danger');
						forceLogout(response.responseJSON) //if token is expired
					}
				});

			});

			$('#back-search').click(function() {
				// $('#details').hide()
				// $('#list').show()

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
					status: $('#repo_stats-' + spares[i].parts).val(),
					actual_price: $('#actual-price-' + spares[i].parts).val()
				})
			}

			const data = {
				repo_id: $('#repo_id').val(),
				data_id: data_id,
				remarks: $('#remarks').val(),
				status: status,
				module_id: $('#mod').val(),
				spares: JSON.stringify(parts)
			}

			showLoader()

			$.ajax({
				url: `${baseUrl}/refurbishProcessDecision`,
				type: 'POST',
				headers: {
					'Authorization': `Bearer ${ auth.token }`,
				},
				data: data,
				dataType: 'json',
				success: function(data) {
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

		async function display_table(current_module_id) {
			if (current_roles == 'Approver') {
				$('#request').hide()
			}

			if ($.fn.DataTable.isDataTable("#received-unit-table")) {
				$('#received-unit-table').DataTable().clear().destroy();
			}
			
			$("#received-unit-table").DataTable({
				processing: true,
				serverSide: true,
				ajax: function(data, callback, settings) {
					fetch(`${baseUrl}/getListForRefurbishProcess/${ current_module_id }`, {
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
							if (oData.status == 'Subject For Refurbishing' && current_roles == 'Maker') {

								html = `
									<button class="btn btn-sm btn-soft-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
									onclick="edit(${ oData.repo_id },'${ oData.refurbish_id }', '${ oData.branch }', '${ oData.branchname }', 
										'${ oData.brandname }', '${ oData.repo_id }', '${ oData.model_name }',
										 '${ oData.model_chassis }', '${ oData.model_engine }',
										  '${ current_roles }','create','${ oData.color }','${ oData.remarks }','0','${ oData.classification }','${ oData.receive_id }')"> 
										<i class="ri-edit-box-line"></i> Proceed to refurbish
									</button>
									<button class="btn btn-sm btn-soft-warning"  
									onclick="remove(${ oData.refurbish_id })"> 
										<i class="ri-delete-bin-5-line"></i> Cancel
									</button> 
								`;
							}

							if (oData.status == 'WAITING FOR APPROVAL' && current_roles == 'Maker') {
								html = `
									No Action Available
								`;
							}

							if (oData.status == 'DISAPPROVED' && current_roles == 'Maker') {

								html = `
									<button class="btn btn-sm btn-soft-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
									onclick="edit(${ oData.repo_id },'${ oData.refurbish_id }', '${ oData.branch }', '${ oData.branchname }', 
										'${ oData.brandname }', '${ oData.repo_id }', '${ oData.model_name }',
										 '${ oData.model_chassis }', '${ oData.model_engine }',
										  '${ current_roles }','update','${ oData.color }','${ oData.remarks }','${ oData.processid }','${ oData.classification }','${ oData.receive_id }')"> 
										<i class="ri-edit-box-line"></i> Update to proceed
									</button>
									<button class="btn btn-sm btn-soft-warning"  
									onclick="remove(${ oData.refurbish_id })"> 
										<i class="ri-delete-bin-5-line"></i> Cancel
									</button> 
								`;
							}

							if (oData.status == 'WAITING FOR APPROVAL' && current_roles == 'Maker') {
								html = 'Waiting for approval';
							}

							if (oData.status == 'WAITING FOR APPROVAL' && current_roles == 'Approver') {
								$('.upload-class').hide()
								html = `
									<button class="btn btn-sm btn-soft-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
									onclick="viewForApproval(${ oData.processid },'${ oData.refurbish_id }', '${ oData.branch }', '${ oData.branchname }', 
										'${ oData.brandname }', '${ oData.repo_id }', '${ oData.model_name }',
										 '${ oData.model_chassis }', '${ oData.model_engine }',
										  '${ current_roles }','new','${ oData.color }','${ oData.classification }','${ oData.receive_id }')"> 
										<i class="ri-check-circle"></i> Approve
									</button>
									<button class="btn btn-sm btn-soft-warning"  
									onclick="remove(${ oData.refurbish_id })"> 
										<i class="ri-delete-bin-5-line"></i> Cancel
									</button> 
								`;
							}

							$(nTd).html(html);
						}
					},
				]
			});
		}

		function remove(id) {
			let prompt = confirm('Are you sure do you want to cancel this refurbishing procedure transaction ?')
			if (prompt) {
				showLoader()

				$.ajax({
					url: `${ baseUrl }/cancelRefurbish`,
					type: 'POST',
					headers: {
						'Authorization': `Bearer ${ auth.token }`,
					},
					data: {
						id: id,
					},
					success: function(data) {

						if (!data.success) {
							hideLoader()
							toast(data.message, 'danger');
						} else {
							hideLoader()

							toast('Transaction successfully cancelled', 'success');
							display_table(current_module_id)

						}
					},
					error: function(response) {
						hideLoader()
						toast(response.responseJSON.message, 'danger');
						forceLogout(response.responseJSON) //if token is expired
					}
				});
			}
		}

		function getUploadedDocuments(refurbishId) {
			$('#uploaded-qoutation').html('')

			$.ajax({
				url: `${baseUrl}/getUploadedDocuments/${refurbishId}`,
				type: 'GET',
				headers: {
					'Authorization': `Bearer ${ auth.token }`,
				},
				success: function(data) {
					$('#uploaded-qoutation tr').remove();
					if (data.length > 0) {

						let qoutations = JSON.parse(data[0].files_names)
						let row = ''
						let link = baseUrl.replace('/api', '')
						for (let i = 0; i < qoutations.length; i++) {

							row += `<tr>
										<td>
											<a href="#" onclick="downloadURI('${link}/${qoutations[i].path}','${qoutations[i].filename}')"><span title="Download Qoutation">${qoutations[i].filename}</span></a>
										</td>
									</tr>`
						}

						$('#uploaded-qoutation').show()

						$('#uploaded-qoutation').html(row)
					}

				},
				error: function(response) {
					toast(response.responseJSON.message, 'danger');
					forceLogout(response.responseJSON) //if token is expired
				}
			})
		}

		function edit(repo_id, refurbish_id, branchid, branchname, brand, repo_id, modelname, chassis, engine, role, actionTaken, color, remarks, processid, classification, receive_id) {
			$('#uploaded-qoutation').hide()
			$('#maker-remarks').hide()
			user_action = actionTaken
			if (remarks !== 'null') {
				$('#maker-remarks').html('Remarks: ' + remarks)
				$('#maker-remarks').show()

				if (actionTaken === 'update') {
					$('#record_id').val(processid)
					getUploadedDocuments(refurbish_id)
				}

			}


			$('#list').hide()
			$('#details').show()

			$('#qoute-list').hide()
			$('#upload').show()

			if (role == 'Maker') {

				$('.remarks').css('display', 'none')
				$('.remarks1').css('display', 'none')
				$('.btnmaker').css('display', 'block')
				$('.btnapprover').css('display', 'none')
			} else {
				$('.note').css('display', 'none')
				$('.note1').css('display', 'none')
				$('.btnmaker').css('display', 'none')
				$('.btnapprover').css('display', 'block')
			}


			//let obJ = JSON.Parse(data)
			$('#refurbish_id').val(refurbish_id)
			$('#branch_id').val(branchid)
			$('#branch_name').val(branchname)
			$('#brand').val(brand)
			$('#repo_id').val(repo_id)
			$('#model').val(modelname)

			$('#engine').val(engine)
			$('#chassis').val(chassis)
			$('#color').val(color)
			$('#unit-classification').val(classification).trigger('change')

			//get list of missing and damages parts
			getPartsForRefurbish(receive_id, role, refurbish_id)
		}

		function getPartsForRefurbish(receive_id, role, refurbish_id) {
			$('#part-list').html('')
			
			var fetch_id = (role == 'Maker' ? 0 : refurbish_id)
			console.log(fetch_id, receive_id, role, refurbish_id)

			$.ajax({
				url: `${baseUrl}/getPartsForRefurbish`,
				type: 'GET',
				headers: {
					'Authorization': `Bearer ${ auth.token }`,
				},
				data: {
					'received_id' : receive_id,
					'fetch_id' : fetch_id
				},
				success: function(data) {
					console.log(data)
		
					let tbl = `<table border="1" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Parts</th>
											<th>Price</th>
											<th>Actual Price</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                `
					for (let i = 0; i < data.length; i++) {
						spares.push({
							parts: data[i].record_id
						})

						tbl += `<tr>
                                    <td>
                                    <input type="hidden" class="form-control" id="received-id-${data[i].record_id}" value="${data[i].record_id}" autocomplete="off" disabled>
                                    <input type="text" class="form-control" value="${data[i].name}" autocomplete="off" disabled>
                                    </td>
									<td>
                                    <input type="number" class="form-control"  value="${data[i].price}" autocomplete="off" disabled>
                                    </td>
									<td>
                                    <input type="number" class="form-control" id="actual-price-${data[i].record_id}"  value="${data[i].actual_price}">
                                    </td>
                                    <td>`

						if (role == 'Maker') {

							tbl += `<select id="repo_stats-${data[i].record_id}" class="form-control">
											<option value="">Select Status</option>
											<option value="done">Refurbishing Done</option>
											<option value="na">No available Parts</option>
										</select>`

						} else {
							tbl += `<select id="repo_stats-${data[i].record_id}" class="form-control" disabled>
											<option value="">Select Status</option>
											<option value="done">Refurbishing Done</option>
											<option value="na">No available Parts</option>
										</select>`
						}

						tbl += `</td></tr>`


						setTimeout(() => {
							$(`#repo_stats-${data[i].record_id}`).val(data[i].status).trigger('change');
						}, 200);
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

		function viewForApproval(processid, refurbish_id, branchid, branchname, brand, repo_id, modelname, chassis, engine, role, categ, color, classification, receive_id) {

			$('#list').hide()
			$('#details').show()


			$('#qoute-list').show()


			if (role == 'Approver') {
				$('.note').css('display', 'none')
				$('.btnapprover').css('display', 'block')
				$('.btnmaker').css('display', 'none')
			} else {
				$('.btnapprover').css('display', 'none')
				$('.btnmaker').css('display', 'block')
				$('.remarks').css('display', 'none')
				$('.remarks1').css('display', 'none')
			}

			getUploadedDocuments(refurbish_id)


			data_id = processid
			$('#branch_id').val(branchid)
			$('#branch_name').val(branchname)
			$('#brand').val(brand)
			$('#repo_id').val(repo_id)
			$('#model').val(modelname)

			$('#engine').val(engine)
			$('#chassis').val(chassis)
			$('#color').val(color)
			$('#unit-classification').val(classification).trigger('change')


			getPartsForRefurbish(receive_id, role, refurbish_id)

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