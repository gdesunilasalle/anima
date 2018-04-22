var logradouro;
var bairro;
var cidade;
var complemento;
  function limpa_formulario_cep() {
            //Limpa valores do formul�rio de cep.
            document.getElementById('dlogradouro').value=("");
            document.getElementById('dbairro').value=("");
            document.getElementById('dcidade').value=("");
            document.getElementById('dcomplemento').value=("");
    }
    function checa(elemento){
      if(elemento.value == ""){
        elemento.removeAttribute('readonly');
        elemento.removeAttribute('disabled');
        str = ((elemento.id).substr(1)).toUpperCase();
        elemento.placeholder= "Por favor informar "+str;
      }
    }
    function travar(elemento){
      elemento.readOnly= true;
    }
    function retorno_logradouro(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.

            logradouro.value=(conteudo.logradouro);
            bairro.value=(conteudo.bairro);
            cidade.value=(conteudo.localidade);
            checa(logradouro);
            checa(bairro);
            checa(cidade);
            if(conteudo.complemento.length!=0)complemento.value=(conteudo.complemento);
            complemento.value="Sem complemento";



        } //end if.
        else {
            //CEP n�o Encontrado.
            limpa_formulario_cep();
            alert("CEP não encontrado.");
        }
    }

    function pesquisacep(valor) {
      logradouro = document.getElementById('dlogradouro');
      bairro = document.getElementById('dbairro');
      cidade = document.getElementById('dcidade');
      complemento = document.getElementById('dcomplemento');
        travar(logradouro);
        travar(bairro);
        travar(cidade);
        travar(complemento);

        //Nova vari�vel "cep" somente com d�gitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Express�o regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('dlogradouro').value="Carregando logradouro, aguarde...";
                document.getElementById('dbairro').value="Carregando bairro, aguarde...";
                document.getElementById('dcidade').value="Carregando cidade, aguarde...";
                document.getElementById('dcomplemento').value="Carregando complemento, aguarde...";

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=retorno_logradouro';

                //Insere script no documento e carrega o conte�do.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep � inv�lido.
                limpa_formulario_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formul�rio.
            limpa_formulario_cep();
        }
    };
