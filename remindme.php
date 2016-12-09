 <?php header('Content-Type: text/html; charset=utf-8');
setlocale(LC_ALL, 'pt_BR.UTF8');  
   
      
?>
<!DOCTYPE html>
<html lang="en">
   
<head>
    
  <title>Esqueci meu password</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="http://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js"></script>
<script src="http://cdn.jsdelivr.net/jquery.validation/1.15.0/additional-methods.min.js"></script>

  
  <script src="./js/jquery.validate.min.js"></script>
  <script src="http://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js"></script>
<script src="http://cdn.jsdelivr.net/jquery.validation/1.15.0/additional-methods.min.js"></script>
  <style>
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
      height: 100%;
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
   
  </style>
</head>
<body>
<!--Barra de navegação-->
<nav class="navbar navbar-inverse ">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
        <a class="navbar-brand " href="#"></a>
    </div>
    <div class="collapse navbar-collapse " id="myNavbar">
      <ul class="nav navbar-nav">
          <!-- itens do menu -->
          <li class="active home"><a href="./index.php" >Home</a></li>
        <!--
        <li><a href="#">About</a></li>
        <li><a href="#">Projects</a></li>
        <li><a href="#">Contact</a></li>-->
      </ul>
        
     
    </div>
  </div>
</nav> 
 <!--corpo da pagina-->
<div class="container-fluid text-center">  
    <div class="row content">
        <!-- Menu Lateral esquerdo-->
        <!-- Centro -->
       <div class="col-sm-10 text-left .col-md-offset-2" name="mainDiv" id="mainDiv"> 
           <form method="post" id="MainForm">
               <center><h2> Esqueci minha senha </h2></center>
               <div class="row">
                   <div class="row col-md-offset-3 col-md-6 text-left ">
                        <label for="inputEmail">
                            Sigla do Grupo de Pesquisa
                        </label>
                        <input type="text" class="form-control" style="text-transform:uppercase" id="user" name="sigla" minlength="3" placeholder="Sigla do grupo"  required>
                   </div> 
                   <div class="row col-md-offset-3 col-md-6 text-left ">
                        <label for="inputEmail">
                            Email do Grupo de Pesquisa
                        </label>
                        <input type="text" class="form-control" placeholder="email do grupo" id="inputEmail" name="email" required>                   
                    </div>                   
                    <div class="row col-md-offset-3 col-md-6 text-left ">
                        <center>
                            <button type="submit" class="btn btn-primary btn-sm" name="submitEmail" id="subimitEmail"> 
                                Enviar email 
                            </button>
                        </center>
                    </div>
               </div>
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

<script charset="utf-8">
 
  //var div = $("#mainDiv");
  var div = $("#MainForm");
  
   
    jQuery(document).ready(function() {

        $("#MainForm").validate();
        
        
    });
   
        
        $("#MainForm").on('submit',function (e) {
            //alert("form");
            //alert($("#MainForm").valid());
            e.preventDefault();
            if($("#MainForm").valid()){
                           
                inserirMainForm();
               
            } else{
               alert("Não foi possível realizar a operaçao ");           
            } 
        });
   
     
    function inserirMainForm(){         
         var acao= "./bdCom.php?action=confereEmail";                 
         ajax(acao,$('#MainForm').serialize(),'text','POST',function (e){
             if (e==="existe"){
                    alert("Sua senha foi enviada para o email do grupo e um aviso enviado para o responsável cadastrado");          
                    alert("esta funcionalidade ainda esta em desenvolvimento");
                    window.location("./index.php");
             } else {
                 alert("Email não foi encontrado");
             }             
         });                
    }
    function ajax(Acao,Data,ReturnDataType,Metodo,FunctionSucess){
     //   alert("chamou o ajax");
        $.ajax({
                    url : Acao,
                    dataType: ReturnDataType,
                    data: Data,  //transforma o formulario em 1 linha por meio do POST para a pagina da URL; *dados do ajax para o php
                    type: Metodo,
                    //beforeSend: function(){
                    //        //$(".next-step").click();
                    //        console.log("ajax before");
                    //},
                    success: function(retorno){
                       // alert("logado "+result);        
                 //       alert(retorno);
                        FunctionSucess(retorno);
                    },
                     error:function( xhr,status, error) {                       
                        $string="Erro ao executar operação \n\ ou Nenhum resultado foi retornado\n\ "+
                                "\n\\n\ "+xhr.responseText;
                        alert($string);
        
        

                      }
            });
        
    }
 
    
   
    
 </script>