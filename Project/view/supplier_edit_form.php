<?php
// Form khusus untuk mengedit supplier yang sudah ada
if (!isset($_GET['id'])) {
    echo "<div class='error'>ID supplier tidak ditemukan!</div>";
    echo "<a href='?page=suppliers'>Kembali ke daftar supplier</a>";
    exit;
}

$supplier_id = $_GET['id'];
$supplier_data = $supplier->getSupplierById($supplier_id);

if (!$supplier_data) {
    echo "<div class='error'>Data supplier tidak ditemukan!</div>";
    echo "<a href='?page=suppliers'>Kembali ke daftar supplier</a>";
    exit;
}
?>

<h2>Edit Supplier</h2>
<form method="POST" class="input-form">
    <input type="hidden" name="id" value="<?= $supplier_data['id'] ?>">
    
    <div class="form-group">
        <label>Nama Supplier:</label>
        <input type="text" name="name" value="<?= htmlspecialchars($supplier_data['name']) ?>" required>
    </div>
    
    <div class="form-group">
        <label>Email:</label>
        <input type="email" name="email" value="<?= htmlspecialchars($supplier_data['email']) ?>" required>
    </div>
    
    <div class="form-group">
        <label>Telepon:</label>
        <input type="text" name="phone" value="<?= htmlspecialchars($supplier_data['phone']) ?>">
    </div>
    
    <div class="form-group">
        <label>Alamat:</label>
        <textarea name="address" rows="3"><?= htmlspecialchars($supplier_data['address']) ?></textarea>
    </div>
    
    <div class="form-actions">
        <button type="submit" name="update_supplier">Update Supplier</button>
        <a href="?page=suppliers" class="button-link">Batal</a>
    </div>
</form>