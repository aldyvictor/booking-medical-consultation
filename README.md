Web App Booking Medical Consultation on Development

Tahap Install :

1. Clone repository ini ke local komputer
2. Buat database baru dan import file database booking-cunsultation.sql ke dalam database baru
3. Rubah file .env.example menjadi .env, lalu setting DB_DATABASE sesuai nama database yang baru di buat, untuk DB_USERNAME DAN DB_PASSWORD bisa di sesuaikan dengan username dan password database anda
4. Jalankan php artisan migrate
5. Jalankan php artisan db:seed
6. Seteah itu Jalankan php artisan serve
7. Buka link 127.0.0.1:8000 di browser

Akses Admin : 
Email : admin123@gmail.com
Password : admin123

Asumsi :
Saya berasumsi bahwasannya user/Customer yang sudah membuat janji temu tidak bisa di batalkan.
