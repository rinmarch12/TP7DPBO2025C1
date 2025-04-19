<?php
// Form khusus untuk menambah produk baru
?>

<h2>Tambah Produk Baru</h2>
<form method="POST" class="input-form">
    <div class="form-group">
        <label>Nama Produk:</label>
        <input type="text" name="name" required>
    </div>
    
    <div class="form-group">
        <label>Deskripsi:</label>
        <textarea name="description" rows="4"></textarea>
    </div>
    
    <div class="form-group">
        <label>Harga (Rp):</label>
        <input type="number" step="0.01" name="price" required>
    </div>
    
    <div class="form-group">
        <label>Stok:</label>
        <input type="number" name="stock" value="0" required>
    </div>
    
    <div class="form-group">
        <label>Kategori:</label>
        <select name="category_id" required>
            <option value="">Pilih Kategori</option>
            <?php foreach ($category->getAllCategories() as $c): ?>
                <option value="<?= $c['id'] ?>"><?= htmlspecialchars($c['name']) ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    
    <div class="form-group">
        <label>Supplier:</label>
        <select name="supplier_id" required>
            <option value="">Pilih Supplier</option>
            <?php foreach ($supplier->getAllSuppliers() as $s): ?>
                <option value="<?= $s['id'] ?>"><?= htmlspecialchars($s['name']) ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    
    <div class="form-actions">
        <button type="submit" name="add_product">Simpan Produk</button>
        <a href="?page=products" class="button-link">Batal</a>
    </div>
</form>