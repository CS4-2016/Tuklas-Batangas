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
        $SQL = "SELECT `users`.`username`, `lto`.`name`, `lto`.`city`, `users`.`email`, `users`.`contact` FROM `users` INNER JOIN `lto` ON `users`.`username` = `lto`.`username` WHERE `users`.`status` = 'pending'";
    } else if($account[0]['type'] == 'lto'){
        $SQL = "SELECT `poi`.`username`, `poi`.`owner`, `poi`.`establishment`, `poi`.`address`, `poi`.`email`, `poi`.`contact`, `poi`.`document` FROM `poi` INNER JOIN `users` ON `poi`.`username` = `users`.`username` WHERE `users`.`status` = 'pending'";
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
                                    Pending Local Tourism Officers
                                <?php } else if($account[0]['type'] == 'lto'){ ?>
                                    Pending Points of Interest Owners
                                <?php } ?>
                            </div>
                        </div>                        
                    </div>
                    <div class="row">
                        <div class="col-md-12 table-members">
                            <form method="post" action="members-approve.php">
                                <table class="table table-striped table-hover ">
                                    <?php if($account[0]['type'] == 'lto'){ ?>
                                        <thead>
                                            <tr>
                                                <th><i class="fa fa-check"></i></th>
                                                <th>#</th>
                                                <th>Username</th>
                                                <th>Establishment</th>
                                                <th>Owner</th>
                                                <th>Contact Number</th>
                                                <th>Address</th>
                                                <th>Email</th>
                                                <th>Document</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                                <?php
                                                    for($x=0; $x<count($memberList);$x++){ ?>
                                                    <tr>
                                                        <td style="padding:0px;padding-left:8px">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" name="check[]" value="<?php echo $memberList[$x]['username']; ?>">
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td><?php echo $x+1; ?></td>
                                                        <td><?php echo $memberList[$x]['username']; ?></td>
                                                        <td><?php echo $memberList[$x]['establishment']; ?></td>
                                                        <td><?php echo $memberList[$x]['owner']; ?></td>   
                                                        <td><?php echo $memberList[$x]['contact']; ?></td>   
                                                        <td><?php echo $memberList[$x]['address']; ?></td>
                                                        <td><?php echo $memberList[$x]['email']; ?></td> 
                                                        <td><a href="documents/<?php echo $memberList[$x]['document']; ?>"><?php echo $memberList[$x]['document']; ?></a></td></tr>
                                                <?php  } ?>
                                        </tbody>
                                    <?php  } else if($account[0]['type'] == 'ptc'){ ?>
                                        <thead>
                                            <tr>
                                                <th><i class="fa fa-check"></i></th>
                                                <th>#</th>
                                                <th>Username</th>
                                                <th>Name</th>
                                                <th>City</th>
                                                <th>Contact Number</th>
                                                <th>Email</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                                <?php
                                                    for($x=0; $x<count($memberList);$x++){ ?>
                                                    <tr>
                                                        <td style="padding:0px;padding-left:8px">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" name="check[]" value="<?php echo $memberList[$x]['username']; ?>">
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td><?php echo $x+1; ?></td>
                                                        <td><?php echo $memberList[$x]['username']; ?></td>
                                                        <td><?php echo $memberList[$x]['name']; ?></td>   
                                                        <td><?php echo ucfirst($memberList[$x]['city']); ?></td>   
                                                        <td><?php echo $memberList[$x]['contact']; ?></td>
                                                        <td><?php echo $memberList[$x]['email']; ?></td> 
                                                <?php  } ?>
                                        </tbody>
                                    <?php  } ?>
                                </table>
                                <center>
                                    <input value="APPROVE" class="btn btn-raised btn-primary" type="button" data-toggle="modal" data-target="#members-approve">
                                    <input value="DELETE" class="btn btn-raised btn-primary" type="button" data-toggle="modal" data-target="#members-delete">
                                </center>
                                <div class="modal fade" role="dialog" id="members-delete">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h4 class="modal-title">Are you sure you want to delete?</h4>
                                            </div>

                                            <div class="modal-footer">
                                                <input type="submit" class="btn btn-primary" name="action" value="delete">
                                                <button type="button" data-dismiss="modal" class="btn btn-primary modal-dismiss">No!</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" role="dialog" id="members-approve">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h4 class="modal-title">Are you sure you want to approve?</h4>
                                            </div>

                                            <div class="modal-footer">
                                                <input type="submit" class="btn btn-primary" name="action" value="approve">
                                                <button type="button" data-dismiss="modal" class="btn btn-primary modal-dismiss">No!</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
		</div><!-- #content -->

<?php require_once("footer.php"); ?>
