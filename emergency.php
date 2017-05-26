<?php include "includes/header.php"; ?>
        <?php include "includes/navigation.php"; ?>
        <!-- banner -->
        <link rel="form-style-6" href="css/style.css">
        <div class="banner page-head">
            <div class="logo">
                <h1><a href="index.php">DEU CURE</a></h1>
            </div>
            <div class="search">
            <?php 
            if(!isset($_SESSION['user_role']))
                echo "<a href='login.php'><i class='glyphicon glyphicon-user'></i></a>";
            else{
                //Emergency Module web service.
                $userTc = $_SESSION['tc'];
                $userFirstName = $_SESSION['firstName'];
                $userSurname = $_SESSION['surName'];
                $userAddress = $_SESSION['address'];
                $emergencyInfoArray = array();
                array_push($emergencyInfoArray, array("tc"=>$userTc, "firstName"=>$userFirstName, "surname"=>$userSurname, "address"=>$userAddress));
                $allInfoToEmergency = json_encode(array('Emergency'=>$emergencyInfoArray));
                //echo $allInfoToEmergency;
                echo "<a target='_blank'  href='emergency2.php?emergency={$allInfoToEmergency}' id='' title='Call An Ambulance'><i class='glyphicon glyphicon-plus'></i></a>";
            }
            ?>
            </div>  
            <script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
            <div id="small-dialog" class="mfp-hide">
                <div class="search-top">
                    <div class="login">
                        <input type="submit" value="">
                        <input type="text" value="Type something..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}">		
                    </div>			
                </div>
                <script>
                    $(document).ready(function() {
                    $('.popup-with-zoom-anim').magnificPopup({
                        type: 'inline',
                        fixedContentPos: false,
                        fixedBgPos: true,
                        overflowY: 'auto',
                        closeBtnInside: true,
                        preloader: false,
                        midClick: true,
                        removalDelay: 300,
                        mainClass: 'my-mfp-zoom-in'
                    });

                    });
                </script>				
            </div>
        </div>
        <!-- //banner -->
        <br>
        <br>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="form-style-6">
                    <h1>Show Emergency Result</h1>
                    <form>
                        <style type="text/css">
                        .form-style-6 {
                            font: 95% Arial, Helvetica, sans-serif;
                            max-width: 400px;
                            margin: 10px auto;
                            padding: 16px;
                            background: #F7F7F7;
                        }
                        .form-style-6 h1 {
                            background: #37b7e5;
                            padding: 20px 0;
                            font-size: 140%;
                            font-weight: 300;
                            text-align: center;
                            color: #fff;
                            margin: -16px -16px 16px -16px;
                        }
                        .form-style-6 input[type="text"],
                        .form-style-6 textarea,
                        .form-style-6 select {
                            -webkit-transition: all 0.30s ease-in-out;
                            -moz-transition: all 0.30s ease-in-out;
                            -ms-transition: all 0.30s ease-in-out;
                            -o-transition: all 0.30s ease-in-out;
                            outline: none;
                            box-sizing: border-box;
                            -webkit-box-sizing: border-box;
                            -moz-box-sizing: border-box;
                            width: 100%;
                            background: #fff;
                            margin-bottom: 4%;
                            border: 1px solid #ccc;
                            padding: 3%;
                            color: #666;
                            font: 95% Arial, Helvetica, sans-serif;
                        }
                        .form-style-6 input[type="submit"],
                        .form-style-6 input[type="button"] {
                            box-sizing: border-box;
                            -webkit-box-sizing: border-box;
                            -moz-box-sizing: border-box;
                            width: 100%;
                            padding: 3%;
                            background: #37b7e5;
                            border-bottom: 2px solid #30C29E;
                            border-top-style: none;
                            border-right-style: none;
                            border-left-style: none;    
                            color: #fff;
                        }
                        .form-style-6 input[type="submit"]:hover,
                        .form-style-6 input[type="button"]:hover {
                            background: #2EBC99;
                        }
                        </style>
                        <?php 
                            $tc = $_SESSION['tc'];
                            $tc = json_encode(array("Tc"=>$tc));

                        ?>
                        <input type="hidden" id="sendedTc" value='<?php echo $tc; ?>' />
                        <input type="button" id="btnSendedTc" value="Show" />
                    </form>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="container" id="divCallResult">

                </div>
            </div>
        </div>
        <script>
            // JQuery 
            $(document).ready(function() { // when DOM is ready, this will be executed

            $("#btnSendedTc").click(function(e) {

                var tcJson = $("#sendedTc").val();

                $.ajax({ // start an ajax POST 
                    method	: "post",
                    url		: "emergency2.php",
                    dataType: "json",
                    data	:  { 
                        "emergency"	: tcJson
                    },
                    success : function(reply) { // when ajax executed successfully
                        console.log("reply:", reply);
                        var jsonToString = JSON.stringify(reply);
                        var json_obj = $.parseJSON(jsonToString);
                        var table = "<table class='table table-bordered table-hover'>"+
                                        "<thead>"+
                                            "<tr>"+
                                                "<th>TC</th>"+
                                                "<th>Name</th>"+
                                                "<th>Surname</th>"+
                                                "<th>Doctor Note</th>"+
                                                "<th>Patient Note</th>"+
                                            "</tr>"+
                                        "</thead>"+
                                        "<tbody>";
                        console.log(json_obj);
                        for (i=0; i < json_obj.emergency.length; i++)
                        {
                            table+="<tr>";
                            var emergency = json_obj.emergency[i];
                            var tc = emergency.tc;
                            table+="<td>" + tc + "</td>";
                            var name = emergency.name;
                            table+="<td>" + name + "</td>";
                            var surname = emergency.surname;
                            table+="<td>" + surname + "</td>";
                            var drNote = emergency.drNote;
                            table+="<td>" + drNote + "</td>";
                            var ptNote = emergency.ptNote;
                            table+="<td>" + ptNote + "</td>";
                            table+="</tr>";
                        }
                        table+="</tbody>"+
                                    "</table>";
                        $("#divCallResult").html(table);
                    },
                    error   : function(err) { // some unknown error happened
                        console.log(JSON.stringify(err));
                        console.log(err);
                        alert(" There is an error! Please try again. " + err); 
                    }
                });

            });

        });
        </script>

<?php include "includes/footer.php"; ?>