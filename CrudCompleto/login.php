<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS  -->
<link rel="stylesheet" href="Cadastro.css">
    <title>Logar</title>
    <style>
        .form{
            width: 300px;
            height: 400px;
        }
    </style>
</head>
<body>

        <?php
            require('./conection.php');
            if (isset($_POST['botao_login'])) {
                $_SESSION['validate']=false;
                $nome=$_POST['nome'];
                $senha=$_POST['senha'];
                $p=crud::conect()->prepare('SELECT *FROM crudtable WHERE nome=:n and senha=:p');
                $p->bindValue(':n',$nome);
                $p->bindValue(':p',$senha);
                $p->execute();
                // $d=$p->fetchALL(PDO::FETCH_ASSOC);
                if ($p->rowCount()>0) {
                    $_SESSION['nome']=$nome;
                    $_SESSION['senha']=$senha;
                    $_SESSION['validate']=true;
                    header('location:users.php');
                    echo 'Logado com sucesso';
                }else{
                    echo'Certifique-se de que você está registrado';
            }
        
        }    
    ?>
    <div class="form" >
        <div class="title">
            <p>Login</p>
        </div>
        <form action="" method="post">
                <input type="text" name="nome" placeholder="Nome"> 
                <input type="password" name="senha" placeholder="Senha">
                <input type="submit" value="Logar" name="botao_login" >
        </form>
    </div>
    
</body>
</html>