<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FP LBE NCC Kel 4</title>
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
        
        $url = "pokemondb.net";
        $pokemon = $url."/pokedex/";
        $img = $url."/artwork/";
        $coba = strtolower($_GET['type']);
        $pokemon = "https://".$pokemon.$coba;
        $img = "https://img.".$img.$coba.".jpg";
        $html = file_get_html($pokemon);

        $vital = $html -> find('table[class=vitals-table]',0);
        $vital = $vital -> find('tbody',0);

        $national = $vital->children(0)->plaintext;
        $type = $vital->children(1)->plaintext;
        $species = $vital->children(2)->plaintext;
        $height = $vital->children(3)->plaintext;
        $weight = $vital->children(4)->plaintext;
        $ability = $vital->children(5)->plaintext;

        echo "<div>$coba</div>";
        echo "<img src=$img></img>";
        echo "<div>$national</div>";
        echo "<div>$type</div>";
        echo "<div>$species</div>";
        echo "<div>$height</div>";
        echo "<div>$weight</div>";
        echo "<div>$ability</div>";
    ?>

    </div>
</body>

</html>