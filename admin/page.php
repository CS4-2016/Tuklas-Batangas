<?php
    session_start(); 
    $_SESSION['page'] = 'page-rank';
    require_once("header.php");

?>
    
    <div id="content">
            <div class="tuklasbatangas-main-content tuklasbatangas-space <?php if(!empty($_SESSION['username'])){ echo "tuklasbatangas-admin";} ?>">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="tuklas-header">
                                Popular Pages
                            </div>
                            <br><br>
                            <center><div class="col-md-12" id="chart_div"></div></center>
                        </div>
                    </div>
                </div>
            </div>
		</div><!-- #content -->

<?php require_once("footer.php"); ?>

<!--Load the AJAX API-->
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $.ajax({
        url : "data.php",
        dataType : "JSON",
        success: function(result){
            google.charts.load('current', {
                'packages' : [ 'corechart' ]
            });
            google.charts.setOnLoadCallback(function() {
                drawChart(result); 
            });
        }
    });
    
    function drawChart(result){
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Name');
        data.addColumn('number', 'Page Views');
        
        var dataArray = [];
        $.each(result, function(i, obj){
            dataArray.push([ obj.establishment, parseInt(obj.visits) ]);
        });
        
        data.addRows(dataArray);
        
        var barchart_options = {
            title : 'Page Ranking',
            width: 525,
            height: 300,
            legend: 'none'
        };
        
        var barchart = new google.visualization.BarChart(document.getElementById('chart_div'));
        barchart.draw(data, barchart_options);
    }
});
</script>
