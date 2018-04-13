<section id="cadastro">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading">Cadastro</h2>
            <h3 class="section-subheading text-muted">Preencha corretamente os dados abaixo:</h3>
          </div>
        </div>
<?php echo form_open('cadastro'); ?>
<!-- INICIO DOS CAMPOS DO FORMULÁRIO -->
<?php echo form_error('dnomecompleto'); ?>
<font class="required"> Nome Completo</font>
<input type="text" placeholder="Digite aqui seu nome completo" class="form-control" name="dnomecompleto" id="dnomecompleto" oninvalid="this.setCustomValidity('Não esqueça de preencher seu nome completo!')"
onchange="this.setCustomValidity('')" value="<?php echo set_value('dnomecompleto');?>" required>
<br>
<font class="required">Email</font> <br>
<?php echo form_error('demail'); ?>
<input type="text" placeholder="Digite aqui seu email La Salle (exemplo@soulasalle.com.br ou exemplo@lasalle.org)" class="form-control" name="demail" id="demail" oninvalid="this.setCustomValidity('Não esqueça de preencher seu email da La Salle!')"
onchange="this.setCustomValidity('')" value="<?php echo set_value('demail');?>" required>
<br>
<font class="required">Matrícula</font> <br>
<?php echo form_error('dmatricula'); ?>
<input type="text" placeholder="Digite sua matrícula da La Salle" class="form-control" name="dmatricula" id="dmatricula" maxlength="10" size="10" oninvalid="this.setCustomValidity('Não esqueça de preencher a sua matricula da La Salle!')"
onchange="this.setCustomValidity('')" value="<?php echo set_value('dmatricula');?>" required>
<br>
<script>
    function curso_outros(that) {
        if (that.value == "outro") {
            document.getElementById("especifica").style.display = "block";
        } else {
            document.getElementById("especifica").style.display = "none";
        }
    }
</script>
  <font class="required">Informe seu Curso ou Cargo</font> <br>
  <select required class="form-control" name="dcurso" onchange="curso_outros(this);">
    <option disabled selected>Selecione</option>
    <option disabled>Graduação:</option>
    <option value="Unilasalle-RJ">Unilasalle-RJ</option>
    <option value="Administração">Administração</option>
    <option value="Arquitetura e Urbanismo">Arquitetura e Urbanismo</option>
    <option value="Ciências Contábeis">Ciências Contábeis</option>
    <option value="Direito">Direito</option>
    <option value="Engenharia Civil">Engenharia Civil</option>
    <option value="Engenharia de Produção">Engenharia de Produção</option>
    <option value="Engenharia Elétrica">Engenharia Elétrica</option>
    <option value="História">História</option>
    <option value="Pedagogia">Pedagogia</option>
    <option value="Sistemas de Informação">Sistemas de Informação</option>
    <option value="outro">Outra(o) não especificado(a)</option>
    <option disabled>Pós-Graduação:</option>
    <option value="Direito Civil e Processual Civil">Direito Civil e Processual Civil</option>
    <option value="Docência no ensino superior: práxis educativa">Docência no ensino superior: práxis educativa</option>
    <option value="Estratégias Tributárias">Estratégias Tributárias</option>
    <option value="Gestão de negócios">Gestão de negócios</option>
    <option value="outro">Outra(o) não especificado(a)</option>
    <option disabled>Cargos:</option>
    <option value="Professor">Professor</option>
    <option value="outro">Funcionário (outros)</option>
  </select>
  <div id="especifica" style="display: none;">
    <br>
    <font class="required">Especifique seu Curso ou Cargo</font> <br>
      <input type="text" placeholder="Digite aqui seu Curso ou Cargo" class="form-control" name="despecifica" id="despecifica" maxlength="20" size="10">
    </div>
<br>
<font class="required">CEP</font> <br>
<?php echo form_error('dcep'); ?>
<input type="text" placeholder="Digite aqui o seu CEP" class="form-control" name="dcep" id="dcep" size="10" maxlength="9" onblur="pesquisacep(this.value);" oninvalid="this.setCustomValidity('Não esqueça de preencher seu CEP!')"
onchange="this.setCustomValidity('')" value="<?php echo set_value('dcep');?>" required>
<br>
<font class="required">Logradouro</font> <br>
<?php echo form_error('dlogradouro'); ?>
<input type="text" placeholder="Digite aqui o Logradouro" class="form-control" name="dlogradouro" id="dlogradouro"  oninvalid="this.setCustomValidity('Não esqueça de preencher o Logradouro!')" onchange="this.setCustomValidity('')" value="<?php echo set_value('dlogradouro');?>" required>
<br />
<font class="required">Número</font> <br>
<?php echo form_error('dnumero'); ?>
<input type="text" placeholder="Digite aqui o número" class="form-control" name="dnumero" id="dnumero" oninvalid="this.setCustomValidity('Não esqueça de preencher o número!')" onchange="this.setCustomValidity('')" value="<?php echo set_value('dnumero');?>" required>
<br>
Complemento <br>
<?php echo form_error('dcomplemento'); ?>
<input type="text" placeholder="Digite aqui o complemento" class="form-control" name="dcomplemento" id="dcomplemento" value="<?php echo set_value('dcomplemento');?>">
<br>
<font class="required">Senha</font> <br>
<?php echo form_error('dsenha'); ?>
<input pattern=".{8,30}" type="password" placeholder="Digite sua senha entre 8 e 30 caracteres" oninvalid="this.setCustomValidity('Não esqueça de preencher sua senha (Entre 8 e 30 caracteres)!')" onchange="this.setCustomValidity('')" class="form-control" name="dsenha" id="dsenha" required>
<br>
<font class="required">Confirme a senha</font> <br>
<?php echo form_error('dconfirmasenha'); ?>
<input pattern=".{8,30}" type="password" placeholder="Confirme aqui sua senha" class="form-control" name="dconfirmasenha" oninvalid="this.setCustomValidity('Não esqueça de preencher a confirmação de senha (Entre 8 e 30 caracteres)!')" onchange="this.setCustomValidity('')" id="dconfirmasenha" required>
<br>
<center>
<?php echo form_error('termo'); ?>

<p><input type="checkbox" name="termo" id="termo" value="1" oninvalid="this.setCustomValidity('É necessária a leitura e aceitação dos termos de uso.')"
onchange="this.setCustomValidity('')" required>&emsp;Declaro que li e estou de acordo com os <a class="text-success" data-toggle="modal" href="#termos_de_uso">termos de uso.</a>
</p>
<?php echo form_submit(array('id' => 'submit', 'value' => 'Cadastrar', 'class'=>'btn btn-primary btn-xl text-uppercase')); ?>
<br>
<?php echo form_close(); ?> <br>
</center>
</div>
</section>
<!-- TERMOS DE USO -->
    <div class="comofunciona-modal modal fade" id="termos_de_uso" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-10 mx-auto">
                <div class="modal-body" align="center">
                  <!-- Project Details Go Here -->
                  <h3 class="text-uppercase">TERMOS DE USO</h3>
                    <textarea onselect="return false;" readonly class="form-control" style="min-width: 100%; resize: none" rows=15>
TERMOS E CONDIÇÕES DE USO DO SISTEMA ANIMA
Data da última revisão: 12/08/2018
Índice
I. Objeto
II.Capacidade para cadastrar-se
III. Conta e Cadastro
IV. Busca e Oferta de Carona
V.O Usuário concorda com as Regras de Comportamento online abaixo
VI. Violação no Sistema ou da Base de Dados
VII. Sanções
VIII. Responsabilidades
IX. Alcance das Soluções
X. Falhas no Sistema
XI. Sistema de Qualificações
XII. Propriedade Intelectual e links
XIII. Política de Privacidade
XIV. Legislação Aplicável e Foro de eleição

Termos e Condições de Uso
Esses termos e condições aplicam-se ao uso das soluções oferecidas pelo sistema ANIMA, através do aplicativo “ANIMA” disponível no endereço www.anima.pe.hu. Qualquer Usuário do site que acesse ou utilize as soluções do ANIMA, deverá aceitar os Termos e Condições de Uso do sistema ANIMA, e todas as demais políticas e princípios que o regem.
O usuário deverá ler e certificar-se de haver entendido e aceitar todas as condições estabelecidas nos Termos e Condições de Uso do sistema ANIMA, e assim como nos demais documentos incorporados aos mesmos por referência, antes de seu cadastro como usuário do sistema ANIMA.
Reservamo-nos o direito, por nosso exclusivo critério, de mudar, modificar, excluir ou adicionar qualquer parte das políticas e termos e condições de uso do sistema sem que se faça necessário qualquer notificação. Se fizermos mudanças nos Termos e Condições de Uso indicaremos no topo desta página a data da última revisão. O usuário que continuar a acessar o sistema ou continuar utilizando de suas facilidades após qualquer modificação de
política constitui na sua aceitação aos novos Termos e Condições de uso do sistema ANIMA. Se o usuário não concordar em aceitar isso ou qualquer futura alteração deste Termos e Condições de Uso, o mesmo não deve acessar ou usar o sistema ANIMA. É sua responsabilidade checar regularmente se houve mudanças e revisar as mudanças dos Termos e Condições de uso do sistema ANIMA.

I.Objeto

O ANIMA é um projeto idealizado e realizado por alunos da UNILASALLE-RJ, e trata-se de um sistema de caronas unificado e institucional para a comunidade acadêmica da UNILASALLE-RJ - alunos, professores e funcionários. Os usuários do ANIMA podem adicionar seu destino online e ou pesquisar por caronas oferecidas e compartilhar viagens com outros membros. 
O acesso é exclusivo à comunidade acadêmica, através do e-mail institucional @lasalle.org.br ou @soulasalle.com.br.
Os serviços objeto dos presentes Termos e Condições de Uso consistem em disponibilizar ao Usuário um espaço para que ofereça e busque por caronas anunciadas. ANIMA, portanto, possibilita aos usuários travarem conhecimento uns dos outros e permite que eles combinem entre si diretamente, sem sua intervenção na finalização da carona, não sendo nessa qualidade, fornecedor ou responsável de quaisquer negociações e/ou serviços anunciados exclusivamente por seus usuários.

II. Capacidade para cadastrar‐se

As ferramentas do ANIMA estão disponíveis apenas para as pessoas que estejam vinculadas com a UNILASALLE-RJ. 
Se o ANIMA detectar, através do sistema de verificação de dados, irregularidades ou uso inadequado do sistema, irá inabilitar definitivamente todos os cadastros de quem violar tal regra.
Política para Usuários menores de idade: Menores de 18 anos não podem utilizar o sistema.

III. Conta e Cadastro

Todas as contas de usuários são regidas e sujeitas às seguintes regras:
1. Apenas será efetuado o cadastramento do Usuário que aceitar os presentes Termos e Condições de Uso, utilizar um e-mail institucional e confirmá-lo. As informações fornecidas pelo usuário devem ser exatas, precisas e verdadeiras, e o usuário assume o compromisso de atualizar os Dados Pessoais sempre que neles ocorrer alguma alteração. O ANIMA se reserva o direito de utilizar todos os meios válidos e possíveis para identificar seus usuários. Reservamo-nos o direito por nosso exclusivo critério de recusar qualquer acesso, cadastro ou registro ao nosso sistema. O cadastro é necessário para qualquer um que queira buscar e ou oferecer uma carona e você é responsável por suas viagens cadastradas.
Mesmo que o usuário não acesse o aplicativo, deverá aceitar os Termos e Condições de Uso e todas as demais políticas e princípios que o regem para poder cadastrar-se.
2. ANIMA não se responsabiliza pela correção dos Dados Pessoais inseridos por seus usuários. Os usuários garantem e respondem, em qualquer caso, pela veracidade, exatidão e autenticidade dos Dados Pessoais cadastrados.
3. O Usuário acessará sua conta através de senha criada por ele mesmo e com não menos que 8 caracteres e compromete-se a não informá-la a terceiros, responsabilizando-se integralmente pelo uso que dela seja feito.
4. O Usuário compromete-se a notificar o ANIMA imediatamente, através do formilário de contato do próprio site, a respeito de qualquer uso não autorizado de sua conta, bem como o acesso não autorizado por terceiros à mesma. O usuário será o único responsável pelas operações efetuadas em sua conta, uma vez que o acesso à mesma só será possível mediante o uso de seu email institucional e senha, que é secreta edeve ser de conhecimento exclusivo do usuário.
5. Em nenhuma hipótese será permitida a cessão, venda, aluguel ou outra forma de transferência da conta. Também não se permitirá a manutenção de mais de um cadastro por uma mesma pessoa, ou ainda a criação de novos cadastros por pessoas cujos cadastros originais tenham sido cancelados por infrações às políticas do ANIMA.
7. Para cancelar a conta, o usuário deverá entrar em contato pelo formulário disponível no site, solicitando o cancelamento. No caso de cancelamento o Usuário permanece obrigado a não violar os direitos de outros usuários respeitando e não divulgando qualquer material e informação obtida no ANIMA.
8. O usuário é responsável por todos e quaisquer encargos de internet e ou telefone relacionado ao seu acesso ao ANIMA.

IV. Busca e Oferta de Carona
1. O ANIMA é um método para que as pessoas possam iniciar um contato para compartilhamento de vagas em veículos privados, compartilhamento de táxis e/ou Uber e companhia em trajetos de bicicleta ou a pé.
2. Avisamos aos Usuários que o ANIMA não checa absolutamente nada referente a pendências e ou restrições civis e ou criminais de usuários ou indivíduos acessando suas soluções. Os Usuários devem, portanto, ter cautela ao decidirem com quem dividir suas viagens. A única checagem realizada é a garantia do vínculo institucional com a UNILASALLE-RJ, por meio de validação do e-mail institucional.
3. O ANIMA não se responsabiliza por qualquer consequência pessoal ou financeira, resultantes do uso do sistema. Simplesmente disponibilizamos um método para os Usuários compartilharem suas viagens, buscar caronas e contatar pessoas.
4. As soluções em buscar e oferecer caronas são projetadas para acomodar diversos interesses dos Usuários. Como qualquer outra comunidade, os grupos participantes devem ter um comportamento apropriado. As soluções para buscar e oferecer caronas não podem ser utilizadas para postar, divulgar ou transmitir nenhuma conduta ilegal, prejudicial, ameaçadora, insultante, atormentadora, caluniosa, ou de qualquer maneira questionável,
incluindo qualquer material que possa encorajar condutas questionáveis contra o ANIMA e seus interesses.
Constitui um crime, exploração de crianças, violação dos direitos de outros Usuários ou qualquer ato que viole as leis municipais, estaduais, federais e internacionais. O ANIMA se reserva o direito, a seu exclusivo critério, de remover qualquer grupo ou Usuário que infringir essas normas de procedimento.
5. O ANIMA não têm nenhuma obrigação de monitorar ou revisar mensagens, envios e transmissões de mensagens entre os usuários.
6. O ANIMA se reserva o direito, a seu exclusivo critério, de a qualquer tempo por qualquer razão, ou nenhuma razão, sem limite de tempo, em limitar, negar, modificar ou descontinuar as soluções de Busca e Oferta de Carona notificando, ou não notificando o Usuário.
7. A utilização do sistema bem como as caronas em si não serão cobradas por parte dos organizadores do ANIMA.
8. Ao participar ou aceitar a participação de um usuário na carona, os envolvidos na carona consentem em compartilhar os seguintes dados do perfil: Nome completo, email e endereços de partida e destino.

V.O Usuário concorda com as Regras de Comportamento online abaixo:

1. O Usuário está proibido de postar, publicar, distribuir, uploading, downloading, disseminar, transmitir ou linkar o ANIMA a qualquer site que contenha material que seja:
a) Ilegal, difamatório, fraudulento, acusatório, ameaçador, disruptivo, sexo explícito e material obsceno.
b) Que viole a privacidade ou os direitos legais de qualquer pessoa ou entidade.

c) Que constitui ou promove crime de ofensa, ou qualquer violação de leis municipais, estaduais, federais e internacionais.
d) Que contenha arquivos corrompidos, vírus, cavalos de tróia, vermes, ou qualquer outro arquivo que seja prejudicial ou destrutivo.
e) Sites de jogos de azar, esquemas de pirâmides, junk mail, spamming e flaming.
f) Sites que promovem, comercializam, alugam e licenciam qualquer tipo de produto ou serviço. A utilização desses tipos de sites deve ter autorização expressa por escrito do ANIMA, sem isto é proibida.
2. O Usuário é proibido de coletar, armazenar, incluindo, mas não limitado a, endereços de email, números de telefone e informações pessoais de outros Usuários sem os seus consentimentos.
3. Um Usuário é proibido de incomodar outros. Também é proibido de assumir um falsa identidade com o propósito de iludir outros usuários ou fingir que é outra pessoa.
4. O Usuário é proibido de tentar acesso sem autorização, modificar ou hackear o site.
5. Informações, materiais, fotos e logos publicados no ANIMA são de sua própria propriedade, de afiliados ou parceiros e podem estar protegidos por registros de propriedade e ou direito autorais. O Usuário é proibido de copiar, redistribuir ou comercializar esses materiais sem autorização expressa por escrito do proprietário.
VI. Violação no Sistema ou da Base de Dados
Não é permitida a utilização de nenhum dispositivo, software, ou outro recurso que venha a interferir nas atividades e operações do ANIMA, bem como nos anúncios, descrições, contas ou seus bancos de dados.
Qualquer intromissão, tentativa de, ou atividade que viole ou contrarie as leis de direito de propriedade intelectual e/ou as proibições estipuladas nestes Termos e Condições de Uso, tornarão o responsável passível das ações legais pertinentes, bem como das sanções aqui previstas, sendo ainda responsável pelas indenizações por eventuais danos causados.

VII. Sanções
Sem prejuízo de outras medidas, ANIMA poderá advertir, suspender ou cancelar, temporária ou definitivamente, a conta de um Usuário a qualquer tempo, e iniciar as ações legais cabíveis se:
a) O Usuário não cumprir qualquer dispositivo destes Termos e Condições de Uso e demais políticas do ANIMA;
b) Se descumprir com seus deveres de Usuário;
c) Se praticar atos fraudulentos ou dolosos;
d) Se não puder ser verificada a identidade do Usuário ou qualquer informação fornecida por ele esteja incorreta;
e) Se o ANIMA entender que os anúncios ou qualquer atitude do Usuário haja causado algum dano a terceiros ou ao próprio ANIMA ou tenha a potencialidade de assim o fazer. Nos casos de inabilitação do cadastro do Usuário, todos os anúncios ativos e/ou ofertas realizadas serão automaticamente cancelados.

VIII. Responsabilidades
O ANIMA não é o responsável pelas caronas oferecidas. Tampouco intervém na carona que se inicia no aplicativo.
O ANIMA não se responsabiliza pela existência, quantidade, qualidade, estado, integridade ou legitimidade das caronas oferecidas pelos Usuários, ou pela veracidade dos Dados Pessoais por eles inseridos em seus cadastros.
O ANIMA não outorga garantia por vícios ocultos ou aparentes nas negociações entre os Usuários. Cada Usuário conhece e aceita ser o único responsável pelos trajetos que anuncia ou pelas caronas que realiza.
O ANIMA não será responsável pelo efetivo cumprimento das obrigações assumidas pelos Usuários. O Usuário reconhece e aceita que ao realizar negociações com outros Usuários ou terceiros faz por sua conta e risco.
Em nenhum caso o ANIMA será responsável por qualquer outro dano e/ou prejuízo que o Usuário possa sofrer devido às negociações realizadas ou não realizadas através do ANIMA decorrentes da conduta de outros usuários.
O ANIMA recomenda que toda carona seja realizada com cautela e bom senso. O Usuário deverá sopesar os riscos da negociação, levando em consideração que pode estar, eventualmente, lidando com menores de idade ou pessoas valendo-se de falsas identidades. O ANIMA não será responsável pelas transações entre os usuários, mesmo as firmadas com base na confiança depositada no sistema ou nas soluções prestadas pelo ANIMA. Nos casos em que um ou mais Usuários ou algum terceiro inicie qualquer tipo de reclamação ou ação legal contra outro ou outros Usuários, todos e cada um dos Usuários envolvidos nas reclamações ou ações eximem de toda responsabilidade o ANIMA e a seus organizadores.

IX. Alcance das Soluções
Estes Termos e Condições de Uso não geram nenhum contrato de sociedade, de mandato, franquia ou relação de trabalho entre ANIMA e o Usuário. O Usuário manifesta ciência de que o ANIMA não é parte de nenhuma transação, nem possui controle algum sobre a qualidade, segurança ou legalidade das caronas anunciadas, sobre a veracidade ou exatidão das ofertas. ANIMA não pode assegurar o êxito de qualquer transação, tampouco verificar os dados pessoais inseridos pelos próprios usuários. O ANIMA limita-se a checar se o usuário é um membro da UNILASALLE-RJ. O ANIMA não garante a veracidade da publicação de terceiros que apareça em seu aplicativo e não será responsável pela correspondência ou contratos que o Usuário realize com terceiros.

X. Falhas no Sistema
ANIMA não se responsabiliza por qualquer dano, prejuízo ou perda no equipamento do Usuário causado por falhas no sistema, no servidor ou na internet decorrentes de condutas de terceiros. ANIMA também não será responsável por qualquer vírus que possa atacar o equipamento do Usuário em decorrência do acesso, utilização ou navegação no aplicativo na internet ou como conseqüência da transferência de dados, arquivos,
imagens, textos ou áudio contidos no mesmo. Os Usuários não poderão atribuir ao ANIMA nenhuma responsabilidade nem exigir o pagamento por lucro cessante em virtude de prejuízos resultantes de dificuldades técnicas ou falhas nos sistemas ou na internet. Eventualmente, o sistema poderá não estar disponível por motivos técnicos ou falhas da internet, ou por qualquer outro evento fortuito ou de força maior alheio ao controle do
ANIMA.

XI. Sistema de Avaliação
Tanto os Usuários que buscam como os Usuários que oferecem caronas podem informar ao ANIMA através do formulário de contato qualquer avaliação que desejem fazer sobre o sistema.

XII. Propriedade Intelectual e links
O uso comercial da expressão “ANIMA” como marca, nome empresarial, bem como os conteúdos das telas relativas as soluções do ANIMA assim como os programas, bancos de dados, redes, arquivos que permitem que o Usuário acesse e use sua Conta são protegidos pelas leis e tratados internacionais de direito autoral, marcas, patentes, modelos e desenhos
industriais. O uso indevido e a reprodução total ou parcial dos referidos conteúdos são proibidos, salvo à autorização expressa do ANIMA.
O site pode linkar outros sites da rede, o que não significa que esses sites sejam de propriedade ou operados pelo ANIMA. Não possuindo controle sobre esses sites, ANIMA NÃO será responsável pelos conteúdos, práticas e serviços ofertados nos mesmos. A presença de links para outros sites não implica relação de sociedade, de supervisão, de cumplicidade ou solidariedade do ANIMA para com esses sites e seus conteúdos

XIII. Política de Privacidade
Com estas Políticas, o ANIMA quer demonstrar que a privacidade da informação dos usuários é muito importante para ele e por isso toma-se precauções e cautelas para resguardá-la utilizando os mecanismos de segurança informática.
Uso da informação pelo ANIMA
Toda informação ou dado pessoal prestado pelo Usuário do ANIMA é armazenada em servidores ou meios magnéticos. O ANIMA tomará todas as medidas possíveis para manter a confidencialidade e a segurança descritas nesta cláusula, porém não responderá por prejuízo que possa ser derivado da violação dessas medidas por parte de terceiros que utilizem as redes públicas ou a internet, subvertendo os sistemas de segurança para acessar as informações de Usuários.
O ANIMA coleta informações de Usuários através das seguintes maneiras:
i. Cadastro obrigatório: Ao se registrar no ANIMA, os usuários devem cadastrar endereço completo e e-mail.
ii. Enquetes: ocasionalmente o ANIMA faz enquetes aos usuários para melhor entender as necessidades de seu público visando o aprimoramento de suas funcionalidades. Algumas vezes o ANIMA poderá compartilhar os resultados das enquetes com parceiros institucionais dentro da UNILASALLE-RJ, tais quais laboratórios de pesquisa e outros órgãos internos da instituição. O ANIMA nunca divulga informações sobre um específico usuário com terceiros sem o consentimento expresso por escrito do usuário.
O ANIMA registra todas as caronas realizadas através do aplicativo e utiliza este registro para compreensão do seu impacto positivo (quantidade de pessoas atingidas, maiores fluxos de caronas, redução de emissões de CO2  e outros que possam vir a ser determinados através de consulta ao banco de dados).
Uso da informação por outros Usuários.
Para facilitar a interação entre todos os membros da comunidade do ANIMA, suas soluções permitem um acesso limitado a certos dados de contato dos demais usuários tais como nome de usuário, e-mail e endereço. Ademais, certos dados estarão disponíveis a outros usuários, uma vez que estejam em um contexto de uma mesma carona. 
Sob nenhuma circunstância, se deve comunicar Informação Pessoal ou telefone de outro usuário a nenhum terceiro sem o consentimento do usuário afetado.

Ordem de autoridades competentes ‐ Requerimentos Legais
O ANIMA coopera com as autoridades competentes e com terceiros para garantir o cumprimento das leis, por exemplo, em matéria de proteção de direitos de propriedade industrial e intelectual, prevenção de fraudes e outros.
O ANIMA poderá revelar a Informação Pessoal de seus usuários sob requerimento de autoridades judiciais ou governamentais competentes para fins de investigações conduzidas por elas, mesmo que não exista uma ordem judicial, por exemplo, (e sem limitar-se a), quando se trate de investigações de caráter penal ou relacionadas com pirataria informática ou a violação de direitos de autor. Nestas situações, o ANIMA colaborará com as autoridades competentes com o fim de salvaguardar a integridade e a segurança da Comunidade e de seus usuários, ressalvadas hipóteses de sigilo da informação determinadas por leis em vigor.
O ANIMA pode, e os usuários o autorizam expressamente, comunicar qualquer Informação Pessoal sobre seus usuários com a finalidade de cumprir a lei aplicável e cooperar com as autoridades competentes na medida em que discricionariamente o entenda necessário e adequado em relação com qualquer investigação de um ilícito, infração de direitos de propriedade industrial ou intelectual, ou outra atividade que seja ilegal ou que possa expor o ANIMA ou a seus usuários a qualquer responsabilidade legal. Ademais, pode e os usuários o autorizam expressamente comunicar seu nome completo, bairro, cidade, endereço de correio eletrônico, etc. Este direito será exercido por ANIMA a fim de cooperar com o cumprimento e execução da lei, independentemente de existir ou não uma ordem judicial ou administrativa para tanto.
Ademais, o ANIMA se reserva o direito e fica autorizado expressamente a tanto de comunicar informação sobre seus usuários a outros usuários, entidades ou terceiros quando haja motivos suficientes para considerar que a atividade de um usuário seja suspeita de tentar ou de cometer um delito ou tentar prejudicar a outras pessoas.
Este direito será utilizado pelo ANIMA a sua inteira discrição quando o considerar apropriado ou necessário para manter a integridade e a segurança da Comunidade e de seus usuários, para fazer cumprir os Termos e Condições e demais Políticas do sistema, com o fito de cooperar com a execução e cumprimento da lei. Este direito será exercido pelo ANIMA independentemente de existir uma ordem judicial ou administrativa nesse sentido.
O Usuário, ao cadastrar-se, manifesta conhecer e pode exercitar seus direitos de acessar, cancelar e atualizar seus Dados Pessoais. O Usuário garante e responde pela veracidade, exatidão, vigência e autenticidade dos Dados Pessoais, e se compromete a mantê-los devidamente atualizados.

Uma vez cadastrado no ANIMA ̧ o Usuário poderá revisar e alterar a informação que houver fornecido durante o processo de cadastro.
Em determinados casos, serão mantidos nos arquivos do ANIMA os Dados Pessoais que nos tenham sido solicitados a remoção com vistas a utilizar na solução de disputas ou reclamações, detectar problemas ou incidentes e solucioná-los e dar cumprimento ao disposto nos Termos e Condições de Uso. Em qualquer caso os Dados Pessoais do Usuário não serão imediatamente retirados dos arquivos por razões legais e técnicas, incluindo sistemas de suporte e segurança.
Os usuários devem atualizar seus Dados Pessoais regularmente, conforme se altere algum dos campos, a fim de que outros usuários possam contatá-los. Para fazer qualquer modificação na informação fornecida quando do cadastramento, ingresse na seção “Alterar Cadastro".

XIV. Legislação Aplicável e Foro de eleição
Todos os itens destes Termos e Condições de Uso estão regidos pelas leis vigentes na República Federativa do Brasil. Para todos os assuntos referentes à interpretação e ao cumprimento deste Contrato, as partes se submetem ao Foro Central da Cidade do Rio de Janeiro.

                    </textarea>  
                  <br>
                  <button class="btn btn-primary" data-dismiss="modal" type="button">
                    Voltar</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
