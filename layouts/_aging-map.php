
<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>
	<title> Aging Mapping | RMU </title>
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
								<h4 class="mb-sm-0"  id="header-breadcram"></h4>

								<div class="page-title-right">
									<ol class="breadcrumb m-0">
										<li class="breadcrumb-item"><a href="javascript: void(0);"> Maintenance </a></li>
										<li class="breadcrumb-item active"> Aging Mapping </li>
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
									<h4 class="card-title mb-0 flex-grow-1"> Details </h4>
								</div>
								<div class="card-body containter">
									<div class="col-md-12 mb-3">
										<label class="form-label"> No. Of Days </label>
										<select id="days" class="select-single">
											<option></option>
											<option value="180">0 - 180</option>
											<option value="360">181 - 360</option>
											<option value="720">361 - 720</option>
											<option value="721">721 - Above</option>
										</select>
									</div>
									<div class="col-md-12 mb-3">
										<label class="form-label"> Depreceiation Cost % </label>
										<input id="Depreceiation_Cost" type="number" class="form-control" id="placeholderInput" placeholder="Depreceiation Cost" autocomplete="off" >
									</div>
                                    <div class="col-md-12 mb-3">
										<label class="form-label"> Estimated Cost of MD Parts % </label>
										<input id="Estimated_Cost_of_MD_Parts" type="number" class="form-control" id="placeholderInput" placeholder="Estimated Cost of MD Parts" autocomplete="off" >
									</div>
                                    <div class="col-md-12 mb-3">
										<label class="form-label"> Max Depreciation from Original SP % </label>
										<input id="Max_Depreciation_from_Original_SP" type="number" class="form-control" id="placeholderInput" placeholder="Max Depreciation from Original SP" autocomplete="off" >
									</div>
                                    <div class="col-md-12 mb-3">
										<label class="form-label"> Immediate Sales Value % </label>
										<input id="Immediate_Sales_Value" type="number" class="form-control" id="placeholderInput" placeholder="Immediate Sales Value" autocomplete="off" >
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
									<h4 class="card-title mb-0 flex-grow-1">Aging List </h4>
								</div>
								<div class="card-body">
									<table id="brand-table" class="table table-bordered nowrap align-middle mdl-data-table" style="width:100%">
										<thead>
											<tr>
												<th> No. Of Days </th>
												<th> Depreceiation Cost </th>
												<th> Estimated Cost of MD Parts </th>
												<th> Max Depreciation from Original SP </th>
												<th> Immediate Sales Value </th>
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

		$('#days').change(function(){
			
			let days = $('#days').val()
			if(days == 180){
				$('#Depreceiation_Cost').val(5)
				$('#Estimated_Cost_of_MD_Parts').val(5)
				$('#Max_Depreciation_from_Original_SP').val(10)
				$('#Immediate_Sales_Value').val(90)
			}

			if(days == 360){
				$('#Depreceiation_Cost').val(10)
				$('#Estimated_Cost_of_MD_Parts').val(10)
				$('#Max_Depreciation_from_Original_SP').val(20)
				$('#Immediate_Sales_Value').val(80)
			}

			if(days == 720){
				$('#Depreceiation_Cost').val(15)
				$('#Estimated_Cost_of_MD_Parts').val(10)
				$('#Max_Depreciation_from_Original_SP').val(25)
				$('#Immediate_Sales_Value').val(75)
			}

			if(days == 721){
				$('#Depreceiation_Cost').val(20)
				$('#Estimated_Cost_of_MD_Parts').val(10)
				$('#Max_Depreciation_from_Original_SP').val(30)
				$('#Immediate_Sales_Value').val(70)
			}

		})

		$('#save-brand').click(function(){
			let id = $(this).data('id')
			let url = (id === 0 ? `${baseUrl}/mapAging` : `${baseUrl}/updateAging/`+id)
			
			if($('#days').val() == ''){
				toast('Please select day range', 'danger');
				return false
			}

			showLoader()

			$.ajax({
				url: url, 
				type: 'POST', 
				dataType: 'json',
				headers:{
					'Authorization':`Bearer ${auth.token}`,
				},
				data: { 
					days : $('#days').val(),
					Depreceiation_Cost : $('#Depreceiation_Cost').val(),
					Estimated_Cost_of_MD_Parts : $('#Estimated_Cost_of_MD_Parts').val(),
					Max_Depreciation_from_Original_SP : $('#Max_Depreciation_from_Original_SP').val(),
					Immediate_Sales_Value : $('#Immediate_Sales_Value').val(),
				}, 
				success: function (data) { 
					if(!data.success){
						hideLoader()
						toast(data.message, 'danger');
					}
					else{
						hideLoader()
						let msg = id == 0 ? 'Aging Succesfully added!' : 'Aging Succesfully updated!'
						toast(msg, 'success');
						$('#save-brand').data('id', 0)
						$('#days').val(''),
						$('#Depreceiation_Cost').val(''),
					    $('#Estimated_Cost_of_MD_Parts').val(''),
					    $('#Max_Depreciation_from_Original_SP').val(''),
					    $('#Immediate_Sales_Value').val(''),
						display_table()
					}
				},
				error: function(response) {
					hideLoader()
					toast(response.responseJSON.data, 'danger');
					forceLogout(response.responseJSON) //if token is expired
				}
			});
		});

		async function display_table(){
			const tableData = await $.ajax({
				url: `${baseUrl}/getAging`,
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
					{ data: "days" },
					{ data: "Depreceiation_Cost" },
					{ data: "Estimated_Cost_of_MD_Parts" },
					{ data: "Max_Depreciation_from_Original_SP" },
					{ data: "Immediate_Sales_Value" },
					{ data: null, defaultContent: '',
						fnCreatedCell: function(nTd, sData, oData, iRow, iCol){
							html = `
								<button class="btn btn-sm btn-soft-warning"
									onclick="edit(${ oData.id }, '${ oData.days }', '${ oData.Depreceiation_Cost }', '${ oData.Estimated_Cost_of_MD_Parts }'
									, '${ oData.Max_Depreciation_from_Original_SP }', '${ oData.Immediate_Sales_Value }')"> 
									<i class="ri-edit-box-line"></i> Edit 
								</button> 
							`;
							$(nTd).html(html);
						}
					},
				]
			});
		}

		function edit(id, days, Depreceiation_Cost, Estimated_Cost_of_MD_Parts, Max_Depreciation_from_Original_SP, Immediate_Sales_Value){
			console.log(days)
			// $('#days').val(days)
			$('#days').val(days).trigger('change');
			$('#Depreceiation_Cost').val(Depreceiation_Cost)
			$('#Estimated_Cost_of_MD_Parts').val(Estimated_Cost_of_MD_Parts)
			$('#Max_Depreciation_from_Original_SP').val(Max_Depreciation_from_Original_SP)
			$('#Immediate_Sales_Value').val(Immediate_Sales_Value)
			$('#save-brand').data('id', id)
		}
	</script>
</body>
</html>