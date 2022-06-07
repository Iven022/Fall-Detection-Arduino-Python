<?php
include_once 'database.php';
$result = mysqli_query($conn,"SELECT * FROM Detect");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="refresh" content="10">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">
        <title>UI Design - Smart Home App</title>
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/custom.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>

        <div class="container-fluid">
            
            <div id="sha_app" class="row">

                <!-- Start Section Header Bar -->
                <section id="sha_header_bar" class="col-12">
                    <div class="row">
                        <div class="col-12">
                           <span id="date" class="sub-heading"></span>
                            <script>
                            	document.getElementById("date").innerHTML = Date();
                             </script>
                            <span class="heading">Health Emergency Alert</span>
                        </div>
                    </div>
                </section>
                <!-- End Section Header Bar -->


                <!-- Start Section Body 1 -->
                <section id="sha_temp_body" class="col-12">
                    <div class="row">
                        <div class="col-12">
                            <span class="sha_temp">
                                <span>
                                    <span class="temp-data" id="y">70<sup>bpm</sup></span>
                                    <span class="temp-info">
                                        <i class="fa fa-heart"></i> Normal Range
                                    </span>
                                </span>
                            </span>
                        </div>
                    </div>
                </section>
                <!-- End Section Body 1 -->

                <!-- Start Section Body 2 -->
                <section id="sha_temp_meta" class="col-12">
                    <div class="row">
			             <div class="col-12 sha_tile">
                            <div>
                                <span class="tile_icon">
                                    <i class="fa fa-heart"></i>
                                </span>
                                <span class="tile_info">
                                    Heart Rate
                                    <span>Everything looks fine</span>
                                </span>
                            </div> 
                        </div>
                        <div class="col-12 sha_tile">
                            <div>
                                <span class="tile_icon">
                                    <i class="fa fa-bell"></i>
                                </span>
                                <?php
                                    while($row = mysqli_fetch_array($result)) {
                                ?>
                                    <span class="tile_info">
                                        Emergency Request
                                        <span><?php echo $row["Danger"]; ?></span>
                                        <?php
                                            if($row["Danger"] == "Assistance Requested") {
                                                echo '<script language="javascript">';
                                                echo 'console.log("asas")';
                                        echo '</script>';
                                            }
                                        ?>
                                    </span>
                                
                            </div>
                        </div>
                        <div class="col-12 sha_tile">
                            <div>
                                <span class="tile_icon">
                                    <i class="fa fa-blind"></i>
                                </span>
                                <span class="tile_info">
                                    Fall Detection
                                    <span><?php echo $row["Fall"]; ?></span>
                                </span>
                                <?php
                                    }
                                ?>
                            </div>
                        </div>

                    </div>
                </section>
                <!-- End Section Body 2 -->

                <!-- Start Section Footer -->
                <section id="sha_footer" class="col-12">
                    <div class="row">
                        <div class="col-8">
                            <div>
                                <span class="footer_title">
                                    Current Temperature
                                </span>
                                <span class="footer_data">
                                    18.5 <span class="unit">&deg;C</span>
                                </span>
                            </div>
                        </div>
                        <div class="col-4">
                            <div>
                                <span class="footer_title text-right">
                                    Turn On/Off
                                </span>
                                <span class="footer_data">
                                    <span class="sha_switch pull-right"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- End Section Footer -->
            </div>

        </div>
             
        <script src="js/custom.js" type="text/javascript"></script>
    </body>
</html>
