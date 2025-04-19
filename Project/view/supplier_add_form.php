<?php
// Form khusus untuk menambah supplier baru
?>

<h2>Tambah Supplier Baru</h2>
<form method="POST" class="input-form">
    <div class="form-group">
        <label>Nama Supplier:</label>
        <input type="text" name="name" required>
    </div>
    
    <div class="form-group">
        <label>Email:</label>
        <input type="email" name="email" required>
    </div>
    
    <div class="form-group">
        <label>Telepon:</label>
        <input type="text" name="phone">
    </div>
    
    <div class="form-group">
        <label>Alamat:</label>
        <textarea name="address" rows="3"></textarea>
    </div>
    
    <div class="form-actions">
        <button type="submit" name="add_supplier">Simpan Supplier</button>
        <a href="?page=suppliers" class="button-link">Batal</a>
    </div>
</form>