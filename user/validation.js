$(function () {
  var $registerForm = $("#registration");
  $.validator.addMethod(
    "noSpace",
    function (value, element) {
      return value == "" || value.trim().length != 0;
    },
    "Spaces are not allowed"
  );

  $.validator.addMethod(
    "checkallowedchars",
    function (value) {
      var pattern = new RegExp("[A-Za-z]+", "g");
      return /^[A-Z]+$/i.test(value);
    },
    "The field contains non-admitted characters"
  );

  if ($registerForm.length) {
    $registerForm.validate({
      rules: {
        fname: {
          required: true,
          checkallowedchars: true,
        },
        lname: {
          required: true,
          checkallowedchars: true,
        },
        username: {
          required: true,
        },
        uemail: {
          required: true,
          email: true,
        },
        password: {
          required: true,
          noSpace: true,
        },
        cpassword: {
          required: true,
          noSpace: true,
          equalTo: "#password",
        },
      },
      messages: {
        fname: {
          required: "Enter your first name",
        },
        lname: {
          required: "Enter your last name",
        },
        username: {
          required: "Enter your user name",
        },
        uemail: {
          required: "Enter your email",
          email: "Enter your valid email",
        },
        password: {
          required: "Please enter password",
        },
        cpassword: {
          required: "Please enter confirm password",
          equalTo: "Please enter the same password",
        },
      },
    });
  }
});
