<?php
    session_start(); 
    $_SESSION['current-page'] = 'add-poi';
    require_once("header.php");

    $username = $_SESSION['username'];
?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Add New Point of Interest
        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><i class="fa fa-plus-circle"></i> Add New Point of Interest</li>
        </ol>
    </section>
        
    <!-- Main content -->
    <section class="content">
        <form method="post" action="add-poi2.php">
            <input type="hidden" name="user" value="<?php echo $username; ?>">
            <div class="form-group row">
                <label for="establishment" class="col-md-1 control-label">Establishment Name</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="establishment" id="establishment" placeholder="Establishment Name">
                </div>
            </div>
            <div class="form-group row">
                <label for="owner" class="col-md-1 control-label">Owner</label>

                <div class="col-md-10">
                    <input type="text" class="form-control" name="owner" id="owner" placeholder="Owner">
                </div>
            </div>
            <div class="form-group row">
                <label for="address" class="col-md-1 control-label">Address</label>

                <div class="col-md-10">
                    <input type="text" class="form-control" name="address" id="address" placeholder="Address">
                </div>
            </div>
            <div class="form-group row">
                <label for="city" class="col-md-1 control-label">Choose City...</label>                                           
                <div class="col-md-10">
                    <select id="city" name="city" class="form-control" required>
                        <option value="" unselectable></option>
                        <option value="lipa">Lipa City</option>
                        <option value="tanauan">Tanauan City</option>
                        <option value="malvar">Malvar</option>
                        <option value="stotomas">Sto. Tomas</option>
                        <option value="mataasnakahoy">Mataas na Kahoy</option>
                        <option value="talisay">Talisay</option>
                        <option value="balete">Balete</option>
                        <option value="laurel">Laurel</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="contact" class="col-md-1 control-label">Contact Number</label>

                <div class="col-md-10">
                    <input type="text" class="form-control" name="contact" id="contact" placeholder="Contact Number">
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-md-1 control-label">E-mail Address</label>

                <div class="col-md-10">
                    <input type="email" name="email" class="form-control" id="email" placeholder="E-mail Address">
                </div>
            </div>
            <br>
            <center><input type="submit" class="btn btn-raised btn-primary" value="ADD ESTABLISHMENT"></center>
        </form>
    </section>

<?php
    require_once("footer.php");
?>