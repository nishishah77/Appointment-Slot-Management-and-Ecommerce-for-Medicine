function searchDoctor()
{
  
  var search = $("#search_doctor").val();
//alert(search);
  $.ajax({

        url:"http://localhost:8080/hugsanddrugs/client/Doctor/search",
        type:"POST",
        //dataType: 'json',
        data:{search:search},
        success:function(data){
          
          var doctors="";
         
          $.each(data.doctorList, function  (key, val) {

                doctors+="<div class='col-md-6 padding-bottom-60 clearfix'>";
                doctors+="<div class='doctors-img'>";
                doctors+="<img src='http://localhost:8080/hugsanddrugs/doctorimg/"+val.doctorimg+"' id='doctor_image' height='271' width='234' alt='' title=''>";
                doctors+="</div>";
                doctors+="<div class='doctors-detail'>";
                doctors+="<h4>"+ val.doctor_name +"<span> Doctor at "+ val.hospital_name +"</span></h4>";
                doctors+="<p><label class='heading'>Speciality</label><label class='detail'>"+ val.doctor_speciality +"</label></p>";
                doctors+="<p><label class='heading'>Degrees</label><label class='detail'>"+ val.qualification +"</label></p>";
                doctors+="<p><label class='heading'>Experience</label><label class='detail'>"+ val.experience +"</label></p>";
                doctors+="<p><label class='heading'>Time</label><label class='detail'>"+ val.visiting_hours +"</label></p>";
                doctors+="</div>";
                doctors+="</div>";
          });
          
          $("#doctordata").html(doctors);
        }

  });
}

function searchHospital()
{
  var search = $("#search_hospital").val();

  $.ajax({

        url:"http://localhost:8080/hugsanddrugs/client/Hospital/search",
        type:"POST",
        //dataType: 'json',
        data:{search:search},
        success:function(data){
         var hospital="";
          
         
          $.each(data.hospitalList, function  (key, val) {

                hospital+="<div class='col-md-6 padding-bottom-60 clearfix'>";
                hospital+="<div class='doctors-img'>";
                hospital+="<img src='http://localhost:8080/hugsanddrugs/hospitalimg/"+val.hospitalimg+"' id='doctor_image' height='271' width='234' alt='' title=''>";
                hospital+="</div>";
                hospital+="<div class='doctors-detail'>";
                hospital+="<h4><a href='http://localhost:8080:8080/hugsanddrugs/client/Hospital/ViewMore?hospital="+val.hospital_id+"'>"+ val.hospital_name +"</a></h4>";
                hospital+="<p><label class='heading'>Speciality</label><label class='detail'>"+ val.hospital_speciality +"</label></p>";
                hospital+="<p><label class='heading'>Address</label><label class='detail'>"+ val.address +"</label></p>";
                hospital+="<p><label class='heading'>City</label><label class='detail'>"+ val.city_name +"</label></p>";
                hospital+="<p><label class='heading'>State</label><label class='detail'>"+ val.state_name +"</label></p>";
                hospital+="<p><label class='heading'>Contact Number</label><label class='detail'>"+ val.contact_number +"</label></p>";
                hospital+="<p><label class='heading'>Open Time</label><label class='detail'>"+ val.timing +"</label></p>";
                hospital+="</div>";
                hospital+="</div>";
          });   
          
          $("#hospitaldata").html(hospital);



  }        

});
          
}

function searchMedicine()
{
  
  var search = $("#search_medicine").val();

  $.ajax({

        url:"http://localhost:8080/hugsanddrugs/client/Shop/search",
        type:"POST",
        dataType: 'json',
        data:{search:search},
        success:function(data){
          
          var medicine="";
         
          $.each(data.medicineList, function  (key, val) {

                medicine+="<div class='product'>";
                medicine+="<div class='product-thumb'>";
                medicine+="<a href='shop/shop_detail?page=shop-detail&medicine="+val.medicine_id+"'><img src='http://localhost:8080/hugsanddrugs/medicineimg/"+val.medicineimg+"' alt=''></a>";
                medicine+="</div>";
                medicine+="<h4>"+val.medicine_name+"</h4>";
                medicine+="<div class='price-rating'>";
                medicine+="<center>";
                medicine+="<p class='price'>&#x20b9;"+val.price+"</p></center>";
                medicine+="<ul class='rating'>";
                medicine+="<li class='fa fa-star-half-full colored'</li>";
                medicine+="<li class='fa fa-star'></li>";
                medicine+="<li class='fa fa-star'></li>";
                medicine+="<li class='fa fa-star'></li>";
                medicine+="<li class='fa fa-star'></li>";
                medicine+="</ul>";
                medicine+="<div class='clearfix'></div>";
                medicine+="</div>";
                medicine+="<span class='sperator'></span>";
                medicine+="<a href='shop/shop_detail?page=shop-detail&medicine="+val.medicine_id+"'  class='ad-to-cart'><i class='fa fa-shopping-cart'></i>add to cart</a>";
                medicine+="</div>";

                
          });

               
          
          $("#medicinedata").html(medicine);
        }

  });
}


