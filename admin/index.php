<?php
    session_start(); 

   $_SESSION['current-page'] = 'index';

    require_once("header.php");

    $type = $_SESSION['usertype'];
?>
    <!-- Content Header (Page header) -->

    <section class="content-header" style="padding-top: 50px;">
        <h1>
            Home
        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        </ol>
    </section>
        
    <!-- Main content -->
    <section class="content">
        
        <?php if($type == 'admin'){ ?>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-users fa-tuklas-panel"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"></div>
                                    <div>Users</div>
                                </div>
                            </div>
                        </div>
                        <a href="users.php">
                            <div class="panel-footer">
                                <span class="pull-left">Users</span>
                                <span class="pull-right"><i class="fa fa-sign-out"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-yellow">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-bar-chart fa-tuklas-panel"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"></div>
                                    <div>Page Views</div>
                                </div>
                            </div>
                        </div>
                        <a class="panel-a-yellow" href="page-views.php">
                            <div class="panel-footer">
                                <span class="pull-left">Page Views</span>
                                <span class="pull-right"><i class="fa fa-sign-out"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-red">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-pencil-square-o fa-tuklas-panel"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"></div>
                                    <div>Edit Website</div>
                                </div>
                            </div>
                        </div>
                        <a class="panel-a-red" href="../admin-2/">
                            <div class="panel-footer">
                                <span class="pull-left">Edit Website</span>
                                <span class="pull-right"><i class="fa fa-sign-out"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
    
        <?php } 
        
        else if($type == 'lto'){ ?>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-users fa-tuklas-panel"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"></div>
                                    <div>Users</div>
                                </div>
                            </div>
                        </div>
                        <a href="users.php">
                            <div class="panel-footer">
                                <span class="pull-left">Users</span>
                                <span class="pull-right"><i class="fa fa-sign-out"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-yellow">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-dot-circle-o fa-tuklas-panel"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"></div>
                                    <div>Points of Interest</div>
                                </div>
                            </div>
                        </div>
                        <a class="panel-a-yellow" href="poi-list.php">
                            <div class="panel-footer">
                                <span class="pull-left">Points of Interest</span>
                                <span class="pull-right"><i class="fa fa-sign-out"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div> 
        
        <?php } 
        
        else if($type == 'poi'){ ?>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-dot-circle-o fa-tuklas-panel"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"></div>
                                    <div>My Points of Interest</div>
                                </div>
                            </div>
                        </div>
                        <a href="points-of-interests.php?x=<?php echo $username; ?>">
                            <div class="panel-footer">
                                <span class="pull-left">My Points of Interest</span>
                                <span class="pull-right"><i class="fa fa-sign-out"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-yellow">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-plus-circle fa-tuklas-panel"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"></div>
                                    <div>Add New Point of Interest</div>
                                </div>
                            </div>
                        </div>
                        <a class="panel-a-yellow" href="add-poi.php">
                            <div class="panel-footer">
                                <span class="pull-left">Add New Point of Interest</span>
                                <span class="pull-right"><i class="fa fa-sign-out"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
    
        <?php } ?> 
        
    </section>

<?php
    require_once("footer.php");
?>