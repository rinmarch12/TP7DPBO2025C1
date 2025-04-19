<h2>Data Produk</h2>

<!-- Form Pencarian -->
<form method="GET" action="">
    <input type="hidden" name="page" value="products">
    <input type="text" name="search" placeholder="Cari produk..." 
           value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>">
    <button type="submit">Cari</button>
    <?php if (isset($_GET['search'])): ?>
        <a href="?page=products">Hapus Filter</a>
    <?php endif; ?>
</form>

<!-- Filter berdasarkan kategori -->
<form method="GET" action="" class="filter-form">
    <input type="hidden" name="page" value="products">
    <label>Filter Kategori:</label>
    <select name="category_id" onchange="this.form.submit()">
        <option value="">Semua Kategori</option>
        <?php foreach ($category->getAllCategories() as $c): ?>
            <option value="<?= $c['id'] ?>" <?= (isset($_GET['category_id']) && $_GET['category_id'] == $c['id']) ? 'selected' : '' ?>>
                <?= $c['name'] ?>
            </option>
        <?php endforeach; ?>
    </select>
</form>

<!-- Tombol Tambah Produk -->
<div class="action-button">
    <a href="?page=products&action=add">Tambah Produk Baru</a>
</div>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nama Produk</th>
        <th>Harga</th>
        <th>Stok</th>
        <th>Kategori</th>
        <th>Supplier</th>
        <th>Aksi</th>
    </tr>
    <?php 
    $products = [];
    
    if (isset($_GET['search'])) {
        $products = $product->searchProducts($_GET['search']);
    } elseif (isset($_GET['category_id']) && !empty($_GET['category_id'])) {
        $products = $product->getProductsByCategory($_GET['category_id']);
    } else {
        $products = $product->getAllProducts();
    }
    
    foreach ($products as $p): ?>
    <tr>
        <td><?= $p['id'] ?></td>
        <td><?= $p['name'] ?></td>
        <td>Rp <?= number_format($p['price'], 0, ',', '.') ?></td>
        <td><?= $p['stock'] ?></td>
        <td><?= $p['category_name'] ?></td>
        <td><?= $p['supplier_name'] ?></td>
        <td>
            <a href="?page=products&action=edit&id=<?= $p['id'] ?>" class="edit-btn">Edit</a> | 
            <a href="?page=products&delete=<?= $p['id'] ?>" 
               onclick="return confirm('Yakin ingin menghapus produk ini?')" class="delete-btn">Hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php if (count($products) == 0): ?>
    <p>Tidak ada data produk ditemukan.</p>
<?php endif; ?>