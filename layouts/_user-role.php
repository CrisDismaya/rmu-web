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
								<h4 class="mb-sm-0">User Role Management</h4>

								<div class="page-title-right">
									<ol class="breadcrumb m-0">
										<li class="breadcrumb-item"><a href="javascript: void(0);"> Maintenance </a></li>
										<li class="breadcrumb-item active"> User Role Management </li>
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
									<h4 class="card-title mb-0 flex-grow-1"> User Role </h4>
								</div>
								<div class="card-body containter">
									<div class="col-md-12 mb-3">
										<label class="form-label"> Name </label>
										<input id="user-role-name" type="text" class="form-control" placeholder="User Role Name" autocomplete="off">
									</div>

                           <div class="col-md-12 mb-3" id="edit-status">
										<label class="form-label"> Status </label>
                              <select id="user-role-status" class="select-single">
                                 <option value=""> Choose Status </option>
                                 <option value="1"> Active </option>
                                 <option value="0"> Inactive </option>
                              </select>
                           </div>

									<div class="col-md-12">
										<div class="d-grid gap-2" >
											<button id="save-user-role" type="button" class="btn btn-primary" data-id="0">
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
									<h4 class="card-title mb-0 flex-grow-1"> User Role List </h4>
									
								</div>
								<div class="card-body">
									<table id="user-role-table" class="table table-bordered nowrap align-middle mdl-data-table" style="width:100%">
										<thead>
											<tr>
												<th> Name </th>
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
         display_table()
         $('#edit-status').hide();

         $('#save-user-role').click(function(event){
				event.preventDefault();

            var id = $(this).data('id');
				var url = (id == 0 ? `${ baseUrl }/createUserRole` : `${ baseUrl }/updateUserRole/${ id }`)

				showLoader()

            $.ajax({
					url: url, 
					type: 'POST', 
					headers:{
						'Authorization':`Bearer ${ auth.token }`,
					},
					data : {
                  user_role_name : $('#user-role-name').val(),
                  role_status : $('#user-role-status').val()
               },
					success: function (data) { 
                  // console.log(data)
						if(!data.success){
							hideLoader()
							toast(data.message, 'danger');
						}
						else{
							hideLoader()
							let msg = id == 0 ? 'User Role Succesfully added!' : 'User Role Succesfully updated!'
							toast(msg, 'success');
							$('#staticBackdrop').modal('hide')
                     $('#edit-status').hide();
                     $('#user-role-name').val('');
                     $('#save-user-role').data('id', 0);
							display_table()
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
				url: `${baseUrl}/userRole`,
				method: 'GET',
				dataType: 'json',
				headers:{
					'Authorization':`Bearer ${ auth.token }`,
				}
			});

			$("#user-role-table").DataTable().destroy();
			$("#user-role-table").DataTable({
				deferRender: true,
				searching: true,
				scrollY: 400,
		  		scrollX: true,
				scrollCollapse: true,
				paging: false,
				data: tableData,
				columns: [
					{ data: "user_role_name" },
					{ data: "role_status" },
					{ data: null, defaultContent: '',
						fnCreatedCell: function(nTd, sData, oData, iRow, iCol){
                     var status = (oData.role_status == 'Active' ? 1 : 0)

							html = `
								<button class="btn btn-sm btn-soft-warning"
									onclick="edit(${ oData.id }, '${ oData.user_role_name }', ${ status })"> 
									<i class="ri-edit-box-line"></i> Edit 
								</button> 
							`;
							$(nTd).html(html);
						}
					},
				]
			});
		}

      function edit(id, name, status){
         $('#edit-status').show();
         $('#save-user-role').data('id', id);
         $('#user-role-name').val(name);
         $('#user-role-status').val(status).trigger('change');
      }
   </script>