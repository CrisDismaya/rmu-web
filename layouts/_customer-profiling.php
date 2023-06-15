
<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>
	<title> Dashboard | RMU </title>
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
								<h4 class="mb-sm-0"> Customer Profiling </h4>
							</div>
						</div>
					</div>

					<!-- table -->
					<div class="col-lg-12">
						<div class="card">
							<div class="card-header align-items-center d-flex">
								<h4 class="card-title mb-0 flex-grow-1">List of Customer Profile</h4>
								<div class="flex-shrink-0">
									<button type="button" class="btn btn-soft-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="add_customer_profile()">
										Add Customer
									</button>
								</div>
							</div>
							<div class="card-body">
								<table id="customer-profile-table" class="table table-bordered nowrap align-middle mdl-data-table" style="width:100%">
									<thead>
										<tr>
											<th> Customer Acumatica Id </th>
											<th> Customer Name </th>
											<th> Contact No. </th>
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

	<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-xl" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="myExtraLargeModalLabel"> Customer Details </h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>

				<div class="modal-body container">
					<div class="card card-body mb-0">
						<div>
							<div class="row">
								<div class="col-sm-3">
									<div class="mb-3">
										<label class="form-label"> Acumatica Customer ID </label>
										<input type="text" class="form-control" id="customer-acumatica-id" placeholder="Enter acumatica customer id" autocomplete="off">
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-3">
									<div class="mb-3">
										<label class="form-label">First Name</label>
										<input type="text" class="form-control" id="customer-first-name" placeholder="Enter first name" autocomplete="off">
									</div>
								</div>

								<div class="col-sm-3">
									<div class="mb-3">
										<label class="form-label">Middle Name <small class="text-muted">(Optional)</small></label>
										<input type="text" class="form-control" id="customer-middle-name" placeholder="Enter middle name" autocomplete="off">
									</div>
								</div>

								<div class="col-sm-3">
									<div class="mb-3">
										<label class="form-label">Last Name</label>
										<input type="text" class="form-control" id="customer-last-name" placeholder="Enter last name" autocomplete="off">
									</div>
								</div>

								<div class="col-sm-3">
									<div class="mb-3">
										<label class="form-label">Contact No</label>
										<input type="text" class="form-control" id="customer-contact-no" placeholder="Enter last name" autocomplete="off">
									</div>
								</div>
							</div>

							<div class="mb-3">
								<label class="form-label">House No. / Street / Subd.</label>
								<textarea class="form-control" id="customer-complete-address" placeholder="House No. / Street / Subd." rows="2" autocomplete="off" style="resize:none;"></textarea>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-3">
								<div class="mb-3">
									<label class="form-label">Province</label>
									<select id="customer-province" class="select-single-modal"></select>
								</div>
							</div>

							<div class="col-sm-3">
								<div class="mb-3">
									<label class="form-label">City</label>
									<select id="customer-city" class="select-single-modal"></select>
								</div>
							</div>

							<div class="col-sm-3">
								<div class="mb-3">
									<label class="form-label">Barangay</label>
									<select id="customer-barangay" class="select-single-modal"></select>
								</div>
							</div>

							<div class="col-sm-3">
								<div class="mb-3">
									<label class="form-label">Zip Code <small class="text-muted">(Optional)</small></label> 
									<input type="text" class="form-control" id="customer-zipcode" placeholder="Enter Zip Code" autocomplete="off">
								</div>
							</div>

							<div class="col-sm-4">
								<div class="mb-3">
									<label class="form-label">Nationality</label>
									<input type="text" class="form-control" id="customer-nationality" placeholder="Enter Nationality" autocomplete="off">
								</div>
							</div>

							<div class="col-sm-4">
								<div class="mb-3">
									<label class="form-label">Source of Income</label>
									<input type="text" class="form-control" id="customer-source-of-income" placeholder="Enter Source of Income" autocomplete="off">
								</div>
							</div>

							<div class="col-sm-4">
								<div class="mb-3">
									<label class="form-label">Marital Status</label>
									<select id="customer-marital-status" class="select-single-modal">
										<option value="">Select Marital Status</option>
										<option value="Single">Single</option>
										<option value="Married">Married</option>
										<option value="Divorced">Divorced</option>
										<option value="Separated">Separated</option>
										<option value="Widowed">Widowed</option>
									</select>
								</div>
							</div>

							<div class="col-sm-3">
								<div class="mb-3">
									<label class="form-label">Date of Birth</label>
									<input type="date" class="form-control" id="customer-date-birth" placeholder="" autocomplete="off">
								</div>
							</div>

							<div class="col-sm-3">
								<div class="mb-3">
									<label class="form-label">Birth of Place</label>
									<input type="text" class="form-control" id="customer-birth-place" placeholder="Enter Birth of Place" autocomplete="off">
								</div>
							</div>

							<div class="col-sm-3">
								<div class="mb-3">
									<label class="form-label">Primary ID</label>
									<input type="text" class="form-control" id="customer-primary-id" placeholder="Enter Primary ID" autocomplete="off">
								</div>
							</div>

							<div class="col-sm-3">
								<div class="mb-3">
									<label class="form-label">ID No.</label>
									<input type="text" class="form-control" id="customer-pri-id-no" placeholder="Enter ID No" autocomplete="off">
								</div>
							</div>

							<div class="col-sm-3">
								<div class="mb-3">
									<label class="form-label">Alternative ID</label>
									<input type="text" class="form-control" id="customer-alternative-id" placeholder="Enter Primary ID" autocomplete="off">
								</div>
							</div>

							<div class="col-sm-3">
								<div class="mb-3">
									<label class="form-label">ID No.</label>
									<input type="text" class="form-control" id="customer-alt-id-no" placeholder="Enter ID No" autocomplete="off">
								</div>
							</div>
						</div>
						
					</div>
				</div>

				<div class="modal-footer btn-save-footer">
					<a href="javascript:void(0);" class="btn btn-link link-success fw-medium" data-bs-dismiss="modal">
						<i class="ri-close-line me-1 align-middle"></i> Close
					</a>
					<button id="save-details" data-id="0" type="button" class="btn btn-primary" data-customer-profile-id="0">
						Save changes
					</button>
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
		$(document).ready(function(){
			display_table();

			$('#save-details').click(function(e){
				e.preventDefault()
				var id = $(this).data('customer-profile-id')
				var url = (id == 0 ? `${ baseUrl }/createCustomerProfile` : `${ baseUrl }/updateCustomerProfile/${ id }`)
				showLoader()

				$.ajax({
					url: url, 
					type: 'POST', 
					dataType: 'json',
					headers:{
						'Authorization':`Bearer ${ auth.token }`,
					},
					data: { 
						acumatica_id : $(`#customer-acumatica-id`).val().trim(),
						firstname : $(`#customer-first-name`).val().trim(),
						middlename : $(`#customer-middle-name`).val().trim(),
						lastname : $(`#customer-last-name`).val().trim(),
						contact : $(`#customer-contact-no`).val().trim(),
						address : $(`#customer-complete-address`).val().trim(),
						province : $(`#customer-province`).val(),
						city : $(`#customer-city`).val(),
						barangay : $(`#customer-barangay`).val(),
						zip_code : $(`#customer-zipcode`).val().trim(),

						nationality : $(`#customer-nationality`).val().trim(),
						source_of_income : $(`#customer-source-of-income`).val().trim(),
						marital_status : $(`#customer-marital-status`).val().trim(),
						date_birth : $(`#customer-date-birth`).val().trim(),
						birth_place : $(`#customer-birth-place`).val().trim(),
						primary_id : $(`#customer-primary-id`).val().trim(),
						primary_id_no : $(`#customer-pri-id-no`).val().trim(),
						alternative_id : $(`#customer-alternative-id`).val().trim(),
						alternative_id_no : $(`#customer-alt-id-no`).val().trim()
					}, 
					success: function (data) { 
						if(!data.success){
							toast(data.message, 'danger');
							hideLoader()
						}
						else{
							let msg = id == 0 ? 'Customer Succesfully added!' : 'Customer Succesfully updated!'
							toast(msg, 'success');
							$('#staticBackdrop').modal('hide')
							display_table()
							add_customer_profile()
							hideLoader()
						}
					},
					error: function(response) {
						hideLoader()
						toast(response.responseJSON.message, 'danger');
					}
				});
			});
		});

		async function display_table(){
			const tableData = await $.ajax({
				url: `${ baseUrl }/customerProfile`,
				method: 'GET',
				dataType: 'json',
				headers:{
					'Authorization':`Bearer ${ auth.token }`,
				}
			});

			$("#customer-profile-table").DataTable().destroy();
			$("#customer-profile-table").DataTable({
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
					{ data: "contact" },
					{ data: null, defaultContent: '',
						fnCreatedCell: function(nTd, sData, oData, iRow, iCol){
							html = `
								<button class="btn btn-sm btn-soft-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
									onclick="edit(${ oData.id }, '${ oData.acumatica_id }', '${ oData.firstname }', '${ oData.middlename }', '${ oData.lastname }', '${ oData.contact }', '${ oData.address }', '${ oData.zip_code }',
										'${ oData.nationality }', '${ oData.source_of_income }', '${ oData.marital_status }', '${ oData.date_birth }', '${ oData.birth_place }', '${ oData.primary_id }', '${ oData.primary_id_no }',
										'${ oData.alternative_id }', '${ oData.alternative_id_no }'
									)"> 
									<i class="ri-edit-box-line"></i> Edit 
								</button> 
							`;
							$(nTd).html(html);
						}
					},
				]
			});
		}

		function add_customer_profile(){
			$(`#customer-acumatica-id`).val('')
			$(`#customer-first-name`).val('')
			$(`#customer-middle-name`).val('')
			$(`#customer-last-name`).val('')
			$(`#customer-contact-no`).val('')
			$(`#customer-complete-address`).val('')
			$(`#customer-zipcode`).val('')

			$(`#customer-nationality`).val('')
			$(`#customer-source-of-income`).val('')
			$(`#customer-marital-status`).val('').trigger('change')
			$(`#customer-date-birth`).val('')
			$(`#customer-birth-place`).val('')
			$(`#customer-primary-id`).val('')
			$(`#customer-pri-id-no`).val('')
			$(`#customer-alternative-id`).val('')
			$(`#customer-alt-id-no`).val('')
			$(`#save-details`).data('customer-profile-id', 0)
		}

		function edit(id, acumatica_id, firstname, middlename, lastname, contact, address, zipCode, nationality, source_of_income, 
			marital_status, date_birth, birth_place, primary_id, primary_id_no, alternative_id, alternative_id_no){
			$(`#save-details`).data('customer-profile-id', id)
			$(`#customer-acumatica-id`).val(acumatica_id)
			$(`#customer-first-name`).val(firstname)
			$(`#customer-middle-name`).val((middlename != 'null' ? middlename : ''))
			$(`#customer-last-name`).val(lastname)
			$(`#customer-contact-no`).val(contact)
			$(`#customer-complete-address`).val(address)
			$(`#customer-zipcode`).val((zipCode != 'null' ? zipCode : ''))

			$(`#customer-nationality`).val(nationality != 'null' ? nationality : '')
			$(`#customer-source-of-income`).val(source_of_income != 'null' ? source_of_income : '')
			$(`#customer-marital-status`).val(marital_status != 'null' ? marital_status : '').trigger('change')
			$(`#customer-date-birth`).val(date_birth != 'null' ? date_birth : '')
			$(`#customer-birth-place`).val(birth_place != 'null' ? birth_place : '')
			$(`#customer-primary-id`).val(primary_id != 'null' ? primary_id : '')
			$(`#customer-pri-id-no`).val(primary_id_no != 'null' ? primary_id_no : '')
			$(`#customer-alternative-id`).val(alternative_id != 'null' ? alternative_id : '')
			$(`#customer-alt-id-no`).val(alternative_id_no != 'null' ? alternative_id_no : '')
		}

	</script>
</body>
</html>