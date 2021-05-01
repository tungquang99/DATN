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
					<li class="breadcrumb-item"><a href="index.html">Home</a><i class="fa fa-angle-right"></i>Tour</li>
				</ol>
				<div class="agile-grids">
					<!-- tables -->

					<div class="agile-tables">
						<div class="w3l-table-info">
							<a href="http://localhost/travel/index.php?controller=admin&action=add_tour" class="btn btn_add btn-primary"><i class="fa fa-plus "></i> Thêm</a>
							<table id="table">
								<thead>
									<tr>
										<th>Code</th>
										<th width="15%">Tên Tour</th>
										<th>Thành Phố</th>
										<th>Loại Tour</th>
										<th>Khởi Hành</th>
										<th>Số Ngày</th>
										<th width="8%">Giá/Sale</th>
										<th>Hình ảnh</th>
										<th>Nổi Bật</th>
										<th>Hành Động</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$totalRecords = count($tour);
									$totalPage = ceil($totalRecords / $page_item);
									foreach ($data_tour as $value) {
									?>
										<tr>
											<td><?php echo $value['Code']; ?></td>
											<td><?php echo $value['Name_tour']; ?></td>
											<td><?php echo $value['Name_city']; ?></td>
											<td><?php echo $value['Name_LH']; ?></td>
											<td><?php echo $value['startDate']; ?></td>
											<td><?php echo $value['time_tour']; ?></td>
											<td><?php echo $value['Price']; ?>
												<?php
												if ($value['Sale'] == "") {
													echo " ";
												} else {
													echo "/" . $value['Sale'];
												}
												?>
											</td>
											<td> <img src="admin/Tour_img/<?php echo $value['Img']; ?>" alt="" width="80px" /></td>
											<?php
											if ($value['Feature'] == "Off") { ?>
											<td class="status">
													<button type="submit" name="gettotal" class="btn_danger">
														<a class="status_text" href="http://localhost/travel/index.php?controller=admin&action=feature_tour&id=<?php echo $value['id_tour'] ?>">
															<?php echo $value['Feature']; ?>
														</a>
													</button>
											</td>
											<?php } else if ($value['Feature'] == "On") { ?>
											<td class="fea_dis">
													<button type="submit" name="gettotal" class="btn_success">
														<a class="status_text" href="http://localhost/travel/index.php?controller=admin&action=feature_tour_off&id=<?php echo $value['id_tour'] ?>">
															<?php echo $value['Feature']; ?>
														</a>
													</button>
											</td>
											<?php } ?>
											
											<td>
												<a href="http://localhost/travel/index.php?controller=admin&action=update_tour&id=<?php echo $value['id_tour'] ?>">
													<i style="font-size: 1.1rem; line-height: 20px; padding: 5px;" class="fa fa-edit text-primary"></i>
												</a>
												<a href="http://localhost/travel/index.php?controller=admin&action=delete_tour&id=<?php echo $value['id_tour'] ?>">
													<i style="font-size: 1.1rem; line-height: 20px; padding: 5px;" class="fa fa-trash text-danger"></i>
												</a>
											</td>
										</tr>
									<?php  } ?>
								</tbody>
							</table>

						</div>
						<div class="pagination ">
							<?php
							for ($num = 1; $num <= $totalPage; $num++) { ?>
								<?php if ($num != $current_page) { ?>
									<a href="http://localhost/travel/index.php?controller=admin&action=tour&per_page=<?= $page_item ?>&page=<?= $num ?>"><?= $num ?></a>
								<?php }else { ?>
										<span class="active"><?= $num ?></span>
								<?php } ?>

							<?php } ?>
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