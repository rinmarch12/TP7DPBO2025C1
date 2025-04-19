<?php
// Form khusus untuk mengedit produk yang sudah ada
if (!isset($_GET['id'])) {
    echo "<div class='error'>ID produk tidak ditemukan!</div>";
    echo "<a href='?page=products'>Kembali ke daftar produk</a>";
    exit;
}

$product_id = $_GET['id'];
$product_data = $product->getProductById($product_id);

if (!$product_data) {
    echo "<div class='error'>Data produk tidak ditemukan!</div>";
    echo "<a href='?page=products'>Kembali ke daftar produk</a>";
    exit;
}
?>

<h2>Edit Produk</h2>
<form method="POST" class="input-form">
    <input type="hidden" name="id" value="<?= $product_data['id'] ?>">
    
    <div class="form-group">
        <label>Nama Produk:</label>
        <input type="text" name="name" value="<?= htmlspecialchars($product_data['name']) ?>" required>
    </div>
    
    <div class="form-group">
        <label>Deskripsi:</label>
        <textarea name="description" rows="4"><?= htmlspecialchars($product_data['description']) ?></textarea>
    </div>
    
    <div class="form-group">
        <label>Harga (Rp):</label>
        <input type="number" step="0.01" name="price" value="<?= $product_data['price'] ?>" required>
    </div>
    
    <div class="form-group">
        <label>Stok:</label>
        <input type="number" name="stock" value="<?= $product_data['stock'] ?>" required>
    </div>
    
    <div class="form-group">
        <label>Kategori:</label>
        <select name="category_id" required>
            <option value="">Pilih Kategori</option>
            <?php foreach ($category->getAllCategories() as $c): ?>
                <option value="<?= $c['id'] ?>" <?= ($product_data['category_id'] == $c['id']) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($c['name']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    
    <div class="form-group">
        <label>Supplier:</label>
        <select name="supplier_id" required>
            <option value="">Pilih Supplier</option>
            <?php foreach ($supplier->getAllSuppliers() as $s): ?>
                <option value="<?= $s['id'] ?>" <?= ($product_data['supplier_id'] == $s['id']) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($s['name']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    
    <div class="form-actions">
        <button type="submit" name="update_product">Update Produk</button>
        <a href="?page=products" class="button-link">Batal</a>
    </div>
</form>