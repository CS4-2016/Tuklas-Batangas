<?php
    session_start(); 
    require_once("header.php");
    
    $db = new db();
	$db -> Connect();
    
    $SQL = "SELECT * FROM `users`";
    $db->Query($SQL);
    
    if($db->result){
        while($row = $db->result->fetch_assoc()){
            $memberList[] = $row;
        } 
    }    
?>
    
        
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Users
            </h1>
            <ol class="breadcrumb">
                <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            </ol>
        </section>
        
    <!-- Main content -->
    <section class="content">
        <div class="tuklasbatangas-main-content tuklasbatangas-space <?php if(!empty($_SESSION['username'])){ echo "tuklasbatangas-admin";} ?>">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 table-members">
                        <table class="table table-striped table-hover ">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Username</th>
                                    <th>Contact Number</th>
                                    <th>Email Address</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php
                                        for($x=0; $x<count($memberList);$x++){ ?>
                                            <tr>
                                                <td><?php echo $x+1; ?></td>
                                                <td><?php echo $memberList[$x]['username']; ?></td>  
                                                <td><?php echo $memberList[$x]['contact']; ?></td>   
                                                <td><?php echo $memberList[$x]['email']; ?></td>   
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