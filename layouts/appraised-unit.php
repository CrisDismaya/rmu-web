
<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>
	<title> Appraised Units | RMU </title>
	<?php include_once './_partials/__header-template.php'; ?>
	<style>
		.seperator {
			border-right: 1px solid;
			padding-right:20px;
		}
		.note {
			background-color:#f5f3b3;
			margin-top:10px;
			border-radius:6px;
			height:70px;
			padding:20px;
		}
	</style>
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
								<h4 class="mb-sm-0" id="header-breadcram">List Of Appraised Units</h4>
							</div>
						</div>
					</div>

					<div class="row">
						<!-- table -->
						<div class="col-lg-12">
							<div class="card">
								<div class="card-header align-items-center d-flex">
									<h4 class="card-title mb-0 flex-grow-1">List of  Units</h4>
									<div class="flex-shrink-0">
                                        Filter type
                                        <select id="status" class="select-single">
                                            <option value="ALL">ALL</option>
                                            <option value="PENDING">PENDING</option>
                                            <option value="APPROVED">APPROVED</option>
                                            <option value="DISAPPROVED">DISAPPROVED</option>
                                        </select>   
									</div>
								</div>
								<div class="card-body">
									<table id="received-unit-table" class="table table-bordered nowrap align-middle mdl-data-table" style="width:100%">
									<thead>
											<tr>
												<th>Branch</th>
												<th> Brand </th>
												<th> Model </th>
                                                <th> Color </th>
												<th style="text-align: left !important;">Request Price </th>
												<th> Engine </th>
												<th> Chassis </th>
                                                <th> Approved Date </th>
                                                <th> Ex. Owner </th>
                                                <th> Status </th>
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

	<?php include_once './_partials/__footer-template.php'; ?>

	<script>

	
		$(document).ready(function(){

			display_table('PRELOAD')

            $('#status').change(function(){
                display_table('CHANGE')
            })
			
		})



		async function display_table(action){
			const tableData = await $.ajax({
				url: `${baseUrl}/appraisedUnitList`,
				method: 'GET',
				dataType: 'json',
				headers:{
					'Authorization':`Bearer ${ auth.token }`,
				}
			});

            let list = action == 'PRELOAD' ||  $('#status').val() == 'ALL' ? tableData: tableData.filter((d) => { return d.status == $('#status').val()})

			$("#received-unit-table").DataTable().destroy();
			$("#received-unit-table").DataTable({
				deferRender: true,
				searching: true,
				scrollY: 400,
		  		scrollX: true,
				scrollCollapse: true,
				paging: false,
				data: list,
				// aoColumnDefs: [
				// 	{ className: "text-end", targets: [ 4 ] },
				// ],
				columns: [
					
					{ data: "branchname" },
					{ data: "brandname" },
					{ data: "model_name" },
                    { data: "color" },
					{ data: "approved_price", render: $.fn.dataTable.render.number( '\, ', '.', 2, '', '' ), className: "text-end" },
					{ data: "model_engine" },
					{ data: "model_chassis" },
                    { data: "date_approved" },
                    { data: null, defaultContent: '',
						fnCreatedCell: function(nTd, sData, oData, iRow, iCol){
						//	
						    html = `<span>${ oData.o_firstname } ${ oData.o_middlename } ${ oData.o_lastname }</span>`;
							
							$(nTd).html(html);
						}
					},
					{ data: "status" },
				], 
				dom: 'Bfrtip',
					buttons: [
						'excelHtml5'
					]
			});
		}
	</script>
</body>
</html>