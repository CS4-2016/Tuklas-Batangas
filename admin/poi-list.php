<?php
    session_start(); 
    $_SESSION['current-page'] = 'poi-list';
    require_once("header.php");

    $db = new db();
    $db -> Connect();

    $username = $_SESSION['username'];

    $SQL = "SELECT `city` FROM `users` WHERE `username` = '$username'";

    $db -> Query($SQL);

    if($db->result){
        while($row = $db->result->fetch_assoc()){
            $city[] = $row;
        } 
    }

    $city = $city[0]['city'];
    $SQL = "SELECT * FROM `poi` WHERE `city` = '$city'";

    $db -> Query($SQL);

    if($db->result){
        while($row = $db->result->fetch_assoc()){
            $poiList[] = $row;
        } 
    }
?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Points of Interests
        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><i class="fa fa-dot-circle-o"></i> Points of Interest</li>
        </ol>
    </section>
        
    <!-- Main content -->
    <section class="content">
        <div class="tuklasbatangas-main-content tuklasbatangas-space <?php if(!empty($_SESSION['username'])){ echo "tuklasbatangas-admin";} ?>">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 table-members">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Establishment</th>
                                    <th>Owner</th>
                                    <th>Address</th>
                                    <th>City</th>
                                    <th>Contact Number</th>
                                    <th>Email</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php
                                        for($x=0; $x<count($poiList);$x++){ ?>
                                            <tr>
                                                <td style="vertical-align: middle"><?php echo $x+1; ?></td>
                                                <td style="vertical-align: middle"><?php echo $poiList[$x]['establishment']; ?></td>  
                                                <td style="vertical-align: middle"><?php echo $poiList[$x]['owner']; ?></td>   
                                                <td style="vertical-align: middle"><?php echo $poiList[$x]['address']; ?></td> 
                                                <td style="vertical-align: middle"><?php echo $poiList[$x]['city']; ?></td>   
                                                <td style="vertical-align: middle"><?php echo $poiList[$x]['contact']; ?></td>   
                                                <td style="vertical-align: middle"><?php echo $poiList[$x]['email']; ?></td>   
                                                <td style="vertical-align: middle">
                                                    <a href="" class="btn btn-raised btn-xs btn-primary">View</a>
                                                </td>   
                                            </tr>            
                                    <?php  } ?>
                            </tbody>                   
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>

<?php
    require_once("footer.php");
?>