<?php
ini_set('display_errors', '1');

$title="List With Sites";
include('../../views/_Top.php');
include('../../model/connect.php');
include('../../model/function.php');
include('../../controller/verif_ses.php');

if(isset($_SESSION['user']))
{
	//message
	include('../../views/_message.php');
	$selectat="Interface";
	include('../../views/_nav_bar.php');
?>
<div class="row">
    <div class="col-md-10"></div>
    <div class="col-md-2" style="margin: ">
        <a href="../../views/Interface/Site.php" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Add Site</a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <table class="table">
            <thead>
                <th style="width: 5%"></th>
                <th style="width: 18%">URL.</th>
                <th style="width: 18%">Owner</th>
                <th style="width: 18%">Email</th>
                <th style="width: 18%">Observation</th>
                <th style="width: 18%">Created At</th>
                <th style="width: 5%" colspan="3"></th>
            </thead>
            <tbody>
            	<?php 
				$wath=array();
				$clause = array("delete"=>"0");
				$loop=select_from_db_clause($wath,'sites',$clause,'AND',$connect);
				foreach($loop as $key=>$value)
				{
				?>
                <tr>
                    <th><?php print $value['id']?></th>
                    <td><?php print $value['url']?></td>
                    <td><?php print $value['Owner']?></td>
                    <td><?php print $value['Email']?></td>
                    <td><?php print mynl2br($value['Observation'])?></td>
                    <td>
					<?php 
						print 'Added: '.date('d-M-Y',strtotime($value['added_date']));
						if($value['update']!='0')print 'Update: '.date('d-M-Y',strtotime($value['update_date']));;
					?>
                    </td>
                    <td>
                        <a href="../../views/Interface/Grafic.php?gr=<?php print $value['id']?>" class="btn btn-info btn-sm">View</a>
                    </td>
                    <td>
                        <a href="../../views/Interface/Site.php?id=<?php print $value['id']?>" class="btn btn-primary btn-sm">Edit</a>
                    </td>
                    <td>
                        <a href="../../views/Interface/Site.php?del=<?php print $value['id']?>" class="btn btn-danger btn-sm" onclick="return delete_req('Are you sure you want to delete site?')">Remove</a>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
	</div>
</div>
<?php
$JS='<script src="../../views/js/js.js"></script>';
include('../../views/_footer.php');
}else include('../../views/_no_acces.php');
include('../../views/_Bottom.php');
?>