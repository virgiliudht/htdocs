<?php
ini_set('display_errors', '1');
include('../../model/connect.php');
include('../../model/function.php');

$wath=array();
$clause = array("delete"=>"0","id"=>$_GET['gr']);
$loop=select_from_db_clause($wath,'sites',$clause,'AND',$connect);
$title="View Grafic For ";
if(isset($loop[0]['url']))$title.=$loop[0]['url'];

include('../../views/_Top.php');
include('../../controller/verif_ses.php');

if(isset($_SESSION['user'])&&count($loop)>0)
{
	include('../../views/_message.php');
	include('../../controller/Site/Controller_Grafic.php');
	print '<div id="js_message"></div>';
	include('../../views/_nav_bar.php');
?>
<form class="form-horizontal" role="form" method="POST" action="">
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <tr>
                    <td width="5%"><strong>Speed</strong></td>
                    <td>
                    	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
					<?php
						$wath=array();
						$clause=array("id_site"=>$_GET['gr']);
						$speed=select_from_db_clause_return_vector($wath,'site_speed',$clause,'AND',$connect,'id_speed','value');
						$count=0;
						foreach($speed as $key=>$value)
						{
							print '<div style="padding-bottom:5px">';
							if(count($value)>2)
							{
								print '<div class="panel panel-default">';
								print '<div class="panel-heading">'.$key.'</div>';
								print '<div class="panel-body" id="curve_chart_'.$count.'" style="width: 1100px; height: 100px;"></div>';
								print '</div>';		
								?>
								<script type="text/javascript">
								  google.charts.load('current', {'packages':['corechart']});
								  google.charts.setOnLoadCallback(drawChart<?php print $count?>);
								
								  function drawChart<?php print $count?>() {
									var data = google.visualization.arrayToDataTable([
									  ['Year', '<?php print $key?>'],
								  <?php foreach($value as $key1=>$value1){?>
									  ['<?php print $value1['date']?>',  <?php print $value1['value']?>,],
								 <?php }?>
									]);
								
									var options = { curveType: 'function'};
								
									var chart = new google.visualization.LineChart(document.getElementById('curve_chart_<?php print $count?>'));
								
									chart.draw(data, options);
								  }
								</script>
								<?php
								$count++;
							}
							else print'<div class="alert alert-info" role="alert">For '.$key.' need at least 3 registration  now we have '.count($value).'</div>';
							print '</div>';
						}
					?>
                    </td>
                    <td width="5%"><input type="submit" name="speed_analyze" value="Analyze" class="btn btn-primary btn-sm" onclick="waith('Wait for the Analysis')"></td>
                </tr>
            </table>
        </div>
    </div>
</form>
<?php
$JS='<script src="../../views/js/js.js"></script>';
}else include('../../views/_no_acces.php');
include('../../views/_footer.php');
include('../../views/_Bottom.php');
?>