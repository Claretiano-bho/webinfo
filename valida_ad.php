    <?php
    session_start();

    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    //Endereco do servido AD IP ou nome
    $servidor = "192.168.18.5";

    //Domínio
    $dom = "claretiano.rede";

    //grupo
    $grupo = "cn=BHO-Banner,ou=Grupos,ou=BHO,dc=claretiano,dc=rede";

    //filtro 
    $filtro = "(&(objectCategory=user)(memberOf=BHO-CTIC))";

    //none usuários
    $attr = array("displayName", "description", "cn", "givenName", "sn", "mail", "co", "mobile", "company", "displayName");

    // Conexão com servidor AD. 
    $ad = ldap_connect($servidor)
        or die("Não foi possível conexão com Active Directory!");

    // Versao do protocolo       
    ldap_set_option($ad, LDAP_OPT_PROTOCOL_VERSION, 3);
    // Usara as referencias do servidor AD, neste caso nao
    ldap_set_option($ad, LDAP_OPT_REFERRALS, 0);

    // Bind to the directory server.
    $bd = ldap_bind($ad, $usuario . "@" . $dom, $senha)
        or die(header('Location:http://www.webinfo1.claretiano/propagandas/login.php'));
    if ($bd) {
        $pesquisa = ldap_search($ad, $grupo, $filtro, $attr) or die("Erro na pesquisa...");
        $_SESSION['login'] = $usuario;
        $_SESSION['password'] = $senha;
        header('Location:importa.php');
    } else {
        header('Location:http://www.webinfo1.claretiano/propagandas/login.php');
    }

    //Fecha conexao
    ldap_unbind($ad);
    ?>
