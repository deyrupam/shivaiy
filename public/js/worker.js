function readURL(input)
{
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) 
    {
        
        var file_id  = $('#attribute').attr('file_id'); 
        var src_id   = $('#attribute').attr('src_id'); 
        var fileName = $('#'+file_id).val();
        var file_extension = fileName.split('.').pop(); 
        if (file_extension=="jpg" || file_extension=="jpeg" || file_extension=="png" || file_extension=="gif")
        {
            $('#'+src_id).show();
            $('#'+src_id).attr('src', e.target.result);
        }else{
          alert("It is a invalid extension. Only jpg, gif, png, jpeg are allowed.");
          $('#'+src_id).hide();
        }
     }
     reader.readAsDataURL(input.files[0]);
   }
}

$(".changeval").change(function() {
    readURL(this);
});

$('.btnadd').click(function()
{
    $('#attribute').attr('file_id','addimgInp');
    $('#attribute').attr('src_id','addimg');
  
});

$('#addbtn').click(function()
{
    if($('#name').val().length < 1){
      $('.name').show();
      return false;
    }else{
      $('.name').hide();
    }
    if($('#address').val().length < 1){
      $('.address').show();
      return false;
    }else{
      $('.address').hide();
    } 
    

    var abc = "check";
    alert(abc);
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    var form_data = new FormData($('#myform')[0]);
    $.ajax(
    { 
        type : 'POST',
        url  : '/addsalon',
        data: form_data,
        processData: false,
        contentType: false,
        success: function(response) 
        {    
          if(response == 'wrong')
          {
            $('.address').show();
            $('.address').text('Wrong Address');
          }
          if(response == 'success')
          {
            location.reload(true);
          }
        }
    }); 
});

 
$(document).on('click','#editbtn',function(){   
    $('#attribute').attr('file_id','editimgInp');
    $('#attribute').attr('src_id','editimg');
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    } });
     var id = $(this).attr('salon_id');
     var base_url = $('#base_url').attr('base_url');
     $('input[name="id"]').val(id);
     $.ajax(
     { 
        type : 'POST',
        url  : '/editsalon',
        data: {id:id},
        success: function(result) 
        {  
           $('#editname').val(result.name);
           $('#editaddress').val(result.address);
           $('#editimg').attr('src',""+base_url+"/uploads/"+result.imgpath);
        }
    }); 
});


$('#updatebtn').click(function(){

   var form_data = new FormData($('#editform')[0]);
   $.ajax(
   { 
        type : 'POST',
        url  : '/updatesalon',
        data: form_data,
        processData: false,
        contentType: false,
        success: function(updateresponse) 
        {  
            console.log(updateresponse);
            if(updateresponse == 'success')
            {
              location.reload(true);
            }
        }
    });
});

$(document).on('click','#delbtn',function(){   
    var id = $(this).attr('salon_id');
    $('#attribute').attr('delete_id',id);
});

$(document).on('click','#deletebtn',function(){   
    var id = $('#attribute').attr('delete_id');
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    } });
     $.ajax(
     { 
        type : 'POST',
        url  : '/deletesalon',
        data: {id:id},
        success: function(result) 
        {  
            console.log(result);
            if(result == 'success')
            {
              location.reload(true);
            }
        }
    }); 
});

$(document).on('click','#viewbtn',function(){   
    $('#attribute').attr('file_id','editimgInp');
    $('#attribute').attr('src_id','editimg');
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    } });
     var id = $(this).attr('salon_id');
     var base_url = $('#base_url').attr('base_url');
     $('input[name="id"]').val(id);
     $.ajax(
     { 
        type : 'POST',
        url  : '/editsalon',
        data: {id:id},
        success: function(result) 
        {  
           console.log(result);
           $('#viewname').val(result.name);
           $('#viewaddress').val(result.address);
           $('#viewimg').attr('src',""+base_url+"/uploads/"+result.imgpath);
        }
    }); 
});

// customer js code

$(document).on('click','#salonbtn',function(){  
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    } });
     var id = $(this).attr('salon_id');
     var base_url = $('#base_url').attr('base_url');
     $('input[name="id"]').val(id);
     $.ajax(
     { 
        type : 'POST',
        url  : '/viewsalon',
        data: {id:id},
        success: function(result) 
        {  
           console.log(result);
           $('#salon_name').text(result.salon_name);
           $('#owner_name').val(result.owner);
           $('#salon_email').val(result.email);
           $('#salon_contact').val(result.number);
           $('#salon_address').val(result.address);
           $('#salon_img').attr('src',""+base_url+"/uploads/"+result.imgpath);
           showCloseLocations(result.lat,result.lan);
        }
    }); 
});


function showCloseLocations(lat,lng){
var lat = lat;
var lng = lng;
var uluru = {
          lat : parseFloat( lat ),
          lng : parseFloat( lng )
      };
  // The map, centered at Uluru
  var map = new google.maps.Map(
  document.getElementById('map'), {zoom: 15, center: uluru});
  // The marker, positioned at Uluru
  var marker = new google.maps.Marker({position: uluru, map: map});


}






 //  $('#file_img').change(function() {
 //           var allowed = ["jpg", "jpeg", "png",'gif'];
 //           var filename=$('#file_img').val();
 //           var file_extension = filename.split('.').pop();  
 //           if(!(allowed.includes(file_extension)) ) {
 //              alert("It is a invalid extension. Only jpg, gif, png, jpeg are allowed.");
 //                return false;
 //           }
 // }); 