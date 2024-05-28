
<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>
	<title> Repo Tagging Approval | RMU </title>
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
								<h4 class="mb-sm-0" id="header-breadcram">Repo Tagging Approval</h4>
							</div>
						</div>
					</div>
					<!-- end page title -->

					<div class="row">
						<!-- table -->
						<div class="col-lg-12">
							<div class="card">
								<div class="card-header align-items-center d-flex">
									<h4 class="card-title mb-0 flex-grow-1">List of Repo Tagging Approval</h4>
								</div>
								<div class="card-body">
									<table id="repo-tagging-table" class="table table-bordered nowrap align-middle mdl-data-table" style="width:100%">
										<thead>
											<tr>
												<th> Branch </th>
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
								<div class="alert alert-secondary text-dark" role="alert">
									Always click the last Tab to save the changes.
								</div>

								<ul class="nav nav-pills nav-justified custom-nav" role="tablist">
									<li class="nav-item" role="presentation" >
										<button class="nav-link fs-15 p-3 active" id="pills-bill-info-tab" data-bs-toggle="pill" data-bs-target="#pills-bill-info" type="button" role="tab" aria-controls="pills-bill-info" aria-selected="false" data-position="0" tabindex="-1">
											<!-- <i class="ri-user-2-line fs-16 p-2 bg-soft-primary text-primary rounded-circle align-middle me-2 mb-2"></i> -->
											<span> Owner's Information </span>
										</button>
									</li>
									<li class="nav-item" role="presentation">
										<button class="nav-link fs-15 p-3 done" id="pills-unit-details-tab" data-bs-toggle="pill" data-bs-target="#pills-bill-address" type="button" role="tab" aria-controls="pills-bill-address" aria-selected="false" data-position="1" tabindex="-1">
											<!-- <i class="ri-motorbike-fill fs-16 p-2 bg-soft-primary text-primary rounded-circle align-middle me-2"></i>  -->
											<span> Unit Details </span>
 										</button>
									</li>
									<li class="nav-item" role="presentation">
										<button class="nav-link fs-15 p-3 done" id="pills-apprehension-record-tab" data-bs-toggle="pill" data-bs-target="#pills-apprehension-record" type="button" role="tab" aria-controls="pills-apprehension-record" aria-selected="false" data-position="1" tabindex="-1">
											<!-- <i class="ri-motorbike-fill fs-16 p-2 bg-soft-primary text-primary rounded-circle align-middle me-2"></i>  -->
											<span> Apprehension Record </span>
										</button>
									</li>
									<li class="nav-item" role="presentation">
										<button class="nav-link fs-15 p-3 done" id="pills-upload-file-tab" data-bs-toggle="pill" data-bs-target="#pills-upload-file" type="button" role="tab" aria-controls="pills-upload-file" aria-selected="false" data-position="3" tabindex="-1">
											<!-- <i class="ri-file-upload-line fs-16 p-2 bg-soft-primary text-primary rounded-circle align-middle me-2"></i>  -->
											<span> Upload Files </span>
										</button>
									</li>
									<li class="nav-item" role="presentation">
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
													<label class="form-label"> Times Repossessed </label>
													<input id="unit-times-repossessed" type="text" class="form-control text-right" value="" placeholder="0" onkeypress="" autocomplete="off" disabled>
												</div>
											</div>

											<div class="row" id="multiple-times-repos"></div>
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
					<button id="approver-decision" class="btn btn-success waves-effect approver" onclick="approver_decision(this, 0)" data-repo-id="0"> 
						<i class="ri-thumb-up-line me-1 align-middle"></i> Approve 
					</button> 
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
		var moduleid = 0;
		var color_id = '', counter = 0, filesCounter = 0, partsCounter = 0;
		$(document).ready(function(){
			getModuleId()
			
			fetch_brand_list()
         fetch_customer_profile_list()
			fetch_locations_list()
			fetch_list_of_image('0')

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
		});

		function getModuleId(){
			let page_url = window.location.href
			let pagename = page_url.split('/').pop()

			$.ajax({
				url: `${baseUrl}/getCurrentModule/${pagename}`, 
				type: 'GET', 
				headers:{
					'Authorization':`Bearer ${ auth.token }`,
				},
				success: function (data) {
					moduleid = data // 25
					display_table(data)
				},
				error: function(response) {
					toast(response.responseJSON.message, 'danger');
					forceLogout(response.responseJSON) //if token is expired
				}
			});
		}

		async function display_table(moduleid){

			let data = null

			const tableData = await $.ajax({
				url: `${ baseUrl }/fetch_repo_approval/${ moduleid }`,
				method: 'GET',
				dataType: 'json',
				headers:{
					'Authorization':`Bearer ${ auth.token }`,
				}
			});

			data = tableData.data

			$("#repo-tagging-table").DataTable().destroy();
			$("#repo-tagging-table").DataTable({
				deferRender: true,
				searching: true,
				scrollY: 400,
		  		scrollX: true,
				scrollCollapse: true,
				paging: false,
				data: data,
				columns: [
					{ data: "branch_name" },
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
					{ data: null, defaultContent: '',
						fnCreatedCell: function(nTd, sData, oData, iRow, iCol){
							html = `
								<button class="btn btn-sm btn-warning waves-effect approver"  data-bs-toggle="modal" data-bs-target="#staticBackdrop" 
									onclick="view_details(${ oData.id }, 3)"> 
									<i class="ri-edit-line me-1 align-middle"></i> Edit 
								</button> 
							`;
							$(nTd).html(html);
						}
					},
				],
				dom: 'Bfrtip',
				buttons: [
					'excelHtml5'
				]

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
					forceLogout(response.responseJSON) //if token is expired
				}
			});
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
					forceLogout(response.responseJSON) //if token is expired
				}
			});
		}

		function fetch_locations_list(){
			$.ajax({
				url: `${ baseUrl }/locationList`, 
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

					if(data.length > 0){
						$(`#seleted-image-${ filesCounter }`).append(`<option value=""> Select Image </option>`);
						for (let i = 0; i < data.length; i++) {
							const el = data[i];
							$(`#seleted-image-${ filesCounter }`).append(`<option value="${ el.id }">${ el.filename }</option>`);
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
					$('#unit-model').val(modelid).trigger('change').prop('disabled', true)
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
					forceLogout(response.responseJSON) //if token is expired
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
					$('#unit-color').val(color_id).trigger('change').prop('disabled', true);
				},
				error: function(response) {
					toast(response.responseJSON.message, 'danger');
					forceLogout(response.responseJSON) //if token is expired
				}
			});
		}

		function fetch_spare_parts_list(partsCounter, partsid = ''){
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
						$(`#unit-parts-${ partsCounter }`).append(`<option value=""> Choose Spart Parts </option>`);
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

		function view_details(id, moduleid){
			$('#approver-decision').prop('disabled', true);
			$.ajax({
				url: `${ baseUrl }/repoDetailsPerId/${ id }/${ moduleid }`, 
				type: 'GET', 
				headers:{
					'Authorization':`Bearer ${ auth.token }`,
				},
				success: function (data) {
					// console.log(data)
					$('#approver-decision').data('repo-id', data.repo.id)
					$('#customer-acumatica-id').val(data.customer_details.id).trigger('change').prop('disabled', true)
					$('#unit-brand').val(data.brand_details.id).trigger('change').trigger('change').prop('disabled', true)
			   	fetch_branch_with_model(data.brand_details.id, data.model_details.id)

               $('#unit-plate-number').val(data.repo.plate_number).trigger('change').prop('disabled', true)
               $('#unit-model-engine').val(data.repo.model_engine).trigger('change').prop('disabled', true)
					color_id = data.repo.color_id;

               $('#unit-model-chassis').val(data.repo.model_chassis).trigger('change').prop('disabled', true)
               $('#unit-color').val(data.repo.color_id).trigger('change').trigger('change').prop('disabled', true)
					
               $('#unit-mv-file-number').val(data.repo.mv_file_number).trigger('change').prop('disabled', true)
               $('#unit-year-model').val(data.repo.year_model).trigger('change').prop('disabled', true)
               $('#unit-price').val(roundOf(data.repo.original_srp)).trigger('change').prop('disabled', true)
               $('#unit-original-owner').val(data.received_details.original_owner).trigger('change').prop('disabled', true)
               $('#unit-loan-amount').val(roundOf(data.received_details.loan_amount))
               $('#unit-total-payment').val(roundOf(data.received_details.total_payments))
               $('#unit-principal-balance').val(roundOf(data.received_details.principal_balance))
               $('#unit-date-sold').val(data.repo.date_sold).trigger('change').prop('disabled', true)
               $('#unit-date-surrender').val(data.repo.date_surrender).trigger('change').prop('disabled', true)
					$('#unit-msuisva-form').val(data.repo.msuisva_form_no).trigger('change').prop('disabled', true)
					$('#unit-location').val(data.repo.location).trigger('change').attr('disabled', true)
					$('#unit-loan-number').val(data.repo.loan_number).attr('disabled', true)
					$('#unit-odo-meter').val(data.repo.odo_meter).attr('disabled', true)
					$('#unit-description').val(data.repo.unit_description).attr('disabled', true)
					$('#unit-documents').val(data.repo.unit_documents).attr('disabled', true)
					$('#unit-date-last-payment').val(data.repo.last_payment).attr('disabled', true)
               $('#unit-original-owners-id').val(data.received_details.original_owner_id).trigger('change').attr('disabled', true)
               $('#unit-orcr-status').val(data.repo.orcr_status).trigger('change').attr('disabled', true)
					$('#unit-apprehension').val(data.repo.apprehension).trigger('change').attr('disabled', true)
					$('#unit-apprehension-description').val(data.repo.apprehension_description).trigger('change').attr('disabled', true)
					$('#unit-apprehension-summary').val(data.repo.apprehension_summary).attr('disabled', true)
					$('#unit-times-repossessed').val(data.repo.times_repossessed).attr('disabled', true)

					$('#multiple-times-repos').empty()
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
										<input type="text" class="form-control" value="${ element.exOwner }"  disabled>
									</div>
								</div>
							`);
						}
					}
					

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
										</div>
									</figcaption>
								</figure>
							</div>
						`)

						fetch_list_of_image(append_count, el.files_id)
					}
					filesCounter = filesJson.length
					$('#append-counter').val(`${ filesJson.length }`);
					
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
										<select id="unit-parts-${ append_count }" class="select-single-modal"></select>
									</div>
								</div>
								
								<div class="col-sm-3">
									<div class="mb-3">
										<select id="unit-parts-status-${ append_count }" class="form-control">
											<option value=""> Choose Status </option>
											<option value="Damaged"> Damaged </option>
											<option value="Missing"> Missing </option>
										</select>
									</div>
								</div>

								<div class="col-sm-2">
									<div class="mb-3">
										<input type="text" id="unit-parts-price-${ append_count }" class="form-control number-format text-end" placeholder="0.00" autocomplete="off" value="${ roundOf(el.price) }" disabled>
									</div>
								</div>

								<div class="col-sm-4">
									<div class="mb-3">
										<input type="text" id="unit-parts-remarks-${ append_count }" class="form-control isNullPrice" placeholder="Remarks" autocomplete="off" value="${ (el.parts_remarks == null ? '' : el.parts_remarks) }" disabled>
									</div>
								</div>
							</div>
						`);

						$(`#unit-parts-status-${ append_count }`).val(el.parts_status).trigger('change').prop('disabled', true)
						var choices2 = new Choices(`#unit-parts-status-${ append_count }`);
						fetch_spare_parts_list(append_count, el.parts_id)
						$(".select-single-modal").select2({ dropdownParent: $('#staticBackdrop') });
					}
					partsCounter = partsJson.length
					$('#spare-parts-append-count').val(`${ partsJson.length }`);

					var cert_value = (data.received_details.is_certified_no_parts == "true" || partsJson.length == 0 ? true : false);
					$('#certifying-unit').attr('checked', cert_value).attr('disabled', true)

					$('#approver-decision').prop('disabled', false);
				}
			});
		}

		function approver_decision(element, status){
			var repoid = $(element).data('repo-id');
			showLoader()

			$.ajax({
				url: `${ baseUrl }/repo_approver_decision`, 
				type: 'POST', 
				headers:{
					'Authorization':`Bearer ${ auth.token }`,
				},
				data: {
					moduleid: moduleid,
					recordid: repoid,
					status: status,
					loanAmount: $('#unit-loan-amount').val(),
					totalPayment: $('#unit-total-payment').val(),
					principalBalance: $('#unit-principal-balance').val(),
				},	
				success: function (data) {
					// console.log(data)
					if(!data.success){
						toast(data.message, 'danger');
					}
					else{
						toast(data.message, 'success');
						$('#staticBackdrop').modal('hide')
						getModuleId()
					}
					hideLoader()
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