$(document).ready(function () {
  (function ($) {
    "use strict";

    jQuery.validator.addMethod(
      "answercheck",
      function (value, element) {
        return this.optional(element) || /^\bcat\b$/.test(value);
      },
      "type the correct answer -_-"
    );

    // validate contactForm form
    $(function () {
      $("#contactForm").validate({
        rules: {
          name: {
            required: true,
            minlength: 2,
          },
          subject: {
            required: true,
            minlength: 4,
          },
          number: {
            required: true,
            minlength: 5,
          },
          email: {
            required: true,
            email: true,
          },
          message: {
            required: true,
            minlength: 20,
          },
        },
        messages: {
          name: {
            required: "Please fill in this form",
            minlength: "your name must consist of at least 2 characters",
          },
          subject: {
            required: "Please fill in this form",
            minlength: "your subject must consist of at least 4 characters",
          },
          number: {
            required: "Please fill in this form",
            minlength: "your Number must consist of at least 5 characters",
          },
          email: {
            required: "Please fill in this form",
          },
          message: {
            required: "Please fill in this form",
            minlength: "Your Message shall be longer than 20words.",
          },
        },
        submitHandler: function (form) {
          $(form).ajaxSubmit({
            type: "POST",
            data: $(form).serialize(),
            url: "contact_process.php",
            success: function () {
              $("#contactForm :input").attr("disabled", "disabled");
              $("#contactForm").fadeTo("slow", 1, function () {
                $(this).find(":input").attr("disabled", "disabled");
                $(this).find("label").css("cursor", "default");
                $("#success").fadeIn();
                $(".modal").modal("hide");
                $("#success").modal("show");
              });
            },
            error: function () {
              $("#contactForm").fadeTo("slow", 1, function () {
                $("#error").fadeIn();
                $(".modal").modal("hide");
                $("#error").modal("show");
              });
            },
          });
        },
      });
    });
  })(jQuery);
});
