<?php
    session_start(); 
    $_SESSION['current-page'] = 'page-views';
    require_once("header.php");

?>
    <!-- Content Header (Page header) -->

    <section class="content-header">
        <h1>
            Page Views
        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        </ol>
    </section>
        
    <!-- Main content -->
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <center><div class="col-md-12" id="chart_div"></div></center>
                </div>
            </div>
        </div>
    </section>

<?php
    require_once("footer.php");
?>

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