<?php
class LoginModel extends DB{
    public function getAccount(){
        $sql="SELECT * FROM user ";
        $stm=$this->Connect()->prepare($sql);
        $stm->execute();
        $users=$stm->fetchAll();
        return $users;
    }
    public function getCustomerAccount(){
        $sql="SELECT * FROM user WHERE user_type = 'user'";
        $stm=$this->Connect()->prepare($sql);
        $stm->execute();
        $customer=$stm->fetchAll();
        return $customer;
    }
    public function checkEmailExists($email) {
        $sql = "SELECT COUNT(*) FROM user WHERE email = :email";
        $stm = $this->Connect()->prepare($sql);
        $stm->bindParam(':email', $email);
        $stm->execute();
        return $stm->fetchColumn() > 0;
    }    
    public function getUserID($id){
        $sql="SELECT * FROM user WHERE id= '$id'";
        $stm=$this->Connect()->prepare($sql);
        $stm->execute();
        $user=$stm->fetch();
        return $user;
    }
    public function getUserType($user_type){
        $sql="SELECT * FROM user WHERE user_type= '$user_type'";
        $stm=$this->Connect()->prepare($sql);
        $stm->execute();
        $userType=$stm->fetch();
        return $userType;
    }
    public function getMaxUserID(){
        $sql = "SELECT MAX(id) AS max_id FROM user";
        $stm = $this->Connect()->prepare($sql);
        $stm->execute();
        $kq = $stm->fetch();
        return $kq['max_id'];
    }
    public function getEmail($email){
        $sql="SELECT * FROM user WHERE email= '$email'";
        $stm=$this->Connect()->prepare($sql);
        $stm->execute();
        $email=$stm->fetch();
        return $email;
    }
    public function insertUser($id,$name,$email,$password,$user_type,$user_create_date,$buy_state){
        $sql ="INSERT INTO user (id,name,email,password,user_type,user_create_date,buy_state)";
        $sql.="VALUES ('$id', '$name', '$email', '$password', '$user_type', '$user_create_date', '$buy_state')";
        $this->Connect()->exec($sql);
    }     
    public function insertUser2($id,$name,$email,$password,$user_type,$phone,$sex,$address,$user_create_date,$buy_state){
        $sql ="INSERT INTO user (id,name,email,password,user_type,phone,sex,address,user_create_date,buy_state)";
        $sql.="VALUES ('$id', '$name', '$email', '$password', '$user_type', '$phone', '$sex', '$address', '$user_create_date', '$buy_state')";
        $this->Connect()->exec($sql);
    }     
    public function login($email, $password) {
        $sql = "SELECT * FROM user WHERE email = :email AND password = :password";
        $stm = $this->Connect()->prepare($sql);
    
        // Ràng buộc tham số để tránh SQL injection
        $stm->bindParam(':email', $email);
        $stm->bindParam(':password', $password);
    
        $stm->execute();
        $user = $stm->fetch(PDO::FETCH_ASSOC); // Lấy thông tin người dùng nếu tìm thấy
    
        if ($user) {
            return $user;
        } else {
            return false; // Không tìm thấy user
        }
    }
    public function updateUser($id,$name,$email,$password,$user_type,$phone,$sex,$address){
        $sql="UPDATE user SET ";
        $sql.="name ='$name', email ='$email', password ='$password',";
        $sql.="user_type ='$user_type',phone ='$phone',sex ='$sex',address ='$address'";
        $sql.="WHERE id ='$id'";
        $this->Connect()->exec($sql);
    }
    public function deleteUser($id){
        $sql ="DELETE FROM  user WHERE id='$id' AND buy_state = 'havent'";
        $this->Connect()->exec($sql);
    }
    public function updateAccessLevel($id, $access_lvl) {
        $sql = "UPDATE user SET access_lvl = '$access_lvl' WHERE id = '$id'";
        $this->Connect()->exec($sql);
    }
    public function updateBuy_state($id, $buy_state) {
        $sql = "UPDATE user SET buy_state = '$buy_state' WHERE id = '$id'";
        $this->Connect()->exec($sql);
    }
    public function getBuy_state($id) {
        $sql = "SELECT buy_state FROM user WHERE id = ?";
        $stmt = $this->Connect()->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetchColumn();
    }
    public function getTotal_spend($id) {
        $sql = "SELECT total_spend FROM user WHERE id = ?";
        $stmt = $this->Connect()->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetchColumn();
    }
    public function updateTotal_spend($id, $new_spend) {
        $current_spend = $this->getTotal_spend($id);
        $total_spend = $current_spend + $new_spend;
        $sql = "UPDATE user SET total_spend = ? WHERE id = ?";
        $stmt = $this->Connect()->prepare($sql);
        $stmt->execute([$total_spend, $id]);
    }
    public function searchUser($keyword) {
        $sql = "SELECT * FROM user WHERE name LIKE ?";     
        $stm = $this->Connect()->prepare($sql);
        $stm->execute(['%' . $keyword . '%']);
        return $stm->fetchAll();
    } 
    public function searchCustomer($keyword, $status) {
        $sql = "SELECT * FROM user WHERE name LIKE ? AND user_type = 'user'";     
        if ($status) {
            if ($status == 'sắt') {
                $sql .= " AND total_spend < 100000"; 
            } elseif ($status == 'đồng') {
                $sql .= " AND total_spend >= 100000 AND total_spend < 1000000"; 
            } elseif ($status == 'bạc') {
                $sql .= " AND total_spend >= 1000000 AND total_spend < 3000000";
            } elseif ($status == 'vàng') { 
                $sql .= " AND total_spend >= 3000000 AND total_spend < 5000000";
            } elseif ($status == 'bạch kim') {
                $sql .= " AND total_spend >= 5000000 AND total_spend < 10000000";
            } elseif ($status == 'lục bảo') {
                $sql .= " AND total_spend >= 10000000 AND total_spend < 50000000";
            } elseif ($status == 'kim cương') {
                $sql .= " AND total_spend >= 50000000 AND total_spend < 69000000";
            } elseif ($status == 'V.I.P') {
                $sql .= " AND total_spend > 69000000";
            } 
        } 
        $stm = $this->Connect()->prepare($sql);
        $stm->execute(['%' . $keyword . '%']);
        return $stm->fetchAll(PDO::FETCH_ASSOC) ?: [];
    }    
}
