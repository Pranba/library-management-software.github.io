$(document).ready(function(){ 	
	 $(document).on('click', '#getReader', function(e){  
     e.preventDefault();  
     var rdrid = $(this).data('rID');    
	  $('#reader-detail').hide();
     $('#reader_data-loader').show();  
     $.ajax({
          url: 'readerData.php',
          type: 'POST',
          data: 'rdrid='+rdrid,
          dataType: 'json',
		  cache: false
     })
     .done(function(data){
          console.log(data.rname); 
            $('#reader-detail').hide();
		  $('#reader-detail').show();
		  $('#cardno').html(data.card_no);
		  $('#rname').html(data.rname);
		  $('#fname').html(data.fname);
		  $('#mobile').html(data.mobile);
            $('#email').html(data.email);		 
		  $('#employee_data-loader').hide();
     })
     .fail(function(){
          $('#reader-detail').html('Error, Please try again...');
          $('#reader_data-loader').hide();
     });
    });	
});
