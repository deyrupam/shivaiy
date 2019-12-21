
$(document).ready(function(){
    $("#myform").validate({
    rules :{
        "fname"      : { required : true },
        "lname"      : { required : true },
        "number"     : { required : true,
                         digits   : true },
        "email"      : { required : true,
                         email    : true },
        "password"   : { required : true },
        "cpassword"  : { required : true,
                         equalTo  : "#psd"},
        "address"    : { required : true },
        "country_id" : { required : true },
        "state_id"   : { required : true },
    },
    messages :{
        "fname"      : {  required : 'Please enter your first name'       },
        "lname"      : {  required : 'Please enter your last name'        },
        "number"     : {  required : 'Please enter only digits '          },
        "email"      : {  required : 'Please enter your email'            },
        "password"   : {  required : 'Please enter your password'         },
        "cpassword"  : {  required : 'Please enter your confirm password' },
        "address"    : {  required : 'Please enter your address'          },
        "country_id" : {  required : 'Please select your country'         },
        "state_id"   : {  required : 'Please select your state'           },
    }
    });
});


$(document).ready(function()
{ 
   
   var country_id = $('#country_id').attr('oldcountry');
   var state_id   = $('#state_id').attr('oldstate');
   getstates(country_id,state_id);
     
   $('#country_id').change(function(){
      getstates($('#country_id').val(),'');
   });

  function getstates(country_id,state_id)
  {  
      var csrf= $('#token').val(); 
      $.ajax(
      { 
        type : 'POST',
        url  : '/getstates',
        data : {"_token": ""+csrf+"",country_id:country_id},  
        success: function(response) 
        {  
           $('#state_id').empty();
           $('#state_id').append("<option disabled selected value=''>Select State</option>");
           $.each(response, function( index, value ) 
           { if(state_id == value.id)
              {
                $('#state_id').append('<option value='+value.id+' selected>'+value.name+'</option>');
              }
              else
              {     
                $('#state_id').append('<option value='+value.id+'>'+value.name+'</option>');
              }
           });
        }
      });  
  }
});
