
<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>
	<title> Stock Transfer Report | RMU </title>
	<?php include_once './_partials/__header-template.php'; ?>
</head>
<body>
	<!-- Begin page -->
	<div id="layout-wrapper">
		<?php include_once './_partials/__sidebar-menu.php'; ?>
		
		<div class="main-content">
			<div class="page-content">
            <div class="container-fluid">

               <!-- start page title -->
               <div class="row">
                  <div class="col-12">
                     <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0" id="header-breadcram">Stock Transfer Report</h4>
                     </div>
                  </div>
               </div>
               <!-- end page title -->

               <div class="row">
						<!-- table -->
						<div class="col-lg-12">
							<div class="card">
								<div class="card-header align-items-center d-flex">
									<h4 class="card-title mb-0 flex-grow-1"> Stock Transfer Report </h4>
								</div>
								<div class="card-body">
									<table id="transfer-approved-table" class="table table-bordered nowrap align-middle mdl-data-table" style="width:100%">
										<thead>
											<th> Reference Code </th>
											<th> Branch From </th>
											<th> Branch To </th>
											<th> Engine </th>
											<th> Chassis </th>
											<th> Pictures </th>
											<th> Status </th>
											<th> Date Approved </th>
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

	<div class="modal fade" id="modal-preview" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-xl" role="document">
			<div class="modal-content">
				<img id="image-selected-preview" src="" alt="">
			</div>
		</div>
	</div>

	<?php include_once './_partials/__footer-template.php'; ?>

   <script>
      $(document).ready(function(){
			display_table();
		});

		async function display_table(){
			if ($.fn.DataTable.isDataTable("#transfer-approved-table")) {
				$('#transfer-approved-table').DataTable().clear().destroy();
			}

			$("#transfer-approved-table").DataTable({
				processing: true,
				serverSide: true,
				ajax: function(data, callback, settings) {
					fetch(`${baseUrl}/fetch_stock_transfer_approved`, {
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
					{ data: "reference_code", className: 'text-center' },
					{ data: "origin" },
					{ data: "receiver" },
					{ data: "engine" },
					{ data: "chassis" },
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
					{ data: "approval_status", className: 'text-center' },
					{ data: "date_approved", className: 'text-center' },
				],
				dom: 'Bfrtip',
				buttons: [
					'excelHtml5'
				]
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