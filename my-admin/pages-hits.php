<?php
 session_start();
// var_dump($_REQUEST);
 if (isset($_SESSION['admin']) =="") {
	header("Location: login.php");
	exit;
}
 include "includes/header.php";
 include "includes/upper_navi.php";
 include "includes/left_navi.php"; 
 require_once('php-hit-counter-master/conn.php');
// GET PAGE HIT INFO FROM DB
$sql = "SELECT * FROM ".$GLOBALS['hits_table_name'];
$query = $db->prepare($sql);
$query->execute();
$page_hits = $query->fetchAll();

// GET NUMBER OF UNIQUE VISITORS
$sql = "SELECT COUNT(DISTINCT ip_address) AS alias FROM ".$GLOBALS['info_table_name'];
$query = $db->prepare($sql);
$query->execute();
$unique_visitors = $query->fetch()['alias'];

// GET VISITOR INFO FROM DB
$sql = "SELECT * FROM ".$GLOBALS['info_table_name']." ORDER BY time_accessed ASC";
$query = $db->prepare($sql);
$query->execute();
$hits_info = $query->fetchAll();

// ONLY SHOW 10 LATEST VISITOR INFO
$visitor_info = array_slice(array_reverse($hits_info), 0, 10);
 
 ?>
	<div class="main-wrapper">
		<div class="container-fluid">
			<div class="row-fluid ">
				<div class="span12">
					<div class="primary-head">
						<h3 class="page-header">Visitors List </h3>
					</div>
				</div>
			</div>
			<div class="row-fluid ">
					<?php $total_hits = 0;
					foreach($page_hits as $ind_page){
					?>	
					<div class="span6">
						<div class="board-widgets green small-widget">
							<a href="#"><span class="widget-stat"><?php echo $ind_page['count']; ?></span><span class="widget-icon icon-file"></span><span class="widget-label">Page <?php echo $ind_page['page']; ?></span></a>
						</div>
					</div>	
			
				<?php $total_hits += $ind_page['count']; }  ?>
			</div>
			<div class="row-fluid ">				
				<div class="span6">
					<div class="board-widgets orange small-widget">
						<a href="#"><span class="widget-stat"><?php echo $total_hits; ?></span><span class="widget-icon icon-file"></span><span class="widget-label">Total Pages Hits</span></a>
					</div>
				</div>
				<div class="span6">
					<div class="board-widgets bondi-blue small-widget">
						<a href="#"><span class="widget-stat"><?php echo $unique_visitors; ?></span><span class="widget-icon icon-user"></span><span class="widget-label">Total Number of Unique Visitors</span></a>
					</div>
				</div>
			</div>
			
            <div class="row-fluid">
				<div class="span12">
					<div class="content-widgets">
						<div>
							<div class="widget-header-block">
								<h4 class="widget-header"> LATEST VISITORS List </h4>
							</div>
							<div>
								<table class="responsive table-striped table-bordered tbl-dark-theme">
									<thead>
										<tr>
											<th>
												 SR No.
											</th>											
											<th>
												 IP Address 
											</th>
											<th>
												 Time Accessed 
											</th>
											<th>
												User Agent
											</th>
										</tr>
									</thead>
									<tbody>
									<?php 
									$ctr=0; 
									$total_hits = 0;
										foreach($visitor_info as $ind_visitor){
									$ctr++; 
									?>
										<tr>
											<td>
												<?php echo $ctr; ?>
											</td>
											<td>
												<?php echo $ind_visitor['ip_address']; ?>	
											</td>											
											<td>
												<?php echo $ind_visitor['time_accessed']; ?>	
											</td>
											<td>
												<?php echo $ind_visitor['user_agent']; ?>	
											</td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>	
				</div>
			</div>
		</div>
	</div>
	

 <?php include "includes/footer.php"; ?>