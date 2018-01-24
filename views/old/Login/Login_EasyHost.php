<?php
ini_set('display_errors', '1');

$title="Login EasyHost";
$CSS='<link media="all" type="text/css" rel="stylesheet" href="views/css/parsley.css"/>';
include('views/_Top.php');
$capcha_path='views/securimage/';
include($capcha_path.'securimage.php');$securimage = new Securimage();
include('controller/Login/Controller_Login_EasyHost.php');
?>
<div class="row" style="padding:20px">
	<?php if(isset($show_err)&&$show_err!=''){?>
    <div class="col-md-8 col-md-offset-2"><div class="alert alert-danger"><strong><?php print $show_err?></strong></div></div>
    <?php }?>
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Login EasyHost</div>
            <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST" action=""  data-parsley-validate>
                    <div class="form-group">
                        <label for="User" class="col-md-4 control-label">E-Mail Address</label>
                        <div class="col-md-6">
                            <input id="User" type="text" class="form-control" name="User" value="<?php print $user?>" required maxlength="255" data-parsley-type="email" autofocus>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-md-4 control-label">Password</label>
                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="password" required minlength="6" maxlength="30">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Solve" class="col-md-4 control-label">Solve</label>
                        <div class="col-md-3">
                        	<div>
                           		<input id="Solve" type="text" class="form-control" name="Solve" required maxlength="2">
                            </div>
                        	<div style="padding-top:20px">
                           		<a href="#" onclick="document.getElementById('captcha').src = '<?php print $capcha_path?>securimage_show.php?' + Math.random(); return false"  style="color:#d12126;">[Change Operation]</a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <img id="captcha" src="<?php print $capcha_path?>securimage_show.php" alt="CAPTCHA Image" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit" class="btn btn-primary" name="Login">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
$JS='<script src="views/js/parsley.min.js"></script>';
include('views/_Bottom.php');
?>