
<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>
	<title> Stock Transfer Receiving | RMU </title>
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
								<h4 class="mb-sm-0"> Receiving Stock Transfer </h4>
							</div>
						</div>
					</div>

					<div class="row">
						<!-- table -->
						<div class="col-lg-12">
							<div class="card">
								<div class="card-header align-items-center d-flex">
									<h4 class="card-title mb-0 flex-grow-1"> Receiving Stock Transfer </h4>
								</div>
								<div class="card-body">
									<table id="list-for-receive-transfer-table" class="table table-bordered nowrap align-middle mdl-data-table" style="width:100%">
										<thead>
											<th> Reference Code </th>
											<th> Branch From </th>
											<!-- <th> Request Creator </th> -->
											<th> Customer </th>
											<th> Brand </th>
											<th> Model </th>
											<th> Engine </th>
											<th> Chassis </th>
											<th> Previous Image </th>
											<th> Is Received With? </th>
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

	<div class="modal fade" id="view-uploaded-files" aria-labelledby="myExtraLargeModalLabel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="myExtraLargeModalLabel"> View Uploaded Files </h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>

				<div class="modal-body">
						<div class="col-sm-12 mb-2 content">
							<div class="justify-content-between d-flex align-items-center">
								<label class="mb-0 pb-1 ff-base">UPLOADED FILES IN RECEIVED UNITS<hr style="margin-top: 0rem; margin-bottom: 0.1rem;"></label>
							</div>
							<div id="append-upload-section-received" class="row"></div>
						</div>
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

	<?php include_once './_partials/__footer-template.php'; ?>
	<script>
		$(document).ready(function(){
			display_table();
		});

		async function display_table(){
			const tableData = await $.ajax({
				url: `${baseUrl}/getAllReceiveStockTransfer`,
				method: 'GET',
				dataType: 'json',
				headers:{
					'Authorization':`Bearer ${ auth.token }`,
				}
			});

			$("#list-for-receive-transfer-table").DataTable().destroy();
			$("#list-for-receive-transfer-table").DataTable({
				deferRender: true,
				searching: true,
				scrollY: 400,
		  		scrollX: true,
				scrollCollapse: true,
				paging: false,
				data: tableData,
				columns: [
					{ data: "reference_code", className: 'text-center' },
					{ data: "branch_name" },
					{ data: "customer_name", className: 'fw-semibold' },
					{ data: "brandname" },
					{ data: "model_name" },
					{ data: "engine" },
					{ data: "chassis" },
					{ data: null, defaultContent: '', className: 'text-center',
						fnCreatedCell: function(nTd, sData, oData, iRow, iCol){
							html = `
								<button class="btn btn-sm btn-soft-primary" onclick="view_images(${ oData.receive_id }, ${ oData.stk_prv_id })"> 
									<i class="bx bx-images"></i>
								</button> 
							`;
							$(nTd).html(html);
						}
					},
					{ data: null, defaultContent: '', className: 'text-center',
						fnCreatedCell: function(nTd, sData, oData, iRow, iCol){

							html = `
								<div class="input-group input-group-sm">
									<select class="form-select" id="decision_of_${ oData.repo_id }_${ oData.stk_unit_id }_${ oData.receive_id }_${ oData.stk_prv_id }" aria-label="Example select with button addon">
										<option value="" ${ oData.is_received == '0' ? 'selected' : '' }> Select </option>
										<option value="1" ${ oData.is_received == '1' ? 'selected' : '' }> Use Previous Images </option>
										<option value="2" ${ oData.is_received == '2' ? 'selected' : '' }> Upload New Images </option>
									</select>
									<button class="btn btn-sm btn-outline-primary ${ oData.received_status == 'NO DECISION' ? '' : 'd-none' }" type="button" onclick="save_decision(this)" 
										data-repoid="${ oData.repo_id }" data-stockid="${ oData.stk_unit_id }" data-receiveid="${ oData.receive_id }" data-transferid="${ oData.stk_prv_id }">
										<i class="ri-save-line"></i>
									</button>
								</div>
							`;

							$(nTd).html(html);
						}
					},
				]
			});
		}

		function view_images(received_id, stock_transfer_approval_id){
			const data = $.ajax({
				url: `${baseUrl}/getAllFileUploaded`,
				method: 'POST',
				dataType: 'json',
				headers:{
					'Authorization':`Bearer ${ auth.token }`,
				},
				data:{
					received_id : received_id,
					stock_transfer_approval_id : stock_transfer_approval_id
				}
			});

			$('#view-uploaded-files').modal('show')
			$('#append-upload-section-received').empty()
			data.done(function(response) {
				response.forEach(el => {
					var image_path = `${ baseUrl.replace('/api', '') }`;
					var string = el['path'].split('.')
					var extension = string[string.length - 1].toLowerCase();
					var image_extension = ['jpg', 'jpeg', 'png'];

					if(image_extension.indexOf(extension) !== -1){
						image_source = image_path +'/'+ el['path'];
					}
					else if(extension == 'pdf'){
						image_source = '../assets/images/small/default-pdf.png';
					}
					else if(extension == 'docx'){
						image_source = '../assets/images/small/default-docs.png';
					}
					else if(extension == 'xlsx'){
						image_source = '../assets/images/small/default-xlsx.png';
					}
					else{
						image_source = '../assets/images/small/img-1.jpg';
					}

					if(el['module'] == 'received'){
						$('#append-upload-section-received').append(`
							<div class="col-sm-3">
								<figure class="figure mb-2">
									<img  src="${ image_source }" class="figure-img img-thumbnail rounded" alt="...">
									<input type="file" class="form-control d-none"  onchange="preview_photo(this.id)" disabled>
									<figcaption class="figure-caption input-group input-group-sm">
										<div class="input-group">
											<input type="text" class="form-control form-control-sm" value="${ el['files_name'] }" readonly>
											<button class="btn btn-sm btn-info bg-gradient waves-effect waves-light" type="button" style="display:${ image_extension.indexOf(extension) !== -1 ? 'block' : 'none' };">
												<i class="ri-image-line label-icon align-middle"></i> 
											</button>
											<a role="button" class="btn btn-sm btn-info bg-gradient waves-effect waves-light" href="${ image_path +'/'+ el['path'] }" download style="display:${ image_extension.indexOf(extension) !== -1 ? 'none' : 'block' };">
												<i class="ri-download-2-line label-icon align-middle"></i> 
											</a>
										</div>
									</figcaption>
								</figure>
							</div>
						`);
					}
				});
			});
		}

		function save_decision(element){
			var repoid = $(element).data('repoid');
			var stockid = $(element).data('stockid');
			var receiveid = $(element).data('receiveid');
			var transferid = $(element).data('transferid');
			

			if($(`#decision_of_${ repoid }_${ stockid }_${ receiveid }_${ transferid }`).val() == ''){
				toast('Please select the decision before you save.', 'danger');
				return false;
			}

			showLoader()

			$.ajax({
				url: `${baseUrl}/receivedDesicion`, 
				type: 'POST', 
				dataType: 'json',
				headers:{
					'Authorization':`Bearer ${ auth.token }`,
				},
				data: { 
					stock_transfer_unit_id : stockid,
					receive_id : receiveid,
					transfer_id : transferid,
					decision_id : $(`#decision_of_${ repoid }_${ stockid }_${ receiveid }_${ transferid }`).val(),
				}, 
				success: function (data) { 
					console.log(data);
					if(!data.success){
						toastr.error(data.message);
						hideLoader()
					}
					else{
						toast('Received Unit Successfully!', 'success');
						display_table();
						getNotif()
						hideLoader()
					}
				},
				error: function(response) {
					toast(response.responseJSON.message, 'error');
				}
			});
		}
	</script>
</body>
</html>