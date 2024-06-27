## Tata Cara Penginstallan

1. Buka terminal VSCode dan masukkan perintah-perintah berikut ke dalam terminal:
    ```bash
    git clone https://github.com/valeroy51/KasBonKu.git
    cd KasBonKu
    composer install
    cp .env.example .env
    php artisan key:generate
    composer require kyslik/column-sortable
    php artisan migrate --seed
    php artisan serve
    ```
2. Setelah server berjalan, buka browser dan akses `http://127.0.0.1:8000`.

## Akun Bawaan yang Dapat Digunakan

1. **Akun Admin**
    - Email: valeroy51@gmail.com
    - Password: admin

2. **Akun User "Stefanus Anthony Harry"**
    - Email: valeroy.535220151@stu.untar.ac.id
    - Password: harry

3. **Akun User "Valeroy Putra Sientika"**
    - Email: valeroy52@gmail.com
    - Password: valeroy

4. **Akun User "Hans Nathanael Tedja"**
    - Email: valeroy913@gmail.com
    - Password: hans
