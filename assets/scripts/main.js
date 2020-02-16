"use strict";

$(document).ready(function () {
  var Privileges = jQuery('#privileges');
  var select = this.value;
  Privileges.change(function () {
    if ($(this).val() == 'custom') {
      $('.resources').show();
    } else $('.resources').hide(); // hide div if value is not "custom"

  });
  $('#option1').change(function () {
    if ($(this).val() == 'komunitas_lain') {
      $('.other-1').removeClass('d-none');
    } else {
      $('.other-1').addClass('d-none');
    }
  });
  $('#option2').change(function () {
    if ($(this).val() == 'komunitas_lain2') {
      $('.other-2').removeClass('d-none');
    } else {
      $('.other-2').addClass('d-none');
    }
  });
  $('#option3').change(function () {
    if ($(this).val() == 'komunitas_lain3') {
      $('.other-3').removeClass('d-none');
    } else {
      $('.other-3').addClass('d-none');
    }
  });
  $('#option4').change(function () {
    if ($(this).val() == 'komunitas_lain4') {
      $('.other-4').removeClass('d-none');
    } else {
      $('.other-4').addClass('d-none');
    }
  });
  $('.multiple-items').slick({
    infinite: true,
    centerMode: true,
    slidesToShow: 2,
    slidesToScroll: 1,
    prevArrow: '<div class=\'prev\'><i class=\'fas fa-angle-left\'></i></div>',
    nextArrow: '<div class=\'next\'><i class=\'fas fa-angle-right\'></i></div>'
  });
  $('.dropdown-menu li a').click(function () {
    $(this).parents('.dropdown').find('.btn').html($(this).text() + ' <span class="caret"></span>');
    $(this).parents('.dropdown').find('.btn').val($(this).data('value'));
  });
  $('.slider-single').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    fade: true,
    asNavFor: '.slider-nav'
  });
  $('.slider-nav').slick({
    slidesToShow: 7,
    slidesToScroll: 1,
    asNavFor: '.slider-single',
    dots: false,
    focusOnSelect: true
  });
  $('.sponsor-slider').slick({
    slidesToShow: 5,
    slidesToScroll: 1,
    dots: false,
    prevArrow: '<div class="prev"><i class="fas fa-angle-left"></i></div>',
    nextArrow: '<div class="next"><i class="fas fa-angle-right"></i></div>',
    responsive: [{
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: true,
        dots: true
      }
    }, {
      breakpoint: 600,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }, {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    } // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
    ]
  });
  $('.toggle-password').click(function () {
    var input = $($(this).attr('toggle'));

    if (input.attr('type') == 'password') {
      input.attr('type', 'text');
    } else {
      input.attr('type', 'password');
    }
  });
  $('.custom-file-input').on('change', function () {
    var fileName = $(this).val().split('\\').pop();
    $(this).siblings('.custom-file-label').addClass('selected').html(fileName);
  });
  $('.category-menus li').click(function () {
    $(this).addClass('active').siblings().removeClass('active');
  });
  $('.content-menu li').click(function () {
    $(this).addClass('active').siblings().removeClass('active');
  });
  new WOW().init();
});
//# sourceMappingURL=main.js.map
