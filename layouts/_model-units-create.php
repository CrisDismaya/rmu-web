
<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>
	<title> Model Management | RMU </title>
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
								<h4 class="mb-sm-0">Model Management</h4>

								<div class="page-title-right">
									<ol class="breadcrumb m-0">
										<li class="breadcrumb-item"><a href="javascript: void(0);"> Maintenance </a></li>
										<li class="breadcrumb-item active"> Model Management </li>
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
									<h4 class="card-title mb-0 flex-grow-1"> Model </h4>
								</div>
								<div class="card-body containter">
									<div class="col-md-12 mb-3">
										<label class="form-label"> Choose Brand </label>
										<select id="model-brand" class="select-single">
										</select>
									</div>
									<div class="col-md-12 mb-3">
										<label class="form-label"> Inventory Code </label>
										<input id="inv-code" type="text" class="form-control"  placeholder="Inventory Code" autocomplete="off">
									</div>
									<div class="col-md-12 mb-3">
										<label class="form-label"> Enter Model Name </label>
										<input id="brand-name" type="text" class="form-control" id="placeholderInput" placeholder="Brand Name" autocomplete="off">
									</div>
									<hr />
									<div class="col-md-12 mb-3">
										<label class="form-label">Available Colors | <a href='#' data-bs-toggle="modal" data-bs-target="#staticBackdrop">+ Add</a></label>
										<ul id="color-list">

										</ul>
									</div>
									<div class="col-md-12">
										<div class="d-grid gap-2" >
											<button id="save-model" type="button" class="btn btn-primary" data-id="0">
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
									<h4 class="card-title mb-0 flex-grow-1"> List of Model </h4>
									
								</div>
								<div class="card-body">
									<table id="model-table" class="table table-bordered nowrap align-middle mdl-data-table" style="width:100%">
										<thead>
											<tr>
												<th> Inventory Code </th>
												<th> Brand </th>
												<th> Model </th>
												<th> Color </th>
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
			<!---modal color selection--->
			<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
							<div class="modal-dialog modal-lg" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="myExtraLargeModalLabel">Available Colors</h5>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
								
										<div class="modal-body container" >
											<div class="row">
												<div class="col-12 mb-3">
													<label class="form-label">Choose Color</label>
													<select id="model-color" class="select-single"></select>
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<a href="javascript:void(0);" class="btn btn-link link-success fw-medium" data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i> Close</a>
											<button id="add-color" data-id="0" type="button" class="btn btn-primary">Add Color</button>
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
		fetch_brand_data();
		fetch_color_data();
		display_table();

		var available_colors = []
	
		$('#add-color').click(function(){
			let color = $('#model-color').select2('data')[0].text
			let val = $('#model-color').select2().val()
			let colors = ''

			available_colors.push({
				'color_name':color,
				'value':val
			})

			for(let i = 0; i < available_colors.length; i++){
				
				colors += `<li>${available_colors[i].color_name} &nbsp;&nbsp; 
							<b><span onclick="removeColor(${available_colors[i].value})" title="Remove Color" style="color:red;cursor:pointer;">X</span></b>
						</li>`
			}

			$('#color-list').html(colors)
			$('#model-color').val("").trigger("change")
			$('#staticBackdrop').modal('hide')
		})

		function removeColor(item){
			
			let colors = ''
			let tmp = available_colors.filter(d => { return d.value != item})
			
			available_colors = tmp
			for(let i = 0; i < available_colors.length; i++){
				colors += `<li>${available_colors[i].color_name} &nbsp;&nbsp; 
							<b><span onclick="removeColor(${available_colors[i].value})" title="Remove Color" style="color:red;cursor:pointer;">X</span></b>
						</li>`
			}

			$('#color-list').html(colors)
		}

		$('#save-model').click(function(){
			let id = $(this).data('id')
			let url = (id === 0 ? `${baseUrl}/createModel` : `${baseUrl}/updateModel/`+id)

			if($('#model-brand').val() == ''){
				toast('Please Select Brand for the model!', 'danger');
				return false
			}

			if($('#brand-name').val() == ''){
				toast('Model Name is Required!', 'danger');
				return false
			}

			if(available_colors.length == 0){
				toast('Please Add Available Colors for the model!', 'danger');
				return false
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
					brand_id : $('#model-brand').val(),
					model_name : $('#brand-name').val(),
					colors : available_colors,
					code:$('#inv-code').val()
				}, 
				success: function (data) { 
					console.log(data)
					if(!data.success){
						hideLoader()
						toast(data.message, 'danger');
					}
					else{

						hideLoader()
						let msg = id == 0 ? 'Model Succesfully added!' : 'Model Succesfully updated!'
						toast(msg, 'success');
						$('#save-model').data('id', 0)
						$('#model-brand').val('').trigger('change');
						$('#model-name').val('');
						$('#brand-name').val('')
						$('#inv-code').val('')
						$('#model-color').val('').trigger('change');
						available_colors = []
						$('#color-list').html('')
						display_table()
					}
				},
				error: function(response) {
					hideLoader()
					toast(response.responseJSON.message, 'danger');
				}
			});
		});

		function fetch_brand_data(){
			$.ajax({
				url: `${baseUrl}/brands`, 
				type: 'GET', 
				headers:{
					'Authorization':`Bearer ${ auth.token }`,
				},
				success: function (data) {
					$('#model-brand').empty();

					if(data.length > 0){
						$('#model-brand').append(`<option value=""> Choose Brand </option>`);
						for (let i = 0; i < data.length; i++) {
							const el = data[i];
							$('#model-brand').append(`<option value="${ el.id }">${ el.brandname }</option>`);
						}
					}
					else{
						$('#model-brand').append(`<option value=""> No Available Data </option>`);
					}
				},
				error: function(response) {
					toast(response.responseJSON.message, 'danger');
				}
			});
		}

		function fetch_color_data(){
			$.ajax({
				url: `${baseUrl}/colors`, 
				type: 'GET', 
				headers:{
					'Authorization':`Bearer ${ auth.token }`,
				},
				success: function (data) {
					$('#model-color').empty();

					if(data.length > 0){
						$('#model-color').append(`<option value=""> Choose Color </option>`);
						for (let i = 0; i < data.length; i++) {
							const el = data[i];
							$('#model-color').append(`<option value="${ el.id }">${ el.name }</option>`);
						}
					}
					else{
						$('#model-color').append(`<option value=""> No Available Data </option>`);
					}
				},
				error: function(response) {
					toast(response.responseJSON.message, 'danger');
				}
			});
		}

		async function display_table(){
			const tableData = await $.ajax({
				url: `${baseUrl}/models`,
				method: 'GET',
				dataType: 'json',
				headers:{
					'Authorization':`Bearer ${ auth.token }`,
				}
			});

			$("#model-table").DataTable().destroy();
			$("#model-table").DataTable({
				deferRender: true,
				searching: true,
				scrollY: 400,
		  		scrollX: true,
				scrollCollapse: true,
				paging: false,
				data: tableData,
				columns: [
					{ data: "inventory_code" },
					{ data: null, defaultContent: '',
						fnCreatedCell: function(nTd, sData, oData, iRow, iCol){
						
							html = `
								<span>${oData.brands[0].brandname}</span>
							`;
							$(nTd).html(html);
						}
					},
					{ data: "model_name" },
					{ data: null, defaultContent: '',
						fnCreatedCell: function(nTd, sData, oData, iRow, iCol){
							let color = ''
							for(let i = 0; i < oData.colors.length; i++){
								if(oData.colors.length == i+1){
									color += ` ${oData.colors[i].color_name.name} `
								}else{
									color += ` ${oData.colors[i].color_name.name} ,`
								}
							}
							html = color;
							$(nTd).html(html);
						}
					},
					{ data: null, defaultContent: '',
						fnCreatedCell: function(nTd, sData, oData, iRow, iCol){
							
							html = `
								<button class="btn btn-sm btn-soft-warning"
									onclick="edit(${ oData.id }, '${ oData.brand_id }', '${ oData.model_name }','${oData.inventory_code}')"> 
									<i class="ri-edit-box-line"></i> Edit 
								</button> 
							`;
							$(nTd).html(html);
						}
					},
				]
			});
		}

		function edit(id, brandid, name,code){

			$.ajax({
				url: `${baseUrl}/getMapColor/${id}`, 
				type: 'GET', 
				headers:{
					'Authorization':`Bearer ${ auth.token }`,
				},
				success: function (data) {
					available_colors = []
					for(let i = 0; i < data.length; i++){
						available_colors.push({
							'color_name':data[i].name,
							'value':data[i].id
						})
					}

						let colors = ''
						for(let i = 0; i < available_colors.length; i++){
							
							colors += `<li>${available_colors[i].color_name} &nbsp;&nbsp; 
										<b><span onclick="removeColor(${available_colors[i].value})" title="Remove Color" style="color:red;cursor:pointer;">X</span></b>
									</li>`
						}

						$('#color-list').html(colors)
				},
				error: function(response) {
					toast(response.responseJSON.message, 'danger');
				}
			});
			$('#inv-code').val(code)
			$('#model-brand').val(brandid).trigger('change')
			$('#brand-name').val(name)
			//$('#model-color').val(colorid).trigger('change')
			$('#save-model').data('id', id)
		}
	</script>
</body>
</html>