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
						<!-- table -->
						<div class="col-lg-12">
							<div class="card">
								<div class="card-header align-items-center d-flex">
									<h4 class="card-title mb-0 flex-grow-1">List of Units</h4>
									<div class="flex-shrink-0" id="branches-selection">
										<select id="branch" class="select-single"></select>
									</div>
								</div>
								<div class="card-body">
									<table id="received-unit-table" class="table table-bordered nowrap align-middle mdl-data-table" style="width:100%">
										<thead>
											<tr>
												<th></th>
												<th>Branch</th>
												<th>Location</th>
												<th> Ex Owner </th>
												<th>MUISVA #</th>
												<th> Brand </th>
												<th> Model </th>
												<th> Engine </th>
												<th> Chassis </th>
												<th> Color </th>
												<th style="text-align: left !important;">Current SRP </th>
												<!-- <th> Appraised SRP </th> -->
												<th> Aging </th>
												<th> Quantity </th>
												<th> On Hand </th>
												<th> Status </th>
												<th> Pictures </th>
												<th> Forms </th>

												<!-- <th> Action </th> -->
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

	<div class="modal fade" id="customerhistory" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-xl" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5>Unit History</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body container">
					<div class="card pa-2">
						<table id="history-unit-table" class="table table-bordered nowrap align-middle mdl-data-table" style="width:100%">
							<thead>
								<tr>
									<th>Branch</th>
									<th> Ex Owner </th>
									<th> Brand </th>
									<th> Model </th>
									<th> Engine </th>
									<th> Chassis </th>
									<th> Color </th>
									<th> Date Sold </th>
									<th> Date Surrendered </th>
									<!-- <th> Action </th> -->
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

				if ($('#branch').val() != '') {
					display_table()
				}

			})
		})

		async function display_table() {
			const tableData = await $.ajax({
				url: `${baseUrl}/InventoryMasterList`,
				method: 'GET',
				dataType: 'json',
				headers: {
					'Authorization': `Bearer ${ auth.token }`,
				}
			});

			(tableData.role == 'Warehouse Custodian' ? $('#branches-selection').hide() : $('#branches-selection').show())
			
			// let data = ($('#branch').val() == '' || $('#branch').val() == 'all') ? tableData.data : tableData.data.filter(d => {
			// 	return d.branch_id == $('#branch').val()
			// })

			$("#received-unit-table").DataTable().destroy();
			$("#received-unit-table").DataTable({
				deferRender: true,
				searching: true,
				scrollY: 400,
				scrollX: true,
				scrollCollapse: true,
				paging: false,
				data: tableData.data,
				// aoColumnDefs: [
				// 	{ className: "text-end", targets: [ 4 ] },
				// ],
				columns: [{
						data: null,
						defaultContent: '',
						fnCreatedCell: function(nTd, sData, oData, iRow, iCol) {
							//	
							html = `<a href="#" title="Click here to view customer history" 
										onclick="getAllCustomer('${ oData.model_engine }','${ oData.model_chassis }')"><u><span>History</span></u></a>`;

							$(nTd).html(html);
						}
					},
					{
						data: "branchname"
					},
					{
						data: "location"
					},
					{
						data: "ex_owner"
					},
					{
						data: "msuisva"
					},
					{
						data: "brandname"
					},
					{
						data: "model_name"
					},
					{
						data: "model_engine"
					},
					{
						data: "model_chassis"
					},
					{
						data: "color"
					},
					{
						data: "current_appraised",
						render: $.fn.dataTable.render.number('\, ', '.', 2, '', ''),
						className: "text-end"
					},
					// {
					// 	data: "current_appraised",
					// 	render: $.fn.dataTable.render.number('\, ', '.', 2, '', ''),
					// 	className: "text-end"
					// },
					{
						data: "aging"
					},
					{
						data: "quantity"
					},
					{
						data: "availability"
					},
					{
						data: "status"
					},
					{
						data: null,
						defaultContent: '',
						className: "text-center",
						fnCreatedCell: function(nTd, sData, oData, iRow, iCol) {
							html = `
								<button class="btn btn-sm btn-soft-primary" onclick="fetch_files_updated(${ oData.repo_id })"> 
									<i class="bx bx-images"></i>
								</button> 
							`;

							$(nTd).html(html);
						}
					},
					{
						data: null,
						defaultContent: '',
						fnCreatedCell: function(nTd, sData, oData, iRow, iCol) {
							//	
							html = `
								<select id="forms-${iRow}" class="select-single" onchange="generateForm(${ oData.repo_id },${iRow})">
													<option value="">Please select form</option>`;
							if (oData.approved_price != null) {
								html += `<option value="RDAF">RDAF</option>`
							}

							html += ` <option value="MUISVA">MUISVA</option>
												</select>`;

							$(nTd).html(html);
						}
					},

				],
				dom: 'Bfrtip',
				buttons: [
					'excelHtml5',
					'csvHtml5',
					'pdfHtml5'
				]
			});
		}

		// function tag(id,brand,model,engine,chassis){
		// 	$('#received_id').val(id)
		// 	$('#brand').val(brand)
		// 	$('#model').val(model)
		// 	$('#engine').val(engine)
		// 	$('#chassis').val(chassis)
		// }

		function getAllCustomer(engine, chassis) {
			getUnitHistory(engine, chassis)
			$('#customerhistory').modal('show')
		}

		async function getUnitHistory(engine, chassis) {
			const tableData = await $.ajax({
				url: `${baseUrl}/UnitHistory/${engine}/${chassis}`,
				method: 'GET',
				dataType: 'json',
				headers: {
					'Authorization': `Bearer ${ auth.token }`,
				}
			});

			$("#history-unit-table").DataTable().destroy();
			$("#history-unit-table").DataTable({
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

					{
						data: "branchname"
					},
					{
						data: "ex_owner"
					},
					{
						data: "brandname"
					},
					{
						data: "model_name"
					},
					{
						data: "model_engine"
					},
					{
						data: "model_chassis"
					},
					{
						data: "color"
					},
					{
						data: "date_sold"
					},
					{
						data: "date_surrender"
					},

				],
			});
		}

		function generateForm(recordId, index) {

			if ($('#forms-' + index).val() != '') {
				$('#myExtraLargeModalLabel').html($('#forms-' + index).val() + ' Form')
				$('#iframe-content').html(`
				<iframe  height="100%" width="100%" src="${ baseUrl }/generateReport/${$('#forms-'+index).val()}/${recordId}/inventory" frameborder="0"></iframe>
				`)

				$('#generateForm').modal('show')
			}


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
						$('#branch').append(`<option value="">Select Branch</option>`);
						$('#branch').append(`<option value="all">All Branches</option>`);
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
			$('#append-upload-section-received-newest').empty()
			$('#append-upload-section-received-oldest').empty()
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

					$('#append-upload-section-received-newest').append(`
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

				response[1]?.forEach(el => {
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

					$('#append-upload-section-received-oldest').append(`
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