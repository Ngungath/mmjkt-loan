 
  $(document).ready(function(){

   $('#btn_personal_detail').click(function(){
        
       //var loan_number_error ="";
        var fname_error ="";
        var lname_error ="";
      //first name validation
        if ($.trim($('#fname').val()).length == 0) {
        	fname_error = "First name is required";
            $('#fname_error').text(fname_error);
        	$('#fname').addClass('has-error');

        }else{
            fname_error = "";
        	$('#fname_error').text(fname_error);
        	$('#fname').removeClass('has-error');

        }
          //last name validation
        if ($.trim($('#lname').val()).length == 0) {
        	lname_error = "Last name is required";
        	 $('#lname_error').text(lname_error);
        	$('#lname').addClass('has-error');

        }else{
           last_name="";
        	$('#lname_error').text(lname_error);
        	$('#lname').removeClass('has-error');

        }
        if (fname_error != '' || lname_error !='') {
        	return false;
        }else{
        	//alert('Successfully');
        	//$('#borrower_personal_detail').removeClass('active');
        	$('#borrower_personal_detail').removeAttr('href data-toggle');
        	$('#borrower_personal_detail_tab').removeClass('active');
        	$('#tab_1').removeClass('active');
        	$('#borrower_personal_detail').addClass('inactive_tab1');
        	$('#employement_detail').removeClass('inactive_tab1');
        	$('#employement_detail').addClass('active');
        	$('#employement_detail').attr('href','#tab_2');
        	$('#employement_detail').attr('data-toggle','tab');
        	$('#employment_detail_tab').addClass('active');
        	$('#tab_2').addClass('active in');


        }
     });

      $('#previous_btn_borrower_details').click(function(){
      	$('#borrower_personal_detail').addClass('active');
      	$('#borrower_personal_detail').attr('href','#tab_1');
      	$('#borrower_personal_detail').attr('data-toggle','tab');
        $('#borrower_personal_detail_tab').addClass('active');
        $('#borrower_personal_detail').removeClass('inactive_tab1');
        $('#tab_1').addClass('active in');
        $('#employement_detail').addClass('inactive_tab1');
        $('#employement_detail').removeClass('active');
        $('#employement_detail').removeAttr('href data-toggle');
        $('#employment_detail_tab').removeClass('active');
        $('#tab_2').removeClass('active in');

        	
        });

      $('#btn_employment_details').click(function(){
        var barack_number_error = "";
        var rank_error = "";

        if ($.trim($('#rank').val()).length == 0) {
        	rank_error = "Rank is required";
        	$('#rank_error').text(rank_error);
        	$('#rank').addClass('has-error');
        }else{
        	rank_error = "";
        	$('#rank_error').text(rank_error);
        	$('#rank').removeClass('has-error');

        }

        if (rank_error !='' ) {
        	return false ;
        }else{
              
             $('#btn_employment_details').attr("disabled", "disabled");
   			 $(document).css('cursor', 'prgress');
             $("#register_form").submit();
        }

   
      });



      //For lender tabs

     jQuery('#ajaxSubmit').click(function(e){
               e.preventDefault();
               $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
               //var url = "http://localhost:8080/mmjkt1/public/lender/store";
     jQuery.ajax({
       url:"http://localhost:8080/mmjkt1/public/lender/store",
       method: 'post',
       data: {
        name: jQuery('#name').val(),
                    
         },
         success: function(result){
         toastr.success(result.success);

      }});

       
      });


 //Update Borrower information
 $('#btn_update_personal_detail').click(function(){
  alert('update');
        
       //var loan_number_error ="";
        var fname_error ="";
        var lname_error ="";
      //first name validation
        if ($.trim($('#fname').val()).length == 0) {
          fname_error = "First name is required";
            $('#fname_error').text(fname_error);
          $('#fname').addClass('has-error');

        }else{
            fname_error = "";
          $('#fname_error').text(fname_error);
          $('#fname').removeClass('has-error');

        }
          //last name validation
        if ($.trim($('#lname').val()).length == 0) {
          lname_error = "Last name is required";
           $('#lname_error').text(lname_error);
          $('#lname').addClass('has-error');

        }else{
           last_name="";
          $('#lname_error').text(lname_error);
          $('#lname').removeClass('has-error');

        }
        if (fname_error != '' || lname_error !='') {
          return false;
        }else{
          //alert('Successfully');
          //$('#borrower_personal_detail').removeClass('active');
          $('#borrower_personal_detail').removeAttr('href data-toggle');
          $('#borrower_personal_detail_tab').removeClass('active');
          $('#tab_1').removeClass('active');
          $('#borrower_personal_detail').addClass('inactive_tab1');
          $('#employement_detail').removeClass('inactive_tab1');
          $('#employement_detail').addClass('active');
          $('#employement_detail').attr('href','#tab_2');
          $('#employement_detail').attr('data-toggle','tab');
          $('#employment_detail_tab').addClass('active');
          $('#tab_2').addClass('active in');


        }
     });

      $('#previous_btn_update_borrower_details').click(function(){
        $('#borrower_personal_detail').addClass('active');
        $('#borrower_personal_detail').attr('href','#tab_1');
        $('#borrower_personal_detail').attr('data-toggle','tab');
        $('#borrower_personal_detail_tab').addClass('active');
        $('#borrower_personal_detail').removeClass('inactive_tab1');
        $('#tab_1').addClass('active in');
        $('#employement_detail').addClass('inactive_tab1');
        $('#employement_detail').removeClass('active');
        $('#employement_detail').removeAttr('href data-toggle');
        $('#employment_detail_tab').removeClass('active');
        $('#tab_2').removeClass('active in');

          
        });

      $('#btn_update_employment_details').click(function(){
        var barack_number_error = "";
        var rank_error = "";

        if ($.trim($('#rank').val()).length == 0) {
          rank_error = "Rank is required";
          $('#rank_error').text(rank_error);
          $('#rank').addClass('has-error');
        }else{
          rank_error = "";
          $('#rank_error').text(rank_error);
          $('#rank').removeClass('has-error');

        }

        if (rank_error !='' ) {
          return false ;
        }else{
              
             $('#btn_update_employment_details').attr("disabled", "disabled");
         $(document).css('cursor', 'prgress');
             $("#borrower_update_form").submit();
        }

   
      });



 
      
    });

 function deleteData(id){
       var lnder_id = id;
        var csrf_token = $('meta[name="_token"]').attr('content');
         swal({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              type: 'warning',
              showCancelButton: true,
              cancelButtonColor: '#d33',
              confirmButtonColor: '#3085d6',
              confirmButtonText: 'Yes, delete it!'
          }).then(function () {
        // alert(lnder_id +'deleted'); 
         $.ajax({
          url:"http://localhost:8080/mmjkt1/public/lender/destroy/"+lnder_id,
          type:'get',
          success:function(data){
                      swal({
                          title: 'Success!',
                          text: data.message,
                          type: 'success',
                          timer: '1500'
                      })
          }

         });    


            
          }).catch(swal.noop);

 }

 function delete_borrower(){
   swal({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              type: 'warning',
              showCancelButton: true,
              cancelButtonColor: '#d33',
              confirmButtonColor: '#3085d6',
              confirmButtonText: 'Yes, delete it!'
          }).then(function () {


          }).catch(swal.noop);

 }


