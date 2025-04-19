<?php
// Form khusus untuk mengedit kategori yang sudah ada
if (!isset($_GET['id'])) {
    echo "<div class='error'>ID kategori tidak ditemukan!</div>";
    echo "<a href='?page=categories'>Kembali ke daftar kategori</a>";
    exit;
}

$category_id = $_GET['id'];
$category_data = $category->getCategoryById($category_id);

if (!$category_data) {
    echo "<div class='error'>Data kategori tidak ditemukan!</div>";
    echo "<a href='?page=categories'>Kembali ke daftar kategori</a>";
    exit;
}
?>

<h2>Edit Kategori</h2>
<form method="POST" class="input-form">
    <input type="hidden" name="id" value="<?= $category_data['id'] ?>">
    
    <div class="form-group">
        <label>Nama Kategori:</label>
        <input type="text" name="name" value="<?= htmlspecialchars($category_data['name']) ?>" required>
    </div>
    
    <div class="form-group">
        <label>Deskripsi:</label>
        <textarea name="description" rows="4"><?= htmlspecialchars($category_data['description']) ?></textarea>
    </div>
    
    <div class="form-actions">
        <button type="submit" name="update_category">Update Kategori</button>
        <a href="?page=categories" class="button-link">Batal</a>
    </div>
</form>