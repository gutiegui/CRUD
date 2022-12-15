<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS  -->
<link rel="stylesheet" href="Cadastro.css">
    <title>Cadastro</title>
</head>
<body>
    <?php
        require('./conection.php');
        if(isset($_POST['botao_cadastro'])){
            $nome=$_POST['nome'];
            $sobrenome=$_POST['sobrenome'];
            $email=$_POST['email'];
            $senha=$_POST['senha'];
            $confiSenha=$_POST['confiSenha'];
            if (!empty($_POST['nome'])&&!empty($sobrenome=$_POST['sobrenome'])&& !empty($_POST['email'])&& !empty($_POST['senha'])) {
                if ($senha== $confiSenha) {
                    $p=crud::conect()->prepare('INSERT INTO crudtable(nome,sobrenome,email,senha) Values(:n,:l,:e,:p)');
                    $p->bindValue(':n', $nome);
                    $p->bindValue(':l', $sobrenome);
                    $p->bindValue(':e', $email);
                    $p->bindValue(':p', $senha);
                    $p->execute();
                    echo 'Sucesso';
                }else{
                    echo 'Senha não correspondente!';
                }
            }
        }

    ?>
    <div class="form" >
        <div class="title">
            <p>Cadastro form</p>
        </div>
        <form action="" method="post">
                <input type="text" name="nome" placeholder="Nome"> 
                <input type="text" name="sobrenome" placeholder="Sobrenome">
                <input type="email" name="email" placeholder="Email">
                <input type="password" name="senha" placeholder="Senha">
                <input type="password" name="confiSenha" placeholder="Confirmar Senha">
                <input type="submit" value="Cadastrar" name="botao_cadastro" >
        </form>
    </div>
    
</body>
</html>