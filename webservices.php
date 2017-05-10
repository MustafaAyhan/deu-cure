   <script>
        // JQuery 
        $(document).ready(function() { // when DOM is ready, this will be executed

        $("#btnEmergency").click(function() { // click event for "btnCallSrvc"

            var tc          = $("#user_tc").val(); // get country code
            var firstName   = $("#user_firstName").val(); // get desired country count
            var surName     = $("#user_surName").val(); // get desired country count
            var address     = $("#user_address").val(); // get desired country count

            $.ajax({ // start an ajax POST 
                type	: "post",
                url		: "emergency.php",
                data	:  { 
                    "tc"	: tc, 
                    "firstName"	: firstName, 
                    "surName": surName, 
                    "address"	: address 
                },
                success : function(reply) { // when ajax executed successfully
                    console.log(reply);
                    $("#divCallResult").html( JSON.stringify(reply) );
                },
                error   : function(err) { // some unknown error happened
                    console.log(err);
                    alert(" There is an error! Please try again. " + err); 
                }
            });
        });

    });
    </script>
