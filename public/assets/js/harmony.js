$(document).ready(function () {


  $.validator.addMethod(
    "regex",
    function(value, element, regexp) {
      var re = new RegExp(regexp);
      return this.optional(element) || re.test(value);
    },
    "لطفا آیدی اینستاگرام معتبر وارد کنید"
  );

  $("#subscriber").validate({
    // initialize the plugin
    focusInvalid: false,
    rules: {
      mobile: {
        required: true,
        minlength: 11,
        maxlength: 11,
      },
      instagram: {
        required: true,
        regex: /[A-Za-z0-9]./g,
      },

    },
    messages: {
      name: {
        required: "لطفا نام خود را وارد کنید",
      },
      mobile: {
        required: "لطفا شماره همراه خود را وارد کنید",
        minlength: "شماره همراه وارد شده معتبر نیست",
        maxlength: "شماره همراه وارد شده معتبر نیست",
      },
      instagram: {
        required: "لطفا  آیدی اینستاگرام خود را وارد کنید",
      },
    },
    submitHandler: function () {
      form_register();
    },
  });

  $("#login").validate({
    // initialize the plugin
    focusInvalid: false,
    rules: {
      instagram: {
        required: true,
      },
      password: {
        required: true,
      },
    },
    messages: {
      instagram: {
      required: "لطفا  آیدی اینستاگرام خود را وارد کنید",
      },
      password: {
        required: "لطفا رمز عبور خود را وارد کنید",
      },

    },
    submitHandler: function () {
      form_login();
    },
  });
  
    $("#forgotPass").validate({
    // initialize the plugin
    focusInvalid: false,
    rules: {
      mobile: {
        required: true,
      },
      password: {
        required: true,
      },
      description: {
        required: true,
      },
    },
    messages: {
      mobile: {
        required: "لطفا شماره همراه خود را وارد کنید",

      },
      password: {
        required: "لطفا رمز عبور خود را وارد کنید",
      },
     description: {
        required: "لطفا توضیحات خود را وارد کنید",
      },
    },
    submitHandler: function () {
      form_forgotPass();
    },
  });
  
    $("#referralCode").validate({
    // initialize the plugin
    focusInvalid: false,
    rules: {
      referral_code: {
        required: true,
      },
      password: {
        required: true,
      },
    },
    messages: {
      referral_code: {
        required: "لطفا کد معرف خود را وارد کنید",

      },


    },
    submitHandler: function () {
      form_referralCode();
    },
  });

  $("#picStory").validate({
    // initialize the plugin
    focusInvalid: false,
    rules: {
      pic_story: {
        required: true,
      },
    },
    messages: {
      pic_story: {
        required: "لطفا  تصویر خود را انتخاب کنید",

      },


    },
    submitHandler: function () {
      form_picStory();
    },
  });
  $("#picPaint").validate({
    // initialize the plugin
    focusInvalid: false,
    rules: {
      pic_paint: {
        required: true,
      },
    },
    messages: {
      pic_paint: {
        required: "لطفا  تصویر خود را انتخاب کنید",

      },


    },
    submitHandler: function () {
      form_picPaint();
    },
  });
});

(function ($) {
  $.QueryString = (function (a) {
    if (a == "") return {};
    var b = {};
    for (var i = 0; i < a.length; ++i) {
      var p = a[i].split("=");
      if (p.length != 2) continue;
      b[p[0]] = decodeURIComponent(p[1].replace(/\+/g, " "));
    }
    return b;
  })(window.location.search.substr(1).split("&"));
})(jQuery);

var utm_source = jQuery.QueryString["utm_source"];
var utm_medium = jQuery.QueryString["utm_medium"];
var utm_campaign = jQuery.QueryString["utm_campaign"];
var utm_term = jQuery.QueryString["utm_term"];
var utm_content = jQuery.QueryString["utm_content"];
var code = jQuery.QueryString["code"];

if(code){
    $("#subscriber #referral_code").val(code);

}

if (location.search != "") {
  // query string exists
  sessionStorage.setItem("utm_source", utm_source);
  sessionStorage.setItem("utm_medium", utm_medium);
  sessionStorage.setItem("utm_campaign", utm_campaign);
  sessionStorage.setItem("utm_term", utm_term);
  sessionStorage.setItem("utm_content", utm_content);
    sessionStorage.setItem("code", code);

}

function form_register() {
  var formDataSubscriber = {
    name: $("#subscriber #name").val(),
    instagram: $("#subscriber #instagram").val(),
    mobile: persianToEnglish($("#subscriber #mobile").val()),
    referral_code: $("#subscriber #referral_code").val(),
    utm_source: sessionStorage.getItem("utm_source"),
    utm_medium: sessionStorage.getItem("utm_medium"),
    utm_campaign: sessionStorage.getItem("utm_campaign"),
    utm_term: sessionStorage.getItem("utm_term"),
    utm_content: sessionStorage.getItem("utm_content"),
    code: sessionStorage.getItem("code"),

     referrer: document.referrer,
  };
  $.ajax({
    type: "POST",
    url: "http://club.local/register",
    data: formDataSubscriber,
    dataType: "json",
    encode: true,
  }).done(function (data) {

    if (data['status'] == 'success'){
      window.dataLayer = window.dataLayer || [];
      window.dataLayer.push({ event: "Register" });
      $("#subscriber").hide();
        $(".result").html('<div class="alert alert-success">ثبت نام با موفقیت انجام شد</div>');
        setTimeout(function(){ 
          $("#pills-login-tab").click();
        }, 2000);

    }else{
           $(".result").html('<div class="alert alert-danger">'+data['message']+'</div>');

    }
     if (data['status_insta'] == 'failed'){

      $(".result").html('<div class="alert alert-danger">'+data['message']['instagram']+'</div>');
      }
  });
}

function form_login() {
  var formDataLogin = {
    instagram: $("#login #instagram").val(),
    password: persianToEnglish($("#login #password").val()),
  };
  $.ajax({
    type: "POST",
    url: "http://club.local/login",
    data: formDataLogin,
    dataType: "json",
    encode: true,
  }).done(function (data) {
     $(".result-login").show();
    if (data['status'] == 'success'){
      window.dataLayer = window.dataLayer || [];
      window.dataLayer.push({ event: "Login" });
      window.location.href = 'dashboard';
        $(".result-login").html('<div class="alert alert-success">ورود  با موفقیت انجام شد</div>');
    }else{
      console.log(data);
      $(".result-login").html('<div class="alert alert-danger">'+ data['message'] + '</div>');
    }
  });
}

function form_forgotPass() {
  var formDataFogot = {
    instagram: $("#forgotPass #instagram").val(),
    password: persianToEnglish($("#forgotPass #password").val()),
    description: $("#forgotPass #description").val(),

  };
  $.ajax({
    type: "POST",
    url: "http://club.local/forgotPassword",
    data: formDataFogot,
    dataType: "json",
    encode: true,
  }).done(function (data) {

    if (data['status'] == 'success'){
      $("form#forgotPass").hide();
         $(".result-login").show();
        $(".result-login").html('<div class="alert alert-success">تیکت شما با موفقیت ثبت شد.تا 48 ساعت آینده از طریق دایرکت به پیج اینستاگرام شما  اطلاع رسانی انجام خواهد شد</div>');
    }else{
      console.log(data);
      $(".result-login").html('<div class="alert alert-danger">'+ data['message'] + '</div>');
    }
  });
}

function form_referralCode() {
  var formDataReferral_code = {
    referral_code: $("#referralCode #referral_code").val(),

  };
  $.ajax({
    type: "POST",
    url: "http://club.local/referralCode",
    data: formDataReferral_code,
    dataType: "json",
    encode: true,
  }).done(function (data) {

    if (data['status'] == 'success'){
      $("form#referralCode").hide();
      $(".result-code").show();
      $("#score").html(data['score'] );
      $(".result-code").html('<div class="alert alert-success">تبریک!شما 2 امتیاز دریافت کردید</div>');
    }else{
      console.log(data);
      $(".result-code").html('<div class="alert alert-danger">'+ data['message'] + '</div>');
    }
  });
}


function form_picStory(){


  var formDatapicStory = new FormData($('#picStory')[0]);

  $.ajax({
    type: "POST",
    url: "http://club.local/storyUpload",
    data: formDatapicStory,
    processData: false,
    contentType: false,
  }).done(function (data) {

    if (data['status'] == 'success'){
      $(".result-pic-story").html('<div class="alert alert-success">'+ data['message'] + '</div>');
    }else{
      $(".result-pic-story").html('<div class="alert alert-danger">'+ data['message'] + '</div>');
    }
  });
}

function form_picPaint(){


  var formDatapicPaint = new FormData($('#picPaint')[0]);

  $.ajax({
    type: "POST",
    url: "http://club.local/paintUpload",
    data: formDatapicPaint,
    processData: false,
    contentType: false,
  }).done(function (data) {

    if (data['status'] == 'success'){
      $(".result-pic-paint").html('<div class="alert alert-success">'+ data['message'] + '</div>');
    }else{
      $(".result-pic-paint").html('<div class="alert alert-danger">'+ data['message'] + '</div>');
    }
  });
}
$("#subscriber #mobile").keyup(function (e) {
  $("#subscriber #mobile").val(persianToEnglish($(this).val()));
});

// convert Persian number to English number

var
persianNumbers = [/۰/g, /۱/g, /۲/g, /۳/g, /۴/g, /۵/g, /۶/g, /۷/g, /۸/g, /۹/g],
arabicNumbers  = [/٠/g, /١/g, /٢/g, /٣/g, /٤/g, /٥/g, /٦/g, /٧/g, /٨/g, /٩/g],
persianToEnglish = function (str)
{
  if(typeof str === 'string')
  {
    for(var i=0; i<10; i++)
    {
      str = str.replace(persianNumbers[i], i).replace(arabicNumbers[i], i);
    }
  }
  return str;
};

$('#motionModal').on('hidden.bs.modal',function(){
    $('.motionVideo video').trigger('pause');
    
})
$('#motionModal').on('show.bs.modal',function(){
    $('.motionVideo video').trigger('play');
    
})


// hover for copy right
$(".copyright a").hover(
  function () {
    let logo = $(".copyright .hover-company");
    logo.addClass("active");
  },
  function () {
    let logo = $(".copyright .hover-company");
    logo.removeClass("active");
  }
);

$( ".forgot-pass button" ).click(function() {
    
  $(".result-login").hide();

  let instagram = $("form#login #instagram").val();
  let password = $("form#login #password").val();

  $("form#forgotPass #instagram").val(instagram)
  $("form#login #password").val(password)

  $("form#login").hide();
  $("form#forgotPass").fadeIn();
});

$( "form#forgotPass #returnLogin" ).click(function() {

  $("form#forgotPass").hide();
  $("form#login").fadeIn();
});

$( "#pills-login-tab" ).click(function() {
  $(".result-login").hide();
  $("form#forgotPass").hide();
  $("form#login").fadeIn();
});

$(".btn-register" ).click(function() {
    $("#pills-register-tab").click();
});
$(".secondBtn" ).click(function() {
    $("#pills-login-tab").click();
});