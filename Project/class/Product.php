<?php
require_once 'config/db.php';

class Product {
    private $db;

    public function __construct() {
        $this->db = (new Database())->conn;
    }

    public function getAllProducts() {
        $stmt = $this->db->query("SELECT p.*, c.name as category_name, s.name as supplier_name 
                                 FROM products p 
                                 JOIN categories c ON p.category_id = c.id 
                                 JOIN suppliers s ON p.supplier_id = s.id");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProductById($id) {
        $stmt = $this->db->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addProduct($name, $description, $price, $stock, $category_id, $supplier_id) {
        $stmt = $this->db->prepare("INSERT INTO products (name, description, price, stock, category_id, supplier_id) 
                                   VALUES (?, ?, ?, ?, ?, ?)");
        return $stmt->execute([$name, $description, $price, $stock, $category_id, $supplier_id]);
    }

    public function updateProduct($id, $name, $description, $price, $stock, $category_id, $supplier_id) {
        $stmt = $this->db->prepare("UPDATE products 
                                   SET name = ?, description = ?, price = ?, stock = ?, category_id = ?, supplier_id = ? 
                                   WHERE id = ?");
        return $stmt->execute([$name, $description, $price, $stock, $category_id, $supplier_id, $id]);
    }

    public function deleteProduct($id) {
        $stmt = $this->db->prepare("DELETE FROM products WHERE id = ?");
        return $stmt->execute([$id]);
    }
    
    public function searchProducts($keyword) {
        $stmt = $this->db->prepare("SELECT p.*, c.name as category_name, s.name as supplier_name 
                                   FROM products p 
                                   JOIN categories c ON p.category_id = c.id 
                                   JOIN suppliers s ON p.supplier_id = s.id 
                                   WHERE p.name LIKE ? OR p.description LIKE ?");
        $keyword = "%$keyword%";
        $stmt->execute([$keyword, $keyword]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getProductsByCategory($category_id) {
        $stmt = $this->db->prepare("SELECT p.*, c.name as category_name, s.name as supplier_name 
                                   FROM products p 
                                   JOIN categories c ON p.category_id = c.id 
                                   JOIN suppliers s ON p.supplier_id = s.id 
                                   WHERE p.category_id = ?");
        $stmt->execute([$category_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getProductsBySupplier($supplier_id) {
        $stmt = $this->db->prepare("SELECT p.*, c.name as category_name, s.name as supplier_name 
                                   FROM products p 
                                   JOIN categories c ON p.category_id = c.id 
                                   JOIN suppliers s ON p.supplier_id = s.id 
                                   WHERE p.supplier_id = ?");
        $stmt->execute([$supplier_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>