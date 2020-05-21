function login()
{

    var username ="";
    var password="";
    var rememberme="";

    username = $("#username").val();
    password = $("#password").val();
    rememberme = $("#rememberme").val();
    

    var fd = new FormData();
    fd.append('username', username);
    fd.append('password', password);
    fd.append('rememberme', rememberme);

      
      $.ajax({
    url: 'http://localhost:8080/hugsanddrugs/admin/Login/login_insert',
    type: 'POST',
    processData: false,
    contentType: false,
    data: fd,
    success: function (data) {
    	if(data=="Invalid!")
    	{
    		
              swal({ 
              title: "Login", 
              text: "Fail", 
              type: "error" }, 
              function(){ location.reload(); 
              });
    	}
      else
      {
        window.location.replace("http://localhost:8080/hugsanddrugs/admin/dashboard");
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