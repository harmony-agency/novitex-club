$(document).ready(function () {

  
    $("#adminLogin").validate({
      // initialize the plugin
      focusInvalid: false,
      rules: {
        username: {
          required: true,
        },
        password: {
          required: true,
        },
      },
      messages: {
        username: {
          required: "لطفا  نام کاربری خود را وارد کنید",
  
        },
        password: {
          required: "لطفا رمز عبور خود را وارد کنید",
        },
  
      },
      submitHandler: function () {
        form_login();
      },
    });


    $("#addCode").validate({
      // initialize the plugin
      focusInvalid: false,
      rules: {
        code: {
          required: true,
        },
        score: {
          required: true,
        },
      },
      messages: {
        code: {
          required: "لطفا  کد معرف  را وارد کنید",
  
        },
        score: {
          required: "لطفا امتیاز را وارد کنید",
        },
  
      },
      submitHandler: function () {
        form_add_code();
      },
    });

    $("#editCode").validate({
      // initialize the plugin
      focusInvalid: false,
      rules: {
        code: {
          required: true,
        },
        score: {
          required: true,
        },
      },
      messages: {
        code: {
          required: "لطفا  کد معرف  را وارد کنید",
  
        },
        score: {
          required: "لطفا امتیاز را وارد کنید",
        },
  
      },
      submitHandler: function () {
        form_edit_code();
      },
    });

  
  });

  function form_login() {
    var formDataLogin = {
      username: $("#adminLogin #username").val(),
      password: $("#adminLogin #password").val(),
    };
    $.ajax({
      type: "POST",
      url: "http://club.local/admin/login",
      data: formDataLogin,
      dataType: "json",
      encode: true,
    }).done(function (data) {
  
      if (data['status'] == 'success'){
        window.location.href = 'dashboard';
          $(".admin-login").html('<div class="alert alert-success">ورود  با موفقیت انجام شد</div>');
      }else{
        console.log(data);
        $(".admin-login").html('<div class="alert alert-danger">'+ data['message'] + '</div>');
      }
    });
  }

  function form_add_code() {
    var formDataCode = {
      code: $("#addCode #code").val(),
      score: $("#addCode #score").val(),
      expired: $("#addCode #expired").val(),

    };
    $.ajax({
      type: "POST",
      url: "http://club.local//admin/code/create",
      data: formDataCode,
      dataType: "json",
      encode: true,
    }).done(function (data) {
  
      if (data['status'] == 'success'){
        window.location.href = '/club/admin/codes';
      }else{
        console.log(data);
        $(".result-code").html('<div class="alert alert-danger">'+ data['message']['code'] + '</div>');
      }
    });
  }

