function delete_req(text){return confirm(text);}
function waith(text)
{
	$("#message").remove();
	$(".alert-danger").remove();
	$(".alert-success").remove();
	var div = $("#js_message").append('<div id="message" class="alert alert-warning" role="alert"><strong>'+text+'</strong></div>');
}