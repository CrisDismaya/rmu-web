
<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>
	<title> User Management | RMU </title>
	<?php include_once './_partials/__header-template.php'; ?>
</head>
<style>
   .table .form-check-input {
      width: 22px;
      height: 22px;
      cursor: pointer;
   }

   .table .form-check {
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 6px;
   }
   .table th,
   .table td {
      padding-top: 4px !important;
      padding-bottom: 4px !important;
      vertical-align: middle;
   }
   /* Strong override: cancel hover styles for rows with .no-hover */
   .table.table-hover tbody tr.no-hover:hover td,
   .table.table-hover tbody tr.no-hover:hover th {
      /* remove any hover background or text color */
      background-color: transparent !important;
      color: inherit !important;
      cursor: default !important;

      /* remove any background image / gradients set by library */
      background-image: none !important;
      box-shadow: none !important;
   }

   /* Make parent rows visually distinct (non-hover look) */
   .table.table-hover tbody tr.no-hover td,
   .table.table-hover tbody tr.no-hover th {
      background-color: #f8f9fa !important; /* light gray */
      color: inherit !important;
      font-weight: 600;
      cursor: default;
   }
</style>
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
										<button type="button" class="btn btn-soft-primary btn-sm btn-add-perm d-none" data-bs-toggle="modal" data-bs-target="#staticBackdrop" 
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

	<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="myExtraLargeModalLabel">User Details</h5>
					<button type="button" class="btn-close mdl-btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body container">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="card border card-border-primary">
								<div class="card-header">
									<h6 class="card-title mb-0"> User Information </h6>
								</div>
								<div class="card-body">
									<div class="row">
										<div class="col-md-4 col-sm-6 col-12">
											<label for="customer-name" class="col-form-label"> Choose Branch </label>
											<select id="user-branch" class="select-single"></select>
										</div>

										<div class="col-md-4 col-sm-6 col-12">
											<label for="customer-name" class="col-form-label"> Employee No</label>
											<input type="text" class="form-control" id="user-employee-no" placeholder="Employee No" autocomplete="off">
										</div>
									</div>

									<div class="row">
										<div class="col-md-4 col-sm-6 col-12">
											<label for="customer-name" class="col-form-label"> First Name</label>
											<input type="text" class="form-control" id="user-first-name" placeholder="First Name" autocomplete="off">
										</div>
										<div class="col-md-4 col-sm-6 col-12">
											<label for="customer-name" class="col-form-label"> Middle Name</label>
											<input type="text" class="form-control" id="user-middle-name" placeholder="Middle Name" autocomplete="off">
										</div>
										<div class="col-md-4 col-sm-6 col-12">
											<label for="customer-name" class="col-form-label"> Last Name</label>
											<input type="text" class="form-control" id="user-last-name" placeholder="Last Name" autocomplete="off">
										</div>
									</div>
									
									<div class="row">
										<div class="col-md-4 col-sm-6 col-12">
											<label for="customer-name" class="col-form-label"> Email</label>
											<input type="email" class="form-control" id="user-email" placeholder="Email" autocomplete="off">
										</div>
										<div class="col-md-4 col-sm-6 col-12">
											<label for="customer-name" class="col-form-label"> Choose User Role</label>
											<select id="user-role" class="select-single"></select>
										</div>
										<div class="col-md-4 col-sm-6 col-12" id="password-container">
											<label for="customer-name" class="col-form-label"> Password </label>
											<input id="user-password" type="password" class="form-control" placeholder="Password">
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="card border card-border-primary">
								<div class="card-header">
									<h6 class="card-title mb-0"> User Menus Access </h6>
								</div>
								<div class="card-body">
									
									<div class="table-responsive">
                              <table id="menus" class="table table-bordered table-hover align-middle table-nowrap mb-0" style="table-layout: fixed; width: 100%;">
                                 <thead class="table-light">
                                    <tr>
                                       <th class="text-center" style="width:5%">No</th>
                                       <th style="width:35%">Menu Name</th>
                                       <th class="text-center" style="min-width:115px;">All</th>
                                       <th class="text-center" style="min-width:115px;">View</th>
                                       <th class="text-center" style="min-width:115px;">Add</th>
                                       <th class="text-center" style="min-width:115px;">Update</th>
                                    </tr>
                                 </thead>
                                 <tbody></tbody>
                              </table>
                           </div>

								</div>
							</div>
						</div>
					</div>

				</div>
				<div class="modal-footer">
					<a href="javascript:void(0);" class="btn btn-link link-success fw-medium mdl-btn-close" data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i> Close</a>
					<button id="save-user" data-id="0" type="button" class="btn btn-primary">Save changes</button>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="resetPasswrdModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="myExtraLargeModalLabel">Reset Passowrd</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body container">
					<div class="col-lg-12 row">
						<div class="col-lg-12">
							<label class="col-form-label"> Name </label>
							<input type="text" class="form-control" id="rp-name" readonly>
						</div>
						<div class="col-lg-12">
							<label class="col-form-label"> New Password </label>
							<input type="text" class="form-control" id="rp-new-password" readonly>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<a href="javascript:void(0);" class="btn btn-link link-success fw-medium" data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i> Close</a>
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
      const $menuBody = $("#menus tbody");

		$(document).ready(() => {
			applyPermissions();
			fetch_branch_data();
			display_table();
			fetch_userole_data();

			showMenuMessage("Please select a role to generate the menu list.");

			$('#user-role').on('change', function() {
				let userId = $('#save-user').data('id') ? $('#save-user').data('id') : 0;
				let roleId = $(this).val();

				if (roleId === '') {
					showMenuMessage("Please select a role to generate the menu list.");
					return;
				}

				loadMenus(userId, roleId);
			});

			$('#staticBackdrop .mdl-btn-close').click(function(){
				$('#save-user').data('id', 0);
				$menuBody.empty();
				showMenuMessage("Please select a role to generate the menu list.");
			});

			$('#save-user').click(function(){
				let id = $(this).data('id')
				let url = (id == 0 ? `${baseUrl}/register` : `${baseUrl}/updateUser/`+id)

				const menuData = [];

				 $('.child-menu').each(function () {
					const $row = $(this);

					menuData.push({
						menu_id: $row.data('menu-id'),
						view_permission: 1,
						add_permission: $row.find('.add-check').is(':checked') ? 1 : 0,
						update_permission: $row.find('.update-check').is(':checked') ? 1 : 0,
					});
				});

				const data = {
					employee_no : $('#user-employee-no').val(),
					firstname : $('#user-first-name').val(),
					middlename : $('#user-middle-name').val(),
					lastname : $('#user-last-name').val(),
					email : $('#user-email').val(),
					userrole : $('#user-role').val(),
					branch : $('#user-branch').val(),
					password:$('#user-password').val(),
					access_menus: JSON.stringify(menuData)
				}
				showLoader()

				$.ajax({
					url: url, 
					type: 'POST', 
					dataType: 'json',
					headers:{
						'Authorization':`Bearer ${ auth.token }`,
					},
					data: data, 
					success: function (data) { 
						console.log(`data`, data)
						console.log(`data.success`, !data.success)
						if(!data.success){
							hideLoader()
							for (const field in data.data) {
								if (data.data.hasOwnProperty(field)) {
									const messages = data.data[field];
									if (messages.length > 0) {
										toast(messages[0], 'danger');
										break;
									}
								}
							}
						}
						else{
							console.log(`else condition`, data.message)
							hideLoader()
							let msg = id == 0 ? 'User Succesfully added!' : 'User Succesfully updated!'
							toast(msg, 'success');
							display_table()
							$('#staticBackdrop').modal('hide')
						}
					},
					error: function(response) {
						hideLoader()
						toast(response.responseJSON.message, 'danger');
						forceLogout(response.responseJSON) //if token is expired
					}
				});
			});
      });

		function newUser(){
			$('#save-user').data('id', 0)
			$('#user-employee-no').val('')
			$('#user-first-name').val('')
			$('#user-middle-name').val('')
			$('#user-last-name').val('')
			$('#user-email').val('')
			$('#user-role').val('').trigger('change')
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
				fixedColumns: {
					left: 0,
					right: 1
				},
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
					{ data: null, defaultContent: '', visible: isUpdate === 1,
						fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
							var status = oData.status;

							// For toggle button
							var classes = (status != 1 ? 'success' : 'danger');
							var text = (status != 1 ? 'Activate' : 'Deactivate');

							// Always show Edit button
							var html = `
								<button class="btn btn-sm btn-soft-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
										onclick="edit(${oData.id}, '${oData.employee_no}', '${oData.firstname}', '${oData.middlename}', '${oData.lastname}', '${oData.email}', '${oData.branch}', '${oData.userrole}')">
										<i class="ri-edit-box-line"></i> Edit
								</button>
							`;

							// Show Reset Password only for active users
							if (status == 1) {
								html += `
										&nbsp; | &nbsp;
										<button class="btn btn-sm btn-soft-primary"
											onclick="resetPassword(${oData.id}, '${oData.firstname}', '${oData.lastname}')">
											<i class="ri-lock-password-line"></i> Reset Password
										</button>
								`;
							}

							// Always show Activate/Deactivate button
							html += `
								&nbsp; | &nbsp;
								<button class="btn btn-sm btn-soft-${classes}"
										onclick="deactivate(${oData.id}, ${oData.status})">
										${text}
								</button>
							`;

							$(nTd).html(html);
						}
					},
				]
			});
		}

		function edit(id, employeeno, fname, mname, lname, email, branchid, role){
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

		function resetPassword(id, fname, lname){
			$('#resetPasswrdModal').modal('show')
			$('#rp-name').val(`${ fname } ${ lname }`)

			showLoader()
			$.ajax({
				url: `${baseUrl}/resetPassword/`+id, 
				type: 'GET', 
				headers:{
					'Authorization':`Bearer ${ auth.token }`,
				},
				success: function (data) { 

					console.log(data);
					
					if(!data.success){
						hideLoader()
						toast(data.message, 'danger');
					}
					else{
						$('#rp-new-password').val(data.data)
						hideLoader()
						toast('Password succesfully reset!', 'success');
					}
				},
				error: function(response) {
					hideLoader()
					toast(response.responseJSON.message, 'danger');
					forceLogout(response.responseJSON) //if token is expired
				}
			});
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

		// Fetch menus per role/user
      async function loadMenus(userId, roleId) {
         showMenuMessage(`
            <div class="spinner-border spinner-border-sm text-secondary me-2"></div> 
            Loading menus...
         `);

         try {
            const response = await $.ajax({
               url: `${baseUrl}/getUserMenus/${userId}/${roleId}`,
               method: "GET",
               dataType: "json",
               headers: { Authorization: `Bearer ${auth.token}` },
            });

            if (!response.length) {
               showMenuMessage("No menu items available for this role.");
               return;
            }

            const rows = response.map((item, index) => renderMenuRow(item, index)).join("");
            $menuBody.html(rows);
            setupCheckboxLogic();

         } catch (error) {
            console.error("Error loading menus:", error);
            showMenuMessage("Failed to load menu list.");
         }
      }

      // Render menu table row
      function renderMenuRow(item, index) {
         const {
            id = 0,
            menu_name = "-",
            file_path = "",
            view_permission,
            add_permission,
            update_permission,
            approval_permission,
         } = item;

         if (!String(file_path || "").trim()) {
            return `
               <tr class="table-light no-hover parent-menu">
                  <td class="text-center fw-bold">${index + 1}</td>
                  <td class="fw-bold">${menu_name}</td>
                  <td class="text-center" colspan="4">
                     <em class="text-muted">No actions available</em>
                  </td>
               </tr>
            `;
         }

         const allChecked = [view_permission, add_permission, update_permission].every(p => p == "1");

         return `
            <tr class="child-menu" data-menu-id="${id}">
               <td class="text-center">${index + 1}</td>
               <td>${menu_name}</td>
               <td class="text-center"><input class="form-check-input all-check" type="checkbox" ${allChecked ? "checked" : ""}></td>
               <td class="text-center"><input class="form-check-input view-check" type="checkbox" checked disabled></td>
               <td class="text-center"><input class="form-check-input add-check" type="checkbox" ${checked(add_permission)}></td>
               <td class="text-center"><input class="form-check-input update-check" type="checkbox" ${checked(update_permission)}></td>
            </tr>
         `;
      }

      // Checkbox logic
      function setupCheckboxLogic() {
         $("#menus").off("change", ".form-check-input").on("change", ".form-check-input", function () {
            const $row = $(this).closest("tr");
            const $all = $row.find(".all-check");
            const $add = $row.find(".add-check");
            const $update = $row.find(".update-check");

            if ($(this).hasClass("all-check")) {
               const checked = $(this).is(":checked");
               [$add, $update].forEach($el => $el.prop("checked", checked));
               return;
            }

            const allChecked = [$add, $update].every($el => $el.is(":checked"));
            $all.prop("checked", allChecked);

            const viewAddOnly = $add.is(":checked") && !$update.is(":checked");
            if (viewAddOnly) $all.prop("checked", false);
         });
      }

      // Utility helpers
      function checked(val) {
         return val == "1" ? "checked" : "";
      }

      function showMenuMessage(message) {
         const colCount = $("#menus thead tr th:visible").length;
         $menuBody.html(`
            <tr>
               <td colspan="${colCount}" class="text-center text-muted py-3">${message}</td>
            </tr>
         `);
      }
	</script>
</body>
</html>