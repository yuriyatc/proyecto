<?php
class Categoria extends Conectar{
    public function get_categoria(){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM suppliers WHERE activo = 'si' ";
        $sql=$conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_categoria_x_id($id){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM suppliers WHERE activo = 'si' AND id = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function insert_categoria($nombre,$direccion,$poblacion,$estado,$telefono,$descripcion,$fecha_inicio){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="INSERT INTO suppliers(id,nombre,direccion,poblacion,estado,telefono,descripcion,fecha_inicio,activo) VALUES (null,?,?,?,?,?,?,?,'si');";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $nombre);
        $sql->bindValue(2, $direccion);
        $sql->bindValue(3, $poblacion);
        $sql->bindValue(4, $estado);
        $sql->bindValue(5, $telefono);
        $sql->bindValue(6, $descripcion);
        $sql->bindValue(7, $fecha_inicio);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update_categoria($id,$nombre,$direccion,$poblacion,$estado,$telefono,$descripcion){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="UPDATE suppliers set
            nombre = ?,
            direccion = ?,
            poblacion = ?,
            estado = ?,
            telefono = ?,
            descripcion = ?
            WHERE
            id = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $nombre);
        $sql->bindValue(2, $direccion);
        $sql->bindValue(3, $poblacion);
        $sql->bindValue(4, $estado);
        $sql->bindValue(5, $telefono);
        $sql->bindValue(6, $descripcion);
        $sql->bindValue(7, $id);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete_categoria($id){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="UPDATE suppliers set
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
        $sql="DELETE FROM suppliers WHERE id=?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }


}



?>