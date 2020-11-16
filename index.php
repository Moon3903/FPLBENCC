<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belajar (Gacha) Scrapping Genshin Impact 1</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style>
        .gacha {
            height: 50vh;
            width: 90vw;
        }
    </style>
</head>

<body>
    <?php
        include('simple_html_dom.php');
        
        // $url = "https://pokemondb.net/pokedex/all";
        $wiki = "https://pokemondb.net/pokedex/all";
        $html = file_get_html($wiki);

        $table = $html->find('table[class=article-table sortable]',0);
        $tableBody= $table->find('tbody',0);
    ?>

    <div class="container mx-auto">
        <table class='table table-striped table-dark '>
            <thead class='thead-dark'>
                <tr>
                    <th style="width:5%">National No</th>
                    <th style="width:25%">Images</th>
                    <th style="width:20%">Name</th>
                    <!-- <th style="width:10%">Element</th>
                    <th style="width:15%">Weapon</th>
                    <th style="width:10%">Sex</th>
                    <th style="width:15%">Nation</th> -->
                </tr>
            </thead>
            <!-- <tbody> -->
            <?php
                $i=0;
                foreach (array_slice($tableBody->find('tr'),1) as $rowChar) {
                   
                    // $rarity=str_replace(" ","",$rowChar->children(0)->plaintext);
                    
                    // $imagesUrl=$rowChar->children(1)->children(0)->href;
                    // $imagesUrlEXP=explode(".png",$imagesUrl);
                    // $imagesUrl=$imagesUrlEXP[0].".png";
                    
                    // $name=str_replace(" ","",$rowChar->children(2)->plaintext);
                    // $nameRef=$url.$rowChar->children(2)->children(0)->href;
                    
                    // $element=$rowChar->children(3)->plaintext;

                    // $weapon=$rowChar->children(4)->plaintext;

                    // $sex=$rowChar->children(5)->plaintext;

                    // $nation=str_replace(" ","",$rowChar->children(6)->plaintext);
                    
                    // echo "<tr>";
                    //     echo "<td>".$rarity."</td>";
                    //     echo "<td><img src='".$imagesUrl."'></img></td>";
                    //     echo "<td>".$name."</td>";
                    //     echo "<td>".$element."</td>";
                    //     echo "<td>".$weapon."</td>";
                    //     echo "<td>".$sex."</td>";
                    //     echo "<td>".$nation."</td>";
                    // echo "</tr>";
                    // $chara[$i]=array('Rarity'=>$rarity,
                    //                 'Images'=>$imagesUrl,
                    //                 'Name'=>$name,
                    //                 'NameRef'=>$nameRef,
                    //                 'Element'=>$element,
                    //                 'Weapon'=>$weapon,
                    //                 'Sex'=>$sex,
                    //                 'Nation'=>$nation);
                    // $i=$i+1;
                }
            ?>
        </table>

        <!-- <h1>Gacha dulu</h1>
        <div class="container mx-auto gacha">

            <form method='POST' action="<?php echo($_SERVER['PHP_SELF']."#gacha") ?>">
                <input type="hidden" name="type" value="1">
                <button type="submit">Roll 1x</button>
            </form>
            <form method='POST' action="<?php echo($_SERVER['PHP_SELF']."#gacha") ?>">
                <input type="hidden" name="type" value="10">
                <button type="submit">Roll 10x</button>
            </form>
            <?php
                $link_address = "google.com";
                if (isset($_POST)) {
                    if (isset($_POST['type'])) {
                        $type = $_POST['type']; 
                        if($type==1){
                            $gancha=mt_rand(0,21);
                            $link_address = $link_address . "#";
                            $link_address = $link_address . $chara[$gancha]["Name"];
                            echo "<div id='gacha'>";
                            echo "<div class='row'>
                                    <div class='col-md-5 col-xs-5 col-lg-3 gachaImage'>
                                        <img src=".$chara[$gancha]["Images"]." alt=".$chara[$gancha]["Name"].">
                                    </div>
                                    <div class='col-md-6 col-xs-5 col-lg-5 gachaInfo'>
                                        <div>Rarity: ".$chara[$gancha]["Rarity"]."</div>
                                        <div>Nama: ".$chara[$gancha]["Name"]."</div>
                                        <div>Element:".$chara[$gancha]["Element"]."</div>
                                        <div>Weapon: ".$chara[$gancha]["Weapon"]."</div>
                                        <div>Sex: ". $chara[$gancha]["Sex"]."</div>
                                        <div>Nation: ".$chara[$gancha]["Nation"]."</div>
                                    </div>
                                </div>";
                            echo "</div>";  
                            echo "<a href='".$link_address."'>Link</a>";
                        }
                        if($type==10){
                            for ($i=0; $i < 10; $i++) { 
                                $gancha=mt_rand(0,21);
                                echo "<div id='gacha'>";
                                echo "<div class='row'>
                                        <div class='col-md-5 col-xs-5 col-lg-3 gachaImage'>
                                            <img src=".$chara[$gancha]["Images"]." alt=".$chara[$gancha]["Name"].">
                                        </div>
                                        <div class='col-md-6 col-xs-5 col-lg-5 gachaInfo'>
                                            <div>Rarity: ".$chara[$gancha]["Rarity"]."</div>
                                            <div>Nama: ".$chara[$gancha]["Name"]."</div>
                                            <div>Element:".$chara[$gancha]["Element"]."</div>
                                            <div>Weapon: ".$chara[$gancha]["Weapon"]."</div>
                                            <div>Sex: ". $chara[$gancha]["Sex"]."</div>
                                            <div>Nation: ".$chara[$gancha]["Nation"]."</div>
                                        </div>
                                    </div>";
                                echo "</div>";
                            }
                        }
                        unset($_POST['type']);
                    }
                    
                }
            ?>

        </div> -->

    </div>
</body>

</html>