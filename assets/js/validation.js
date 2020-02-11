$(function(){
    $("#SignUp_Form").validate({
        rules: {
            fullname: {
              required: true,
              minlength: 6,
            },
            username: {
              required: true,
              minlength: 3,
            },
            email: {
              required: true,
              email: true,
            },
            password: {
              required: true,
              minlength: 5,
            }
          },

          messages: {
            fullname: {
              required: "fullname is field",
              minlength: "Your fullname must be at least 6 characters long",
            },
            username: {
              required: "username is field",
              minlength: "Your username must be at least 3 characters long",
            },
            email: {
              required: "First Name is a required field",
              email: "Please enter a valid email address",
            },
            password: {
              required: "password is field",
              minlength: "Your password must be at least 5 characters long",
            },
          },
        submitHandler: function(form) {
          form.submit();
        }
       });

       $("#SignIn_Form").validate({
        rules: {
            fullname: {
              required: true,

            },
            username: {
              required: true,

            },
            email: {
              required: true,
              email: true,
            },
            password: {
              required: true,
              minlength: 5,
            }
          },

          messages: {
            fullname: {
              required: "fullname is field",

            },
            username: {
              required: "username is field",
              minlength: "Your password must be at least 3 characters long",
            },
            email: {
              required: "First Name is a required field",
              email: "Please enter a valid email address",
            },
            password: {
              required: "password is field"
            },
          },
        submitHandler: function(form) {
          form.submit();
        }
       });
});
