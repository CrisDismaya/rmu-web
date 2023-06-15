
<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>
	<title> REPO | RMU </title>
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
								<h4 class="mb-sm-0">Repo Details</h4>
							</div>
						</div>
					</div>

					<div class="row">
						<!-- table -->
						<div class="col-lg-12">
							<div class="card">
								<div class="card-header align-items-center d-flex">
									<h4 class="card-title mb-0 flex-grow-1">List of Repo Details</h4>
									<div class="flex-shrink-0">
										<button type="button" class="btn btn-soft-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="add_receive_units()">
											Add Repo Details
										</button>
									</div>
								</div>
								<div class="card-body">
									<table id="received-unit-table" class="table table-bordered nowrap align-middle mdl-data-table" style="width:100%">
										<thead>
											<tr>
												<th> Customer Id </th>
												<th> Customer Name </th>
												<th> Brand </th>
												<th> Model </th>
												<th> Engine </th>
												<th> Chassis </th>
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

	<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-xl" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="myExtraLargeModalLabel"> Repo Details </h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body container">
					
					<div class="card">
						<div class="card-body checkout-tab">
							<div class="step-arrow-nav mt-n3 mx-n3 mb-3">

								<ul class="nav nav-pills nav-justified custom-nav" role="tablist">
									<li class="nav-item" role="presentation" onclick="button_show_hide('pills-customer-tab')">
										<button class="nav-link fs-15 p-3 active" id="pills-bill-info-tab" data-bs-toggle="pill" data-bs-target="#pills-bill-info" type="button" role="tab" aria-controls="pills-bill-info" aria-selected="false" data-position="0" tabindex="-1">
											<i class="ri-user-2-line fs-16 p-2 bg-soft-primary text-primary rounded-circle align-middle me-2"></i> Customer Info
										</button>
									</li>
									<li class="nav-item" role="presentation" onclick="button_show_hide('pills-unit-details-tab')">
										<button class="nav-link fs-15 p-3 done" id="pills-unit-details-tab" data-bs-toggle="pill" data-bs-target="#pills-bill-address" type="button" role="tab" aria-controls="pills-bill-address" aria-selected="false" data-position="1" tabindex="-1">
											<i class="ri-motorbike-fill fs-16 p-2 bg-soft-primary text-primary rounded-circle align-middle me-2"></i> Unit Details
										</button>
									</li>
									<li class="nav-item" role="presentation" onclick="button_show_hide('pills-other-details-tab')">
										<button class="nav-link fs-15 p-3 done" id="pills-other-details-tab" data-bs-toggle="pill" data-bs-target="#pills-payment" type="button" role="tab" aria-controls="pills-payment" aria-selected="false" data-position="2" tabindex="-1">
											<i class="ri-bank-card-line fs-16 p-2 bg-soft-primary text-primary rounded-circle align-middle me-2"></i> Other Details
										</button>
									</li>
									<li class="nav-item" role="presentation" onclick="button_show_hide('pills-upload-file-tab')">
										<button class="nav-link fs-15 p-3 done" id="pills-upload-file-tab" data-bs-toggle="pill" data-bs-target="#pills-upload-file" type="button" role="tab" aria-controls="pills-upload-file" aria-selected="false" data-position="3" tabindex="-1">
											<i class="ri-file-upload-line fs-16 p-2 bg-soft-primary text-primary rounded-circle align-middle me-2"></i> Upload Files
										</button>
									</li>
								</ul>
							</div>

							<div class="tab-content">
								<div class="tab-pane fade active show" id="pills-bill-info" role="tabpanel" aria-labelledby="pills-bill-info-tab">

									<div>
										<div class="row">
											<div class="col-sm-3">
												<div class="mb-3">
													<label class="form-label"> Acumatica Customer ID </label>
													<select id="customer-acumatica-id" class="select-single-modal"></select>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-sm-3">
												<div class="mb-3">
													<label class="form-label">First Name</label>
													<input type="text" class="form-control" id="customer-first-name" placeholder="Enter first name" autocomplete="off" readonly>
												</div>
											</div>

											<div class="col-sm-3">
												<div class="mb-3">
													<label class="form-label">Middle Name</label>
													<input type="text" class="form-control" id="customer-middle-name" placeholder="Enter middle name" autocomplete="off" readonly>
												</div>
											</div>

											<div class="col-sm-3">
												<div class="mb-3">
													<label class="form-label">Last Name</label>
													<input type="text" class="form-control" id="customer-last-name" placeholder="Enter last name" autocomplete="off" readonly>
												</div>
											</div>

											<div class="col-sm-3">
												<div class="mb-3">
													<label class="form-label">Contact No</label>
													<input type="text" class="form-control" id="customer-contact-no" placeholder="Enter last name" autocomplete="off" readonly>
												</div>
											</div>
										</div>

										<div class="mb-3">
											<label class="form-label">Complete Address</label>
											<textarea class="form-control" id="customer-complete-address" placeholder="Enter complete address" rows="3" autocomplete="off" style="resize:none;" readonly></textarea>
										</div>
									</div>
								</div>
								<!-- end tab pane -->

								<div class="tab-pane fade" id="pills-bill-address" role="tabpanel" aria-labelledby="pills-unit-details-tab">
									<div>
										<div class="row">
											<div class="col-sm-4">
												<div class="mb-3">
													<label class="form-label"> Brand </label>
													<select id="unit-brand" class="select-single-modal"></select>
												</div>
											</div>

											<div class="col-sm-4">
												<div class="mb-3">
													<label class="form-label"> Model </label>
													<select id="unit-model" class="select-single-modal" data-modelid=""></select>
												</div>
											</div>

											<div class="col-sm-4">
												<div class="mb-3">
													<label class="form-label"> Plate Number </label>
													<input id="unit-plate-number" type="text" class="form-control" value="" placeholder="Enter Plate Number" onkeypress="" autocomplete="off">
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-sm-4">
												<div class="mb-3">
													<label class="form-label"> Engine </label>
													<input id="unit-model-engine" type="text" class="form-control" value="" placeholder="Enter Engine" onkeypress="" autocomplete="off">
												</div>
											</div>

											<div class="col-sm-4">
												<div class="mb-3">
													<label class="form-label"> Chassis </label>
													<input id="unit-model-chassis" type="text" class="form-control" value="" placeholder="Enter Chassis" onkeypress="" autocomplete="off">
												</div>
											</div>

											<div class="col-sm-4">
												<div class="mb-3">
													<label class="form-label"> Color </label>
													<select id="unit-color" class="select-single-modal"></select>
												</div>
											</div>

											<div class="col-sm-4">
												<div class="mb-3">
													<label class="form-label"> MV File Number </label>
													<input id="unit-mv-file-number" type="text" class="form-control" value="" placeholder="Enter MV File Number" onkeypress="" autocomplete="off">
												</div>
											</div>

											<div class="col-sm-4">
												<div class="mb-3">
													<label class="form-label"> Type </label>
													<input id="unit-type" type="text" class="form-control" value="" placeholder="Enter Type" onkeypress="" autocomplete="off">
												</div>
											</div>

											<div class="col-sm-4">
												<div class="mb-3">
													<label class="form-label"> Classification </label>
													<select id="unit-classification" class="select-single-modal">
														<option value="">Select Classification</option>
														<option value="A">A</option>
														<option value="B">B</option>
														<option value="C">C</option>
														<option value="D">D</option>
														<option value="E">E</option>
													</select>
													<!-- <input id="unit-classification" type="text" class="form-control" value="" placeholder="Enter Classification" onkeypress="" autocomplete="off"> -->
												</div>
											</div>

											<div class="col-sm-4">
												<div class="mb-3">
													<label class="form-label"> Series </label>
													<input id="unit-series" type="text" class="form-control" value="" placeholder="Enter Series" onkeypress="" autocomplete="off">
												</div>
											</div>

											<div class="col-sm-4">
												<div class="mb-3">
													<label class="form-label"> Body </label>
													<input id="unit-body" type="text" class="form-control" value="" placeholder="Enter Body" onkeypress="" autocomplete="off">
												</div>
											</div>

											<div class="col-sm-4">
												<div class="mb-3">
													<label class="form-label"> Year Model </label>
													<input id="unit-year-model" type="text" class="form-control number-format" value="" maxlength="4" placeholder="Enter Year Model" onkeypress="" autocomplete="off">
												</div>
											</div>

											<div class="col-sm-4">
												<div class="mb-3">
													<label class="form-label"> Gross Vehicle Weight </label>
													<input id="unit-gross-vehicle-weight" type="text" class="form-control" value="" placeholder="Enter Gross Vehicle Weight" onkeypress="" autocomplete="off">
												</div>
											</div>

											<div class="col-sm-4">
												<div class="mb-3">
													<label class="form-label"> Original SRP </label>
													<input id="unit-price" type="text" class="form-control number-format text-end" value="" placeholder="Enter number" onkeypress="" autocomplete="off">
												</div>
											</div>
											
											<div class="col-sm-4">
												<div class="mb-3">
													<label class="form-label"> Date Sold </label>
													<input id="unit-date-sold" type="date" class="form-control" value="" placeholder="Enter Date Sold" onkeypress="" autocomplete="off" >
												</div>
											</div>
										</div>
									</div>

								</div>
								<!-- end tab pane -->

								<div class="tab-pane fade" id="pills-payment" role="tabpanel" aria-labelledby="pills-other-details-tab">
									<div>
										<div class="row">
											<div class="col-sm-4">
												<div class="mb-3">
													<label class="form-label"> Insurer </label>
													<input id="unit-insurer" type="text" class="form-control" value="" placeholder="Enter Insurer" onkeypress="" autocomplete="off">
												</div>
											</div>
											
											<div class="col-sm-4">
												<div class="mb-3">
													<label class="form-label"> Certificate of Cover No. </label>
													<input id="unit-cert-cover-no" type="text" class="form-control" value="" placeholder="Enter Certificate of Cover No." onkeypress="" autocomplete="off">
												</div>
											</div>
											
											<div class="col-sm-4">
												<div class="mb-3">
													<label class="form-label"> Expiry Date </label>
													<input id="unit-expiry-date" type="date" class="form-control" value="" placeholder="Enter Expiry Date" onkeypress="" autocomplete="off" >
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-sm-4">
												<div class="mb-3">
													<label class="form-label"> Encumbered To </label>
													<input id="unit-encumbered-to" type="text" class="form-control" value="" placeholder="Enter Encumbered To" onkeypress="" autocomplete="off">
												</div>
											</div>

											<div class="col-sm-4">
												<div class="mb-3">
													<label class="form-label"> Leased To </label>
													<input id="unit-leased-to" type="text" class="form-control" value="" placeholder="Enter Leased To" onkeypress="" autocomplete="off">
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-sm-4">
												<div class="mb-3">
													<label class="form-label"> Latest OR Number </label>
													<input id="unit-latest-or-number" type="text" class="form-control" value="" placeholder="Enter Latest OR Number" onkeypress="" autocomplete="off">
												</div>
											</div>

											<div class="col-sm-4">
												<div class="mb-3">
													<label class="form-label"> Date of Last Registration </label>
													<input id="unit-date-last-registration" type="date" class="form-control" value="" placeholder="Enter Date of Last Registration" onkeypress="" autocomplete="off">
												</div>
											</div>

											<div class="col-sm-4">
												<div class="mb-3">
													<label class="form-label"> Amount Paid </label>
													<input id="unit-amount-paid" type="text" class="form-control number-format text-end" value="" placeholder="Enter Amount Paid" onkeypress="" autocomplete="off">
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-sm-4">
												<div class="mb-3">
													<label class="form-label"> Date of Surrender </label>
													<input id="unit-date-surrender" type="date" class="form-control" value="" placeholder="Enter Encumbered To" onkeypress="" autocomplete="off">
												</div>
											</div>
											
											<div class="col-sm-4">
												<div class="mb-3">
													<label class="form-label"> MSuisva Form # </label>
													<input id="unit-msuisva-form" type="text" class="form-control" value="" placeholder="Enter MSuisva Form" onkeypress="" autocomplete="off">
												</div>
											</div>
										</div>

									</div>
								</div>
								<!-- end tab pane -->

								<div class="tab-pane fade" id="pills-upload-file" role="tabpanel" aria-labelledby="pills-upload-file-tab">
									<div>
										<div class="row">
											<div class="col-lg-12 text-end mb-2">
												<button type="button" id="append-new-upload" class="btn btn-sm btn-info btn-label">
													<i class="ri-image-add-line label-icon align-middle fs-16 me-2"></i> 
													Add upload
												</button>
											</div>

											<input type="hidden" id="append-counter" value="1">
											<div id="append-upload-section" class="row"></div>
										</div>
									</div>
								</div>
								<!-- end tab pane -->

							</div>
							<!-- end tab content -->
						</div>
						<!-- end card body -->
					</div>
				</div>
				<div class="modal-footer btn-save-footer">
					<a href="javascript:void(0);" class="btn btn-link link-success fw-medium" data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i> Close</a>
					<button id="save-details" data-id="0" type="button" class="btn btn-primary" data-receive-unit-id="0">Save changes</button>
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
		var color_id = '', counter = 0, file_count = [];
		$(document).ready(function(){
			display_table()
			fetch_brand_list()
         fetch_customer_profile_list()
			fetch_list_of_image('0')
			// fetch_color_list()
		 
			$('#customer-acumatica-id').change(function(e){
				e.preventDefault();
				var id = $(this).val();

				if(id != ''){
					fetch_customer_profile_list_id(id)
				}
				else{
					$('#customer-first-name').val('')
					$('#customer-middle-name').val('')
					$('#customer-last-name').val('')
					$('#customer-contact-no').val('')
					$('#customer-complete-address').val('')
				}
			});
			
			$('#unit-model').prop('disabled', true);
			$('#unit-brand').change(function(e){
				e.preventDefault()
				var brand_id = $(this).val()

				if(brand_id != ''){
					fetch_model_list(brand_id)
					$('#unit-model').prop('disabled', false);
				}
				else{
					$('#unit-model').empty();
					$('#unit-model').prop('disabled', true);
				}
			});

			$('#unit-model').change(function(e){
				e.preventDefault()
				var model_id = $(this).val();
				if(model_id != ''){
					fetch_color_list(model_id, color_id)
					$('#unit-color').prop('disabled', false);
				}
				else{
					$('#unit-color').empty();
					$('#unit-color').prop('disabled', true);
				}
			});

			$('#append-new-upload').click(function(e){
				e.preventDefault()
				counter++
				
				// accept="image/png, image/jpg, image/jpeg"
				$('#append-upload-section').prepend(`
					<div class="col-sm-3" id="append-item-${ counter }">
						<figure class="figure mb-2">
							<img  src="../assets/images/small/img-4.jpg" class="figure-img img-thumbnail rounded" alt="..." id="input-file-${ counter }-preview" onclick="document.getElementById('input-file-${ counter }').click();">
							<input type="file" id="input-file-${ counter }" class="form-control d-none"  onchange="preview_photo(this.id)">
							<figcaption class="figure-caption input-group input-group-sm">
								<div class="input-group">
									<select class="form-select form-select-sm" id="seleted-image-${ counter }" aria-label="Example select with button addon">
										<option value=""> Select </option>
									</select>
									<button class="btn btn-sm btn-info bg-gradient waves-effect waves-light" type="button" onclick="view_image(${ counter })" >
										<i class="ri-image-line label-icon align-middle"></i> 
									</button>
									<button class="btn btn-sm btn-danger bg-gradient waves-effect waves-light" type="button" onclick="remove_image(${ counter })">
										<i class="ri-delete-bin-line label-icon align-middle"></i>
									</button>
								</div>
							</figcaption>
						</figure>
					</div>
				`);

				$('#append-counter').val(counter);
				fetch_list_of_image(counter)
			});

			$('#save-details').click(function(event){
				event.preventDefault();
				$('#save-details').prop('disabled', true);

				var pictues = [];
				var id = $(this).data('receive-unit-id')
				var url = (id == 0 ? `${ baseUrl }/createRepo` : `${ baseUrl }/updateRepo/${ id }`)

				showLoader()

				// console.log(`${ id } - ${ url }`)
				var from_data = new FormData();
				from_data.append('customer_acumatica_id', $('#customer-acumatica-id').val());
				from_data.append('brand_id', $('#unit-brand').val());
				from_data.append('model_id', $('#unit-model').val());
				from_data.append('plate_number', $('#unit-plate-number').val().toUpperCase());
				from_data.append('model_engine', $('#unit-model-engine').val().toUpperCase());
				from_data.append('model_chassis', $('#unit-model-chassis').val().toUpperCase());
				from_data.append('color_id', $('#unit-color').val());
				from_data.append('mv_file_number', $('#unit-mv-file-number').val());
				from_data.append('type', $('#unit-type').val());
				from_data.append('classification', $('#unit-classification').val().toUpperCase());
				from_data.append('series', $('#unit-series').val());
				from_data.append('body', $('#unit-body').val().toUpperCase());
				from_data.append('year_model', $('#unit-year-model').val());
				from_data.append('gross_vehicle_weight', $('#unit-gross-vehicle-weight').val());
				from_data.append('original_srp', $('#unit-price').val());
				from_data.append('date_sold', $('#unit-date-sold').val());
				from_data.append('insurer', $('#unit-insurer').val().toUpperCase());
				from_data.append('cert_cover_no', $('#unit-cert-cover-no').val());
				from_data.append('expiry_date', $('#unit-expiry-date').val());
				from_data.append('encumbered_to', $('#unit-encumbered-to').val());
				from_data.append('leased_to', $('#unit-leased-to').val());
				from_data.append('latest_or_number', $('#unit-latest-or-number').val());
				from_data.append('date_last_registration', $('#unit-date-last-registration').val());
				from_data.append('amount_paid', $('#unit-amount-paid').val());
				from_data.append('date_surrender', $('#unit-date-surrender').val());
				from_data.append('msuisva_form_no', $('#unit-msuisva-form').val());
				from_data.append('append_count', parseInt($('#append-counter').val()));
				from_data.append('module_id', parseInt($('#moduleid').val()));

				$('#save-details').prop('disabled', false);
				var append_count = parseInt($('#append-counter').val())
				for (let i = 1; i <= append_count; i++) {
					var isExists = $(`#seleted-image-${ i }`).val() != undefined ? true : false;
					var file = $(`#input-file-${ i }`)[0].files[0];

					if(typeof file !== 'undefined'){ // to check if the append is deleted
						from_data.append(`image_${ i }`, $(`#input-file-${ i }`)[0].files[0]);
						from_data.append(`image_id_${ i }`, $(`#seleted-image-${ i }`).val());
						from_data.append(`image_name_${ i }`, $(`#seleted-image-${ i } option:selected`).text());
					}
				}

				// for (var pair of from_data.entries()) {
				// 	console.log(pair[0]+ ', ' + pair[1]); 
				// }
				
				$.ajax({
					url: url, 
					type: 'POST', 
					headers:{
						'Authorization':`Bearer ${ auth.token }`,
					},
					data : from_data,
					processData: false,
					contentType: false,
					success: function (data) { 
						// console.log(data)
						if(!data.success){
							toast(data.message, 'danger');
							hideLoader()
						}
						else{
							let msg = id == 0 ? 'Received Unit Succesfully added!' : 'Received Unit Succesfully updated!'
							toast(msg, 'success');
							$('#staticBackdrop').modal('hide')
                     display_table()
							add_receive_units()
							hideLoader()
						}
						
						$('#save-details').prop('disabled', false);
					},
					error: function(response) {
						hideLoader()
						$('#save-details').prop('disabled', false);
						toast(response.responseJSON.message, 'danger');
					}
				});

			});
		});

		async function display_table(){
			const tableData = await $.ajax({
				url: `${ baseUrl }/repo`,
				method: 'GET',
				dataType: 'json',
				headers:{
					'Authorization':`Bearer ${ auth.token }`,
				}
			});

			$("#received-unit-table").DataTable().destroy();
			$("#received-unit-table").DataTable({
				deferRender: true,
				searching: true,
				scrollY: 400,
		  		scrollX: true,
				scrollCollapse: true,
				paging: false,
				data: tableData,
				columns: [
					{ data: "acumatica_id" },
					{ data: "customer_name" },
					{ data: "brandname" },
					{ data: "model_name" },
					{ data: "model_engine" },
					{ data: "model_chassis" },
					{ data: null, defaultContent: '',
						fnCreatedCell: function(nTd, sData, oData, iRow, iCol){
							html = `
								<button class="btn btn-sm btn-soft-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
									onclick="edit(${ oData.id })"> 
									<i class="ri-edit-box-line"></i> Edit 
								</button> 
							`;
							$(nTd).html(html);
						}
					},
				]
			});
		}

		function add_receive_units(){
			fetch_color_list(0)
			$('#save-details').data('receive-unit-id', 0);
			$('.btn-save-footer').hide()
			
			$('#customer-acumatica-id').val('').trigger('change')
			$('#customer-first-name').val('')
			$('#customer-middle-name').val('')
			$('#customer-last-name').val('')
			$('#customer-contact-no').val('')
			$('#customer-complete-address').val('')

			$('#unit-brand').val('').trigger('change')
			$('#unit-model').empty().append(`<option value=""> No Available Data </option>`)
         $('#unit-plate-number').val('')
			$('#unit-model-engine').val('')
			$('#unit-model-chassis').val('')
         $('#unit-color').val('').trigger('change')
         $('#unit-mv-file-number').val('')
         $('#unit-type').val('')
         $('#unit-classification').val('').trigger('change')
         $('#unit-series').val('')
         $('#unit-body').val('')
         $('#unit-year-model').val('')
         $('#unit-gross-vehicle-weight').val('')
			$('#unit-price').val('')
         $('#unit-date-sold').val('')
         $('#unit-insurer').val('')
         $('#unit-cert-cover-no').val('')
         $('#unit-expiry-date').val('')
         $('#unit-encumbered-to').val('')
         $('#unit-leased-to').val('')
         $('#unit-latest-or-number').val('')
         $('#unit-date-last-registration').val('')
         $('#unit-amount-paid').val('')
         $('#unit-date-surrender').val('')
         $('#unit-msuisva-form').val('')

			$('#append-counter').val(0)
			counter = 0;

			$('#append-upload-section').empty()
			$('#append-existing-upload-section').empty()
		}
		
		function button_show_hide(tab_id){
			if(tab_id == 'pills-upload-file-tab'){
				$('.btn-save-footer').show()
			}
			else {
				$('.btn-save-footer').hide()
			}
		}

		function fetch_list_of_image(counter, files_id = ''){
			$.ajax({
				url: `${ baseUrl }/list_of_files`, 
				type: 'GET', 
				headers:{
					'Authorization':`Bearer ${ auth.token }`,
				},
				success: function (data) {
					$(`#seleted-image-${ counter }`).empty();

					if(data.length > 0){
						$(`#seleted-image-${ counter }`).append(`<option value=""> Select Image </option>`);
						for (let i = 0; i < data.length; i++) {
							const el = data[i];
							$(`#seleted-image-${ counter }`).append(`<option value="${ el.id }">${ el.filename }</option>`);
						}
					}
					else{
						$(`#seleted-image-${ counter }`).append(`<option value=""> No Available Data </option>`);
					}
					$(`#seleted-image-${ counter }`).val(files_id).trigger('change');
				},
				error: function(response) {
					toast(response.responseJSON.message, 'danger');
				}
			});
		}

		function view_image(counter){
			var isEmpty = $(`#input-file-${ counter }`).val()
			var item_id = $(`#seleted-image-${ counter }`).val()
			var item_text = $(`#seleted-image-${ counter } option:selected`).text()
			var item_source = $(`#input-file-${ counter }-preview`).attr('src')

			if(item_id == ''){
				toast('Select the Image Name', 'warning')
			}
			else if(item_source == ''){
				toast('Upload the image first', 'warning')
			}
			else{
				$('#modal-preview').modal('show')
				$('#image-selected-preview').attr('src', item_source)
			}
		}

		function remove_image(counter, deleted_id = 0){
			if(deleted_id > 0){
				$.ajax({
					url: `${ baseUrl }/repoDeleteFiles/${ deleted_id }`, 
					type: 'GET', 
					headers:{
						'Authorization':`Bearer ${ auth.token }`,
					},
					success: function (data) {
						$(`#append-item-${ counter }`).remove();
						toast(`File ${ data } Successfully Deleted`, 'success');
					}
				});
			}
			else {
				$(`#append-item-${ counter }`).remove();
			}
		}

		function preview_photo(previewid){
			if(previewid != ''){
				const file = $(`#${ previewid }`)[0].files[0];
				// console.log(file.name);
				if (file){

					var string = file.name.split('.')
					var extension = string[string.length - 1].toLowerCase();
					var image_extension = ['jpg', 'jpeg', 'png'];
					var image_source = '';

					let reader = new FileReader();
					reader.onload = function(event){

						if(image_extension.indexOf(extension) !== -1){
							image_source = event.target.result;
						}
						else if(extension == 'pdf'){
							image_source = '../assets/images/small/default-pdf.png';
						}
						else if(extension == 'docx'){
							image_source = '../assets/images/small/default-docs.png';
						}
						else if(extension == 'xlsx'){
							image_source = '../assets/images/small/default-xlsx.png';
						}
						else{
							image_source = '../assets/images/small/img-1.jpg';
						}
						$(`#${ previewid }-preview`).attr('src', image_source);
					}
					reader.readAsDataURL(file);
				}
			}
		}

		function fetch_customer_profile_list(){
			$.ajax({
				url: `${ baseUrl }/customerProfile`, 
				type: 'GET', 
				headers:{
					'Authorization':`Bearer ${ auth.token }`,
				},
				success: function (data) {
					$('#customer-acumatica-id').empty();

					if(data.length > 0){
						$('#customer-acumatica-id').append(`<option value=""> Choose Customer </option>`);
						for (let i = 0; i < data.length; i++) {
							const el = data[i];
							$('#customer-acumatica-id').append(`<option value="${ el.id }">${ el.customer_name }</option>`);
						}
					}
					else{
						$('#customer-acumatica-id').append(`<option value=""> No Available Data </option>`);
					}
					$('#customer-acumatica-id').val('').trigger('change');
				},
				error: function(response) {
					toast(response.responseJSON.message, 'danger');
				}
			});
		}

		function fetch_customer_profile_list_id(id){
			$.ajax({
				url: `${ baseUrl }/customerProfilePerId/${ id }`, 
				type: 'GET', 
				headers:{
					'Authorization':`Bearer ${ auth.token }`,
				},
				success: function (data) {
					// $('#customer-acumatica-id').val('').trigger('change')
					$('#customer-first-name').val(data.firstname)
					$('#customer-middle-name').val(data.middlename)
					$('#customer-last-name').val(data.lastname)
					$('#customer-contact-no').val(data.contact)
					$('#customer-complete-address').val(data.address)
				},
				error: function(response) {
					toast(response.responseJSON.message, 'danger');
				}
			});
		}
		
		function fetch_brand_list(brandid){
			$.ajax({
				url: `${ baseUrl }/brands`, 
				type: 'GET', 
				headers:{
					'Authorization':`Bearer ${ auth.token }`,
				},
				success: function (data) {
					$('#unit-brand').empty();

					if(data.length > 0){
						$('#unit-brand').append(`<option value=""> Choose Brand </option>`);
						for (let i = 0; i < data.length; i++) {
							const el = data[i];
							$('#unit-brand').append(`<option value="${ el.id }">${ el.brandname }</option>`);
						}
					}
					else{
						$('#unit-brand').append(`<option value=""> No Available Data </option>`);
					}
					$('#unit-brand').val((brandid != '' ? brandid : '')).trigger('change');
				},
				error: function(response) {
					toast(response.responseJSON.message, 'danger');
				}
			});
		}

		function fetch_model_list(brandid){
			$.ajax({
				url: `${ baseUrl }/modelPerBrand/${ brandid }`, 
				type: 'GET', 
				dataType: 'json',
				headers:{
					'Authorization':`Bearer ${ auth.token }`,
				},
				success: function (data) { 
					$('#unit-model').empty();

					if(data.length > 0){
						$('#unit-model').append(`<option value=""> Choose Model </option>`);
						for (let i = 0; i < data.length; i++) {
							const el = data[i];
							$('#unit-model').append(`<option value="${ el.id }">${ el.model_name }</option>`);
						}
					}
					else{
						$('#unit-model').append(`<option value=""> No Available Data </option>`);
					}
					$('#unit-model').val('').trigger('change')
				},
				error: function(response) {
					toast(response.responseJSON.message, 'danger');
				}
			});
		}

		function fetch_branch_with_model(brandid,modelid){
			$.ajax({
				url: `${ baseUrl }/modelPerBrand/${ brandid }`, 
				type: 'GET', 
				dataType: 'json',
				headers:{
					'Authorization':`Bearer ${ auth.token }`,
				},
				success: function (data) { 
					$('#unit-model').empty();

					if(data.length > 0){
						$('#unit-model').append(`<option value=""> Choose Model </option>`);
						for (let i = 0; i < data.length; i++) {
							const el = data[i];
							$('#unit-model').append(`<option value="${ el.id }">${ el.model_name }</option>`);
						}
					}
					else{
						$('#unit-model').append(`<option value=""> No Available Data </option>`);
					}
					$('#unit-model').val(modelid).trigger('change')
				},
				error: function(response) {
					toast(response.responseJSON.message, 'danger');
				}
			});
		}

		function fetch_color_list(model_id, color_id = ''){
			$.ajax({
				url: `${ baseUrl }/getMapColor/${model_id}`, 
				type: 'GET', 
				headers:{
					'Authorization':`Bearer ${ auth.token }`,
				},
				success: function (data) { 
					$('#unit-color').empty();

					if(data.length > 0){
						$('#unit-color').append(`<option value=""> Choose Color </option>`);
						for (let i = 0; i < data.length; i++) {
							const el = data[i];
							$('#unit-color').append(`<option value="${ el.id }">${ el.name }</option>`);
						}
					}
					else{
						$('#unit-color').append(`<option value=""> No Available Data </option>`);
					}
					$('#unit-color').val(color_id).trigger('change');
				},
				error: function(response) {
					toast(response.responseJSON.message, 'danger');
				}
			});
		}

		function edit(id){
			$('#save-details').data('receive-unit-id', id);
			var moduleid = parseInt($('#moduleid').val());
			$.ajax({
				url: `${ baseUrl }/repoDetailsPerId/${ id }/${ moduleid }`, 
				type: 'GET', 
				headers:{
					'Authorization':`Bearer ${ auth.token }`,
				},
				success: function (data) {
					// console.log(data)
					$('#customer-acumatica-id').val(data.customer_acumatica_id).trigger('change')
					$('#unit-brand').val(data.brand_details.id).trigger('change')
			   	fetch_branch_with_model(data.brand_details.id, data.model_id)

               $('#unit-plate-number').val(data.plate_number)
               $('#unit-model-engine').val(data.model_engine)
					color_id = data.color_id;

               $('#unit-model-chassis').val(data.model_chassis)
               $('#unit-color').val(data.color_id).trigger('change')
					
               $('#unit-mv-file-number').val(data.mv_file_number)
               $('#unit-type').val(data.type)
               $('#unit-classification').val(data.classification)
               $('#unit-series').val(data.series)
               $('#unit-body').val(data.body)
               $('#unit-year-model').val(data.year_model)
               $('#unit-gross-vehicle-weight').val(data.gross_vehicle_weight)
               $('#unit-price').val(roundOf(data.original_srp))

               $('#unit-date-sold').val(data.date_sold)
               
               $('#unit-insurer').val(data.insurer)
               $('#unit-cert-cover-no').val(data.cert_cover_no)
               $('#unit-expiry-date').val(data.expiry_date)
               $('#unit-encumbered-to').val(data.encumbered_to)
               $('#unit-leased-to').val(data.leased_to)
               $('#unit-latest-or-number').val(data.latest_or_number)
               $('#unit-date-last-registration').val(data.date_last_registration)
               $('#unit-amount-paid').val(roundOf(data.amount_paid))
               $('#unit-date-surrender').val(data.date_surrender)
					$('#unit-msuisva-form').val(data.msuisva_form_no)

					var filesJson = data.picture_details;
					$('#append-upload-section').empty()
					var image_path = `${ baseUrl.replace('/api', '') }`;
					
					for (let i = 0; i < filesJson.length; i++) {
						const el = filesJson[i];
						
						var append_count = i + 1;
						var string = el.path.split('.')
						var extension = string[string.length - 1].toLowerCase();
						var image_extension = ['jpg', 'jpeg', 'png'];
						var image_source = '';

						if(image_extension.indexOf(extension) !== -1){
							image_source = image_path +'/'+ el.path;
						}
						else if(extension == 'pdf'){
							image_source = '../assets/images/small/default-pdf.png';
						}
						else if(extension == 'docx'){
							image_source = '../assets/images/small/default-docs.png';
						}
						else if(extension == 'xlsx'){
							image_source = '../assets/images/small/default-xlsx.png';
						}
						else{
							image_source = '../assets/images/small/img-1.jpg';
						}
						
						$('#append-upload-section').append(`
							<div class="col-sm-3" id="append-item-${ append_count }">
								<figure class="figure mb-2">
									<img  src="${ image_source }" class="figure-img img-thumbnail rounded" alt="..." id="input-file-${ append_count }-preview" onclick="document.getElementById('input-file-${ append_count }').click();">
									<input type="file" id="input-file-${ append_count }" class="form-control d-none"  onchange="preview_photo(this.id)" disabled>
									<figcaption class="figure-caption input-group input-group-sm">
										<div class="input-group">
											<select class="form-select form-select-sm" id="seleted-image-${ append_count }" aria-label="Example select with button addon" disabled>
												<option value=""> Select </option>
											</select>
											<button class="btn btn-sm btn-info bg-gradient waves-effect waves-light" id="picture-view-${ append_count }" type="button" onclick="view_image(${ append_count })"  style="display:${ image_extension.indexOf(extension) !== -1 ? 'block' : 'none' };">
												<i class="ri-image-line label-icon align-middle"></i> 
											</button>
											<a role="button" class="btn btn-sm btn-info bg-gradient waves-effect waves-light" id="download-file-${ append_count }" href="${ image_source }" download style="display:${ image_extension.indexOf(extension) !== -1 ? 'none' : 'block' };">
												<i class="ri-download-2-line label-icon align-middle"></i> 
											</a>
											<button class="btn btn-sm btn-danger bg-gradient waves-effect waves-light" type="button" onclick="remove_image(${ append_count }, ${ el.id })">
												<i class="ri-delete-bin-line label-icon align-middle"></i>
											</button>
										</div>
									</figcaption>
								</figure>
							</div>
						`)

						fetch_list_of_image(append_count, el.files_id)
					}
					counter = filesJson.length
					$('#append-counter').val(`${ filesJson.length }`);
					
				}
			});
		}
	</script>
</body>
</html>