
		$(function() {
	$(".deluser").click(function(){
	var del_id = $(this).attr('id');
	var info = 'id=' + del_id;
	if(confirm("Sure you want to delete this update? There is NO undo!"))
	{ 
	$.ajax({
	type: "POST",
	url: "user_delete.php",
	data: info,
	success: function(){
	}
	});
	$(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
	.animate({ opacity: "hide" }, "slow");
	}
		return false;
	});
	});
	
	
		$(function() {
	$(".upuser").click(function(){
	var del_id = $(this).attr('id');
	var info = 'id=' + del_id;
	if(confirm("Sure you want to delete this update? There is NO undo!"))
	{ 
	$.ajax({
	type: "POST",
	url: "edit_user.php",
	data: info,
	success: function(){
	}
	});
	
	}
		return false;
	});
	});
	
	$(document).ready(function(){
	$('#yes').click(function(){
		$('#saim').slideDown("slow");
	});	
	$('#no').click(function(){
		$('#saim').slideUp("slow");
	});	
});

	
	
