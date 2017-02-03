<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        
        <!-- Mobile support -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <title>Regis</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="css/bootstrap.css">

        <!-- Bootstrap Material Design -->
        <link href="css/bootstrap-material-design.css" rel="stylesheet">
        <link href="css/ripples.css" rel="stylesheet">
        
        <!-- Regis Styling-->
        <link href="css/style.css" rel="stylesheet">
        <link href="css/fonts.css" rel="stylesheet">
        
        <!-- Font Awesome -->
        <link href="css/font-awesome.css" rel="stylesheet">
        
        <!-- Favicon -->
        <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
        <link rel="icon" href="img/favicon.ico" type="image/x-icon">
    </head>
    <body class="login-page">
        <div class="container-fluid">
            <div class="row login-main">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-header">
                        Login to Regis
                    </div>
                    
                    <form class="form-horizontal" method="post" action="login-authentication.php">
                        <fieldset>  
                            <div class="form-group">
                                <label for="email" class="col-md-2 control-label">Username</label>

                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="username">
                                </div>
                            </div>  
                            
                            <div class="form-group regis-password-show">
                                <label for="password" class="col-md-2 control-label">Password</label>

                                <div class="col-md-10 regis-password-box">
                                    <input type="password" class="form-control regis-password" name="password">
                                </div>
                                <i class="fa fa-eye show-off" id="showPassword"></i>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-md-offset-2 col-md-10">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember-me"> Remember Me
                                        </label>
                                        <p class="help-block">Log me in automatically the next time I visit</p>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="login-form-btns">
                                    <input type="submit" class="btn btn-raised btn-primary" value="LOGIN">
                                    <a href="javascript:void(0)" class="btn btn-raised btn-primary">Register</a>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>        

</body>
</html>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/material.js"></script>
<script type="text/javascript" src="js/ripples.js"></script>
<script type="text/javascript" src="js/login.js"></script>
<script type="text/javascript" src="js/show-password.js"></script>
<script>$.material.init();</script>
