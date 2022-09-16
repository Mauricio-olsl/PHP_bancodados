<?php require_once("../../conexao/conexao.php"); ?>

    <?php
    //inserção no banbco
        if(isset($_POST["cidade"])) {
            $nomecompleto   = $_POST["nomecompleto"];
            $endereco       = $_POST["endereco"];
            $complemento    = $_POST["complemento"];
            $numero         = $_POST["numero"];
            $cidade         = $_POST["cidade"];
            $cep            = $_POST["cep"];
            $ddd            = $_POST["ddd"];   
            $telefone       = $_POST["telefone"];
            $email          = $_POST["email"]; 
            $usuario        = $_POST["usuario"]; 
            $senha          = $_POST["senha"]; 

            $inserir   = "INSERT INTO clientes (nomecompleto, endereco, complemento, numero, cidade, cep, ddd, telefone, email, usuario, senha) VALUES ('$nomecompleto', '$endereco', '$complemento', '$numero', '$cidade', '$cep', '$ddd', '$telefone', '$email', '$usuario', '$senha') ";

            $operacao_inserir = mysqli_query($conecta,$inserir);
            if(!$operacao_inserir) {
                die("Falha na inserção");
            }
        }
    //Seleção do estado
        // $estados = "SELECT nome, estadoID FROM estados" ;
        // $linha_estados = mysqli_query($conecta,$estados);
        // if(!$linha_estados) {
            // die("erro no banco de dados");
        //  }        
        ?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Começo de Vida</title>
        
        <!-- estilo -->
        <link href="_css/estilo.css" rel="stylesheet">
        <link href="_css/crud.css" rel="stylesheet">

    </head>

    <body>
        <?php include_once("../_incluir/topo.php"); ?>
        <?php include_once("../_incluir/funcoes.php"); ?> 
        
        <main>  
            <div id="janela_formulario">
                <form action="inserir.php" method="post">
                    <input type="text" name="nomecompleto" placeholder="nome">
                    <input type="text" name="endereco" placeholder="Endereço">
                    <input type="text" name="complemento" placeholder="Complemento">
                    <input type="text" name="numero" placeholder="Número">
                    <input type="text" name="cidade" placeholder="Cidade">
                    <input type="text" name="cep" placeholder="cep">
                    <input type="text" name="ddd" placeholder="ddd">
                    <input type="text" name="telefone" placeholder="Telefone">
                    <input type="text" name="email" placeholder="Email">
                    <input type="text" name="usuario" placeholder="Usuário">
                    <!-- <label for="estados"></label> -->
                    <!-- <select id="estados" name="estados">  -->
                    <?php 
                        // while($linha = mysqli_fetch_assoc($linha_estados)) { ?>          
                        <!-- <option value="<?php //echo $linha["estadoID"];?>"> -->
                            <?php //echo $linha["nome"]; ?>
                        </option>
                        <!-- <?php //} ?> -->
                    <!-- </select> -->
                    <input type="text" name="senha" placeholder="Senha">
                   
                    <input type="submit" value="Inserir">
                </form>

            </div>
        </main>

        <?php include_once("../_incluir/rodape.php"); ?>  
    </body>
</html>

<?php
    // Fechar conexao
    mysqli_close($conecta);
?>