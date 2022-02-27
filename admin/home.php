<?php 
    include './includes/session.php';
    include './includes/format.php';
?>
<?php
    $today = date('Y-m-d');
    $year = date('Y');
    if(isset($_GET['year'])) {
        $year = $_GET['year'];
    }

    $conn = $pdo->open();
?>
<?php include './includes/header.php' ?>
<body>
    <div class="page-wrapper chiller-theme toggled">
        <?php include './includes/sidebar.php'; ?>

        <main class="page-content">
            <div class="content-header">
                <h2>Dashboard</h2>
                <hr>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-tachometer-alt"></i> Home</a></li>
                    <li class="active">Dashboard</li>
                </ol>
            </div>
            <!-- Main Content -->
            <section class="content">
                <?php
                    if(isset($_SESSION['error'])){
                    echo "
                        <div class='alert alert-danger alert-dismissible'>
                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                        <h4><i class='icon fa fa-warning'></i> Error!</h4>
                        ".$_SESSION['error']."
                        </div>
                    ";
                    unset($_SESSION['error']);
                    }
                    if(isset($_SESSION['success'])){
                    echo "
                        <div class='alert alert-success alert-dismissible'>
                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                        <h4><i class='icon fa fa-check'></i> Success!</h4>
                        ".$_SESSION['success']."
                        </div>
                    ";
                    unset($_SESSION['success']);
                    }
                ?>
                <div class="row">
                    <div class="col-lg-3 col-xs-6">
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <?php
                                    $stmt = $conn->prepare("SELECT * FROM details LEFT JOIN product ON product.product_id=details.pro_id");
                                    $stmt->execute();

                                    $total = 0;
                                    foreach($stmt as $srow){
                                        $subtotal = $srow['product_price'] * $srow['qty'];
                                        $total += $subtotal;
                                    }
                                ?>
                                <h3>&#x20B9; <?=number_format_short($total, 2)?></h3>
                                <p>Total Sales</p>
                            </div>
                            <div class="icon"><i class="fa fa-shopping-cart"></i></div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xs-6">
                        <div class="small-box bg-green">
                            <div class="inner">
                            <?php
                                $stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM product");
                                $stmt->execute();
                                $prow =  $stmt->fetch();
                            ?>
                                <h3><?=$prow['numrows']?></h3>
                                <p>Number of Products</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-barcode"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xs-6">
                        <div class="small-box bg-yellow">
                            <div class="inner">
                            <?php
                                $stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM customer");
                                $stmt->execute();
                                $urow =  $stmt->fetch();
                            ?>
                                <h3><?=$urow['numrows']?></h3>
                                <p>Number of users</p>
                            </div>
                            <div class="icon"><i class="fa fa-users"></i></div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xs-6">
                        <div class="small-box bg-red">
                            <div class="inner">
                                <?php
                                    $stmt = $conn->prepare("SELECT * FROM details LEFT JOIN payment ON payment.id=details.sales_id LEFT JOIN product ON product.product_id=details.pro_id WHERE sale_date=:sales_date");
                                    $stmt->execute(['sales_date'=>$today]);

                                    $total = 0;
                                    foreach($stmt as $trow){
                                    $subtotal = $trow['product_price']*$trow['qty'];
                                    $total += $subtotal;
                                    }                                    
                                ?>
                                <h3>&#x20B9; <?=number_format_short($total, 2)?></h3>
                                <p>Sales Today</p>
                            </div>
                            <div class="icon"><i class="fas fa-coins"></i></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-3">
                                    <div>
                                        <?php
                                            for($m = 1; $m <=12; $m++){
                                                try{
                                                    $stmt = $conn->prepare("SELECT * FROM details LEFT JOIN payment ON payment.id=details.sales_id LEFT JOIN product ON product.product_id=details.pro_id WHERE MONTH(sale_date)=:month");
                                                    $stmt->execute(['month'=>$m]);
                                                    $total = 0;
                                                    foreach($stmt as $srow){
                                                        $subtotal = $srow['product_price'] * $srow['qty'];
                                                        $total += $subtotal;
                                                    }
                                                }
                                                catch(PDOException $e){
                                                    echo $e->getMessage();
                                                }
                                            }
                                        ?>
                                        <h3 class="m-0">&#x20B9; <?=number_format($total, 2); ?></h3>
                                        <p>Total earnings of this month</p>
                                    </div>
                                    <div>
                                        <ul>
                                            <li class="d-inline-block mr-3">
                                                <a href="#" class="text-dark">Day</a>
                                            </li>
                                            <li class="d-inline-block mr-3">
                                                <a href="#" class="text-dark">Week</a>
                                            </li>
                                            <li class="d-inline-block mr-3">
                                                <a href="#" class="text-dark">Month</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="chart-wrapper">
                                    <div class="chartjs-size-monitor">
                                        <div class="chartjs-size-monitor-expand">
                                        <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                                        </div>
                                        <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                        <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                                        </div>
                                    </div>
                                    <canvas id="lineChart" height="280" style="display: block; width: 1222px; height: 280px;" width="1222" class="chartjs-render-monitor"></canvas>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
    <?php
        $day = array();
        $week = array();
        $months = array();
        $sales = array();

        for($m = 1; $m <=12; $m++){
            try{
                $stmt = $conn->prepare("SELECT * FROM details LEFT JOIN payment ON payment.id=details.sales_id LEFT JOIN product ON product.product_id=details.pro_id WHERE MONTH(sale_date)=:month");
                $stmt->execute(['month'=>$m]);
                $total = 0;
                foreach($stmt as $srow){
                    $subtotal = $srow['product_price'] * $srow['qty'];
                    $total += $subtotal;
                }
                array_push($sales, round($total, 2));
            }
            catch(PDOException $e){
                echo $e->getMessage();
            }

            $num = str_pad($m, 2, 0, STR_PAD_LEFT);
            $month = date('M', mktime(0, 0, 0, $m, 1));
            array_push($months, $month);
        }

        $months = json_encode($months);
        $sales = json_encode($sales);
        $pdo->close();
    ?>
</body>
<script src="libraries/Chart.min.js"></script>
<?php include 'includes/scripts.php'; ?>
<script>
    (function ($) {
    "use strict"

    let ctx = document.getElementById("lineChart");
    ctx.height = 280;
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: <?php echo $months; ?>,
            type: 'line',
            defaultFontFamily: 'Poppins',
            datasets: [{
                data: <?php echo $sales; ?>,
                label: 'SALES',
                backgroundColor: 'rgba(132, 38, 255,1)',
                borderColor: 'rgba(132, 38, 255,1)',
                borderWidth: 1,
                pointStyle: 'circle',
                pointRadius: 3,
                pointBorderColor: 'rgba(132, 38, 255,1)',
                pointBackgroundColor: 'rgba(132, 38, 255,1)',
            },]
        },
        options: {
            responsive: !0,
            maintainAspectRatio: false,
            tooltips: {
                mode: 'index',
                titleFontSize: 12,
                titleFontColor: '#fff',
                bodyFontColor: '#fff',
                backgroundColor: '#000',
                titleFontFamily: 'Poppins',
                bodyFontFamily: 'Poppins',
                cornerRadius: 3,
                intersect: false,
            },
            legend: {
                display: false,
                position: 'top',
                labels: {
                    usePointStyle: true,
                    fontFamily: 'Poppins',
                },


            },
            scales: {
                xAxes: [{
                    display: true,
                    gridLines: {
                        display: true,
                        drawBorder: false
                    },
                    scaleLabel: {
                        display: false,
                        labelString: 'Month'
                    }
                }],
                yAxes: [{
                    display: true,
                    gridLines: {
                        display: true,
                        drawBorder: false
                    },
                    scaleLabel: {
                        display: true,
                        labelString: 'Value'
                    },
                    ticks: {
                        max: 100000,
                        min: 0,
                        stepSize: 10000
                    }
                }]
            },
            title: {
                display: false,
            }
        }
    });
})(jQuery);
</script>
