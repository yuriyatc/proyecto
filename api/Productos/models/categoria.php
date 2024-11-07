<?php
class Categoria extends Conectar{
    public function get_categoria(){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM products ";
        $sql=$conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_categoria_x_id($id){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM products WHERE  id = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function insert_categoria($name,$quantity,$buy_price,$sale_price,$categorie_id,$media_id,$date,$id_supplier){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="INSERT INTO products(id,name,quantity,buy_price,sale_price,categorie_id,media_id,date,id_supplier) VALUES (null,?,?,?,?,?,?,?,?);";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $name);
        $sql->bindValue(2, $quantity);
        $sql->bindValue(3, $buy_price);
        $sql->bindValue(4, $sale_price);
        $sql->bindValue(5, $categorie_id);
        $sql->bindValue(6, $media_id);
        $sql->bindValue(7, $date);
        $sql->bindValue(8, $id_supplier);        
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update_categoria($id,$name){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="UPDATE products set
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
        $sql="UPDATE products set
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
        $sql="DELETE FROM products WHERE id=?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }


}



?>