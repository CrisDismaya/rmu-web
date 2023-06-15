
<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>
	<title> Color Management | RMU </title>
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
								<h4 class="mb-sm-0">Color Management</h4>

								<div class="page-title-right">
									<ol class="breadcrumb m-0">
										<li class="breadcrumb-item"><a href="javascript: void(0);"> Maintenance </a></li>
										<li class="breadcrumb-item active"> Color Management </li>
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
									<h4 class="card-title mb-0 flex-grow-1"> Color </h4>
								</div>
								<div class="card-body containter">
									<div class="col-md-12 mb-3">
										<label class="form-label"> Color Name </label>
										<input id="color" type="text" class="form-control" id="placeholderInput" placeholder="Color Name" autocomplete="off">
									</div>
									<div class="col-md-12">
										<div class="d-grid gap-2" >
											<button id="save-branches" type="button" class="btn btn-primary" data-id="0">
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
									<h4 class="card-title mb-0 flex-grow-1"> Color List </h4>
									
								</div>
								<div class="card-body">
									<table id="branch-table" class="table table-bordered nowrap align-middle mdl-data-table" style="width:100%">
										<thead>
											<tr>
												<th> Name </th>
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
		display_table();

		$('#save-branches').click(function(){
			let id = $(this).data('id')
			let url = (id === 0 ? `${baseUrl}/createColor` : `${baseUrl}/updateColor/`+id)

			showLoader()
			
			$.ajax({
				url: url, 
				type: 'POST', 
				dataType: 'json',
				headers:{
					'Authorization':`Bearer ${auth.token}`,
				},
				data: { 
					name : $('#color').val(),
				}, 
				success: function (data) { 
					if(!data.success){
						hideLoader()
						toast(data.message, 'danger');
					}
					else{
						hideLoader()
						let msg = id == 0 ? 'Color Succesfully added!' : 'Color Succesfully updated!'
						toast(msg, 'success');
						$('#color').val('');
						$('#save-branches').data('id', 0)
						display_table()
					}
				},
				error: function(response) {
					hideLoader()
					toast(response.responseJSON.message, 'danger');
				}
			});
		});

		async function display_table(){
			const tableData = await $.ajax({
				url: `${baseUrl}/colors`,
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
					{ data: "name" },
					{ data: null, defaultContent: '',
						fnCreatedCell: function(nTd, sData, oData, iRow, iCol){
							var status = oData.status;
							var classes = (status != 1 ? 'success' : 'danger');
						//	var text = (status != 1 ? 'Activate' : 'Deactivate');

							html = `
								<button class="btn btn-sm btn-soft-warning"
									onclick="edit(${ oData.id }, '${ oData.name }')"> 
									<i class="ri-edit-box-line"></i> Edit 
								</button> 
							`;
							$(nTd).html(html);
						}
					},
				]
			});
		}

		function edit(id, name){
			$('#color').val(name)
			$('#save-branches').data('id', id)
		}

	</script>
</body>
</html>