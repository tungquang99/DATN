<?php
session_start();
if (empty($_SESSION['User'])) {
	header('location:http://localhost/travel/index.php?controller=admin&action=login');
} else {
?>
	<!DOCTYPE HTML>
	<html>

	<head>
		<title>Du Lịch Trong Nước</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<script type="application/x-javascript">
			addEventListener("load", function() {
				setTimeout(hideURLbar, 0);
			}, false);

			function hideURLbar() {
				window.scrollTo(0, 1);
			}
		</script>

		<script type="text/javascript">
			$(document).ready(function() {
				$('#table').basictable();

				$('#table-breakpoint').basictable({
					breakpoint: 768
				});

				$('#table-swap-axis').basictable({
					swapAxis: true
				});

				$('#table-force-off').basictable({
					forceResponsive: false
				});

				$('#table-no-resize').basictable({
					noResize: true
				});

				$('#table-two-axis').basictable();

				$('#table-max-height').basictable({
					tableWrapper: true
				});
			});
		</script>

	</head>

	<body>
		<div class="page-container">
			<!--/content-inner-->
			<div class="left-content">
				<div class="mother-grid-inner">
					<!--header start here-->
					<?php include('admin/includes/header.php'); ?>
					<div class="clearfix"> </div>
				</div>
				<!--heder end here-->
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.html">Home</a><i class="fa fa-angle-right"></i>Giới Thiệu</li>
				</ol>
				<div class="agile-grids">
					<!-- tables -->

					<div class="agile-tables">
						<div class="w3l-table-info">
							<table id="table">
								<thead>
									<tr>
										<th>Nội Dung</th>
										<th>Hành Động</th>
									</tr>
								</thead>
								<tbody>
                                    <?php
									foreach ($about as $value) {
									?>
										<tr>
											<td><?php echo $value['Content']; ?></td>
											<td>
												<a href="http://localhost/travel/index.php?controller=admin&action=update_about">
													<i style="font-size: 1.1rem; line-height: 20px; padding: 5px;" class="fa fa-edit text-primary"></i>
												</a>
											</td>
										</tr>
									<?php } ?>
								</tbody>
							</table>

						</div>
					</div>
					<!-- script-for sticky-nav -->
					<script>
						$(document).ready(function() {
							var navoffeset = $(".header-main").offset().top;
							$(window).scroll(function() {
								var scrollpos = $(window).scrollTop();
								if (scrollpos >= navoffeset) {
									$(".header-main").addClass("fixed");
								} else {
									$(".header-main").removeClass("fixed");
								}
							});
						});
					</script>
					<!-- /script-for sticky-nav -->
					<!--inner block start here-->
					<div class="inner-block">

					</div>
					<!--inner block end here-->
					<!--copy rights start here-->
					<?php include('admin/includes/footer.php'); ?>
					<!--COPY rights end here-->
				</div>
			</div>
			<!--//content-inner-->
			<!--/sidebar-menu-->
			<?php include('admin/includes/sidebarmenu.php'); ?>
			<div class="clearfix"></div>
		</div>
		<script>
			var toggle = true;

			$(".sidebar-icon").click(function() {
				if (toggle) {
					$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
					$("#menu span").css({
						"position": "absolute"
					});
				} else {
					$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
					setTimeout(function() {
						$("#menu span").css({
							"position": "relative"
						});
					}, 400);
				}

				toggle = !toggle;
			});
		</script>
	</body>

	</html>
<?php } ?>