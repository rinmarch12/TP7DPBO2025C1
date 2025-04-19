Janji
---
Saya Ririn Marchelina dengan NIM 2303662 mengerjakan Tugas Praktikum 7 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

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
- Berdasarkan parameter URL, program menentukan halaman yang akan ditampilkan
- Jika tidak ada parameter, menampilkan halaman beranda dengan statistik jumlah produk, kategori, dan supplier
- Jika parameter adalah "categories", "products", atau "suppliers", menampilkan halaman daftar masing-masing
3. Operasi Tambah Data:
- User mengklik tombol "Tambah [Kategori/Produk/Supplier] Baru"
- Sistem menampilkan form kosong
- User mengisi form dan submit
- Sistem menyimpan data baru dan kembali ke halaman daftar
4. Operasi Edit Data:
- User mengklik tombol "Edit" pada baris data tertentu
- Sistem menampilkan form yang sudah terisi dengan data sebelumnya
- User mengubah data dan submit
- Sistem menyimpan perubahan dan kembali ke halaman daftar
5. Operasi Hapus Data:
- User mengklik tombol "Hapus" pada baris data tertentu
- Sistem menampilkan konfirmasi
- Jika user mengkonfirmasi, sistem menghapus data dan kembali ke halaman daftar
- Jika data masih digunakan (misal kategori yang masih memiliki produk), sistem menampilkan pesan error
6. Operasi Filter dan Pencarian:
- User dapat mencari data spesifik dengan memasukkan kata kunci berupa nama di form pencarian
- Pada halaman produk, user dapat memfilter produk berdasarkan kategori menggunakan dropdown
- Hasil pencarian atau filter ditampilkan dalam bentuk tabel
- User dapat menghapus filter untuk kembali melihat semua data

---
Dokumentasi
---
1. Beranda
---
![image](https://github.com/user-attachments/assets/34621192-e4cd-40a9-bb70-09b77173bd5b)
---
2. Produk
---
![image](https://github.com/user-attachments/assets/e0364254-609e-4b9d-bb95-3d8586325dc1)
---
4. Kategori
---
![image](https://github.com/user-attachments/assets/ee4a261f-934f-488a-814b-2a6c65905008)
---
6. Supplier
---
![image](https://github.com/user-attachments/assets/60f85416-671f-4dac-bd29-03c9a32305a3)


