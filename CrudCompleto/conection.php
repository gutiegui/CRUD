<?php
    class crud{
        public static function conect()
        {
            try {
                $con=new PDO('mysql:localhost=host; dbname=crudsystem','root','');
                return $con;
            } catch (PDOException $error1) {
                echo 'Algo deu errado, não foi possível conectar ao banco de dados'.$error1->getMessage();
            }catch(Exception $error2){
                echo 'Erro Generico'.$error2->getMessage();
            }

        }
        public static function Selectdata()
        {
            $data=array();
            $p=crud::conect()->prepare('SELECT * FROM crudtable ');
            $p->execute();
            $data=$p->fetchAll(PDO::FETCH_ASSOC);
            return $data;    
        }
        public static function delete($id)
        {
            $p=crud::conect()->prepare('Delete FROM crudtable where id=:id');
            $p->bindValue(':id',$id);
            $p->execute();
        }
    }










?>