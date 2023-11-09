# Match Game

## Latar Belakang
Game ini merupakan game kasual populer yang biasa dikenal sebagai memory game. Pengembangan game ini terinspirasi dari buku ..., beberapa bertimbangan kami memilih game ini sebagai berikut:
- gameplay lebih umum/mudah dipahami dibanding game lain
- controller sederhana (point and click)
- dapat dikemas untuk kebutuhan iklan (advertgame)

Namun ada beberapa kekurangan yang perlu diperbaiki dari refrensi game dari buku seperti:
- versi JQuery usang
- belum ada mekanik progression (best time, best flip, leaderboard
## Konsep
Elemen | Deskripsi
--- | ---
Goals | Memasangkan 2 kartu yang sama.
Interaction | Klik kartu untuk membaliknya.
Obstacle | Kartu akan ditutup kembali setelah 2 kali kartu dibalik.
Rules | Peringkat pemain diurutkan berdasarkan durasi tercepat.

## Teknologi yang Digunakan
- **HTML** digunakan sebagai kanvas game.
- **CSS** digunakan untuk mendesain visual game.
	- **Bootstrap** digunakan untuk mempercepat pengembangan.
- **Javascript** digunakan untuk memprogram algoritma game.
	- **jQuery** digunakan untuk membantu menyederhanakan kode Javascript.
- **PHP** digunakan untuk mengolah dan mengontrol data antara pemain dan database.
- **MySQL** digunakan untuk menyimpan data hasil permainan pemain.

## Penggunaan
### Instalasi Host Lokal
1. Instal XAMPP 7.4.8 atau yang lebih tinggi
2. Salin folder ini ke `xampp/htdocs/`
3. Mulai Apache & MySQL di  XAMPP Control Panel
4. Buka http://localhost/phpmyadmin/server_sql.php, salin teks query dari [match_game.sql](./match_game.sql) ke kotak query, lalu klik Go
5. Selesai.

### Akses
Game ini bisa dimainkan di:
- http://wbg-smt5.rf.gd/ atau
- http://wewnumam.infinityfreeapp.com/
> Jika terjadi error `ERR_SSL_PROTOCOL_ERROR`, ganti `https://` menjadi `http://` `
## Struktur Tabel
Tidak ada proses autentikasi. Tidak ada hubungan kolom karena kami hanya menggunakan satu kolom.
### Record
\# | name | type | extra
--- | --- | --- | --- 
1 | id | int(11) | PRIMARY KEY, AUTO_INCREMENT 
2 | username | varchar(12) | NOT NULL
3 | time | int(11) | NOT NULL
4 | flip | int(11) | NOT NULL
5 | created_at | bigint(13) | NOT NULL

## API Spec
### Create Record
#### Request:
- Method: POST
- Endpoint: `system/create.php`
- Header:
  - Content Type: application/x-www-form-urlencoded
- Body:
```json
{
    "username": "string",
    "time": "integer",
    "flip": "integer",
    "created_at": "long, unixtime"
}
```
#### Response:
```json
{
  "status": "integer, status code",
  "message": "string"
}
```

## Game Logic
Kode [matchgame.js](./js/matchgame.js) menggunakan jQuery. Berikut adalah penjelasan untuk setiap fungsi dan variabel dalam kode tersebut:

1. `matchingGame`: Ini adalah objek utama yang digunakan untuk menyimpan data permainan.

2. `matchingGame.deck`: Ini adalah array yang berisi daftar kartu yang akan digunakan dalam permainan.

3. `MATCH_PATTERN_COUNT`: Konstanta yang menentukan jumlah pola yang harus dipasangkan dalam permainan.

4. `currentMatchPatternCount`: Variabel yang menyimpan jumlah pola yang sudah dipasangkan saat ini.

5. `flipCount`: Variabel yang menyimpan jumlah kali kartu telah dibalik.

6. `startTime`: Variabel yang menyimpan waktu mulai permainan.

7. `timerInterval`: Variabel yang menyimpan ID interval timer untuk menghitung waktu permainan.

8. `elapsedTime`: Variabel yang menyimpan waktu yang telah berlalu sejak mulai permainan.

9. `$(function () { ... });`: Ini adalah fungsi utama yang dieksekusi ketika halaman HTML selesai dimuat. Fungsi ini menginisialisasi permainan dan mengatur event-handler untuk elemen-elemen di halaman.

10. `shuffle()`: Ini adalah fungsi yang digunakan untuk mengacak urutan kartu dalam deck.

11. `selectCard()`: Ini adalah fungsi yang dipanggil ketika seorang pemain mengklik sebuah kartu. Fungsi ini mengatur perilaku saat kartu dipilih.

12. `checkPattern()`: Ini adalah fungsi yang digunakan untuk memeriksa apakah dua kartu yang dibalik memiliki pola yang sama.

13. `isMatchPattern()`: Ini adalah fungsi yang digunakan untuk memeriksa apakah dua kartu memiliki pola yang sama.

14. `isGameDone()`: Ini adalah fungsi yang memeriksa apakah permainan sudah selesai, yaitu jika semua pola telah dipasangkan.

15. `removeTookCards()`: Ini adalah fungsi yang menghapus kartu-kartu yang telah dipasangkan.

16. `startTimer()`: Ini adalah fungsi yang digunakan untuk memulai perhitungan waktu permainan.

17. `updateTimer()`: Ini adalah fungsi yang digunakan untuk mengupdate dan menampilkan waktu bermain yang telah berlalu.

18. `$('#submitButton').click(function () { ... });`: Ini adalah event-handler yang akan dieksekusi ketika tombol "Submit" diklik. Fungsi ini mengirim data rekaman permainan ke server.

19. `$("#refreshButton").click(function() { ... });`: Ini adalah event-handler yang akan dieksekusi ketika tombol "Refresh" diklik. Fungsi ini digunakan untuk me-refresh ulang halaman.

Seluruh kode tersebut adalah implementasi dari permainan pencocokan kartu yang sederhana dengan beberapa tambahan seperti timer, penghitungan jumlah kali kartu dibalik, dan kemampuan untuk menyimpan rekaman permainan ke server.
