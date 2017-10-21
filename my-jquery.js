$("document").ready(function() {
	$("#login-form-div").hide();
	$("#previous").hide();

	$("#next").click(function(e){
	    e.preventDefault();
	    $('#registration-form-div').fadeOut('fast', function(){
	        $('#login-form-div').fadeIn('fast');
	    });
	    $("#next").hide();
		$("#previous").show();
	});

	$("#previous").click(function(e){
	    e.preventDefault();
	    $('#login-form-div').fadeOut('fast', function(){
	        $('#registration-form-div').fadeIn('fast');
	    });
	    $("#previous").hide();
		$("#next").show();
	});

});

