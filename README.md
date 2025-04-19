Janji
---
Saya Ririn Marchelina dengan NIM 2303662 mengerjakan Tugas Praktikum 2 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

---
Diagram
---
![Desain](https://github.com/user-attachments/assets/99866479-1ab1-43b8-bc26-4258d2f42990)

---
Alur Program
---
1. Inisialisasi Data:
- Program dimulai di file index.php yang memuat semua class model (Category, Product, Supplier)
- Membuat objek dari ketiga class tersebut untuk mengelola data kategori, produk, dan supplier
2. Menampilkan Halaman:
- Berdasarkan parameter URL (?page=xxx), program menentukan halaman yang akan ditampilkan
- Jika tidak ada parameter, menampilkan halaman beranda dengan statistik jumlah produk, kategori, dan supplier
- Jika parameter adalah "categories", "products", atau "suppliers", menampilkan halaman daftar masing-masing
3. Operasi Tambah Data:
- User mengklik tombol "Tambah [Kategori/Produk/Supplier] Baru"
- Sistem menampilkan form kosong berdasarkan parameter URL (?page=xxx&action=add)
- User mengisi form dan submit
- Sistem menyimpan data baru dan kembali ke halaman daftar
4. Operasi Edit Data:
- User mengklik tombol "Edit" pada baris data tertentu
- Sistem menampilkan form yang sudah terisi data berdasarkan parameter (?page=xxx&action=edit&id=123)
- User mengubah data dan submit
- Sistem menyimpan perubahan dan kembali ke halaman daftar
5. Operasi Hapus Data:
- User mengklik tombol "Hapus" pada baris data tertentu
- Sistem menampilkan konfirmasi
- Jika user mengkonfirmasi, sistem menghapus data dan kembali ke halaman daftar
- Jika data masih digunakan (misal kategori yang masih memiliki produk), sistem menampilkan pesan error
