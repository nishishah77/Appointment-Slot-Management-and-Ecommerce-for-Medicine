
function changePassword()
{

    var old_pass ="";
    var new_pass="";
    var new_cpass="";


    old_pass = $("#old_pass").val();
    new_pass = $("#new_pass").val();
    new_cpass = $("#new_cpass").val();
    var fd = new FormData();

    if(new_pass==new_cpass && (new_cpass!="" && new_pass!=""))
    {

fd.append('old_pass', old_pass);
fd.append('new_pass', new_pass);
fd.append('new_cpass', new_cpass);
      
      $.ajax({
    url: 'http://localhost:8080/hugsanddrugs/admin/ChangePassword/new_password',
    type: 'POST',
    processData: false,
    contentType: false,
    data: fd,
    success: function (data) {
    	if(data=="success!")
    	{
    		
        swal({ 
              title: "Admin!", 
              text: "Password Changed Successfully!", 
              type: "success" }, 
              function(){ location.reload(); 
              });

    	}

    	else
    	{

    	
    	  swal({ 
              title: "Cancelled!", 
              text: "Somthing went wrong", 
              type: "error" }, 
              function(){ location.reload(); 
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


 }else
 {
 	                     swal({ 
              title: "Cancelled!", 
              text: "Somthing went wrong", 
              type: "error" }, 
              function(){ location.reload(); 
              });


 }

}