<?php

header('Access-Control-Allow-Origin: *');
setlocale(LC_ALL, 'pt_BR.UTF8');
include '../functions.inc2.php';

$puxaBD = new Crud();
$puxaBD->conn();
$puxaBD->setCharSet();


//setVar bancos
$file = file_get_contents("bd.cfg");
$contents = utf8_encode($file);
$bdinfo = json_decode($contents, true);

$db = $defaultdb = $bdinfo["default_db"];
$qExperimental = $bdinfo["questionarioExperimental"];
$qResumido = $bdinfo["qpjbr"];

$action = (string) filter_input(INPUT_GET, 'action');
$grupoid = filter_input(INPUT_GET, 'grupoid'); //codigo do grupo de pesquisa

$codgrp = (string) filter_input(INPUT_GET, 'codgrp'); //codigo do grupoExperimental
$sigla = (string) filter_input(INPUT_GET, 'sigla');
$senha = (string) filter_input(INPUT_GET, 'senha');
$usuarioAlvo = (string) filter_input(INPUT_GET, 'usuarioAlvo');

$puxaBD->selectDB($defaultdb);



if (isset($_GET["db"])) {
    $banco = (string) filter_input(INPUT_GET, 'db');
    if ($banco === "qpjbr") {
        $db = $qResumido;
    } else if ($banco == "experimental") {
        $db = $qExperimental;
    } else {
        $db = "ambos";
    }
} else {
    $db = "ambos";
}


if ($action == "testeBD") {
    echo "Iniciando teste <br>";
    echo "<br>";
    echo "db = " . $db;
    echo "<br>";
    echo "qExperimental = " . $qExperimental;
    echo "<br>";
    echo "Codgrp =  $codgrp";
    echo "<br>";
    echo "qResumido $qResumido";
    echo "<br>";
    echo "grupoid = " . $grupoid;
    echo "<br>";
    echo "sigla = " . $sigla;
    echo "<br>";
    echo "usuario = " . $usuarioAlvo;
    echo "<br>";
    echo "senha = " . $senha;
}

if ($action == "mofacts") {
    echo searchMofacts($sigla, $senha, $codgrp, $usuarioAlvo, $db, $defaultdb, $qExperimental, $qResumido);
}

if ($action === "exportaUsuario") {

    echo validaPedido($sigla, $senha, $codgrp, $usuarioAlvo, $db, $defaultdb, $qExperimental, $qResumido);
}

//http://localhost/git/GrupoDePesquisaManager/gpmApi.php?action=exportaUsuario&sigla=&senha=&usuarioAlvo=&codgrp=&db=
//http://localhost/git/GrupoDePesquisaManager/gpmApi.php?action=exportaUsuario&sigla=CAEDLAB&senha=123lab&usuarioAlvo=fernando.heb@gmail.com&codgrp=CAEDLAB1


function Login($sigla, $senha) {
    $puxaBD = new Crud();
    $puxaBD->conn();
    $puxaBD->setCharSet();

    $query = "SELECT GRP.ID, GRP.Nome_Grupo, GEXP.Codigo_G_Exp FROM `grupo_pesquisa` "
            . " AS GRP Inner Join grupo_experimental GEXP on GRP.ID = GEXP.Grupo_Pesquisa_ID "
            . " WHERE GRP.`Sigla` = '" . $sigla . "' AND GRP.`Senha` = '" . $senha . "' ";
    $puxaBD->selectDB($defaultdb);
    $res = $puxaBD->selectCustomQuery($query);

    $row_cnt = $res->num_rows;

    if ($row_cnt > 0) {
        return true;
    } else {
        return false;
    }
}

$puxaBD->close();

function searchMofacts($sigla, $senha, $codgrp, $usuarioAlvo, $db, $defaultdb, $qExperimental, $qResumido) {
    if (Login($sigla, $senha)) {
        $puxaBD = new Crud();
        $puxaBD->conn();
        $puxaBD->setCharSet();
        $puxaBD->selectDB($qResumido);
        $query = " ( Select r.Id as 'id', r.Codigo_G_Exp as 'grupo', r.nome as 'nome', r.idade as 'idade', r.email as 'email', r.genero, r.escolaridade, s.achiever as 'realizacao', s.relatedness as 'social', s.imersao, s.majoritario, "
                . " s.mecanica, s.competicao, s.avanco, s.relacionamento, s.trabalhoemequipe, s.roleplaying, s.customizacao, s.descoberta, s.escapismo,s.imersao, s.socializacao, "
                . " r.DATETIME as 'dataentrada', "
                . " 'Experimental' as 'TipoQuestionario' "
                . " from $qExperimental.soma s inner join $qExperimental.resposta r on s.idresposta = r.id "
                . " where email = '" . $usuarioAlvo . "'"
                . " order by r.DATETIME DESC"
                . " ) UNION ( "
                . " Select r.Id as 'id', r.Codigo_G_Exp as 'grupo', r.nome as 'nome', r.idade as 'idade', r.email as 'email', r.genero, r.escolaridade, s.achiever as 'realizacao', s.relatedness as 'social', s.imersao, s.majoritario,"
                . " s.mecanica, s.competicao, s.avanco, s.relacionamento, s.trabalhoemequipe, s.roleplaying, s.customizacao, s.descoberta, s.escapismo,s.imersao, s.socializacao, "
                . " r.DATETIME as 'dataentrada', "
                . " 'QPJBR' as 'TipoQuestionario' "
                . " from " . $qResumido . ".soma s inner join " . $qResumido . ".resposta r on s.idresposta = r.id "
                . " where email = '" . $usuarioAlvo . "'"
                . " order by r.DATETIME DESC "
                . " ) ";
     //   echo $query;
     //   echo "<br><br>";
        $res = $puxaBD->selectCustomQuery($query);
        $row_cnt = $res->num_rows;
        $puxaBD->close();
        if ($row_cnt > 0) {
            if (method_exists($res, 'fetch_all')) {
                $resultado = $res->fetch_all(MYSQLI_ASSOC);
            } else {
                $resultado = fetchAll($res);
            }
            $jason = json_encode($resultado);
     //       $puxaBD->close();
        } else {
            $jason = '[{"erro":"404", "msg":"Sem resposta para esse usuário"}]';
        }
        return $jason;
    } else {
        return '[{"erro":"403", "msg":"Usuário ou senha inválidos"}]';
    }
}

function validaPedido($sigla, $senha, $grupoExp, $emailUsuario, $db, $defaultdb, $qExperimental, $qResumido) {
    $puxaBD = new Crud();
    $puxaBD->conn();
    $puxaBD->setCharSet();

    $query = "SELECT GRP.ID, GRP.Nome_Grupo, GEXP.Codigo_G_Exp FROM `grupo_pesquisa` "
            . " AS GRP Inner Join grupo_experimental GEXP on GRP.ID = GEXP.Grupo_Pesquisa_ID "
            . " WHERE GRP.`Sigla` = '" . $sigla . "' AND GRP.`Senha` = '" . $senha . "' AND GEXP.Codigo_G_Exp = '" . $grupoExp . "'";
    $puxaBD->selectDB($defaultdb);
    $res = $puxaBD->selectCustomQuery($query);

    $row_cnt = $res->num_rows;

    if ($row_cnt > 0) {
        $row_cnt = 0;


        if ($db === "ambos") {
            $puxaBD->selectDB($qResumido);
            $query = "( SELECT id FROM " . $qResumido . ".`resposta` WHERE `Codigo_G_Exp` = '" . $grupoExp . "' and `email` = '" . $emailUsuario . "' )"
                    . " UNION "
                    . "( SELECT id FROM " . $qExperimental . ".`resposta` WHERE `Codigo_G_Exp` = '" . $grupoExp . "' and `email` = '" . $emailUsuario . "' )";
        } else {
            $puxaBD->selectDB($db);
            $query = "SELECT id FROM `resposta` WHERE `Codigo_G_Exp` = '" . $grupoExp . "' and `email` = '" . $emailUsuario . "'";
        }
        $res = $puxaBD->selectCustomQuery($query);
        $row_cnt = $res->num_rows;
        $puxaBD->close();
        if ($row_cnt > 0) {
            return exportaUsuario($grupoExp, $emailUsuario, $db, $qExperimental, $qResumido);
        } else {
            return '[{"erro":"404", "msg":"Sem resposta para esse usuário, no grupo experimental desejado"}]';
        }
    } else {
        return '[{"erro":"403", "msg":"Sigla do grupo, senha e código do grupo experimental não combinam"}]';
    }
}

function exportaUsuario($grupo, $email, $db, $qExperimental, $qResumido) {
    $puxaBD = new Crud();
    $puxaBD->conn();
    $puxaBD->setCharSet();

    if ($db === "ambos") {
        $puxaBD->selectDB($qResumido);


        $string = " ( Select r.Id as 'id', r.Codigo_G_Exp as 'grupo', r.nome as 'nome', r.idade as 'idade', r.email as 'email', r.genero, r.escolaridade, s.achiever as 'realizacao', s.relatedness as 'social', s.imersao, s.majoritario, "
                . " s.mecanica, s.competicao, s.avanco, s.relacionamento, s.trabalhoemequipe, s.roleplaying, s.customizacao, s.descoberta, s.escapismo,s.imersao, s.socializacao, "
                . " r.DATETIME as 'dataentrada', "
                . " 'Experimental' as 'TipoQuestionario' "
                . " from $qExperimental.soma s inner join $qExperimental.resposta r on s.idresposta = r.id "
                . " where r.codigo_g_exp = '" . $grupo . "'"
                . " AND email = '" . $email . "'"
                . " order by r.DATETIME DESC"
                . " ) UNION ( "
                . " Select r.Id as 'id', r.Codigo_G_Exp as 'grupo', r.nome as 'nome', r.idade as 'idade', r.email as 'email', r.genero, r.escolaridade, s.achiever as 'realizacao', s.relatedness as 'social', s.imersao, s.majoritario,"
                . " s.mecanica, s.competicao, s.avanco, s.relacionamento, s.trabalhoemequipe, s.roleplaying, s.customizacao, s.descoberta, s.escapismo,s.imersao, s.socializacao, "
                . " r.DATETIME as 'dataentrada', "
                . " 'QPJBR' as 'TipoQuestionario' "
                . " from " . $qResumido . ".soma s inner join " . $qResumido . ".resposta r on s.idresposta = r.id "
                . " where r.codigo_g_exp = '" . $grupo . "'"
                . " AND email = '" . $email . "'"
                . " order by r.DATETIME DESC "
                . " ) ";
    } else {
        $puxaBD->selectDB($db);

        $string = " Select r.Id as 'id', r.Codigo_G_Exp as 'grupo', r.nome as 'nome', r.idade as 'idade', r.email as 'email', r.genero, r.escolaridade, s.achiever as 'realizacao', s.relatedness as 'social', s.imersao, s.majoritario, "
                . " s.mecanica, s.competicao, s.avanco, s.relacionamento, s.trabalhoemequipe, s.roleplaying, s.customizacao, s.descoberta, s.escapismo,s.imersao, s.socializacao,"
                . " r.DATETIME as 'dataentrada'"
                . " from soma s inner join resposta r on s.idresposta = r.id"
                . " where r.codigo_g_exp = '" . $grupo . "'"
                . " AND email = '" . $email . "'"
                . " order by r.DATETIME ASC";
    }
    $res = $puxaBD->selectCustomQuery($string);
    //echo $db . "<br>";
    //echo $string . "<br>";
    if ($res->num_rows > 0) {

        if (method_exists($res, 'fetch_all')) {
            $resultado = $res->fetch_all(MYSQLI_ASSOC);
        } else {
            $resultado = fetchAll($res);
        }
        $jason = json_encode($resultado);
        $puxaBD->close();
    } else {

        $jason = '[{"erro":"404", "msg":"Não foram encontrados resultados"}]';
    }
    return $jason;
}

?>
