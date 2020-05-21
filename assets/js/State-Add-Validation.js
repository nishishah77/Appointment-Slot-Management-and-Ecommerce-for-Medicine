$(document).ready(function(){

  getState();
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
                city_name: {
                    required: true,
                    minlength:3

                }
            },
            
        },

    });

      $(".form-validation").on("step_shown", function(event, data) {
        $.uniform.update();
    });

});

function insert()
  {
    var state_name = $("#state_name").val();
    var country_id = $("#country").find('option:selected').val();
     var isValid=0;

     var stateReg = /^[a-zA-Z]{3,15}$/;
      if(state_name=="")
      {
        $("#state_name").css("border-color","transparent transparent #D84315");
        $("#state_name").css("-webkit-box-shadow","none");
        $("#state_name").css("box-shadow","none");
        isValid+=1;
       

      }
      else if(!stateReg.test(state_name))
      {
        $("#state_name").css("border","1px solid red");
        isValid+=1;

      }
      else
      {
        $("#state_name").css("border","");

      }
      if(country_id=="")
      {
        $("#country").css("border-color","transparent transparent #D84315");
        $("#country").css("-webkit-box-shadow","none");
        $("#country").css("box-shadow","none");
        isValid+=1;

      }
      else
      {
        $("#country").css("border","");
      }
      if(isValid==0)
      {

      $.ajax({
          url: "http://localhost:8080/hugsanddrugs/admin/state/insert",
          type: "post",
          data: {
                state_name:state_name,
                country:country_id
                
          },
          success:function(){
            swal({ 
              title: "State!", 
              text: "Your data has been Added.", 
              type: "success" }, 
              function(){ location.reload(); 
              });
          },
          error:function(){
           
             swal({ 
              title: "Cancelled!", 
              text: "Somthing went wrong", 
              type: "error" }, 
              function(){ location.reload(); 
              });
          }
      });
}else{

             swal({ 
              title: "Cancelled!", 
              text: "Somthing went wrong", 
              type: "error"  
              });
}
}
function getState(){
    //alert(id.value);
    $.ajax({
        url:"http://localhost:8080/hugsanddrugs/admin/GetData/getState2",
        type:"POST",
        dataType: 'json',
        beforeSend : function(){

        },
        success:function(data){
             //alert(data);
            //var json_obj = data;
            //parse JSON
             //console.log(data.    );
             var state_record = "";
             if(data.success=="1"){
                 $.each(data.stateList, function  (key, val) {
                    state_record +="<tr>";
                        state_record +="<td>"+val.state_id+"</td>";
                        state_record +="<td>"+val.state_name+"</td>";
                        state_record +="<td>"+val.country_name+"</td>";
                     
                       
                        state_record +="<td><a href='edit?id="+val.state_id+"' class='btn btn-xs btn-success'><i class='icon-pencil5'></i></a><a href='javascript:void(0)' onclick='d("+val.state_id+")' class='btn btn-danger btn-xs'><i class='fa fa-trash'></i></a></td>";
                    state_record +="</tr>";  
                 });
                 $("#state_record").html(state_record);
             }else{
                
             }
                //var x = JSON.parse(data);          
              // var obj = JSON.parse(data);

             console.log(data);

        },
        error:function(){

        }
    }); 
}
function d(id)
  {
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
          url: "http://localhost:8080/hugsanddrugs/admin/State/Delete",
          type: "post",
          data: {id:id},
          success:function(){
            swal({ 
              title: "Deleted!", 
              text: "Your data has been deleted.", 
              type: "success" }, 
              function(){ location.reload(); 
              });
          },
          error:function(){
            swal('Cancelled', 'Your imaginary file is safe :)' , 'error');
          }
      });
      
    });
  }

  
 function update()
  {

    var state_name ="";
    var state_id="";
    var country_id="";
    
    
    state_id=$("#state_id").val();
    state_name = $("#state_name").val();
    country_id = $("#country").find("option:selected").val();


var fd = new FormData();

fd.append('state_id', state_id);
fd.append('state_name', state_name);
fd.append('country', country_id);


  var isValid=0;

     var stateReg = /^[a-zA-Z]{3,15}$/;
      if(state_name=="")
      {
        $("#state_name").css("border-color","transparent transparent #D84315");
        $("#state_name").css("-webkit-box-shadow","none");
        $("#state_name").css("box-shadow","none");
        isValid+=1;
       

      }
      else if(!stateReg.test(state_name))
      {
        $("#state_name").css("border","1px solid red");
        isValid+=1;

      }
      else
      {
        $("#state_name").css("border","");

      }
      if(country_id=="")
      {
        $("#country").css("border-color","transparent transparent #D84315");
        $("#country").css("-webkit-box-shadow","none");
        $("#country").css("box-shadow","none");
        isValid+=1;

      }
      else
      {
        $("#country").css("border","");
      }
      if(isValid==0)
      {
$.ajax({
    url: 'http://localhost:8080/hugsanddrugs/admin/State/update',
    type: 'POST',
    processData: false,
    contentType: false,
    data: fd,
    success: function (data) {
        swal({ 
              title: "State!", 
              text: "Your data has been Modified.", 
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

}else{
                swal({ 
              title: "Cancelled!", 
              text: "Somthing went wrong", 
              type: "error"  
              });  
}

}
