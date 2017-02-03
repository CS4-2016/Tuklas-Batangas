<?php
    session_start(); 
    $_SESSION['page'] = 'members';
    require_once("header.php");

    $db = new db();
	$db->Connect();

    $username = $_SESSION['username'];
    $SQL = "SELECT * FROM `users` WHERE `username` = '$username'";
    $db->Query($SQL);

    if($db->result)
        $account[] = $db->result->fetch_assoc();

    if($account[0]['type'] == 'ptc' || $account[0]['type'] == 'lto'){} else{
        echo("<script>location.href = 'index.php';</script>");
    }
    
    if($account[0]['type'] == 'ptc'){
        $SQL = "SELECT `users`.`username`, `lto`.`name`, `lto`.`city`, `users`.`email`, `users`.`contact` FROM `users` INNER JOIN `lto` ON `users`.`username` = `lto`.`username` WHERE `users`.`status` = 'approved'";
    } else if($account[0]['type'] == 'lto'){
        $SQL = "SELECT `poi`.`username`, `poi`.`owner`, `poi`.`establishment`, `poi`.`address`, `poi`.`email`, `poi`.`contact`, `poi`.`document` FROM `poi` INNER JOIN `users` ON `poi`.`username` = `users`.`username` WHERE `users`.`status` = 'approved'";
    }

    $db->Query($SQL);
    $memberList = array();

    if($db->result)
        while($row=$db->result->fetch_assoc()){
            $memberList[] = $row;
        }        
?> 
    <div id="content">
        <div class="tuklasbatangas-main-content tuklasbatangas-space <?php if(!empty($_SESSION['username'])){ echo "tuklasbatangas-admin";} ?>">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tuklas-header">
                            <?php if($account[0]['type'] == 'ptc'){ ?>
                                Local Tourism Officers
                            <?php } else if($account[0]['type'] == 'lto'){ ?>
                                Points of Interest Owners
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 table-members">
                        <table class="table table-striped table-hover ">
                            <?php if($account[0]['type'] == 'lto'){ ?>
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Username</th>
                                            <th>Establishment</th>
                                            <th>Owner</th>
                                            <th>Contact Number</th>
                                            <th>Address</th>
                                            <th>Email</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <?php
                                                for($x=0; $x<count($memberList);$x++){ ?>
                                                    <tr>
                                                        <td><?php echo $x+1; ?></td>
                                                        <td><?php echo $memberList[$x]['username']; ?></td>
                                                        <td><?php echo $memberList[$x]['establishment']; ?></td>
                                                        <td><?php echo $memberList[$x]['owner']; ?></td>   
                                                        <td><?php echo $memberList[$x]['contact']; ?></td>   
                                                        <td><?php echo $memberList[$x]['address']; ?></td>
                                                        <td><?php echo $memberList[$x]['email']; ?></td>   
                                                    </tr>            
                                            <?php  } ?>
                                    </tbody>            
                            <?php } else if($account[0]['type'] == 'ptc'){ ?>
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Username</th>
                                            <th>Name</th>
                                            <th>Contact Number</th>
                                            <th>Email</th>
                                            <th>City</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <?php
                                                for($x=0; $x<count($memberList);$x++){ ?>
                                                    <tr>
                                                        <td><?php echo $x+1; ?></td>
                                                        <td><?php echo $memberList[$x]['username']; ?></td>
                                                        <td><?php echo $memberList[$x]['name']; ?></td>   
                                                        <td><?php echo $memberList[$x]['contact']; ?></td>   
                                                        <td><?php echo $memberList[$x]['email']; ?></td>   
                                                        <td><?php echo ucfirst($memberList[$x]['city']); ?></td>
                                                    </tr>            
                                            <?php  } ?>
                                    </tbody>            
                            <?php } ?>    
                        </table>
                        <center><a href="members-pending.php" class="btn btn-raised btn-primary">View Pending </a></center>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- #content -->

<?php require_once("footer.php"); ?>
