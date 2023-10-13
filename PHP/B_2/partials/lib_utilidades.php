<?php
#ini_set('display_errors', 1);
function importar_dades_csv($nomFitxer)
{
    $fichero = fopen($nomFitxer, 'r');
    $diccionario = array();

    $keys = fgetcsv($fichero);

    while ($fila = fgetcsv($fichero)) {

       


        $product = array();
        for ($i = 1; $i < count($fila); $i++) {
            $product[$keys[$i]] = $fila[$i];
        }

        $diccionario[$fila[0]] = $product;
    }
    print_r($diccionario);
    return $diccionario;
}

function importar_dades0($nomFitxer)
{
    $fichero = fopen($nomFitxer, 'r');
    $diccionario = array();

    $keys = fgetcsv($fichero);

    while ($fila = fgetcsv($fichero)) {
        if (!isset($diccionario[$fila[0]])) {
            $diccionario[$fila[0]] = array();
        }

        $product = array();
        for ($i = 1; $i < count($fila); $i++) {
            $product[$keys[$i]] = $fila[$i];
        }

        array_push($diccionario[$fila[0]], $product);
    }
    return $diccionario;
}



function compra_clients($diccionario, $idCliente)
{
    $lista = "";
    foreach ($diccionario as $product_name => $product_list) {
        foreach ($product_list as $product_line) {
            if ($product_line["Cust_ID"] == $idCliente) {
                if ($lista != "") {
                    $lista = $lista . ", " . $product_name;
                } else {
                    $lista = $lista . $product_name;
                }
                break;
            }
        }
    }
    if ($lista != "") {
        $lista = $lista . ".";
    }
    return $lista;
}



function guarda_dades($diccionario, $filename)
{
    file_put_contents($filename, json_encode($diccionario));
}



function afegeix_compra($diccionario, $compra)
{
    if (!isset($diccionario[$compra[0]])) {
        $diccionario[$compra[0]] = array();
    }
    $keys = array_keys($compra);
    $dadesCompra = array();
    for ($i = 1; $i < count($compra); $i++) {
        $dadesCompra[$keys[$i]] = $compra[$keys[$i]];
    }
    array_push($diccionario[$compra[0]], $dadesCompra);

    return $diccionario;
}


function borrar_compra($diccionario, $compra)
{
    if (isset($diccionario[$compra[0]])) {
        foreach ($diccionario[$compra[0]] as $num => $linea_compra) {
            print_r($linea_compra);
            echo ("<br>");
            $encontrado = true;
            $keys = array_keys($linea_compra);
            for ($i = 0; $i < count($linea_compra); $i++) {
                if ($linea_compra[$keys[$i]] != $compra[$i + 1]) {
                    $encontrado = false;
                    break;
                }
            }


            echo $encontrado ? 'true' : 'false';

            echo ("<br>");
            if ($encontrado) {
                echo ($num);
                break;
            }
        }
        print_r($diccionario[$compra[0]][$num]);
        unset($diccionario[$compra[0]][$num]);
    }

    return $diccionario;
}



function importar_dades($nomFitxer)
{
    $fichero = fopen($nomFitxer, 'r');
    $diccionario = array();

    $keys = fgetcsv($fichero);

    while ($fila = fgetcsv($fichero)) {
        if (!isset($diccionario[$fila[0]])) {
            $diccionario[$fila[0]] = array();
        }

        $product = array();
        for ($i = 1; $i < count($fila); $i++) {
            if ($i == 3 || $i == 4) {
                $product[$keys[$i]] = intval($fila[$i]);
            } else {
                $product[$keys[$i]] = $fila[$i];
            }
        }

        array_push($diccionario[$fila[0]], $product);
    }
    return $diccionario;
}



function carregar_dades($nomFitxer)
{
    if (file_exists($nomFitxer)) {
        $json = file_get_contents($nomFitxer);
        $json_data = json_Decode($json, true);
    } else
        $json_data = array();
    return $json_data;
}

function autentificacion_ok($nomFitxer, $user, $passwd)
{ /* que carregue el fitxer users.csv  i comprove que existeix una fila amb $_REQUEST[“user”=user_id  y $_REQUEST[ “passwd”]
  */
    print_r($nomFitxer);
    $dic=importar_dades_csv($nomFitxer);
    var_dump($dic);
    if  (isset($dic[ $user] ) and $dic[ $user]["user_passwd"] == $passwd) {
                $_SESSION["user"]=$user;
                $_SESSION["user_name"]=$dic[$user]["user_name"];
                $_SESSION["user_role"]=$dic[$user]["user_role"];
                return true;
            }
        return False;
}
function autentificado()
{
    if (isset ($_SESSION["role"])) return $_SESSION["role"];
    return False; 
}
/*
print_r(autentificacion_ok("../recursos/seguro/users.csv", "admin1", "admin1"));
print_r($_SESSION);
print_r(autentificado());
*/
    /*


        $dic= array();
        $nomFitxer = 'fitxerProves.csv';
        $dic = importar_dades0($nomFitxer);
        //print_r($dic["prod_2"][1]);
        $listaClient = compra_clients($dic, "Cust_2");
        print_r($listaClient);
        guarda_dades($dic, "fitxer_compres.json");
        $product = ['prod_4', 'unknown', '2008-12-12', "1", "3", '', 'Cust_8'];
        $dic = borrar_compra($dic, $product);
        guarda_dades($dic, "fitxer_compres2.json");
         $product = array("product"=>'prod_5', "country"=>'USA', "date"=>'2008-12-12', "quantity"=>"7", "amount"=>"16", "card"=>'N', "Cust_ID"=>'Cust_36');
        //$product2 = ['prod_4', 'USA', '2008-12-12', "7", "16", 'N', 'Cust_36'];

        $dic = afegeix_compra($dic, $product);
        //$dic = afegeix_compra($dic, $product2);
        guarda_dades($dic, "fitxer_compres.json");

        echo("<br>");

        $dic = importar_dades($nomFitxer);
        guarda_dades($dic, "fitxer_compres3.json");

        echo("<br>");
        $dic = carregar_dades("fitxer_compres3.json");
        print_r($dic);

        echo("Fin");
    */

    ?>