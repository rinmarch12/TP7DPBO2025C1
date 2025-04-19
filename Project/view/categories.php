<h2>Data Kategori</h2>

<!-- Form Pencarian -->
<form method="GET" action="">
    <input type="hidden" name="page" value="categories">
    <input type="text" name="search" placeholder="Cari kategori..." 
           value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>">
    <button type="submit">Cari</button>
    <?php if (isset($_GET['search'])): ?>
        <a href="?page=categories">Hapus Filter</a>
    <?php endif; ?>
</form>

<!-- Tombol Tambah Kategori -->
<div class="action-button">
    <a href="?page=categories&action=add">Tambah Kategori Baru</a>
</div>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nama Kategori</th>
        <th>Deskripsi</th>
        <th>Aksi</th>
    </tr>
    <?php 
    $categories = isset($_GET['search']) 
        ? $category->searchCategories($_GET['search']) 
        : $category->getAllCategories();
    
    foreach ($categories as $c): ?>
    <tr>
        <td><?= $c['id'] ?></td>
        <td><?= $c['name'] ?></td>
        <td><?= $c['description'] ?></td>
        <td>
            <a href="?page=categories&action=edit&id=<?= $c['id'] ?>" class="edit-btn">Edit</a> | 
            <a href="?page=categories&delete=<?= $c['id'] ?>" 
               onclick="return confirm('Yakin ingin menghapus kategori ini?')" class="delete-btn">Hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php if (count($categories) == 0): ?>
    <p>Tidak ada data kategori ditemukan.</p>
<?php endif; ?>