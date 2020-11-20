<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>FP LBE NCC Kel 4</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- jQuery and JS bundle w/ Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/small-business.css" rel="stylesheet">
    <style>
        .card-body-mid {
            color: white;
        }
    </style>




    <script type = "text/javascript" src = "https://www.gstatic.com/charts/loader.js">
      </script>
      <script type = "text/javascript">
         google.charts.load('current', {packages: ['corechart']});     
      </script>
     
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Pokemon's Detail</a>
        </div>
    </nav>
    <div class="container">

        <?php
            include('simple_html_dom.php');
            
            $url = "pokemondb.net";
            $pokemon = $url."/pokedex/";
            $img = $url."/artwork/";
            $coba = strtolower($_GET['type']);
            $nama = $_GET['type'];
            $pokemon = "https://".$pokemon.$coba;
            $img = "https://img.".$img.$coba.".jpg";
            $html = file_get_html($pokemon);

            $vital = $html -> find('table[class=vitals-table]',0);
            $vital = $vital -> find('tbody',0);
            $tambah = $html -> find('table[class=vitals-table]',1);
            $tambah = $tambah -> find('tbody',0);
            
            $catch=$tambah->children(1)->plaintext;
            $growth=$tambah->children(4)->plaintext;

            $national = $vital->children(0)->plaintext;
            $type = $vital->children(1)->plaintext;
            $species = $vital->children(2)->plaintext;
            $height = $vital->children(3)->plaintext;
            $weight = $vital->children(4)->plaintext;
            $ability = $vital->children(5)->plaintext;





            $stats=$html->find('table[class=vitals-table]',3);
            $stats=$stats->find('tbody',0);
            
            $hp=$stats->children(0)->children(1)->plaintext;
            $attack=$stats->children(1)->children(1)->plaintext;
            $hp=$stats->children(2)->children(1)->plaintext;
            $hp=$stats->children(3)->children(1)->plaintext;
            $hp=$stats->children(4)->children(1)->plaintext;
            $hp=(int)$hp;
            
        ?>
        <!-- Heading Row -->
    <div class="row align-items-center my-5">
      <div class="col-lg-7">
        <?php
            echo "<img src=$img></img>";
        ?>
      </div>
      <!-- /.col-lg-8 -->
      <div class="col-lg-5">
        <?php
            echo "<h1>$nama</h1>";
            echo "<p>$type</p>";
            echo "<p>$species</p>";
            echo "<p>$catch</p>";
            echo "<p>$growth</p>";
            
        ?>
        
      </div>
      <!-- /.col-md-4 -->
    </div>
    <!-- /.row -->

    <!-- Call to Action Well -->
    <div class="card text-white bg-secondary my-5 py-4 text-center">
      <div class="card-body-mid">
          <?php
            echo "<div>$ability</div>";
          ?>
      </div>
    </div>

    <!-- Content Row -->
    <div class="row">
      <div class="col-md-4 mb-5">
        <div class="card h-100">
          <div class="card-body">
            <h2 class="card-title">National</h2>
            <div class="card-text">
            <?php
                echo "<h3>$national</h3>";
            ?>
            </div>
          </div>
        </div>
      </div>
      <!-- /.col-md-4 -->
      <div class="col-md-4 mb-5">
        <div class="card h-100">
          <div class="card-body">
            <h2 class="card-title">Height</h2>
            <div class="card-text">
            <?php
                echo "<h3>$height</h3>";
            ?>
            </div>
          </div>
        </div>
      </div>
      <!-- /.col-md-4 -->
      <div class="col-md-4 mb-5">
        <div class="card h-100">
          <div class="card-body">
            <h2 class="card-title">Weight</h2>
            <div class="card-text">
            <?php
                echo "<h3>$weight</h3>";
            ?>
            </div>
          </div>
        </div>
      </div>
      <!-- /.col-md-4 -->

    </div>
    <!-- /.row -->
        <a href="index.php" class="btn btn-danger" role="button">Back</a>
    </div>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <div id = "container" style = "width: 550px; height: 400px; margin: 0 auto">
      </div>
      <script language = "JavaScript">
         function drawChart() {
            // Define the chart to be drawn.
            var num = <?php echo $hp ?>;
            var data = google.visualization.arrayToDataTable([
               
               ['2012',  num],
               ['2013',  10],
               ['2014',  17],
               ['2015',  12],
               ['2016',  15]
            ]);

            var options = {title: 'Base status'}; 

            // Instantiate and draw the chart.
            var chart = new google.visualization.BarChart(document.getElementById('container'));
            chart.draw(data, options);
         }
         google.charts.setOnLoadCallback(drawChart);
      </script>
</body>

</html>