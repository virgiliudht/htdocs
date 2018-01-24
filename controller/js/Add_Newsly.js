function salvare()
{
	$.ajax
	({
    	url:"../../Controller/Newsly_Controler.php",
	    type:"POST",
        data:
		{
        	News_Title: $("#News_Title").val(),
	        News_Body: CKEDITOR.instances.News_Body.getData(),
        },
        success:function(response){$("#News_Titlee").html('<div class="btn btn-success" style="padding-top:20px; width:100%">"News Uploaded !!!"</div>');},
        error:function(){alert("error");}
    });
}