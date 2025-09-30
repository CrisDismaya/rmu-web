<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>
	<title> Inventory | RMU </title>
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
								<h4 class="mb-sm-0" id="header-breadcram">Inventory Of Units</h4>

							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-12">
							<div class="card">
								<div class="card-header align-items-center d-flex">
									<h4 class="card-title mb-0 flex-grow-1">List of Units</h4>
									<div class="flex-shrink-0 col-md-3" id="branches-selection">
										<select id="branch" class="form-select form-select-sm select-single"></select>
									</div>
								</div>
								<div class="card-body">
									<table id="received-unit-table" class="table table-bordered nowrap align-middle mdl-data-table" style="width:100%">
										<!-- <thead>
											<tr>
												<th rowspan="2"></th>
												<th colspan="2" style="text-align: center;"> Inventory </th>
												<th rowspan="2"> Branch</th>
												<th rowspan="2"> Location</th>
												<th rowspan="2"> Ex Owner </th>
												<th rowspan="2"> MUISVA #</th>
												<th rowspan="2"> Brand </th>
												<th rowspan="2"> Model </th>
												<th rowspan="2"> Engine </th>
												<th rowspan="2"> Chassis </th>
												<th rowspan="2"> Color </th>
												<th rowspan="2" style="text-align: left !important;">Price</th>
												<th rowspan="2"> Aging </th>
												<th rowspan="2"> Quantity </th>
												<th rowspan="2"> On Hand </th>
												<th rowspan="2"> Status </th>
												<th rowspan="2"> Pictures </th>
												<th rowspan="2"> Forms </th>
											</tr>
											<tr>
												<th style="text-align: center;">IN</th>
												<th style="text-align: center;">OUT</th>
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

	<div class="modal fade" id="customerhistory" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-xl" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5>Unit History</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body container">
					<div class="table-responsive">
						<table id="history-unit-table" class="table table-bordered nowrap align-middle mdl-data-table" style="width:100%">
							<thead>
								<tr>
									<th>Branch</th>
									<th> Ex Owner </th>
									<th> Brand </th>
									<th> Model </th>
									<th> Engine </th>
									<th> Chassis </th>
									<th> Date Inserted </th>
									<th> Appraised </th>
									<th> Refurbished </th>
									<th> Transfered </th>
									<th> Received </th>
								</tr>
							</thead>
						</table>
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
							<div>
								<p style="margin-bottom: 3px !important;"># Newest</p>
								<div id="append-upload-section-received-newest" class="row"></div>
								<p style="margin-bottom: 3px !important;"># Oldest</p>
								<div id="append-upload-section-received-oldest" class="row"></div>
							</div>
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

	<?php include_once './_partials/__footer-template.php'; ?>

	<script>
		$(document).ready(function() {
			fetch_branch_data()
			display_table()

			$('#branch').change(function() {
				const branchId = $(this).val() == 'all' ? 0 : $(this).val();
				display_table(branchId)
			})
		})

		async function display_table(branchId = 0) {
			(auth.role == 'Warehouse Custodian' ? $('#branches-selection').hide() : $('#branches-selection').show())

			if ($.fn.DataTable.isDataTable("#received-unit-table")) {
				$('#received-unit-table').DataTable().clear().destroy();
			}

			$("#received-unit-table").DataTable({
				processing: true,
				serverSide: true,
				ajax: {
					url: `${baseUrl}/InventoryMasterList`,
					type: 'GET',
					headers: {
						'Authorization': `Bearer ${auth.token}`,
						'Content-Type': 'application/json',
					},
					data:{
						'branchId': branchId
					},
					error: function (xhr, error, thrown) {
						console.error('DataTables AJAX error:', error, thrown);
					}
				},
		  		scrollX: true,
				scrollCollapse: true,
				ordering: false,
				columns: [
					{ data: "inventory_in", title: "Inventory In", className: "fw-semibold" },
					{ data: "inventory_out", title: "Inventory Out", className: "fw-semibold" },
					{ data: "branch_name", title: "Branch" },
					{ data: "location_name", title: "Location" },
					{ data: "ex_owner", title: "Ex Owner" },
					{ data: "brand_name", title: "Brand" },
					{ data: "model_name", title: "Model" },
					{ data: "model_engine", title: "Engine" },
					{ data: "model_chassis", title: "Chassis" },
					{ data: "color_name", title: "Color" },
					{ data: "selling_price", title: "Selling Price", render: $.fn.dataTable.render.number('\, ', '.', 2, '', ''), className: "text-end" },
					{ data: "aging_days", title: "Aging" },
					{ data: "quantity", title: "Quantity" },
					{ data: "available", title: "On Hand" },
					{ data: "current_status", title: "Current Status" },
					{
						data: null, title: "Pictures", defaultContent: '', className: "text-center",
						fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
								let html = `
									<button class="btn btn-sm btn-soft-primary"
												onclick="fetch_files_updated(${oData.id})">
										<i class="bx bx-images"></i>
									</button>`;
								$(nTd).html(html);
						}
					},
					{
						data: null, title: "Forms", defaultContent: '',
						fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
								let html = `
									<a id="forms-${iRow}" class="btn btn-sm btn-outline-primary"
										onclick="generateForm(${oData.repo_id}, 'MUISVA')">
										<b>MUISVA</b>
									</a>
								`;

								if (oData.is_appraised == 1) {
									html += `
										<b>|</b>
										<a id="forms-${iRow}" class="btn btn-sm btn-outline-primary"
											onclick="generateForm(${oData.repo_id}, 'RDAF')">
												<b>RDAF</b>
										</a>`;
								}

								if (oData.is_refurbished == 1) {
									html += `
										<b>|</b>
										<a id="forms-${iRow}" class="btn btn-sm btn-outline-primary"
											onclick="generateForm(${oData.repo_id}, 'SMURF')">
												<b>SMURF</b>
										</a>`;
								}
								$(nTd).html(html);
						}
					}
				],
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
							className: 'btn btn-light bg-gradient waves-effect waves-light'
					},
					{
						extend: 'excelHtml5',
						text: 'Export to Excel (All Visible)',
						className: 'btn btn-success bg-gradient waves-effect waves-light',
						filename: 'Export_All',
						exportOptions: {
							columns: ':visible'
						}
					},
				],
				lengthMenu: [
					[10, 25, 50, -1],
					[10, 25, 50, 'All']
				]
			});
		}

		function generateForm(recordId, forms) {
				$('#myExtraLargeModalLabel').html(forms + ' Form')
				$('#iframe-content').html(`
					<iframe  height="100%" width="100%" src="${ baseUrl }/generateReport/${ forms }/${ recordId }/inventory" frameborder="0"></iframe>
				`)
				$('#generateForm').modal('show')
		}

		function fetch_branch_data() {
			$.ajax({
				url: `${baseUrl}/branches`,
				type: 'GET',
				headers: {
					'Authorization': `Bearer ${ auth.token }`,
				},
				success: function(data) {
					$('#branch').empty();

					if (data.length > 0) {
						$('#branch').append(`<option value="all" selected>All Branches</option>`);
						for (let i = 0; i < data.length; i++) {
							const el = data[i];
							$('#branch').append(`<option value="${ el.id }">${ el.name }</option>`);
						}
					} else {
						$('#branch').append(`<option value=""> No Available Data </option>`);
					}
				},
				error: function(response) {
					toast(response.responseJSON.message, 'danger');
					forceLogout(response.responseJSON) //if token is expired
				}
			});
		}

		function fetch_files_updated(repoid) {
			const image_path = `${baseUrl.replace('/api', '')}`;
			const imageExtensions = ['jpg', 'jpeg', 'png'];
			const fileIcons = {
				pdf:  '../assets/images/small/default-pdf.png',
				docx: '../assets/images/small/default-docs.png',
				xlsx: '../assets/images/small/default-xlsx.png'
			};

			// --- helper to build file card ---
			function buildFileCard(el) {
				const filePath = el?.path || '';
				const fileName = el?.files_name || 'Unknown File';
				const extension = filePath.includes('.') ? filePath.split('.').pop().toLowerCase() : '';

				// decide image source
				let imageSource;
				if (imageExtensions.includes(extension)) {
					imageSource = `${image_path}/${filePath}`;
				} else {
					imageSource = fileIcons[extension] || '../assets/images/small/img-1.jpg';
				}

				return `
					<div class="col-sm-3">
						<figure class="figure mb-2">
							<img src="${imageSource}" class="figure-img img-thumbnail rounded" alt="${fileName}"
								onerror="this.onerror=null; this.src='../assets/images/small/img-4.jpg';">
							<input type="file" class="form-control d-none" onchange="preview_photo(this.id)" disabled>
							<figcaption class="figure-caption input-group input-group-sm">
								<div class="input-group">
									<input type="text" class="form-control form-control-sm" value="${fileName}" readonly>
									<button
										class="btn btn-sm btn-info bg-gradient waves-effect waves-light"
										type="button"
										onclick="view_image('${imageSource}')"
										style="display:${imageExtensions.includes(extension) ? 'block' : 'none'};"
									>
										<i class="ri-image-line label-icon align-middle"></i>
									</button>
									<a
										role="button"
										class="btn btn-sm btn-info bg-gradient waves-effect waves-light"
										href="${image_path}/${filePath}"
										download
										style="display:${imageExtensions.includes(extension) ? 'none' : 'block'};"
									>
										<i class="ri-download-2-line label-icon align-middle"></i>
									</a>
								</div>
							</figcaption>
						</figure>
					</div>
				`;
			}

			// --- main ajax ---
			const data = $.ajax({
				url: `${baseUrl}/getAllFileUploaded`,
				method: 'POST',
				dataType: 'json',
				headers: {
					'Authorization': `Bearer ${auth.token}`,
				},
				data: { repoid }
			});

			$('#view-uploaded-files').modal('show');
			$('#append-upload-section-received-newest').empty();
			$('#append-upload-section-received-oldest').empty();

			data.done(function(response) {
				response[0]?.forEach(el => {
					$('#append-upload-section-received-newest').append(buildFileCard(el));
				});

				response[1]?.forEach(el => {
					$('#append-upload-section-received-oldest').append(buildFileCard(el));
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