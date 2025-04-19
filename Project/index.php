<?php
require_once 'class/Category.php';
require_once 'class/Supplier.php';
require_once 'class/Product.php';

$category = new Category();
$supplier = new Supplier();
$product = new Product();

// Handle Category CRUD
if (isset($_POST['add_category'])) {
    if ($category->addCategory($_POST['name'], $_POST['description'])) {
        header('Location: ?page=categories&success=added');
        exit;
    }
}

if (isset($_POST['update_category'])) {
    if ($category->updateCategory($_POST['id'], $_POST['name'], $_POST['description'])) {
        header('Location: ?page=categories&success=updated');
        exit;
    }
}

if (isset($_GET['page']) && $_GET['page'] == 'categories' && isset($_GET['delete'])) {
    if ($category->deleteCategory($_GET['delete'])) {
        header('Location: ?page=categories&success=deleted');
    } else {
        header('Location: ?page=categories&error=delete_failed');
    }
    exit;
}

// Handle Supplier CRUD
if (isset($_POST['add_supplier'])) {
    if ($supplier->addSupplier($_POST['name'], $_POST['email'], $_POST['phone'], $_POST['address'])) {
        header('Location: ?page=suppliers&success=added');
        exit;
    }
}

if (isset($_POST['update_supplier'])) {
    if ($supplier->updateSupplier($_POST['id'], $_POST['name'], $_POST['email'], $_POST['phone'], $_POST['address'])) {
        header('Location: ?page=suppliers&success=updated');
        exit;
    }
}

if (isset($_GET['page']) && $_GET['page'] == 'suppliers' && isset($_GET['delete'])) {
    if ($supplier->deleteSupplier($_GET['delete'])) {
        header('Location: ?page=suppliers&success=deleted');
    } else {
        header('Location: ?page=suppliers&error=delete_failed');
    }
    exit;
}

// Handle Product CRUD
if (isset($_POST['add_product'])) {
    if ($product->addProduct(
        $_POST['name'], 
        $_POST['description'], 
        $_POST['price'], 
        $_POST['stock'], 
        $_POST['category_id'], 
        $_POST['supplier_id']
    )) {
        header('Location: ?page=products&success=added');
        exit;
    }
}

if (isset($_POST['update_product'])) {
    if ($product->updateProduct(
        $_POST['id'],
        $_POST['name'], 
        $_POST['description'], 
        $_POST['price'], 
        $_POST['stock'], 
        $_POST['category_id'], 
        $_POST['supplier_id']
    )) {
        header('Location: ?page=products&success=updated');
        exit;
    }
}

if (isset($_GET['page']) && $_GET['page'] == 'products' && isset($_GET['delete'])) {
    if ($product->deleteProduct($_GET['delete'])) {
        header('Location: ?page=products&success=deleted');
    } else {
        header('Location: ?page=products&error=delete_failed');
    }
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Musik - Manajemen Inventaris</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'view/header.php'; ?>
    
    <div class="container">
        <?php
        // Tampilkan pesan sukses atau error jika ada
        if (isset($_GET['success'])) {
            $action = $_GET['success'];
            echo "<div class='success'>Data berhasil $action!</div>";
        }
        
        if (isset($_GET['error'])) {
            $error = $_GET['error'];
            if ($error == 'delete_failed') {
                echo "<div class='error'>Tidak dapat menghapus data karena masih digunakan!</div>";
            } else {
                echo "<div class='error'>Operasi gagal!</div>";
            }
        }
        
        // Handle pages
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            
            if ($page == 'categories') {
                if (isset($_GET['action'])) {
                    if ($_GET['action'] == 'add') {
                        include 'view/category_add_form.php';
                    } 
                    else if ($_GET['action'] == 'edit') {
                        include 'view/category_edit_form.php';
                    }
                } else {
                    include 'view/categories.php';
                }
            }
            elseif ($page == 'suppliers') {
                if (isset($_GET['action'])) {
                    if ($_GET['action'] == 'add') {
                        include 'view/supplier_add_form.php';
                    }
                    else if ($_GET['action'] == 'edit') {
                        include 'view/supplier_edit_form.php';
                    }
                } else {
                    include 'view/suppliers.php';
                }
            }
            elseif ($page == 'products') {
                if (isset($_GET['action'])) {
                    if ($_GET['action'] == 'add') {
                        include 'view/product_add_form.php';
                    }
                    else if ($_GET['action'] == 'edit') {
                        include 'view/product_edit_form.php';
                    }
                } else {
                    include 'view/products.php';
                }
            }
        } else {
            // Halaman beranda
            ?>
            <div class="welcome">
                <h1>Selamat Datang di Sistem Manajemen Toko Musik</h1>
                <p>Aplikasi ini membantu Anda mengelola inventaris toko musik dengan mudah.</p>
                
                <div class="dashboard">
                    <div class="stat-box">
                        <h3>Jumlah Produk</h3>
                        <p class="stat-number"><?= count($product->getAllProducts()) ?></p>
                        <a href="?page=products" class="stat-link">Lihat Detail</a>
                    </div>
                    
                    <div class="stat-box">
                        <h3>Jumlah Kategori</h3>
                        <p class="stat-number"><?= count($category->getAllCategories()) ?></p>
                        <a href="?page=categories" class="stat-link">Lihat Detail</a>
                    </div>
                    
                    <div class="stat-box">
                        <h3>Jumlah Supplier</h3>
                        <p class="stat-number"><?= count($supplier->getAllSuppliers()) ?></p>
                        <a href="?page=suppliers" class="stat-link">Lihat Detail</a>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
    
    <?php include 'view/footer.php'; ?>
</body>
</html>