<?php
class Categoria extends Conectar{
    public function get_categoria(){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM categories ";
        $sql=$conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_categoria_x_id($id){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM categories WHERE  id = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function insert_categoria($name){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="INSERT INTO categories(id,name) VALUES (null,?);";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $name);        
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update_categoria($id,$name){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="UPDATE categories set
            name = ?           
            WHERE
            id = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $name);        
        $sql->bindValue(2, $id);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete_categoria($id){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="UPDATE categories set
            activo = 'no'
            WHERE
            id = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function eliminar_categoria($id){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="DELETE FROM categories WHERE id=?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }


}



?>