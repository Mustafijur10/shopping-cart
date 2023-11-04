$(function () {
  var $registerForm = $("#login");

  if ($registerForm.length) {
    $registerForm.validate({
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
          required: "Enter your first name",
        },

        password: {
          required: "Please enter password",
        },
      },
    });
  }
});

$(function () {
  $("#login_btn").click(function () {
    var username = $("#username").val();
    var password = $("#password").val();

    $.post("login.php", {
      username: username,
      password: password,
    }).done(function (data) {
      if (data == "failed") {
        $("#login_message").text("Invalid username or password! ");
      } else {
        alert("invalid username or password");
      }
    });
  });
});
