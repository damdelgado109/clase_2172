<?php



        if(isset($_SERVER['argv'][1]) ){

            print_r($_SERVER['argv'][1]."\n");


            if($_SERVER['argv'][1] == "Instalacion"){

                include("comandos/instalador.php");
            
            }elseif($_SERVER['argv'][1] == "CSVAutoresBorrado"){

                include("comandos/csvAutoresBorrados.php");
            
            }else{

                print_r($_SERVER['argv']);
            }

        }else{

            print_r("No se paso ningun argumento");


        }

















?>