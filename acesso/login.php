<?php require_once("../../conexao/conexao.php"); ?>

<?php 
    //iniciar variavel de sessão
    session_start();
    if(isset($_POST["usuario"])) {
        $usuario = $_POST["usuario"];
        $senha   = $_POST["senha"];

        $login ="SELECT * FROM clientes  WHERE usuario = '{$usuario}' and senha = '{$senha}' ";
        
        $entra = mysqli_query($conecta,$login);
        if (!$entra) {
            die("Falha na consulta do banco");
        }
        $informacao = mysqli_fetch_assoc($entra);

        if(empty($informacao)) {
            $mensagem = "Login sem sucesso";
        } else{
            $_SESSION["user_portal"] = $informacao["clienteID"];//variavel de sessão
            header("location: inserir.php");
        }
    }
?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Começo de Vida</title>
        
        <!-- estilo -->
        <link href="_css/estilo.css" rel="stylesheet">
        <link href="_css/login.css"  rel="stylesheet"> 
    </head>
    <body>
        <?php include_once("../_incluir/topo.php"); ?>
        <?php include_once("../_incluir/funcoes.php"); ?>  
        <main>  
            <div id="janela_login">
                <form action="login.php" method="post"><!-- post não mostra informações na url -->
                    <h2>Tela de Login</h2>
                    <input type="text" name="usuario" placeholder="Usuário">
                    <input type="password" name="senha" placeholder="Senha">
                    <input type="submit" value="Login">
                    <?php  
                        if(isset($mensagem)) {
                    ?>
                    <p><?php echo $mensagem ?></p>
                    <?php
                        }
                    ?>
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