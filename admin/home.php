<?php
    require 'header.php';
    require 'Controllers/config.php';
?>
    <div class="right_col dataHeight" role="main">

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">

                        <h2>Dashboard</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <div class="row">

                            <div class="col-md-2">
                                <div class="thumbnail">
                                    <a href="conatct">
                                        <div class="caption">

                                                <img src="images/ic_category.png" align="center" width="100" height="100">
                                            <?php
                                            $query = mysqli_query($con,"select count(*) from contact");
                                            $data = mysqli_fetch_array($query);
                                            echo "<h3 style='text-align: center;'>$data[0]</h3>";
                                            ?>
                                                <p style="text-align: center;">Total Contacts</p>

                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="thumbnail">
                                    <a href="subscribe">
                                        <div class="caption">

                                            <img src="images/ic_category.png" width="100" height="100">
                                            <?php
                                            $query = mysqli_query($con,"select count(*) from subscribe");
                                            $data = mysqli_fetch_array($query);
                                            echo "<h3 style='text-align: center;'>$data[0]</h3>";
                                            ?>
                                            <p style="text-align: center;">Total Subscribe</p>

                                        </div>
                                    </a>
                                </div>
                            </div>
        


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
    require 'footer.php';
?>