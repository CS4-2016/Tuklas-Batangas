<?php
    session_start(); 
    $_SESSION['page'] = "contact";
    
    require_once("header.php");
?>
    <style>
        .map {
            min-width: 300px;
            min-height: 300px;
            width: 100%;
            height: 100%;
        }

        .contact-header {
            color: #ffe97c;
            background-color: #009688;
            height: 70px;
            font-family: 'Rancho', 'cursive';
            text-align:center;
            font-size: 27px;
            padding-top:15px;
        }
    </style>
    <div>
            <div class="tuklasbatangas-main-content tuklasbatangas-space <?php if(!empty($_SESSION['username'])){ echo "tuklasbatangas-admin";} ?>">
                <div class="container">
                    <div class="row">
                        
                            
                        <!-- PUT CONTENT HERE -->
                            
         <div class="tuklas-batangas-contact">
            <div class="col-md-offset-3 col-md-6">
            <div class="well well-sm" style="padding:0px;">
                <form action="sender.php" class="form-horizontal"  method="POST">
                    <fieldset>
                        <legend class="contact-header">Contact us</legend>
                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <input id="fname" name="fname" type="text" placeholder="First Name" class="form-control" required="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <input id="lname" name="lname" type="text" placeholder="Last Name" class="form-control" required="required">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <input id="email" name="email" type="text" placeholder="Email Address" class="form-control" required="required">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <input id="phone" name="phone" type="text" placeholder="Phone" class="form-control" required="required">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <textarea class="form-control" id="message" name="message" placeholder="Enter your message for us here. We will get back to you within 2 business days." rows="7" required="required"></textarea>
                            </div>
                        </div>
                        <div class="form-group"> 
                            <div class="col-md-10 col-md-offset-1">
                                <div class="g-recaptcha" data-sitekey="6LdqzhMUAAAAAL5RU1phSBwjhnr9lgc95clBQc8Q"></div>
                            </div>
				        </div>

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1 text-center">
                                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
        
    </div>
        
           </div>             <!-- END CONTENT-->
                        
                        
                    </div>
                </div>
            </div>
		<!-- #content -->

<?php require_once("footer.php"); ?>
 <script src="https://www.google.com/recaptcha/api.js" async defer></script>