$(document).ready(function(){
     $(".form-validation").formwizard({
        disableUIStyles: true,
        validationEnabled: true,
        inDuration: 150,
        outDuration: 150,
        
        validationOptions: {
            ignore: 'input[type=hidden], .select2-search__field', // ignore hidden fields
            errorClass: 'errClass',
            successClass: 'validation-valid-label',
            highlight: function(element, errorClass) {
                $(element).removeClass(errorClass);
            },
            unhighlight: function(element, errorClass) {
                $(element).removeClass(errorClass); 
            },

            // Different components require proper error label placement
            errorPlacement: function(error, element) {

                // Styled checkboxes, radios, bootstrap switch
                if (element.parents('div').hasClass("checker") || element.parents('div').hasClass("choice") || element.parent().hasClass('bootstrap-switch-container') ) {
                    if(element.parents('label').hasClass('checkbox-inline') || element.parents('label').hasClass('radio-inline')) {
                        error.appendTo( element.parent().parent().parent().parent() );
                    }
                     else {
                        error.appendTo( element.parent().parent().parent().parent().parent() );
                    }
                }

                // Unstyled checkboxes, radios
                else if (element.parents('div').hasClass('checkbox') || element.parents('div').hasClass('radio')) {
                    error.appendTo( element.parent().parent().parent() );
                }

                // Input with icons and Select2
                else if (element.parents('div').hasClass('has-feedback') || element.hasClass('select2-hidden-accessible')) {
                    error.appendTo( element.parent() );
                }

                // Inline checkboxes, radios
                else if (element.parents('label').hasClass('checkbox-inline') || element.parents('label').hasClass('radio-inline')) {
                    error.appendTo( element.parent().parent() );
                }

                // Input group, styled file input
                else if (element.parent().hasClass('uploader') || element.parents().hasClass('input-group')) {
                    error.appendTo( element.parent().parent() );
                }

                else {
                    //error.insertAfter(element);
                    element.addClass("errClass");
                }
            },
            rules: {
                email: {
                    require: true
                }
            },
            
        },

    });

      $(".form-validation").on("step_shown", function(event, data) {
        $.uniform.update();
    });

});

function getEmail()
{

    
        var email = $("#email").val();

        var fd = new FormData();
        
        fd.append('email', email);
    

$.ajax({
    url: 'http://localhost:8080/hugsanddrugs/admin/ResetPassword/forgot',
    type: 'POST',
    processData: false,
    contentType: false,
    data: fd,
    success: function (data) {
        
        if(data=="matched!")
        {
          window.location.replace('http://localhost:8080/hugsanddrugs/admin/ResetPassword/nPass');

        }
        else
        {
          swal({ 
              title: "Email Id", 
              text: "Not Matched", 
              type: "error" }, 
              function(){ window.location.replace('http://localhost:8080/hugsanddrugs/admin/ResetPassword/reset'); 
              });
        }


    },
    error: function () {
                     swal({ 
              title: "Cancelled!", 
              text: "Somthing went wrong", 
              type: "error" }, 
              function(){ location.reload(); 
              });

    }
});

    

    
}

function reset_password()
{
    var password = $("#password").val();
    var cpassword = $("#cpassword").val();
      var fd = new FormData();
        
        fd.append('password', password);
        fd.append('cpassword', cpassword);
    

$.ajax({
    url: 'http://localhost:8080/hugsanddrugs/admin/ResetPassword/newPassword',
    type: 'POST',
    processData: false,
    contentType: false,
    data: fd,
    success: function (data) {
        
        if(data=="changed!")
        {
         
               swal({ 
              title: "Password", 
              text: "Changed Successfully!", 
              type: "success" }, 
              function(){ window.location.replace('http://localhost:8080/hugsanddrugs/admin/login/'); 
              });
  
         

        }
        else
        {
          swal({ 
              title: "Password", 
              text: "Not changed!", 
              type: "error" }, 
              function(){ window.location.replace('http://localhost:8080/hugsanddrugs/admin/ResetPassword/reset'); 
              });

        }


    },
    error: function () {
                     swal({ 
              title: "Cancelled!", 
              text: "Somthing went wrong", 
              type: "error" }, 
              function(){ location.reload(); 
              });

    }
});


}