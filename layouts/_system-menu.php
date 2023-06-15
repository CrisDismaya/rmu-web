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
								<h4 class="mb-sm-0">System Menu Management</h4>

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
						<div class="col-lg-4">
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


			<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="myExtraLargeModalLabel">Approval Matrix Setup - <span id="page"></span></h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="closeModal()"></button>
							</div>
							<hr />
							<div class="modal-body container" >
								<div class="detail">
									<div class="row">
										<div class="col-lg-10"></div>
										<div class="col-lg-2">
											<a href='#' onclick="newSignatory()"><span>+ Add New</span></a>
										</div>
									</div>
									<div id="approval-matrix">
									</div>
									</div>
									
								</div>
								<div class="listing">
									<div class="row" style="padding:10px;">
										<table id="approverlist" class="table table-bordered nowrap align-middle mdl-data-table" style="width:100%">
											<thead>
												<tr>
													<th> Level </th>
													<th> Approver </th>
													<th>  </th>
												</tr>
											</thead>
										</table>
									</div>
								</div>
								<div class="modal-footer">
									<a href="javascript:void(0);" class="btn btn-link link-success fw-medium" data-bs-dismiss="modal" onclick="closeModal()"><i class="ri-close-line me-1 align-middle"></i> Close</a>
									<button  type="button" class="btn btn-primary listing" onclick="addSignatory()">Add Approver</button>
									<button id="save-matrix" data-id="0" type="button" class="btn btn-primary detail">Save changes</button>
								</div>
								
						</div>
					</div>
				</div>
		</div>
	</div>

	<?php include_once './_partials/__footer-template.php'; ?>
	<script>

		var matrix = []
		$(document).ready(function(){
			$('.detail').hide()
			$('#edit-status').hide()
			new_access();
			display_table('');
			user_role();

			$('#user-role').change(function(){
				display_table($('#user-role').val());
			});

			$('#save-access-menu').click(function(event){
				event.preventDefault();

            var id = $(this).data('id');
				var url = (id == 0 ? `${ baseUrl }/createSystemMenu` : `${ baseUrl }/updateUserRole/${ id }`)

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
               },
					success: function (data) { 
                  // console.log(data)
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
					}
				});
			});

			$('#save-matrix').click(() => {
				let info = []
				for(let i = 0; i < matrix.length; i++){
					info.push({
						module_id:matrix[i].moduleid,
						level:matrix[i].order,
						signatories:[{
							user:$('#signatory-'+matrix[i].order).val()
						}]
					})
					
				}
				console.log(info)
				$.ajax({
					url: `${ baseUrl }/createMatrix`, 
					type: 'POST', 
					
					headers:{
						'Authorization':`Bearer ${ auth.token }`,
					},
					data: {'data':info},
					dataType: 'json',
					success: function (data) { 
						if(!data.success){
							toastr.error(data.data);
						}
						else{
							toast('Approval Matrix successfully setup', 'success');
							matrix = []
							$('.detail').hide()
							$('.listing').show()
							$('#staticBackdrop').modal('hide')
						}
					},
					error: function(response) {
						toast(response.responseJSON.data, 'error');
					}
				});
			})

		});

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
					{ data: "category_name" },
					{ data: "parent_name" },
					{ data: "menu_name" },	
					{ data: "file_path" },
					{ data: "menu_status" },
					{ data: null, defaultContent: '',
						fnCreatedCell: function(nTd, sData, oData, iRow, iCol){
							html = `
								<input class="form-check-input checks" type="checkbox" id="menu-${ oData.id }" style="height: 18px; width: 18px; cursor: pointer;"
									onclick="selected_menu(${ oData.id }, ${ oData.map_id })" ${ (oData.isCheck == 'true' ? 'checked' : '') }>
							`;
							$(nTd).html(html);
						}
					},
					{ data: null, defaultContent: '',
						fnCreatedCell: function(nTd, sData, oData, iRow, iCol){
							html = `
							<button class="btn btn-sm btn-soft-info" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
									onclick="setApproval(${ oData.id },'${ oData.menu_name}')"> 
									<i class="ri-user-line"></i> 
								</button>
							`;
							$(nTd).html(html);
						}
					},
				]
			});
		}

		function setApproval(moduleid,page){

			getAllPageSignatory(moduleid)

			matrix = []
			
			matrix.push({
				moduleid:moduleid,
				order:1
			})

			let signatory = ''
			for(let i = 0; i < matrix.length; i++){
				
				signatory += `
				<div id="row-${ matrix.length }" class="col-lg-12 row">
						
						<div class="col-12">
							<div class="mb-3">
								<label class="form-label">Approver - ${ matrix.length }  </label>
								<select id="signatory-${ matrix.length }" class="form-control"></select>
							</div>
						</div>
				</div>
				`

				fetchSignatory(`${ i+1 }`)
			}
			$('#approval-matrix').html(signatory)
			$('#page').html(page)
			
			
		}

		function newSignatory(){

			matrix.push({
				moduleid:matrix[0].moduleid,
				order:''
			})

			for(let i = 0; i < matrix.length; i++){
				
				if(matrix[i].order == ''){
					matrix[i].order = matrix.length
					$('#approval-matrix').append(`
					<div id="row-${ matrix.length }" class="col-lg-12 row">
							
							<div class="col-12">
								<div class="mb-3">
									<label class="form-label">Approver - ${ matrix.length }  <span title="remove" 
									style="color:red;cursor:pointer;margin-left:10px;" onclick="remove(${matrix.length})">X</span> </label>
									<select id="signatory-${ matrix.length }" class="form-control"></select>
								</div>
							</div>
					</div>
					`)
					fetchSignatory(matrix.length)
				}
				
			}
			
		}

		function remove(index){
			matrix = matrix.filter(d => {return d.order != index})
			$(`#row-${ index }`).hide()
			// $('#approval-matrix').html('')
			// for(let i = 0; i < matrix.length; i++){
				
			// 		matrix[i].order = i+1
			// 		$('#approval-matrix').append(`
			// 		<div id="row-${ i+1 }" class="col-lg-12 row">
							
			// 				<div class="col-12">
			// 					<div class="mb-3">
			// 						<label class="form-label">Approver - ${ i+1 }  <span title="remove" 
			// 						style="color:red;cursor:pointer;margin-left:10px;" onclick="remove(${i+1})">X</span> </label>
			// 						<select id="signatory-${i+1 }" class="form-control"></select>
			// 					</div>
			// 				</div>
			// 		</div>
			// 		`)
			// 		fetchSignatory(i+1)
				
				
			// }
		}

		async function fetchSignatory(index){
			const users = await $.ajax({
				url: `${ baseUrl }/users`,
				method: 'GET',
				dataType: 'json',
				headers:{
					'Authorization':`Bearer ${ auth.token }`,
				}
			});

			$('#signatory-'+index).empty();
			 
			// let filtered_user = users.filter(d => {  return d.userrole == 'General Manager' ||   d.userrole == 'Verifier'})

			let filtered_user = users

			$('#signatory-'+index).append(`
					<option value=""> Choose User </option>
				`);
			if(filtered_user.length > 0){
				
				for (let i = 0; i < filtered_user.length; i++) {
					const el = filtered_user[i];
					if(el.status == '1'){
						$('#signatory-'+index).append(`<option value="${ el.id }"> ${ el.firstname } </option>`);
					}
				}
				//$('#signatory-'+index).val('').trigger('change');
			}
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
                  console.log(data)
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
					}
				});
			}
		}

		function addSignatory(){
			$('.listing').hide()
			$('.detail').show()
		}

		function closeModal(){
			$('.listing').show()
			$('.detail').hide()
		}

		async function getAllPageSignatory(pageid){
			const tableData = await $.ajax({
				url: `${baseUrl}/approverByPage/${pageid}`,
				method: 'GET',
				dataType: 'json',
				headers:{
					'Authorization':`Bearer ${ auth.token }`,
				}
			});

		
			$("#approverlist").DataTable().destroy();
			$("#approverlist").DataTable({
				deferRender: true,
				searching: true,
				scrollY: 400,
		  		scrollX: true,
				scrollCollapse: true,
				paging: false,
				data: tableData,
				// aoColumnDefs: [
				// 	{ className: "text-end", targets: [ 4 ] },
				// ],
				columns: [
					
					{ data: "level" },
					{ data: "name" },
					{ data: null, defaultContent: '',
						fnCreatedCell: function(nTd, sData, oData, iRow, iCol){
							html = `
							<button class="btn btn-sm btn-soft-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
									onclick="removeMatrix(${ oData.id })"> 
									X 
								</button>
							`;
							$(nTd).html(html);
						}
					},
				]
			});
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
							getAllPageSignatory(matrix[0].moduleid)
						}
						
					},
					error: function(response) {
						toast(response.responseJSON.data, 'danger');
					}
				});
			
		}
	</script>