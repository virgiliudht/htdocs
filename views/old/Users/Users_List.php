<?php
ini_set('display_errors', '1');
$title="Users List";
include('../../views/_Top.php');
include('../../model/connect.php');
include('../../model/function.php');
include('../../controller/verif_ses.php');

if(isset($_SESSION['user']))
{
	include('../../views/_message.php');
	$selectat="Users";
	include('../../views/_nav_bar.php');
?>
<div class="row">
    <div class="col-md-10"></div>
    <div class="col-md-2" style="margin: ">
        <a href="../../views/Users/Users.php" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Add User</a>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <table class="table">
            <thead>
                <th style="width: 5%">No.</th>
                <th style="width: 20%">Email</th>
                <th style="width: 45%">Password</th>
                <th style="width: 15%"></th>
            </thead>
            <tbody>
            	<?php 
				$wath=array();
				$clause = array("remove"=>"0");
				$loop=select_from_db_clause($wath,'user',$clause,'AND',$connect);
				foreach($loop as $key=>$value)
				{
				?>
                <tr>
                    <th><?php print $value['id']?></th>
                    <td><?php print $value['email']?></td>
                    <td><?php print $value['password']?></td>
                    <td>
                        <a href="../../views/Users/Users.php?id=<?php print $value['id']?>" class="btn btn-primary btn-sm">Edit</a>
                        <a href="../../views/Users/Users.php?del=<?php print $value['id']?>" class="btn btn-danger btn-sm" onclick="return delete_req('Are you sure you want to delete user?')">Remove</a>
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
}else include('no_acces.php');
include('../../views/_Bottom.php');
?>