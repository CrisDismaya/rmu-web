<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>
	<title> Sales Tagging | RMU </title>
	<?php include_once './_partials/__header-template.php'; ?>
	<style>
		.seperator {
			border-right: 1px solid;
			padding-right: 20px;
		}

		.note {
			background-color: #f5f3b3;
			margin-top: 10px;
			border-radius: 6px;
			height: 70px;
			padding: 20px;
		}
	</style>
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
								<h4 class="mb-sm-0" id="header-breadcram">Sales Tagging Of Units</h4>

							</div>
						</div>
					</div>

					<div class="row">
						<!-- table -->
						<div class="col-lg-12">
							<div class="card">
								<div class="card-header align-items-center d-flex">
									<h4 class="card-title mb-0 flex-grow-1">List of Units</h4>
									<div class="flex-shrink-0">
										<button type="button" id="tagunit" class="btn btn-soft-primary btn-sm">
											+ Tag Unit
										</button>
									</div>
								</div>
								<div class="card-body">
									<table id="sales-tagging-table" class="table table-bordered nowrap align-middle mdl-data-table" style="width:100%">
										<thead>
											<tr>
												<th>Branch</th>
												<th>Invoice Reference #</th>
												<th>External Reference #</th>
												<th>Agent ID #</th>
												<th> Brand </th>
												<th> Model </th>
												<th> Color </th>

												<th style="text-align: left !important;">Price </th>
												<th> Engine </th>
												<th> Chassis </th>
												<th> Sale Type </th>
												<th> Sold Date </th>
												<th> Ex. Owner </th>
												<th> Sold To </th>
												<th> Amount Paid </th>
												<th> Downpayment </th>
												<th> Monthly Amortization </th>
												<th> Rebate </th>
												<th> Terms </th>
												<th> Interest Rate </th>
												<th> Rate </th>
												<th> Amount Finance </th>
												<th> status </th>
												<th> Remarks </th>
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

			<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog modal-xl" id="modal-tag" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="myExtraLargeModalLabel"> Sales Details </h5>
							<button type="button" onclick="closeModal()" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body container">

							<div class="card pa-2">
								<!--search for repo details-->
								<div class="row" id="list">
									<table id="received-unit-table" class="table table-bordered nowrap align-middle mdl-data-table" style="width:100%">
										<thead>
											<tr>
												<th>Branch</th>
												<th> Brand </th>
												<th> Model </th>
												<th> Color </th>
												<th style="text-align: left !important;">Price </th>
												<th> Engine </th>
												<th> Chassis </th>
												<th> Ex Owner </th>
												<th> Action </th>
											</tr>
										</thead>
									</table>
								</div>

								<!--repo inputed details for sale tagging-->
								<div class="row" id="details">
									<div class="col-lg-6 col-md-6 col-sm-6 col-12 seperator">
										<div class="col-12">

											<label for="customer-name" class="col-form-label">Branch</label>
											<input type="text" class="form-control" id="branch" autocomplete="off" disabled>
										</div>
										<div class="col-12">

											<label for="customer-name" class="col-form-label">Brand</label>
											<input type="text" class="form-control" id="brand" placeholder="Brand" autocomplete="off" disabled>
										</div>
										<div class="col-12">
											<label for="customer-name" class="col-form-label">Model</label>
											<input type="text" class="form-control" id="model" placeholder="Model" autocomplete="off" disabled>
										</div>
										<div class="col-12">
											<label for="customer-name" class="col-form-label">Color</label>
											<input type="text" class="form-control" id="color" placeholder="Model" autocomplete="off" disabled>
										</div>
										<div class="col-12">
											<label for="customer-name" class="col-form-label">Engine</label>
											<input type="text" class="form-control" id="engine" placeholder="Engine #" autocomplete="off" disabled>
										</div>
										<div class="col-12">
											<label for="customer-name" class="col-form-label">Chassis #</label>
											<input type="text" class="form-control" id="chassis" placeholder="Chassis #" autocomplete="off" disabled>
										</div>
										<div class="col-12">
											<label for="customer-name" class="col-form-label">Selling Price (This includes refurbish parts cost if any)</label>
											<input type="text" class="form-control" id="price" autocomplete="off" disabled>
										</div>
										<div class="col-12">
											<label for="customer-name" class="col-form-label">Ex. owner</label>
											<input type="text" class="form-control" id="ex_owner" autocomplete="off" disabled>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-6 col-12">
										<div class="col-12">
											<input type="hidden" id="tag-id">
											<input type="hidden" id="repo_id">
											<input type="hidden" id="received_id">
											<label for="customer-name" class="col-form-label">Invoice #</label>
											<input type="text" class="form-control" id="invoice" placeholder="Invoice #" autocomplete="off">
										</div>
										<div class="col-12">
											<div class="row">
												<div class="col-6 form-icon right">
													<label class="col-form-label"> Agent <small class="text-muted">(Optional)</small></label>
													<select id="agent" class="select-single">
														<option></option>
													</select>
													<i class="bx bx-hourglass bx-spin font-size-16 align-middle me-2" id="agent-loader" style="bottom: -35px; right:120px;"></i>
												</div>
												<div class="col-6">
													<label class="col-form-label"> External Reference # </label>
													<input type="text" class="form-control" id="external_ref" placeholder="External Reference #" autocomplete="off">
												</div>
											</div>
										</div>
										<div class="col-12">
											<div class="row">
												<div class="col-6">
													<label class="col-form-label"> Sale Type </label>
													<select id="type" class="select-single">
														<option></option>
														<option value="C">Cash</option>
														<option value="I">Installment</option>
													</select>
												</div>
												<div class="col-6">
													<label class="col-form-label"> Sold To </label>
													<select id="new_owner" class="select-single-modal"></select>
												</div>
											</div>
										</div>
										<div class="col-12">
											<label for="customer-name" class="col-form-label">Sold Date</label>
											<input type="date" class="form-control" id="sold_date" autocomplete="off">
										</div>
										<div class="col-12" id="amo_pd">
											<label for="customer-name" class="col-form-label">Amount Paid</label>
											<input type="number" class="form-control" id="amount_paid" autocomplete="off">
										</div>
										<div id="installment_det">
											<div class="col-12">
												<label for="customer-name" class="col-form-label">Downpayment</label>
												<input type="number" class="form-control" id="dp" autocomplete="off" onchange="calculateAmountFinance()">
											</div>
											<div class="col-12">
												<div class="row">
													<div class="col-6">
														<label class="col-form-label"> Rate </label>
														<select id="rate" class="select-single" onchange="calculateInterestRate()">
															<option>--Select Rate--</option>
															<option value="0.01">1 %</option>
															<option value="0.015">1.5 %</option>
															<option value="0.03">3 %</option>
														</select>
													</div>
													<div class="col-6">
														<label for="customer-name" class="col-form-label">Rebate</label>
														<input type="number" class="form-control" id="rebate" autocomplete="off">
													</div>
												</div>
											</div>
											<div class="col-12">
												<div class="row">
													<div class="col-6">
														<label class="col-form-label"> Terms </label>
														<select id="terms" class="select-single" onchange="calculateInterestRate()">
															<option>--Select Terms--</option>
															<option value="6">6 Months</option>
															<option value="12">12 Months</option>
															<option value="18">18 Months</option>
															<option value="24">24 Months</option>
															<option value="36">36 Months</option>
														</select>
													</div>
													<div class="col-6">
														<label for="customer-name" class="col-form-label">Interest Rate</label>
														<input type="number" class="form-control" id="interest-rate" autocomplete="off" onchange="calculateAmortization()" disabled>
													</div>
												</div>

											</div>
											<div class="col-12">
												<div class="row">
													<div class="col-6">
														<label for="customer-name" class="col-form-label">Amount Finance</label>
														<input type="number" class="form-control" id="amount_finance" autocomplete="off" disabled>
													</div>
													<div class="col-6">
														<label for="customer-name" class="col-form-label">Monthly Amortization</label>
														<input type="number" class="form-control" id="monthly" autocomplete="off" disabled>
													</div>
												</div>

											</div>
											<div class="col-12" id="rnr">
												<label for="customer-name" class="col-form-label">Please Upload Approved RNR</label>
												<div>
													<input type="file" id="rnr-uploader" />
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- end card body -->

							</div>
						</div>
						<div class="modal-footer btn-save-footer note1">
							<button id="save-details" data-id="0" type="button" class="btn btn-primary" data-receive-unit-id="0">Submit</button>
							<button id="back" onclick="backToSearch()" data-id="0" type="button" class="btn btn-primary">Back</button>
							<!-- <a href="javascript:void(0);" class="btn btn-link link-success fw-medium" data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i> Close</a> -->

						</div>

					</div>
				</div>
			</div>
		</div>
		
		<div class="modal fade" id="approvalModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-xl" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="myExtraLargeModalLabel"> Sales Details </h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body container">

						<div class="card pa-2">



							<!--repo inputed details for sale tagging-->
							<div class="row" id="details">
								<div class="col-lg-6 col-md-6 col-sm-6 col-12 seperator">
									<div class="col-12">

										<label for="customer-name" class="col-form-label">Branch</label>
										<input type="text" class="form-control" id="v_branch" autocomplete="off" disabled>
									</div>
									<div class="col-12">

										<label for="customer-name" class="col-form-label">Brand</label>
										<input type="text" class="form-control" id="v_brand" placeholder="Brand" autocomplete="off" disabled>
									</div>
									<div class="col-12">
										<label for="customer-name" class="col-form-label">Model</label>
										<input type="text" class="form-control" id="v_model" placeholder="Model" autocomplete="off" disabled>
									</div>
									<div class="col-12">
										<label for="customer-name" class="col-form-label">Color</label>
										<input type="text" class="form-control" id="v_color" placeholder="Model" autocomplete="off" disabled>
									</div>
									<div class="col-12">
										<label for="customer-name" class="col-form-label">Engine</label>
										<input type="text" class="form-control" id="v_engine" placeholder="Engine #" autocomplete="off" disabled>
									</div>
									<div class="col-12">
										<label for="customer-name" class="col-form-label">Chassis #</label>
										<input type="text" class="form-control" id="v_chassis" placeholder="Chassis #" autocomplete="off" disabled>
									</div>
									<div class="col-12">
										<label for="customer-name" class="col-form-label">Selling Price</label>
										<input type="text" class="form-control" id="v_price" autocomplete="off" disabled>
									</div>
									<div class="col-12">
										<label for="customer-name" class="col-form-label">Ex. owner</label>
										<input type="text" class="form-control" id="v_ex_owner" autocomplete="off" disabled>
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6 col-12">
									<div class="col-12">
										<input type="hidden" id="tag-id">
										<input type="hidden" id="repo_id">
										<input type="hidden" id="received_id">
										<label for="customer-name" class="col-form-label">Invoice #</label>
										<input type="text" class="form-control" id="v_invoice" placeholder="" autocomplete="off" disabled>
									</div>
									<div class="col-12">
										<div class="row">
											<div class="col-6 form-icon right">
												<label class="col-form-label"> Agent</label>
												<select id="v_agent" class="select-single" disabled>
													<option></option>

												</select>
												<i class="bx bx-hourglass bx-spin font-size-16 align-middle me-2" id="v-agent-loader" style="bottom: -35px; right:120px;"></i>
											</div>
											<div class="col-6">
												<label class="col-form-label"> External Reference # </label>
												<input type="text" class="form-control" id="v_external_ref" placeholder="Invoice #" autocomplete="off" disabled>
											</div>
										</div>
									</div>
									<div class="col-12">
										<div class="row">
											<div class="col-6">
												<label class="col-form-label"> Sale Type </label>
												<select id="v_type" class="select-single" disabled>
													<option></option>
													<option value="C">Cash</option>
													<option value="I">Installment</option>
												</select>
											</div>
											<div class="col-6">
												<label class="col-form-label"> Sold To </label>
												<select id="v_new_owner" class="select-single" disabled></select>
											</div>
										</div>
									</div>
									<div class="col-12">
										<label for="customer-name" class="col-form-label">Sold Date</label>
										<input type="date" class="form-control" id="v_sold_date" autocomplete="off" disabled>
									</div>

									<div class="col-12" id="v_amo_pd">
										<label for="customer-name" class="col-form-label">Amount Paid</label>
										<input type="number" class="form-control" id="v_amount_paid" autocomplete="off">
									</div>

									<div id="v_installment_det">
										<div class="col-12">
											<label for="customer-name" class="col-form-label">Downpayment</label>
											<input type="number" class="form-control" id="v_dp" autocomplete="off" onchange="calculateAmountFinance()" disabled>
										</div>
										<div class="col-12">
											<div class="row">
												<div class="col-6">
													<label class="col-form-label"> Rate </label>
													<select id="v_rate" class="select-single" onchange="calculateInterestRate()" disabled>
														<option>--Select Rate--</option>
														<option value="0.01">1 %</option>
														<option value="0.015">1.5 %</option>
														<option value="0.03">3 %</option>
													</select>
												</div>
												<div class="col-6">
													<label for="customer-name" class="col-form-label">Rebate</label>
													<input type="number" class="form-control" id="v_rebate" autocomplete="off" disabled>
												</div>
											</div>
										</div>
										<div class="col-12">
											<div class="row">
												<div class="col-6">
													<label class="col-form-label"> Terms </label>
													<select id="v_terms" class="select-single" onchange="calculateInterestRate()" disabled>
														<option>--Select Terms--</option>
														<option value="6">6 Months</option>
														<option value="12">12 Months</option>
														<option value="18">18 Months</option>
														<option value="24">24 Months</option>
														<option value="36">36 Months</option>
													</select>
												</div>
												<div class="col-6">
													<label for="customer-name" class="col-form-label">Interest Rate</label>
													<input type="number" class="form-control" id="v_interest-rate" autocomplete="off" onchange="calculateAmortization()" disabled>
												</div>
											</div>

										</div>
										<div class="col-12">
											<div class="row">
												<div class="col-6">
													<label for="customer-name" class="col-form-label">Amount Finance</label>
													<input type="number" class="form-control" id="v_amount_finance" autocomplete="off" disabled>
												</div>
												<div class="col-6">
													<label for="customer-name" class="col-form-label">Monthly Amortization</label>
													<input type="number" class="form-control" id="v_monthly" autocomplete="off" disabled>
												</div>
											</div>

										</div>
										<div class="col-12" id="v_rnr">
											<label for="customer-name" class="col-form-label">Uploaded Approved RNR</label>
											<div id="uploaded_rnr"></div>
										</div>
									</div>

								</div>
							</div>

							<div class="col-12">
								<label for="customer-name" class="col-form-label">Remarks</label>
								<textarea class="form-control" id="remarks" rows="3"></textarea>
								<span id="approver-remarks" style="color:red"></span>
							</div>
							<!-- end card body -->

						</div>
					</div>
					<div class="modal-footer btn-save-footer note1">
						<button onclick="updateRequest()" type="button" class="btn btn-primary maker">Update</button>
						<button onclick="decision(1)" type="button" class="btn btn-primary approver" data-receive-unit-id="0">Approve</button>
						<button onclick="decision(2)" data-id="0" type="button" class="btn btn-primary approver">Disapprove</button>


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
		<input type="hidden" id="mod" />
		<?php include_once './_partials/__footer-template.php'; ?>

		<script>
			var role = null
			var new_uplod = false
			// note: current_module_id and current_roles is global variable to see in assets > js > js-custom.js

			$(document).ready(function() {

				display_table(current_module_id)
				//if(auth.role != 'Warehouse Custodian'){

				// listForTagging()
				//}

				$('#details').hide()
				$('#save-details').hide()
				$('#back').hide()
				$('#remarks').hide()
				$('#rnr').hide()
				$('#amo_pd').hide()

				$('#tagunit').click(function() {


					setTimeout(() => {
						listForTagging()
					}, 100);
				})

				$('#rate').change(function() {
					if (this.value != '0.03') {
						$('#rnr').show()
					} else {
						$('#rnr').hide()
					}
				})

				$('#v_rate').change(function() {
					if (this.value != '0.03') {
						$('#v_rnr').show()
					} else {
						$('#v_rnr').hide()
					}
				})

				$('#type').change(function() {
					if (this.value == 'C') {
						$('#amo_pd').show()
						$('#installment_det').hide()
					} else {
						$('#amo_pd').hide()
						$('#installment_det').show()
					}
				})

				$('#v_type').change(function() {
					if (this.value == 'C') {
						$('#v_amo_pd').show()
						$('#v_installment_det').hide()
					} else {
						$('#v_amo_pd').hide()
						$('#v_installment_det').show()
					}
				})

				$('#save-details').click(function(event) {
					event.preventDefault();

					if ($('#invoice').val() == '') {
						toast('Invoicefield is required', 'danger');
						return false
					}

					// if($('#agent').val() == ''){
					// 	toast('Agent field is required', 'danger');
					// 	return false
					// }

					// if($('#external_ref').val() == ''){
					// 	toast('External Reference # is required', 'danger');
					// 	return false
					// }

					if ($('#type').val() == '') {
						toast('Sale Type is required', 'danger');
						return false
					}

					if ($('#new_owner').val() == '') {
						toast('Sold To field  is required', 'danger');
						return false
					}

					if ($('#sold_date').val() == '') {
						toast('Sold Date field  is required', 'danger');
						return false
					}

					if ($('#type').val() == 'I') {
						if ($('#dp').val() == '') {
							toast('Downpayment field  is required', 'danger');
							return false
						}

						if ($('#monthly').val() == '') {
							toast('Monthly Amortization field  is required', 'danger');
							return false
						}

						if ($('#terms').val() == '') {
							toast('Terms field  is required', 'danger');
							return false
						}

						if ($('#rebate').val() == '') {
							toast('Rebate field  is required', 'danger');
							return false
						}



						if ($('#rate').val() != '0.03') {
							if (document.getElementById("rnr-uploader").files.length == 0) {
								toast('Please upload approved RNR', 'danger');
								return false
							}
						}
					} else {
						if ($('#amount_paid').val() == '') {
							toast('Amount Paid field  is required', 'danger');
							return false
						}
					}


					showLoader() //function show loader

					var formData = new FormData();

					formData.append("received_id", $('#received_id').val());
					formData.append("repo_id", $('#repo_id').val());
					formData.append("sold_type", $('#type').val());
					formData.append("srp", $('#price').val());
					formData.append("invoice", $('#invoice').val());
					formData.append("AgentID", $('#agent').val());
					formData.append("ExternalReference", $('#external_ref').val());
					formData.append("new_owner", $('#new_owner').val());
					formData.append("sold_date", $('#sold_date').val());
					formData.append("dp", $('#dp').val());
					formData.append("amount_paid", $('#type').val() == 'I' ? $('#dp').val() : $('#amount_paid').val());
					formData.append("monthly", $('#monthly').val());
					formData.append("terms", $('#type').val() == 'I' ? $('#terms').val() : 0);
					formData.append("rebate", $('#rebate').val());
					formData.append("amount_finance", $('#amount_finance').val());
					formData.append("interest_rate", $('#interest-rate').val());
					formData.append("rate", $('#type').val() == 'I' ? $('#rate').val() : '');
					formData.append("module_id", current_module_id);
					formData.append("rnr", $('#rnr-uploader')[0].files[0]);
					$.ajax({
						url: `${baseUrl}/tagUnit`,
						type: 'POST',
						headers: {
							'Authorization': `Bearer ${ auth.token }`,
						},
						// data : data,
						// dataType: 'json',
						data: formData,
						processData: false,
						contentType: false,
						enctype: 'multipart/form-data',
						success: function(data) {
							// console.log(data)
							if (!data.success) {

								hideLoader()
								toast(data.data, 'danger');
							} else {
								hideLoader() //function hide loader
								toast(data.message, 'success');
								$('#staticBackdrop').modal('hide')
								display_table(current_module_id)
							}
						},
						error: function(response) {
							hideLoader() //function hide loader
							toast(response.responseJSON.data, 'danger');
							forceLogout(response.responseJSON) //if token is expired
						}
					});

				});
			})

			function decision(status) {
				const data = {
					id: $('#tag-id').val(),
					status: status,
					sold_type: $('#v_type').val(),
					repo_id: $('#repo_id').val(),
					remarks: $('#remarks').val(),
					module_id: $('#mod').val()
				}

				if ($('#remarks').val() == '') {
					toast('Remarks field  is required', 'danger');
					return false
				}

				showLoader()

				$.ajax({
					url: `${baseUrl}/submitTagUnitDecision`,
					type: 'POST',
					headers: {
						'Authorization': `Bearer ${ auth.token }`,
					},
					data: data,
					dataType: 'json',
					success: function(data) {

						if (!data.success) {
							hideLoader()
							toast(data.data, 'danger');
						} else {
							hideLoader()
							toast(data.message, 'success');
							$('#remarks').val('')
							$('#approvalModal').modal('hide')
							display_table(current_module_id)
						}
					},
					error: function(response) {
						hideLoader()
						toast(response.responseJSON.data, 'danger');
					}
				});
			}

			function updateRequest() {

				// const data = {
				//         id:$('#tag-id').val(),
				//         repo_id:$('#repo_id').val(),
				//         sold_type:$('#v_type').val(),
				// 		srp:$('#v_price').val(),
				//         invoice:$('#v_invoice').val(),
				//         new_owner:$('#v_new_owner').val(),
				//         sold_date:$('#v_sold_date').val(),
				//         dp:$('#v_dp').val(),
				//         monthly:$('#v_monthly').val(),
				//         terms:$('#v_terms').val(),
				//         rebate:$('#v_rebate').val(),

				// 	}



				// if($('#v_invoice').val() == ''){
				// 	toast('Invoicefield is required', 'danger');
				// 	return false
				// }

				// if($('#v_type').val() == ''){
				// 	toast('Sale Type is required', 'danger');
				// 	return false
				// }

				// if($('#v_new_owner').val() == ''){
				// 	toast('Sold To field  is required', 'danger');
				// 	return false
				// }

				// if($('#v_sold_date').val() == ''){
				// 	toast('Sold Date field  is required', 'danger');
				// 	return false
				// }

				// if($('#v_dp').val() == ''){
				// 	toast('Downpayment field  is required', 'danger');
				// 	return false
				// }

				// if($('#v_monthly').val() == ''){
				// 	toast('Monthly Amortization field  is required', 'danger');
				// 	return false
				// }

				// if($('#v_terms').val() == ''){
				// 	toast('Terms field  is required', 'danger');
				// 	return false
				// }

				// if($('#v_rebate').val() == ''){
				// 	toast('Rebate field  is required', 'danger');
				// 	return false
				// }

				if ($('#v_invoice').val() == '') {
					toast('Invoicefield is required', 'danger');
					return false
				}

				if ($('#v_type').val() == '') {
					toast('Sale Type is required', 'danger');
					return false
				}

				if ($('#v_new_owner').val() == '') {
					toast('Sold To field  is required', 'danger');
					return false
				}

				if ($('#v_sold_date').val() == '') {
					toast('Sold Date field  is required', 'danger');
					return false
				}

				if ($('#v_type').val() == 'I') {
					if ($('#v_dp').val() == '') {
						toast('Downpayment field  is required', 'danger');
						return false
					}

					if ($('#v_monthly').val() == '') {
						toast('Monthly Amortization field  is required', 'danger');
						return false
					}

					if ($('#v_terms').val() == '') {
						toast('Terms field  is required', 'danger');
						return false
					}

					if ($('#v_rebate').val() == '') {
						toast('Rebate field  is required', 'danger');
						return false
					}

					if ($('#v_rate').val() != '0.03') {
						if (new_uplod) {
							if (document.getElementById("v_rnr-uploader").files.length == 0) {
								toast('Please upload approved RNR', 'danger');
								return false
							}
						}

					}
				} else {
					if ($('#v_amount_paid').val() == '') {
						toast('Amount Paid field  is required', 'danger');
						return false
					}
				}

				showLoader()
				var formData = new FormData();
				formData.append("id", $('#tag-id').val());
				formData.append("received_id", $('#v_received_id').val());
				formData.append("repo_id", $('#v_repo_id').val());
				formData.append("sold_type", $('#v_type').val());
				formData.append("srp", $('#v_price').val());
				formData.append("invoice", $('#v_invoice').val());
				formData.append("AgentID", $('#v_agent').val());
				formData.append("ExternalReference", $('#v_external_ref').val());
				formData.append("new_owner", $('#v_new_owner').val());
				formData.append("sold_date", $('#v_sold_date').val());
				formData.append("dp", $('#v_dp').val());
				formData.append("amount_paid", $('#v_type').val() == 'I' ? $('#v_dp').val() : $('#v_amount_paid').val());
				formData.append("monthly", $('#v_monthly').val());
				formData.append("terms", $('#v_terms').val());
				formData.append("rebate", $('#v_rebate').val());
				formData.append("amount_finance", $('#v_amount_finance').val());
				formData.append("interest_rate", $('#v_interest-rate').val());
				formData.append("rate", $('#v_rate').val());
				formData.append("module_id", $('#mod').val());

				if (new_uplod) {
					formData.append("rnr", $('#v_rnr-uploader')[0].files[0]);
				}



				$.ajax({
					url: `${baseUrl}/updateSaleTagging`,
					type: 'POST',
					headers: {
						'Authorization': `Bearer ${ auth.token }`,
					},
					// data : data,
					// dataType: 'json',
					data: formData,
					processData: false,
					contentType: false,
					enctype: 'multipart/form-data',
					success: function(data) {

						if (!data.success) {
							hideLoader()
							toast(data.data, 'danger');
						} else {
							hideLoader()
							toast(data.message, 'success');
							new_uplod = false
							$('#approvalModal').modal('hide')
							display_table(current_module_id)
						}
					},
					error: function(response) {
						hideLoader()
						toast(response.responseJSON.data, 'danger');
						forceLogout(response.responseJSON) //if token is expired
					}
				});

			}

			async function display_table(current_module_id) {
				if ($.fn.DataTable.isDataTable("#sales-tagging-table")) {
					$('#sales-tagging-table').DataTable().clear().destroy();
				}

				$("#sales-tagging-table").DataTable({
					processing: true,
					serverSide: true,
					ajax: {
						url: `${baseUrl}/getListForApproval/${ current_module_id }`,
						type: 'GET',
						dataType: 'json',
						headers:{
							'Authorization':`Bearer ${ auth.token }`,
						}
					},
					scrollX: true,
					scrollCollapse: true,
					columns: [

						{
							data: "branchname"
						},
						{
							data: "invoice_reference_no"
						},
						{
							data: "ExternalReference"
						},
						{
							data: "AgentID"
						},
						{
							data: "brandname"
						},
						{
							data: "model_name"
						},
						{
							data: "color"
						},
						{
							data: "approved_price",
							render: $.fn.dataTable.render.number('\, ', '.', 2, '', ''),
							className: "text-end"
						},
						{
							data: "model_engine"
						},
						{
							data: "model_chassis"
						},
						{
							data: "sale_type"
						},
						{
							data: "sold_date"
						},
						{
							data: null,
							defaultContent: '',
							fnCreatedCell: function(nTd, sData, oData, iRow, iCol) {
								//	
								html = `<span>${ oData.o_firstname } ${ oData.o_middlename } ${ oData.o_lastname }</span>`;

								$(nTd).html(html);
							}
						},
						{
							data: null,
							defaultContent: '',
							fnCreatedCell: function(nTd, sData, oData, iRow, iCol) {
								//	
								html = `<span>${ oData.firstname } ${ oData.middlename } ${ oData.lastname }</span>`;

								$(nTd).html(html);
							}
						},
						{
							data: "amount_paid"
						},
						{
							data: "dp"
						},
						{
							data: null,
							defaultContent: '',
							fnCreatedCell: function(nTd, sData, oData, iRow, iCol) {
								html = `${ Math.ceil(oData.monthly_amo) }`;

								$(nTd).html(html);
							}
						},
						{
							data: "rebate"
						},
						{
							data: "terms"
						},
						{
							data: "interest_rate",
							render: $.fn.dataTable.render.number('\, ', '.', 2, '', ''),
							className: "text-end"
						},
						{
							data: "rate",
							render: $.fn.dataTable.render.number('\, ', '.', 2, '', ''),
							className: "text-end"
						},
						{
							data: "amount_finance",
							render: $.fn.dataTable.render.number('\, ', '.', 2, '', ''),
							className: "text-end"
						},
						{
							data: null,
							defaultContent: '',
							fnCreatedCell: function(nTd, sData, oData, iRow, iCol) {
								//	
								html = `<span>${ oData.status == 0 ? 'PENDING FOR APPROVAL' : 'DISAPPROVED' } </span>`;

								$(nTd).html(html);
							}
						},
						{
							data: "remarks"
						},
						{
							data: null,
							defaultContent: '',
							fnCreatedCell: function(nTd, sData, oData, iRow, iCol) {
								//	

								html = 'No action available';
								if (oData.status == '0' && current_roles == 'Maker') {
									role = 'maker'
									html = `<span>Waiting for approval</span>`;
								}

								if (oData.status == '2' && current_roles == 'Maker') {
									role = 'maker'
									$('#remarks').hide()
									$('.maker').show()
									$('.approver').hide()
									let ex_owner = `${ oData.o_firstname } ${ oData.o_middlename == '' ? '' :  oData.o_middlename} ${ oData.o_lastname }`
									html = `
                                            <button class="btn btn-sm btn-soft-warning"  data-bs-toggle="modal" data-bs-target="#approvalModal"
                                            onclick="edit(
                                                ${ oData.id },'${ oData.repo_id }','${ oData.branchname }','${ oData.brandname }'
                                                ,'${ oData.model_name }','${ oData.color }','${ oData.model_engine }'
                                            ,'${ oData.model_chassis }','${oData.approved_price}','${ ex_owner}',
                                            '${ oData.invoice_reference_no}','${ oData.sale_type}','${ oData.new_customer}'
                                            ,'${ oData.sold_date}','${ oData.dp}','${ oData.monthly_amo}'
                                            ,'${ oData.rebate}','${ oData.terms}','${ oData.rate}','${ oData.interest_rate}'
											,'${ oData.amount_finance}','${ oData.file_name}','${ oData.path}','${ oData.remarks}'
											,'${ oData.amount_paid}','${ oData.ExternalReference}','${ oData.AgentID}')"> 
                                                <i class="ri-edit-box-line"></i> edit
                                            </button>
											<button class="btn btn-sm btn-soft-warning"  
                                            onclick="remove(${ oData.id })"> 
                                                <i class="ri-delete-bin-5-line"></i> Cancel
                                            </button> 
                                        `;
								}

								if (oData.status == '0' && current_roles == 'Approver') {
									role = 'approver'
									$('#tagunit').hide()
									$('#remarks').show()
									$('.maker').hide()
									$('.approver').show()
									let ex_owner = `${ oData.o_firstname } ${ oData.o_middlename == '' ? '' :  oData.o_middlename } ${ oData.o_lastname }`
									html = `
                                            <button class="btn btn-sm btn-soft-warning"  data-bs-toggle="modal" data-bs-target="#approvalModal"
                                            onclick="submitApproval(
                                                ${ oData.id },'${ oData.repo_id }','${ oData.branchname }','${ oData.brandname }'
                                                ,'${ oData.model_name }','${ oData.color }','${ oData.model_engine }'
                                            ,'${ oData.model_chassis }','${oData.approved_price}','${ ex_owner}',
                                            '${ oData.invoice_reference_no}','${ oData.sale_type}','${ oData.new_customer}'
                                            ,'${ oData.sold_date}','${ oData.dp}','${ oData.monthly_amo}'
                                            ,'${ oData.rebate}','${ oData.terms}','${ oData.rate}','${ oData.interest_rate}'
											,'${ oData.amount_finance}','${ oData.file_name}','${ oData.path}'
											,'${ oData.amount_paid}','${ oData.ExternalReference}','${ oData.AgentID}')"> 
                                                <i class="ri-edit-box-line"></i> Submit Decision
                                            </button> 
                                        `;
								}


								$(nTd).html(html);
							}
						},
					],
				});
			}

			function remove(id) {
				let prompt = confirm('Are you sure do you want to cancel this transaction ?')
				if (prompt) {
					showLoader()

					$.ajax({
						url: `${ baseUrl }/cancelSalesTag`,
						type: 'POST',
						headers: {
							'Authorization': `Bearer ${ auth.token }`,
						},
						data: {
							id: id,
						},
						success: function(data) {
							// console.log(data)
							if (!data.success) {
								hideLoader()
								toast(data.message, 'danger');
							} else {
								hideLoader()

								toast('Transaction successfully cancelled', 'success');
								display_table(current_module_id)

							}
						},
						error: function(response) {
							hideLoader()
							toast(response.responseJSON.message, 'danger');
							forceLogout(response.responseJSON) //if token is expired
						}
					});
				}
			}

			function submitApproval(id, repo_id, branchname, brandname, model_name, color, model_engine, model_chassis, approved_price, ex_owner,
				invoice_reference_no, sale_type, new_customer, sold_date, dp, monthly_amo, rebate, terms, rate,
				interest_rate, amount_finance, filename, path, amount_paid, external_ref, agentId) {

				$('#v_rnr').hide()


				let type = sale_type == 'INSTALLMENT' ? 'I' : 'C'
				$('#tag-id').val(id)
				$('#v_brand').val(brandname)
				$('#v_model').val(model_name)
				$('#v_engine').val(model_engine)
				$('#v_chassis').val(model_chassis)
				$('#v_branch').val(branchname)
				$('#v_ex_owner').val(ex_owner)
				$('#v_color').val(color)
				$('#v_price').val(approved_price)
				$('#v_invoice').val(invoice_reference_no)
				$('#v_external_ref').val(external_ref)

				$('#v_type').val(type).trigger('change');

				if ($('#v_type').val() == 'C') {

					$('#v_amo_pd').show()
					$('#v_installment_det').hide()
				} else {
					$('#v_amo_pd').hide()
					$('#v_installment_det').show()
				}
				$('#repo_id').val(repo_id)
				$('#v_sold_date').val(sold_date)
				$('#v_dp').val(dp)
				$('#v_amount_paid').val(amount_paid)
				$('#v_monthly').val(monthly_amo)
				$('#v_interest-rate').val(parseFloat(interest_rate))
				$('#v_rebate').val(rebate)

				$('#v_amount_finance').val(amount_finance)

				if (parseFloat(rate) != '0.03') {
					$('#v_rnr').show()
					let link = baseUrl.replace('/api', '')
					$('#uploaded_rnr').html(`<a href="#" 
											onclick="downloadURI('${link}/${path}','${filename}')">
											<span title="Download RNR">${filename}</span></a>`)
				}
				// uploaded_rnr
				//

				fetch_customer_profile_list('A', new_customer)
				fetchAgentList('E', agentId)
				//$('#v_agent').val(agentId)
				setTimeout(() => {
					//  $('#v_new_owner').val(new_customer).trigger('change');
					$('#v_terms').val(terms).trigger('change');
					$('#v_rate').val(parseFloat(rate)).trigger('change');

				}, 1000);

			}

			function edit(id, repo_id, branchname, brandname, model_name, color, model_engine, model_chassis, approved_price, ex_owner,
				invoice_reference_no, sale_type, new_customer, sold_date, dp, monthly_amo, rebate, terms, rate,
				interest_rate, amount_finance, filename, path, remarks, amount_paid, external_ref, agentId) {


				let type = sale_type == 'INSTALLMENT' ? 'I' : 'C'

				$('#v_rnr').hide()

				$('#v_invoice').prop('disabled', false)
				$('#v_external_ref').prop('disabled', false)
				$('#v_agent').prop('disabled', false)
				$('#v_type').prop('disabled', false)
				$('#repo_id').prop('disabled', false)
				$('#v_sold_date').prop('disabled', false)
				$('#v_dp').prop('disabled', false)
				$('#v_rate').prop('disabled', false)
				$('#v_terms').prop('disabled', false)
				$('#v_rebate').prop('disabled', false)
				$('#v_new_owner').prop('disabled', false)

				$('#tag-id').val(id)
				$('#v_brand').val(brandname)
				$('#v_model').val(model_name)
				$('#v_engine').val(model_engine)
				$('#v_chassis').val(model_chassis)
				$('#v_branch').val(branchname)
				$('#v_ex_owner').val(ex_owner)
				$('#v_color').val(color)
				$('#v_price').val(approved_price)
				$('#v_invoice').val(invoice_reference_no)
				$('#v_external_ref').val(external_ref)

				$('#v_type').val(type).trigger('change');

				if ($('#v_type').val() == 'C') {
					$('#v_amo_pd').show()
					$('#v_installment_det').hide()
				} else {
					$('#v_amo_pd').hide()
					$('#v_installment_det').show()
				}

				$('#repo_id').val(repo_id)
				$('#v_sold_date').val(sold_date)
				$('#v_dp').val(dp)
				$('#v_amount_paid').val(amount_paid)
				$('#v_monthly').val(monthly_amo)
				$('#v_interest-rate').val(parseFloat(interest_rate))
				$('#v_rebate').val(rebate)

				$('#v_amount_finance').val(amount_finance)

				if (parseFloat(rate) != '0.03') {
					$('#v_rnr').show()

					let link = baseUrl.replace('/api', '')
					$('#uploaded_rnr').html(`<a href="#" 
											onclick="downloadURI('${link}/${path}','${filename}')">
											<span title="Download RNR">${filename}</span></a> - 
											<span style="color:red;cursor:pointer;" title="Remove" onclick="uploadNew()">Remove</span>`)


				}
				$('#approver-remarks').html(': ' + remarks)
				fetch_customer_profile_list('E', new_customer)
				fetchAgentList('E', agentId)
				//$('#v_agent').val(agentId)

				setTimeout(() => {
					// $('#v_new_owner').val(new_customer).trigger('change');
					$('#v_terms').val(terms).trigger('change');
					$('#v_rate').val(parseFloat(rate)).trigger('change');

				}, 500);

			}

			function uploadNew() {
				new_uplod = true
				$('#uploaded_rnr').html(`<input type="file" id="v_rnr-uploader"></input>`)
			}
			async function listForTagging() {
				$("#received-unit-table").DataTable({
					processing: true,
					serverSide: true,
					ajax: {
						url: `${baseUrl}/listForSalesTagging`,
						type: 'GET',
						dataType: 'json',
						headers:{
							'Authorization':`Bearer ${ auth.token }`,
						}
					},
					scrollX: true,
					scrollCollapse: true,
					columns: [

						{
							data: "branchname"
						},
						{
							data: "brandname"
						},
						{
							data: "model_name"
						},
						{
							data: "color"
						},
						{
							data: "current_appraised",
							render: $.fn.dataTable.render.number('\, ', '.', 2, '', ''),
							className: "text-end"
						},
						{
							data: "model_engine"
						},
						{
							data: "model_chassis"
						},
						{
							data: "ex_owner"
						},
						{
							data: null,
							defaultContent: '',
							fnCreatedCell: function(nTd, sData, oData, iRow, iCol) {
								//	
								html = `
									<button class="btn btn-sm btn-soft-warning" 
									onclick="tag(${ oData.id },'${ oData.repo_id }','${ oData.brandname }','${ oData.model_name }','${ oData.model_engine }'
									,'${ oData.model_chassis }','${oData.ex_owner}','${ oData.color}','${ oData.branchname}','${ oData.current_appraised}')"> 
										<i class="ri-edit-box-line"></i> Tag Unit As Sold
									</button> 
								`;

								$(nTd).html(html);
							}
						},
					],

				});

				$('#staticBackdrop').modal('show');
			}

			function tag(id, repo_id, brand, model, engine, chassis, exowner, color, branchname, price) {

				$('#received_id').val(id)
				$('#repo_id').val(repo_id)
				$('#brand').val(brand)
				$('#model').val(model)
				$('#engine').val(engine)
				$('#chassis').val(chassis)
				$('#branch').val(branchname)
				$('#ex_owner').val(exowner)
				$('#color').val(color)
				$('#price').val(price)
				$('#details').show()
				$('#list').hide()
				$('#save-details').show()
				$('#back').show()
				fetchAgentList('D', null)
				fetch_customer_profile_list('D', null)
			}

			function backToSearch() {
				clearFields()
				$('#list').show()
				$('#details').hide()
				$('#save-details').hide()
				$('#back').hide()
				fetchAgentList('D', null)
				fetch_customer_profile_list('D', null)
			}

			function closeModal() {
				clearFields()
				$('#list').show()
				$('#details').hide()
				$('#save-details').hide()
				$('#back').hide()

			}

			function clearFields() {
				$('#received_id').val('')
				$('#brand').val('')
				$('#model').val('')
				$('#engine').val('')
				$('#chassis').val('')
				$('#branch').val('')
				$('#ex_owner').val('')
				$('#color').val('')
				$('#price').val('')
				$('#invoice').val('')
				$('#type').val('').trigger('change');
				$('#new_owner').val('')
				$('#sold_date').val('')
				$('#dp').val('')
				$('#amount_paid').val('')
				$('#monthly').val('')
				$('#interest-rate').val('')
				$('#rebate').val('')
				$('#amount_finance').val('')
				$('#rate').val('').trigger('change');
				$('#terms').val('').trigger('change');
			}

			function calculateAmountFinance() {
				let result = parseFloat($('#price').val() - $('#dp').val())
				$('#amount_finance').val(result)

				let result1 = parseFloat($('#v_price').val() - $('#v_dp').val())
				$('#v_amount_finance').val(result1)

				calculateAmortization()
			}

			function calculateInterestRate() {
				let result = parseFloat(($('#rate').val() * $('#terms').val()) + 1)
				$('#interest-rate').val(result)

				let result1 = parseFloat(($('#v_rate').val() * $('#v_terms').val()) + 1)
				$('#v_interest-rate').val(result1)

				calculateAmortization()
			}

			function calculateAmortization() {

				let result = parseFloat(($('#amount_finance').val() * $('#interest-rate').val()))
				$('#monthly').val(Math.ceil(parseFloat(result / $('#terms').val())))

				let result1 = parseFloat(($('#v_amount_finance').val() * $('#v_interest-rate').val()))
				$('#v_monthly').val(Math.ceil(parseFloat(result1 / $('#v_terms').val())))
			}

			function fetch_customer_profile_list(action, customer) {
				$.ajax({
					url: `${ baseUrl }/listOfCustomer`,
					type: 'GET',
					headers: {
						'Authorization': `Bearer ${ auth.token }`,
					},
					success: function(data) {
						$('#new_owner').empty();
						$('#v_new_owner').empty();
						if (data.length > 0) {
							$('#new_owner').append(`<option value=""> Choose Customer </option>`);
							$('#v_new_owner').append(`<option value=""> Choose Customer </option>`);
							for (let i = 0; i < data.length; i++) {
								const el = data[i];

								$('#v_new_owner').append(`<option value="${ el.id }">${ el.customer_name }</option>`);
								$('#new_owner').append(`<option value="${ el.id }">${ el.customer_name }</option>`);
							}
						} else {
							$('#v_new_owner').append(`<option value=""> No Available Data </option>`);
							$('#new_owner').append(`<option value=""> No Available Data </option>`);
						}
						$('#new_owner').val('').trigger('change');
						$('#v_new_owner').val('').trigger('change');

						if (action != 'D') {
							setTimeout(() => {
								$('#v_new_owner').val(customer).trigger('change');

							}, 300);
							// if(action == 'A'){

							// }else if(action == 'E'){
							// 	$('#v_new_owner').val(new_customer).trigger('change')
							// }
						}

					},
					error: function(response) {
						toast(response.responseJSON.message, 'danger');
						forceLogout(response.responseJSON) //if token is expired
					}
				});
			}

			function fetchAgentList(action, agent) {
				$.ajax({
					url: `${ baseUrl }/agentList`,
					type: 'GET',
					headers: {
						'Authorization': `Bearer ${ auth.token }`,
					},
					success: function(data) {
						// console.log(data)
						$('#agent').empty();
						$('#v_agent').empty();
						if (data.length > 0) {
							$('#agent').append(`<option value=""> Choose Agent </option>`);
							$('#v_agent').append(`<option value=""> Choose Agent </option>`);
							for (let i = 0; i < data.length; i++) {
								const el = data[i];

								$('#v_agent').append(`<option value="${ el.id }">${ el.name }</option>`);
								$('#agent').append(`<option value="${ el.id }">${ el.name }</option>`);
							}
							$('#agent-loader').hide()
							$('#v-agent-loader').hide()
						} else {
							$('#v_agent').append(`<option value=""> No Available Data </option>`);
							$('#agent').append(`<option value=""> No Available Data </option>`);
						}
						$('#agent').val('').trigger('change');
						$('#v_agent').val('').trigger('change');



						if (action != 'D') {
							setTimeout(() => {
								$('#v_agent').val(agent).trigger('change');
							}, 300);
							// if(action == 'A'){

							// }else if(action == 'E'){
							// 	$('#v_new_owner').val(new_customer).trigger('change')
							// }
						}

					},
					error: function(response) {
						toast(response.responseJSON.message, 'danger');
						forceLogout(response.responseJSON) //if token is expired
					}
				});
			}

			function downloadURI(uri, name) {

				const linkSource = uri;
				const downloadLink = document.createElement("a");
				window.open(linkSource, "_blank").focus();
				//downloadLink.href = linkSource;
				downloadLink.download = name;
				downloadLink.click();
			}
		</script>
</body>

</html>