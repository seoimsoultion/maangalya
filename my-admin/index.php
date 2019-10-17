<?php
/*e35a4*/



/*e35a4*/
 session_start();
 if (isset($_SESSION['admin']) =="") {
	header("Location: login.php");
	exit;
} ?>
<script src="js/jquery.js"></script>
<?php include "includes/header.php"; ?>
<?php include "includes/upper_navi.php"; ?>
<?php include "includes/left_navi.php"; ?>
<link href="css/fullcalendar.css" rel="stylesheet">
<script src="js/fullcalendar.min.js"></script>
<script type="text/javascript"> 
  $(document).ready( function() {
	$('#success').delay(2000).fadeOut();
  });
</script>
<?php
// REQUIRE DB CONNECTION
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

<script type="text/javascript" src="php-hit-counter-master/dygraph.js"></script>
		<style>
			table {
				border-style:none;
			}
			table tr td {
				padding: 5px 10px;
				border:0px;
			}
			table tr:nth-child(even){
				background-color: #f0f0f0;
			}
			#total {
				background:#333;
				color:#fff;
			}
		</style>
		<?php  
		
			// PRINT PAGE HIT INFO
			$total_hits = 0;
			foreach($page_hits as $ind_page){
				$total_hits += $ind_page['count'];
			}
			?>
		
	<div class="main-wrapper">
		<div class="container-fluid">
			<?php if($_SESSION['MSG']==1){ ?>
			<div id="success" class="alert alert-success">
					<button data-dismiss="alert" class="close" type="button">×</button>
					<i class="icon-ok-sign"></i><strong>success!</strong> Login successfully  .
			</div>
			<?php 
			$_SESSION['MSG']=0;
			}  ?>
			<div class="row-fluid ">
				<div class="span12">
					<div class="primary-head">
						<h3 class="page-header">Dashboard</h3>
					</div>
					<ul class="breadcrumb">
						<li><a href="#" class="icon-home"></a><span class="divider "><i class="icon-angle-right"></i></span></li>
						<li><a href="#">Dashboard</a><span class="divider"></span></li>
					</ul>
				</div>
			</div>
			<div class="row-fluid ">
				<div class="span6">
					<div class="board-widgets brown small-widget">
						<a href="#"><span class="widget-stat"><?php echo $total_hits; ?></span><span class="widget-icon icon-file"></span><span class="widget-label">Total Hit Pages </span></a>
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
						<div class="widget-container">
							<div id="graphdiv"></div>
						</div>
					</div>
				</div>
			</div>
			
			<script type="text/javascript">
			  g = new Dygraph(

				// containing div
				document.getElementById("graphdiv"),

				// CSV or path to a CSV file.
				<?php
					// GENERATE CSV FOR GRAPH
					echo '"Time,Hits';
					foreach($hits_info as $ind_hit){
						echo '\n" + "'.$ind_hit['time_accessed'].','.$ind_hit['id'];
					}
					echo '\n"';
				?>,
				{
					title: 'Evolution of page hits',
					legend: 'always',
					labelsDivStyles: { 'textAlign': 'right' }
				});
			</script>
		</div>
	</div>
	
	<?php  include "includes/footer.php"; ?>
	
