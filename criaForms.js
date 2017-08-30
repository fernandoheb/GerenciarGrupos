/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


//Novo Grupo de Pesquisa
function createFormNovoGrupo(div) {


    //div.append("<form class='form-horizontal'>form</form>");
    var frm = $('<div class="row" id="divForm">' +
            '<div class="col-sm-12" id="bodyForm">' +
            //' <form class="form-horizontal" name="formCadastro" method="post"> '+
            //Cabeçalho                        
            '<div class="row" id="cabecalho">' +
            //Cabeçalho
            '<h2 > Cadastrar novo Grupo de Pesquisa </h2>                       ' +
            '</div>' +
            '<div class="row" id="fields">' +
            //Nome do grupo
            '<div class="form-group row" id="divNomeGrupo">' +
            '<div>' +
            '<label for="inputNomeGrp" class="control-label">Nome do Grupo<span style="color:red">*</span> </label>' +
            '<div/>' +
            '<div class="" id="posNomeGrupo">' +
            //'<input type="text" class="form-control" id="inputNomeGrp" name="nomeGrupo" placeholder="Nome do Grupo" required>'+                                 
            '' +
            '</div>' +
            '</div>' +
            '<div class="form-group row" id="divSigla-afiliacao">' +
            //Sigla
            '<div>' +
            '<label for="inputSigla" class="control-label">Sigla<span style="color:red">*</span></label>' +
            '</div>' +
            '<div class="" id="posSigla">' +
            //'<input type="text" class="form-control" id="inputSigla" minlenght="3" name="sigla" placeholder="Sigla" required>'+                                 
            '</div>' +
            //Afiliacao                
            '<div>' +
            '<label for="inputAfiliacao" class="col-sm-1 control-label">Afiliacao<span style="color:red">*</span></label>' +
            '</div>' +
            '<div class="" id="posAfiliacao">' +
            //'<input type="text" class="form-control" name="afiliacao" id="inputAfiliacao" placeholder="Afiliacao" required>'+
            '</div>' +
            '</div>' +
            '<div class="form-group row" id="divEmail-Responsavel">' +
            //Email
            '<div>' +
            '<label for="Email" class=" control-label">Email<span style="color:red">*</span></label>' +
            '</div>' +
            '<div class="" id="posEmail">' +
            //'<input type="email" class="form-control" data-rule-email="true" name="emailGrupo" id="inputEmail" placeholder="Email do grupo" required>'+              '</div>' +
            '</div>' +
            '<div class="form-group row" id="divSenhas">' +
            //Senha                    
            '<div>' +
            '<label for="inputSenha" class=" control-label">Senha<span style="color:red">*</span></label>' +
            '</div>' +
            '<div class="" id="posSenha">' +
            //'<input type="password" class="form-control" name="senha" minlenght="6" id="inputSenha" placeholder="Senha" required>'+
            '</div>' +
            //ConfirmaSenha        
            '<div>' +
            '<label for="confirmaSenha" class=" control-label">Confirmar Senha</label>' +
            '</div>' +
            '<div class="" id="posConfSenha">' +
            //'<input type="password" class="form-control" name="confirmaSenha"  data-rule-equalTo="#inputSenha" minlenght="6" id="confirmaSenha" placeholder="Confirme a Senha" required>'+
            '</div>' +
            '</div>' +
            '<div class="form-group row" id="divResponsavel-emailContato">' +
            //Responsavel
            '<div>' +
            '<label for="inputResponsavel" class=" control-label">Responsavel<span style="color:red">*</span></label>' +
            '</div>' +
            '<div class="" id="posResponsavel">' +
            //'<input type="text" class="form-control" name="responsavel" id="inputResponsavel" placeholder="Nome do Responsavel" required>'+
            '</div>' +
            //emailResponsavel
            '<div>' +
            '<label for="Email" class="control-label">Email de contato<span style="color:red">*</span></label>' +
            '</div>' +
            '<div class="" id="posEmailResponsavel">' +
            //'<input type="email" class="form-control" data-rule-email="true" name="emailResponsavel" id="inputEmailResp" placeholder="Email" required>'+                                 
            '</div>' +
            '</div>' +
            //Contato    
            '<div class="form-group row" id="divContato">' +
            '<div>' +
            '<label for="Contato" class="control-label">Telefone</label>' +
            '</div>' +
            '<div class="" id="posContato">' +
            //'<input type="text" class="form-control" name="contato" id="inputContato" placeholder="+55(xx)xxxx-xxxx">'+
            '</div>' +
            '</div>' +
            //Descricao
            '<div class="form-group row" id="divDescricao">' +
            '<div>' +
            '<label for="Descricao" class=" control-label">Descricao do grupo<span style="color:red">*</span></label>' +
            '</div>' +
            '<div class="" id="posDescricao">' +
            //'<textarea class="form-control" rows="3" name="descricao" id="inputDescricao" required></textarea>'+
            '</div>' +
            '</div>' +
            //Enviar
            '</div>' +
            '<div class="form-group row" id="control">' +
            '<div class="col-sm-offset-2 col-sm-9" id="divBtn">' +
            '<center id="posBtn">' +
            //  '<button type="submit" name="submitCadastrar" id="submitCadasto" class="btn btn-default">Cadastrar</button>'+
            '</center>' +
            '</div>' +
            '</div>' +
            '<div class="form-group"></div>' +
            // '</form>'+
            ' </div>' +
            '</div>');
    //    alert(frm);
    //div.ad(frm);
    div.append(frm);
    //cria os elementos para as posicioes posElemento
    var content = null;
    var newElement = null;

    content = document.getElementById("posNomeGrupo");
    newElement = document.createElement("input");
    newElement.type = "text";
    newElement.className = "form-control";
    newElement.name = "nomeGrupo";
    newElement.id = "inputNomeGrupo";
    newElement.placeholder = "Nome do Grupo";
    newElement.required = "true";
    content.appendChild(newElement);

    content = document.getElementById("posSigla");
    newElement = document.createElement("input");
    newElement.type = "text";
    newElement.className = "form-control";
    newElement.name = "sigla";
    newElement.id = "inputSigla";
    newElement.placeholder = "Sigla";
    newElement.required = "true";
    newElement.placeholder = "Sigla ex: ICMCUSP";
    newElement.required = "true";
    newElement.setAttribute("minlength", "3");
    newElement.style.cssText = "text-transform:uppercase";
    content.appendChild(newElement);

    content = document.getElementById("posAfiliacao");
    newElement = document.createElement("input");
    newElement.type = "text";
    newElement.className = "form-control";
    newElement.name = "afiliacao";
    newElement.id = "inputAfiliacao";
    newElement.placeholder = "Afiliacao";
    newElement.required = "true";
    content.appendChild(newElement);

    content = document.getElementById("posEmail");
    newElement = document.createElement("input");
    newElement.type = "email";
    newElement.className = "form-control";
    newElement.name = "emailGrupo";
    newElement.id = "inputEmail";
    newElement.placeholder = "Email do grupo";
    newElement.required = "true";
    newElement.setAttribute("data-rule-email", "true");
    content.appendChild(newElement);

    content = document.getElementById("posResponsavel");
    newElement = document.createElement("input");
    newElement.type = "text";
    newElement.className = "form-control";
    newElement.name = "responsavel";
    newElement.id = "inputResponsavel";
    newElement.placeholder = "Nome do Responsavel";
    newElement.required = "true";
    content.appendChild(newElement);

    content = document.getElementById("posSenha");
    newElement = document.createElement("input");
    newElement.type = "password";
    newElement.className = "form-control";
    newElement.name = "senha";
    newElement.id = "inputSenha";
    newElement.placeholder = "Senha";
    newElement.required = "true";
    newElement.setAttribute("minlength", "6");
    content.appendChild(newElement);

    content = document.getElementById("posConfSenha");
    newElement = document.createElement("input");
    newElement.type = "password";
    newElement.className = "form-control";
    newElement.name = "confirmaSenha";
    newElement.id = "confirmaSenha";
    newElement.placeholder = "Confirme a Senha";
    newElement.required = "true";
    newElement.setAttribute("data-rule-equalTo", "#inputSenha");
    newElement.setAttribute("minlength", "6");
    content.appendChild(newElement);

    content = document.getElementById("posEmailResponsavel");
    newElement = document.createElement("input");
    newElement.type = "email";
    newElement.className = "form-control";
    newElement.name = "emailResponsavel";
    newElement.id = "inputEmailResp";
    newElement.placeholder = "Email do responsavel";
    newElement.required = "true";
    newElement.setAttribute("data-rule-email", "true");
    content.appendChild(newElement);

    content = document.getElementById("posContato");
    newElement = document.createElement("input");
    newElement.type = "text";
    newElement.className = "form-control";
    newElement.name = "contato";
    newElement.id = "inputContato";
    newElement.placeholder = "+55(xx)xxxx-xxxx";
    content.appendChild(newElement);

    content = document.getElementById("posDescricao");
    newElement = document.createElement("textarea");
    newElement.className = "form-control";
    newElement.rows = "3";
    newElement.name = "descricao";
    newElement.id = "inputDescricao";
    newElement.required = "true";
    content.appendChild(newElement);

    content = document.getElementById("posBtn");
    newElement = document.createElement("button");
    newElement.type = "submit";
    newElement.name = "submitCadastrar";
    newElement.id = "submitCadastrar";
    newElement.className = "btn btn-default";
    newElement.innerHTML = "Cadastrar";
    content.appendChild(newElement);
    return "inserir_novo_grupo";
}

function naoEncontrado(div) {

    //Seleciona Os Grupos de Pesquisa.

    var frm = $('<div class="row"> <div class="col-sm-12"> <form class="form-horizontal" name="formErro" method="post"> ' +
            '<div class="row">' +
            //Cabeçalho
            '<h2 > Login n&atilde;o realizado! </h2>                       ' +
            '</div>' +
            '<div class="alert alert-danger" role="alert">' +
            '<strong>Oops!!    </strong>' +
            'N&atilde;o foi poss&iacute;vel encontrar seu grupo de pesquisa' +
            '<a  href="#" data-toggle="modal" data-target="#login-modal" class="alert-link"> Refa&ccedil;a seu Login </a>' +
            '</div>' +
            '</form>' +
            ' </div></div>');
    div.append(frm);
    return "Form-Não-Encontrado";
}
//Novo Grupo Experimental
function createFormNovoExperimental(div) {


    //Seleciona Os Grupos de Pesquisa.                    
    var frm = $('<div class="row" id="divForm">' +
            '<div class="col-sm-12" id="bodyForm">' +
            //' <form class="form-horizontal" name="formExperimental" method="post"> '+
            //Cabeçalho                        
            '<div class="row" id="cabecalho">' +
            '<h2 > Cadastrar novo Grupo Experimental </h2>                       ' +
            '</div>' +
            //Campos
            '<div class="row" id="fields">' +
            //Descricao
            '<div class="form-group row" id="divDescricao">' +
            '<label for="descriGrupo" class="col-sm-2 control-label">Descri&ccedil;&atilde;o do grupo<span style="color:red">*</span></label>' +
            '<div class="col-sm-8" id="posDescricao">' +
            //                          'posDescricao'+
            //                  ' <textarea class="form-control" rows="3" name="descricao" id="inputDescricao" required></textarea>'+
            '</div>' +
            '</div>' +
            //População
            '<div class="form-group row" id="divPopulacao">' +
            '<label for="descrPopulacao" class="col-sm-2 control-label">Pupula&ccedil;&atilde;o do grupo<span style="color:red">*</span></label>' +
            '<div class="col-sm-8" id="posPopulacao">' +
            //                        'posPopulacao'+
            //                 ' <textarea class="form-control" rows="3" name="populacao" id="inputPopulacao" required></textarea>'+

            '</div>' +
            '</div>' +
            //Enviar                                     
            '</div>' +
            //botao e controles
            '<div class="form-group row" id="control">' +
            '<div class="col-sm-offset-2 col-sm-8 " id="divBtn">' +
            '<center id="posBtn">' +
            //                       'posBtn'+
            //           '<button type="submit" name="submitExperimental" onclick="bum()" id="submitExperimental" value="submitExperimental" class="btn btn-default">Cadastrar</button>'+
            '</center>' +
            '</div>' +
            '</div>' +
            '<div class="form-group"></div>' +
            //   '</form>'+             
            '</div>' +
            '</div>');

    div.append(frm);
    var content = document.getElementById("posDescricao");
    var newElement = null;
    /*newElement = document.createElement("input");   newElement.type = "text";
     //newElement.onclick = "alert('teste')";
     newElement.name="textTeste";   newElement.id="inputTeste"; newElement.value="TesTanDo";    newElement.className="form-control";
     newElement.required="true";
     content.appendChild(newElement);*/
    //Cadastrar                
    content = document.getElementById("posBtn");
    newElement = document.createElement("button");
    newElement.type = "submit";
    newElement.onclick = "bum()";
    newElement.name = "submitExperimental";
    newElement.id = "submitExperimental";
    newElement.value = "submitExperimental";
    newElement.className = "btn btn-default";
    newElement.innerHTML = "Cadastrar";
    content.appendChild(newElement);
    //Descricao
    content = document.getElementById("posDescricao");
    newElement = document.createElement("textarea");
    newElement.className = "form-control";
    newElement.rows = "3";
    newElement.name = "descricao";
    newElement.id = "inputDescricao";
    newElement.required = "true";
    content.appendChild(newElement);
    //Populacao
    // <textarea class="form-control" rows="3" name="populacao" id="inputPopulacao" required                
    content = document.getElementById("posPopulacao");
    newElement = document.createElement("textarea");
    newElement.className = "form-control";
    newElement.rows = "3";
    newElement.name = "populacao";
    newElement.id = "inputPopulacao";
    newElement.required = "true";
    content.appendChild(newElement);
    return "inserir_novo_experimental";
}

//Listar os Grupos Experimentais
function createFormExibirGrupos(div, usuario) {
    //Seleciona Os Grupos de Pesquisa.

    //listagem Valida
    //div.append("<form class='form-horizontal'>form</form>");
    //Cabeçalho

    //   grupos = recuperagrupos(grupoid);
    var questionario = "http://questionario.caed-lab.com/index.php?codgrp=[C&oacute;digo]";
    var qpjbr = "http://qpjbr.caed-lab.com/index.php?codgrp=[C&oacute;digo]";
    var frm = '<div class="row"  id="divForm"> ' +
            '<div class="row " id="bodyForm">' +
            //Cabeçalho
            '<div class="row" id="cabecalho">' +
            '<h2 > Grupos Experimentais Cadastrados </h2>  ' +
            '</div>' +
            '<div class="panel panel-default">' +
            '<!-- Default panel contents -->' +
            '<div class="panel-heading"> Grupos Experimentais Cadastrados </div>' +
            '<div class="panel-body">' +
            '        <p>Copie o C&oacute;digo do grupo que quer divulgar na url do questionario para popular seus dados</p>' +
            '        <p>QPJBR/index.php?codgrp="CAEDLAB1"</p>' +
            '<p> url atual do questionario experimental: <input type"text" class="form-control" value="' + questionario + '"> </p>' +
            '<p> url atual do questionario resumido: <input type"text" class="form-control" value="' + qpjbr + '"> </p>' +
            '</div>' +
            '<div class="col-lg-10 col-lg-offset-1  id="divOption">' +
            '<h3> Selecione abaixo de qual question&aacute;rio que voc&ecirc; deseja baixar os dados <h3>' +
            '<center id="posOption"></center>' +
            '</div>' +
            ///Table
            '<div style=" overflow-x: scroll;  width: 100%; ">'    +
            '<table class="table table-striped" id="table-content" name="table-content">';
            


    var body = "" +
            ' <tr>  ' +
            //      '  <th> ID </th>' +
            //      '  <th> GrupoID </th>' +
            '  <th> C&oacute;digo </th>' +
            '  <th> Descri&ccedil;&atilde;o </th>' +
            '  <th class="hide"> Popula&ccedil;&atilde;o </th>' +
            '  <th> Criado em </th>';

    var row = '<th id="posGRP">';
    //<td id="'+posicao+'">
    //append "button" posGrpEXP
    row += '<button type="button" class="btn btn-default" disabled id="btndownload_' + "GrpEXP" + '" >';
    //append "span'
    row += ' <span class ="glyphicon glyphicon-download-alt"></span>';

    row += ' </button>';
    row += '</th>';
    body += row + '</tr>';


    var end =
            '</table>' +
            ' </div>' +
            ' </div>' +
            ' </div>' +
            ' </div>';     //    alert(frm);
    //div.ad(frm);

    //           }
    html = $(frm + body + end);
    //alert(html);

    div.append(html);

    var span = document.createElement("span");
    var span2 = document.createElement("span");

    var opt1 = document.createElement("input");
    var label1 = document.createElement("label");
    var opt2 = document.createElement("input");
    var label2 = document.createElement("label");
    var opt3 = document.createElement("input");
    var label3 = document.createElement("label");
    label1.innerHTML = "Grupo Experimental                ";
    span.className = span2.className = "col-md-offset-1";
    label2.innerHTML = "Resumido QPJBR";
    label3.innerHTML = "Independente de base";
    opt1.name = opt2.name = opt3.name = "radioQ";
    opt1.type = opt2.type = opt3.type = "radio";
    opt1.className = opt2.className = opt3.className = "radio-inline";
    opt1.value = "experimental";
    opt1.checked = true;
    opt2.value = "qpjbr";
    opt3.value = "ambos";
    label1.appendChild(opt1);
    label2.appendChild(opt2);
    label3.appendChild(opt3);
    var posicao = document.getElementById("posOption");
    posicao.appendChild(label1);
    posicao.appendChild(span);
    posicao.appendChild(label2);

    posicao.appendChild(span2);
    posicao.appendChild(label3);

    criarLinhasTabelaExperimental();
    return "Exportar";


}

function criarLinhasTabelaExperimental() {

    var ttable = oldTable = null;

    oldTable = document.getElementById("table-content").tBodies[0];
    var newTable = oldTable.cloneNode(true);
    console.log(content = document.getElementById("table-content"));

    ttable = content;
    var tb = ttable.getElementsByTagName('tbody')[0];
    console.log(tb);



    var acao = "./bdCom.php?action=GruposExperimentais";
    //function ajax(Acao,Data,DataType,Metodo,FunctionSucess)//
    ajax(acao, null, 'json', 'POST', resultadoSelect = function (res) {

        var length = res.length;
        console.log(length);
        console.log(res);
        for (var i = 0; i < length; i++) {
            var btnDownload = null; //botao com glif    
            var btnLink = null;
            //var newTable = document.createElement("table");
            var newTR = document.createElement("tr");
            var newTDid = document.createElement("td");
            newTDid.className = "TDid";
            var newTDgrupoid = document.createElement("td");
            newTDgrupoid.className = "TDgroupId";
            var newTDcodgrupo = document.createElement("td");
            newTDcodgrupo.className = "TDcodGrupo";
            var newTDdescricao = document.createElement("td");
            newTDdescricao.className = "TDdescicao";
            var newTDpopulacao = document.createElement("td");
            newTDpopulacao.className = "TDpopulacao";
            var newTDdata = document.createElement("td");
            newTDdata.className = "TDdata";
            var newTDbtn = document.createElement("td");
            newTDbtn.className = "TDbtn";
            var span = document.createElement("span");
            span.className = "glyphicon glyphicon-download-alt";

            btnDownload = document.createElement("button");
            // btnDownload.type="button";
            btnDownload.className = "btn btn-default btn-donwload";

            btnDownload.appendChild(span);
            /*console.log(res[i]);
             console.log(res[i]['id']);                       
             console.log(res[i]['grupoId']);
             console.log(res[i]['codgrupo']);
             console.log(res[i]['descricao']);
             console.log(res[i]['populacao']);
             console.log(res[i]['datadaentrada']);*/
            var codgrp = res[i]['codgrupo'];
            /*   //   newTR.id = "tr_"+res[i]['codgrupo'];
             //id
             newTDid.id = "td_"+res[i]['id'];
             newTDid.name = "id_"+res[i]['id'];*/
            //-->                    newTDid.appendChild(document.createTextNode(res[i]['id']));
            //-->                    newTR.appendChild(newTDid);
            /*                     //grupoid
             newTDgrupoid.id = "td_"+res[i]['grupoId'];
             newTDgrupoid.name = "grupoId_"+res[i]['grupoId'];*/
            //-->                    newTDgrupoid.appendChild(document.createTextNode(res[i]['grupoId']));
            // -->                    newTR.appendChild(newTDgrupoid);
            /*                 //codgrupo
             //  newTDcodgrupo.id = "td_"+res[i]['codgrupo'];
             // newTDcodgrupo.name = "codgrupo_"+res[i]['codgrupo'];*/
            newTDcodgrupo.appendChild(document.createTextNode(res[i]['codgrupo']));
            newTR.appendChild(newTDcodgrupo);
            /*                      //descricao
             // newTDdescricao.id = "td_descricao"+i;                       */
            newTDdescricao.appendChild(document.createTextNode(res[i]['descricao']));
            newTR.appendChild(newTDdescricao);
            /*                       //populacao
             // newTDpopulacao.id = "td_populacao"+i;                   */
            newTDpopulacao.appendChild(document.createTextNode(res[i]['populacao']));
            newTR.appendChild(newTDpopulacao);
            /*                      //datadaentrada                      
             // newTDdata.id = "td_data"+i;                       */
            newTDdata.appendChild(document.createTextNode(res[i]['datadaentrada']));
            newTDdata.value = res[i]['datadaentrada'];
            newTR.appendChild(newTDdata);
            //btn

            newTDbtn.id = "tdbtn_" + codgrp;
            btnDownload.id = "btnDw_" + codgrp;
            btnDownload.type = "button";

            btnDownload.name = 'btn_' + codgrp;
            btnDownload.value = codgrp;
            //  btnDownload.innerHTML="<span class ='glyphicon glyphicon-download-alt'></span>";
            btnDownload.onclick = function () {
                download($(this).val());
            };
            //btnDownload.addEventListener("click",function() { download(codgrp);});
            //btnDownload.value=codgrp;
            //console.log(btnDownload);
            newTDbtn.appendChild(btnDownload);
            //console.log(newTDbtn);
            newTR.appendChild(newTDbtn);
            //content.append(newTR);
            newTable.appendChild(newTR);
        }
        console.log(newTable);
        console.log(oldTable);
        oldTable.parentNode.replaceChild(newTable, oldTable);




    });




}


function textoInicial(div) {

    var html = $('<h1>Bem vindo ao Gerenciamento de Grupos de pesquisa</h1>' +
            '<p>N&oacute;s desenvolvemos essa p&aacute;gina para facilitar a obten&ccedil;&atilde;o' +
            ' dos dados dos seus usu&aacute;rios permitindo que voc&ecirc;' +
            'cadastre diversos grupos experimentais e obtenha os resultados separadamente.' +
            '<BR><BR>' +
            '<strong>Como usar o site:</strong><br>' +
            '<br><strong>1º</strong> crie uma conta de acesso fazendo o registro do seu grupo de pesquisa' + '<br>' +
            '&nbsp;&nbsp; * A sigla do seu grupo será utilizada como identificador do seu grupo e o nome de usuário' + '<br>' +
            '<br><strong>2º</strong> Faça seu login utilizando a Sigla e a Senha cadastrada' + '<br>' +
            '<br>&nbsp;&nbsp;&nbsp;&nbsp; <strong> * A função de recuperação de senha não está implementada no momento, qualquer problema com sua senha entre em contato pelo email: fernando.heb@gmail.com  </strong> ' + '<br>' +
            '<br><strong>3º</strong> crie um novo grupo experimental' + '<br>' +
            '&nbsp;&nbsp; * O codigo do grupo experimental é criado automáticamente utilizando a <strong>Sigla</strong> de seu grupo + um número aleatório' + '<br>' +
            '<br><strong>4º</strong> Forneça o link para seus usuários responderem passando como parametro o código do grupo <strong>(codgrp=[codigo do grupo])</strong>' + '<br>' +
            '&nbsp;&nbsp; * Existem atualmente duas versões do questionario uma com 40 questões e uma versão resumida e um mesmo grupo pode ser utilizado em ambas versões' + '<br>' +
            '<br><strong>5º</strong> O Botão [Exibir Grupos Experimentais] apresenta uma lista com todos os grupos cadastrados ' + '<br>' +
            '&nbsp;&nbsp; * Ao lado das informações de cada grupo existe um botão para fazer o download em formato json de todos as respostas obtidas para aquele grupo' +
            '&nbsp;&nbsp;&nbsp; Acima da lista de grupos você pode selecionar se quer o resultado das respostas para um dos questionários específicos ou se deseja fazer o download das respostas independentes da fonte' +
            '<BR><BR>' +
            '</p>');
    div.append(html);


}






   