<?php
// Form khusus untuk menambah kategori baru
?>

<h2>Tambah Kategori Baru</h2>
<form method="POST" class="input-form">
    <div class="form-group">
        <label>Nama Kategori:</label>
        <input type="text" name="name" required>
    </div>
    
    <div class="form-group">
        <label>Deskripsi:</label>
        <textarea name="description" rows="4"></textarea>
    </div>
    
    <div class="form-actions">
        <button type="submit" name="add_category">Simpan Kategori</button>
        <a href="?page=categories" class="button-link">Batal</a>
    </div>
</form>