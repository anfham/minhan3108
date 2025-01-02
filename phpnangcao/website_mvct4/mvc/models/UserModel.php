<?php
class UserModel extends DB {
    public function getUserID($id) {
        $sql = "SELECT * FROM user WHERE id = :id";
        $stm = $this->Connect()->prepare($sql);
        $stm->bindParam(":id", $id, PDO::PARAM_INT);
        $stm->execute();
        return $stm->fetch(PDO::FETCH_ASSOC);
    }

    public function updateUser($id, $name, $email, $password, $phone, $sex, $address) {
        $sql = "UPDATE user 
                SET name = :name, email = :email, password = :password, phone = :phone, sex = :sex, address = :address 
                WHERE id = :id";
        $stm = $this->Connect()->prepare($sql);
        $stm->bindParam(":name", $name);
        $stm->bindParam(":email", $email);
        $stm->bindParam(":password", $password);
        $stm->bindParam(":phone", $phone);
        $stm->bindParam(":sex", $sex);
        $stm->bindParam(":address", $address);
        $stm->bindParam(":id", $id, PDO::PARAM_INT);
        $stm->execute();
    }
}
