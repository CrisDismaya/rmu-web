
<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>
	<title> Stock Transfer | RMU </title>
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
								<h4 class="mb-sm-0"> Stock Transfer </h4>
							</div>
						</div>
					</div>

					<div class="row">
						<!-- table -->
						<div class="col-lg-12">
							<div class="card">
								<div class="card-header align-items-center d-flex">
									<h4 class="card-title mb-0 flex-grow-1"> List of Stock Transfer </h4>
									<div class="flex-shrink-0" id="stock-transfer-button">
										<button type="button" class="btn btn-soft-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
											Add Stock Transfer
										</button>
									</div>
								</div>
								<div class="card-body">
									<table id="list-for-transfer-table" class="table table-bordered nowrap align-middle mdl-data-table" style="width:100%">
										<thead>
											<tr>
												<th rowspan="2"> Reference Code </th>
												<th rowspan="2"> Requestor </th>
												<th colspan="2" class="text-center"> Branch </th>
												<th rowspan="2" class="text-center"> Unit Count </th>
												<th rowspan="2"> Current Approver </th>
												<th rowspan="2"> Status </th>
												<th rowspan="2"> Action </th>
											</tr>
											<tr>
												<th class="text-center"> From </th>
												<th class="text-center"> To </th>
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

	<div class="modal fade" id="staticBackdrop" aria-labelledby="myExtraLargeModalLabel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="myExtraLargeModalLabel"> Stock Transfer </h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>

				<div class="modal-body">
					<div class="col-md-12">
						<div class="col-sm-3">
							<label class="form-label"> Transfer To: </label>
							<select id="branches" class="select-single-modal"></select>
						</div>
					</div>

					<div class="col-md-12">
						<table id="list-of-model-table" class="table table-bordered nowrap align-middle mdl-data-table" style="width:100%">
							<thead>
								<tr>
									<th> <input class="form-check-input" type="checkbox" id="select-all" style="width: 18px; height: 18px;"> </th>
									<th> Brand </th>
									<th> Model </th>
									<th> Engine </th>
									<th> Chassis </th>
									<th> Color </th>
									<th> Plate No  </th>
								</tr>
							</thead>
						</table>

						<div class="mt-3">
							<label class="form-label"> Reason: </label>
							<textarea id="stock-transfer-reason" rows="3" class="form-control" placeholder="Reason" style="resize:none;"></textarea>
						</div>
					</div>
				</div>

				<div class="modal-footer">
					<a href="javascript:void(0);" class="btn btn-link link-success fw-medium" data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i> Close</a>
					<button type="button" id="save-button" class="btn btn-primary" data-id=""> Save </button>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="view-units-details" aria-labelledby="myExtraLargeModalLabel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="myExtraLargeModalLabel"> List of Unit to transfer  </h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>

				<div class="modal-body">
					<div class="col-md-12">
						<table id="list-of-unit-details-table" class="table table-bordered nowrap align-middle mdl-data-table" style="width:100%">
							<thead>
								<tr>
									<th> Brand </th>
									<th> Model </th>
									<th> Engine </th>
									<th> Chassis </th>
									<th> Color </th>
									<th> Plate No  </th>
									<th> Age Unit  </th>
								</tr>
							</thead>
						</table>
					</div>

					<div id="comment-section" class="col-md-12 mb-4">
						<label for=""> Remarks <small class="fst-italic fw-lighter"> (Note: mandatory if the desision is <span class="text-danger fw-bold">Disapproved</span>) </small></label>
						<textarea id="approver-remark" class="form-control" rows="3" placeholder="Remarks" autocomplete="off" autofocus style="resize: none;"></textarea>
					</div>
				</div>

				<div class="modal-footer">
					<a href="javascript:void(0);" class="btn btn-light  waves-effect fw-medium" data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i> Close</a>
					<button type="button" class="btn btn-success waves-effect approver" onclick="approver_decision(1)"><i class="ri-thumb-up-line me-1 align-middle"></i> Approve </button>
					<button type="button" class="btn btn-danger waves-effect approver" onclick="approver_decision(2)"><i class="ri-thumb-down-line me-1 align-middle"></i> Disapprove </button>
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

		var selected_unit = [], record_id = '';
		$(document).ready(function(){
			$('#stock-transfer-button').hide();
			$('.approver').hide();
			display_table();
			get_branches();
			get_list_of_model();

			$('#select-all').on('click',function(){
				if(this.checked){
					$('.checkbox').each(function(){
						this.checked = true;
						selected_unit.push(parseInt($(this).val()))
					});
				}else{
					$('.checkbox').each(function(){
						this.checked = false;
						selected_unit = [];
					});
				}
			});

			$('#save-button').click(function(){
				let id = $(this).data('id')
				let url = (id == 0 ? `${ baseUrl }/createStockTransfer` : `${baseUrl}/updateUser/`+id)

				showLoader()
				
				var myNewArray = selected_unit.filter(function(elem, index, self) {
					return index === self.indexOf(elem);
				});

				if(myNewArray.length == 0){
					toast('Select Unit to Transfer', 'danger');
					return false;
				}

				$.ajax({
					url: url, 
					type: 'POST', 
					dataType: 'json',
					headers:{
						'Authorization':`Bearer ${ auth.token }`,
					},
					data: { 
						module_id : $('#moduleid').val(),
						transfer_to_branch : $('#branches').val(),
						list_of_transfer : JSON.stringify(myNewArray),
						reason_for_transfer : $('#stock-transfer-reason').val(),
					}, 
					success: function (data) { 
						console.log(data);
						if(!data.success){
							// toastr.error(data.message); 
							toast(data.message, 'error');
							hideLoader()
						}
						else{
							let msg = id == 0 ? 'Stock Transfer Succesfully added!' : 'Stock Transfer Succesfully updated!'
							toast(msg, 'success');
							
							$('#branches').val('').trigger('change')
							$('#select-all').attr('checked', false)
							$('#stock-transfer-reason').val('')
							display_table();
							get_list_of_model();
							selected_unit = [];
							hideLoader()
						}
					},
					error: function(response) {
						hideLoader()
						toast(response.responseJSON.message, 'error');
					}
				});
			});
		});
		
		async function display_table(){
			const tableData = await $.ajax({
				url: `${baseUrl}/getAllForApprovals`,
				method: 'GET',
				dataType: 'json',
				headers:{
					'Authorization':`Bearer ${ auth.token }`,
				}
			});

			if(tableData.userrole.toLowerCase() == 'warehouse custodian' || auth.role.toLowerCase() == 'superadmin'){
				$('#stock-transfer-button').show()
				$('#comment-section').hide()
			}
			else{
				$('#stock-transfer-button').hide()
				$('#comment-section').show()
			}

			$("#list-for-transfer-table").DataTable().destroy();
			$("#list-for-transfer-table").DataTable({
				deferRender: true,
				searching: true,
				scrollY: 400,
		  		scrollX: true,
				scrollCollapse: true,
				paging: false,
				data: tableData.data,
				columns: [
					{ data: "reference_code" },
					{ data: "created_by" },
					{ data: "from_branch" },
					{ data: "to_branch" },
					{ data: "transfer_units_count", class: 'text-center' },
					{ data: "approver_name" },
					{ data: "approval_status",
						render: function(data, type, row) {
							var className;
							if (row.status_id == 1) {
									className += ' text-success';
							} else if (row.status_id == 2) {
									className += ' text-danger';
							} else {
									className += ' text-warning';
							}
							return `<span class="text-center ${ className }">${ data }</span>`;
						}
					},
					{ data: null, defaultContent: '', class: 'text-center',
						fnCreatedCell: function(nTd, sData, oData, iRow, iCol){

							let icon = '';
							if(auth.role.toLowerCase() == 'warehouse custodian' || auth.role.toLowerCase() == 'superadmin')
								icon = 'ri-eye-line';
							else if((auth.role.toLowerCase() == 'verifier' || auth.role.toLowerCase() == 'general manager') && oData.approval_status.toLowerCase() == 'pending')
								icon = 'ri-search-2-line';
							else if((auth.role.toLowerCase() == 'verifier'|| auth.role.toLowerCase() == 'general manager') && oData.approval_status.toLowerCase() != 'pending')
								icon = 'ri-eye-line';

							html = `
								<button class="btn btn-sm btn-soft-primary" onclick="view_details(${ oData.id }, '${ oData.approval_status }', '${ oData.remarks }')"> 
									<i class="${ icon }"></i>
								</button> 
							`;

							$(nTd).html(html);
						}
					}
				]
			});
		}

		async function get_list_of_model(){
			const tableData = await $.ajax({
				url: `${ baseUrl }/modelList`,
				method: 'GET',
				dataType: 'json',
				headers:{
					'Authorization':`Bearer ${ auth.token }`,
				}
			});

			$("#list-of-model-table").DataTable().destroy();
			$("#list-of-model-table").DataTable({
				deferRender: true,
				searching: true,
				scrollY: 350,
		  		scrollX: true,
				scrollCollapse: true,
				autoWidth: true,
				paging: false,
				data: tableData,
				aoColumnDefs: [
					{ className: "text-center", orderable: false, targets: [ 0 ] },
				],
				columns: [
					{ data: null, defaultContent: '',
						fnCreatedCell: function(nTd, sData, oData, iRow, iCol){
							html = `
								<input class="form-check-input checkbox" type="checkbox" id="model-${ oData.id }" style="width: 18px; height: 18px;" onclick="selectedId(${ oData.id })" value="${ oData.id }">
							`;
							$(nTd).html(html);
						}
					},
					{ data: "brandname" },
					{ data: "model_name" },
					{ data: "model_engine" },
					{ data: "model_chassis" },
					{ data: "color_name" },
					{ data: "plate_number" },
				]
			});
		}

		function get_branches(){
			$.ajax({
				url: `${ baseUrl }/branchesList`, 
				type: 'GET', 
				headers:{
					'Authorization':`Bearer ${ auth.token }`,
				},
				success: function (data) {
					$('#branches').empty();

					if(data.length > 0){
						$('#branches').append(`<option value=""> Choose Branch </option>`);
						for (let i = 0; i < data.length; i++) {
							const el = data[i];
							$('#branches').append(`<option value="${ el.id }">${ el.name }</option>`);
						}
					}
					else{
						$('#branches').append(`<option value=""> No Available Data </option>`);
					}
					$('#branches').val('').trigger('change')
				},
				error: function(response) {
					toast(response.responseJSON.message, 'danger');
				}
			});
		}

		function selectedId(id){
			var check = $(`#model-${ id }`).is(':checked')
			var item = parseInt($(`#model-${ id }`).val())

			if(check){
				selected_unit.push(item)
			}
			else{
				selected_unit = $.grep(selected_unit, function(value) {
					return value != item;
				});
			}

			$('.checkbox').on('click',function(){
				if($('.checkbox:checked').length == $('.checkbox').length){
					$('#select-all').prop('checked',true);
				}else{
					$('#select-all').prop('checked',false);
				}
			});
		}

		async function view_details(id, status, remarks){
			$('#view-units-details').modal('show');
			$('#comment-section').hide()
			$('#approver-remark').val('')

			record_id = id;
			if(auth.role.toLowerCase() == 'warehouse custodian' && auth.role.toLowerCase() == 'superadmin'){
				$('.approver').hide();
				$('#comment-section').hide()
			}
			else if((auth.role.toLowerCase() == 'verifier' || auth.role.toLowerCase() == 'general manager') && status.toLowerCase() == 'pending'){
				$('.approver').show()
				$('#comment-section').show()
			}
			else if((auth.role.toLowerCase() == 'verifier'|| auth.role.toLowerCase() == 'general manager') && status.toLowerCase() != 'pending'){
				$('.approver').hide()
				$('#comment-section').show()
			}
			$('#approver-remark').val(remarks)

			const tableData = await $.ajax({
				url: `${baseUrl}/getTransferUnits/${id}`,
				method: 'GET',
				dataType: 'json',
				headers:{
					'Authorization':`Bearer ${ auth.token }`,
				}
			});

			// console.log(tableData);
			$("#list-of-unit-details-table").DataTable().destroy();
			$("#list-of-unit-details-table").DataTable({
				deferRender: true,
				searching: true,
				scrollY: 400,
		  		scrollX: true,
				scrollCollapse: true,
				paging: false,
				data: tableData,
				columns: [
					{ data: "brandname" },
					{ data: "model_name" },
					{ data: "model_engine" },
					{ data: "model_chassis" },
					{ data: "color_name" },
					{ data: "plate_number" },
					{ data: "aging_unit_days" },
				]
			});
		}

		function approver_decision(status){
			
			if(status == 2){
				if($('#approver-remark').val() == ''){
					toast('Fill the remark is mandatory', 'danger');
					$('#approver-remark').focus();
					return false;
				}
			}

			$.ajax({
				url: `${baseUrl}/submitApproverDecision`, 
				type: 'POST', 
				headers:{
					'Authorization':`Bearer ${ auth.token }`,
				},
				data : {
					id : record_id,
					status : status,
					module_id : $('#moduleid').val(),
					remarks : $('#approver-remark').val()
				},
				dataType: 'json',
				success: function (data) { 
					// console.log(data)
					if(!data.success){
						toast(data.message, 'danger');
					}
					else{
						let msg = status == 1 ? 'New Unit Price Succesfully approved!' : 'New Unit Price disapproved!'
						toast(msg, 'success');
						$('#view-units-details').modal('hide');
						getNotif()
						display_table()
						record_id = null
					}
				},
				error: function(response) {
					toast(response.responseJSON.message, 'danger');
				}
			});
		}
	</script>
</body>
</html>