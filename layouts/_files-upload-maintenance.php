
<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>
	<title> Document Type Management | RMU </title>
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
								<h4 class="mb-sm-0" id="header-breadcram"> Document Type Management </h4>

								<div class="page-title-right">
									<ol class="breadcrumb m-0">
										<li class="breadcrumb-item"><a href="javascript: void(0);"> Maintenance </a></li>
										<li class="breadcrumb-item active"> Document Type Management </li>
									</ol>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<!--  -->
						<div class="col-lg-4">
							<div class="card">
								<div class="card-header align-items-center d-flex">
									<h4 class="card-title mb-0 flex-grow-1"> File </h4>
								</div>
								<div class="card-body containter">

									<!-- <div class="col-md-12 mb-3">
										<label class="form-label"> File Directory </label>
										<div class="input-group">
											<input id="file-directory" type="text" class="form-control" placeholder="File Directory" autocomplete="off">
											<button id="save-file-directory" class="btn btn-sm btn-secondary bg-gradient waves-effect waves-light" type="button">
												<span class="text-file-directory">Save</span>
											</button>
										</div>
									</div>

									<hr> -->

									<div class="col-md-12 mb-3">
										<label class="form-label"> Filename </label>
										<div class="input-group">
											<input id="filename" type="text" class="form-control" placeholder="Enter Filename" autocomplete="off">
										</div>
									</div>

									<div class="col-md-12 mb-3">
										<label class="form-label"> Is required? </label>
										<div class="input-group">
											<select id="isRequired" class="select-single">
												<option value=""> -Select-  </option>
												<option value="1"> Required </option>
												<option value="0"> Not Required </option>
											</select>
										</div>
									</div>

									<div class="col-md-12 mb-3">
										<label class="form-label"> Status </label>
										<div class="input-group">
											<select id="fileStatus" class="select-single">
												<option value=""> -Select-  </option>
												<option value="1"> Active </option>
												<option value="2"> Inactive </option>
											</select>
										</div>
									</div>

									<div class="col-md-12">
										<div class="d-grid gap-2" >
											<button id="save-file-upload" type="button" class="btn btn-primary" data-id="0">
												Save 
											</button>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- table -->
						<div class="col-lg-8">
							<div class="card">
								<div class="card-header align-items-center d-flex">
									<h4 class="card-title mb-0 flex-grow-1"> Files List </h4>
								</div>
								<div class="card-body">
									<div class="row">

										<div class="col-lg-12">
											<table id="branch-table" class="table table-bordered nowrap align-middle mdl-data-table" style="width:100%">
												<thead>
													<tr>
														<th> Filename </th>
														<th> Is Required? </th>
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

		</div>
	</div>

	<?php include_once './_partials/__footer-template.php'; ?>
	<script>

		var items = [], toSaved = [];
		$(document).ready(function(){
			display_table();
			$('.text-file-directory').text('Save');

			$('#add-module').click(function(){
				$('#staticBackdrop').modal('show');
				$('.unchecked').prop('checked', false);
			});

			$('#save-file-upload').click(function(){
				let id = $(this).data('id')
				let url = (id === 0 ? `${ baseUrl }/createFileUpload` : `${ baseUrl }/updateFileUpload/`+id)
				
				$.ajax({
					url: url, 
					type: 'POST', 
					dataType: 'json',
					headers:{
						'Authorization':`Bearer ${auth.token}`,
					},
					data: { 
						filename : $('#filename').val(),
						isRequired : $('#isRequired').val(),
						status : $('#fileStatus').val(),
					}, 
					success: function (data) { 
						if(!data.success){
							toast(data.message, 'danger');
						}
						else{
							let msg = id == 0 ? 'Files Succesfully added!' : 'Files Succesfully updated!'
							toast(msg, 'success');
							$('#filename').val('')
							$('#isRequired').val('').trigger('change')
							$('#fileStatus').val('').trigger('change');
							$('#save-file-upload').data('id', 0)
							display_table()
						}
					},
					error: function(response) {
						toast(response.responseJSON.message, 'danger');
						forceLogout(response.responseJSON) //if token is expired
					}
				});
			});

		});

		async function display_table(){
			const tableData = await $.ajax({
				url: `${baseUrl}/files`,
				method: 'GET',
				dataType: 'json',
				headers:{
					'Authorization':`Bearer ${ auth.token }`,
				}
			});

			$("#branch-table").DataTable().destroy();
			$("#branch-table").DataTable({
				deferRender: true,
				searching: true,
				scrollY: 400,
		  		scrollX: true,
				scrollCollapse: true,
				paging: false,
				data: tableData,
				columns: [
					{ data: "filename" },
					{ data: "isRequired",
						fnCreatedCell: function(nTd, sData, oData, iRow, iCol){
							var status = oData.isRequired;

							html = `<span>${ status == 1 ? 'Required' : 'Not Required' }</span>`;
							$(nTd).html(html);
						}
					},
					{ data: "status",
						fnCreatedCell: function(nTd, sData, oData, iRow, iCol){
							var status = oData.status;
							var classes = (status != 1 ? 'success' : 'danger');
							var text = (status == 1 ? 'Active' : 'Inactive');

							html = `
								<span clas="text-${ classes }">
									${ text }
								</span>
							`;
							$(nTd).html(html);
						}
					},
					{ data: null, defaultContent: '',
						fnCreatedCell: function(nTd, sData, oData, iRow, iCol){
							var status = oData.status;
							var classes = (status != 1 ? 'success' : 'danger');

							html = `
								<button class="btn btn-sm btn-soft-warning"
									onclick="edit(${ oData.id }, '${ oData.filename }', '${ oData.isRequired }', '${ oData.status }')"> 
									<i class="ri-edit-box-line"></i> Edit 
								</button> 
							`;
							$(nTd).html(html);
						}
					},
				]
			});
		}

		function edit(id, filename, isRequired, status){
			$('#save-file-upload').data('id', id);
			$('#filename').val(filename);
			$('#isRequired').val(isRequired).trigger('change');
			$('#fileStatus').val(status).trigger('change');
		}

	</script>
</body>
</html>