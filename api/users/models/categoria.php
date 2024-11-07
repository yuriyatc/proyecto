<?php
class Categoria extends Conectar{
    public function get_categoria(){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM users WHERE status = 1";
        $sql=$conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_categoria_x_id($cat_id){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM users WHERE status = 1 AND cat_id = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $cat_id);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function insert_categoria($name,$username,$password,$user_level,$image,$status){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="INSERT INTO users(id,name,username,password,user_level,image,status) VALUES (null,?,?,?,?,?,?);";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $name);
        $sql->bindValue(2, $username);
        $sql->bindValue(3, $password);
        $sql->bindValue(4, $user_level);
        $sql->bindValue(5, $image);
        $sql->bindValue(6, $status);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update_categoria($id,$name,$username,$password){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="UPDATE users set
            name = ?,
            username = ?,
            password = ?
            WHERE
            id = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $name);
        $sql->bindValue(2, $username);
        $sql->bindValue(3, $password);
        $sql->bindValue(4, $id);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete_categoria($id){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="UPDATE users set
            status = '0'
            WHERE
            id = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function eliminar_categoria($cat_id){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="DELETE FROM users WHERE id=?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $cat_id);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }


}



?>