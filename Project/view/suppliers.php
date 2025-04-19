<h2>Data Supplier</h2>

<!-- Form Pencarian -->
<form method="GET" action="">
    <input type="hidden" name="page" value="suppliers">
    <input type="text" name="search" placeholder="Cari supplier..." 
           value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>">
    <button type="submit">Cari</button>
    <?php if (isset($_GET['search'])): ?>
        <a href="?page=suppliers">Hapus Filter</a>
    <?php endif; ?>
</form>

<!-- Tombol Tambah Supplier -->
<div class="action-button">
    <a href="?page=suppliers&action=add">Tambah Supplier Baru</a>
</div>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Telepon</th>
        <th>Alamat</th>
        <th>Aksi</th>
    </tr>
    <?php 
    $suppliers = isset($_GET['search']) 
        ? $supplier->searchSuppliers($_GET['search']) 
        : $supplier->getAllSuppliers();
    
    foreach ($suppliers as $s): ?>
    <tr>
        <td><?= $s['id'] ?></td>
        <td><?= $s['name'] ?></td>
        <td><?= $s['email'] ?></td>
        <td><?= $s['phone'] ?></td>
        <td><?= $s['address'] ?></td>
        <td>
            <a href="?page=suppliers&action=edit&id=<?= $s['id'] ?>" class="edit-btn">Edit</a> | 
            <a href="?page=suppliers&delete=<?= $s['id'] ?>" 
               onclick="return confirm('Yakin ingin menghapus supplier ini?')" class="delete-btn">Hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php if (count($suppliers) == 0): ?>
    <p>Tidak ada data supplier ditemukan.</p>
<?php endif; ?>