$(document).ready(function(){  
	// submit for agree
	$('#agree').click(function(){
		if($(this).prop("checked") == true){
			$("#sing_submit").removeClass('disabled');
		}
		else if($(this).prop("checked") == false){
			$("#sing_submit").addClass('disabled');
		}
	});
	//Main Slider	
	$('#main_slider').owlCarousel({
		items:1,	
		loop:true,
		center:true,
		autoplay: true,
		autoplayTimeout:7000,
		autoplayHoverPause:true,
		autoplaySpeed : 600,
		nav:false,
		pagination: true,
		animateOut : "fadeOut",
		animateIn : "fadeIn",		
	})	
});
//re-type password
function get_data(){
	 var pass= $('#pass').val();	 
	 var con_pass= $('#con_pass').val();
	 if(pass==con_pass){
		$( "#con_pass" ).addClass( 'shadow_green' );
		$( " #con_pass" ).removeClass( 'shadow_red' );
		
	 }else{ 
		$( "#con_pass" ).addClass( 'shadow_red' );
		$( "#con_pass" ).removeClass( 'shadow_green' );
	 }
}
function get_data2() {
	$("#con_pass").removeAttr('disabled');
}

document.addEventListener('contextmenu', function(e) {
		e.preventDefault();
	});

	function disableSelection(target){
		if (typeof target.onselectstart!="undefined") 
			target.onselectstart=function(){return false}
		else if (typeof target.style.MozUserSelect!="undefined") 
			target.style.MozUserSelect="none"
		else 
			target.onmousedown=function(){return false}
		target.style.cursor = "default"
	}
	disableSelection(document.body)