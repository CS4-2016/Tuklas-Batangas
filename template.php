<?php
    session_start(); 
    require_once("header.php");
?>
    
    <div id="content">
            <div class="tuklasbatangas-main-content tuklasbatangas-space <?php if(!empty($_SESSION['username'])){ echo "tuklasbatangas-admin";} ?>">
                <div class="container">
                    <div class="row">
                        
                        
                        <!-- PUT CONTENT HERE -->
                            
                        <!-- KADA BAGONG ROW DAPAT MAY <div class="row"> </div> na bago tapos sa gitna nun ilalagay ang content para maging responsive-->
                           
                        <!-- END CONTENT-->
                        
                        
                    </div>
                </div>
            </div>  
		</div><!-- #content -->

<?php require_once("footer.php"); ?>
