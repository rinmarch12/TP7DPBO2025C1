CREATE DATABASE db_music_store;
USE db_music_store;

CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT
);

CREATE TABLE suppliers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE,
    phone VARCHAR(20),
    address TEXT
);

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(10,2) NOT NULL,
    stock INT NOT NULL DEFAULT 0,
    category_id INT NOT NULL,
    supplier_id INT NOT NULL,
    FOREIGN KEY (category_id) REFERENCES categories(id),
    FOREIGN KEY (supplier_id) REFERENCES suppliers(id)
);

-- Data awal untuk category
INSERT INTO categories (name, description) VALUES
('Gitar', 'Berbagai jenis gitar akustik dan elektrik'),
('Drum', 'Drum set dan perlengkapan drum'),
('Keyboard', 'Piano, keyboard, dan synthesizer'),
('Aksesoris', 'Aksesoris musik seperti pick, senar, dll');

-- Data awal untuk supplier
INSERT INTO suppliers (name, email, phone, address) VALUES
('Yamaha Music', 'contact@yamahamusic.com', '021-5551234', 'Jl. Musik No. 123, Jakarta'),
('Fender Indonesia', 'sales@fenderid.com', '021-5552345', 'Jl. Melodi No. 45, Bandung'),
('Music World', 'info@musicworld.com', '021-5553456', 'Jl. Harmoni No. 67, Surabaya');

-- Data awal untuk product
INSERT INTO products (name, description, price, stock, category_id, supplier_id) VALUES
('Yamaha F310', 'Gitar akustik untuk pemula dengan kualitas suara yang bagus', 1500000, 15, 1, 1),
('Fender Stratocaster', 'Gitar elektrik dengan tone yang legendaris', 12000000, 5, 1, 2),
('Yamaha PSR-E373', 'Keyboard 61-key dengan banyak fitur', 3200000, 8, 3, 1),
('Pearl Export Series', 'Drum set lengkap untuk pemula dan intermediate', 8500000, 3, 2, 3),
('Ernie Ball Regular Slinky', 'Senar gitar elektrik .010-.046', 120000, 50, 4, 2);