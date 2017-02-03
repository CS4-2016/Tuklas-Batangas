<?php
    require_once("header.php");

    $SQL ="SELECT * FROM clients";
    $ret =  mysql_query($SQL);
    $clientList = array();

    if ($ret){
        while ($row = mysql_fetch_assoc($ret))
            $clientList[]=$row;
    }
?>  
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Clients
                <!-- <small>List of all existing Regis clients</small> -->
            </h1>
            <ol class="breadcrumb">
                <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Clients</li>
            </ol>
        </section>
        
    <!-- Main content -->
    <section class="content">

        <table class="table table-striped table-hover ">
  <thead>
  <tr>
    <th>#</th>
    <th>Client Name</th>
    <th>Projects</th>
  </tr>
  </thead>
  <tbody>
    <?php
        for($x=0;$x<count($clientList);$x++){
    ?>
    <tr>
        <td>
            <?php echo $x+1; ?>
        </td>  
        <td>
            <?php echo $clientList[$x]['name']; ?>
        </td>  
        <td>
            <?php echo $clientList[$x]['projects']; ?>
        </td>
    </tr> 
    <?php 
        } 
    ?>
    </tr>
  </tbody>
</table>
    </section>

<?php
    require_once("footer.php");
?>