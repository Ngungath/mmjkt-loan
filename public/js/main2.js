    $(document).ready(function(){
      $("#approve_reason").hide();
      var loan_payment = $("#loan_monthly_payment").val();
      var max_deduction = $("#max_deduction").val();
      var diff_in_doe = $("#diff_in_doe").val();
      var diff_in_rod = $("#diff_in_rod").val();
      var payment_period = $("#repayment_period").val();
      var err_approve = "";
      $("#loan_status").change(function(){
        var loan_status = $("#loan_status").val();
        if (loan_status == "Approved") {
          if (loan_payment > max_deduction && diff_in_doe < 3) {
              swal({
              title: 'Are you sure?',
              text: "Borrower didn't qualify for loan!",
              type: 'warning',
              showCancelButton: true,
              cancelButtonColor: '#d33',
              confirmButtonColor: '#3085d6',
              confirmButtonText: 'Yes, Aprove it anyway!'
          }).then(function () {

          $("#approve_reason").show();

          $('#loan_approve_btn').click(function(e){
         // e.preventDefault();
          if($.trim($('#approve_reason_input').val()).length == 0){
             err_approve ="Please fill the approval reason";
             $('#error_reason').text(err_approve);
            // alert($('#approve_reason_input').val());

            }else{
              err_approve ="";
              $('#error_reason').text(err_approve);
              
             
            }

            if (err_approve !='') {
              return false;
            }else{
               $("#approve_form").submit();
               $('#approve_reason_input').val() = "";
            }

          
               
        });   

          }).catch(swal.noop);
          }else{

          $('#loan_approve_btn').click(function(e){  
            $("#approve_form").submit();
           }); 


          }

        }else{

          swal({
              title: 'Are you sure?',
              text: "You want to decline a loan!",
              type: 'warning',
              showCancelButton: true,
              cancelButtonColor: '#d33',
              confirmButtonColor: '#3085d6',
              confirmButtonText: 'Yes, Decline it anyway!'
          }).then(function () {
          
           $('#loan_approve_btn').click(function(e){  
            $("#approve_form").submit();
           }); 
        });
        }
      });
     
    
    
        
    });

  


    $(".btn-submit").click(function(e){
       alert('danny');
  

        e.preventDefault();

   

        var name = $("input[name=name]").val();

        var password = $("input[name=password]").val();

        var email = $("input[name=email]").val();

   
        
        $.ajax({

           type:'POST',

           url:'/mmjkt1/public/ajaxRequest',

           data:{name:name, password:password, email:email},

           success:function(data){

              alert(data.success);

           }

        });

  

	});
//load_lender_table();
function load_lender_table(){
alert("Are you sure danny");

}
    