
<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>
	<title> User Management | RMU </title>
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
								<h4 class="mb-sm-0" id="header-breadcram">User Management</h4>

								<div class="page-title-right">
									<ol class="breadcrumb m-0">
										<li class="breadcrumb-item"><a href="javascript: void(0);"> Maintenance </a></li>
										<li class="breadcrumb-item active"> User Management </li>
									</ol>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<!-- table -->
						<div class="col-lg-12">
							<div class="card">
								<div class="card-header align-items-center d-flex">
									<h4 class="card-title mb-0 flex-grow-1">User Management</h4>
									<div class="flex-shrink-0">
										<button type="button" class="btn btn-soft-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop" 
											onclick="newUser()">
											Add User
										</button>
									</div>
								</div>
								<div class="card-body">
									<table id="users-table" class="table table-bordered nowrap align-middle mdl-data-table" style="width:100%">
										<thead>
											<tr>
												<th> Branch </th>
												<th> Employee No </th>
												<th> First Name </th>
												<th> Middle Name </th>
												<th> Last Name </th>
												<th> Email </th>
												<th> User Role </th>
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
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="myExtraLargeModalLabel">User Details</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body container">
					<div class="col-lg-12 row">
						<div class="col-lg-4">
							<label for="customer-name" class="col-form-label"> Choose Branch </label>
							<select id="user-branch" class="select-single"></select>
						</div>
						<div class="col-lg-4">
							<label for="customer-name" class="col-form-label"> EMployee No</label>
							<input type="text" class="form-control" id="user-employee-no" placeholder="Employee No" autocomplete="off">
						</div>
					</div>
					<div class="col-lg-12 row">
						<div class="col-lg-4">
							<label for="customer-name" class="col-form-label"> First Name</label>
							<input type="text" class="form-control" id="user-first-name" placeholder="First Name" autocomplete="off">
						</div>
						<div class="col-lg-4">
							<label for="customer-name" class="col-form-label"> Middle Name</label>
							<input type="text" class="form-control" id="user-middle-name" placeholder="Middle Name" autocomplete="off">
						</div>
						<div class="col-lg-4">
							<label for="customer-name" class="col-form-label"> Last Name</label>
							<input type="text" class="form-control" id="user-last-name" placeholder="Last Name" autocomplete="off">
						</div>
					</div>
					<div class="col-lg-12 row">
						<div class="col-lg-4">
							<label for="customer-name" class="col-form-label"> Email</label>
							<input type="email" class="form-control" id="user-email" placeholder="Email" autocomplete="off">
						</div>
						<div class="col-lg-4">
							<label for="customer-name" class="col-form-label"> Choose User Role</label>
							<select id="user-role" class="select-single">
								<!-- <option value=""> User Role </option>
								<option value="superadmin"> Super Admin </option>
								<option value="admin"> Admin </option>
								<option value="branch"> Branch </option>
								<option value="finance"> Finance </option> -->
							</select>
						</div>
						<div class="col-lg-4" id="password-container">
							<label for="customer-name" class="col-form-label"> Password </label>
							<input id="user-password" type="password" class="form-control" placeholder="Password">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<a href="javascript:void(0);" class="btn btn-link link-success fw-medium" data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i> Close</a>
					<button id="save-user" data-id="0" type="button" class="btn btn-primary">Save changes</button>
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
		fetch_branch_data();
		display_table();
		fetch_userole_data();

		$('#save-user').click(function(){
			let id = $(this).data('id')
			let url = (id == 0 ? `${baseUrl}/register` : `${baseUrl}/updateUser/`+id)

			showLoader()

			$.ajax({
				url: url, 
				type: 'POST', 
				dataType: 'json',
				headers:{
					'Authorization':`Bearer ${ auth.token }`,
				},
				data: { 
					employee_no : $('#user-employee-no').val(),
					firstname : $('#user-first-name').val(),
					middlename : $('#user-middle-name').val(),
					lastname : $('#user-last-name').val(),
					email : $('#user-email').val(),
					userrole : $('#user-role').val(),
					branch : $('#user-branch').val(),
					password:$('#user-password').val()
				}, 
				success: function (data) { 
					if(!data.success){
						hideLoader()
						toastr.error(data.message);
					}
					else{
						hideLoader()
						let msg = id == 0 ? 'User Succesfully added!' : 'User Succesfully updated!'
						toast(msg, 'success');
						$('#save-user').data('id', 0)
						$('#user-employee-no').val('')
						$('#user-first-name').val('')
						$('#user-middle-name').val('')
						$('#user-last-name').val('')
						$('#user-email').val('')
						$('#user-role').val('')
						$('#user-branch').val('').trigger('change')
						$('#user-password').val('')
						display_table()
						$('#staticBackdrop').modal('hide')
					}
				},
				error: function(response) {
					hideLoader()
					toast(response.responseJSON.message, 'error');
					forceLogout(response.responseJSON) //if token is expired
				}
			});
		});

		function newUser(){
			$('#save-user').data('id', 0)
			$('#user-employee-no').val('')
			$('#user-first-name').val('')
			$('#user-middle-name').val('')
			$('#user-last-name').val('')
			$('#user-email').val('')
			$('#user-role').val('')
			$('#user-branch').val('').trigger('change')
			$('#user-password').val('')
			$('#password-container').show()
		}

		function fetch_userole_data(){
			$.ajax({
				url: `${baseUrl}/userroles`, 
				type: 'GET', 
				headers:{
					'Authorization':`Bearer ${ auth.token }`,
				},
				success: function (data) {
					$('#user-role').empty();

					if(data.length > 0){
						$('#user-role').append(`<option value=""> Choose User Role </option>`);
						for (let i = 0; i < data.length; i++) {
							const el = data[i];
							$('#user-role').append(`<option value="${ el.user_role_name }">${ el.user_role_name }</option>`);
						}
					}
					else{
						$('#user-role').append(`<option value=""> No Available Data </option>`);
					}
				},
				error: function(response) {
					toast(response.responseJSON.message, 'danger');
					forceLogout(response.responseJSON) //if token is expired
				}
			});
		}
		
		function fetch_branch_data(){
			$.ajax({
				url: `${baseUrl}/branches`, 
				type: 'GET', 
				headers:{
					'Authorization':`Bearer ${ auth.token }`,
				},
				success: function (data) {
					$('#user-branch').empty();

					if(data.length > 0){
						$('#user-branch').append(`<option value=""> Choose Branch </option>`);
						for (let i = 0; i < data.length; i++) {
							const el = data[i];
							$('#user-branch').append(`<option value="${ el.id }">${ el.name }</option>`);
						}
					}
					else{
						$('#user-branch').append(`<option value=""> No Available Data </option>`);
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
				url: `${baseUrl}/users`,
				method: 'GET',
				dataType: 'json',
				headers:{
					'Authorization':`Bearer ${ auth.token }`,
				}
			});

			$("#users-table").DataTable().destroy();
			$("#users-table").DataTable({
				deferRender: true,
				searching: true,
				scrollY: 400,
		  		scrollX: true,
				scrollCollapse: true,
				paging: false,
				data: tableData,
				columns: [
					{ data: "branch_name" },
					{ data: "employee_no" },
					{ data: "firstname" },
					{ data: "middlename" },
					{ data: "lastname" },
					{ data: "email" },
					{ data: "userrole" },
					{ data: "status", defaultContent: '',
						render: function (data, type, row) {
							return (data == 1 ? 'Active' : 'Inactive');
						}
					},
					{ data: null, defaultContent: '',
						fnCreatedCell: function(nTd, sData, oData, iRow, iCol){
							var status = oData.status;
							var classes = (status != 1 ? 'success' : 'danger');
							var text = (status != 1 ? 'Activate' : 'Deactivate');
							
							html = `
								<button class="btn btn-sm btn-soft-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
									onclick="edit(${ oData.id }, '${ oData.employee_no }', '${ oData.firstname }', '${ oData.middlename }', '${ oData.lastname }', '${ oData.email }','${ oData.branch }',
										'${ oData.userrole }')"> 
									<i class="ri-edit-box-line"></i> Edit 
								</button> 
								&nbsp; | &nbsp;  
								<button class="btn btn-sm btn-soft-${ classes }"
									onclick="deactivate(${ oData.id }, ${ oData.status })">
									${ text }
								</button>
							`;
							$(nTd).html(html);
						}
					},
				]
			});
		}

		function edit(id, employeeno, fname, mname, lname, email, branchid, role){
			console.log(role)
			$('#save-user').data('id', id)
			$('#user-employee-no').val(employeeno)
			$('#user-first-name').val(fname)
			$('#user-middle-name').val(mname)
			$('#user-last-name').val(lname)
			$('#user-email').val(email)
			$('#user-role').val(role).trigger('change')
			$('#user-branch').val(branchid).trigger('change')
			$('#password-container').hide()
			
		}

		function deactivate(id, status){
			let stats = (status == 1 ? '0' : '1')
			showLoader()
			$.ajax({
				url: `${baseUrl}/deactivateUser/`+id+"/"+stats, 
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
						let msg = (stats == '1' ? 'Branch Succesfully activated!' : 'Branch Succesfully deactivated!')
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