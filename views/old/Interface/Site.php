<?php
ini_set('display_errors', '1');
if(!isset($_GET['id']))$title="Add Site";else $title="Edit Site";
$CSS='<link media="all" type="text/css" rel="stylesheet" href="../../views/css/parsley.css"/>';
include('../../views/_Top.php');
include('../../model/connect.php');
include('../../model/function.php');
include('../../controller/verif_ses.php');

include('../../views/_message.php');
if(isset($_SESSION['user']))include('../../views/_message.php');
if(isset($_GET['id']))include('../../controller/Site/Controller_Site_edit.php');
elseif(isset($_GET['del']))include('../../controller/Site/Controller_Site_del.php');
else include('../../controller/Site/Controller_Site.php');

if(isset($_SESSION['user']))
{
	$selectat="Site";
	include('../../views/_nav_bar.php');
?>
<form class="form-horizontal" role="form" method="POST" action=""  data-parsley-validate>
  <div class="form-group">
      <label name="URL">URL:</label>
      <input id="URL" name="URL" class="form-control" placeholder="URL" required minlength="6" maxlength="255" value="<?php if(isset($URL))print $URL?>">
  </div>
  <div class="form-group">
      <label name="Owner">Owner:</label>
      <input id="Owner" name="Owner" class="form-control" placeholder="Owner" required minlength="6" maxlength="255"value="<?php if(isset($Owner))print $Owner?>">
  </div>
  <div class="form-group">
      <label name="email">Email:</label>
      <input id="Email" name="Email" class="form-control" placeholder="Email" required maxlength="30" data-parsley-type="email" value="<?php if(isset($Email))print $Email?>">
  </div>
  <div class="form-group">
      <label name="messege">Observation:</label>
      <textarea id="Observation" name="Observation" class="form-control" placeholder="Type Your Observation"><?php if(isset($Observation))print $Observation?></textarea>
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