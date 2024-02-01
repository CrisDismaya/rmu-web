
<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>
	<title> SPAREPARTS MODULE | RMU </title>
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
								<h4 class="mb-sm-0" id="header-breadcram">SPARE PARTS MODULE</h4>

								<div class="page-title-right">
									<ol class="breadcrumb m-0">
										<li class="breadcrumb-item"><a href="javascript: void(0);"> Maintenance </a></li>
										<li class="breadcrumb-item active"> SPARE PARTS MODULE </li>
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
									<h4 class="card-title mb-0 flex-grow-1"> Spare Parts </h4>
								</div>
								<div class="card-body containter">
									<!-- <div class="col-md-12 mb-3">
										<label class="form-label"> Choose Model </label>
										<select id="parts-model" class="select-single"></select>
									</div> -->
									<!-- <div class="col-md-12 mb-3">
										<label class="form-label"> Inventory Code </label>
										<input id="inv-code" type="text" class="form-control"  placeholder="Inventory Code" autocomplete="off">
									</div> -->
									<div class="col-md-12 mb-3">
										<label class="form-label"> Enter Parts Name </label>
										<input id="parts-name" type="text" class="form-control" id="parts-name" placeholder="Parts name" autocomplete="off">
									</div>
									<div class="col-md-12 mb-3">
										<label class="form-label"> Enter Parts Price </label>
										<input id="parts-price" type="text" class="form-control number-only text-end" id="parts-price" placeholder="0.00" autocomplete="off">
									</div>

									<div class="col-md-12">
										<div class="d-grid gap-2" >
											<button id="save-parts" type="button" class="btn btn-primary" data-id="0">
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
									<h4 class="card-title mb-0 flex-grow-1"> List of Spare Parts </h4>
								</div>
								<div class="card-body">
									<table id="parts-table" class="table table-bordered nowrap align-middle mdl-data-table" style="width:100%">
										<thead>
											<tr>
												<!-- <th> Inventory Code </th>
												<th> Model </th> -->
												<th> Name </th>
												<th style="text-align:left !important;"> Price </th>
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
		new Cleave(".number-only", { numeral:!0, numeralThousandsGroupStyle:"thousand"})
		//fetch_model_data();
		display_table();

		$('#save-parts').click(function(){
			let id = $(this).data('id')
			let url = (id === 0 ? `${baseUrl}/createParts` : `${baseUrl}/updateParts/`+id)

			let price = $('#parts-price').val().replace(',','')
			showLoader()
			
			$.ajax({
				url: url, 
				type: 'POST', 
				dataType: 'json',
				headers:{
					'Authorization':`Bearer ${ auth.token }`,
				},
				data: { 
					// model_id : $('#parts-model').val(),
					name : $('#parts-name').val(),
					price :price,
					// inventory_code:$('#inv-code').val()
				}, 
				success: function (data) { 
					if(!data.success){
						hideLoader()
						toast(data.message, 'danger');
					}
					else{
						hideLoader()
						let msg = id == 0 ? 'Parts Succesfully added!' : 'Parts Succesfully updated!'
						toast(msg, 'success');
						$('#save-parts').data('id', 0)
						// $('#parts-model').val('').trigger('change');
						$('#parts-name').val('');
						$('#parts-price').val('');
						// $('#inv-code').val('')
						display_table()
					}
				},
				error: function(response) {
					hideLoader()
					toast(response.responseJSON.message, 'danger');
					forceLogout(response.responseJSON) //if token is expired
				}
			});
		});

		function fetch_model_data(){
			$.ajax({
				url: `${baseUrl}/models`, 
				type: 'GET', 
				headers:{
					'Authorization':`Bearer ${ auth.token }`,
				},
				success: function (data) {
					$('#parts-model').empty();

					if(data.length > 0){
						$('#parts-model').append(`<option value=""> Choose Brand </option>`);
						for (let i = 0; i < data.length; i++) {
							const el = data[i];
							$('#parts-model').append(`<option value="${ el.id }">${ el.model_name }</option>`);
						}
					}
					else{
						$('#parts-model').append(`<option value=""> No Available Data </option>`);
					}
				},
				error: function(response) {
					toast(response.responseJSON.message, 'danger');
					forceLogout(response.responseJSON) //if token is expired
				}
			});
		}

		async function display_table(){
			const tableData = await $.ajax({
				url: `${baseUrl}/parts`,
				method: 'GET',
				dataType: 'json',
				headers:{
					'Authorization':`Bearer ${ auth.token }`,
				}
			});

			$("#parts-table").DataTable().destroy();
			$("#parts-table").DataTable({
				deferRender: true,
				searching: true,
				scrollY: 400,
		  		scrollX: true,
				scrollCollapse: true,
				paging: false,
				data: tableData,
				columns: [
					// { data: "inventory_code" },
					// { data: "model_name" },
					{ data: "name" },
					{ data: "price", className: 'text-end',
						fnCreatedCell: function(nTd, sData, oData, iRow, iCol){
							html = `
								<label class="fw-semibold"> ${ roundOf(oData.price) } </label>
							`;
							$(nTd).html(html);
						}
					},
					{ data: "status", defaultContent: '',
						render: function (data, type, row) {
							return (data == 'A' ? 'Active' : 'Inactive');
						}
					},
					{ data: null, defaultContent: '',
						fnCreatedCell: function(nTd, sData, oData, iRow, iCol){

							var status = oData.status;
							var classes = (status != 'A' ? 'success' : 'danger');
							var text = (status != 'A' ? 'Activate' : 'Deactivate');

							html = `
								<button class="btn btn-sm btn-soft-warning"
									onclick="edit(${ oData.id }, '${ oData.model_id }', '${ oData.name }', '${ oData.price }', '${ oData.inventory_code }')"> 
									<i class="ri-edit-box-line"></i> Edit 
								</button>
								&nbsp; | &nbsp;  
								<button class="btn btn-sm btn-soft-${ classes }"
									onclick="deactivate(${ oData.id }, '${ oData.status }')">
									${ text }
								</button>
							`;
							$(nTd).html(html);
						}
					},
				]
			});
		}

		function edit(id, modelid, name, price,code){
			// $('#inv-code').val(code)
			// $('#parts-model').val(modelid).trigger('change')
			$('#parts-name').val(name)
			$('#parts-price').val(roundOf(price))
			$('#save-parts').data('id', id)
		}

		function deactivate(id, status){
			let stats = (status == 'A' ? 'I' : 'A')

			showLoader()

			$.ajax({
				url: `${baseUrl}/deactivateParts/`+id+`/`+stats, 
				type: 'GET', 
				headers:{
					'Authorization':`Bearer ${ auth.token }`,
				},
				success: function (data) { 
					if(!data.success){
						hideLoader()
						toast(data.message, 'danger');
					}
					else{
						hideLoader()
						let msg = (stats == 'A' ? 'Parts Succesfully activated!' : 'Parts Succesfully deactivated!')
						toast(msg, 'success');
						display_table()
					}
				},
				error: function(response) {
					hideLoader()
					toast(response.responseJSON.message, 'danger');
					forceLogout(response.responseJSON) //if token is expired
				}
			});
		}
	</script>
</body>
</html>