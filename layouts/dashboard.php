
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

					<!-- start page title -->
					<div class="row">
						<div class="col-12">
							<div class="page-title-box d-sm-flex align-items-center justify-content-between">
								<h4 class="mb-sm-0">Dashboard</h4>
							</div>
						</div>
					</div>
					<!-- end page title -->

					<div class="row">
						<div class="col-xl-3 col-md-6">
							<!-- card -->
							<div class="card card-animate">
								<div class="card-body">
									<div class="d-flex align-items-center">
											<div class="flex-grow-1 overflow-hidden">
												<p class="text-uppercase fw-medium text-muted text-truncate mb-0"> Total Earnings</p>
											</div>
											<div class="flex-shrink-0">
												<h5 class="text-success fs-14 mb-0">
													<i class="ri-arrow-right-up-line fs-13 align-middle"></i> +16.24 %
												</h5>
											</div>
									</div>
									<div class="d-flex align-items-end justify-content-between mt-4">
											<div>
												<h4 class="fs-22 fw-semibold ff-secondary mb-4">$<span class="counter-value" data-target="559.25">0</span>k </h4>
												<a href="" class="text-decoration-underline">View net earnings</a>
											</div>
											<div class="avatar-sm flex-shrink-0">
												<span class="avatar-title bg-success-subtle rounded fs-3">
													<i class="bx bx-dollar-circle text-success"></i>
												</span>
											</div>
									</div>
								</div><!-- end card body -->
							</div><!-- end card -->
						</div><!-- end col -->

						<div class="col-xl-3 col-md-6">
							<!-- card -->
							<div class="card card-animate">
								<div class="card-body">
									<div class="d-flex align-items-center">
											<div class="flex-grow-1 overflow-hidden">
											<p class="text-uppercase fw-medium text-muted text-truncate mb-0">Orders</p>
											</div>
											<div class="flex-shrink-0">
												<h5 class="text-danger fs-14 mb-0">
													<i class="ri-arrow-right-down-line fs-13 align-middle"></i> -3.57 %
												</h5>
											</div>
									</div>
									<div class="d-flex align-items-end justify-content-between mt-4">
											<div>
												<h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="36894">0</span></h4>
												<a href="" class="text-decoration-underline">View all orders</a>
											</div>
											<div class="avatar-sm flex-shrink-0">
												<span class="avatar-title bg-info-subtle rounded fs-3">
													<i class="bx bx-shopping-bag text-info"></i>
												</span>
											</div>
									</div>
								</div><!-- end card body -->
							</div><!-- end card -->
						</div><!-- end col -->

						<div class="col-xl-3 col-md-6">
							<!-- card -->
							<div class="card card-animate">
								<div class="card-body">
									<div class="d-flex align-items-center">
											<div class="flex-grow-1 overflow-hidden">
												<p class="text-uppercase fw-medium text-muted text-truncate mb-0">Customers</p>
											</div>
											<div class="flex-shrink-0">
												<h5 class="text-success fs-14 mb-0">
													<i class="ri-arrow-right-up-line fs-13 align-middle"></i> +29.08 %
												</h5>
											</div>
									</div>
									<div class="d-flex align-items-end justify-content-between mt-4">
											<div>
												<h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="183.35">0</span>M </h4>
												<a href="" class="text-decoration-underline">See details</a>
											</div>
											<div class="avatar-sm flex-shrink-0">
												<span class="avatar-title bg-warning-subtle rounded fs-3">
													<i class="bx bx-user-circle text-warning"></i>
												</span>
											</div>
									</div>
								</div><!-- end card body -->
							</div><!-- end card -->
						</div><!-- end col -->

						<div class="col-xl-3 col-md-6">
							<!-- card -->
							<div class="card card-animate">
								<div class="card-body">
									<div class="d-flex align-items-center">
											<div class="flex-grow-1 overflow-hidden">
												<p class="text-uppercase fw-medium text-muted text-truncate mb-0"> My Balance</p>
											</div>
											<div class="flex-shrink-0">
												<h5 class="text-muted fs-14 mb-0">
													+0.00 %
												</h5>
											</div>
									</div>
									<div class="d-flex align-items-end justify-content-between mt-4">
											<div>
												<h4 class="fs-22 fw-semibold ff-secondary mb-4">$<span class="counter-value" data-target="165.89">0</span>k </h4>
												<a href="" class="text-decoration-underline">Withdraw money</a>
											</div>
											<div class="avatar-sm flex-shrink-0">
												<span class="avatar-title bg-primary-subtle rounded fs-3">
													<i class="bx bx-wallet text-primary"></i>
												</span>
											</div>
									</div>
								</div><!-- end card body -->
							</div><!-- end card -->
						</div><!-- end col -->
					</div> <!-- end row-->

					<div class="row">
						<div class="col-xl-4">
							<div class="card card-height-100">
								<div class="card-header align-items-center d-flex">
									<h4 class="card-title mb-0 flex-grow-1">Sales Breakdown: Cash vs Installment</h4>
									<!-- <div class="flex-shrink-0">
										<div class="dropdown card-header-dropdown">
											<a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<span class="text-muted">Report<i class="mdi mdi-chevron-down ms-1"></i></span>
											</a>
											<div class="dropdown-menu dropdown-menu-end">
												<a class="dropdown-item" href="#">Download Report</a>
												<a class="dropdown-item" href="#">Export</a>
												<a class="dropdown-item" href="#">Import</a>
											</div>
										</div>
									</div> -->
								</div><!-- end card header -->

								<div class="card-header p-0 border-0 bg-light-subtle">
									<div class="row g-0 text-center">
											<div class="col-6 col-sm-6">
												<div class="p-3 border border-dashed border-start-0">
													<h5 class="mb-1"><span class="counter-value" data-target="10">0</span></h5>
													<p class="text-muted mb-0">Cash</p>
												</div>
											</div>
											<!--end col-->
											<div class="col-6 col-sm-6">
												<div class="p-3 border border-dashed border-start-0 border-end-0">
													<h5 class="mb-1 text-success"><span class="counter-value" data-target="20">0</span></h5>
													<p class="text-muted mb-0">Installment</p>
												</div>
											</div>
											<!--end col-->
									</div>
								</div><!-- end card header -->

								<div class="card-body">
									<div id="store-visits-source" data-colors='["--vz-primary", "--vz-success", "--vz-warning", "--vz-danger", "--vz-info"]' 
										class="apex-charts" dir="ltr"></div>
								</div>
							</div> <!-- .card-->
						</div> <!-- .col-->

						<div class="col-xl-8">
							
						</div> <!-- .col-->
					</div> <!-- end row-->

				</div>
			</div>

		</div>
	</div>

	<?php include_once './_partials/__footer-template.php'; ?>

	<script>
		// Get colors from data attribute
		var chartDonutBasicColors = getChartColorsArray("store-visits-source");

		// Define chart options
		var options = {
			series: [44, 55],
			labels: ["Cash", "Installment"],
			chart: {
				height: 333,
				type: "donut"
			},
			legend: {
					position: "bottom"
			},
			stroke: {
					show: false
			},
			dataLabels: {
				dropShadow: {
					enabled: false
				}
			},
			colors: chartDonutBasicColors
		};

		// Render the chart
		var chart = new ApexCharts(document.querySelector("#store-visits-source"), options);
		chart.render();

		function getChartColorsArray(e) {
			if (null !== document.getElementById(e)) {
					var t = document.getElementById(e).getAttribute("data-colors");
					if (t) return (t = JSON.parse(t)).map(function(e) {
						var t = e.replace(" ", "");
						return -1 === t.indexOf(",") ? getComputedStyle(document.documentElement).getPropertyValue(t) || t : 2 == (e = e.split(",")).length ? "rgba(" + getComputedStyle(document.documentElement).getPropertyValue(e[0]) + "," + e[1] + ")" : t
					});
					console.warn("data-colors atributes not found on", e)
			}
		}
	</script>
</body>
</html>