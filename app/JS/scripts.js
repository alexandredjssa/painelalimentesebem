//Relogio Administrador

setInterval(function(){
    
    let novaHora = new Date();
    // getHours trará a hora
    // geMinutes trará os minutos
    // getSeconds trará os segundos
    let hora = novaHora.getHours();
    let minuto = novaHora.getMinutes();
    let segundo = novaHora.getSeconds();
    // Chamamos a função zero para que ela retorne a concatenação
    // com os minutos e segundos
    minuto = zero(minuto);
    segundo = zero(segundo);
    // Com o textContent, iremos inserir as horas, minutos e segundos
    // no nosso elemento HTML
    document.getElementById('hora').textContent = hora+' : '+minuto+' : '+segundo;
},1000)

function zero(x) {
    if (x < 10) {
        x = '0' + x;
    } return x;
}

// Mascara de valor para produtos

function moeda(a, e, r, t) {
    let n = ""
      , h = j = 0
      , u = tamanho2 = 0
      , l = ajd2 = ""
      , o = window.Event ? t.which : t.keyCode;
    if (13 == o || 8 == o)
        return !0;
    if (n = String.fromCharCode(o),
    -1 == "0123456789".indexOf(n))
        return !1;
    for (u = a.value.length,
    h = 0; h < u && ("0" == a.value.charAt(h) || a.value.charAt(h) == r); h++)
        ;
    for (l = ""; h < u; h++)
        -1 != "0123456789".indexOf(a.value.charAt(h)) && (l += a.value.charAt(h));
    if (l += n,
    0 == (u = l.length) && (a.value = ""),
    1 == u && (a.value = "0" + r + "0" + l),
    2 == u && (a.value = "0" + r + l),
    u > 2) {
        for (ajd2 = "",
        j = 0,
        h = u - 3; h >= 0; h--)
            3 == j && (ajd2 += e,
            j = 0),
            ajd2 += l.charAt(h),
            j++;
        for (a.value = "",
        tamanho2 = ajd2.length,
        h = tamanho2 - 1; h >= 0; h--)
            a.value += ajd2.charAt(h);
        a.value += r + l.substr(u - 2, u)
    }
    return !1
}

//Mascara CPF 

function is_cpf (c) {

  if((c = c.replace(/[^\d]/g,"")).length != 11)
    return false

  if (c == "00000000000")
    return false;

  var r;
  var s = 0;

  for (i=1; i<=9; i++)
    s = s + parseInt(c[i-1]) * (11 - i);

  r = (s * 10) % 11;

  if ((r == 10) || (r == 11))
    r = 0;

  if (r != parseInt(c[9]))
    return false;

  s = 0;

  for (i = 1; i <= 10; i++)
    s = s + parseInt(c[i-1]) * (12 - i);

  r = (s * 10) % 11;

  if ((r == 10) || (r == 11))
    r = 0;

  if (r != parseInt(c[10]))
    return false;

  return true;
}


function fMasc(objeto,mascara) {
obj=objeto
masc=mascara
setTimeout("fMascEx()",1)
}

  function fMascEx() {
obj.value=masc(obj.value)
}

function mCPF(cpf){
cpf=cpf.replace(/\D/g,"")
cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
cpf=cpf.replace(/(\d{3})(\d{1,2})$/,"$1-$2")
return cpf
}

cpfCheck = function (el) {
    document.getElementById('cpfResponse').innerHTML = is_cpf(el.value)? '<span style="color:green">válido</span>' : '<span style="color:red">inválido</span>';
    if(el.value=='') document.getElementById('cpfResponse').innerHTML = '';
}


//Mascara telefone

function mascara(o,f){
    v_obj=o
    v_fun=f
    setTimeout("execmascara()",1)
}
function execmascara(){
    v_obj.value=v_fun(v_obj.value)
}
function mtel(v){
    v=v.replace(/\D/g,""); //Remove tudo o que não é dígito
    v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
    v=v.replace(/(\d)(\d{4})$/,"$1-$2"); //Coloca hífen entre o quarto e o quinto dígitos
    return v;
}
function id( el ){
    return document.getElementById( el );
}
window.onload = function(){
    id('telefone').onkeyup = function(){
        mascara( this, mtel );
    }
}


// Mascara CEP

function mCEP(cep){
                cep=cep.replace(/\D/g,"")
                cep=cep.replace(/^(\d{2})(\d)/,"$1.$2")
                cep=cep.replace(/\.(\d{3})(\d)/,".$1-$2")
                return cep
            }


// Cadastro de clientes

function cadastrarCliente(){
            
            var dados = $('#formCadastroCliente').serialize();
            
            $.ajax({
                method: 'GET',
                url: 'cadastroCliente.php',
                data: dados,
        
                beforeSend: function(){
                    $("h2").html("Carregando...");
                }
            })
            .done(function(msg){
                $("h2").html("Retorno da Inclusão...");
                $("#resposta").html(msg);
                        
                alert("Dados cadastrados com sucesso!");
            })
                    
            .fail(function(){
                alert("Falha na inclusão");
            })
                    
                    return false;
    }

  // Cadastrar Produtos

function cadastrarProdutos(){

    var dados = $('#formulario').serialize();
            
            $.ajax({
                method: 'GET',
                url: 'cad.php',
                data: dados,
        
                beforeSend: function(){
                    $("h2").html("Carregando...");
                }
            })
            .done(function(msg){
                $("h2").html("Retorno da Inclusão...");
                $("#resposta").html(msg);
                        
                alert("Dados cadastrados com sucesso!");
            })
                    
            .fail(function(){
                alert("Falha na inclusão");
            })
                    
                    return false;
    }

 // Consulta Produtos

 function consultaProdutos(){

            var dados = $('#formulario').serialize();
            
            $.ajax({
                method: 'GET',
                url: 'consulta.php',
                data: dados,
        
                beforeSend: function(){
                    $("h2").html("Carregando consulta...");
                }
            })
            .done(function(msg){
                $("h2").html("Dados da Pesquisa...");

                var Produtos = JSON.parse(msg);

                var Bloco ='';
                Bloco += "codigo: "     + Produtos[1].codigo     + "<br>";
                Bloco += "classi: "     + Produtos[1].classi     + "<br>";
                Bloco += "descricao: "  + Produtos[1].descricao  + "<br>";
                Bloco += "valor: "      + Produtos[1].valor      + "<br>";
                Bloco += "data: "       + Produtos[1].data       + "<br>";
                Bloco += "<hr>"
                                       
            })

                    return false;
    }
