<?php
if(isset($path)&&$path==false)$path="";else $path="../../";
ini_set('display_errors', '1');

$title="Newsly News";
$CSS='<link media="all" type="text/css" rel="stylesheet" href="/views/css/parsley.css"/>';
include(@$path.'views/_Top.php');
include(@$path.'views/_nav_bar.php');
//include('controller/Login/Controller_Login_EasyHost.php');
?>
<form class="form-horizontal" role="form" method="POST" action=""  data-parsley-validate>
    <div class="input-group">
	    <span class="input-group-addon">Add News Title</span>
    	<input id="News_Title" maxlength="200" type="text" class="form-control" name="News_Title" placeholder="Add News Title">
    </div>
    <div style="padding-top:20px">
        <textarea name="News_Body" id="News_Body" rows="10" cols="80">
			Add News Body
        </textarea>
    </div>
    <div class="input-group" style="padding-top:20px">
	    <span class="input-group-addon">Add Image</span>
		<input type="file" name="img">
    </div>
    <div class="input-group" style="padding-top:20px">
		<input type="button" name="SAVE" value="SAVE" class="btn btn-primary" onclick="salvare()" />
    </div>
    <div class="input-group" style="padding-top:20px; width:100%">
		<span id="News_Titlee" style="padding-top:20px; width:100%"></span>
    </div>
</form>
<?php
$JS='<script src="/views/js/parsley.min.js"></script>';
$JS='<script src="/controller/js/Add_Newsly.js"></script>';
$JS.='<script src="https://cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>';
include(@$path.'views/_footer.php');
include(@$path.'views/_Bottom.php');
?>
<script>
	// Replace the <textarea id="editor1"> with a CKEditor
	// instance, using default configuration.
	CKEDITOR.replace( 'News_Body' );
</script>