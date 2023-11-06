# Match Game

## Localhost Installation
1. Install XAMPP 7.4.8 or higher
2. Copy this folder to `YOURINSTALLLOCATION/xampp/htdocs/`
3. Start Apache & MySQL in XAMPP Control Panel
4. Open http://localhost/phpmyadmin/server_sql.php, copy query text from [match_game.sql](./match_game.sql) to query box, then click Go
5. Done.
`
## Table Structure
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
