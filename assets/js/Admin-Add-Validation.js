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
                name: {
                    name: true
                },
                mobile : {
                    required:true,
                    minlength:10,
                    maxlength:10,
                    number: true
                },
                password : {

                    minlength : 5
                },
                repassword : {
                    minlength : 5,
                    equalTo : "#password"
                },
                username :{
                    required:true,
                    
                }
            },
            
        },

    });

      $(".form-validation").on("step_shown", function(event, data) {
        $.uniform.update();
    });

});

function delaccount()
  { 
    var password = $("#password").val();
    var cpassword = $("#cpassword").val();
    var id = $("#id").val(); 
        if(password != '' && cpassword != '') {    
            if(password == cpassword){
                swal({
                    title: "Are you sure?",
                    text: "You will not be able to recover this Data!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#EF5350",
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel pls!",
                    closeOnConfirm: false,
                    closeOnCancel: true
                  },
              function(){
                
                    $.ajax({
                        url: "http://localhost:8080/hugsanddrugs/admin/Admin/Delete",
                        type: "post",
                        data: { 
                                id:id,
                                password:password
                              },
                        success:function(data){
                          if(data=="1")
                          {
                          swal({ 
                            title: "Deleted!", 
                            text: "Your Account has been deleted.", 
                            type: "success" }, 
                           function(){ window.location.replace("http://localhost:8080/hugsanddrugs/admin/Login/index"); 
                            });
                        }
                        else
                        {
                        swal('Cancelled', 'Invalid Password' , 'error');
                        }                       
                      },
                        error:function(){
                          swal('Cancelled', 'Invalid Password' , 'error');
                        }
                      });
                
                  
              });         

          }
            else
              {
                 swal('Cancelled', 'Password does not match' , 'error');;
              }         

          }
        else
              {
                 swal('Cancelled', 'Enter Your Password' , 'error');;
              }
}

 function insert()
  {
    $("#adminadd").submit(function(e){
    e.preventDefault();
 
    

    var username = "";
    username = $("#username").val();

    var adminname = "";
    adminname = $("#adminname").val(); 

    var password = "";
    password = $("#password").val(); 

    var email = "";
    email = $("#email").val();

    var imagefile="";
    imagefile = $('#adminimg')[0].files[0];

    var fd = new FormData();
    fd.append('adminimg', imagefile);
    fd.append('name', adminname);
    fd.append('username', username);
    fd.append('email', email);
    fd.append('password', password);

$.ajax({
    url: 'http://localhost:8080/hugsanddrugs/admin/Admin/Insert',
    type: 'POST',
    processData: false,
    contentType: false,
    data: fd,
    success: function () {
        swal({ 
              title: "Admin!", 
              text: "Your data has been Added.", 
              type: "success" }, 
              function(){ location.reload(); 
              });
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
});
  
  
}