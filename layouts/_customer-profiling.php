
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
								<h4 class="mb-sm-0" id="header-breadcram">  </h4>
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
											<th> Date of Birth </th>
											<th> Marital Status </th>
											<th> Source of Income </th>
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
										<label class="form-label"> Acumatica Customer ID <span class="text-muted">(Optional)</span></label>
										<input type="text" class="form-control" id="customer-acumatica-id" placeholder="Enter acumatica customer id" autocomplete="off">
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-3">
									<div class="mb-3">
										<label class="form-label">First Name <span class="text-danger">*</span></label>
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
										<label class="form-label">Last Name <span class="text-danger">*</span></label>
										<input type="text" class="form-control" id="customer-last-name" placeholder="Enter last name" autocomplete="off">
									</div>
								</div>

								<div class="col-sm-3">
									<div class="mb-3">
										<label class="form-label">Contact No <span class="text-danger">*</span></label>
										<input type="text" class="form-control numberonly" id="customer-contact-no" maxlength="11" placeholder="Enter last name" autocomplete="off">
									</div>
								</div>
							</div>

							<div class="mb-3">
								<label class="form-label">House No. / Street / Subd. </label>
								<textarea class="form-control" id="customer-complete-address" placeholder="House No. / Street / Subd." rows="2" autocomplete="off" style="resize:none;"></textarea>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-3">
								<div class="mb-3">
									<label class="form-label">Province <span class="text-danger">*</span></label>
									<select id="customer-province" class="select-single-modal"></select>
								</div>
							</div>

							<div class="col-sm-3">
								<div class="mb-3">
									<label class="form-label">City <span class="text-danger">*</span></label>
									<select id="customer-city" class="select-single-modal"></select>
								</div>
							</div>

							<div class="col-sm-3">
								<div class="mb-3">
									<label class="form-label">Barangay <span class="text-danger">*</span></label>
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
									<label class="form-label">Nationality <span class="text-danger">*</span></label>
									<!-- <input type="text" class="form-control" id="customer-nationality" placeholder="Enter Nationality" autocomplete="off"> -->
									<select id="customer-nationality" class="select-single-modal"></select>
								</div>
							</div>

							<div class="col-sm-4">
								<div class="mb-3">
									<label class="form-label">Source of Income <span class="text-danger">*</span></label>
									<!-- <input type="text" class="form-control" id="customer-source-of-income" placeholder="Enter Source of Income" autocomplete="off"> -->
									<select id="customer-source-of-income" class="select-single-modal"></select>
								</div>
							</div>

							<div class="col-sm-4">
								<div class="mb-3">
									<label class="form-label">Marital Status <span class="text-danger">*</span></label>
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
									<label class="form-label">Date of Birth <span class="text-danger">*</span></label>
									<input type="date" class="form-control" id="customer-date-birth" placeholder="" autocomplete="off">
								</div>
							</div>

							<div class="col-sm-3">
								<div class="mb-3">
									<label class="form-label">Birth of Place <span class="text-danger">*</span></label>
									<input type="text" class="form-control" id="customer-birth-place" placeholder="Enter Birth of Place" autocomplete="off">
								</div>
							</div>

							<div class="col-sm-3">
								<div class="mb-3">
									<label class="form-label">Primary ID <span class="text-danger">*</span></label>
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
		var brgy_id = '';
		$(document).ready(function(){
			
			display_table();
			getAllProvince();
			fetch_source_of_income()
			fetch_nationality()

			$('#save-details').click(function(e){
				e.preventDefault()
				var id = $(this).data('customer-profile-id')
				var url = (id == 0 ? `${ baseUrl }/createCustomerProfile` : `${ baseUrl }/updateCustomerProfile/${ id }`)

				if(
					$(`#customer-first-name`).val().trim() == '' || $(`#customer-last-name`).val().trim() == '' || $(`#customer-contact-no`).val().trim() == '' || 
					$(`#customer-province`).val().trim()  == '' || $(`#customer-city`).val().trim() == '' || $(`#customer-barangay`).val().trim() == '' || $(`#customer-nationality`).val().trim() == '' || 
					$(`#customer-source-of-income`).val().trim() == '' || $(`#customer-source-of-income`).val().trim() == '' || $(`#customer-marital-status`).val().trim() == '' || $(`#customer-date-birth`).val().trim() == '' || 
					$(`#customer-birth-place`).val().trim() == '' || $(`#customer-primary-id`).val().trim() == ''
				){
					toast('Please fill-up the red mark asterisk (*)', 'danger');
					return false;
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
						forceLogout(response.responseJSON) //if token is expired
					}
				});
			});

			$('#customer-province').change(function(){
				if(this.value != ''){
					getCity(this.value)
				}
			});

			$('#customer-city').change(function(){
				if(this.value != ''){
					getBarangay(this.value)
				}
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
					{ data: "acumatica_id",
						fnCreatedCell: function(nTd, sData, oData, iRow, iCol){
							html = `
								<b>${ oData.acumatica_id != null ? oData.acumatica_id : '-' }</b>
							`;
							$(nTd).html(html);
						}
					},
					{ data: "customer_name", className: "fw-semibold" },
					{ data: "contact" },
					{ data: "date_birth",
						fnCreatedCell: function(nTd, sData, oData, iRow, iCol){
							const day = new Date(oData.date_birth);
							const m = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
							const str_op = m[day.getMonth()] + ' ' + day.getDate() + ', ' +  day.getFullYear();
							html = `
								${ str_op }
							`;
							$(nTd).html(html);
						}
					},
					{ data: "marital_status" },
					{ data: "source_of_income" },
					{ data: null, defaultContent: '',
						fnCreatedCell: function(nTd, sData, oData, iRow, iCol){
							html = `
								<button class="btn btn-sm btn-soft-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
									onclick="edit(${ oData.id }, '${ oData.acumatica_id }', '${ oData.firstname }', '${ oData.middlename }', '${ oData.lastname }', '${ oData.contact }', '${ oData.address }', '${ oData.zip_code }',
										'${ oData.nationality }', '${ oData.source_of_income }', '${ oData.marital_status }', '${ oData.date_birth }', '${ oData.birth_place }', '${ oData.primary_id }', '${ oData.primary_id_no }',
										'${ oData.alternative_id }', '${ oData.alternative_id_no }', ${ oData.provinces }, ${ oData.cities }, ${ oData.barangays }
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

			$(`#customer-province`).val('').trigger('change')
			$(`#customer-city`).empty()
			$(`#customer-barangay`).empty()

			brgy_id = '';
			$(`#customer-nationality`).val('').trigger('change')
			$(`#customer-source-of-income`).val('').trigger('change')
			$(`#customer-marital-status`).val('').trigger('change')
			$(`#customer-date-birth`).val('')
			$(`#customer-birth-place`).val('')
			$(`#customer-primary-id`).val('')
			$(`#customer-pri-id-no`).val('')
			$(`#customer-alternative-id`).val('')
			$(`#customer-alt-id-no`).val('')
			$(`#save-details`).data('customer-profile-id', 0)
		}

		async function getAllProvince(){
			const province = await $.ajax({
				url: `${ baseUrl }/provinceList`,
				method: 'GET',
				dataType: 'json',
				headers:{
					'Authorization':`Bearer ${ auth.token }`,
				}
			});
			let option = '<option value=""> Select Province </option>'
			province.map(data => {
				option += `<option value="${ data.OrderNumber }" >${ data.Title} </option>`
			})

			$('#customer-province').html(option)
		}

		async function getCity(provinceId){
			const city = await $.ajax({
				url: `${ baseUrl }/cityList/${provinceId}`,
				method: 'GET',
				dataType: 'json',
				headers:{
					'Authorization':`Bearer ${ auth.token }`,
				}
			});
			
			let option = '<option value=""> Select City </option>'
			city.map(data => {
				option += `<option value="${ data.MappingId }" >${ data.Title} </option>`
			})

			$('#customer-city').html(option)
		}

		async function getCitywithId(provinceId, citiesid = ''){
			const city = await $.ajax({
				url: `${ baseUrl }/cityList/${provinceId}`,
				method: 'GET',
				dataType: 'json',
				headers:{
					'Authorization':`Bearer ${ auth.token }`,
				}
			});
			
			let option = '<option value=""> Select City </option>'
			city.map(data => {
				option += `<option value="${ data.MappingId }" >${ data.Title} </option>`
			})

			$('#customer-city').html(option)
			$(`#customer-city`).val(citiesid).trigger('change')
		}

		async function getBarangay(cityId){
			const brgy = await $.ajax({
				url: `${ baseUrl }/brgyList/${cityId}`,
				method: 'GET',
				dataType: 'json',
				headers:{
					'Authorization':`Bearer ${ auth.token }`,
				}
			});
			
			let option = '<option value=""> Select Barangay </option>'

			brgy.map(data => {
				option += `<option value="${ data.OrderNumber }" >${ data.Title} </option>`
			})

			$('#customer-barangay').html(option)
			$(`#customer-barangay`).val(brgy_id).trigger('change')
			
		}
		
		async function getBarangaywithId(cityId, barangaysid = ''){
			const brgy = await $.ajax({
				url: `${ baseUrl }/brgyList/${cityId}`,
				method: 'GET',
				dataType: 'json',
				headers:{
					'Authorization':`Bearer ${ auth.token }`,
				}
			});
			
			let option = '<option value=""> Select Barangay </option>'

			brgy.map(data => {
				option += `<option value="${ data.OrderNumber }" >${ data.Title} </option>`
			})

			$('#customer-barangay').html(option)
			$(`#customer-barangay`).val(barangaysid).trigger('change')
		}

		async function fetch_source_of_income(source = ''){
			const source_of_income = await $.ajax({
				url: `${ baseUrl }/customer/source_of_income`,
				method: 'GET',
				dataType: 'json',
				headers:{
					'Authorization':`Bearer ${ auth.token }`,
				}
			});

			let option = '<option value="">Select Source of Income</option>'
			source_of_income.map(data => {
				option += `<option value="${ data.source }" >${ data.source } </option>`
			})
			
			$('#customer-source-of-income').html(option)
			$(`#customer-source-of-income`).val(source).trigger('change')
		}

		async function fetch_nationality(national = ''){
			const nationality = await $.ajax({
				url: `${ baseUrl }/customer/nationality`,
				method: 'GET',
				dataType: 'json',
				headers:{
					'Authorization':`Bearer ${ auth.token }`,
				}
			});

			let option = '<option value="">Select Nationality</option>'
			nationality.map(data => {
				option += `<option value="${ data.name }" >${ data.name } </option>`
			})

			$('#customer-nationality').html(option)
			$(`#customer-nationality`).val(national).trigger('change')
		}

		function edit(id, acumatica_id, firstname, middlename, lastname, contact, address, zipCode, nationality, source_of_income, 
			marital_status, date_birth, birth_place, primary_id, primary_id_no, alternative_id, alternative_id_no, provinces, cities, barangays){
			$(`#save-details`).data('customer-profile-id', id)
			$(`#customer-acumatica-id`).val(acumatica_id != 'null' ? acumatica_id : '')
			$(`#customer-first-name`).val(firstname)
			$(`#customer-middle-name`).val((middlename != 'null' ? middlename : ''))
			$(`#customer-last-name`).val(lastname)
			$(`#customer-contact-no`).val(contact)
			$(`#customer-complete-address`).val(address != 'null' ? address : '')
			$(`#customer-zipcode`).val((zipCode != 'null' ? zipCode : ''))

			brgy_id = barangays
			$(`#customer-province`).val(provinces).trigger('change')
			getCitywithId(provinces, cities)
			getBarangaywithId(cities, barangays)

			// $(`#customer-nationality`).val(nationality != 'null' ? nationality : '')
			// $(`#customer-source-of-income`).val(source_of_income != 'null' ? source_of_income : '')
			fetch_nationality(nationality)
			fetch_source_of_income(source_of_income)
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