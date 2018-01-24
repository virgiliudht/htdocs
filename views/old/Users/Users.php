<?php
ini_set('display_errors', '1');
if(!isset($_GET['id']))$title="Add User";else $title="Edit User";
$CSS='<link media="all" type="text/css" rel="stylesheet" href="../../views/css/parsley.css"/>';
include('../../views/_Top.php');
include('../../model/connect.php');
include('../../model/function.php');
include('../../controller/verif_ses.php');

include('../../views/_message.php');
if(isset($_GET['id']))include('../../controller/Users/Controller_Users_edit.php');
elseif(isset($_GET['del']))include('../../controller/Users/Controller_Users_delete.php');
else include('../../controller/Users/Controller_Users.php');

if(isset($_SESSION['user']))
{
	$selectat="Users";
	include('../../views/_nav_bar.php');
?>
<form class="form-horizontal" role="form" method="POST" action=""  data-parsley-validate>
    <div class="form-group">
      <label name="email">Email:</label>
      <input id="Email" name="Email" class="form-control" placeholder="Email" required maxlength="255" data-parsley-type="email" value="<?php if(isset($Email))print $Email?>">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input id="Password" type="text" class="form-control" placeholder="Password" name="Password" required minlength="6" maxlength="30" value="<?php if(isset($Password))print $Password?>">
    </div>
    <div class="form-group">
    	<input type="submit" value="Save" name="Save" class="btn btn-success">
    </div>
</form>
<?php
$JS='<script src="../../views/js/parsley.min.js"></script>';
include('../../views/_footer.php');
}else include('no_acces.php');
include('../../views/_Bottom.php');
?>