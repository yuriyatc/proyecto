<?php
class Categoria extends Conectar{
    public function get_categoria(){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM employees";
        $sql=$conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_categoria_x_id($id){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM employees WHERE id = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function insert_categoria($foto,$nombre,$apellidos,$dni,$lugar_nacimiento,$fecha_nacimiento,$domicilio,$codigo_postal,$ciudad,$region,$carnet_conducir,$titulacion,$puesto,$inicio_contrato,$fin_contrato){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="INSERT INTO employees(id,foto,nombre,apellidos,dni,lugar_nacimiento,fecha_nacimiento,domicilio,codigo_postal,ciudad,region,carnet_conducir,titulacion,puesto,inicio_contrato,fin_contrato) VALUES (null,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $foto);
        $sql->bindValue(2, $nombre);
        $sql->bindValue(3, $apellidos);
        $sql->bindValue(4, $dni);
        $sql->bindValue(5, $lugar_nacimiento);
        $sql->bindValue(6, $fecha_nacimiento);
        $sql->bindValue(7, $domicilio);
        $sql->bindValue(8, $codigo_postal);
        $sql->bindValue(9, $ciudad);
        $sql->bindValue(10, $region);
        $sql->bindValue(11, $carnet_conducir);
        $sql->bindValue(12, $titulacion);
        $sql->bindValue(13, $puesto);
        $sql->bindValue(14, $inicio_contrato);
        $sql->bindValue(15, $fin_contrato);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update_categoria($id,$foto,$nombre,$apellidos,$dni,$lugar_nacimiento,$fecha_nacimiento,$domicilio,$codigo_postal,$ciudad,$region,$carnet_conducir,$titulacion){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="UPDATE employees set
            foto = ?,
            nombre = ?,
            apellidos = ?,
            dni = ?,
            lugar_nacimiento = ?,
            fecha_nacimiento = ?,
            domicilio = ?,
            codigo_postal = ?,
            ciudad = ?,
            region = ?,
            carnet_conducir = ?,
            titulacion = ?            
            WHERE
            id = ?";
        $sql=$conectar->prepare($sql);        
        $sql->bindValue(1, $foto);
        $sql->bindValue(2, $nombre);
        $sql->bindValue(3, $apellidos);
        $sql->bindValue(4, $dni);
        $sql->bindValue(5, $lugar_nacimiento);
        $sql->bindValue(6, $fecha_nacimiento);
        $sql->bindValue(7, $domicilio);
        $sql->bindValue(8, $codigo_postal);
        $sql->bindValue(9, $ciudad);
        $sql->bindValue(10, $region);
        $sql->bindValue(11, $carnet_conducir);
        $sql->bindValue(12, $titulacion);
        $sql->bindValue(13, $id);        
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete_categoria($id){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="UPDATE employees set
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
        $sql="DELETE FROM employees WHERE id=?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }


}



?>