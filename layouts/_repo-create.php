
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
								<h4 class="mb-sm-0" id="header-breadcram">Repo Details</h4>
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
										<button id="add-receive-units" type="button" class="btn btn-soft-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="add_receive_units()">
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
												<th> Uploaded <br> Required Files </th>
												<th> Process Status </th>
												<!-- <th> Repo Status </th>
												<th> Approver </th> -->
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
								<div class="alert alert-secondary text-dark" role="alert">
									Always click the last Tab to save the changes.
								</div>

								<ul class="nav nav-pills nav-justified custom-nav" role="tablist">
									<li class="nav-item" role="presentation" onclick="button_show_hide('pills-customer-tab')">
										<button class="nav-link fs-15 p-3 active" id="pills-bill-info-tab" data-bs-toggle="pill" data-bs-target="#pills-bill-info" type="button" role="tab" aria-controls="pills-bill-info" aria-selected="false" data-position="0" tabindex="-1">
											<!-- <i class="ri-user-2-line fs-16 p-2 bg-soft-primary text-primary rounded-circle align-middle me-2 mb-2"></i> -->
											<span> Owner's Information </span>
										</button>
									</li>
									<li class="nav-item" role="presentation" onclick="button_show_hide('pills-unit-details-tab')">
										<button class="nav-link fs-15 p-3 done" id="pills-unit-details-tab" data-bs-toggle="pill" data-bs-target="#pills-bill-address" type="button" role="tab" aria-controls="pills-bill-address" aria-selected="false" data-position="1" tabindex="-1">
											<!-- <i class="ri-motorbike-fill fs-16 p-2 bg-soft-primary text-primary rounded-circle align-middle me-2"></i>  -->
											<span> Unit Details </span>
 										</button>
									</li>
									<li class="nav-item" role="presentation" onclick="button_show_hide('pills-apprehension-record-tab')">
										<button class="nav-link fs-15 p-3 done" id="pills-apprehension-record-tab" data-bs-toggle="pill" data-bs-target="#pills-apprehension-record" type="button" role="tab" aria-controls="pills-apprehension-record" aria-selected="false" data-position="1" tabindex="-1">
											<!-- <i class="ri-motorbike-fill fs-16 p-2 bg-soft-primary text-primary rounded-circle align-middle me-2"></i>  -->
											<span> Apprehension Record </span>
										</button>
									</li>
									<li class="nav-item" role="presentation" onclick="button_show_hide('pills-upload-file-tab')">
										<button class="nav-link fs-15 p-3 done" id="pills-upload-file-tab" data-bs-toggle="pill" data-bs-target="#pills-upload-file" type="button" role="tab" aria-controls="pills-upload-file" aria-selected="false" data-position="3" tabindex="-1">
											<!-- <i class="ri-file-upload-line fs-16 p-2 bg-soft-primary text-primary rounded-circle align-middle me-2"></i>  -->
											<span> Upload Files </span>
										</button>
									</li>
									<li class="nav-item" role="presentation" onclick="button_show_hide('pills-spare-parts-tab')">
										<button class="nav-link fs-15 p-3 done" id="pills-spare-parts-tab" data-bs-toggle="pill" data-bs-target="#pills-payment" type="button" role="tab" aria-controls="pills-payment" aria-selected="false" data-position="2" tabindex="-1">
											<!-- <i class="ri-bank-card-line fs-16 p-2 bg-soft-primary text-primary rounded-circle align-middle me-2"></i>  -->
											<span> Missing & Damaged </span>
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
													<label class="form-label"> Select Customer <span class="text-danger">*</span></label>
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
											<div class="col-sm-3">
												<div class="mb-3">
													<label class="form-label"> Brand <span class="text-danger">*</span></label>
													<select id="unit-brand" class="select-single-modal"></select>
												</div>
											</div>

											<div class="col-sm-3">
												<div class="mb-3">
													<label class="form-label"> Model <span class="text-danger">*</span></label>
													<select id="unit-model" class="select-single-modal" data-modelid=""></select>
												</div>
											</div>

											<div class="col-sm-3">
												<div class="mb-3">
													<label class="form-label"> Engine <span class="text-danger">*</span></label>
													<input id="unit-model-engine" type="text" class="form-control" value="" placeholder="Enter Engine" onkeypress="" autocomplete="off">
												</div>
											</div>

											<div class="col-sm-3">
												<div class="mb-3">
													<label class="form-label"> Chassis <span class="text-danger">*</span></label>
													<input id="unit-model-chassis" type="text" class="form-control" value="" placeholder="Enter Chassis" onkeypress="" autocomplete="off">
												</div>
											</div>

											<div class="col-sm-3">
												<div class="mb-3">
													<label class="form-label"> Color <span class="text-danger">*</span></label>
													<select id="unit-color" class="select-single-modal"></select>
												</div>
											</div>

											<div class="col-sm-3">
												<div class="mb-3">
													<label class="form-label"> Plate Number <span class="text-danger">*</span></label>
													<input id="unit-plate-number" type="text" class="form-control" value="" placeholder="Enter Plate Number" onkeypress="" autocomplete="off">
												</div>
											</div>

											<div class="col-sm-3">
												<div class="mb-3">
													<label class="form-label"> MV File Number <small class="text-muted">(Optional)</small></label>
													<input id="unit-mv-file-number" type="text" class="form-control" value="" placeholder="Enter MV File Number" onkeypress="" autocomplete="off">
												</div>
											</div>

											<div class="col-sm-3">
												<div class="mb-3">
													<label class="form-label"> Year Model <span class="text-danger">*</span></label>
													<input id="unit-year-model" type="text" class="form-control number-format" value="" maxlength="4" placeholder="Enter Year Model" onkeypress="" autocomplete="off">
												</div>
											</div>

											<div class="col-sm-3">
												<!-- <div class="mb-3">
													<label class="form-label"> Classification <span class="text-danger">*</span></label>
													<select id="unit-classification" class="select-single-modal">
														<option value="">Select Classification</option>
														<option value="A">A</option>
														<option value="B">B</option>
														<option value="C">C</option>
														<option value="D">D</option>
														<option value="E">E</option>
													</select>
												</div> -->
												<div class="mb-3">
													<label class="form-label"> ORCR Status <span class="text-danger">*</span></label>
													<select id="unit-orcr-status" class="select-single-modal">
														<option value="">Select Status</option>
														<option value="On Hand">On Hand</option>
														<option value="Unregistered">Unregistered</option>
														<option value="Missing">Missing</option>
														<option value="Not Available">Not Available</option>
													</select>
												</div>
											</div>

											<!-- <div class="col-sm-3">
												<div class="mb-3">
													<label class="form-label"> Description of unit <span class="text-danger">*</span></label>
													<select id="unit-description" class="select-single-modal">
														<option value="">Select Description of unit</option>
														<option value="Good as new repossessed unit">Good as new repossessed unit</option>
														<option value="Minimal repair of refurbishment">Minimal repair of refurbishment</option>
														<option value="Major repair and refubishment">Major repair and refubishment</option>
														<option value="Cannibalized">Cannibalized</option>
														<option value="Meet an accident">Meet an accident</option>
														<option value="Totally wrecked">Totally wrecked</option>
													</select>
												</div>
											</div> -->

											<div class="col-sm-3">
												<div class="mb-3">
													<label class="form-label"> Original Owner <span class="text-danger">*</span></label>
													<input id="unit-original-owner" type="text" class="form-control" value="" placeholder="Original Owner" onkeypress="" autocomplete="off" >
												</div>
											</div>
											
											<div class="col-sm-3">
												<div class="mb-3">
													<label class="form-label"> Original Owner's ID <span class="text-danger">*</span></label>
													<select id="unit-original-owners-id" class="select-single-modal">
														<option value="">Select </option>
														<option value="With Copy">With Copy</option>
														<option value="Without Copy">Without Copy</option>
													</select>
												</div>
											</div>
											
											<div class="col-sm-3">
												<div class="mb-3">
													<label class="form-label"> Unit Documents <span class="text-danger">*</span></label>
													<select id="unit-documents" class="select-single-modal">
														<option value="">Select Unit Documents</option>
														<option value="CD">Complete Documents</option>
														<option value="ID">Incomplete Documents</option>
													</select>
												</div>
											</div>

											<div class="col-sm-3">
												<div class="mb-3">
													<label class="form-label"> Date Sold <span class="text-danger">*</span></label>
													<input id="unit-date-sold" type="date" class="form-control" value="" placeholder="Enter Date Sold" onkeypress="" autocomplete="off" >
												</div>
											</div>
											
											<div class="col-sm-3">
												<div class="mb-3">
													<label class="form-label"> Date of Repossession <span class="text-danger">*</span></label>
													<input id="unit-date-surrender" type="date" class="form-control" value="" placeholder="Enter Encumbered To" onkeypress="" autocomplete="off">
												</div>
											</div>

											<div class="col-sm-3">
												<div class="mb-3">
													<label class="form-label"> Original SRP <span class="text-danger">*</span></label>
													<input id="unit-price" type="text" class="form-control number-format text-end" value="" placeholder="Enter number" onkeypress="" autocomplete="off">
												</div>
											</div>
											
											<div class="col-sm-3">
												<div class="mb-3">
													<label class="form-label"> Loan Amount <span class="text-danger">*</span></label>
													<input id="unit-loan-amount" type="text" class="form-control number-format text-end" value="" placeholder="0.00" onkeypress="" autocomplete="off">
												</div>
											</div>
											
											<div class="col-sm-3">
												<div class="mb-3">
													<label class="form-label"> Principal Balance <span class="text-danger">*</span></label>
													<input id="unit-principal-balance" type="text" class="form-control number-format text-end" value="" placeholder="0.00" onkeypress="" autocomplete="off">
												</div>
											</div>

											<div class="col-sm-3">
												<div class="mb-3">
													<label class="form-label"> Total Payment <span class="text-danger">*</span></label>
													<input id="unit-total-payment" type="text" class="form-control number-format text-end" value="" placeholder="0.00" onkeypress="" autocomplete="off">
												</div>
											</div>

											<div class="col-sm-3">
												<div class="mb-3">
													<label class="form-label"> Date of last payment <small class="text-muted">(Optional)</small></label>
													<input id="unit-date-last-payment" type="date" class="form-control" value="" placeholder="Enter Encumbered To" onkeypress="" autocomplete="off">
												</div>
											</div>

											<div class="col-sm-3">
												<div class="mb-3">
													<label class="form-label"> Loan No <span class="text-danger">*</span></label>
													<input id="unit-loan-number" type="text" class="form-control" value="" placeholder="Loan No" onkeypress="" autocomplete="off">
												</div>
											</div>

											<div class="col-sm-3">
												<div class="mb-3">
													<label class="form-label"> ODO Meter <span class="text-danger">*</span></label>
													<input id="unit-odo-meter" type="text" class="form-control" value="" placeholder="ODO Meter" onkeypress="" autocomplete="off">
												</div>
											</div>

											<div class="col-sm-3">
												<div class="mb-3">
													<label class="form-label"> Location <span class="text-danger">*</span></label>
													<select id="unit-location" class="select-single-modal"></select>
												</div>
											</div>

											<div class="col-sm-3">
												<div class="mb-3">
													<label class="form-label"> Times Repossessed <span class="text-danger">*</span></label>
													<input id="unit-times-repossessed" type="text" class="form-control number-format text-end" value="" placeholder="0" pattern="\d*" maxlength="2" onkeypress="" autocomplete="off">
												</div>
											</div>
											
											<div class="row" id="multiple-times-repos"></div>
											<div class="row" id="multiple-times-repos-fetch"></div>
										</div>
									</div>
								</div>
								<!-- end tab pane -->

								<div class="tab-pane fade" id="pills-apprehension-record" role="tabpanel" aria-labelledby="pills-apprehension-record-tab">
									<div>
										<div class="row">
											<div class="col-sm-3">
												<div class="mb-3">
													<label class="form-label"> With apprehension <span class="text-danger">*</span></label>
													<select id="unit-apprehension" class="select-single-modal">
														<option value="">Select Apprehension</option>
														<option value="yes">Yes</option>
														<option value="no">No</option>
													</select>
												</div>
											</div>

											<div class="col-sm-4">
												<div class="mb-3">
													<label class="form-label"> With apprehension <span class="apprehension-yes text-danger">*</span></label>
													<select id="unit-apprehension-description" class="select-single-modal">
														<option value="">Select Apprehension</option>
														<option value="Involved in a drug related case">Involved in a drug related case</option>
														<option value="Accessory of a crime">Accessory of a crime</option>
														<option value="Carnapped">Carnapped</option>
														<option value="With LTO Alarm/Violation">With LTO Alarm/Violation</option>
														<option value="Altered Serials Numbers">Altered Serials Numbers</option>
													</select>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-sm-12">
												<div class="mb-3">
													<label class="form-label">Summary <span class="apprehension-yes text-danger">*</span></label>
													<textarea class="form-control" id="unit-apprehension-summary" placeholder="Enter Summary" rows="3" autocomplete="off" style="resize:none;"></textarea>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- end tab pane -->

								<div class="tab-pane fade" id="pills-upload-file" role="tabpanel" aria-labelledby="pills-upload-file-tab">
									<div>
										<div class="row">
											<div class="col-lg-12 text-end mb-2" id="div-button-add-upload">
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

								<div class="tab-pane fade" id="pills-payment" role="tabpanel" aria-labelledby="pills-spare-parts-tab">
									<div>
										<div class="row">
											<div class="col-lg-12">

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
														<span class="text-muted">(Optional)</span>
													</div>
													
													<div class="col-sm-1">
														<input type="hidden" id="spare-parts-append-count" data-continue-count="0" data-row-count="0" value="0">
														<button id="add-new-spare-parts" type="button" class="btn btn-secondary btn-sm">
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
					<button id="save-details" data-id="0" type="button" class="btn btn-primary" data-repo-id="0">Save changes</button>
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
		var color_id = '', counter = 0, filesCounter = 0, partsCounter = 0, timesRepoCounter = 1;
		var attrValue = auth.role.toLowerCase() === 'warehouse custodian' ? true : false;
		var requiredFiles = [];

		$(document).ready(function(){
			$('#add-receive-units').prop('disabled', true)
			display_table()
			fetch_brand_list()
         fetch_customer_profile_list()
			fetch_locations_list();
			fetch_list_of_image('0')
			fetch_color_list('')
		 
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

			// $('#unit-model').change(function(e){
			// 	e.preventDefault()
			// 	var model_id = $(this).val();
			// 	if(model_id != ''){
			// 		fetch_color_list(model_id, color_id)
			// 		$('#unit-color').prop('disabled', parseInt($('#save-details').data('repo-id')) == 0 || attrValue === false ? false : true);
			// 	}
			// 	else{
			// 		$('#unit-color').empty();
			// 		// $('#unit-color').prop('disabled', true);
			// 	}
			// });

			$('#unit-apprehension').change(function(e){
				e.preventDefault()
				var answer = $(this).val();
				if(answer == 'yes'){
					$('.apprehension-yes').show()
				} 
				else {
					$('.apprehension-yes').hide()
				}
			})

			$('#append-new-upload').click(function(e){
				e.preventDefault()
				filesCounter++
				
				// accept="image/png, image/jpg, image/jpeg"
				$('#append-upload-section').prepend(`
					<div class="col-sm-3" id="append-item-${ filesCounter }">
						<input type="hidden" id="image-id-${ filesCounter }" value="0">
						<figure class="figure mb-2">
							<img  src="../assets/images/small/img-4.jpg" class="figure-img img-thumbnail rounded" alt="..." id="input-file-${ filesCounter }-preview" onclick="document.getElementById('input-file-${ filesCounter }').click();">
							<input type="file" id="input-file-${ filesCounter }" class="form-control d-none"  onchange="preview_photo(this.id)">
							<figcaption class="figure-caption input-group input-group-sm">
								<div class="input-group">
									<select class="form-select form-select-sm" id="seleted-image-${ filesCounter }" aria-label="Example select with button addon">
										<option value=""> Select </option>
									</select>
									<button class="btn btn-sm btn-info bg-gradient waves-effect waves-light" type="button" onclick="view_image(${ filesCounter })" >
										<i class="ri-image-line label-icon align-middle"></i> 
									</button>
									<button class="btn btn-sm btn-danger bg-gradient waves-effect waves-light" type="button" onclick="remove_image(${ filesCounter })">
										<i class="ri-delete-bin-line label-icon align-middle"></i>
									</button>
								</div>
							</figcaption>
						</figure>
					</div>
				`);

				$('#append-counter').val(filesCounter);
				fetch_list_of_image(filesCounter)
			});

			$('#certifying-unit').click(function(){
				$('#add-new-spare-parts').attr('disabled', $(this).is(':Checked'))
				$(this).is(':Checked') ? $('#div-append-spare-parts').empty() : '';
			});

			$('#add-new-spare-parts').click(function(e){
				e.preventDefault()

				var partsId = $(`#unit-parts-${ partsCounter }`).val();
				var partsStatus = $(`#unit-parts-status-${ partsCounter }`).val();
				var partsPrice = $(`#unit-parts-price-${ partsCounter }`).val();
				var partsRemarks = $(`#unit-parts-remarks-${ partsCounter }`).val();

				if (partsId === '' || partsStatus === '' || partsPrice === '') {
					toast('Please fill out all the fields before add a new row', 'warning');
					return;
				}

				partsCounter++;

				var html = `
					<div id="row-tools-${ partsCounter }" class="col-lg-12 row">
						<input type="hidden" id="unit-spare-parts-id-${ partsCounter }" value="0">
						<div class="col-sm-3">
							<div class="mb-3">
								<select id="unit-parts-${ partsCounter }" class="select-single-modal" onchange="fetch_price_per_parts(this)">></select>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="mb-3">
								<select id="unit-parts-status-${ partsCounter }" class="form-control">
									<option value=""> Select Status </option>
									<option value="Damaged"> Damaged </option>
									<option value="Missing"> Missing </option>
								</select>
							</div>
						</div>

						<div class="col-sm-2">
							<div class="mb-3">
								<input type="text" id="unit-parts-price-${ partsCounter }" class="form-control number-format text-end" placeholder="0.00" autocomplete="off">
							</div>
						</div>

						<div class="col-sm-3">
							<div class="mb-3">
								<input type="text" id="unit-parts-remarks-${ partsCounter }" class="form-control isNullPrice" placeholder="Remarks" autocomplete="off">
							</div>
						</div>

						<div class="col-sm-1">
							<div class="mb-3">
								<button type="button" id="remove-row-${ partsCounter }" class="btn btn-danger remove-row" data-row-id="${ partsCounter }" onclick="remove_parts(${ partsCounter })" disabled>
									<i class="ri-subtract-line align-bottom"></i>
								</button>
							</div>
						</div>
					</div>
				`;

				$('#div-append-spare-parts').prepend(html);
				fetch_spare_parts_list(partsCounter, $("#unit-model").val())
				$(".select-single-modal").select2({ dropdownParent: $('#staticBackdrop') });
				var choices2 = new Choices(`#unit-parts-status-${ partsCounter }`);

				$('#spare-parts-append-count').val(partsCounter)
				parseInt($('#spare-parts-append-count').val()) > 0 ? $('#certifying-unit').prop('disabled', true) : $('#certifying-unit').prop('disabled', false)
				setTimeout(() => { $(`#remove-row-${ partsCounter }`).prop('disabled', false) }, 2000)
				append_number_format_keyup()
			});

			$('#unit-times-repossessed').keyup(function(){
				const init_value = parseInt($(this).val());
				timesRepoCounter = init_value;

				$('#multiple-times-repos').empty()
				if(init_value > 1){
					for (let index = 1; index < init_value; index++) {
						const counter = index + 1;

						$('#multiple-times-repos').append(`
							<div class="col-sm-3" id="container-ex-onwers-${ counter }">
								<div class="mb-3">
									<label class="form-label"> Previous Owner No.${ counter } </label>
									<input id="unit-exOwner-${ counter }" type="text" class="form-control" placeholder="Previous Owner No.${ counter }" value="">
								</div>
							</div>
						`);
					}
				}
			});

			$('#save-details').click(function(event){
				event.preventDefault();

				var id = $(this).data('repo-id')
				var url = (id == 0 ? `${ baseUrl }/createRepo` : `${ baseUrl }/updateRepo/${ id }`)

				if(id == 0){
					if($('#customer-acumatica-id').val() == ''){
						toast("Owner's Info Tab: Please fill-up the red mark asterisk (*)", 'warning');
						return false;
					}
					else if(
						$('#unit-brand').val() == '' || $('#unit-model').val() == '' || $('#unit-model-engine').val().trim() == '' || $('#unit-model-chassis').val().trim() == '' || $('#unit-color').val().trim() == '' ||
						$('#unit-plate-number').val().trim() == '' || $('#unit-year-model').val().trim() == '' || $('#unit-orcr-status').val().trim() == '' || 
						$('#unit-original-owner').val().trim() == '' || $('#unit-original-owners-id').val().trim() == '' || $('#unit-documents').val().trim() == '' || $('#unit-date-sold').val().trim() == '' || 
						$('#unit-date-surrender').val().trim() == '' ||  $('#unit-price').val().trim() == '' || $('#unit-loan-amount').val().trim() == '' || $('#unit-principal-balance').val().trim() == '' || 
						$('#unit-total-payment').val().trim() == '' || $('#unit-loan-number').val().trim() == '' || $('#unit-odo-meter').val().trim() == '' || $('#unit-location').val().trim() == ''
					){
						toast('Unit Details Tab: Please fill-up the red mark asterisk (*)', 'warning');
						return false;
					}
					else if($('#unit-times-repossessed').val().trim() == '' || $('#unit-times-repossessed').val().trim() < 1){
						toast('Unit Details Tab: Please fill-up the red mark asterisk (*)', 'warning');
						return false;
					}
					else if($('#unit-apprehension').val().trim() == ""){
						toast('Apprehension Record Tab: Please fill-up the red mark asterisk (*)', 'warning');
						return false;
					}
					else if($('#unit-apprehension').val().trim().toLowerCase() == "yes"){
						if($('#unit-apprehension-description').val().trim() == "" || $('#unit-apprehension-summary').val().trim() == ""){
							toast('Apprehension Record Tab: Please fill-up the red mark asterisk (*)', 'warning');
							return false;
						}
					}
				}

				if(timesRepoCounter > 1){
					for (let index = 1; index < timesRepoCounter; index++) {
						var names = $(`#unit-exOwner-${ index }`).val();

						if (names === '') {
							toast(`Check the Previous Owner No.${ index }`, 'warning');
							return false;
						}
					}
				}

				var required_files_count = requiredFiles.length
				var append_count = parseInt($('#append-counter').val())
				if(append_count > 0){
					let uploadedFiles = [];
					for (let i = 1; i <= filesCounter; i++) {
						if($(`#append-item-${ i }`).length){

							var id = parseInt($(`#image-id-${ i }`).val());
							var file = $(`#input-file-${ i }`)[0].files[0];
							var selected_file = $(`#seleted-image-${ i }`).val();
							var selected_filename = $(`#seleted-image-${ i } option:selected`).text();

							if(id == 0 && !file || !selected_file){
								toast(`Upload Files Tab: Please check the details of pictres if complete`, 'warning');
								return false;
							}

							var size = (id == 0 ? Math.round(($(`#input-file-${ i }`)[0].files[0].size / 1024)) : 0);
							if(id == 0 && size > 3072){
								toast(`The file size of ${ selected_filename } is exceeded in 3 MB.`, 'warning');
								return false;
							}

							uploadedFiles.push(selected_file);
						}
					}

					var isCompleteRequiredFiles = requiredFiles.every(item => uploadedFiles.includes(item.id));
					if(!isCompleteRequiredFiles){
						toast(`Upload Files Tab: Upload the ${ required_files_count } required files`, 'warning');
						return false;
					}

					var filterRedundant = checkRedundancy(requiredFiles, uploadedFiles);
					if(filterRedundant != false){
						toast(`Upload Files Tab: Please check the file have redundant file: ${ filterRedundant }`, 'warning');
						return false;
					}

				}
				else{
					toast(`Upload Files Tab: Upload the ${ required_files_count } required files`, 'warning');
					return false;
				}

				if(parseInt($('#spare-parts-append-count').val()) > 0){
					for (let index = 1; index <= partsCounter; index++) {

						var partsId = $(`#unit-parts-${ index }`).val();
						var partsStatus = $(`#unit-parts-status-${ index }`).val();
						var partsPrice = $(`#unit-parts-price-${ index }`).val();
						var partsRemarks = $(`#unit-parts-remarks-${ index }`).val();

						if (partsId === '' || partsStatus === '' || partsPrice === '') {
							toast('Missing & Damaged Parts Tab: Please check the row if fields is not empty', 'warning');
							return false;
						}
					}
				}
				else if(!$('#certifying-unit').is(':Checked')){
					toast('Missing & Damaged Parts Tab: Please Check the checkbox if not available parts', 'warning')
					return false
				}

				showLoader()

				// console.log(`${ id } - ${ url }`)
				var from_data = new FormData();
				
				from_data.append('repo_id', $(this).data('repo-id'));
				from_data.append('customer_acumatica_id', $('#customer-acumatica-id').val());
				from_data.append('brand_id', $('#unit-brand').val());
				from_data.append('model_id', $('#unit-model').val());
				from_data.append('model_engine', $('#unit-model-engine').val().trim().toUpperCase());
				from_data.append('model_chassis', $('#unit-model-chassis').val().trim().toUpperCase());
				from_data.append('color_id', $('#unit-color').val());
				from_data.append('plate_number', $('#unit-plate-number').val().trim().toUpperCase());
				from_data.append('mv_file_number', $('#unit-mv-file-number').val().trim());
				from_data.append('year_model', $('#unit-year-model').val().trim());
				from_data.append('orcr_status', $('#unit-orcr-status').val().trim());
				from_data.append('original_owner', $('#unit-original-owner').val());
				from_data.append('original_owner_id', $('#unit-original-owners-id').val());
				from_data.append('unit_documents', $('#unit-documents').val().trim());
				from_data.append('date_sold', $('#unit-date-sold').val());
				from_data.append('date_surrender', $('#unit-date-surrender').val());
				from_data.append('original_srp', $('#unit-price').val().trim());
				from_data.append('unit_loan_amount', $('#unit-loan-amount').val());
				from_data.append('unit_principal_balance', $('#unit-principal-balance').val());
				from_data.append('unit_total_payment', $('#unit-total-payment').val());
				from_data.append('last_payment', $('#unit-date-last-payment').val().trim());
				from_data.append('loan_number', $('#unit-loan-number').val().trim());
				from_data.append('odo_meter', $('#unit-odo-meter').val().trim());
				from_data.append('location', $('#unit-location').val());
				from_data.append('apprehension', $('#unit-apprehension').val().toLowerCase());
				from_data.append('apprehension_description', $('#unit-apprehension-description').val());
				from_data.append('apprehension_summary', $('#unit-apprehension-summary').val().trim());
				from_data.append('certify_no_missing_and_damaged_parts', $('#certifying-unit').is(':Checked'));
				from_data.append('append_count', parseInt($('#append-counter').val()));
				from_data.append('spare_parts_count', parseInt($('#spare-parts-append-count').val()));
				from_data.append('module_id', parseInt(current_module_id));

				$('#save-details').prop('disabled', false);

				const exOnwers = [];
				for (let index = 1; index <= timesRepoCounter; index++) {
					var container = $(`#container-ex-onwers-${ index }`).length;

					if (container == 1) {
						exOnwers.push({'exOwner' : $(`#unit-exOwner-${ index }`).val() })
					}
				}
				from_data.append('times_repossessed', parseInt($('#unit-times-repossessed').val()));
				from_data.append('repossessed_exowner', JSON.stringify(exOnwers));

				for (let i = 1; i <= append_count; i++) {
					var append_id_if_exists = $(`#append-item-${ i }`).length;
					if(append_id_if_exists == 1){
						var file = $(`#input-file-${ i }`)[0].files[0];

						if(typeof file !== 'undefined'){ // to check if the append is deleted
							from_data.append(`image_fetch_id_${ i }`, $(`#image-id-${ i }`).val());
							from_data.append(`image_${ i }`, $(`#input-file-${ i }`)[0].files[0]);
							from_data.append(`image_id_${ i }`, $(`#seleted-image-${ i }`).val());
							from_data.append(`image_name_${ i }`, $(`#seleted-image-${ i } option:selected`).text());
						}
					}
				}

				for (let x = 1; x <= partsCounter; x++) {
					var append_id_if_exists = $(`#row-tools-${ x }`).length;
					if(append_id_if_exists == 1){
						from_data.append(`parts_unique_id_${ x }`, $(`#unit-spare-parts-id-${ x }`).val());
						from_data.append(`spare_parts_id_${ x }`, $(`#unit-parts-${ x }`).val());
						from_data.append(`spare_parts_status_${ x }`, $(`#unit-parts-status-${ x }`).val());
						from_data.append(`spare_parts_price_${ x }`, $(`#unit-parts-price-${ x }`).val());
						from_data.append(`spare_parts_remarks_${ x }`, $(`#unit-parts-remarks-${ x }`).val());
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
							toast(data.data, 'danger');
						}
						else{
							let msg = id == 0 ? 'Succesfully added!' : 'Succesfully updated!'
							toast(msg, 'success');
							$('#staticBackdrop').modal('hide')
                     display_table()
							add_receive_units()
						}
						hideLoader()
					},
					error: function(response) {
						hideLoader()
						$('#save-details').prop('disabled', false);
						toast(response.responseJSON.message, 'danger');
						forceLogout(response.responseJSON) //if token is expired
					}
				});

			});
		});

		async function display_table(){
			if ($.fn.DataTable.isDataTable("#received-unit-table")) {
				$('#received-unit-table').DataTable().clear().destroy();
			}

			$("#received-unit-table").DataTable({
				processing: true,
				serverSide: true,
				ajax: function(data, callback, settings) {
					fetch(`${baseUrl}/repo`, {
						method: 'GET',
						headers: {
							'Authorization': `Bearer ${auth.token}`,
							'Content-Type': 'application/json',
						}
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
					{ data: "total_upload_files", className: 'text-center' },
					{ data: "current_status" },
					{ data: null, defaultContent: '',
						fnCreatedCell: function(nTd, sData, oData, iRow, iCol){
							html = `
								<button class="btn btn-sm btn-soft-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
									onclick="edit(${ oData.id }, '${ oData.current_status }')"> 
									<i class="ri-edit-box-line"></i> Edit
								</button> 
							`;
							$(nTd).html(html);
						}
					},
				],
				dom: 'Bfrtip',
				buttons: [
					'excelHtml5'
				],
			});

			$('#add-receive-units').prop('disabled', false)
		}

		function add_receive_units(){
			fetch_color_list('')
			$('#save-details').show()
			$('#save-details').data('repo-id', 0);
			$('.btn-save-footer').hide()
			$('.apprehension-yes').hide()
			
			$('#customer-acumatica-id').val('').trigger('change').attr('disabled', false)
			$('#customer-first-name').val('')
			$('#customer-middle-name').val('')
			$('#customer-last-name').val('')
			$('#customer-contact-no').val('')
			$('#customer-complete-address').val('')

			$('#unit-brand').val('').trigger('change').attr('disabled', false)
			$('#unit-model').empty().append(`<option value=""> No Available Data </option>`).attr('disabled', false)
         $('#unit-plate-number').val('').attr('disabled', false)
			$('#unit-model-engine').val('').attr('disabled', false)
			$('#unit-model-chassis').val('').attr('disabled', false)
         $('#unit-color').val('').trigger('change').attr('disabled', false)
         $('#unit-mv-file-number').val('').attr('disabled', false)
         $('#unit-classification').val('').trigger('change').attr('disabled', false)
         $('#unit-year-model').val('').attr('disabled', false)
			$('#unit-price').val('').attr('disabled', false)
         $('#unit-date-sold').val('').attr('disabled', false)
         $('#unit-date-surrender').val('').attr('disabled', false)
         // $('#unit-msuisva-form').val('').attr('disabled', false)
			$('#unit-location').val('').trigger('change').attr('disabled', false)
			$('#unit-loan-number').val('').attr('disabled', false)
			$('#unit-odo-meter').val('').attr('disabled', false)

			$('#unit-description').val('').attr('disabled', false)
			$('#unit-documents').val('').attr('disabled', false)
			$('#unit-date-last-payment').val('').attr('disabled', false)
			
			$('#unit-original-owners-id').val('').trigger('change').attr('disabled', false)
			$('#unit-orcr-status').val('').trigger('change').attr('disabled', false)
			
			$('#unit-apprehension').val('').trigger('change').attr('disabled', false)
			$('#unit-apprehension-description').val('').trigger('change').attr('disabled', false)
			$('#unit-apprehension-summary').val('').attr('disabled', false)
			$('#unit-times-repossessed').val('0').attr('disabled', false)
			$('#multiple-times-repos').empty()
			$('#multiple-times-repos-fetch').empty()

			$('#append-counter').val(0)
			counter = 0;

			$('#append-upload-section').empty()
			$('#append-existing-upload-section').empty()
			
			filesCounter = 0
			partsCounter = 0
			$('#unit-loan-amount').val('').attr('disabled', false)
			$('#unit-total-payment').val('') .attr('disabled', false)
			$('#unit-principal-balance').val('').attr('disabled', false)
			$('#unit-original-owner').val('').attr('disabled', false)

			
			$('#div-button-add-upload').css('display', 'block')
			$('#add-new-spare-parts').css('display', 'block')

			$('#certifying-unit').prop('disabled', false);
			$('#spare-parts-append-count').val(0)
			$('#div-append-spare-parts').empty()
		}
		
		function button_show_hide(tab_id){
			if(tab_id == 'pills-spare-parts-tab'){
				$('.btn-save-footer').show()
			}
			else {
				$('.btn-save-footer').hide()
			}
		}

		function fetch_list_of_image(filesCounter, files_id = ''){
			$.ajax({
				url: `${ baseUrl }/list_of_files`, 
				type: 'GET', 
				headers:{
					'Authorization':`Bearer ${ auth.token }`,
				},
				success: function (response) {
					$(`#seleted-image-${ filesCounter }`).empty();
					var data = response.files
					requiredFiles = response.required
				
					if(data.length > 0){
						$(`#seleted-image-${ filesCounter }`).append(`<option value=""> Select Image </option>`);
						for (let i = 0; i < data.length; i++) {
							const el = data[i];
							$(`#seleted-image-${ filesCounter }`).append(`
								<option value="${ el.id }">
									${ el.isRequired == 1 ? `<span class="text-danger">*</span>` : `` } ${ el.filename }
								</option>
							`);
						}
					}
					else{
						$(`#seleted-image-${ filesCounter }`).append(`<option value=""> No Available Data </option>`);
					}
					$(`#seleted-image-${ filesCounter }`).val(files_id).trigger('change');
				},
				error: function(response) {
					toast(response.responseJSON.message, 'danger');
					forceLogout(response.responseJSON) //if token is expired
				}
			});
		}

		function view_image(filesCounter){
			var isEmpty = $(`#input-file-${ filesCounter }`).val()
			var item_id = $(`#seleted-image-${ filesCounter }`).val()
			var item_text = $(`#seleted-image-${ filesCounter } option:selected`).text()
			var item_source = $(`#input-file-${ filesCounter }-preview`).attr('src')

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

		function preview_photo(previewid){
			if(previewid != ''){
				const fileInput = $(`#${ previewid }`)[0];
				const file = fileInput.files[0];
				if (file){
					// console.log(file.name);

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
				else{
					// console.error('File is undefined or empty.');
					$(`#${ previewid }-preview`).attr('src', '../assets/images/small/img-4.jpg');
				}
			}
		}

		function fetch_customer_profile_list(){
			$.ajax({
				url: `${ baseUrl }/listOfCustomer`, 
				type: 'GET', 
				headers:{
					'Authorization':`Bearer ${ auth.token }`,
				},
				success: function (data) {
					$('#customer-acumatica-id').empty();

					if(data.length > 0){
						$('#customer-acumatica-id').append(`<option value=""> Select Customer </option>`);
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
					forceLogout(response.responseJSON) //if token is expired
				}
			});
		}

		function fetch_locations_list(){
			$.ajax({
				url: `${ baseUrl }/list_of_location`, 
				type: 'GET', 
				headers:{
					'Authorization':`Bearer ${ auth.token }`,
				},
				success: function (data) {
					$('#unit-location').empty();

					if(data.length > 0){
						$('#unit-location').append(`<option value=""> Select Location </option>`);
						for (let i = 0; i < data.length; i++) {
							const el = data[i];
							if(el.status == 1){
								$('#unit-location').append(`<option value="${ el.id }">${ el.name }</option>`);
							}
						}
					}
					else{
						$('#unit-location').append(`<option value=""> No Available Data </option>`);
					}
					$('#unit-location').val('').trigger('change');
				},
				error: function(response) {
					toast(response.responseJSON.message, 'danger');
					forceLogout(response.responseJSON) //if token is expired
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
					$('#customer-complete-address').val(`${ data.fulladdress }`)
				},
				error: function(response) {
					toast(response.responseJSON.message, 'danger');
					forceLogout(response.responseJSON) //if token is expired
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
						$('#unit-brand').append(`<option value=""> Select Brand </option>`);
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
					forceLogout(response.responseJSON) //if token is expired
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
						$('#unit-model').append(`<option value=""> Select Model </option>`);
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
					forceLogout(response.responseJSON) //if token is expired
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
						$('#unit-model').append(`<option value=""> Select Model </option>`);
						for (let i = 0; i < data.length; i++) {
							const el = data[i];
							$('#unit-model').append(`<option value="${ el.id }">${ el.model_name }</option>`);
						}
					}
					else{
						$('#unit-model').append(`<option value=""> No Available Data </option>`);
					}
					$('#unit-model').val(modelid).trigger('change').attr('disabled', attrValue)
				},
				error: function(response) {
					toast(response.responseJSON.message, 'danger');
					forceLogout(response.responseJSON) //if token is expired
				}
			});
		}

		function fetch_color_list(color_id = ''){
			$.ajax({
				url: `${ baseUrl }/getMapColor`, 
				type: 'GET', 
				headers:{
					'Authorization':`Bearer ${ auth.token }`,
				},
				success: function (data) { 
					$('#unit-color').empty();

					if(data.length > 0){
						$('#unit-color').append(`<option value=""> Select Color </option>`);
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
					forceLogout(response.responseJSON) //if token is expired
				}
			});
		}

		function fetch_spare_parts_list(partsCounter, modelid, partsid = ''){
			$.ajax({
				url: `${ baseUrl }/partsPerModel`, 
				type: 'GET', 
				headers:{
					'Authorization':`Bearer ${ auth.token }`,
				},
				success: function (data) {
					// console.log(data)
					$(`#unit-parts-${ partsCounter }`).empty();

					if(data.length > 0){
						$(`#unit-parts-${ partsCounter }`).append(`<option value=""> Select Spart Parts </option>`);
						for (let i = 0; i < data.length; i++) {
							const el = data[i];
							$(`#unit-parts-${ partsCounter }`).append(`<option value="${ el.value }">${ el.label }</option>`);
						}
					}
					else{
						$(`#unit-parts-${ partsCounter }`).append(`<option value=""> No Available Data </option>`);
					}
					$(`#unit-parts-${ partsCounter }`).val(partsid != '' ? partsid : '').trigger('change');
				},
				error: function(response) {
					toast(response.responseJSON.message, 'danger');
					forceLogout(response.responseJSON) //if token is expired
				}
			});
		}

		function fetch_price_per_parts(element, new_value = ''){
			var pieces = $(element).attr('id').split('-')
			var last = pieces[pieces.length - 1]
			var parts_id = $(element).val()

			if(new_value){
				$(`#unit-parts-price-${ last }`).val(roundOf(new_value))
				$(`#unit-parts-price-${ last }`).attr('placeholder', roundOf(new_value))
			}
			else {
				if(parts_id != ''){
					$.ajax({
						url: `${ baseUrl }/partsPrice/${ parts_id }`, 
						type: 'GET', 
						headers:{
							'Authorization':`Bearer ${ auth.token }`,
						},
						success: function (data) {
							$(`#unit-parts-price-${ last }`).val(roundOf(data.price))
							$(`#unit-parts-price-${ last }`).attr('placeholder', roundOf(data.price))
						},
						error: function(response) {
							toast(response.responseJSON.message, 'danger');
							forceLogout(response.responseJSON) //if token is expired
						}
					})
				}
			}
		}

		function remove_image(filesCounter, deleted_id = 0){
			$(`#append-item-${ filesCounter }`).remove();
			if(deleted_id > 0){
				$.ajax({
					url: `${ baseUrl }/repoDeleteFiles/${ deleted_id }`, 
					type: 'GET', 
					headers:{
						'Authorization':`Bearer ${ auth.token }`,
					},
					success: function (data) {
						$(`#append-item-${ filesCounter }`).remove();
						toast(`File ${ data } Successfully Deleted`, 'success');
					}
				});
			}
			$('#append-counter').val( parseInt($('#append-counter').val()) - 1 )
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

			$('#spare-parts-append-count').val( parseInt($('#spare-parts-append-count').val()) - 1)
			parseInt($('#spare-parts-append-count').val()) > 0 ? $('#certifying-unit').prop('disabled', true) : $('#certifying-unit').prop('disabled', false)
		}

		function checkRedundancy(requiredJson, receivedArray) {
			const requiredIds = requiredJson.map(item => item.id);
			const idCounts = receivedArray.reduce((counts, id) => {
				counts[id] = (counts[id] || 0) + 1;
				return counts;
			}, {});

			const redundantIds = Object.entries(idCounts).some(([id, count]) => count > requiredIds.filter(reqId => reqId === id).length);

			if (redundantIds.length > 0) {
				const redundantFileIds = redundantIds.map(([id, _]) => id);
				const redundantFiles = requiredJson.filter(item => redundantFileIds.includes(item.id)).map(item => item.filename);
				return `Redundant files: ${redundantFiles.join(", ")}`;
			} else {
				return false;
			}
		}

		function edit(id){
			$('#save-details').prop('disabled', true);
			$('#save-details').data('repo-id', id);
			
			$.ajax({
				url: `${ baseUrl }/repoDetailsPerId/${ id }/${ current_module_id }`, 
				type: 'GET', 
				headers:{
					'Authorization':`Bearer ${ auth.token }`,
				},
				success: function (data) {
					// console.log(data)

					data.disabled == true ? $('#save-details').hide() : $('#save-details').show()

					$('#save-details').data('repo-id', data.repo.id)
					$('#customer-acumatica-id').val(data.customer_details.id).trigger('change').attr('disabled', attrValue)
					$('#unit-brand').val(data.brand_details.id).trigger('change').attr('disabled', attrValue)
			   	fetch_branch_with_model(data.brand_details.id, data.model_details.id)

               $('#unit-plate-number').val(data.repo.plate_number).attr('disabled', attrValue)
               $('#unit-model-engine').val(data.repo.model_engine).attr('disabled', attrValue)
					color_id = data.repo.color_id;

               $('#unit-model-chassis').val(data.repo.model_chassis).attr('disabled', attrValue)
               $('#unit-color').val(data.repo.color_id).trigger('change').attr('disabled', attrValue)
					
               $('#unit-mv-file-number').val(data.repo.mv_file_number).attr('disabled', attrValue)
               $('#unit-orcr-status').val(data.repo.orcr_status).trigger('change').attr('disabled', attrValue)
               $('#unit-year-model').val(data.repo.year_model).attr('disabled', attrValue)
               $('#unit-price').val(roundOf(data.repo.original_srp)).attr('disabled', attrValue)
               $('#unit-original-owner').val(data.received_details.original_owner).attr('disabled', attrValue)
               $('#unit-original-owners-id').val(data.received_details.original_owner_id).trigger('change').attr('disabled', attrValue)
               $('#unit-loan-amount').val(roundOf(data.received_details.loan_amount)).attr('disabled', attrValue)
               $('#unit-total-payment').val(roundOf(data.received_details.total_payments)).attr('disabled', attrValue)
               $('#unit-principal-balance').val(roundOf(data.received_details.principal_balance)).attr('disabled', attrValue)
               $('#unit-date-sold').val(data.repo.date_sold).attr('disabled', attrValue)
               $('#unit-date-surrender').val(data.repo.date_surrender).attr('disabled', attrValue)
					// $('#unit-msuisva-form').val(data.repo.msuisva_form_no).attr('disabled', attrValue)
					$('#unit-location').val(data.repo.location).trigger('change').attr('disabled', attrValue)
					$('#unit-loan-number').val(data.repo.loan_number).attr('disabled', attrValue)
					$('#unit-odo-meter').val(data.repo.odo_meter).attr('disabled', attrValue)
					$('#unit-documents').val(data.repo.unit_documents).attr('disabled', attrValue)
					$('#unit-date-last-payment').val(data.repo.last_payment).attr('disabled', attrValue)

					$('#unit-apprehension').val(data.repo.apprehension).trigger('change').attr('disabled', attrValue)
					$('#unit-apprehension-description').val(data.repo.apprehension_description).trigger('change').attr('disabled', attrValue)
					$('#unit-apprehension-summary').val(data.repo.apprehension_summary).attr('disabled', attrValue)
					$('#unit-times-repossessed').val(data.repo.times_repossessed).attr('disabled', attrValue)

					$('#multiple-times-repos').empty()
					$('#multiple-times-repos-fetch').empty()
					const owners = JSON.parse(data.repo.repossessed_exowner);
					if(owners != null){
						const exOwnerCounter = 1;
						for (let index = 0; index < owners.length; index++) {
							const element = owners[index];
							const count = exOwnerCounter + index + 1;

							$('#multiple-times-repos').append(`
								<div class="col-sm-3">
									<div class="mb-3">
										<label class="form-label"> Previous Owner ${ count } </label>
										<input type="text" id="unit-exOwner-${ count }" type="text" class="form-control" placeholder="Previous Owner No.${ count }" value="${ element.exOwner }">
									</div>
								</div>
							`);
							$(`#unit-exOwner-${ count }`).attr('disabled', attrValue)
						}
					}

					var filesJson = data.picture_details;

					// div-button-add-upload
					$('#div-button-add-upload').css('display', (data.disabled === true ? 'none' : 'block'))
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
								<input type="hidden" id="image-id-${ append_count }" value="${ el.id }">
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
											<button class="btn btn-sm btn-danger bg-gradient waves-effect waves-light" type="button" onclick="remove_image(${ append_count }, ${ el.id })" style="display:${ data.disabled === true ? 'none' : 'block' };">
												<i class="ri-delete-bin-line label-icon align-middle"></i>
											</button>
										</div>
									</figcaption>
								</figure>
							</div>
						`)

						fetch_list_of_image(append_count, el.files_id)
					}
					filesCounter = filesJson.length
					$('#append-counter').val(`${ filesJson.length }`);
					
					// add-new-spare-parts
					$('#add-new-spare-parts').css('display', (data.disabled === true ? 'none' : 'block'))
					var partsJson = data.parts_details;
					$('#div-append-spare-parts').empty()
					for (let i = 0; i < partsJson.length; i++){
						const el = partsJson[i];

						var append_count = i + 1;

						$('#div-append-spare-parts').append(`
							<div id="row-tools-${ append_count }" class="col-lg-12 row">
								<input type="hidden" id="unit-spare-parts-id-${ append_count }" value="${ el.id }">
								<div class="col-sm-3">
									<div class="mb-3">
										<select id="unit-parts-${ append_count }" class="select-single-modal" onchange="fetch_price_per_parts(this, ${ roundOf(el.latest_price) })"></select>
									</div>
								</div>
								
								<div class="col-sm-3">
									<div class="mb-3">
										<select id="unit-parts-status-${ append_count }" class="form-control">
											<option value=""> Select Status </option>
											<option value="Damaged"> Damaged </option>
											<option value="Missing"> Missing </option>
										</select>
									</div>
								</div>

								<div class="col-sm-2">
									<div class="mb-3">
										<input type="text" id="unit-parts-price-${ append_count }" class="form-control number-format text-end" value="${ roundOf(el.latest_price) }" placeholder="0.00" autocomplete="off">
									</div>
								</div>

								<div class="col-sm-3">
									<div class="mb-3">
										<input type="text" id="unit-parts-remarks-${ append_count }" class="form-control isNullPrice" placeholder="Remarks" autocomplete="off" value="${ (el.parts_remarks == null ? '' : el.parts_remarks) }">
									</div>
								</div>

								<div class="col-sm-1">
									<div class="mb-3">
										<button type="button" id="remove-row-${ append_count }" class="btn btn-danger remove-row" data-row-id="${ append_count }" onclick="remove_parts(${ append_count }, ${ el.id })" style="display:${ data.disabled === true ? 'none' : 'block' };">
											<i class="ri-subtract-line align-bottom"></i>
										</button>
									</div>
								</div>
							</div>
						`);

						$(`#unit-parts-status-${ append_count }`).val(el.parts_status).trigger('change')
						var choices2 = new Choices(`#unit-parts-status-${ append_count }`);
						fetch_spare_parts_list(append_count, data.model_details.id, el.parts_id)
						$(".select-single-modal").select2({ dropdownParent: $('#staticBackdrop') });
						$(`#unit-parts-price-${ append_count }`).val(roundOf(el.latest_price))
					}
					partsCounter = partsJson.length
					$('#spare-parts-append-count').val(`${ partsJson.length }`);

					var cert_value = (data.received_details.is_certified_no_parts == "true" || partsJson.length == 0 ? true : false);
					$('#certifying-unit').attr('checked', cert_value).attr('disabled', !cert_value)
					$('#add-new-spare-parts').attr('disabled', cert_value)

					$('#save-details').prop('disabled', false);
				}
			});
		}
	</script>
</body>
</html>