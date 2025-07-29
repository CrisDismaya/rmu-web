<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">
<head>
	<title>Physical Inventory | RMU</title>
	<?php include_once './_partials/__header-template.php'; ?>
</head>
<style>
	td.details-control {
		cursor: pointer;
	}
	tr.shown td.details-control::before {
		content: "▼ ";
	}
	td.details-control::before {
		content: "▶ ";
		color: #000000ff;
		font-weight: bold;
	}
</style>
<body>
	<div id="layout-wrapper">
		<?php include_once './_partials/__sidebar-menu.php'; ?>

		<div class="main-content">
			<div class="page-content">
				<div class="container-fluid">

					<!-- Page title -->
					<div class="row mb-3">
						<div class="col-12">
							<div class="page-title-box d-sm-flex align-items-center justify-content-between">
								<h4 class="mb-sm-0">Physical Inventory</h4>
							</div>
						</div>
					</div>

					<!-- Inventory Table -->
					<div class="row">
						<div class="col-xxl-12">
							<div class="card card-height-100">
								<div class="card-header d-flex justify-content-between align-items-center">
									<h4 class="card-title mb-0">Physical Inventory</h4>
									<button id="add-new-documents" type="button" class="btn btn-soft-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
										Add New Documents
									</button>
								</div>
								<div class="card-body">
									<div class="table-responsive"></div>
										<table id="fileTable" class="table table-bordered table-nowrap align-middle mb-0 w-100">
										</table>
									</div>
								</div>
							</div>
						</div>
					</div><!-- End table row -->

				</div>
			</div>
		</div>
	</div>

	<!-- Modal for Upload -->
	<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Add New Documents</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
				</div>
				<div class="modal-body">
					<div class="row g-3">
						<div class="col-md-auto">
							<label class="form-label">Select Month</label>
							<div class="input-group">
								<input id="monthPicker" type="text" class="form-control border-0 shadow" />
								<div id="mdl-calendar-btn" class="input-group-text bg-primary text-white" onclick="document.getElementById('monthPicker').focus();">
									<i class="ri-calendar-2-line"></i>
								</div>
							</div>
						</div>
						<div class="col-md-12" id="mdl-upload">
							<label class="form-label">Upload Files</label>
							<input class="form-control" type="file" id="formFileMultiple" multiple accept=".pdf,.xls,.xlsx" />
							<small class="text-muted">Max <span id="maxFiles">0</span> files. Each less than <span id="maxFileSize">0</span>MB.</small>
						</div>
						<div class="col-md-12">
							<table class="table table-borderless table-nowrap align-middle mb-0" id="fileListTable">
								<thead>
									<tr>
										<th scope="col">No</th>
										<th scope="col">Name</th>
										<th scope="col">Document Type</th>
										<th scope="col"></th>
									</tr>
								</thead>
								<tbody>
									<!-- JavaScript will append rows here -->
								</tbody>
							</table>
						</div>
						<div class="col-md-12" id="mdl-reason">
							<label class="form-label">Reason <small class="fst-italic fw-lighter">(Note: mandatory if the desision is <span class="text-danger fw-bold">Disapproved</span>)</small></label>
							<textarea id="decision-reason" class="form-control" placeholder="Reason"></textarea>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<a href="javascript:void(0);" class="btn btn-link link-success" data-bs-dismiss="modal">
						<i class="ri-close-line me-1 align-middle"></i> Close
					</a>
					<button id="save-details" type="button" class="btn btn-primary btn-load" data-id="0">
						Save
					</button>

					<div id="approval-button">
						<button type="button" class="btn btn-success btn-decision btn-load" data-id="0" data-decision="1">
							<i class="ri-check-line"></i> Approve
						</button>
						<button type="button" class="btn btn-danger btn-decision btn-load" data-id="0" data-decision="2">
							<i class="ri-close-line"></i> Disapprove
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Loader -->
	<div class="loading-overlay" id="loading-overlay" style="display: none;">
		<div class="overlay"></div>
		<div class="spanner">
			<div class="loader"></div>
			<p>Please wait...</p>
		</div>
	</div>

	<?php include_once './_partials/__footer-template.php'; ?>

	<script type="module">
		document.addEventListener('DOMContentLoaded', () => {
			let selectedFiles = [];
			const MAX_FILES = 3;
			const MAX_FILE_SIZE_MB = 10;
			const VALID_EXTENSIONS = ['pdf', 'xls', 'xlsx'];
			const REQUIRED_DOCUMENT_TYPES = [
				{ id: 1, name: 'inventory_cert', label: 'Certificate of Inventory', type: ['pdf'] },
				{ id: 2, name: 'actual_pics', label: 'Actual Picture & Stencil', type: ['pdf'] },
				{ id: 3, name: 'inventory_list', label: 'List of Inventory', type: ['xls', 'xlsx'] }
			];

			const modalTriggerBtn = document.querySelector('#add-new-documents');
			const monthPicker = document.querySelector('#monthPicker');
			const fileInput = document.querySelector('#formFileMultiple');
			const maxFile = document.querySelector('#maxFiles');
			const maxFileSize = document.querySelector('#maxFileSize');
			const fileListStyled = document.querySelector('#fileListTable tbody');
			const saveBtn = document.querySelector('#save-details');
			const tableBtn = document.querySelector('#fileTable');

			const mdlCalendarBtn = document.querySelector('#mdl-calendar-btn');
			const mdlUpload = document.querySelector('#mdl-upload');
			const mdlReason = document.querySelector('#mdl-reason');
			const ReasonInput = document.querySelector('#decision-reason');
			const approvalBtnContainer = document.querySelector('#approval-button');

			maxFile.textContent = MAX_FILES;
			maxFileSize.textContent = MAX_FILE_SIZE_MB;

			const flatpickrInstance = flatpickr(monthPicker, {
				plugins: [
					new monthSelectPlugin({
						shorthand: false,
						dateFormat: "F Y",
						altFormat: "F Y"
					})
				],
				defaultDate: "today",
				maxDate: "today"
			});

			const resetMonthPickerToCurrent = () => {
				const today = new Date();
				flatpickrInstance.setDate(today, true);
				flatpickrInstance.input.value = flatpickrInstance.formatDate(today, "F Y");
			};

			const handleFileChange = ({ target }) => {
				const newFiles = Array.from(target.files ?? []);
				let addedCount = 0;

				for (const file of newFiles) {
					const ext = file.name.split('.').pop().toLowerCase();
					const isValid = VALID_EXTENSIONS.includes(ext);
					const isDuplicate = selectedFiles.some(f => f.name === file.name && f.size === file.size);
					const isTooLarge = file.size > MAX_FILE_SIZE_MB * 1024 * 1024;

					if (!isValid) {
						toast(`"${file.name}" is not a supported file type.`, 'warning');
						continue;
					}
					if (selectedFiles.length >= MAX_FILES) {
						toast(`You can only upload up to ${MAX_FILES} files.`, 'warning');
						break;
					}
					if (isTooLarge) {
						toast(`"${file.name}" exceeds the 5MB size limit.`, 'warning');
						continue;
					}
					if (!isDuplicate) {
						selectedFiles.push(file);
						addedCount++;
					}
				}

				if (addedCount === 0 && selectedFiles.length < MAX_FILES) {
					toast('No new valid files were added.', 'info');
				}

				target.value = '';
				renderFileList();
			};

			const renderFileList = () => {
				fileListStyled.innerHTML = '';

				if (selectedFiles.length === 0) {
					const emptyRow = document.createElement('tr');
					emptyRow.innerHTML = `
						<td colspan="5" class="text-center text-muted">
							No files uploaded yet.
						</td>
					`;
					fileListStyled.appendChild(emptyRow);
					return;
				}

				selectedFiles.forEach((file, index) => {
					const ext = file.name.split('.').pop().toLowerCase();
					const iconClass = getFileIconClass(ext);
					const fileSize = (file.size / 1024 / 1024).toFixed(2);

					const row = document.createElement('tr');
					row.innerHTML = `
						<td>${index + 1}</td>
						<td>
							<div class="d-flex align-items-center gap-2">
								<i class="${iconClass} fs-5"></i>
								<span class="text-truncate" style="max-width: 250px;" title="${file.name}">${file.name}</span>
							</div>
						</td>
						<td>
							<select class="form-select form-select-sm" id="doc_type_${index}" name="doc_type_${index}">
								<option value="">Select Document Type</option>
								${
									REQUIRED_DOCUMENT_TYPES.map(type => `
										<option value="${type.id}">${type.label}</option>
									`).join('')
								}
							</select>
						</td>
						<td>
							<button id="btn_remove_${index}" class="btn btn-sm btn-danger remove-file" type="button" data-id="${file.id ?? 0}" data-index="${index}">
								<i class="ri-delete-bin-6-line"></i>
							</button>
						</td>
					`;
					fileListStyled.appendChild(row);

					if (file.docTypeId) {
						const select = row.querySelector(`select[name="doc_type_${index}"]`);
						if (select) {
							select.value = file.docTypeId;
							select.disabled = true;
						}
					}
				});

				// Add event listeners for delete buttons
				fileListStyled.querySelectorAll('button.remove-file').forEach(btn => {
					btn.addEventListener('click', () => {
						const id = parseInt(btn.dataset.id);
						const index = parseInt(btn.dataset.index);
						// for delete purposes
						// console.log('remove render id: ', id)
						selectedFiles.splice(index, 1);
						renderFileList();
					});
				});
			};

			const getFileIconClass = (ext) => ({
				pdf: 'la la-file-pdf text-danger',
				doc: 'la la-file-word text-primary',
				docx: 'la la-file-word text-primary',
				xls: 'la la-file-excel text-success',
				xlsx: 'la la-file-excel text-success',
				ppt: 'la la-file-powerpoint text-warning',
				pptx: 'la la-file-powerpoint text-warning',
				jpg: 'la la-file-image text-info',
				jpeg: 'la la-file-image text-info',
				png: 'la la-file-image text-info',
				gif: 'la la-file-image text-info',
				zip: 'la la-file-archive text-secondary',
				txt: 'la la-file-alt text-muted'
			}[ext] ?? 'la la-file text-secondary');

			const clearFileList = () => {
				approvalBtnContainer.hidden = true;
				monthPicker.disabled = false;
				mdlCalendarBtn.hidden = false;
				mdlUpload.hidden = false;
				saveBtn.hidden = false;
				mdlReason.hidden = true;

				selectedFiles = [];
				renderFileList();
				resetMonthPickerToCurrent();
			};

			const table = new DataTable('#fileTable', {
				processing: true,
				serverSide: true,
				// data,
				ajax: {
					url: `${baseUrl}/getPhysicalInventoryDocs`,
					type: 'GET',
					headers: {
						'Authorization': `Bearer ${auth.token}`,
						'Content-Type': 'application/json',
					},
					data : {
						module_id: current_module_id
					},
					error: function (xhr, error, thrown) {
						console.error('DataTables AJAX error:', error, thrown);
					}
				},
				fixedColumns: {
					left: 1,
					right: 1
				},
				scrollX: true,
				scrollCollapse: true,
				columns: [
					{ title: '', className: 'details-control text-center', orderable: false, data: null, defaultContent: '' },
					{ title: 'Branch', data: 'branch_name' },
					{ title: 'Month', data: 'month_year_name' },
					{ title: 'Uploads', data: 'total_count_uploaded', render: (data, type, row) => `${data} Files` },
					{ title: 'Status', data: 'request_status' },
					{ title: 'Approver', data: 'approver' },
					{ title: 'Requestor', data: 'requestor' },
					{ title: 'Date Created', data: 'created_at' },
					{ title: 'Action', data: null, orderable: false,
						render: (data, type, row) => {
							const isWarehouseCustodian = auth.role === 'Warehouse Custodian';

							const downloadBtn = `
								<button type="button" class="btn btn-soft-primary btn-sm custom-toggle btn-download-file" data-bs-toggle="button" data-id="${row.id}">
									<span class="icon-on">Download</span>
									<span class="icon-off">Downloading...</span>
								</button>
							`;

							const approverModalBtn = !isWarehouseCustodian ? `
								<button type="button" class="btn btn-soft-info btn-sm btn-approver-decision" data-id="${row.id}" data-date="${row.month_year_name}">
									<span class="icon-on">Approver</span>
								</button>
							` : '';

							return downloadBtn + approverModalBtn;
						}
					}
				],
				order: [[1, 'asc']],
			});

			const formatChildRow = (fileDetails) => {
				if (!fileDetails?.length) return '<div class="text-muted">No file details available.</div>';

				const rows = fileDetails.map((file, index) => {
					const name = file.path.split('/').pop().split('-').pop().replace(/\.[^/.]+$/, '');
					const extension = file.path.split('.').pop().toLowerCase();
					const status = file.is_deleted == 0 ? 'Active' : 'Deleted';
					const path = baseUrl.replace('api', '') + file.path;

					return `
						<tr>
							<td>${index + 1}</td>
							<td>${name}</td>
							<td>${extension}</td>
							<td>${file.files_name}</td>
						</tr>
					`;
				}).join('');

				return `
					<table class="table table-bordered mb-0">
						<thead>
							<tr>
								<th>No</th>
								<th>Filename</th>
								<th>File Type</th>
								<th>Document Type</th>
							</tr>
						</thead>
						<tbody>${rows}</tbody>
					</table>
				`;
			};

			const tbody = document.querySelector('#fileTable tbody');
			if (tbody) {
				tbody.addEventListener('click', async (e) => {
					const cell = e.target.closest('td.details-control');
					if (!cell) return;

					const rowEl = cell.closest('tr');
					const row = table.row(rowEl);

					if (row.child.isShown()) {
						row.child.hide();
						rowEl.classList.remove('shown');
					} else {
						const { id } = row.data();

						row.child('<div class="p-2 text-muted">Loading files...</div>').show();
						rowEl.classList.add('shown');

						try {
							const res = await fetch(`${baseUrl}/getPhysicalInventoryFiles?id=${id}&module_id=${current_module_id}`, {
								method: 'GET',
								headers: {
									'Authorization': `Bearer ${auth.token}`,
									'Content-Type': 'application/json'
								}
							});

							const json = await res.json();
							const fileDetails = json.data ?? [];

							row.child(formatChildRow(fileDetails)).show();
						} catch (err) {
							row.child('<div class="p-2 text-danger">Failed to load files.</div>').show();
							console.error('Fetch error:', err);
						}
					}
				});
			} else {
				console.warn('Table body not found. Is the table in the DOM?');
			}

			const saveUploadedFiles = () => {
				const month = monthPicker?.value;
				const id = saveBtn.dataset.id;

				if (!month) {
					toast('Please select a month before saving.', 'warning');
					return;
				}

				if (selectedFiles.length === 0) {
					toast('Please upload at least one file.', 'warning');
					return;
				}

				saveBtn.disabled = true;
				saveBtn.innerHTML = `<span class="d-flex align-items-center">
							<span class="spinner-border flex-shrink-0" role="status"></span>
						</span>`;

				const selectedDocTypes = new Set();
				const [monthName, year] = month.split(' ');
				const date = new Date(`${monthName} 1, ${year}`);

				if (isNaN(date)) {
					toast('Invalid month format.', 'error');
					saveBtn.disabled = false;
					saveBtn.innerHTML = 'Save';
					return;
				}

				const formattedDate = `${year}-${String(date.getMonth() + 1).padStart(2, '0')}-01`;
				
				const formData = new FormData();
				formData.append('module_id', current_module_id);
				formData.append('month', formattedDate);

				let missingDocType = false;

				selectedFiles.forEach((file, index) => {
					const select = document.querySelector(`select[name="doc_type_${index}"]`);
					const docTypeId = select?.value;

					if (!docTypeId) {
						missingDocType = true;
						return;
					}

					selectedDocTypes.add(Number(docTypeId));

					formData.append(`files[${index}]`, file);
					formData.append(`doc_types[${index}]`, docTypeId);
				});

				if (missingDocType) {
					toast('Please assign a document type to every file.', 'warning');
					saveBtn.disabled = false;
					saveBtn.innerHTML = 'Save';
					return;
				}

				const allSelected = REQUIRED_DOCUMENT_TYPES.every(type => selectedDocTypes.has(type.id));
				if (!allSelected) {
					toast('All 3 document types must be selected (no duplicates or missing types).', 'warning');
					saveBtn.disabled = false;
					saveBtn.innerHTML = 'Save';
					return;
				}

				// Debugging: Log the form data
				// formData.forEach((value, key) => {
				// 	console.log(`${key}:`, value);
				// });

				let url = (id === '0' ? `${baseUrl}/createPhysicalInventoryDoc` : `${baseUrl}/updateModel/${id}`)

				$.ajax({
					url: url,
					type: 'POST',
					data: formData,
					processData: false,
					contentType: false,
					headers:{
						'Authorization':`Bearer ${ auth.token }`,
					},
					success: function(response) {
						toast('Details saved successfully.', 'success');
						clearFileList();
						saveBtn.disabled = false;
						saveBtn.innerHTML = 'Save';
						table.ajax.reload();
					},
					error: function(xhr, status, error) {
						console.error(xhr.responseText);
						saveBtn.disabled = false;
						saveBtn.innerHTML = 'Save';
						toast('An error occurred while saving files.', 'error');
					}
				});
			};
			
			const tableActionBtn = async (e) => {
				const downloadBtn = e.target.closest('.btn-download-file');
				const approverBtn = e.target.closest('.btn-approver-decision');

				// Handle Download
				if (downloadBtn) {
					const id = downloadBtn.getAttribute('data-id');
					const success = await downloadFile(id);

					if (success) {
						downloadBtn.classList.remove('active');
					}
				}

				if (approverBtn) {
					const id = approverBtn.getAttribute('data-id');
					const selected = approverBtn.getAttribute('data-date');
					monthPicker.value = selected;

					const success = await fetchDetails(id);

					if (success) {
						const approveBtn = approvalBtnContainer.querySelector('.btn-decision.btn-success');
						const disapproveBtn = approvalBtnContainer.querySelector('.btn-decision.btn-danger');
						if (approveBtn) approveBtn.setAttribute('data-id', id);
						if (disapproveBtn) disapproveBtn.setAttribute('data-id', id);
						
						const modalEl = document.getElementById('staticBackdrop');
						if (modalEl) {
							const modal = new bootstrap.Modal(modalEl);
							modal.show();
						} else {
							console.warn('Modal with id #staticBackdrop not found.');
						}
					}
					
				}
			};

			const downloadFile = async (id, isFolder = true) => {
				try {
					const res = await fetch(`${baseUrl}/downloadPhysicalInventory`, {
						method: 'POST',
						headers: {
							'Authorization': `Bearer ${auth.token}`,
							'Content-Type': 'application/json'
						},
						body: JSON.stringify({ id, isFolder: isFolder })
					});

					if (!res.ok) throw new Error('Failed to download folder');

					// Convert response to Blob
					const blob = await res.blob();

					// Create a temporary link to trigger download
					const downloadUrl = window.URL.createObjectURL(blob);
					const link = document.createElement('a');
					link.href = downloadUrl;

					// Optional: custom filename from header or fallback
					const contentDisposition = res.headers.get('Content-Disposition');
					let fileName = 'inventory.zip';
					if (contentDisposition && contentDisposition.indexOf('filename=') !== -1) {
						fileName = contentDisposition
							.split('filename=')[1]
							.replace(/["']/g, '')
							.trim();
					}
					link.download = fileName;

					document.body.appendChild(link);
					link.click();
					link.remove();
					window.URL.revokeObjectURL(downloadUrl);

					return true;
				} catch (error) {
					console.error('Download error:', error);
					toast('Failed to download folder.', 'danger');
					return false;
				}
			};

			const fetchDetails = async (id) => {
				saveBtn.hidden = true;
				monthPicker.disabled = true;
				mdlCalendarBtn.hidden = true;
				mdlUpload.hidden = true;
				mdlReason.hidden = false;
				approvalBtnContainer.hidden = false;

				const res = await fetch(`${baseUrl}/getPhysicalInventoryFiles?id=${id}&module_id=${current_module_id}`, {
					method: 'GET',
					headers: {
						'Authorization': `Bearer ${auth.token}`,
						'Content-Type': 'application/json'
					}
				});
				
				const json = await res.json();
				const fileDetails = json.data ?? [];

				selectedFiles = fileDetails.map(file => ({
					id: file.id,
					name: file.path.split('/').pop().split('-').pop(),
					docTypeId: parseInt(file.files_id),
				}));
				renderFileList();

				return true;
			};

			const approverDecision = async (id, decision, reason) => {
				try {
					const res = await fetch(`${baseUrl}/submitApproverDecision`, {
							method: 'POST',
							headers: {
								'Authorization': `Bearer ${auth.token}`,
								'Content-Type': 'application/json'
							},
							body: JSON.stringify({ id, decision, reason, current_module_id })
					});

					if (!res.ok) {
							const errorMsg = (await res.json())?.message || 'Failed to submit decision.';
							toast(errorMsg, 'danger');
							return false;
					}

					toast('Decision submitted successfully.', 'success');

					// Close modal if needed
					const modalEl = document.getElementById('staticBackdrop');
					if (modalEl) {
							const modal = bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl);
							modal.hide();
					}

					// Refresh table
					if (typeof table !== 'undefined' && table.ajax) {
							table.ajax.reload();
					}

					return true;
				} catch (error) {
					console.error('Decision error:', error);
					toast('Failed to submit decision.', 'danger');
					return false;
				} finally {
					ReasonInput.value = '';
				}
			};

			// Bind modern event listeners
			fileInput?.addEventListener('change', handleFileChange);
			saveBtn?.addEventListener('click', saveUploadedFiles);
			modalTriggerBtn?.addEventListener('click', clearFileList);
			tableBtn?.addEventListener('click', tableActionBtn)
			approvalBtnContainer?.addEventListener('click', async (e) => {
				const button = e.target.closest('.btn-decision');
				if (!button) return;

				const id = button.getAttribute('data-id');
				const decision = button.getAttribute('data-decision');
				const reason = ReasonInput.value.trim();

				const buttons = approvalBtnContainer.querySelectorAll('.btn-decision');
				const originalHtml = button.innerHTML;

				// Disable both buttons
				buttons.forEach(btn => {
					btn.disabled = true;
					if (btn === button) {
						btn.innerHTML = `<span class="d-flex align-items-center">
							<span class="spinner-border flex-shrink-0" role="status"></span>
						</span>`;
					}
				});

				await approverDecision(id, decision, reason);

				buttons.forEach(btn => {
					btn.disabled = false;
				});
				button.innerHTML = originalHtml;
			});
		});
	</script>
</body>
</html>
