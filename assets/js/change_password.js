$('#checkNewPassword').click(function() {

	
    if ($('#checkNewPassword').attr('active') == 1) {

	    $("#inputContrasena").removeAttr('disabled');
	    $("#inputContrasena2").removeAttr('disabled');
    	$('#checkNewPassword').attr('active',0);


    }else{
    	$('#checkNewPassword').attr('active',1);
	    $("#inputContrasena").attr('disabled','disabled');
	    $("#inputContrasena2").attr('disabled','disabled');
    }
});
