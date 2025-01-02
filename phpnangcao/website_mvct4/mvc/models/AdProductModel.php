<?php 
class AdProductModel extends DB{
    //hiển thị  dữ liệu
    public function getAdProduct(){
        $sql="SELECT * FROM ad_product ";
        $stm=$this->Connect()->prepare($sql);
        $stm->execute();
        $product=$stm->fetchAll();
        return $product;
    }
    public function getProductTypes() {
        $sql = "SELECT * FROM producttype";
        return $this->Connect()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }    
    public function checkProductExists($masp) {
        $sql = "SELECT COUNT(*) FROM ad_product WHERE masp = :masp";
        $stm = $this->Connect()->prepare($sql);
        $stm->bindParam(':masp', $masp);
        $stm->execute();
        return $stm->fetchColumn() > 0; 
    }    
    public function insertAdProduct($ma_loaisp,$masp,$tensp,$hinhanh,$soluong,$gianhap,$giaxuat,$khuyenmai,$mota,$create_date){
        $sql = "INSERT INTO ad_product (ma_loaisp, masp, tensp, hinhanh, soluong, gianhap, giaxuat, khuyenmai, mota, create_date) ";
        $sql .= "VALUES ('$ma_loaisp', '$masp', '$tensp', '$hinhanh', '$soluong', '$gianhap', '$giaxuat', '$khuyenmai', '$mota', '$create_date')";
        $this->Connect()->exec($sql);
    }
    public function getAdProductID($masp){
        $sql="SELECT * FROM ad_product WHERE masp='$masp'";
        $stm=$this->Connect()->prepare($sql);
        $stm->execute();
        $productID=$stm->fetch();
        return $productID;
    }
    public function deleteAdProduct($masp){
        $sql ="DELETE FROM ad_product WHERE masp='$masp'";
        $this->Connect()->exec($sql);
    }
    public function updateAdProduct($ma_loaisp,$masp,$tensp,$hinhanh,$soluong,$gianhap,$giaxuat,$khuyenmai,$mota,$create_date){
        $sql="UPDATE ad_product SET ";
        $sql.="ma_loaisp ='$ma_loaisp', tensp ='$tensp', hinhanh ='$hinhanh', soluong ='$soluong', gianhap ='$gianhap', giaxuat ='$giaxuat', khuyenmai ='$khuyenmai', mota ='$mota', create_date ='$create_date'";
        $sql.="WHERE masp='$masp'";
        $this->Connect()->exec($sql);
    }
    public function checkProductTypeExists($ma_loaisp) {
        $sql = "SELECT COUNT(*) FROM producttype WHERE ma_loaisp = ?";
        $stmt = $this->Connect()->prepare($sql);
        $stmt->execute([$ma_loaisp]);
        return $stmt->fetchColumn() > 0;
    }
    public function applyDiscount($masp, $discountAmount, $startDate, $endDate) {
        $currentDate = date('Y-m-d');
        $sql = "";
    
        if ($currentDate >= $startDate && $currentDate <= $endDate) {
            $sql = "UPDATE ad_product SET khuyenmai = $discountAmount WHERE masp = '$masp'";
        } else {
            $sql = "UPDATE ad_product SET khuyenmai = 0 WHERE masp = '$masp'";
        }
        $this->Connect()->exec($sql);
    }
    public function updateStock($masp, $newStock) {
        $sql = "UPDATE ad_product SET soluong = ? WHERE masp = ?";
        $stm = $this->Connect()->prepare($sql);
        $stm->execute([$newStock, $masp]);
    }
    public function searchAdProduct($keyword, $status) {
        $sql = "SELECT * FROM ad_product WHERE tensp LIKE ?";     
        if ($status) {
            if ($status == 'còn hàng') {
                $sql .= " AND soluong > 0"; 
            } elseif ($status == 'hết hàng') {
                $sql .= " AND soluong = 0"; 
            }
        }      
        $stm = $this->Connect()->prepare($sql);
        $stm->execute(['%' . $keyword . '%']);
        return $stm->fetchAll();
    }
    public function searchAdProduct2($keyword) {
        $sql = "SELECT * FROM ad_product WHERE tensp LIKE ?";     
        $stm = $this->Connect()->prepare($sql);
        $stm->execute(['%' . $keyword . '%']);
        return $stm->fetchAll();
    }      
    public function trusoluong($masp, $soluong) {
        $sql = "UPDATE ad_product SET soluong = soluong - :soluong WHERE masp = :masp AND soluong >= :soluong";
        $stmt = $this->Connect()->prepare($sql);
        $stmt->bindParam(':soluong', $soluong, PDO::PARAM_INT);
        $stmt->bindParam(':masp', $masp, PDO::PARAM_INT);
        $stmt->execute();
    }      
    public function getQuantity($masp) {
        $sql = "SELECT soluong FROM ad_product WHERE masp = :masp";
        $stmt = $this->Connect()->prepare($sql);
        $stmt->bindParam(':masp', $masp, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['soluong'];
    }     
    public function searchAdProductByPrice($keyword, $minPrice, $maxPrice, $status = null) {
        $sql = "SELECT * FROM ad_product WHERE tensp LIKE ?";
        $params = ['%' . $keyword . '%'];
    
        // Điều kiện theo khoảng giá
        if ($minPrice !== null && $maxPrice !== null) {
            $sql .= " AND giaxuat BETWEEN ? AND ?";
            $params[] = $minPrice;
            $params[] = $maxPrice;
        } elseif ($minPrice !== null) {
            $sql .= " AND giaxuat >= ?";
            $params[] = $minPrice;
        } elseif ($maxPrice !== null) {
            $sql .= " AND giaxuat <= ?";
            $params[] = $maxPrice;
        }
    
        // Điều kiện trạng thái (còn hàng/hết hàng)
        if (!empty($status)) {
            if ($status == 'còn hàng') {
                $sql .= " AND soluong > 0";
            } elseif ($status == 'hết hàng') {
                $sql .= " AND soluong = 0";
            }
        }
    
        // Chuẩn bị và thực thi câu lệnh SQL
        $stm = $this->Connect()->prepare($sql);
        $stm->execute($params);
    
        return $stm->fetchAll();
    }
}