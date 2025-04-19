<?php
require_once 'config/db.php';

class Supplier {
    private $db;

    public function __construct() {
        $this->db = (new Database())->conn;
    }

    public function getAllSuppliers() {
        $stmt = $this->db->query("SELECT * FROM suppliers");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getSupplierById($id) {
        $stmt = $this->db->prepare("SELECT * FROM suppliers WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addSupplier($name, $email, $phone, $address) {
        $stmt = $this->db->prepare("INSERT INTO suppliers (name, email, phone, address) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$name, $email, $phone, $address]);
    }

    public function updateSupplier($id, $name, $email, $phone, $address) {
        $stmt = $this->db->prepare("UPDATE suppliers SET name = ?, email = ?, phone = ?, address = ? WHERE id = ?");
        return $stmt->execute([$name, $email, $phone, $address, $id]);
    }

    public function deleteSupplier($id) {
        // Periksa apakah supplier masih menyediakan produk
        $checkProducts = $this->db->prepare("SELECT COUNT(*) FROM products WHERE supplier_id = ?");
        $checkProducts->execute([$id]);
        $hasProducts = $checkProducts->fetchColumn() > 0;
        
        if ($hasProducts) {
            return false; // Tidak bisa menghapus supplier yang masih aktif
        }
        
        $stmt = $this->db->prepare("DELETE FROM suppliers WHERE id = ?");
        return $stmt->execute([$id]);
    }
    
    public function searchSuppliers($keyword) {
        $stmt = $this->db->prepare("SELECT * FROM suppliers WHERE name LIKE ? OR email LIKE ? OR phone LIKE ? OR address LIKE ?");
        $keyword = "%$keyword%";
        $stmt->execute([$keyword, $keyword, $keyword, $keyword]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>