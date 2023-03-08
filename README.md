## Tên đề tài

Website quản lý ký túc xá

## Hướng dẫn cài đặt

- Cài đặt Apache
- Cài đặt MySQL
- Cài đặt PHP
- Cài đặt Composer & Laravel
- Tạo database trong MySQL
- Sau khi cài đặt Laravel, đổi tên .env.example thành .env
- Sửa thông tin kết nối Database trong file .env

DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=Database_name
DB_USERNAME=Database_username
DB_PASSWORD=Database_password

- Chuyển đến thư mục project bằng lệnh command, trong command chạy lệnh composer install
- Chạy lệnh php artisan migrate:refresh  để tạo các bảng trong database
- Chạy lệnh php artisan db:seed  để tạo dữ liệu test
- Nhập php artisan serve để chạy project

## Tài khoản test

Admin: admin@gmail.com   password: 123456789
User: user@gmail.com     password: 123456789

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
