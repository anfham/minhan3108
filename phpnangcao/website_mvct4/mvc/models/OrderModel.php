<?php
class OrderModel extends DB 
{
    public function getOrder (){
        $sql ="SELECT * FROM orders";
        $stm=$this->Connect()->prepare($sql);
        $stm->execute();
        $orders=$stm->fetchAll();
        return $orders;
    }
    public function getOrderID ($id){
        $sql ="SELECT * FROM orders WHERE id ='$id' ";
        $stm=$this->Connect()->prepare($sql);
        $stm->execute();
        $orders=$stm->fetchAll();
        return $orders;
    }
    public function createOrder ($id, $user_id, $customer_name, $shipping_address, $phone_number, $order_date, $total_amount, $payment_method, $order_status, $updated_at, $detail, $note){
        $sql ="INSERT INTO orders(id, user_id, customer_name, shipping_address, phone_number, order_date, total_amount, payment_method, order_status, updated_at, detail, note) VALUES";
        $sql.="('$id', '$user_id', '$customer_name', '$shipping_address', '$phone_number', '$order_date', '$total_amount', '$payment_method', '$order_status', '$updated_at', '$detail', '$note')";
        $this->Connect()->exec($sql);
    }
    public function updateOrder($id, $user_id, $customer_name, $shipping_address, $phone_number, $order_date, $total_amount, $payment_method, $order_status, $updated_at){
        $sql ="UPDATE  orders  SET user_id ='$user_id', customer_name ='$customer_name', shipping_address ='$shipping_address', phone_number ='$phone_number',";
        $sql.=" order_date ='$order_date', total_amount ='$total_amount', payment_method ='$payment_method', order_status ='$order_status',updated_at='$updated_at' WHERE  id ='$id'";
        $this->Connect()->exec($sql);
    }
    public function deleteOrder($id){
        $sql="DELETE FROM orders WHERE id = '$id'";
        $this->Connect()->exec($sql);
    }
    public function getUpdated_at($id){
        $sql="SELECT updated_at FROM user WHERE id= '$id'";
        $stm=$this->Connect()->prepare($sql);
        $stm->execute();
        $updated_at=$stm->fetch();
        return $updated_at;
    }
    public function updateUpdated_at($id, $newDate) {
        $sql = "UPDATE orders SET updated_at = ? WHERE id = ?";
        $stm = $this->Connect()->prepare($sql);
        $stm->execute([$newDate, $id]);
    }
    public function updateStatus($id, $order_status) {
        $sql = "UPDATE orders SET order_status = ?, updated_at = NOW() WHERE id = ?";
        $stm = $this->Connect()->prepare($sql);
        $stm->execute([$order_status, $id]);
    }
    public function getRevenueByMonth() {
        $sql = "SELECT DATE_FORMAT(order_date, '%Y-%m') AS month, SUM(total_amount) AS total_revenue FROM orders WHERE order_status = 'paid'";
        $sql.=" GROUP BY DATE_FORMAT(order_date, '%Y-%m') ORDER BY DATE_FORMAT(order_date, '%Y-%m') DESC";
        $stmt = $this->Connect()->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }    
    public function getRevenueByDay() {
        $sql = "SELECT DATE(order_date) AS day, SUM(total_amount) AS total_revenue FROM orders WHERE ";
        $sql.="order_status = 'paid' GROUP BY DATE(order_date) ORDER BY DATE(order_date) DESC";
        $stmt = $this->Connect()->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getRevenueByYear() {
        $sql = "SELECT YEAR(order_date) AS year, SUM(total_amount) AS total_revenue FROM orders WHERE ";
        $sql.="order_status = 'paid' GROUP BY YEAR(order_date) ORDER BY YEAR(order_date) DESC";
        $stmt = $this->Connect()->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getOrderByUserID($user_id) {
        $sql = "SELECT * FROM orders WHERE user_id = ?";
        $stm = $this->Connect()->prepare($sql);
        $stm->execute([$user_id]);
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }  
}