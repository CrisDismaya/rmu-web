<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>
	<title> Received Unit | RMU </title>
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
								<h4 class="mb-sm-0" id="header-breadcram">Receiving of Units</h4>
							</div>
						</div>
					</div>

					<div class="row">
						<!-- table -->
						<div class="col-lg-12">
							<div class="card">
								<div class="card-header align-items-center d-flex">
									<h4 class="card-title mb-0 flex-grow-1">List of Received Units</h4>
									<!-- <div class="flex-shrink-0">
										<button type="button" class="btn btn-soft-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="add_receive_units()">
											Add Receive Units
										</button>
									</div> -->
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

	<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-xl" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="myExtraLargeModalLabel"> Received Unit </h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body container">
					
					<div class="card mb-0">
						<div class="card-body checkout-tab">
							<div class="step-arrow-nav mt-n3 mx-n3 mb-3">

								<ul class="nav nav-pills nav-justified custom-nav" role="tablist">
									<!-- <li class="nav-item" role="presentation" onclick="button_show_hide('pills-customer-tab')">
										<button class="nav-link fs-15 p-3 active" id="pills-customer-info-tab" data-bs-toggle="pill" data-bs-target="#pills-customer-info" type="button" role="tab" aria-controls="pills-customer-info" aria-selected="false" data-position="0" tabindex="-1">
											<i class="ri-user-2-line fs-16 p-2 bg-soft-primary text-primary rounded-circle align-middle me-2"></i> Customer Info History
										</button>
									</li> -->
									<li class="nav-item" role="presentation" onclick="button_show_hide('pills-unit-details-tab')">
										<button class="nav-link fs-15 p-3 active" id="pills-unit-details-tab" data-bs-toggle="pill" data-bs-target="#pills-bill-address" type="button" role="tab" aria-controls="pills-bill-address" aria-selected="false" data-position="1" tabindex="-1">
											<i class="ri-motorbike-fill fs-16 p-2 bg-soft-primary text-primary rounded-circle align-middle me-2"></i> Unit Details
										</button>
									</li>
									<li class="nav-item" role="presentation" onclick="button_show_hide('pills-upload-image-tab')">
										<button class="nav-link fs-15 p-3 done" id="pills-upload-image-tab" data-bs-toggle="pill" data-bs-target="#pills-upload-image" type="button" role="tab" aria-controls="pills-upload-image" aria-selected="false" data-position="1" tabindex="-1">
											<i class="ri-motorbike-fill fs-16 p-2 bg-soft-primary text-primary rounded-circle align-middle me-2"></i> Upload Image
										</button>
									</li>
									<li class="nav-item" role="presentation" onclick="button_show_hide('pills-spare-parts-tab')">
										<button class="nav-link fs-15 p-3 done" id="pills-spare-parts-tab" data-bs-toggle="pill" data-bs-target="#pills-payment" type="button" role="tab" aria-controls="pills-payment" aria-selected="false" data-position="2" tabindex="-1">
											<i class="ri-bank-card-line fs-16 p-2 bg-soft-primary text-primary rounded-circle align-middle me-2"></i> Missing and Damaged Parts
										</button>
									</li>
								</ul>
							</div>

							<div class="tab-content">
								<!-- <div class="tab-pane fade active show" id="pills-customer-info" role="tabpanel" aria-labelledby="pills-customer-info-tab">
									customer info
								</div> -->
								<!-- end tab pane -->
								<!--  -->
								
								<div class="tab-pane fade active show" id="pills-bill-address" role="tabpanel" aria-labelledby="pills-unit-details-tab">
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
													<select id="unit-model" class="select-single-modal"></select>
												</div>
											</div>

											<div class="col-sm-4">
												<div class="mb-3">
													<label class="form-label"> Plate Number </label>
													<input id="unit-plate" type="text" class="form-control" readonly>
												</div>
											</div>

											<div class="col-sm-4">
												<div class="mb-3">
													<label class="form-label"> Engine </label>
													<input id="unit-engine" type="text" class="form-control" readonly>
												</div>
											</div>

											<div class="col-sm-4">
												<div class="mb-3">
													<label class="form-label"> Chassis </label>
													<input id="unit-chassis" type="text" class="form-control" readonly>
												</div>
											</div>

											<div class="col-sm-4">
												<div class="mb-3">
													<label class="form-label"> Original SRP </label>
													<input id="unit-price" type="text" class="form-control number-format text-end" value="" readonly placeholder="0.00" onkeypress="" autocomplete="off">
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-sm-4">
												<div class="mb-3">
													<label class="form-label"> Loan Amount <span class="text-danger">*</span></label>
													<input id="unit-loan-amount" type="text" class="form-control number-format text-end" value="" placeholder="0.00" onkeypress="" autocomplete="off">
												</div>
											</div>

											<div class="col-sm-4">
												<div class="mb-3">
													<label class="form-label"> Total Payment <span class="text-danger">*</span></label>
													<input id="unit-total-payment" type="text" class="form-control number-format text-end" value="" placeholder="0.00" onkeypress="" autocomplete="off">
												</div>
											</div>

											<div class="col-sm-4">
												<div class="mb-3">
													<label class="form-label"> Principal Balance <span class="text-danger">*</span></label>
													<input id="unit-principal-balance" type="text" class="form-control number-format text-end" value="" placeholder="0.00" onkeypress="" autocomplete="off">
												</div>
											</div>
										</div>

										
									</div>

								</div>
								<!-- end tab pane -->

								<div class="tab-pane fade" id="pills-upload-image" role="tabpanel" aria-labelledby="pills-upload-image-tab">
									<div id="upload-photo" class="row" >
										<div class="col-sm-12 mb-2 content">
											<div class="justify-content-between d-flex align-items-center">
												<label class="mb-0 pb-1 ff-base">UPLOAD PICTURE<hr style="margin-top: 0rem; margin-bottom: 0.1rem;"></label>
											
												<button type="button" id="append-new-upload" class="btn btn-sm btn-info btn-label">
													<i class="ri-image-add-line label-icon align-middle fs-16 me-2"></i> 
													Add upload
												</button>
											</div>
										</div>

										<input type="hidden" id="append-counter" value="1">
										<div id="append-upload-section" class="col-lg-12 row"></div>
									</div>
								</div>
								<!-- end tab pane -->

								<div class="tab-pane fade" id="pills-payment" role="tabpanel" aria-labelledby="pills-spare-parts-tab">
									<div>
										<div class="row">
											<div class="col-lg-12 mt-3">

												<div class="form-check mb-2">
													<input class="form-check-input" type="checkbox" id="certifying-unit" style="width:20px; height:20px;">
													<label class="form-check-label ms-sm-1" for="certifying-unit" style="line-height: 1.7rem;">
														Certifying unit has no missing and damage parts
													</label>
												</div>

												<div class="col-lg-12 row">
													<div class="col-sm-3">
														<label class="form-label"> Spare Parts </label>
													</div>

													
													<div class="col-sm-3">
														<label class="form-label"> Status </label>
													</div>

													<div class="col-sm-2">
														<label class="form-label"> Price </label>
													</div>

													
													<div class="col-sm-3">
														<label class="form-label"> Remarks </label>
													</div>
													
													<div class="col-sm-1">
														<input type="hidden" id="spare-parts-append-count" data-continue-count="0" data-row-count="0" value="0">
														<button id="add-new-spare-parts" type="button" class="btn btn-secondary">
															<i class="ri-add-line align-bottom"></i>
														</button>
													</div>
												</div>
												<hr style="margin: .5rem 0;">
												
												<div id="div-append-spare-parts"></div>
											</div>
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
					<button id="save-details" type="button" class="btn btn-primary" data-repo-id="" data-receive-unit-id="0">Save changes</button>
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

		var images_counter = 0, parts_counter = 0, received_id = 0, repo_id = 0, 
			list_of_files = [], // list of all picture to preview
			total_preview_files = 0, // total count of picture in preview
			image_deleted_row = [] // array of deleted row from append of pictures include of preview
		;

		$(document).ready(function(){
			display_table()
			fetch_brand_list()

			$('#certifying-unit').click(function(){
				$('#add-new-spare-parts').attr('disabled', $(this).is(':Checked'))
				$(this).is(':Checked') ? $('#div-append-spare-parts').empty() : '';
			});

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
				// $('#unit-brand').change(function(){
				// 	var brand_id = $(this).val()
				// $('#unit-brand').change(function(){
				// 	var brand_id = $(this).val()

				// 	if(brand_id != ''){
				// 		//fetch_model_list(brand_id)
				// 		$('#unit-model').prop('disabled', false);
				// 	}
				// 	else{
				// 		$('#unit-model').empty();
				// 		$('#unit-model').prop('disabled', true);
				// 		$('#div-append-spare-parts').empty()
				// 	}
				// 	if(brand_id != ''){
				// 		//fetch_model_list(brand_id)
				// 		$('#unit-model').prop('disabled', false);
				// 	}
				// 	else{
				// 		$('#unit-model').empty();
				// 		$('#unit-model').prop('disabled', true);
				// 		$('#div-append-spare-parts').empty()
				// 	}
			// });

			$('#add-new-spare-parts').prop('disabled', true);
			$('#unit-model').change(function(){
				var model_id = $(this).val()
				$('#div-append-spare-parts').empty()

				if(model_id != ''){
					$('#add-new-spare-parts').prop('disabled', false);
				}
				else{
					$('#add-new-spare-parts').prop('disabled', true);
				}
			});

			$('#append-new-upload').click(function(e){
				e.preventDefault()
				images_counter++;

				$('#append-upload-section').prepend(`
					<div class="col-sm-3" id="append-item-${ images_counter }">
						<figure class="figure mb-2">
							<input type="hidden" id="image-unique-id-${ images_counter }" value="0">
							<img  src="../assets/images/small/img-4.jpg" class="figure-img img-thumbnail rounded" alt="..." id="input-file-${ images_counter }-preview" onclick="document.getElementById('input-file-${ images_counter }').click();">
							<input type="file" id="input-file-${ images_counter }" class="form-control d-none"  onchange="preview_photo(this.id)">
							<figcaption class="figure-caption input-group input-group-sm">
								<div class="input-group">
									<select class="form-select form-select-sm" id="seleted-image-${ images_counter }" aria-label="Example select with button addon">
										<option value=""> Select </option>
									</select>
									<button class="btn btn-sm btn-info bg-gradient waves-effect waves-light" type="button" onclick="view_image(${ images_counter })" >
										<i class="ri-image-line label-icon align-middle"></i> 
									</button>
									<button class="btn btn-sm btn-danger bg-gradient waves-effect waves-light" type="button" onclick="remove_image(${ images_counter })">
										<i class="ri-delete-bin-line label-icon align-middle"></i>
									</button>
								</div>
							</figcaption>
						</figure>
					</div>
				`);

				$('#append-counter').val(images_counter);
				fetch_list_of_image(images_counter)
			});

			$('#add-new-spare-parts').click(function(e){
				e.preventDefault()

				var partsId = $(`#unit-parts-${parts_counter}`).val();
				var partsStatus = $(`#unit-parts-status-${parts_counter}`).val();
				var partsPrice = $(`#unit-parts-price-${parts_counter}`).val();
				var partsRemarks = $(`#unit-parts-remarks-${parts_counter}`).val();

				if (partsId === '' || partsStatus === '' || partsPrice === '') {
					toast('Please fill out all the fields', 'warning');
					return;
				}

				parts_counter++;

				var html = `
					<div id="row-${ parts_counter }" class="col-lg-12 row">
						<input type="hidden" id="unit-spare-parts-id-${ parts_counter }" value="0">
						<div class="col-sm-3">
							<div class="mb-3">
								<select id="unit-parts-${ parts_counter }" class="form-control"></select>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="mb-3">
								<select id="unit-parts-status-${ parts_counter }" class="form-control">
									<option value=""> Choose Status </option>
									<option value="Damaged"> Damaged </option>
									<option value="Missing"> Missing </option>
								</select>
							</div>
						</div>

						<div class="col-sm-2">
							<div class="mb-3">
							<input type="text" id="unit-parts-price-${ parts_counter }" class="form-control number-format text-end" placeholder="0.00" autocomplete="off">
							</div>
						</div>

						<div class="col-sm-3">
							<div class="mb-3">
							<input type="text" id="unit-parts-remarks-${ parts_counter }" class="form-control isNullPrice" placeholder="Remarks" autocomplete="off">
							</div>
						</div>

						<div class="col-sm-1">
							<div class="mb-3">
								<button type="button" class="btn btn-danger remove-row" data-row-id="${ parts_counter }">
									<i class="ri-subtract-line align-bottom"></i>
								</button>
							</div>
						</div>
					</div>
				`;

				$('#div-append-spare-parts').prepend(html);
				fetch_spare_parts_list(`unit-parts-${ parts_counter }`)
				var choices = new Choices(`#unit-parts-status-${ parts_counter }`);
				$(`#unit-parts-${ parts_counter }`).change(function(){
					var parts_id = $(`#unit-parts-${ parts_counter }`).val();
					$.ajax({
						url: `${ baseUrl }/partsPrice/${ parts_id }`, 
						type: 'GET', 
						headers:{
							'Authorization':`Bearer ${ auth.token }`,
						},
						success: function (data) {
							$(`#unit-parts-price-${ parts_counter }`).val(roundOf(data.price))
						},
						error: function(response) {
							toast(response.responseJSON.message, 'danger');
							forceLogout(response.responseJSON) //if token is expired
						}
					})
				});

				$('#spare-parts-append-count').val(parts_counter)
				append_number_format_keyup()
			});

			$('div#div-append-spare-parts').on('click', '.remove-row', function(event){
				var row = $(this).data('row-id')
				$(`div#row-${ row }`).remove();
			});

			$('#save-details').click(function(event){
				event.preventDefault();

				var id = received_id; // $(this).data('receive-unit-id')
				var url = (received_id == 0 ? `${ baseUrl }/createReceiveUnit` : `${ baseUrl }/updateReceiveUnit/${ id }`)
				// console.log(url)
				// console.log(repo_id)

				if($('#unit-loan-amount').val() == '' || $('#unit-total-payment').val() == '' || $('#unit-principal-balance').val() == ''){
					toast("Unit Details Tab: Please fill-up the red mark asterisk (*)", 'danger');
					return false;
				}

				showLoader()

				var from_data = new FormData();
				from_data.append('receive_id', received_id);
				from_data.append('repo_id', repo_id);
				from_data.append('unit_price', $('#unit-price').val());
				from_data.append('unit_loan_amount', $('#unit-loan-amount').val());
				from_data.append('unit_total_payment', $('#unit-total-payment').val());
				from_data.append('unit_principal_balance', $('#unit-principal-balance').val());
				from_data.append('module_id', parseInt($('#moduleid').val()));
				from_data.append('certify_no_missing_and_damaged_parts', $('#certifying-unit').is(':Checked'));
				from_data.append('list_of_files', JSON.stringify(list_of_files));

				var append_count = 0;
				for (let i = total_preview_files + 1; i <= images_counter; i++){
					if(image_deleted_row.indexOf(i) === -1){
						// from_data.append(`image_primary_id_${ i }`, $(`#image-unique-id-${ i }`).val());
						from_data.append(`image_${ i }`, $(`#input-file-${ i }`)[0].files[0]);
						from_data.append(`image_id_${ i }`, $(`#seleted-image-${ i }`).val());
						from_data.append(`image_name_${ i }`, $(`#seleted-image-${ i } option:selected`).text());

						append_count = append_count + 1
					}
				}
				from_data.append('images_count', images_counter);

				var spare_parts_row_count = parts_counter;
				from_data.append('spare_parts_count', spare_parts_row_count);
				for (let o = 1; o <= spare_parts_row_count; o++) {
					var item = ($(`#unit-parts-${ o }`).val() != undefined ? true : false);

					if(item){
						from_data.append(`parts_unique_id_${ o }`, $(`#unit-spare-parts-id-${ o }`).val());
						from_data.append(`spare_parts_id_${ o }`, $(`#unit-parts-${ o }`).val());
						from_data.append(`spare_parts_status_${ o }`, $(`#unit-parts-status-${ o }`).val());
						from_data.append(`spare_parts_price_${ o }`, $(`#unit-parts-price-${ o }`).val());
						from_data.append(`spare_parts_remarks_${ o }`, $(`#unit-parts-remarks-${ o }`).val());
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
						console.log(data) 
						hideLoader()
						if(!data.success){
							toast(data.message, 'danger');
							hideLoader()
						}
						else{
							let msg = id == 0 ? 'Received Unit Succesfully added!' : 'Parts Succesfully updated!'
							toast(msg, 'success');
							$('#staticBackdrop').modal('hide')
							add_receive_units()
							display_table()
							hideLoader()
						}
					},
					error: function(response) {
						console.log(response)
						hideLoader()
						toast(response.responseJSON.message, 'danger');
						forceLogout(response.responseJSON) //if token is expired
					}
				});

			});
		})

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

		async function display_table(){
			const tableData = await $.ajax({
				url: `${ baseUrl }/receivedUnits`,
				method: 'GET',
				dataType: 'json',
				headers:{
					'Authorization':`Bearer ${ auth.token }`,
				}
			});

			let response = tableData.filter(d => { return d.current_status != 'Sold' && d.current_status != 'For Sell'})

			$("#received-unit-table").DataTable().destroy();
			$("#received-unit-table").DataTable({
				deferRender: true,
				searching: true,
				scrollY: 400,
		  		scrollX: true,
				scrollCollapse: true,
				paging: false,
				data: response,
				// aoColumnDefs: [
				// 	{ className: "text-end", targets: [ 4 ] },
				// ],
				columns: [
					{ data: "acumatica_id",
						fnCreatedCell: function(nTd, sData, oData, iRow, iCol){
							html = `
								<b>${ oData.acumatica_id != null ? oData.acumatica_id : '-' }</b>
							`;
							$(nTd).html(html);
						}
					},
					{ data: "customer_name", className: "fw-semibold" },
					{ data: "brandname" },
					{ data: "model_name" },
					{ data: "model_engine" },
					{ data: "model_chassis" },
					{ data: "current_status" },
					{ data: null, defaultContent: '',
						fnCreatedCell: function(nTd, sData, oData, iRow, iCol){

							var status = oData.current_status.toLowerCase()
							let view_status_array = ['goods in transit', 'for sell', 'sold', 'disapproved']
							if(status == 'for upload details'){
								btnClass = 'info';
								btnText = '<i class="ri-search-line"></i> Proceed to complete the details';
							}
							else if(status == 'subject for reprice approval'){
								btnClass = 'warning';
								btnText = '<i class="ri-search-line"></i> Edit';
							}
							else if(view_status_array.indexOf(status) !== -1){
								btnClass = 'danger';
								btnText = '<i class="ri-search-line"></i> View';
							}
							else{
								btnClass = '';
								btnText = '';
							}

							html = `
								<button class="btn btn-sm btn-soft-${ btnClass }" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
									onclick="edit('${ oData.id }','${ oData.brand_id }','${ oData.model_id }', ${ oData.recieved_id }, ${ oData.original_srp }, ${ oData.amount_paid }, 
										${ oData.transfer_unit_id }, ${ oData.principal },'${ oData.model_engine }','${ oData.model_chassis }', '${ oData.plate_number }', '${ status }')"> 
									${ btnText }
								</button> 
							`;
							$(nTd).html(html);
						}
					},
				]
			});
		}

		function add_receive_units(){
			$('#save-details').data('receive-unit-id', 0);	
			button_show_hide('pills-unit-details-tab')

			$('#unit-loan-amount').val('')
			$('#unit-total-payment').val('')
			$('#unit-principal-balance').val('')

			$('#append-upload-section').empty();

			$('#div-append-spare-parts').empty();
			$('#fetch-div-append-spare-parts').empty();
			$('#fetch-div-append-spare-parts').attr('');
			$('#add-new-spare-parts').data('row-count', 0);
			$('#certifying-unit').prop('checked', false)
			$('#add-new-spare-parts').attr('disabled', false)

			images_counter = 0, images_counter = 0, parts_counter = 0, received_id = 0, repo_id = 0, 
			list_of_files = [], 
			total_preview_files = 0,
			image_deleted_row = [];
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
					forceLogout(response.responseJSON) //if token is expired
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

		function remove_image(counter, deleted_id = 0, file_identity = 'new'){
			if(file_identity == 'preview' && deleted_id > 0){
				$(`#append-item-${ counter }`).remove();
				list_of_files = list_of_files.filter(item => item !== `${ deleted_id }`);
			}
			else if(file_identity == 'new'){
				$(`#append-item-${ counter }`).remove();
			}
			image_deleted_row.push(counter)
		}

		function remove_parts(counter, deleted_id = 0){
			$(`#row-tools-${ counter }`).remove();
			if(deleted_id > 0){
				$.ajax({
					url: `${ baseUrl }/repoDeleteParts/${ deleted_id }`, 
					type: 'GET', 
					headers:{
						'Authorization':`Bearer ${ auth.token }`,
					},
					success: function (data) {
						toast(`Tools ${ data } Successfully Deleted`, 'success');
					}
				});
			}
		}

		function button_show_hide(tab_id){
			if(tab_id == 'pills-spare-parts-tab'){
				$('.btn-save-footer').show()
			}
			else {
				$('.btn-save-footer').hide()
			}
		}
		
		function fetch_brand_list(){
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
					$('#unit-brand').val('').trigger('change');
				},
				error: function(response) {
					toast(response.responseJSON.message, 'danger');
					forceLogout(response.responseJSON) //if token is expired
				}
			});
		}

		function fetch_model_list(brandid, modelid){
			$.ajax({
				url: `${ baseUrl }/modelPerBrand/${ brandid }`,
				type: 'GET', 
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
					$('#unit-model').prop('disabled', true);
					$('#unit-model').val(modelid).trigger('change');
				},
				error: function(response) {
					toast(response.responseJSON.message, 'danger');
					forceLogout(response.responseJSON) //if token is expired
				}
			});
		}

		function fetch_spare_parts_list(append_row_id){
			var model_id = $('#unit-model').val()

			$.ajax({
				url: `${ baseUrl }/partsPerModel/${ model_id }`, 
				type: 'GET', 
				headers:{
					'Authorization':`Bearer ${ auth.token }`,
				},
				success: function (data) {
					var format = { 'value': '', 'label': 'Choose Spart Parts' };
					data.unshift(format)

					var choices = new Choices(`#${ append_row_id }`, {
						choices: data
					});
				},
				error: function(response) {
					toast(response.responseJSON.message, 'danger');
					forceLogout(response.responseJSON) //if token is expired
				}
			});
		}

		function fetch_spare_parts_list_append(model_id, parts_id, append_row_id){
			$.ajax({
				url: `${ baseUrl }/partsPerModel/${ model_id }`, 
				type: 'GET', 
				headers:{
					'Authorization':`Bearer ${ auth.token }`,
				},
				success: function (data) {
					var format = { 'value': '', 'label': 'Choose Spart Parts', 'selected': false };
					data.unshift(format)

					var choices = new Choices(`#${ append_row_id }`);
					for (let i = 0; i < data.length; i++) {
						choices.setChoices([{ 
							value: data[i].value,
							label: data[i].label,
							selected: (parts_id == data[i].value ? true : false),
							disabled: false
						}], 'value', 'label', false);
					}
				},
				error: function(response) {
					toast(response.responseJSON.message, 'danger');
					forceLogout(response.responseJSON) //if token is expired
				}
			});
		}

		function edit(id, brandid, modelid, receivedid, price, amount_paid, transfer_unit_id, principal, engine, chassis, plate, status){
			$('#fetch-div-append-spare-parts').empty();
			add_receive_units();

			receivedid == 0 || status == 'subject for reprice approval' ? $('#save-details').show() : $('#save-details').hide();
			received_id = (receivedid == 'null' ? 0 : receivedid);
			repo_id = (id == 'null' ? 0 : id);
			image_deleted = [];
			
			$('#unit-brand').val(brandid).trigger('change').prop('disabled', true);
			fetch_model_list(brandid, modelid)
			$('#unit-plate').val(plate)
			$('#unit-engine').val(engine)
			$('#unit-chassis').val(chassis)
			$('#unit-price').val(price)
			// $('#unit-loan-amount').val(price)
			$('#unit-total-payment').val(amount_paid)
			
			$.ajax({
				url: `${ baseUrl }/receivedUnitsPerId`, 
				type: 'POST', 
				headers:{
					'Authorization':`Bearer ${ auth.token }`,
				},
				data: {
					receivedid : receivedid,
					transfer_unit_id : transfer_unit_id,
					moduleid : parseInt($('#moduleid').val())
				},
				success: function (data) {
					
					var res = data.message;
					var receive = (res.received_details != null ? true : false);
					$('#certifying-unit').prop('checked', (receive ? res.received_details.is_certified_no_parts == 'true' ? true : false : false))
					$('#add-new-spare-parts').attr('disabled', receive ? res.received_details.is_certified_no_parts == 'true' ? true : false : false)
					$('#unit-loan-amount').val(receive ? res.received_details.loan_amount : '')
					$('#unit-total-payment').val(receive ? res.received_details.total_payments : '')
					$('#unit-principal-balance').val(receive ? res.received_details.principal_balance : '')

					var files = res.file_details;
					images_counter = files.length;
					total_preview_files = files.length;
					var image_path = `${ baseUrl.replace('/api', '') }`;
					$('#append-upload-section').empty();
					for (let i = 0; i < files.length; i++) {
						const el = files[i];

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
									<input type="hidden" id="image-unique-id-${ append_count }" value="${ el.id }">
									<img  src="${ image_source }" class="figure-img img-thumbnail rounded" alt="..." id="input-file-${ append_count }-preview" onclick="document.getElementById('input-file-${ append_count }').click();">
									<input type="file" id="input-file-${ append_count }" class="form-control d-none"  onchange="preview_photo(this.id)" disabled>
									<figcaption class="figure-caption input-group input-group-sm">
										<div class="input-group">
											<select class="form-select form-select-sm" id="seleted-image-${ append_count }" aria-label="Example select with button addon" disabled>
												<option value=""> Select </option>
											</select>
											<button class="btn btn-sm btn-info bg-gradient waves-effect waves-light" id="picture-view-${ append_count }" type="button" onclick="view_image(${ append_count })" style="display:${ image_extension.indexOf(extension) !== -1 ? 'block' : 'none' };">
												<i class="ri-image-line label-icon align-middle"></i> 
											</button>
											<a role="button" class="btn btn-sm btn-info bg-gradient waves-effect waves-light" id="download-file-${ append_count }" href="${ image_path +'/'+ el.path }" download target="_blank" style="display:${ image_extension.indexOf(extension) !== -1 ? 'none' : 'block' };">
												<i class="ri-download-2-line label-icon align-middle"></i> 
											</a>
											<button class="btn btn-sm btn-danger bg-gradient waves-effect waves-light" type="button" onclick="remove_image(${ append_count }, ${ el.id }, 'preview')">
												<i class="ri-delete-bin-line label-icon align-middle"></i>
											</button>
										</div>
									</figcaption>
								</figure>
							</div>
						`);
						// '${ el.file_identity }'

						list_of_files.push(el.id)
						fetch_list_of_image(append_count, el.files_id)
					}

					var parts = res.spare_details;
					parts_counter = parts.length;

					for (let index = 0; index < parts.length; index++) {
						const element = parts[index];
						const counter = index + 1;

						var html = `
							<div id="row-tools-${ counter }" class="col-lg-12 row">
								<input type="hidden" id="unit-spare-parts-id-${ counter }" value="${ element.id }">
								<div class="col-sm-3">
									<div class="mb-3">
										<select id="unit-parts-${ counter }" class="form-control"></select>
									</div>
								</div>
								
								<div class="col-sm-3">
									<div class="mb-3">
										<select id="unit-parts-status-${ counter }" class="form-control">
											<option value=""> Choose Status </option>
											<option value="Damaged" ${ element.parts_status == 'Damaged' ? 'selected' : '' }> Damaged </option>
											<option value="Missing" ${ element.parts_status == 'Missing' ? 'selected' : '' }> Missing </option>
										</select>
									</div>
								</div>

								<div class="col-sm-2">
									<div class="mb-3">
										<input type="text" id="unit-parts-price-${ counter }" class="form-control number-format text-end" placeholder="Price" autocomplete="off" value="${ roundOf(element.price) }">
									</div>
								</div>

								<div class="col-sm-3">
									<div class="mb-3">
										<input type="text" id="unit-parts-remarks-${ counter }" class="form-control" placeholder="Remarks" autocomplete="off" value="${ (element.parts_remarks != null ? element.parts_remarks : '') }">
									</div>
								</div>

								<div class="col-sm-1">
									<div class="mb-3">
										<button type="button" class="btn btn-danger" data-row-id="${ counter }" onclick="remove_parts(${ counter }, ${ element.id })">
											<i class="ri-delete-bin-line align-bottom"></i>
										</button>
									</div>
								</div>
							</div>
						`;

						$('#div-append-spare-parts').append(html);
						fetch_spare_parts_list_append(modelid, element.parts_id, `unit-parts-${ counter }`)
						var choices = new Choices(`#unit-parts-status-${ counter }`);
						append_number_format_keyup()
					}
				},
				error: function(response) {
					toast(response.responseJSON.message, 'danger');
					forceLogout(response.responseJSON) //if token is expired
				}
			});
		}
	</script>
</body>
</html>

