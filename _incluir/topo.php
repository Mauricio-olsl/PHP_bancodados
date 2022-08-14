<header>
    <div id="header_central">
        <?php // rotina de acesso ao banco de dados para a saudação
            if(isset($_SESSION["user_portal"])) {
                    
                $user = $_SESSION["user_portal"];

                $saudacao =  "SELECT nomecompleto ";
                $saudacao .= " FROM clientes ";
                $saudacao .= " WHERE clienteID = {$user} ";
                $saudacao_login = mysqli_query($conecta,$saudacao);

                if(!$saudacao_login) {
                    die("Falha no banco de dados");
                }

                $saudacao_login = mysqli_fetch_assoc($saudacao_login);
                $nome = $saudacao_login["nomecompleto"];
        ?>
            <div id="header_saudacao"> <!--mostrar saudação -->
                <h5>Seja bem vindo, <b><?php echo $nome ?></b> | <a href="logout.php"> sair</a> </h5>
            </div>
        <?php
            }
        ?>
        <img src="/avancado/public/_assets/logo_andes.gif">
        <img src="/avancado/public/_assets/text_bnwcoffee.gif">
    </div>
</header>