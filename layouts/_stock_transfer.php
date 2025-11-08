
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
								<h4 class="mb-sm-0" id="header-breadcram"> Stock Transfer </h4>
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
										<button type="button" class="btn btn-soft-primary btn-sm btn-add-perm d-none" onclick="get_list_of_model()">
										<!-- data-bs-toggle="modal" data-bs-target="#staticBackdrop" -->
											Add Stock Transfer
										</button>
									</div>
								</div>
								<div class="card-body">
									<table id="list-for-transfer-table" class="table table-bordered nowrap align-middle mdl-data-table" style="width:100%">
										<!-- <thead>
											<tr>
												<th rowspan="2">  </th>
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
										</thead> -->
									</table>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>

		</div>
	</div>

	<div class="modal fade" id="staticBackdrop" aria-labelledby="myExtraLargeModalLabel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog">
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

					<div class="col-md-12 mt-3">
						<table id="list-of-model-table" class="table table-bordered nowrap align-middle mdl-data-table" style="width:100%;">
							<thead>
								<th> <input class="form-check-input" type="checkbox" id="select-all" style="width: 18px; height: 18px;"> </th>
								<th> Brand </th>
								<th> Model </th>
								<th> Engine </th>
								<th> Chassis </th>
								<th> Color </th>
								<th> Plate No  </th>
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
					<button type="button" id="save-stock-transfer" class="btn btn-primary" data-id=""> Save </button>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="view-units-details" aria-labelledby="myExtraLargeModalLabel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="myExtraLargeModalLabel"> Details of Stock Transfer </h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>

				<div class="modal-body">
					<div class="col-lg-6">
						<div class="row mb-3">
							<div class="col-lg-4">
								<label class="form-label">Transaction Ref. No.</label>
							</div>
							<div class="col-lg-8">
								<input type="text" class="form-control" id="transaction-ref-no" placeholder="Enter your name" readonly>
							</div>
						</div>
					</div>
					
					<div class="col-lg-6">
						<div class="row mb-3">
							<div class="col-lg-4">
								<label class="form-label">Origin Branch</label>
							</div>
							<div class="col-lg-8">
								<input type="text" class="form-control" id="origin-branch" placeholder="Enter your name" readonly>
							</div>
						</div>
					</div>
					
					<div class="col-lg-6">
						<div class="row mb-3">
							<div class="col-lg-4">
								<label class="form-label">Receiver Branch</label>
							</div>
							<div class="col-lg-8">
								<input type="text" class="form-control" id="receiver-branch" placeholder="Enter your name" readonly>
							</div>
						</div>
					</div>

					<div class="col-md-12">
						<table id="list-of-unit-details-table" class="table table-bordered nowrap align-middle mdl-data-table" style="width:100%">
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

	<div class="modal fade" id="modal-preview" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-xl" role="document">
			<div class="modal-content">
				<img id="image-selected-preview" src="" alt="">
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

		var selected_unit = [], record_id = '', moduleid = current_module_id;
		// note: current_module_id and current_roles is global variable to see in assets > js > js-custom.js
		const carRegex = /^[A-Z]{3}\d{4}$/i;
		const mcRegex = /^(?:\d{3}[A-Z]{3}|[A-Z]\d{3}[A-Z]{2}|[A-Z]{2}\d{3}[A-Z]|[0-9][A-Z]{3}\d{2}|[A-Z]\d{4}[A-Z]|[A-Z]\d[A-Z]\d{3}|[A-Z]{2}\d{4}|[A-Z]\d{3}[A-Z])$/i;

		$(document).ready(function(){
			applyPermissions();
			
			$('#stock-transfer-button').hide();
			$('.approver').hide();
			get_branches();
			// get_list_of_model();
			display_table(current_module_id);

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


			$('#save-stock-transfer').click(function(){
				let id = $(this).data('id') 
				let url = (id == 0 ? `${ baseUrl }/createStockTransfer` : `${baseUrl}/updateUser/`+id)
				
				var myNewArray = selected_unit.filter(function(elem, index, self) {
					return index === self.indexOf(elem);
				});

				if($('#branches').val() == ''){
					toast('Select branch to transfer units', 'danger');
					return false;
				}
				else if(myNewArray.length == 0){
					toast('Select Unit to Transfer', 'danger');
					return false;
				}
				else if($('#stock-transfer-reason').val() == ''){
					toast('Reason field is empty', 'danger');
					return false;
				}
				
				showLoader()

				$.ajax({
					url: url, 
					type: 'POST', 
					dataType: 'json',
					headers:{
						'Authorization':`Bearer ${ auth.token }`,
					},
					data: { 
						module_id : moduleid,
						transfer_to_branch : $('#branches').val(),
						list_of_transfer : JSON.stringify(myNewArray),
						reason_for_transfer : $('#stock-transfer-reason').val(),
					}, 
					success: function (data) { 
						// console.log(data);
						if(!data.success){
							// toastr.error(data.message); 
							toast(data.message, 'danger');
							hideLoader()
						}
						else{
							let msg = id == 0 ? 'Stock Transfer Succesfully added!' : 'Stock Transfer Succesfully updated!'
							toast(msg, 'success');
							
							$('#branches').val('').trigger('change')
							$('#select-all').attr('checked', false)
							$('#stock-transfer-reason').val('')
							display_table(current_module_id)
							get_list_of_model();
							selected_unit = [];
							hideLoader()
						}
					},
					error: function(response) {
						hideLoader()
						toast(response.responseJSON.message, 'error');
						forceLogout(response.responseJSON) //if token is expired
					}
				});
			});
		});
		
		async function display_table(current_module_id) {
			if (current_roles == 'Maker') {
				$('#stock-transfer-button').show();
				$('#comment-section').hide();
			} else {
				$('#stock-transfer-button').hide();
				$('#comment-section').show();
			}

			// ✅ Destroy existing DataTable safely
			if ($.fn.DataTable.isDataTable("#list-for-transfer-table")) {
				$('#list-for-transfer-table').DataTable().clear().destroy();
			}

			const table = $("#list-for-transfer-table").DataTable({
				processing: true,
				serverSide: true,
				ajax: {
					url: `${baseUrl}/getAllForApprovals/${current_module_id}`,
					type: 'GET',
					dataType: 'json',
					headers: { 'Authorization': `Bearer ${auth.token}` },
				},
				scrollX: true,
				scrollCollapse: true,
				autoWidth: false, 
				responsive: false, 
				columns: [
					{
						title: '', 
						className: 'dt-control text-center no-colvis',
						data: null,
						defaultContent: '' // <i class="ri-add-line text-primary"></i>
					},
					{ title: 'Transaction Ref. No.',  data: "reference_code", className: "fw-semibold" },
					{ title: 'Branch Origin',  data: "from_branch" },
					{ title: 'Branch Receiver',  data: "to_branch" },
					{ title: 'Unit Count',  data: "transfer_units_count", className: 'text-center' },
					{ title: 'Current Approver',  data: "approver_name" },
					{
						title: 'Current Status', 
						data: "approval_status",
						render: (data, type, row) => {
							let className = '';
							if (row.status_id == 1) className = 'text-success';
							else if (row.status_id == 2) className = 'text-danger';
							else className = 'text-warning';
							return `<span class="text-center ${className}">${data}</span>`;
						}
					},
					{ title: 'Person Assigned',  data: "created_by" },
					{
						title: 'Action', 
						data: null,
						defaultContent: '',
						class: 'text-center no-colvis',
						orderable: false, 
						visible: auth.role.toLowerCase() !== 'warehouse custodian' ? true : false,
						fnCreatedCell: function(nTd, sData, oData, iRow, iCol){

							let icon = '';
							if(auth.role.toLowerCase() == 'warehouse custodian' || auth.role.toLowerCase() == 'Administrator')
								icon = 'ri-eye-line';
							else if((auth.role.toLowerCase() == 'verifier' || auth.role.toLowerCase() == 'general manager') && oData.approval_status.toLowerCase() == 'pending')
								icon = 'ri-search-2-line';
							else if((auth.role.toLowerCase() == 'verifier'|| auth.role.toLowerCase() == 'general manager') && oData.approval_status.toLowerCase() != 'pending')
								icon = 'ri-eye-line';

							html = `
								<button class="btn btn-sm btn-soft-primary" onclick="view_details(${ oData.id }, '${ oData.approval_status }', '${ oData.remarks }', 
										'${ oData.reference_code }', '${ oData.from_branch }', '${ oData.to_branch }')"
									> 
									<i class="${ icon }"></i>
								</button> 
							`;

							$(nTd).html(html);
						}
					}
				],
				order: [[1, 'asc']],
				dom: 'Bfrtip',
				buttons: [
					{
						extend: 'pageLength',
						text: 'Rows per page',
						className: 'btn btn-light bg-gradient waves-effect waves-light'
					},
					{
						extend: 'colvis',
						text: 'Show/Hide Columns',
						className: 'btn btn-light bg-gradient waves-effect waves-light',
						columns: ':not(.no-colvis)'
					},
					{
						extend: 'excelHtml5',
						text: 'Export to Excel',
						className: 'btn btn-success bg-gradient waves-effect waves-light',
						// filename: 'Export_All',
						// exportOptions: { columns: ':visible' }
						action: async function () {
							const exportData = await $.ajax({
								url: `${baseUrl}/exportTransfersWithUnits`,
								method: 'GET',
								headers: { 'Authorization': `Bearer ${auth.token}` },
							});

							const rows = [];
							let counter = 1;

							exportData.forEach(item => {
								const plateValid = item.plate_number ? isValidPlate(item.plate_number) : false;

								rows.push({
									'NO.': counter++,
									'TO BRANCH': item.to_branch || '',
									'FROM BRANCH': item.from_branch || '',
									'EX OWNER': item.ex_owner || '',
									'BRAND': item.brand || '',
									'MODEL': item.model || '',
									'ENGINE': item.engine || '',
									'CHASSIS': item.chassis || '',
									'COLOR': item.color || '',
									'OR/CR': item.orcr_status === 'On Hand' ? 'TRUE' : 'FALSE',
									'PLATE': plateValid ? 'TRUE' : 'FALSE',
									'KEY': item.key_status ? 'TRUE' : 'FALSE',
									'REPO DOCS': item.document_status === 'Complete' ? 'TRUE' : 'FALSE',
									'LOAN DOCS': item.loan_document_status ? 'TRUE' : 'FALSE',
								});
							});

							// Define headers explicitly
							const headers = [
								'NO.', 'TO BRANCH', 'FROM BRANCH', 'EX OWNER', 'BRAND', 'MODEL', 'ENGINE',
								'CHASSIS', 'COLOR', 'OR/CR', 'PLATE', 'KEY', 'REPO DOCS', 'LOAN DOCS'
							];

							// Create worksheet
							const ws = XLSX.utils.json_to_sheet(rows, { header: headers });

							// ✅ Auto-adjust column width
							const colWidths = headers.map(h => ({
								wch: Math.max(h.length, ...rows.map(r => (r[h] ? r[h].toString().length : 0))) + 2
							}));
							ws['!cols'] = colWidths;

							// ✅ Center specific columns (OR/CR, PLATE, KEY, REPO DOCS, LOAN DOCS)
							const centerCols = ['OR/CR', 'PLATE', 'KEY', 'REPO DOCS', 'LOAN DOCS'];
							const range = XLSX.utils.decode_range(ws['!ref']);

							for (let C = range.s.c; C <= range.e.c; ++C) {
								const colHeader = headers[C];
								if (centerCols.includes(colHeader)) {
									for (let R = range.s.r; R <= range.e.r; ++R) {
										const cellRef = XLSX.utils.encode_cell({ r: R, c: C });
										if (!ws[cellRef]) continue;
										if (!ws[cellRef].s) ws[cellRef].s = {};
										ws[cellRef].s.alignment = { horizontal: 'center', vertical: 'center' };
									}
								}
							}

							// ✅ Make header bold and center it
							headers.forEach((h, i) => {
								const cell = ws[XLSX.utils.encode_cell({ r: 0, c: i })];
								if (cell) {
									if (!cell.s) cell.s = {};
									cell.s.font = { bold: true };
									cell.s.alignment = { horizontal: 'center', vertical: 'center' };
								}
							});

							// Create workbook and export
							const wb = XLSX.utils.book_new();
							XLSX.utils.book_append_sheet(wb, ws, "Transfers");

							// ✅ Write file
							XLSX.writeFile(wb, "Transfers_With_Units.xlsx", { cellStyles: true });
						}
					}
				],
				lengthMenu: [
					[10, 25, 50, -1],
					[10, 25, 50, 'All']
				],
				initComplete: function () {
					// ✅ Adjust header width after table load
					table.columns.adjust();
				}
			});

			// ✅ Expand / Collapse Logic
			$('#list-for-transfer-table tbody').on('click', 'td.dt-control', async function () {
				const tr = $(this).closest('tr');
				const row = table.row(tr);
				const icon = $(this).find('i');

				if (row.child.isShown()) {
					row.child.hide();
					tr.removeClass('shown');
					icon.removeClass('ri-subtract-line text-danger').addClass('ri-add-line text-primary');
					table.columns.adjust(); // ✅ Recalculate widths
					return;
				}

				icon.removeClass('ri-add-line text-primary').addClass('ri-loader-4-line text-secondary ri-spin');

				const detailsHtml = await formatDetails(row.data());

				row.child(detailsHtml).show();
				tr.addClass('shown');

				icon.removeClass('ri-loader-4-line text-secondary ri-spin').addClass('ri-subtract-line text-danger');
				table.columns.adjust(); // ✅ Fix width after expanding
			});

			// ✅ Adjust column widths on window resize
			$(window).on('resize', function () {
				table.columns.adjust();
			});
		}

		function isValidPlate(plate) {
			const p = plate.replace(/\s|-/g, '').toUpperCase(); // normalize (remove spaces/hyphens)
			return carRegex.test(p) || mcRegex.test(p);
		}

		// 🔹 Format expanded table section
		async function formatDetails(data) {
			try {
				const id = data.id;
				const tableData = await $.ajax({
					url: `${baseUrl}/getTransferUnits/${id}`,
					method: 'GET',
					dataType: 'json',
					headers: { 'Authorization': `Bearer ${auth.token}` },
				});

				if (!tableData?.length) {
					return '<div class="text-muted p-2">No transfer units available.</div>';
				}

				const rows = tableData.map((unit, index) => {
					// handle possible missing or invalid plate number
					const plateValid = unit.plate_number ? isValidPlate(unit.plate_number) : false;

					return `
						<tr>
							<td>${index + 1}</td>
							<td>${unit.ex_owner || '-'}</td>
							<td>${unit.brand || '-'}</td>
							<td>${unit.model || '-'}</td>
							<td>${unit.engine || '-'}</td>
							<td>${unit.chassis || '-'}</td>
							<td>${unit.color || '-'}</td>
							<td class="text-center">${unit.year_model || '-'}</td>
							<td class="text-center">
								<button class="btn btn-sm btn-soft-primary" onclick="fetch_files_updated(${unit.repo_id})"> 
									<i class="bx bx-images"></i>
								</button>
							</td>
							<td class="text-center">${unit.document_status === 'Complete' ? '✅' : '❌'}</td>
							<td class="text-center">${plateValid ? '✅' : '❌'}</td>
							<td class="text-center">${unit.orcr_status === 'On Hand' ? '✅' : '❌'}</td>
							<td class="text-center">${unit.key_status ? '✅' : '❌'}</td>
							<td class="text-center">${unit.loan_document_status ? '✅' : '❌'}</td>
						</tr>
					`;
				}).join('');

				return `
					<div class="p-2">
						<table class="table table-bordered mb-0" style="width:100%;">
							<thead class="table-light">
								<tr>
									<th>No</th>
									<th>Ex Owner</th>
									<th>Brand</th>
									<th>Model</th>
									<th>Engine</th>
									<th>Chassis</th>
									<th>Color</th>
									<th>Year Model</th>
									<th>Files</th>
									<th>OR/CR</th>
									<th>Plate</th>
									<th>Repo Docs</th>
									<th>Key</th>
									<th>Loan Docs</th>
								</tr>
							</thead>
							<tbody>${rows}</tbody>
						</table>
					</div>
				`;
			} catch (error) {
				console.error('Error loading transfer details:', error);
				return '<div class="text-danger p-2">Failed to load transfer details.</div>';
			}
		}

		async function get_list_of_model(){
			$('#staticBackdrop').modal('show')

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
				paging: false,
				data: tableData,
				columns: [
					{ data: null, defaultContent: '', className: "text-center", orderable: false,
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
					forceLogout(response.responseJSON) //if token is expired
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

		async function view_details(id, status, remarks, reference_code, from_branch, to_branch){
			$('#view-units-details').modal('show');
			$('#comment-section').hide()
			$('#approver-remark').val('');

			$('#transaction-ref-no').val(reference_code);
			$('#origin-branch').val(from_branch);
			$('#receiver-branch').val(to_branch);

			record_id = id;
			if(auth.role.toLowerCase() == 'warehouse custodian' && auth.role.toLowerCase() == 'Administrator'){
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
				headers: { 'Authorization': `Bearer ${auth.token}` },
			});

			console.log(tableData)

			if ($.fn.DataTable.isDataTable('#list-of-unit-details-table')) {
				$('#list-of-unit-details-table').DataTable().destroy();
			}
			
			$("#list-of-unit-details-table").DataTable({
				data: tableData,
				deferRender: true,
				searching: true,
				scrollY: 400,
				scrollX: true,
				scrollCollapse: true,
				paging: false,
				columns: [
					{
						data: null,
						className: "text-center",
						render: (data, type, row, meta) => meta.row + 1
					},
					{ data: "ex_owner", defaultContent: '-', title: "Ex Owner" },
					{ data: "brand", defaultContent: '-', title: "Brand" },
					{ data: "model", defaultContent: '-', title: "Model" },
					{ data: "engine", defaultContent: '-', title: "Engine" },
					{ data: "chassis", defaultContent: '-', title: "Chassis" },
					{ data: "color", defaultContent: '-', title: "Color" },
					{ 
						data: "year_model", 
						defaultContent: '-', 
						className: "text-center", 
						title: "Year Model" 
					},
					{
						data: "repo_id",
						className: "text-center",
						title: "Files",
						render: repo_id => `
							<button class="btn btn-sm btn-soft-primary" onclick="fetch_files_updated(${repo_id})">
									<i class="bx bx-images"></i>
							</button>
						`
					},
					{
						data: "orcr_status",
						className: "text-center",
						title: "OR/CR",
						render: val => val === 'On Hand' ? '✅' : '❌'
					},
					{
						data: "plate_number",
						className: "text-center",
						title: "Plate",
						render: val => val && isValidPlate(val) ? '✅' : '❌'
					},
					{
						data: "document_status",
						className: "text-center",
						title: "Repo Docs",
						render: val => val === 'Complete' ? '✅' : '❌'
					},
					{
						data: "key_status",
						className: "text-center",
						title: "Key",
						render: val => val ? '✅' : '❌'
					},
					{
						data: "loan_document_status",
						className: "text-center",
						title: "Loan Docs",
						render: val => val ? '✅' : '❌'
					},
				],
				order: [[0, 'asc']],
				language: {
						emptyTable: "No unit details available."
				}
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
				url: `${baseUrl}/transfer/submitApproverDecision`, 
				type: 'POST', 
				headers:{
					'Authorization':`Bearer ${ auth.token }`,
				},
				data : {
					id : record_id,
					status : status,
					module_id : current_module_id,
					remarks : $('#approver-remark').val()
				},
				dataType: 'json',
				success: function (data) { 
					// console.log(data)
					if(!data.success){
						toast(data.message, 'danger');
					}
					else{
						let msg = status == 1 ? 'Stock Transfer Approved' : 'Stock Transfer Disapproved'
						toast(msg, 'success');
						$('#view-units-details').modal('hide');
						display_table(current_module_id)
						record_id = null
					}
				},
				error: function(response) {
					toast(response.responseJSON.message, 'danger');
					forceLogout(response.responseJSON) //if token is expired
				}
			});
		}

		function fetch_files_updated(repoid) {
			const data = $.ajax({
				url: `${baseUrl}/getAllFileUploaded`,
				method: 'POST',
				dataType: 'json',
				headers: {
					'Authorization': `Bearer ${ auth.token }`,
				},
				data: {
					repoid: repoid
				}
			});

			$('#view-uploaded-files').modal('show')
			$('#append-upload-section-received').empty()
			data.done(function(response) {
				response[0]?.forEach(el => {
					var image_path = `${ baseUrl.replace('/api', '') }`;
					var string = el['path'].split('.')
					var extension = string[string.length - 1].toLowerCase();
					var image_extension = ['jpg', 'jpeg', 'png'];

					if (image_extension.indexOf(extension) !== -1) {
						image_source = image_path + '/' + el['path'];
					} else if (extension == 'pdf') {
						image_source = '../assets/images/small/default-pdf.png';
					} else if (extension == 'docx') {
						image_source = '../assets/images/small/default-docs.png';
					} else if (extension == 'xlsx') {
						image_source = '../assets/images/small/default-xlsx.png';
					} else {
						image_source = '../assets/images/small/img-1.jpg';
					}

					$('#append-upload-section-received').append(`
						<div class="col-sm-3">
							<figure class="figure mb-2">
								<img src="${ image_source }" class="figure-img img-thumbnail rounded" alt="...">
								<input type="file" class="form-control d-none"  onchange="preview_photo(this.id)" disabled>
								<figcaption class="figure-caption input-group input-group-sm">
									<div class="input-group">
										<input type="text" class="form-control form-control-sm" value="${ el['files_name'] }" readonly>
										<button class="btn btn-sm btn-info bg-gradient waves-effect waves-light" type="button" onclick="view_image('${ image_source }')" style="display:${ image_extension.indexOf(extension) !== -1 ? 'block' : 'none' };">
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
				});
			});
		}

		function view_image(item_source){
			$('#modal-preview').modal('show')
			$('#image-selected-preview').attr('src', item_source)
		}
	</script>
</body>
</html>