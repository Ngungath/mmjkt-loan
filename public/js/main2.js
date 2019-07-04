 
    $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

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
    