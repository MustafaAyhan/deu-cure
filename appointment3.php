<html>
    <head>
        
    </head>
    <body>
       <form action="/deu-cure/appointment.php" method="post">
           <input type="hidden" name="tc" value="11">
           <input type="hidden" name="password" value="asd">
           <input type="submit" value="yolla">
       </form>
       <?php
        if(isset($_POST['flag'])){
            $isMemberFlag = $_POST['flag'];
            $serviceParamObj = json_decode($isMemberFlag, true);
            var_dump($serviceParamObj);
        }
        ?>
        <script>
			// JQuery 
			$(document).ready(function() { // when DOM is ready, this will be executed
			
			$("#btnCallSrvc").click(function(e) { // click event for "btnCallSrvc"
				
				$.ajax({ // start an ajax POST 
					type	: "post",
					url		: "appoinment.php",
					data	:  { 
						"tc"	: "11", 
						"password": "asd"
					}
				});
				
			});
			
		});
		</script>
    </body>
</html>