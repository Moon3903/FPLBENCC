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
    <script type = "text/javascript" src = "https://www.gstatic.com/charts/loader.js"></script>
    <script type = "text/javascript">
        google.charts.load('current', {packages: ['corechart']});     
    </script>
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="#">Pokemon</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="index.php">Home</a>
                <a class="nav-item nav-link active" href="type.php">Details <span class="sr-only">(current)</span></a>
            </div>
        </div>
    </nav>
    <div class="container">
        <?php
            include('simple_html_dom.php');
            
            $url = "pokemondb.net";
            $pokedex = "https://".$url."/pokedex/";
            $img = $url."/artwork/";
            $typeUrl = "https://".$url;
            $nama = strtoupper($_GET['type']);
            $coba = strtolower($_GET['type']);
            $pokemon = $pokedex.$coba;
            $img = "https://img.".$img.$coba.".jpg";
            $html = file_get_html($pokemon);
            $table = 'table[class=vitals-table]';
            $vital = $html -> find($table,0);
            $vital = $vital -> find('tbody',0);
            $tambah = $html -> find($table,1);
            $tambah = $tambah -> find('tbody',0);
            
            $catch=$tambah->children(1)->plaintext;
            $growth=$tambah->children(4)->plaintext;
            $national = $vital->children(0)->plaintext;
            $type = $vital->children(1)->plaintext;
            $species = $vital->children(2)->plaintext;
            $height = $vital->children(3)->plaintext;
            $weight = $vital->children(4)->plaintext;
            $ability = $vital->children(5)->plaintext;

            $stats=$html->find($table,3);
            $stats=$stats->find('tbody',0);
            
            $hp=$stats->children(0)->children(1)->plaintext;
            $atk=$stats->children(1)->children(1)->plaintext;
            $def=$stats->children(2)->children(1)->plaintext;
            $spatk=$stats->children(3)->children(1)->plaintext;
            $spdef=$stats->children(4)->children(1)->plaintext;
            $spd=$stats->children(5)->children(1)->plaintext;


            $hp=(int)$hp;
            $atk=(int)$atk;
            $def=(int)$def;
            $spatk=(int)$spatk;
            $spdef=(int)$spdef;
            $spd=(int)$spd;
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
                <a class="btn btn-primary" href="#">More</a>
            </div>
            <!-- /.col-md-4 -->
        </div>
        <!-- /.row -->

        <div id = "container" style = "width: 800px; height: 600tpx; margin: 0 auto">
            <script language = "JavaScript">
                function drawChart() {
                    // Define the chart to be drawn.
                    var hp = <?php echo $hp ?>;
                    var atk =<?php echo $atk ?>;
                    var def =<?php echo $def ?>;
                    var spatk =<?php echo $spatk ?>;
                    var spdef =<?php echo $spdef ?>;
                    var spd =<?php echo $spd ?>;

                    var data = google.visualization.arrayToDataTable([
                    ['Year', 'point'],
                    ['hp',  hp],
                    ['Attack',  atk],
                    ['Defense',  def],
                    ['Sp.Atk',  spatk],
                    ['Sp.Def',  spdef],
                    ['speed',  spd]
                    ]);

                    var options = {title: 'Base status',is3D :false,width: 800,
                                height: 240,showRowNumber: true}; 

                    // Instantiate and draw the chart.
                    var chart = new google.visualization.BarChart(document.getElementById('container'));
                    chart.draw(data, options);
                }
                google.charts.setOnLoadCallback(drawChart);
            </script>
        </div>

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
            <br>
            <!-- /.col-md-4 -->
        </div>
        <div class="rekom">
            <?php
            $rekomtype = explode(" ",$type);
            $rekomtype = $rekomtype[3];
            
            $rekomtype = strtolower($rekomtype);
            $typeUrl = $typeUrl."/type/".$rekomtype;
            $typehtml = file_get_html($typeUrl);
            $typeTable = $typehtml -> find('div[class=infocard-list infocard-list-pkmn-md]',0);
            $rekomPokemon = array("-1","-1","-1");
            $i=0;
            $k=0;
            while(True){
                $cur = $typeTable->children($k)->children(1)->children(0)->href;
                $cur = explode("/",$cur);
                $cur = $cur[2];
                if($i==0){
                    if ($cur != $nama){
                        $rekomPokemon[0] = $pokedex.$cur;
                        $i = $i + 1;
                    }
                }
                else{
                    if ($cur != $nama){
                        if($pokedex.$cur != $rekomPokemon[$i-1] ){
                            $rekomPokemon[$i] = $pokedex.$cur;
                            $i = $i + 1;
                        }
                    }
                }
                if($i > 3){
                    break;
                }
                $k=$k+1;
            }
    
            
            ?>
        </div>

        <h2>Recommended for you</h2>
        
        <div class="row">
            <div class="col-md-4 mb-5">
                <div class="card h-100">
                    <div class="card-body">
                        <h2 class="card-title">1</h2>
                        <div class="card-text">
                            <?php
                                echo "<h3>$rekomPokemon[1]</h3>";
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col-md-4 -->
            <div class="col-md-4 mb-5">
                <div class="card h-100">
                    <div class="card-body">
                        <h2 class="card-title">2</h2>
                        <div class="card-text">
                            <?php
                                echo "<h3>$rekomPokemon[2]</h3>";
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col-md-4 -->
            <div class="col-md-4 mb-5">
                <div class="card h-100">
                    <div class="card-body">
                        <h2 class="card-title">3</h2>
                        <div class="card-text">
                            <?php
                                echo "<h3>$rekomPokemon[3]</h3>";
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <!-- /.col-md-4 -->
        </div>
        <a href="index.php" class="btn btn-danger" role="button">Back</a>
    </div>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>