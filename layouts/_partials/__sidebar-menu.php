	<header id="page-topbar">
		<div class="layout-width">
			<div class="navbar-header">
				<div class="d-flex">
					<!-- LOGO -->
					<div class="navbar-brand-box horizontal-logo">
						<!-- <a href="index.html" class="logo logo-dark">
							<span class="logo-sm">
								<img src="../assets/images/logo-sm.png" alt="" height="22">
							</span>
							<span class="logo-lg">
								<img src="../assets/images/logo-dark.png" alt="" height="17">
							</span>
						</a> -->
					</div>

					<button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger" id="topnav-hamburger-icon">
						<span class="hamburger-icon">
							<span></span>
							<span></span>
							<span></span>
						</span>
					</button>
				</div>

				<div class="d-flex align-items-center">
				<div class="dropdown topbar-head-dropdown ms-1 header-item" id="notificationDropdown">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" id="page-header-notifications-dropdown" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
                        <i class="bx bx-bell fs-22"></i>
                        <span class="position-absolute topbar-badge fs-10 translate-middle badge rounded-pill bg-danger " id="notif-counter">0<span class="visually-hidden">unread messages</span></span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"  aria-labelledby="page-header-notifications-dropdown" data-popper-placement="bottom-end" style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate3d(0px, 58.4px, 0px);">

                        <div class="dropdown-head bg-primary bg-pattern rounded-top">
                            <div class="p-3">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h6 class="m-0 fs-16 fw-semibold text-white"> Notifications </h6>
                                    </div>
                                </div>
                            </div>

                            <div class="px-2 pt-2">
                                <ul class="nav nav-tabs dropdown-tabs nav-tabs-custom" data-dropdown-tabs="true" id="notificationItemsTab" role="tablist">
                                    <li class="nav-item waves-effect waves-light" role="presentation">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#all-noti-tab" role="tab" aria-selected="true">
                                            <span id="tabcount"></span>
                                        </a>
                                    </li>
                                    
                                </ul>
                            </div>

                        </div>

                        <div class="tab-content position-relative" id="notificationItemsTabContent">
                            <div class="tab-pane fade show active py-2 ps-2" id="all-noti-tab" role="tabpanel">
                                <div data-simplebar="init" style="max-height: 300px;" class="pe-2"><div class="simplebar-wrapper" style="margin: 0px -8px 0px 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: auto; overflow: hidden scroll;"><div class="simplebar-content" style="padding: 0px 8px 0px 0px;">
                                    <!-- <div class="text-reset notification-item d-block dropdown-item position-relative">
                                        <div class="d-flex">
                                            <div class="avatar-xs me-3">
                                                <span class="avatar-title bg-soft-info text-info rounded-circle fs-16">
                                                    <i class="bx bx-badge-check"></i>
                                                </span>
                                            </div>
                                            <div class="flex-1">
                                                <a href="#!" class="stretched-link">
                                                    <h6 class="mt-0 mb-2 lh-base">Your <b>Elite</b> author Graphic
                                                        Optimization <span class="text-secondary">reward</span> is
                                                        ready!
                                                    </h6>
                                                </a>
                                                <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                    <span><i class="mdi mdi-clock-outline"></i> Just 30 sec ago</span>
                                                </p>
                                            </div>
                                            <div class="px-2 fs-15">
                                                <div class="form-check notification-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="all-notification-check01">
                                                    <label class="form-check-label" for="all-notification-check01"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->

									<div id="notif-list"></div>

                                </div></div></div></div><div class="simplebar-placeholder" style="width: auto; height: 496px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="width: 0px; display: none;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="height: 181px; display: block; transform: translate3d(0px, 0px, 0px);"></div></div></div>

                            </div>
                           

                            <!-- <div class="notification-actions" id="notification-actions">
                                <div class="d-flex text-muted justify-content-center">
                                    Select <div id="select-content" class="text-body fw-semibold px-1">0</div> Result <button type="button" class="btn btn-link link-danger p-0 ms-3" data-bs-toggle="modal" data-bs-target="#removeNotificationModal">Remove</button>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>




					<div class="ms-1 header-item d-none d-sm-flex">
						<button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" data-toggle="fullscreen">
							<i class='bx bx-fullscreen fs-22'></i>
						</button>
					</div>

					<div class="dropdown ms-sm-3 header-item topbar-user">
						<button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<span class="d-flex align-items-center">
								<img class="rounded-circle header-profile-user" src="../assets/images/users/avatar-1.jpg" alt="Header Avatar">
								<span class="text-start ms-xl-2">
									<span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text" id="user">Anna Adame</span>
									<span class="d-none d-xl-block ms-1 fs-12 text-muted user-name-sub-text" id="role">Founder</span>
								</span>
							</span>
						</button>
						<div class="dropdown-menu dropdown-menu-end">
							<!-- item-->
							<h6 class="dropdown-header">Welcome <span id="name-log"></span>!</h6>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="javascript:void(0);"  onclick="change_passowrd_modal()">
								<i class="mdi mdi-lock text-muted fs-16 align-middle me-1"></i> 
								<span class="align-middle">Change Password</span>
							</a>
							<!-- <a class="dropdown-item" href="auth-logout-basic.html"><i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle" data-key="t-logout">Logout</span></a> -->
						</div>
					</div>

					<div class="ms-1 header-item d-none d-sm-flex">
						<button id="auth-logout" type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" onclick="route('/rmu_web/index.php',null)">
							<i class='bx bx-log-out fs-22'></i>
						</button>
					</div>
				</div>
			</div>
		</div>
	</header>

	<div class="modal fade" id="change-password" aria-labelledby="myExtraLargeModalLabel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="myExtraLargeModalLabel"> Change Password </h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>

				<div class="modal-body">
					<div class="col-md-12 mb-3">
						<label class="form-label"> Old password </label>
						<input type="password" id="old-password" class="form-control" placeholder="Enter Old Password">
					</div>

					<div class="col-md-12 mb-3">
						<label class="form-label"> New password </label>
						<input type="password" id="new-password" class="form-control" placeholder="Enter New Password">
					</div>

					<div class="col-md-12 mb-2">
						<label class="form-label"> Confirm password </label>
						<input type="password" id="confirm-password" class="form-control" placeholder="Enter Confirm Password">
					</div>
					<span id='password-message'></span>
				</div>

				<div class="modal-footer">
					<a href="javascript:void(0);" class="btn btn-link link-success fw-medium" data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i> Close</a>
					<button type="button" id="save-button" class="btn btn-primary" data-id=""> Save </button>
				</div>
			</div>
		</div>
	</div>

	<!-- removeNotificationModal -->
	<div id="removeNotificationModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true"></div>
   
	<!-- ========== App Menu ========== -->
	<div class="app-menu navbar-menu">
		<!-- LOGO -->
		<div class="navbar-brand-box">
			<!-- Dark Logo-->
			<a href="index.html" class="logo logo-dark">
				<span class="logo-sm">
					<img src="../assets/images/ciclo.jpg" alt="" height="30">
				</span>
				<span class="logo-lg">
					<img src="../assets/images/ciclo.jpg" alt="" height="70">
				</span>
			</a>
			<!-- Light Logo-->
			<a href="index.html" class="logo logo-light">
				<span class="logo-sm">
					<img src="../assets/images/logo-sm.png" alt="" height="22">
				</span>
				<span class="logo-lg">
					<img src="../assets/images/logo-light.png" alt="" height="17">
				</span>
			</a>
			<button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"  id="vertical-hover">
				<i class="ri-record-circle-line"></i>
			</button>
		</div>

		<div id="scrollbar">
			<div class="container-fluid">
				<div id="two-column-menu"></div>
				<ul class="navbar-nav" id="navbar-nav">
					<!--  -->
					<div id="sidebar-container"></div>
				</ul>
			</div>
			<!-- Sidebar -->
		</div>
		<input type="hidden" id="moduleid" />
		<div class="sidebar-background"></div>
	</div>
	<!-- Left Sidebar End -->
	<!-- Vertical Overlay-->
	<div class="vertical-overlay"></div>

	<div class="loading-overlay" id="loading-overlay">
		<div class="overlay"></div>
		<div class="spanner">
		<div class="loader"></div>
		<p>Please wait. . . .</p>
		</div>
	</div> 

	<script>
		
		let user = JSON.parse(localStorage.getItem('data'))
		document.getElementById('name-log').innerHTML = user.name
		document.getElementById('user').innerHTML = user.name
		document.getElementById('role').innerHTML = user.role
		
		function route(link,name){
			localStorage.setItem('navbar',name)
			if(link == '/rmu_web/index.php'){
				localStorage.removeItem('data')
				link =  location.protocol == "https:" ? '/index.php' : link
			}
			window.location.replace(link)
		}

		$(document).ready(function(){

			$('.empty-notification-elem').hide()

			 //this is notif bell 
			getUserNotification()
			getModuleByUser()

			$("#new-password, #confirm-password").on("keyup", function() {
				updatePasswordMessage();
			});

			$('#save-button').click(function(){

				if($('#old-password').val() == '' || $('#new-password').val() == '' || $('#confirm-password').val() == ''){
					toast('Please complete input the fields', 'danger');
					return false;
				}
				showLoader() 

				$.ajax({
					url: `${ baseUrl }/changePassword`, 
					type: 'POST', 
					dataType: 'json',
					headers:{
						'Authorization':`Bearer ${auth.token}`,
					},
					data: { 
						old_password : $('#old-password').val(),
						new_password : $('#new-password').val()
					}, 
					success: function (data) { 
						console.log(data)
						if(!data.success){
							toast(data.data, 'danger');
						}
						else{
							toast(data.data, 'success');
							$('#change-password').modal('hide')
						}
						hideLoader()
					},
					error: function(response) {
						hideLoader()
						toast(response.responseJSON.data, 'danger');
					}
				});
			});
		})

		function change_passowrd_modal(){
			$('#old-password').val('')
			$('#new-password').val('')
			$('#confirm-password').val('')
			$('#save-button').prop('disabled', true)
			$('#change-password').modal('show')
		}

		function passwordsMatch() {
			var newPassword = $("#new-password").val();
			var confirmPassword = $("#confirm-password").val();
			return newPassword === confirmPassword;
		}

		function updatePasswordMessage() {
			var newPassword = $("#new-password").val();
			var confirmPassword = $("#confirm-password").val();
			var message = $("#password-message");

			if(newPassword == '' || confirmPassword == ''){
				message.text("").removeClass("text-danger").removeClass("text-success");
				$('#save-button').prop('disabled', true)
			}
			else if (newPassword === confirmPassword) {
				message.text("Passwords match").removeClass("text-danger").addClass("text-success");
				$('#save-button').prop('disabled', false)
			} 
			else {
				message.text("Passwords do not match").removeClass("text-success").addClass("text-danger");
				$('#save-button').prop('disabled', true)
			}
		}

		async function getUserNotification(){
			const result = await $.ajax({
				url: `${baseUrl}/getAllNotification`, 
				type: 'GET', 
				headers:{
					'Authorization':`Bearer ${ auth.token }`,
					}
				});
			
			if(result.length > 0){
				$('#notif-counter').html(result.length)
				$('#notif-counter').show()
				$('#tabcount').html('All '+result.length)

				let html = ''
				for(let i = 0; i < result.length; i++){
					let data = result[i]
					html += `
								<div class="text-reset notification-item d-block dropdown-item position-relative">
                                        <div class="d-flex">
                                            <div class="avatar-xs me-3">
                                                <span class="avatar-title bg-soft-info text-info rounded-circle fs-16">
                                                    <i class="bx bx-badge-check"></i>
                                                </span>
                                            </div>
                                            <div class="flex-1" onclick="route('${data.link}','${data.module}')">
                                                <a href="javascript: void(0);" class="stretched-link">
                                                    <h6 class="mt-0 mb-2 lh-base">You have a ${data.status == 2 ? 'disapproved' : 'pending'}  approval request from <b>${data.requestor}
													</b> for module <b>${data.module}</b>.
                                                    </h6>
                                                </a>
                                            </div>
                                           
                                        </div>
                                    </div>
					`
				}

				$('#notif-list').html(html)
				
			}else{
				$('#tabcount').html(0)
				$('#notif-counter').hide()
			}
		}

		async function getModuleByUser(){
			
			// const result = await $.ajax({
			// 	url: `${baseUrl}/getMyModules`, 
			// 	type: 'GET', 
			// 	headers:{
			// 		'Authorization':`Bearer ${ auth.token }`,
			// 		}
			// 	});

				$.ajax({
				url: `${baseUrl}/getMyModules`, 
				type: 'GET', 
				headers:{
					'Authorization':`Bearer ${ auth.token }`,
				},
				success: function (data) { 
					 treeJson(data)
				},
				error: function(response) {
					if(typeof response.responseJSON == 'undefined'){
						alert('Your token session is expired.! Please relogin')
						let link =  location.protocol == "https:" ? '/index.php' : '/rmu_web/index.php'
						localStorage.removeItem('data')
						window.location.replace(link)
					}
				
				}
			});

		}

		function treeJson(val) {
			let arrMap = new Map(val.map(item => [item.id, item]));
			let tree = [];
			let arr_men = []
			let sidebar = ''
			for (let i = 0; i < val.length; i++) {
				
				let item = val[i];
				
				if (item.parent_id != '0') {
					let parentItem = arrMap.get(item.parent_id);

					if (parentItem) {
						let { children } = parentItem;

						if (children) {
							parentItem.children.push(item);
						} else {
							parentItem.children = [item];
						}
					}
				} else {
					tree.push(item);
				}
			}
			// console.log(tree)
			
				
				tree.map((details)=>{
					
					if(typeof details.children != 'undefined'){
						sidebar +=`<li class="nav-item">
									<a class="nav-link menu-link" href="#${details.menu_name}" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="${details.menu_name}">
										<i class=" ri-settings-3-line"></i> <span data-key="t-maintenance"> ${details.menu_name} </span>
									</a>

									<div class="collapse menu-dropdown" id="${details.menu_name}">
										<ul class="nav nav-sm flex-column ${details.menu_name}">
											
										</ul>
									</div>
									</li>`
						//call function to loop

						appendChild(details.children,details.menu_name)
					}else{
						var notification_id = details.menu_name.replaceAll(' ', '_').toLowerCase();
						// console.log(notification_id)
						// <span id="for_stock_transfer_received" class="badge badge-pill bg-danger" data-key="t-hot"><span class="notif_stock_transfer_received"></span></span>

						sidebar +=`<li class="nav-item" onclick="route('${details.file_path}','${details.menu_name}')">
									<a class="nav-link menu-link" href="javascript: void(0);">
										<i class=" ri-pages-line"></i> <span data-key="t-receive-of-units"> ${details.menu_name} </span>
									</a>
								</li>`
					}
				
				})

				$('#sidebar-container').html(sidebar)
			
				//return arr_men.sort(function(a, b){ return a.sortOdrer - b.sortOdrer ;})
			}

			function appendChild(menus,menu_name){
			
				menus.map((details)=>{
					
					if(typeof details.children != 'undefined'){
						setTimeout(() => {
							
							let class_id = details.menu_name.includes(' ') ? details.menu_name.replace(' ','-') : details.menu_name
							
							$('.'+menu_name).append(`<li class="nav-item">
										<a class="nav-link menu-link" href="#${class_id}" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="${class_id}">
											<span data-key="t-maintenance"> ${details.menu_name}</span>
										</a>

										<div class="collapse menu-dropdown" id="${class_id}">
											<ul class="nav nav-sm flex-column ${class_id}">
												
											</ul>
										</div>
									</li>`)
							//call function to loop

							
						}, 300);
						appendChild(details.children,details.menu_name)
					}else{
						
						setTimeout(() => {
							
							let class_id = menu_name.includes(' ') ? menu_name.replace(' ','-') : menu_name

							$('.'+class_id).append(`<li class="nav-item" onclick="route('${details.file_path}','${details.menu_name}')">
						 			<a href="javascript: void(0);" class="nav-link" data-key="t-analytics"> ${details.menu_name} </a>
						 		</li>`)
						}, 300);
								 
						
					}


				})

				
				//$('#'+menu_name).html($('.'+menu_name).html())
			}
	</script>