<?php include "includes/header.php"; ?>
        <?php include "includes/navigation.php"; ?>
        <!-- banner -->
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
                    <div>
                        <p align="center">
                            To Make An Appointment, Please Go To <a href="appointment3.php" style="color:#37b7e5;">Appointment Module</a>
                        </p>
                    </div>
                    <br />
                    <br />
                    
                    <div align="center">
                        <form>
                            <?php $userTc = $_SESSION['tc']; ?>
                            <input type="hidden" id="btnSSN" value='<?php echo $userTc; ?>'>
                            <input type="button" id="btnCallSrvc" value="Get Appoinment Info" style="background: #37b7e5; color:white">
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="container" id="divCallResult">
                        </div>
                    </div>
                </div>
            </div>
        </div>
                <script>
            // JQuery 
            $(document).ready(function() { // when DOM is ready, this will be executed

            $("#btnCallSrvc").click(function(e) {

                var tcJson = $("#btnSSN").val();

                $.ajax({ // start an ajax POST 
                    method	: "post",
                    url		: "https://appointmentmodule.000webhostapp.com/listPatientsAppointments.php",
                    dataType: "json",
                    data	:  { 
                        "SSN"	: "12344378912"
                    },
                    success : function(reply) { // when ajax executed successfully
                        console.log("reply:", reply);
                        var jsonToString = JSON.stringify(reply);
                        var json_obj = $.parseJSON(jsonToString);
                        var table = "<table class='table table-bordered table-hover'>"+
                                        "<thead>"+
                                            "<tr>"+
                                                "<th>Appointment ID</th>"+
                                                "<th>Name</th>"+
                                                "<th>TC</th>"+
                                                "<th>Appointment Date</th>"+
                                                "<th>Appointment Time</th>"+
                                                "<th>Branch Name</th>"+
                                                "<th>Subbranch Name</th>"+
                                                "<th>Doctor Name</th>"+
                                            "</tr>"+
                                        "</thead>"+
                                        "<tbody>";
                        console.log(json_obj);
                        for (i=0; i < json_obj.appointments.length; i++)
                        {
                            table+="<tr>";
                            var appointments = json_obj.appointments[i];
                            var appointmentID = appointments.AppointmentID;
                            table+="<td>" + appointmentID + "</td>";
                            var name = appointments.PatientName;
                            table+="<td>" + name + "</td>";
                            var ssn = appointments.PatientSSN;
                            table+="<td>" + ssn + "</td>";
                            var date = appointments.Date;
                            table+="<td>" + date + "</td>";
                            var time = appointments.Time;
                            table+="<td>" + time + "</td>";
                            var branchName = appointments.BranchName;
                            table+="<td>" + branchName + "</td>";
                            var subbranchName = appointments.SubbranchName;
                            table+="<td>" + subbranchName + "</td>";
                            var doctorName = appointments.DoctorName;
                            table+="<td>" + doctorName + "</td>";
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
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
<?php include "includes/footer.php"; ?>
