<?php

    session_start();   
        $logado = false;   
         
        if(isset($_SESSION["numLogin"])){
            $n1=filter_input(INPUT_GET, "ses");                    
            $n2=$_SESSION["numLogin"];
            if ($n1 == $n2) {                
                $logado = true; 
                $usuario["idUser"]    =     $_SESSION["idUser"] ; 
                $usuario["emailResp"] =    $_SESSION["emailResp"] ; 
                $usuario["nomeGrp"]   =    $_SESSION["nomeGrp"] ; 
                $usuario["Sigla"]     =     $_SESSION["Sigla"] ; 
                $usuario["numLogin"]  =  $_SESSION["numLogin"] ;  
                
            }
        }
        
        if ($logado === false) {
            $usuario = "Guest";
        }
?>
