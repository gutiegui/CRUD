<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=], initial-scale=1.0">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/374ad0c3df.js" crossorigin="anonymous"></script>
    <!-- CSS only -->
<link rel="stylesheet" href="table.css">
</head>
<body>

    <table>
        <thead>
            <tr>                     
                <th  >Nome</th>
                <th  >Sobrenome</th>
                <th >Email</th>
                <th >Senha</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>     
        </thead>
        <tbody>
            <?php
            require('./conection.php');
            $p=crud::Selectdata();
            if (isset($_GET['id'])) {
                $id=$_GET['id'];
                $e=crud::delete($id);
            }
            if(count( $p)>0){
                for ($i=0; $i < count($p); $i++){
                 echo '<tr>';
                 foreach ( $p[$i] as $key => $value) {
                    if ($key!='id') {
                        echo '<td>'.$value.'</td>';

                    }
                    }
                    ?>

                    <td><a href="users.php?id=<?php echo $p[$i]['id']?>" ><i class="fa-solid fa-trash"></a></td></i>
                    <td><a href="upDate.php"><i class="fa-regular fa-pen-to-square"></i></a></td>
                    <?php
                    echo '</tr>';
                }
            }



?>



        </tbody>
    </table>
    
</body>
</html>