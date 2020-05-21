function AddToCart(id,price){

    $.ajax({

      url:"http://localhost:8080/hugsanddrugs/client/home/check_session",
      type:"POST",
      data:{},
      success:function(data)
      {
        if(data=="session not started!")
        {
         
          $("#myModal").modal();
          


          $("#login").submit(function(e){

             
            var username = $("#username").val();
            var password = $("#password").val();

            //alert("asd");

        $.ajax({

                url:"http://localhost:8080/hugsanddrugs/client/home/login_check",
                type:"POST",
                data:{
                  username:username,
                  password:password
                },
                success:function(data)
                {                
                   if(data=="not login!")
                   {
                    //window.reload();
                  }
                else
                 {
                    var quantity= $("#total-items").val();
	

						if (!$.cookie('cartcookie')){
					 		$.cookie('cartcookie',id+"-"+quantity+"-"+price);
						} else {
					 		var foo = $.cookie('cartcookie');
					 		$.cookie('cartcookie',id+"-"+quantity+"-"+price+","+foo);
						}
	
	 			swal({ 
                      title: "Success!", 
                      text: "Medicine has been added yo your cart.", 
                      icon: "success" }).then(function() {
                      location.reload();
                      });
                 }
                },error:function(data)
                {
                  //alert("error");
                }

              });

          });

        }
        else
        {
              var quantity= $("#total-items").val();
	

	if (!$.cookie('cartcookie')){
 		$.cookie('cartcookie',id+"-"+quantity+"-"+price);
	} else {
 		var foo = $.cookie('cartcookie');
 		$.cookie('cartcookie',id+"-"+quantity+"-"+price+","+foo);
	}
	
	 			swal({ 
                      title: "Success!", 
                      text: "Medicine has been added yo your cart.", 
                      icon: "success" }).then(function() {
                      location.reload();
                      });        

        }
      }

    });



}
function UpdateCart(){
		var totalAmount = 0;
		if ($.cookie('cartcookie')){
			var foo ="";
			if ($.cookie('cartcookie')){
				foo =  $.cookie('cartcookie');
			}
			var cookie = foo.split(",");
			
			var qty1 = $('input[name="qty[]"]').map(function(){
       			return this.value
   			}).get();
   			alert(cookie);
   			var coo = "";
			for (i=0; i < cookie.length; i++) {
						var cookieData =  cookie[i].split("-");
						
						var id = cookieData[0];
						var qty = cookieData[1];
						var price = cookieData[2];
						coo+= id+"-"+ 	qty1[i]+"-"+price+",";
						totalAmount+= price*qty1;
						

			}
					//alert("total amt:"+totalAmount);
			 		$.cookie('cartcookie',coo);
			 		var show = $.cookie('totalAmount',totalAmount);
			 		console.log(show);
			 		window.location.reload();

		}
}
// function Proceed(total,name,email,mobile){
// 		var totalAmount = 0;
// 		if ($.cookie('cartcookie')){
// 			var foo ="";
// 			if ($.cookie('cartcookie')){
// 				foo =  $.cookie('cartcookie');
// 			}
// 			var cookie = foo.split(",");
			
// 			var qty1 = $('input[name="qty[]"]').map(function(){
//        			return this.value
//    			}).get();
//    			alert(cookie);
//    			var coo = "";
// 			for (i=0; i < cookie.length; i++) {
// 						var cookieData =  cookie[i].split("-");
						
// 						var id = cookieData[0];
// 						var qty = cookieData[1];
// 						var price = cookieData[2];
// 						coo+= id+"-"+ 	qty1[i]+"-"+price+",";
// 						totalAmount+= price*qty1;
						

// 			}
// 					//alert("total amt:"+totalAmount);
// 			 		$.cookie('cartcookie',coo);
// 			 		alert(t)
// 			 		var show = $.cookie('totalAmount',totalAmount);
// 			 		console.log(show);
// 			 		window.location.reload();

// 		}

// 		window.location.replace("http://localhost:8080/hugsanddrugs/paymentGateway/index.php?name="+name+"&email="+email+"&mobile="+mobile+"&amount="+totalAmount);
// }

function DeleteCart(id){

		if ($.cookie('cartcookie')){
			var foo ="";
			if ($.cookie('cartcookie')){
				foo =  $.cookie('cartcookie');
				$.removeCookie('cartcookie');
				window.location.reload();
			}
			// var cookie = foo.split(",");
			// var qty1 = $('input[name="qty[]"]').map(function(){
   //     			return this.value
   // 			}).get();
   // 			var coo = "";
			// for (i=0; i < cookie.length; i++) {
			// 			var cookieData =  cookie[i].split("-");
						
			// 			var id = cookieData[0];
			// 			var qty = cookieData[1];
			// 			var price = cookieData[2];
			// 			coo+= id+"-"+ 	qty1[i]+"-"+price+",";
						

			// }
			
			//  		$.cookie('cartcookie',coo);
			//  		window.location.reload();

		}
}



