$(document).ready(function(){
    
    
    //alert(id.value);
    $.ajax({
        url:"http://localhost:8080/hugsanddrugs/admin/GetData/getContact",
        type:"POST",
        dataType: 'json',
        data:{
            keyword:''
        },
        beforeSend : function(){

        },
        success:function(data){
             //alert(data);
            //var json_obj = data;
            //parse JSON
             //console.log(data.    );
             var contact_record = "";

             if(data.success=="1"){
                 $.each(data.contact_usList, function  (key, val) {
                    contact_record +="<li class='media'>";
                        contact_record +="<div class='media-body'>";
                        //contact_record +="<td>"+val.patient_first_name+" "+val.patient_middle_name+" "+val.patient_last_name+"</td>";
                        contact_record +=""+val.name+"";
                        contact_record +="<span class='media-annotation pull-right'>"+val.email+"</span>";
                        contact_record +="<span class='display-block text-muted'>"+val.message+"</span>";
                        contact_record +="</div>";
                      //  pateint_record +="<td>"+val.pincode+"</td>";
                        contact_record +="</li>";
  
                 });
                 $("#contact_record").html(contact_record);
             }else{
                
             }
                //var x = JSON.parse(data);          
              // var obj = JSON.parse(data);

             console.log(data);

        },
        error:function(){

        }
    }); 

   
   
});
$(document).ready(function(){
    
    
    //alert(id.value);
    $.ajax({
        url:"http://localhost:8080/hugsanddrugs/admin/GetData/getFeedback",
        type:"POST",
        dataType: 'json',
        data:{
            keyword:''
        },
        beforeSend : function(){

        },
        success:function(data){
             //alert(data);
            //var json_obj = data;
            //parse JSON
             //console.log(data.    );
             var feedback_record = "";

             if(data.success=="1"){
                 $.each(data.feedbackList, function  (key, val) {
                    feedback_record +="<li class='media'>";
                        feedback_record +="<div class='media-body'>";
                        //contact_record +="<td>"+val.patient_first_name+" "+val.patient_middle_name+" "+val.patient_last_name+"</td>";
                        feedback_record +=""+val.name+"";
                        feedback_record +="<span class='media-annotation pull-right'>"+val.email+"</span>";
                        feedback_record +="<span class='display-block text-muted'>"+val.message+"</span>";
                        feedback_record +="</div>";
                      //  pateint_record +="<td>"+val.pincode+"</td>";
                        feedback_record +="</li>";
  
                 });
                 $("#feedback_record").html(feedback_record);
             }else{
                
             }
                //var x = JSON.parse(data);          
              // var obj = JSON.parse(data);

             console.log(data);

        },
        error:function(){

        }
    }); 

   
   
});