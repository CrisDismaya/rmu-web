<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>
	<title> User Role Management | RMU </title>
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
								<h4 class="mb-sm-0" id="header-breadcram">System Menu Management</h4>

								<div class="page-title-right">
									<ol class="breadcrumb m-0">
										<li class="breadcrumb-item"><a href="javascript: void(0);"> Maintenance </a></li>
										<li class="breadcrumb-item active"> System Menu Management </li>
									</ol>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<!--  -->
						<div class="col-lg-4 btn-add-perm d-none">
							<div class="card">
								<div class="card-header align-items-center d-flex">
									<h4 class="card-title mb-0 flex-grow-1"> System Menu </h4>
								</div>
								<div class="card-body containter">

									<div class="col-md-12 mb-3">
										<label class="form-label"> Category Menu </label>
										<select id="category-menu" class="select-single"></select>
									</div>

									<div class="col-md-12 mb-3">
										<label class="form-label"> Parent Menu </label>
										<select id="parent-menu" class="select-single"></select>
									</div>

									<div class="col-md-12 mb-3">
										<label class="form-label"> Name </label>
										<input id="menu-name" type="text" class="form-control" placeholder="Menu Name" autocomplete="off">
									</div>

									<div class="col-md-12 mb-3"> 
										<label class="form-label"> File Path <i><small>(note: Empty the field if the menu have submenu)</small></i> </label>
										<input id="menu-file-path" type="text" class="form-control" placeholder="File Path" autocomplete="off">
									</div>

									<div class="col-md-12 mb-3" id="edit-status">
										<label class="form-label"> Status </label>
										<select id="status" class="select-single">
											<option value=""> Choose Status </option>
											<option value="1"> Active </option>
											<option value="0"> Inactive </option>
										</select>
									</div>

									<div class="col-md-12">
										<div class="d-grid gap-2" >
											<button id="save-access-menu" type="button" class="btn btn-primary" data-id="0">
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
									<h4 class="card-title mb-0 flex-grow-1"> System Menu List </h4>
									
								</div>
								<div class="card-body">
									<div class="col-md-3 mb-3">
										<div class="col-md-12">
											<label class="form-label"> User Role </label>
											<select id="user-role" class="select-single"></select>
										</div>
									</div>


									<table id="system-menu-table" class="table table-bordered nowrap align-middle mdl-data-table" style="width:100%">
										<thead>
											<tr>
												<th></th>
												<th> Category </th>
												<th> Parent </th>
												<th> Menu Name </th>
												<th> File Path </th>
												<th> Status </th>
												<th style="text-align: start !important;"> Checkbox </th>
												<th style="text-align: start !important;"> Setup Approval </th>
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

		<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
			<div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="myExtraLargeModalLabel">
							Approval Matrix Setup - <span id="page"></span>
						</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="closeModal()"></button>
					</div>

					<div class="modal-body">
						<div class="row">
							<div class="detail col-lg-12">
								<table id="table-assign-signatory" class="table table-borderless nowrap align-middle mdl-data-table" style="width:100%">
									<thead>
										<tr>
											<td width="5%"></td>
											<td width="80%"></td>
											<td width="15%">
												<button type="button" class="btn btn-soft-secondary btn-sm waves-effect material-shadow-none" onclick="newSignatory()">
													+ Add New
												</button>
											</td>
										</tr>
									</thead>
									<tbody></tbody>
								</table>
							</div>

							<div class="listing col-lg-12">
								<table id="approverlist" class="table table-borderless nowrap align-middle mdl-data-table" style="width:100%">
									<thead>
										<tr>
											<th width="5%"> No </th>
											<th width="80%"> Approver </th>
											<th width="15%"></th>
										</tr>
									</thead>
									<tbody></tbody>
								</table>
							</div>
						</div>
					</div>

					<!-- Footer -->
					<div class="modal-footer">
						<a href="javascript:void(0);" class="btn btn-link link-success fw-medium" data-bs-dismiss="modal" onclick="closeModal()">
							<i class="ri-close-line me-1 align-middle"></i> Close
						</a>
						<button type="button" class="btn btn-primary listing" onclick="addSignatory()">Add Approver</button>
						<button id="save-matrix" data-id="0" type="button" class="btn btn-primary detail">Save changes</button>
					</div>
				</div>
			</div>
		</div>

	</div>

	<?php include_once './_partials/__footer-template.php'; ?>
	<script>

		var matrix = []
		let selectedModule = 0;
		let selectedPage = '';
		let approverCounter = 0; 
		let cachedRoles = [];
		let cachedUsers = [];
		let selectedRoleIds = new Set();
		$(document).ready(function(){
			applyPermissions();
			$('.detail').hide()
			$('#edit-status').hide()
			new_access();
			display_table('');
			user_role();

			fetchSignatoryRolesOnce();
			fetchUsersOnce();

			$('#user-role').change(function(){
				display_table($('#user-role').val());
			});

			$('#save-access-menu').click(function(event){
				event.preventDefault();

            var id = $(this).data('id');
				var url = (id == 0 ? `${ baseUrl }/createSystemMenu` : `${ baseUrl }/updateSystemMenu/${ id }`)

				$.ajax({
					url: url, 
					type: 'POST', 
					headers:{
						'Authorization':`Bearer ${ auth.token }`,
					},
					data : {
						category_menu : $('#category-menu').val(),
						parent_menu : $('#parent-menu').val(),
						menu_name : $('#menu-name').val().trim(),
						menu_file_path : $('#menu-file-path').val().trim(),
						menu_status : $('#status').val(),
               },
					success: function (data) { 
						if(!data.success){
							toast(data.message, 'danger');
						}
						else{
							let msg = id == 0 ? 'Menu Succesfully added!' : 'Menu Succesfully updated!'
							toast(msg, 'success');
                     $('#edit-status').hide();
                     new_access()
							display_table($('#user-role').val())
						}
					},
					error: function(response) {
						toast(response.responseJSON.message, 'danger');
						forceLogout(response.responseJSON) //if token is expired
					}
				});
			});

			$('#save-matrix').click(() => {
				const matrixData = {};

				// Iterate over each signatory row
				$('#table-assign-signatory tbody .signatory-row').each(function () {
					const rowId = $(this).data('id');
					// Only process the first row of each pair (the select row)
					if (!$('#signatory-' + rowId).length) return;

					const roleId = Number($(`#signatory-${rowId}`).val());
					if (!roleId) return; // skip if no role selected

					const users = [];
					$(`#list-${rowId} input[type="checkbox"]:checked`).each(function () {
							users.push({ id: Number($(this).val()) });
					});

					matrixData[rowId] = [{ role: roleId, users }];
				});

				// If you want it as JSON string to send via AJAX:
				const jsonData = JSON.stringify(matrixData);
				console.log(jsonData);
				
				if (matrixData.length == 0) {
					toast('No approvers found to save', 'danger');
					return false;
				}

				$.ajax({
					url: `${ baseUrl }/createMatrix`, 
					type: 'POST', 
					headers:{
						'Authorization':`Bearer ${ auth.token }`,
					},
					data: {
						module: selectedModule,
						matrix: jsonData
					},
					dataType: 'json',
					success: function (data) { 
						console.log(data)
						if(!data.success){
							toast('This role is already assigned as a signatory in the selected module.', 'danger');
						}
						else{
							toast('Approval Matrix successfully setup', 'success');
							matrix = []
							approverCounter = 0;
							$('.detail').hide()
							$('.listing').show()
							setApproval(selectedModule, selectedPage);
						}
					},
					error: function(response) {
						toast(response.responseJSON.data, 'danger');
						forceLogout(response.responseJSON)
					}
				});
			})

		});

		function addSignatory(){
			$('#approval-matrix').empty();
			$('#table-assign-signatory tbody').empty();
			
			$('.listing').hide()
			$('.detail').show()
			newSignatory();
		}

		async function fetchSignatoryRolesOnce() {
			if (cachedRoles.length) return cachedRoles;

			try {
				const roles = await $.ajax({
					url: `${baseUrl}/roles`,
					method: 'GET',
					dataType: 'json',
					headers: {
						'Authorization': `Bearer ${auth.token}`,
					}
				});

				const filteredRoles = roles
					.filter(u => u.id !== '1')

				cachedRoles = filteredRoles;
				return cachedRoles;
			} catch (e) {
				console.error("Failed to load roles:", e);
				return [];
			}
		}

		async function fetchUsersOnce() {
			if (cachedUsers.length) return cachedUsers;

			try {
				const users = await $.ajax({
					url: `${baseUrl}/users`,
					method: 'GET',
					dataType: 'json',
					headers: {
						'Authorization': `Bearer ${auth.token}`,
					}
				});

				const filteredUsers = users
					.filter(u => u.role_id !== '1' && u.role_id !== '7' && u.status === '1')
					.map(u => ({ id: parseInt(u.id), name: `${u.firstname} ${u.lastname}`, role_id: parseInt(u.role_id),  }))

				cachedUsers = filteredUsers;
				return cachedUsers;
			} catch (e) {
				console.error("Failed to load roles:", e);
				return [];
			}
		}

		async function newSignatory() {

			// Find the last existing select-signatory in the table
			const $lastSelect = $('#table-assign-signatory tbody .select-signatory').last();

			if ($lastSelect.length) {
				const prevSelectVal = Number($lastSelect.val()) || 0;
				if (!prevSelectVal) {
					toast('Please select a role for the previous signatory before adding a new one.', 'warning');
					return; // Stop adding new row
				}
			}
			
			approverCounter++;
			matrix.push({ moduleid: selectedModule, order: approverCounter });

			// Fetch roles (cached)
			let roles = await fetchSignatoryRolesOnce();

			// Build select options
			let options = `<option value="">Select Signatory</option>`;
			roles.forEach(r => options += `<option value="${r.id}">${r.user_role_name}</option>`);

			// Build row HTML
			let rowHtml = `
				<tr class="signatory-row" data-id="${approverCounter}">
					<td class="text-center">${approverCounter}</td>
					<td>
						<select id="signatory-${approverCounter}" class="form-select select-signatory">${options}</select>
					</td>
					<td class="text-center">
						<button type="button" class="btn btn-soft-danger btn-sm" onclick="removeSignatory(${approverCounter})">
							- Remove
						</button>
					</td>
				</tr>
				<tr class="signatory-row" data-id="${approverCounter}">
					<td></td>
					<td colspan="2">
						<div class="list-group" id="list-${approverCounter}"></div>
					</td>
				</tr>
			`;

			// Add row
			$('#table-assign-signatory tbody').prepend(rowHtml);

			const $select = $(`#signatory-${approverCounter}`);
			$select.select2({ width: '100%' });

			// Update all selects to disable already selected roles
			function updateSelectOptions() {
				const selectedRoles = $('.select-signatory').map(function () {
					return Number($(this).val()) || 0;
				}).get();

				$('.select-signatory').each(function () {
					const currentVal = Number($(this).val()) || 0;
					$(this).find('option').each(function () {
						const roleId = Number($(this).val());
						$(this).prop('disabled', roleId !== 0 && roleId !== currentVal && selectedRoles.includes(roleId));
					});
				});
			}

			// When select changes
			$select.on('change', function () {
				const selectedRoleId = Number($(this).val());
				const rowId = $(this).attr('id').split('-')[1];
				const listGroup = $(`#list-${rowId}`);
				listGroup.empty();

				// Update disabled options across all selects
				updateSelectOptions();

				if (!selectedRoleId) return;

				const filteredUsers = cachedUsers.filter(u => u.role_id === selectedRoleId);

				if (filteredUsers.length === 0) {
					listGroup.append('<div class="text-muted">No items found for this role</div>');
					return;
				}

				// Split into two columns
				const mid = Math.ceil(filteredUsers.length / 2);
				const left = filteredUsers.slice(0, mid);
				const right = filteredUsers.slice(mid);

				// Build HTML for each column as string (fast)
				const leftHtml = left.map(u => `
					<label class="list-group-item">
						<input class="form-check-input me-1" type="checkbox" value="${u.id}">
						${u.name}
					</label>
				`).join('');

				const rightHtml = right.map(u => `
					<label class="list-group-item">
						<input class="form-check-input me-1" type="checkbox" value="${u.id}">
						${u.name}
					</label>
				`).join('');

				const container = $(`
					<div class="d-flex gap-3">
						<div class="flex-fill">${leftHtml}</div>
						<div class="flex-fill">${rightHtml}</div>
					</div>
				`);

				listGroup.append(container);
			});

			// Trigger once to update disabled options
			$select.trigger('change');
		}

		function removeSignatory(rowId) {
			const remaining = $('.select-signatory').length;

			if (remaining <= 1) {
				toast('At least one signatory must remain.', 'warning');
				return; // Do not remove if only one left
			}
			
			// Remove from matrix
			matrix = matrix.filter(m => m.order !== rowId);

			// Remove the row and its list
			$(`.signatory-row[data-id="${rowId}"]`).remove();
		}

		async function setApproval(moduleid, page){
			$('#page').html(page)
			selectedModule = moduleid;
			selectedPage = page;

			const rows = await $.ajax({
				url: `${baseUrl}/approverByPage/${moduleid}`,
				method: 'GET',
				dataType: 'json',
				headers:{
					'Authorization':`Bearer ${ auth.token }`,
				}
			});

			$('#approverlist tbody').empty();

			let rowNumber = 0;
			for (const row of rows) {
				rowNumber++;

				const signatories = typeof row.signatories === "string" 
					? JSON.parse(row.signatories) 
					: row.signatories;

				if (Array.isArray(signatories) && signatories.length > 0) {
					const roleId = signatories[0].role;
					const role = cachedRoles.find(r => parseInt(r.id) === roleId);
					const roleName = role ? role.user_role_name  : 'Unknown Role';

					const users = signatories[0].users || [];
					const filteredUsers = cachedUsers.filter(u => 
						users.some(us => parseInt(us.id) === parseInt(u.id))
					);

					let rowHtml = `
						<tr class="listed-signatory-row" data-id="${ rowNumber }">
							<td class="text-center">${ rowNumber }</td>
							<td>
								<input type="text" id="role-${ roleId }" class="form-control" value="${ roleName }" readonly/>
							</td>
							<td class="text-center">
								<button type="button" class="btn btn-soft-danger btn-sm" onclick="removeMatrix(${ row.id })">
									<strong><i class="ri-delete-bin-line"></i> Delete</strong>
								</button>
							</td>
						</tr>
						<tr class="listed-signatory-row" data-id="${ rowNumber }">
							<td></td>
							<td colspan="2">
								<div class="list-group" id="list-${ rowNumber }"></div>
							</td>
						</tr>
					`;

					$('#approverlist tbody').append(rowHtml);

					const listGroup = $(`#list-${rowNumber}`);

					if (filteredUsers.length > 0) {
						const mid = Math.ceil(filteredUsers.length / 2);
						const left = filteredUsers.slice(0, mid);
						const right = filteredUsers.slice(mid);

						const leftHtml = left.map(u => `
							<label class="list-group-item">
								${u.name}
							</label>
						`).join('');

						const rightHtml = right.map(u => `
							<label class="list-group-item">
								${u.name}
							</label>
						`).join('');

						const container = $(`
							<div class="d-flex gap-3">
								<div class="flex-fill">${leftHtml}</div>
								<div class="flex-fill">${rightHtml}</div>
							</div>
						`);

						listGroup.append(container);
					} else {
						listGroup.append('<div class="text-muted">No users found</div>');
					}
				}
			}
		}

		function removeMatrix(id){
			$.ajax({
				url: `${ baseUrl }/removeMatrix/${id}`, 
				type: 'GET', 
				headers:{
					'Authorization':`Bearer ${ auth.token }`,
				},
				success: function (data) { 
					if(data.success){
						toast('Approver successfully removed in matrix!', 'success');
						$('.listing').show()
						$('.detail').hide()
						setApproval(selectedModule, selectedPage);
					}
					else {
						toast(data.message, 'warning');
					}
				},
				error: function(response) {
					toast(response.responseJSON.data, 'danger');
					forceLogout(response.responseJSON) //if token is expired
				}
			});
		}

		function new_access(){
			category_menu();
			parent_menu();
			
			$('#save-access-menu').data('id', 0);
			$('#category-menu').val('').trigger('change')
			$('#parent-menu').val('').trigger('change')
			$('#menu-name').val('')
			$('#menu-file-path').val('')
		}

		function category_menu(){
			const menu = [
				// { menu_id: 0, name: 'New Category Menu' },
				{ menu_id: 'Dasboard', name: 'Dasboard' },
				{ menu_id: 'Pages', name: 'Pages' },
				{ menu_id: 'Report', name: 'Report' },
				{ menu_id: 'Settings', name: 'Settings' }
			];

			$('#category-menu').empty();
			$('#category-menu').append(`
				<option value=""> Choose Category Menu </option>
			`);
			for (let i = 0; i < menu.length; i++) {
				const el = menu[i];
				$('#category-menu').append(`<option value="${ el.menu_id }"> ${ el.name } </option>`);
			}
			$('#parcategoryent-menu').val('').trigger('change');
		}

		async function user_role(){
			const user_role = await $.ajax({
				url: `${ baseUrl }/userRole`,
				method: 'GET',
				dataType: 'json',
				headers:{
					'Authorization':`Bearer ${ auth.token }`,
				}
			});

			$('#user-role').empty();
			if(user_role.length > 0){
				$('#user-role').append(`
					<option value=""> Choose User Role </option>
				`);
				for (let i = 0; i < user_role.length; i++) {
					const el = user_role[i];
					if(el.role_status == 'Active'){
						$('#user-role').append(`<option value="${ el.id }"> ${ el.user_role_name } </option>`);
					}
				}
				$('#user-role').val('').trigger('change');
			}
			else {
				$('#user-role').append(`
					<option value=""> Set the User Role First </option>
				`);
			}
		}

		async function parent_menu(){
			const menu = await $.ajax({
				url: `${baseUrl}/menu`,
				method: 'GET',
				dataType: 'json',
				headers:{
					'Authorization':`Bearer ${ auth.token }`,
				}
			});

			$('#parent-menu').empty();
			$('#parent-menu').append(`
				<option value=""> Choose Parent Menu </option>
				<option value="0"> New Parent Menu </option>
			`);
			
			if(menu.length > 0) {
				for (let i = 0; i < menu.length; i++) {
					const el = menu[i];
					$('#parent-menu').append(`<option value="${ el.id }"> ${ el.menu_name } </option>`);
				}
			}
			$('#parent-menu').val('').trigger('change');
		}

		async function display_table(user_role_id){
			const tableData = await $.ajax({
				url: `${ baseUrl }/menuList/${ (user_role_id == '' ? 0 : user_role_id) }`,
				method: 'GET',
				dataType: 'json',
				headers:{
					'Authorization':`Bearer ${ auth.token }`,
				}
			});

			$("#system-menu-table").DataTable().destroy();
			$("#system-menu-table").DataTable({
				deferRender: true,
				searching: true,
				scrollY: 400,
		  		scrollX: true,
				scrollCollapse: true,
				paging: false,
				data: tableData,
				columnDefs:[
					{ className: "text-center", "targets": [5, 6] }
				],
				columns: [
					{ data: null, defaultContent: '',
						fnCreatedCell: function(nTd, sData, oData, iRow, iCol){
							html = `
							<i class="ri-edit-2-fill" 
								onclick="selectMenu(${ oData.id }, '${ oData.category_name }', '${ oData.parent_id }', '${ oData.menu_name }', '${ oData.file_path }', '${ oData.menu_status }')"
								style="cursor:pointer; color:red" title="edit"
							></i>
							`;
							$(nTd).html(html);
						}
					},
					{ data: "category_name" },
					{ data: "parent_name" },
					{ data: "menu_name" },	
					{ data: "file_path" },
					{ data: "menu_status" },
					{ data: null, defaultContent: '', visible: isUpdate === 1,
						fnCreatedCell: function(nTd, sData, oData, iRow, iCol){
							html = `
								<input class="form-check-input checks" type="checkbox" id="menu-${ oData.id }" style="height: 18px; width: 18px; cursor: pointer;"
									onclick="selected_menu(${ oData.id }, ${ oData.map_id })" ${ (oData.isCheck == 'true' ? 'checked' : '') }>
							`;
							$(nTd).html(html);
						}
					},
					{ data: null, defaultContent: '', visible: isUpdate === 1,
						fnCreatedCell: function(nTd, sData, oData, iRow, iCol){

							html = oData.is_approvable == 'true' ?
								`
									<button class="btn btn-sm btn-soft-info" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
										onclick="setApproval(${ oData.id },'${ oData.menu_name}')"> 
										<i class="ri-user-line"></i> 
									</button>
								`
								: ``;
							$(nTd).html(html);
						}
					},
				]
			});
		}

		function selectMenu(id,category,parentid,menuname,filepath, menuStatus){
			$('#save-access-menu').data('id', id);
			$('#category-menu').val(category).trigger('change');
			$('#parent-menu').val(parentid).trigger('change');
			$('#menu-name').val(menuname)
			$('#menu-file-path').val(filepath)
			$('#edit-status').show();
			$('#status').val(menuStatus == 'Active' ? '1' : '0').trigger('change');
		}

		function selected_menu(menu_id, map_id){
			if($('#user-role').val() == ''){
				toast('Choose the User Role', 'danger');
				$(`#menu-${ menu_id }`).prop('checked', false);
				return false;
			}
			else {
				$.ajax({
					url: `${ baseUrl }/createMenuMapping`, 
					type: 'POST', 
					headers:{
						'Authorization':`Bearer ${ auth.token }`,
					},
					data : {
						user_role_id : $('#user-role').val(),
						menu_id : menu_id,
						map_id : (map_id == null ? 0 : map_id)
               },
					success: function (data) { 
						if(!data.success){
							toast(data.message, 'danger');
						}
						else{
							toast(data.message, 'success');
							display_table($('#user-role').val())
						}
					},
					error: function(response) {
						toast(response.responseJSON.message, 'danger');
						forceLogout(response.responseJSON) //if token is expired
					}
				});
			}
		}

		function closeModal(){
			$('.listing').show()
			$('.detail').hide()
		}
	</script>