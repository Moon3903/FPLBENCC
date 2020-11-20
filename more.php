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
        
        $html1= file_get_html($pokemon);
        

        $tambah = $html1 -> find('table[class=vitals-table]',1);
        $tambah = $tambah -> find('tbody',0);

        $catch=$tambah->children(1)->plaintext;
        $growth=$tambah->children(4)->plaintext;

        

        
        
        echo "<div>$catch</div>";
        echo "<div>$growth</div>";
        
    ?>

    </div>
</body>

</html>