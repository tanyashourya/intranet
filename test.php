<html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" >
$(document).ready(function(){
    $( ".button" ).on("click",function(){
    	alert("Hi");
        $.ajax({
        type:"post",
        url:"http://localhost/CLINFOTECH/page.php",
        data: {id:$(this).attr('id')},
        success: function( data ) {
            alert(data);
            if(data!=""){
            	window.location.href="http://localhost/CLINFOTECH/page.php?btn"+data;
            }
            
        }
         });
        });
});
</script>
</head>
<body>

<button type="button" id="b1" class="button">Button-1</button>
<button type="button" id="b2" class="button">Button-2</button>
<button type="button" id="b3" class="button">Button-3</button>
</br></br></br>
<span id="val" style="background-color:#454282;">Which button is clicked ?<span>

</body>

</html>
