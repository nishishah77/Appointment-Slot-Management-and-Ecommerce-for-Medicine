$(document).ready(function(){
  getMedicine();

    $("#manufacturingdate").blur(function(){
         var date = new Date($("#manufacturingdate").val());  
         var newdate = date.getDate()+1;
         var newmonth = "";
         var newyear = "";
         if(newdate<10)
         {
          newdate = "0"+newdate;
         }

         if(newdate>30)
         {

         newmonth = date.getMonth()+2;
         newdate = 1;
         if(newmonth<10)
         {
          newmonth = "0"+newmonth;
         }
         }
         else
         {
          newmonth = date.getMonth()+1;
          if(newmonth<10)
         {
          newmonth = "0"+newmonth;
         }
 
        }
        if(newmonth>12)
        {
          newyear = date.getFullYear()+1;
          newmonth = "01";
          newdate = "01";
        }
        else
          {
            newyear = date.getFullYear();
          }       
         //alert(newyear+"-"+newmonth+"-"+newdate);
      $( "#expirydate" ).prop("min",newyear+"-"+newmonth+"-"+newdate);
    });
      $("#search_medicine").keyup(function(){

   var search_keyword=$("#search_medicine").val().toLowerCase();
  var id=0;
 $.ajax({

        url:"http://localhost:8080/hugsanddrugs/admin/Medicine/search",
        type:"POST",
        dataType: 'json',
        data:{search:search_keyword},
        success:function(data){

          var medicine_record="";
         
          $.each(data.medicineList, function  (key, val) {
            id= id + 1;
                 medicine_record +="<tr id='myTable'>";
                        medicine_record +="<td>"+id+"</td>";
                        medicine_record +="<td>"+val.medicine_name+"</td>";
                        medicine_record +="<td>"+val.medicine_category_name+"</td>";
                        medicine_record +="<td>"+val.manufacturer+"</td>";
                        medicine_record +="<td>"+val.unit+"</td>";
                        medicine_record +="<td>"+val.price+"</td>";
                        medicine_record +="<td><a href='profile?id="+val.medicine_id+"' class='btn btn-xs btn-info'><i class='fa fa-user'></i></a><a href='edit?id="+val.medicine_id+"' class='btn btn-xs btn-success'><i class='icon-pencil5'></i></a><a href='javascript:void(0)' onclick='d("+val.medicine_id+")' class='btn btn-danger btn-xs'><i class='fa fa-trash'></i></a></td>";
                    medicine_record +="</tr>"; 
          });
          
          $("#medicine_record").html(medicine_record);
         
        }

  });
});
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
                medicinename : {
                    required:true,
                    minlength:5                   
                },
                 Manufacturer : {
                 required:true,
                    minlength:5                   
                },
                medicineusage : {
                   required:true,
                    minlength:5                   
                },
                 dosage:{
                   required:true,
                    minlength:5                   

                  },
                unit:{
                   required:true,
                    
                 },
                price:{
                   
                   required:true,
                  
                 }


            },
            
        },

    });

      $(".form-validation").on("step_shown", function(event, data) {
        $.uniform.update();
    });

});


function getState(id){
    //alert(id.value);
    $.ajax({
        url:"http://localhost:8080/hugsanddrugs/admin/GetData/getState",
        type:"POST",
        dataType: 'json',
        data: {country:id.value},
        beforeSend : function(){

        },
        success:function(data){
             //alert(data);
            //  var json_obj = JSON.parse(data);//parse JSON
             //console.log(data.stateList);
             var states = "<option value=''>Select State</option>";
             if(data.success=="1"){
                 $.each(data.stateList, function  (key, val) {
                    states +="<option value="+val.state_id+">"+val.state_name+"</option>";
                 });
                 $("#state").html(states);
             }else{

             }
        },
        error:function(){

        }
    }); 
}


function getCity(id){
    //alert(id.value);
    $.ajax({
        url:"http://localhost:8080/hugsanddrugs/admin/GetData/getCity",
        type:"POST",
        dataType: 'json',
        data: {state:id.value},
        beforeSend : function(){

        },
        success:function(data){
             //alert(data);
            //  var json_obj = JSON.parse(data);//parse JSON
             //console.log(data.stateList);
             var city = "<option value=''>Select City</option>";
             if(data.success=="1"){
                 $.each(data.cityList, function  (key, val) {
                    city +="<option value="+val.city_id+">"+val.city_name+"</option>";
                 });
                 $("#city").html(city);
             }else{
                
             }
        },
        error:function(){

        }
    }); 
}
function getMedicine(){
  
   let searchParams = new URLSearchParams(window.location.search);
    searchParams.has('page');
    let param = searchParams.get('page');
   if(param==null)
    {
        param=1;
    }
 
    $.ajax({
        url:"http://localhost:8080/hugsanddrugs/admin/GetData/getMedicine",
        type:"POST",
        dataType: 'json',
        data:{
          page:param
        },
        beforeSend : function(){

        },
        success:function(data){
             var medicine_record = "";
             var id=0;
             if(data.success=="1"){
                 $.each(data.medicineList, function(key,val) 
                 {
                  id=id+1;
                    medicine_record +="<tr>";
                        medicine_record +="<td>"+id+"</td>";
                        medicine_record +="<td>"+val.medicine_name+"</td>";
                        medicine_record +="<td>"+val.medicine_category_name+"</td>";
                        medicine_record +="<td>"+val.manufacturer+"</td>";
                        medicine_record +="<td>"+val.unit+"</td>";
                        medicine_record +="<td>"+val.price+"</td>";
                        medicine_record +="<td><a href='profile?id="+val.medicine_id+"' class='btn btn-xs btn-info'><i class='fa fa-user'></i></a><a href='edit?id="+val.medicine_id+"' class='btn btn-xs btn-success'><i class='icon-pencil5'></i></a><a href='javascript:void(0)' onclick='d("+val.medicine_id+")' class='btn btn-danger btn-xs'><i class='fa fa-trash'></i></a></td>";
                    medicine_record +="</tr>";  
                 });
                 $("#medicine_record").html(medicine_record);
                var i=0;
               var pagination="";
               var page=1;

                 pagination+="<a class='paginate_button current' aria-controls='DataTables_Table_0' data-dt-idx=1 tabindex='0' href='http://localhost:8080/hugsanddrugs/admin/Medicine/View?page="+page+"'>"+page+"</a>";           
                 for(i=1;i<=data.totalMedicines;i++)
                 {
                     if(i%10==0)
                    {
                        page+=1;
                    pagination+="<a class='paginate_button current' aria-controls='DataTables_Table_0' data-dt-idx=1 tabindex='0' href='http://localhost:8080/hugsanddrugs/admin/Medicine/View?page="+page+"'>"+page+"</a>"; 
                   
                    }


                 }
                 if(page==1)
                 {
                  pagination="";
                 }
                 $("#pagination").html(pagination);

             }else{
                
             }
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
          url: "http://localhost:8080/hugsanddrugs/admin/Medicine/Delete",
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
 function insert()
  {
    $(".form-validation").submit(function(e){
    e.preventDefault();
    
    var medicinename = "";
    medicinename = $("#medicinename").val();
    var manufacturingdate = "";
    manufacturingdate = $("#manufacturingdate").val();
    var expirydate = "";
    expirydate = $("#expirydate").val();
    var category = "";
    category = $("#category").val(); 
    var manufacturer = "";
    manufacturer = $("#manufacturer").val();    
    var medicineusage = "";
    medicineusage = $("#medicineusage").val();
    var dosage = "";
    dosage = $("#dosage").val();
    var prescriptionrequired = "";
    if($('#prescriptionrequired').prop('checked'))
    {
    prescriptionrequired = "Yes";
    }
    else
    {
    prescriptionrequired = "No";
    }
    var description = "";
    description = $("#description").val();
    var unit = "";
    unit = $("#unit").val();
    var price = "";
    price = $("#price").val();

    var imagefile ="";
    imagefile = $('#medicineimg')[0].files[0];

    var fd = new FormData();
    
    fd.append('medicinename', medicinename);
    fd.append('manufacturer', manufacturer);
    fd.append('manufacturingdate', manufacturingdate);
    fd.append('expirydate', expirydate);
    fd.append('category', category);
    fd.append('medicineusage', medicineusage);
    fd.append('dosage', dosage);
    fd.append('prescriptionrequired', prescriptionrequired);
    fd.append('description', description);
    fd.append('medicineimg', imagefile);
    fd.append('unit', unit);
    fd.append('price', price);



      $.ajax({
          url: "http://localhost:8080/hugsanddrugs/admin/Medicine/insert",
          type: "post",
          processData: false,
          contentType: false,
          data: fd,
          success:function(){
            swal({ 
              title: "Medicine!", 
              text: "Your data has been Added.", 
              type: "success" }, 
              function(){ location.reload(); 
              });
          },
          error:function(){
           
             swal({ 
              title: "Cancelled!", 
              text: "Something went wrong", 
              type: "error" }, 
              function(){ location.reload(); 
              });
          }
      });
});
}

$(document).ready(function(){
    $("#medicine-update-form").submit(function(e){
    e.preventDefault();
    
    var id = $("#medicine_id").val();
    var updateimage="";
    updateimage = $("#image").val();
    var medicinename = "";
    medicinename = $("#medicinename").val();
    var manufacturingdate = "";
    manufacturingdate = $("#manufacturingdate").val();
    var expirydate = "";
    expirydate = $("#expirydate").val();
    var category = "";
    category = $("#category").val(); 
    var manufacturer = "";
    manufacturer = $("#manufacturer").val();    
    var medicineusage = "";
    medicineusage = $("#medicineusage").val();
    var dosage = "";
    dosage = $("#dosage").val();
    var prescriptionrequired = "";
    if($('#prescriptionrequired').prop('checked'))
    {
    prescriptionrequired = "Yes";
    }
    else
    {
    prescriptionrequired = "No";
    }
 
    var description = "";
    description = $("#description").val();
    var unit = "";
    unit = $("#unit").val();
    var price = "";
    price = $("#price").val();

    var imagefile ="";
    imagefile = $('#medicineimg')[0].files[0];

    var fd = new FormData();
    fd.append('medicine_id', id);
    fd.append('medicinename', medicinename);
    fd.append('manufacturer', manufacturer);
    fd.append('manufacturingdate', manufacturingdate);
    fd.append('expirydate', expirydate);
    fd.append('category', category);
    fd.append('medicineusage', medicineusage);
    fd.append('dosage', dosage);
    fd.append('prescriptionrequired', prescriptionrequired);
    fd.append('description', description);
    fd.append('medicineimg', imagefile);
    fd.append('unit', unit);
    fd.append('price', price);
    fd.append('image', updateimage);


      $.ajax({
          url: "http://localhost:8080/hugsanddrugs/admin/Medicine/update",
          type: "post",
          processData: false,
          contentType: false,          
          data: fd,
          success:function(){
            swal({ 
              title: "Medicine!", 
              text: "Your data has been Modified.", 
              type: "success" }, 
              function(){ location.reload(); 
              });
          },
          error:function(){
           
             swal({ 
              title: "Cancelled!", 
              text: "Something went wrong", 
              type: "error" }, 
              function(){ location.reload(); 
              });
          }
      });



});
});

