	
	  	$(document).ready(function(){

    $("#activeli li").click(function(){

    	 var i= '<?=$active;?>' ;
         $("#activeli li").eq(i).addClass('active');
    });
});
