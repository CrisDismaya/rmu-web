
<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>
	<title> User Access Management | RMU </title>
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
						<div class="col-lg-9">
							<div class="card">
								<div class="card-header align-items-center d-flex">
									<h4 class="card-title mb-0 flex-grow-1">User Access Management</h4>
								</div>
								<div class="card-body">

                           <div class="row g-3 mb-3">
                              <div class="col-md-4 mb-4">
                                 <div class="col-md-12">
                                    <label class="form-label"> User </label>
                                    <select id="users" class="select-single"></select>
                                 </div>
                              </div>

                              <div class="col-md-3 mb-3">
                                 <div class="col-md-12">
                                    <label class="form-label"> Role </label>
                                    <input type="text" class="form-control" id="role-name" value='-' data-role-id='0' disabled/>
                                 </div>
                              </div>

                              <div class="col-md-3 mb-3">
                                 <div class="col-md-12">
                                    <label class="form-label" style="visibility: hidden; width: 100%;"> Button </label>
                                    <button id="btn-access-save" type="button" class="btn btn-primary waves-effect waves-light d-none"> Save Changes </button>
                                 </div>
                              </div>
									</div>

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
      const $userSelect = $("#users");
      const $roleInput = $("#role-name");
      const $menuBody = $("#menus tbody");
      const $saveBtn = $("#btn-access-save");

      $(document).ready(() => {
         
         loadUsers();

         $saveBtn.on("click", async function () {
            const selected = $userSelect.find(":selected");
            const userId = selected.val();
            const roleId = Number(selected.data("roleid")) || 0;
            const roleName = selected.data("role") || "";

            if (!userId || !roleId) {
               toast("Please select a user before saving access changes.", "danger");
               return;
            }

            const menus = [];
            $("#menus tbody tr.child-row").each(function () {
               const menuId = $(this).data("menu-id");
               const addPermission = $(this).find(".add-check").is(":checked") ? 1 : 0;
               const updatePermission = $(this).find(".update-check").is(":checked") ? 1 : 0;

               menus.push({
                  menu_id: menuId,
                  add_permission: addPermission,
                  update_permission: updatePermission,
               });
            });

            if (!menus.length) {
               toast("No menu permissions found to save.", "info");
               return;
            }

            const payload = {
               user_id: parseInt(userId),
               role_id: roleId,
               menus: menus,
            };

            try {
               $saveBtn.prop("disabled", true).text("Saving...");

               const response = await $.ajax({
                  url: `${baseUrl}/saveUserAccess`,
                  method: "POST",
                  data: JSON.stringify(payload),
                  contentType: "application/json",
                  headers: { Authorization: `Bearer ${auth.token}` },
               });

               // success message
               toast(response.message || "User access has been updated successfully.", "success");

            } catch (error) {
               console.error("Save access error:", error);
               const messages = error.responseJSON?.message 
                  ? [error.responseJSON.message] 
                  : ["Failed to save user access. Please try again."];
               toast(messages[0], "danger");
            } finally {
               $saveBtn.prop("disabled", false).text("Save Changes");
            }
         });
      });

      // Fetch and populate users
      async function loadUsers() {
         try {
            $userSelect.html('<option value="">Loading users...</option>');

            const response = await $.ajax({
               url: `${baseUrl}/users`,
               method: "GET",
               dataType: "json",
               headers: { Authorization: `Bearer ${auth.token}` },
            });

            if (!Array.isArray(response) || response.length === 0) {
               $userSelect.html('<option value="">No users found</option>');
               showMenuMessage("No users found.");
               return;
            }

            const activeUsers = response
               .filter(u => String(u.status) === "1")
               .sort((a, b) => fullName(a).localeCompare(fullName(b)));

            const options = [
               '<option value="">-- Select a user --</option>',
               ...activeUsers.map(u => `
                  <option 
                     value="${u.id}" 
                     data-role="${u.userrole || ''}" 
                     data-roleid="${u.role_id || ''}">
                     ${fullName(u)}
                  </option>
               `)
            ];

            $userSelect.html(options.join(""));

            if ($.fn.select2) {
               $userSelect.select2({
                  placeholder: "Select a user",
                  width: "100%",
               });
            }

            $userSelect.off("select2:select").on("select2:select", handleUserSelect);
            showMenuMessage("Please select a user to generate the menu list.");

         } catch (error) {
            console.error("Error loading users:", error);
            $userSelect.html('<option value="">Failed to load users</option>');
            showMenuMessage("Failed to load users. Please try again later.");
         }
      }

      // Handle user selection
      function handleUserSelect() {
         const selected = $(this).find(":selected");
         const userId = selected.val();
         const roleName = selected.data("role") || "";
         const roleId = Number(selected.data("roleid")) || 0;

         $roleInput.val(roleName).data("role-id", roleId);

         if (!roleId) {
            showMenuMessage("Please select a user to generate the menu list.");
            $saveBtn.addClass("d-none");
            return;
         }

         $saveBtn.removeClass("d-none");

         loadMenus(userId, roleId);
      }

      // Fetch menus per role/user
      async function loadMenus(userId, roleId) {
         if (!userId) {
            showMenuMessage("Please select a user to generate menu list");
            return;
         }

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

            const rows = response.map((item, index) => renderMenuRow(item, index, roleId)).join("");
            $menuBody.html(rows);
            setupCheckboxLogic(roleId);

         } catch (error) {
            console.error("Error loading menus:", error);
            showMenuMessage("Failed to load menu list.");
         }
      }

      // Render menu table row
      function renderMenuRow(item, index, roleId) {
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
               <tr class="table-light no-hover parent-row">
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
            <tr class="child-row" data-menu-id="${id}">
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
      function setupCheckboxLogic(roleId) {
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
      function fullName(u) {
         return `${u.firstname || ""} ${u.middlename || ""} ${u.lastname || ""}`.trim();
      }

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
