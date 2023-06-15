
<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>
	<title> Brand Management | RMU </title>
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
								<h4 class="mb-sm-0">Brand Management</h4>

								<div class="page-title-right">
									<ol class="breadcrumb m-0">
										<li class="breadcrumb-item"><a href="javascript: void(0);"> Maintenance </a></li>
										<li class="breadcrumb-item active"> Brand Management </li>
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
									<h4 class="card-title mb-0 flex-grow-1"> Brand </h4>
								</div>
								<div class="card-body containter">
									<div class="col-md-12 mb-3">
										<label class="form-label"> Enter Brand Code </label>
										<input id="brand-code" type="text" class="form-control" id="placeholderInput" placeholder="Brand Code" autocomplete="off">
									</div>
									<div class="col-md-12 mb-3">
										<label class="form-label"> Enter Brand Name </label>
										<input id="brand-name" type="text" class="form-control" id="placeholderInput" placeholder="Brand Name" autocomplete="off">
									</div>
									<div class="col-md-12">
										<div class="d-grid gap-2" >
											<button id="save-brand" type="button" class="btn btn-primary" data-id="0">
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
									<h4 class="card-title mb-0 flex-grow-1"> List of Brand </h4>
									
								</div>
								<div class="card-body">
									<table id="brand-table" class="table table-bordered nowrap align-middle mdl-data-table" style="width:100%">
										<thead>
											<tr>
												<th> Code </th>
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

		$('#save-brand').click(function(){
			let id = $(this).data('id')
			let url = (id === 0 ? `${baseUrl}/createBrand` : `${baseUrl}/updateBrand/`+id)

			showLoader()
			
			$.ajax({
				url: url, 
				type: 'POST', 
				dataType: 'json',
				headers:{
					'Authorization':`Bearer ${auth.token}`,
				},
				data: { 
               code : $('#brand-code').val(),
					brandname : $('#brand-name').val(),
				}, 
				success: function (data) { 
					if(!data.success){
						hideLoader()
						toast(data.message, 'danger');
					}
					else{
						hideLoader()
						let msg = id == 0 ? 'Brand Succesfully added!' : 'Brand Succesfully updated!'
						toast(msg, 'success');
						$('#save-brand').data('id', 0)
                  $('#brand-code').val('');
						$('#brand-name').val('');
						display_table()
					}
				},
				error: function(response) {
					toast(response.responseJSON.message, 'danger');
				}
			});
		});

		async function display_table(){
			const tableData = await $.ajax({
				url: `${baseUrl}/brands`,
				method: 'GET',
				dataType: 'json',
				headers:{
					'Authorization':`Bearer ${ auth.token }`,
				}
			});

			$("#brand-table").DataTable().destroy();
			$("#brand-table").DataTable({
				deferRender: true,
				searching: true,
				scrollY: 400,
		  		scrollX: true,
				scrollCollapse: true,
				paging: false,
				data: tableData,
				columns: [
					{ data: "code" },
					{ data: "brandname" },
					{ data: null, defaultContent: '',
						fnCreatedCell: function(nTd, sData, oData, iRow, iCol){
							html = `
								<button class="btn btn-sm btn-soft-warning"
									onclick="edit(${ oData.id }, '${ oData.code }', '${ oData.brandname }')"> 
									<i class="ri-edit-box-line"></i> Edit 
								</button> 
							`;
							$(nTd).html(html);
						}
					},
				]
			});
		}

		function edit(id, code, name){
			$('#brand-code').val(code)
			$('#brand-name').val(name)
			$('#save-brand').data('id', id)
		}
	</script>
</body>
</html>