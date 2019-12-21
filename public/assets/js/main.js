$(document).ready(function(){


$('#add_category').click(function(e){
e.preventdefault();

console.log("jsd");
$.ajax({
           type: "POST",
           url: url,
           data: form.serialize(), // serializes the form's elements.
           success: function(data)
           {
               alert(data); // show response from the php script.
           }
         });

});

});