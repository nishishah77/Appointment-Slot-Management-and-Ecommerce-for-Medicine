function getDoctor(id){
    //alert(id.value);
    $.ajax({
        url:"http://localhost:8080/hugsanddrugs/client/GetData/getDoctor",
        type:"POST",
        dataType: 'json',
        data: {Hospital:id.value},
        beforeSend : function(){

        },
        success:function(data){
             //alert(data);
            //  var json_obj = JSON.parse(data);//parse JSON
             //console.log(data.stateList);
             var doctor = "<option value=''>Select Doctor</option>";
             if(data.success=="1"){
                 $.each(data.doctorList, function  (key, val) {
                    doctor +="<option value="+val.doctor_id+">"+val.doctor_name+"<pre>["+ val.doctor_speciality +"]</pre>"+"</option>";
                 });
                 $("#doctor").html(doctor);
             }else{

             }
        },
        error:function(){

        }
    }); 
}