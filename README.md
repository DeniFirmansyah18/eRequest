# eRequest
    Cara menjalankan:
    1. Buka gitbash
    2. git clone https://github.com/DeniFirmansyah18/eRequest.git
    3. cd eRequest
    4. composer remove laravel-notification-channels/telegram
    5. composer require laravel-notification-channels/telegram
    6. npm run dev
    7. buka xampp
    8. buka terminal baru didalam folder eRequest
    9. php artisan migrate
    10. php artisan db:seed
    11. php artisan serve

    Cara mendapatkan id telegram untuk menerima notifikasi:

    1. Buka link berikut untuk mendapatkan chat id user yang digunakan untuk menerima notifikasi

    link untuk get id telegram= https://api.telegram.org/bot7359663539:AAHbVxKdXhdrnad6g4Tygol7jl4p1LMvWHk/getUpdates

<img src="https://github.com/user-attachments/assets/55b89fd0-aa6f-4034-bb4b-9111796b4539" width="512">


    2. buka telegram lalu coba chat bot telegram pada link berikut https://t.me/Permohonan_Aplikasi_Bot

<img src="https://github.com/user-attachments/assets/8b362f2d-75a5-4c81-841c-9bf657e8d7fe" width="512"> 

    3. jika sudah kembali halaman yang digunakan untuk mendapatkan chat id telegram sebelumnya, pastika response telah diperbarui
    dan menampilkan detail chat id    

<img src="https://github.com/user-attachments/assets/0e84e4a8-0aed-4ab8-96d0-43fa52351f1d" width="512">

    4. Masukkan chat id pada file SendTelegramNotification.php yang terletak sesuai dengan struktur folder dibawah ini. dan isi chat id
    sesuai dengan yang ditandai

<img src="https://github.com/user-attachments/assets/4efa61a3-dab4-41a7-ab91-e87ca10d1653" width="812">

    5. Maka konfigurasi notifikasi telegram telah berfungsi, ketika ada pengajuan baru dari OPD akan muncul pada notifikasi telegram sesuai
    dengan chat id yang dimasukkan.

 ![Screenshot_11](https://github.com/user-attachments/assets/a27f8660-c553-45cb-8e9f-440d4f13f408)

 <img src="https://github.com/user-attachments/assets/a27f8660-c553-45cb-8e9f-440d4f13f408" width="512">

 


    

    

    







    
    Login:
        #admin
        admin : admin@gmail.com
        pass  : admin12345
        
        #user
        User : user@gmail.com
        pass : user12345
