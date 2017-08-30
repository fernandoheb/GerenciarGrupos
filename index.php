<?php
session_start();
include 'valSes.php';
//header('Content-Type: text/html; charset=utf-8');
setlocale(LC_ALL, 'pt_BR.UTF8');
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <title>Gerenciar grupos de Pesquisa</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="./css/loginmodal.css">
        <link rel="stylesheet" href="./css/main.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="http://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js"></script>
        <script src="http://cdn.jsdelivr.net/jquery.validation/1.15.0/additional-methods.min.js"></script>


        <script src="./js/jquery.validate.min.js"></script>
        <script src="http://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js"></script>
        <script src="http://cdn.jsdelivr.net/jquery.validation/1.15.0/additional-methods.min.js"></script>
      <!--  <style>
            /* Remove the navbar's default margin-bottom and rounded borders */ 
            .navbar {
                margin-bottom: 0;
                border-radius: 0;
            }

            /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
            .row.content {height: 450px}

            /* Set gray background color and 100% height */
            .sidenav {
                padding-top: 20px;
                background-color: #f1f1f1;
                height: 150%;
            }

            /* Set black background color, white text and some padding */
            footer {
                background-color: #555;
                color: white;
                padding: 15px;
            }

            /* On small screens, set height to 'auto' for sidenav and grid */
            @media screen and (max-width: 767px) {
                .sidenav {
                    height: auto;
                    padding: 15px;
                }
                .row.content {height:auto;} 
            }

        </style> --!>
    </head>
    <body>
        <!--Barra de navegação-->
    <nav class="navbar navbar-inverse ">
        <div class="container-fluid">
            <div class="navbar-header">
                <div class="col-xs-3 "><ul class="nav navbar-nav atention">
                    
                    <li class="active home"><a href="#" ><strong>Home</strong></a></li></ul></div>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">                    
                    <span class="sr-only">Navegação</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>                        
                </button>
               
            </div>
            <div class="collapse navbar-collapse " id="myNavbar">
                <ul class="nav navbar-nav atention">
                    <!-- itens do menu -->
                    <li><a class="atention"href="#" id="novoRegistro2" onclick="register();"><strong> Registrar Grupo</strong></a></li>
                    <!--
                    
                    <li><a href="#">Projects</a></li>
                    <li><a href="#">Contact</a></li>-->
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#" data-toggle="modal" data-target="#login-modal"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li class="active">
                        <div class="dropdown" id="userDropdow">
                            <button class="btn btn-default dropdown-toggle btn-lg" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <span class="glyphicon glyphicon-user"></span> 
                                <a href="#" id="btnUsuario">
                                    <?php
                                    if (!$logado) {
                                        echo $usuario;
                                    } else {
                                        echo $usuario["Sigla"];
                                    }
                                    ?>
                                </a>
                                <span class="caret"></span>
                            </button>
                            <?php
                            if ($logado) {
                                echo ('<ul class="dropdown-menu" aria-labelledby="dropdownMenu1" id="ddLogado>'
                                . ' <li>'
                                . '<a class="btn btn-default sair text-center" onclick="Logoff()" id="sair" name="sair" role="button"><center><strong>Logoff.</strong></center></a>'
                                . '</li>'
                                . '</ul>');
                            }
                            ?>   
                        </div>        
                    </li>
                </ul>

            </div>
        </div>
    </nav>
    <!-- Modal de Login -->
    <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="loginmodal-container">
                <h1>Entre com sua Conta</h1><br>
                <form method="post" id="formLogin">
                    <input type="text" style="text-transform:uppercase" id="user" name="usuario" minlength="3" placeholder="Sigla do grupo"  required>
                    <br>
                    <input type="password" id="pass" name="senha" minlength="6" placeholder="senha"   required>                                      
                    <br>
                    <input type="submit" name="submitLogin" class="login loginmodal-submit" value="Login" id="btnLogin">
                </form>

                <div class="login-help">
                    <a class="atention" href="#"id="novoRegistro" data-dismiss="modal" onclick="register();">Registrar</a> - 
                    <a href="./remindme.php">Esqueci minha senha</a>
                </div>
            </div>
        </div>
    </div>
    <!--corpo da pagina-->
    <div class="container-fluid ">  
        <div class="row content">
            <!-- Menu Lateral esquerdo-->
            <div class="col-sm-3 col-md-2 col-lg-2 sidenav"> 
                <div class="well">
                    <center>              
                    <button type="button" class="btn btn-primary " name="exibirGrupos" id="exibirGrupos">Exibir Grupos <br> Experimentais</button>
                    </center>
                </div>
                <div class="well">       
                    <center>
                    <button type="button" class="btn btn-primary" name="novoExperimental" id="novoExperimental">Inserir Grupo <br> Experimental</button>
                    </center>
                </div>
            </div>
            <!-- Centro -->
            <div class=" col-sm-9 col-md-10 col-lg-10 div-body" name="mainDiv" id="mainDiv"> 
                <form method="post" id="MainForm">
                </form>
                <!--Body--> 
            </div>
        </div>
    </div>
    <!-- Roda pé-->
    <footer class="container-fluid text-center">
        <p>Laborat&oacute;rio de Computa&ccedil;&aacute;o Aplicada a Educa&ccedil;&aacute;o </p>
        <p>Universidade de S&atilde;o Paulo </p>
        <p>fernando.heb@gmail.com</p>
    </footer>

</body>
</html>

<script src="./criaForms.js"></script>

<script charset="utf-8">

                        //var div = $("#mainDiv");
                        var div = $("#MainForm");
                        var btn = operacao = null;
                        var logged = <?php
                            if ($logado) {
                                echo 1;
                            } else {
                                echo 0;
                            }
                            ?>;
                        if (logged == 0)
                            logged = false;
                        var usuario = <?php echo json_encode($usuario); ?>;
                        var sessao = '';
                        if (logged) {
                            sessao = "&ses=" + usuario["numLogin"];
                        } else {
                            sessao = '';
                        }
                        //alert(sessao);

                        //alert(logged);
                        //alert(usuario);
                        //console.log(usuario);

                        jQuery(document).ready(function () {
                            //   alert("ready");
                            operacao = iniciaHome();
                            $("#formLogin").validate();
                            $("#MainForm").validate();


                        });

                        $("#novoExperimental").click(function () {

                            div.empty();
                            if (logged) {
                                operacao = createFormNovoExperimental(div);
                                console.log(operacao);
                            } else {
                                operacao = naoEncontrado(div);
                                console.log("novo grupo " + operacao);
                            }

                        });

                        $("#exibirGrupos").click(function () {
                            div.empty();
                            if (logged) {
                                operacao = createFormExibirGrupos(div, usuario);
                                console.log(operacao);
                            } else {
                                operacao = naoEncontrado(div);
                                console.log("exibir " + operacao);
                            }
                        });

                        /*  
                         $("#btnLogin").click( function(e){
                         if($("#formLogin").valid()) {
                         Login();
                         
                         }
                         
                         });*/
                        $(".home").click(function (e) {
                            operacao = iniciaHome();

                        });






                        $("#formLogin").on('submit', function (e) {
                            //alert("hello");
                            e.preventDefault();
                            if ($("#formLogin").valid()) {
                                //alert("hello2");
                                operacao = "Login";
                                Login();

                            }

                        });

                        $("#MainForm").on('submit', function (e) {
                            //alert("form");
                            //alert($("#MainForm").valid());
                            e.preventDefault();
                            if ($("#MainForm").valid()) {

                                //var result = tryInsert(div);
                                //alert("op = "+operacao);
                                /*if (operacao === "inserir_novo_experimental"){
                                 inserirNovoExperimental();               
                                 } else if (operacao === "inserir_novo_grupo") {
                                 inserirNovoGrupo();
                                 } */
                                inserirMainForm();

                            } else {
                                alert("Não foi possível realizar a operação");
                            }
                        });

                        function register() {
                            div.empty();
                            operacao = createFormNovoGrupo(div);

                            $("#inputNomeGrupo").focus();
                            console.log(operacao);
                        }

                        function iniciaHome() {
                            div.empty();
                            textoInicial(div);
                            return "Home";
                        }
                        function recuperagrupos(id) {
                            var acao = "./bdCom.php?action=retorna&" + id;

                        }

                        /*  function inserirNovoGrupo(){
                         var acao= "./bdCom.php?action="+operacao;
                         alert($('#MainForm').serialize());
                         $.ajax({
                         url : acao,
                         dataType: 'text',
                         data: $('#MainForm').serialize(),  //transforma o formulario em 1 linha por meio do POST para a pagina da URL; *dados do ajax para o php
                         type: 'POST',
                         // beforeSend: function(){
                         //         //$(".next-step").click();
                         //         console.log("ajax before");
                         // },
                         success: function(result){
                         // alert("logado "+result);        
                         alert(result);
                         },
                         error:function( xhr,status, error) {
                         alert("Erro cadastrar novo grupo");  
                         alert(xhr.responseText);             
                         
                         
                         }
                         });
                         }*/
                        function inserirMainForm() {
                            var acao = "./bdCom.php?action=" + operacao;
                            if (operacao == "inserir_novo_grupo") {
                                var verificaSigla = "./bdCom.php?action=verificaSigla&verifica=" + $("#inputSigla").val();
                                ajax(verificaSigla, null, 'text', 'POST', function (res) {
                                    if (res == "existe") {
                                        alert("Sigla já existente, por favor escolha outra sigla para seu grupo");
                                    } else {
                                        ajax(acao, $('#MainForm').serialize(), 'text', 'POST', function (e) {
                                            alert(e);
                                            iniciaHome();
                                        });
                                    }
                                });
                            } else {
                                ajax(acao, $('#MainForm').serialize(), 'text', 'POST', function (e) {
                                    alert(e);
                                    if (operacao === "inserir_novo_experimental") {
                                        $("#exibirGrupos").click();
                                    }
                                });
                            }
                            //alert($('#MainForm').serialize());
                            //ajax(acao,$('#MainForm').serialize(),'text','POST',alert);
                        }
                        /* 
                         function inserirNovoExperimental(){
                         var acao= "./bdCom.php?action="+operacao;
                         alert($('#MainForm').serialize());
                         ajax(acao,$('#MainForm').serialize(),'text','POST',alert)   ;
                         /* $.ajax({
                         url : acao,
                         dataType: 'text',
                         data: $('#MainForm').serialize(),  //transforma o formulario em 1 linha por meio do POST para a pagina da URL; *dados do ajax para o php
                         type: 'POST',
                         //beforeSend: function(){
                         //        //$(".next-step").click();
                         //        console.log("ajax before");
                         //},
                         success: function(result){
                         // alert("logado "+result);        
                         alert(result);
                         },
                         error:function( xhr,status, error) {
                         alert("Usuário ao inserir novo grupo");  
                         alert(xhr.responseText);             
                         
                         
                         }
                         });
                         }*/

                        function ajax(Acao, Data, ReturnDataType, Metodo, FunctionSucess) {
                            //   alert("chamou o ajax");
                            $.ajax({
                                url: Acao + sessao,
                                dataType: ReturnDataType,
                                data: Data, //transforma o formulario em 1 linha por meio do POST para a pagina da URL; *dados do ajax para o php
                                type: Metodo,
                                //beforeSend: function(){
                                //        //$(".next-step").click();
                                //        console.log("ajax before");
                                //},
                                success: function (retorno) {
                                    // alert("logado "+result);        
                                    //       alert(retorno);
                                    FunctionSucess(retorno);
                                },
                                error: function (xhr, status, error) {
                                    $string = "Erro ao executar operação \n\ ou Nenhum resultado foi retornado\n\ " +
                                            "\n\\n\ " + xhr.responseText;
                                    alert($string);



                                }
                            });

                        }


                        function download(grupoExperimental) {
                            var bd = "&db=" + $("input[name='radioQ']:checked").val();


                            var acao = "./bdCom.php?action=exportar&codgrp=" + grupoExperimental + bd;
                            //    alert(acao);
                            ajax(acao, null, 'json', 'POST', resultadoSelect = function (res) {
                                if (res) {
                                    var url = 'data:text/json;charset=utf8,' + JSON.stringify(res);
                                     //<a href="#" class="btn btn-info" role="button">Link Button</a>
                                    window.open(url, '_blank');
                                    window.focus();
                                } else {
                                    alert("Nenhum registro encontrado");
                                }
                            });

                        }

                        function Login() {
                            // alert("hello");
                            //  alert($('#formLogin').serialize());
                            var acao = "./bdCom.php?action=" + operacao;
                            ajax(acao, $('#formLogin').serialize(), 'text', 'POST', resultadoLogin);

                        }


                        function resultadoLogin(result) {
                            if (result.search(/ses/i) < 0) {
                                alert(result);
                            } else {
                                $('#login-modal').modal('hide');

                                window.location.assign(result);
                            }
                        }



                        function Logoff() {

                            window.location.assign("./index.php");
                        }



</script>