jQuery(document).ready(function() {
    var form_fields = ['product_name', 'product_short_desc', 'product_desc', 'product_weight', 'product_sku', 'product_stock', 'product_org_price', 'product_selling_price', 'category_id', 'addimgInp'];
    var csrf = jQuery('#token').val();


    function formvalidate(form_key) {
        var check_empty = '';
        jQuery.each(form_fields, function(index, value) {
            if ($('.' + form_key + '_' + value).val() == '') {
                $('.' + form_key + '_' + value).next('span').show();
                check_empty = 1;
            } else {
                $('.' + form_key + '_' + value).next('span').hide();
            }
            if ($('.' + form_key + '_' + 'category_id option:selected').val() != '' && $('.' + form_key + '_' + 'sub_category_id option:selected').val() == '') {
                $('.' + form_key + '_' + 'sub_category_id').next('span').show();
                check_empty = 1;
            } else {
                $('.' + form_key + '_' + 'sub_category_id').next('span').hide();
            }
        });

        return check_empty;

    }

    function get_product_detail(product_id, form_key) {
        jQuery.ajax({
            type: 'POST',
            url: '/getproductdetail',
            data: {
                "_token": "" + csrf + "",
                product_id: product_id,
                form_key: form_key
            },
            success: function(response) {
                var form_key = response.form_key;
                if (form_key == 'add') 
                {    
                   $('.product-list').append('<tr> <td scope="row">'+($('.product-list tr').length+1)+'</td><td><a href="javascript:void(0)" data-toggle="modal" data-target="#lightboxModal"><img src="http://127.0.0.1:8000/uploads/'+response.image+'" alt="Cinque Terre" width="50" height="50" style="border-radius: 50%;"></a></td><td>'+response.category+'</td><td>'+response.sub_category+'</td><td>'+response.product_name+'</td><td>'+response.product_short_desc+'</td><td>'+response.product_desc+'</td><td>'+response.product_weight+'</td><td>'+response.product_sku+'</td><td>'+response.product_org_price+'</td><td>'+response.product_selling_price+'</td><td>'+response.product_stock+'</td><td><a href="javascript:void(0)" form_key="edit" product_id="'+response.id+'" data-toggle="modal" id="editbtn" data-target="#EditModal"><i class="fas fa-edit" style="color:black;"></i></a> <a href="javascript:void(0)" data-toggle="modal" form_key="view" product_id="'+response.id+'" id="viewbtn" data-target="#ViewModal"><i class="fas fa-eye"></i></a> <a href="javascript:void(0)" product_id="'+response.id+'" data-toggle="modal" id="delbtn" data-target="#deletemodal"><i class="fa fa-trash" style="color:black;"></i></a> </td></tr>')
                     
                } else {
                    jQuery.each(response, function(index, value) {
                        if (index !== 'category_id' && index !== 'sub_category_id') {
                            $('.' + form_key + '_' + index).val(value);
                        }
                        if (index == 'category_id') {
                            $('.' + form_key + '_' + index + ' option[value="' + value + '"]').attr("selected", "selected");
                        }
                        if (index == 'sub_category') {
                            $('.' + form_key + '_' + 'sub_category_id').append("<option selected>" + value + "</option>");
                        }
                    });
                }
            }
        });

    }

    jQuery(document).on("change", ".cat-drop", function() {
        var category_id = jQuery(this).val();
        jQuery.ajax({
            type: 'POST',
            url: '/getsubcategory',
            data: {
                "_token": "" + csrf + "",
                category_id: category_id
            },
            success: function(response) {
                jQuery('.sub-cat-div').hide();
                if(response.length > 0)
                { 
                    jQuery('.sub-cat-div').show();
                    jQuery('.sub-cat-drop').empty();
                    jQuery('.sub-cat-drop').append("<option disabled selected value=''>Select Sub-Category</option>");
                    jQuery.each(response, function(index, value) {
                        jQuery('.sub-cat-drop').append('<option value=' + value.id + '>' + value.name + '</option>');
                    });
                }
            }
        });

    });

    jQuery(document).on("click", ".addpro", function() {

        if (!formvalidate($(this).attr('form_key'))) {
            var form_data = new FormData($('#addform')[0]);
            jQuery.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': csrf
                }
            });
            jQuery.ajax({
                type: 'POST',
                url: '/addproduct',
                processData: false,
                contentType: false,
                data: form_data,
                success: function(response) {
                    if (response.succ == 'success') {
                        jQuery(".clo-mod").click();
                        jQuery('select[name^="category_id"] option:selected').removeAttr('selected');
                        jQuery('input[type=number]').val("");
                        jQuery('input[type=text]').val("");
                        jQuery('.sub-cat-drop').hide();
                        jQuery("#addimgInp").val('');
                        get_product_detail(response.product_id,'add');
                        jQuery('.message').text('Successfully Added New Product !');
                        jQuery('.msgbox').show();
                        setTimeout(function() {
                            jQuery('.msgbox').hide();
                        }, 1000);

                    }
                }
            });

        }
    });

    jQuery(document).on("click", ".updatepro", function() {
        var form_data = new FormData($('#updateform')[0]);
        formvalidate(jQuery(this).attr("form_key"));
        console.log(form_data);

    });

    jQuery(document).on("click", "#viewbtn,#editbtn", function() {
        var product_id = jQuery(this).attr('product_id');
        var form_key = jQuery(this).attr('form_key');
        get_product_detail(product_id, form_key);


    });

    jQuery(document).on("click", "#delbtn", function() {

        if (confirm("Are you sure want to delete selected product !")) {
            var product_id = $(this).attr('product_id');
            jQuery.ajax({
                type: 'POST',
                url: '/delproduct',
                data: {
                    "_token": "" + csrf + "",
                    product_id: product_id
                },
                success: function(response) {
                    console.log(response);
                    jQuery('.msgbox').show().removeClass('alert-success').addClass('alert-warning');
                    jQuery('.message').text("Successfully deleted Selected Product !");
                    setTimeout(function() {
                            jQuery('.msgbox').hide();
                    }, 1000);
                }
            });
        }

    });
    

    jQuery(document).on('change','.action',function(){
      if(jQuery(this).val() == 'all'){
          jQuery('.hidd-div').show();
          jQuery('.act_check').prop('checked',true)
      }else{
        jQuery('.hidd-div').hide();
        jQuery('.act_check').prop('checked',false)
          
      } 

    });

});