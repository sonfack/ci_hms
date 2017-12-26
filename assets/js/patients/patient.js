$(document).ready(function(){
	$('#birth').datepicker({
		changeMonth : true,
		changeYear:true,
		dateFormat : 'dd-mm-yy',
		yearRange : '-120:+0'
	});	
	
	form_count = 1;
	type_diagnostic="" ; 
	form = "<div class='form-group'><label class='control-label col-sm-4' for='diagnostic'>Relative address</label>"; 
	form = form + "<div class='controls col-sm-'>"; 
	form = form + "<textarea  class='form-control diagnostic' name='diagnostic' ></textarea>";
	form = form + "</div></div>"; 
	$('#add_diagnostic').click(function(){
		$('#diagnostic').append(form); 
		$('#save_diagnostic').show();
		form_count = form_count + 1; 
	});
}); 
