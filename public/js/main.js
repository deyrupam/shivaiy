$(function() {
    productShow();
    navIcon();
    productImgHgt();
    moveStack();
    changePhoneAddr();
    validatePhone();
});

$(window).resize(function() {
    productImgHgt();
    moveStack();
});

function navIcon() {
    $('#nav-icon').click(function() {
        $(this).toggleClass('open');
        if ($(this).hasClass('open')) {
            $('#mainnav').addClass('open');
            $('#navtop').addClass('open')
            $("<div class='navoverlap'></div>").insertAfter("#navtop");
        } else {
            $('#mainnav').removeClass('open');
            $(".navoverlap").fadeOut(function() {
                $(this).remove();
            });
        }
    });
}

function productImgHgt() {
    if ($('.products').length > 0)
        $('.products .product-box .img').css('height', $('.products .pro-sel').width());

    if ($('#productimg').length > 0)
        $('#productimg .magnify').css('height', $('#productimg .carousel-inner').width());
}

function productShow() {
    $('#select-pro li a').click(function(e) {
        e.preventDefault();
        $('#select-pro li a').removeClass('active');
        var data = $(this).data('product');
        $(this).addClass('active');
        $('#products-here .pro-sel').fadeOut();
        if (data != "all") {
            $('#products-here .pro-sel[data-product="' + data + '"]').fadeIn();
        } else {
            $('#products-here .pro-sel').fadeIn();
        }
    });
    if (window.location.hash) {
        var filter = window.location.hash;
        $(filter).trigger('click');
        window.location.replace("#");
        if (typeof window.history.replaceState == 'function') {
            history.replaceState({}, '', window.location.href.slice(0, -1));
        }
        productImgHgt();
    } else {
        $('#all').trigger('click');
    }
    $('.loader').remove();
}

function moveStack() {
    if ($('#product-to-move').length > 0) {
        if (window.innerWidth < 768) {
            $($('#product-to-move').detach()).insertAfter('#product-place');
        } else {
            $($('#product-to-move').detach()).insertAfter('#product-desk-after');
        }
    }
}

function changePhoneAddr() {
    $('.radio input[type="radio"]').click(function() {
        var tel = $(this).data('tel');
        var addr = $(this).data('addr');
        $('#tel').text(tel);
        $('#addr').text(addr);
    });

    $('.radio .radio-box').click(function() {
        if ($('#unfinished').is(':checked')) {
            $('#sm2').hide();
            $('#sm1').show();
        }
        if ($('#finished').is(':checked')) {
            $('#sm1').hide();
            $('#sm2').show();
        }
    });
}

function ValidateEmail(mail) {
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail))
        return true;
    return false;
}


$('#contact_form').on("submit", function(e) {
    e.preventDefault();
    $(".req").each(function() {
        if ($.trim($(this).val()) == '') {
            $(this).addClass('error');
        }
    });
});
$('.req').keyup(function() {
    $.trim($(this).val()) == '' ? $(this).addClass('error') : $(this).removeClass('error');
});

$('#email').keyup(function() {
    var sEmail = $('#email').val();
    if (!ValidateEmail(sEmail)) {
        $('#email').removeClass('green');
        $('#email').addClass('error');
    } else {
        $('#email').removeClass('error');
        $('#email').addClass('green');
    }
});


function validateNumber(event) {
    var key = window.event ? event.keyCode : event.which;
    if (event.keyCode === 8 || event.keyCode === 46) {
        return true;
    } else if (key < 48 || key > 57) {
        return false;
    } else {
        return true;
    }
};

function validatePhone() {
    $('.phone').keypress(validateNumber);
    var a = document.getElementById("phone1"),
        b = document.getElementById("phone2"),
        c = document.getElementById("phone3");

    a.onkeyup = function() {
        if (this.value.length === parseInt(this.attributes["maxlength"].value)) {
            b.focus();
        }
    }

    b.onkeyup = function() {
        if (this.value.length === parseInt(this.attributes["maxlength"].value)) {
            c.focus();
        }
    }
}