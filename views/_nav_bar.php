<?php include(@$path.'pagini.php');?>
<h1><?php print @$title?>!</h1>
<nav class="navbar navbar-default">
	<div class="container-fluid">
	  <!-- Brand and toggle get grouped for better mobile display -->
	  <div class="navbar-header">
	    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	      <span class="sr-only">Toggle navigation</span>
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	    </button>
	    <?php if(isset($page[1])){?><a class="navbar-brand" href="<?php print $page[1]['url']?>"><?php print $page[1]['page_name']?></a><?php }?>
	  </div>

	  <!-- Collect the nav links, forms, and other content for toggling -->
	  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	    <ul class="nav navbar-nav">
        	<?php 
			foreach(@$page as $key =>$details)
			{
			?>
			<li <?php if(isset($selectat)&&$selectat == $key) print 'class="active"'?> >
          		<a href="<?php print $details['url']?>"><?php print $details['page_name']?></a>
	        </li>
            <?php
			}
			?>
	    </ul>
	    <ul class="nav navbar-nav navbar-right">
	      <li class="dropdown <?php if(isset($selectat)&&$selectat == 'Users') print 'active'?>">
	        <?php if(isset($page[0])){?><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php print $page[0]['page_name']?> <span class="caret"></span></a><?php }?>
	        <ul class="dropdown-menu">
				<?php 
                foreach(@$page as $key =>$details)
                {
                ?>
                <li>
                	<a href="<?php print $details['url']?>"><?php print $details['page_name']?></a>
                </li>
                <?php
                }
                ?>
	        </ul>
	      </li>
	    </ul>
	  </div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>