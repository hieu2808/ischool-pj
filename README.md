<h1 align="center">I-school University Score Management</h1>

## Thông tin chung
- Hệ thống quản lý sinh viên này dành trường đại học nên có 3 vai trò: Admin, Giáo Viên, Sinh viên.
- Hệ thống thực hiện các chức năng Xem thông tin người dùng, Quản lý lớp học, Phân lớp giáo viên, Quản lý phương thức đánh giá, Quản lý điểm sinh viên, Đăng ký môn học, Xem kết quả học tập, Đăng nhập.
- Tất cả những thay đổi tác động qua từng chức năng đều ảnh hưởng đến Cơ sở dữ liệu.
- Admin có các chức năng: 
    - Quản lý lớp học
    - Phân lớp giáo viên
    - Đăng nhập
- Giáo viên có các chức năng:
    - Quản lý phương thức đánh giá
    - Quản lý điểm sinh viên
    - Đăng nhập
- Sinh viên có các chức năng:
    - Đăng ký môn học
    - Xem kết quả học tập
    - Đăng nhập

## Thông tin các tài khoản
- Admin: admin@admin | admin123
- Giáo Viên: GV01@mail.org | admin123
- Sinh Viên: SV01@mail.org | admin123

## Cách cài đặt dự án

Đầu tiên, máy các bạn phải cài sẵn apche hoặc nginx, mysql,php , npm(node), git.

Bắt đầu nào.

Bước 1: Mở Terminal và thực hiện clone dự án và vào thư mục dự án bằng câu lệnh sau:

```
git clone https://github.com/hieu2808/ischool-pj.git
cd ischool-pj
```

Bước 2: Chạy composer và npm để cài đặt các gói cần thiết trong dự án

```
composer install
npm install 
```

Bước 3: Tạo database và config database
Vào mysql workbech hoặc phpmyadmin tạo ra database mới

Ví dụ tạo database có tên là: ischool_db

Sau đó ta thực hiện lệnh sau để copy ra file env:
```
cp .env.example .env
```

Cập nhật file env của bạn như sau:
```
DB_CONNECTION=mysql          
DB_HOST=127.0.0.1            
DB_PORT=3306                 
DB_DATABASE=['db_database']     
DB_USERNAME=['db_username']             
DB_PASSWORD=['db_password']  
```

Bước 4: Tạo ra key cho dự án
```
php artisan key:generate
```

Bước 5: Tạo ra các bảng và dữ liệu mẫu cho database
```
php artisan migrate
php artisan data::generate
```
Hoặc bạn import file sql vào database

Bước 7: Xây dựng các styles và scripts
```
npm run <command>
```
Các lệnh(command) khả dụng được liệt kê ở đầu tệp package.json dưới từ khóa 'scripts'.

Bước 8: Chạy Phpunit 

Sau khi dự án của bạn được cài đặt, bạn hãy chạy phpunit. để đảm bảo tất cả các chức năng đang hoạt động chính xác.
Từ gốc của dự án của bạn chạy:
```
phpunit
```
Bước 9: Login vào dự án với các thông tin tài khoản mẫu bên trên hoặc bạn có thể tự tạo tài khoản trong CSDL với 3 bảng ADMIN, SINHVIEN, GIAOVIEN rồi morphOne đến bảng USER.
## Cách sử dụng
//
## Mô tả chi tiết các chức năng
1. Chức năng Đăng nhập
    - Mô tả vắn tắt use case: UseCase này cho phép người dùng đăng nhập tài khoản vào hệ thống.
    - Luồng sự kiện:
        - Luồng cơ bản:
            1. Use case này bắt đầu khi người dùng kích vào nút “Login” trên Menu chính. Hệ thống hiển thị một màn hình Đăng nhập.
            2. Người dùng nhập vào thông tin bao gồm Email, Mật khẩu rồi kích vào nút “Login”. Hệ thống sẽ kiểm tra bảng USER, nếu đúng thì hệ thống sẽ cho phép truy cập vào hệ thống và đưa đến màn hình Trang chủ. UseCase kết thúc.
        - Luồng rẽ nhánh:

            3. Tại bước thứ 2 của luồng cơ bản, khi người dùng nhập tài khoản sai. Hệ thống hiển thị thông báo lỗi, quay lại bước 2.
            4. Tại bất kỳ thời điểm nào trong quá trình thực hiện UseCase nếu không kết nối được với Cơ sở dữ liệu thì hệ thống sẽ hiển thị thông báo lỗi và UseCase kết thúc.
    - Các yêu cầu đặc biệt: Cho phép đăng nhập
    - Tiền điều kiện: Không có
    - Hậu điều kiện: Không có
    - Điểm mở rộng: Không có

2. Chức năng Xem thông tin người dùng
    - Mô tả vắn tắt use case: Use case này cho phép người dùng thông tin cá nhân của bản than.
    - Luồng sự kiện:
        - Luồng cơ bản:
            1. Use case này bắt đầu khi người dùng đăng nhập thành công. Hệ thống sẽ lấy các thông tin của người dùng, gồm: họ tên, id, năm sinh, địa chỉ, số điện thoại,… từ các bảng người dùng và hiển thị lên màn hình.
        - Luồng rẽ nhánh:
        
            2. Tại bước 1 trong luồng cơ bản. Nếu thông tin người dùng không đủ. Hệ thống hiển thị không đủ thông tin.
            3. Tại bất kì thời điểm nào trong quá trình thực hiện nếu use case không kết nối được với cơ sở dữ liệu hệ thống sẽ đưa ra thông báo lỗi và use case kết thúc .
    - Các yêu cầu đặc biệt: Người dung đã có tài khoản.
    - Tiền điều kiện: Yêu cầu đăng nhập tài khoản.
    - Hậu điều kiện: Không có.
    - Điểm mở rộng: Không có.

3. Chức năng Quản lý lớp học
    - Mô tả vắn tắt use case: Use case này cho phép người quản trị mở lớp học cho một học.
    - Luồng sự kiện:
        - Luồng cơ bản:
            1. Use case này bắt đầu khi người quản trị click vào “Quản lý lớp học”. Hệ thống sẽ lấy danh sách các môn học gồm các thông tin: ID môn học, tên ngành, tên khoa, tên môn học, từ các bảng MONHOC, NGANH, KHOA và hiển thị lên màn hình.
            2. Khi chọn vào một môn học bất kỳ. Hệ thống sẽ lấy các thông tin gồm: ID lớp học, tên lớp học, tên chương trình học, số lượng sinh viên, số tín chỉ, ngày bắt đầu, ngày kết thúc, giáo viên giảng dạy từ các bảng LOPHOC, CHUONGTRINHHOC, PHANLOPGV và hiển thị lên màn hình.
            3. Thêm lớp học

                a.	Người quản trị click vào nút “Thêm lớp học”. Hệ thống hiển thị form điền thông tin gồm: tên chương trình học, tên lớp học, số lượng sinh viên, số tín chỉ, ngày bắt đầu, ngày kết thúc.

                b.	Người quản trị nhập thông tin lớp học mới. Chọn nút thêm mới thành công. Hệ thống quay lại trang Danh sách lớp học.
        - Luồng rẽ nhánh:
            1. Tại bước 3b trong luồng cơ bản nếu người quản trị nhập thông tin trong danh mục không hợp lệ. Hệ thống sẽ thông báo lỗi yêu cầu nhập lại. Người quản trị có thể nhập lại để tiếp tục.
            2. Tại bất kì thời điểm nào trong quá trình thực hiện use case nếu không kết nối được với CSDL thì hệ thống sẽ hiện thị thông báo lỗi và use case kết thúc.
    - Các yêu cầu đặc biệt: Chỉ người quản trị mở được lớp.
    - Tiền điều kiện: Người quản trị đăng nhập hệ thống.
    - Hậu điều kiện: Nếu use case kết thúc thành công thì thông tin lớp sẽ được cập nhập trong CSDL.
    - Điểm mở rộng: Giao nhiệm vụ giáo viên.

4. Chức năng Phân lớp giáo viên
    - Mô tả vắn tắt use case: Use case này cho phép người quản trị giao nhiệm vụ giảng dạy từng lớp học cho giáo viên.
    - Luồng sự kiện:
        - Luồng cơ bản:
            1.	Giao nhiệm vụ

                a.	Use case này bắt đầu khi người quản trị click vào “Giao nhiệm vụ”. Hệ thống sẽ hiển thị form điền gồm các thông tin: ID lớp học, tên giáo viên,  ngày phân lớp, từ các bảng LOPHOC, GIAOVIEN, PHANLOPGV và hiển thị lên màn hình.
            2.	Thay đổi nhiệm vụ

                a.	Use case này bắt đầu khi người quản trị click vào “Thay đổi nhiệm vụ”. Hệ thống sẽ hiển thị form thay đổi thông tin gồm: tên lớp học, tên giáo viên từ các bảng LOPHOC, GIAOVIEN và hiển thị lên màn hình.
        - Luồng rẽ nhánh:
            
            3. Tại bước 1a và 2a trong luồng cơ bản nếu người quản trị nhập thông tin trong danh mục không hợp lệ. Hệ thống sẽ thông báo lỗi yêu cầu nhập lại. Người quản trị có thể nhập lại để tiếp tục.
            4.	Tại bất kì thời điểm nào trong quá trình thực hiện use case nếu không kết nối được với CSDL thì hệ thống sẽ hiện thị thông báo lỗi và use case kết thúc.
    - Các yêu cầu đặc biệt: 
        - Chỉ người quản trị mới được giao nhiệm vụ cho giáo viên. 
        - Chỉ khi lớp học được giao nhiệm vụ thì mới thay đổi được.
        - Tiền điều kiện: Người quản trị đăng nhập hệ thống.
    - Hậu điều kiện: Nếu use case kết thúc thành công thì thông tin giao nhiệm vụ sẽ được cập nhập trong CSDL.
    - Điểm mở rộng: Thêm lớp học.

5. Chức năng Quản lý phương thức đánh giá
    - Mô tả vắn tắt use case: UseCase này cho phép giáo viên thêm, xóa phương thức đánh giá.
    - Luồng sự kiện:
        - Luồng cơ bản:
            1.	Thêm phương thức đánh giá

                a.	Use case này bắt đầu khi người dùng kích vào nút “Phương thức đánh giá” màn hình danh sách lớp học. Hệ thống hiển thị form điền thông tin phương thức đánh giá gồm: tên môn học, tên lớp học, tên điểm, trọng số từ các bảng MONHOC, LOPHOC, PHUONGTHUCDANHGIA và hiển thị lên màn hình.
                
                b.	Người dùng nhập vào thông tin bao gồm: “tên điểm, trọng số” rồi kích vào nút “Thêm mới”. Hệ thống lưu thông tin lại vào CSDL. 
            2.	Xóa phương thứ đánh giá

                a.	Người dung chọn “Xóa” trên dòng phương thức đánh giá bất kỳ. Hệ thống cập nhật lại CSDL. Usecase kết thúc.
        - Luồng rẽ nhánh:
            
            3.	Tại bước thứ 1b của luồng cơ bản, khi người dùng nhập tài khoản sai. Hệ thống hiển thị thông báo lỗi, quay lại bước 1b.
            4.	Tại bất kỳ thời điểm nào trong quá trình thực hiện UseCase nếu không kết nối được với Cơ sở dữ liệu thì hệ thống sẽ hiển thị thông báo lỗi và UseCase kết thúc.
    - Các yêu cầu đặc biệt: Giáo viên đã được người quản trị giao nhiệm vụ cho lớp học đó.
    - Tiền điều kiện: Người dùng đăng nhập với vai trò giáo viên.
    - Hậu điều kiện: Nếu usecase kết thúc thành công. Hệ thống lưu lại các thông tin trên CSDL.
    - Điểm mở rộng: Thêm điểm sinh viên.

6. Chức năng Quản lý điểm sinh viên
    - Mô tả vắn tắt use case: UseCase này cho phép giáo viên thêm, sửa, xóa điểm môn học cho sinh viên.
    - Luồng sự kiện:
        - Luồng cơ bản:
            1.	Use case này bắt đầu khi giáo viên chọn vào một lớp học bất kỳ. Hệ thống sẽ lấy các thông tin gồm: tên lớp học, tên sinh viên, tên, điểm môn học, các phương thức đánh giá từ các bảng LOPHOC, SVDANGKY, PHUONGTHUCDG, DIEMMH và hiển thị lên màn hình.
            2.	Giáo viên chọn nút “Cập nhật”. Hệ thống hiển thị form điền điểm cho sinh viên.
            3.	Thêm điểm

                a.	Giáo viên nhập điểm cho sinh viên rồi chọn nút “Cập nhật điểm”. Hệ thống lưu thông tin lại vào CSDL
            4.	Sửa điểm

                a.	Giáo viên nhập điểm cho sinh viên rồi chọn nút “Cập nhật điểm”. Hệ thống lưu thông tin lại vào CSDL
            5.	Xóa điểm

                a.	Giáo viên nhập điểm cho sinh viên rồi chọn nút “Cập nhật điểm”. Hệ thống lưu thông tin lại vào CSDL
        - Luồng rẽ nhánh:
            
            6.	Tại bước thứ 3a, 4a, 5a của luồng cơ bản, khi người dùng nhập điểm sai. Hệ thống hiển thị thông báo lỗi, quay lại bước 2.
            7.	Tại bất kỳ thời điểm nào trong quá trình thực hiện UseCase nếu không kết nối được với Cơ sở dữ liệu thì hệ thống sẽ hiển thị thông báo lỗi và UseCase kết thúc.
    - Các yêu cầu đặc biệt: 
        - Giáo viên đã được người quản trị giao nhiệm vụ cho lớp học đó.
        - Giáo viên đã thêm phương thức đánh giá.
        - Sinh viên phải là sinh viên đã đăng ký lớp học.
    - Tiền điều kiện: Người dùng đăng nhập với vai trò giáo viên.
    - Hậu điều kiện: Nếu usecase kết thúc thành công. Hệ thống lưu lại các thông tin trên CSDL.
    - Điểm mở rộng: Không có.

7. Chức năng Đăng Đăng ký môn học
    - Mô tả vắn tắt use case: UseCase này cho phép sinh viên đăng ký lớp học.
    - Luồng sự kiện:
        - Luồng cơ bản:
            1.	Usecase này bắt đầu khi sinh viên chọn “Đăng ký môn học” trên thanh menu hệ thống. Hệ thống lấy thống tin danh sách lớp học đăng ký, danh sách lớp học đã đăng ký gồm các thông tin: id lớp học, tên lớp học, tên môn học, tên ngành học, khoa, số lượng sinh viên, số tín chỉ ngày bắt đầu, ngày kết thúc, tên chương trình học, ngày đăng ký. Từ các bảng SVDANGKY, MONHOC, LOPHOC, KHOA, NGANH,… và hiển thị lên màn hình.
            2.	Sinh viên chọn nút “đăng ký”. Hệ thống lưu lại CSDL và usecase kết thúc.
        - Luồng rẽ nhánh:
            
            3.	Tại bước thứ 1 của luồng cơ bản, khi quá thời gian đăng ký. Hệ thống không cho sinh viên đăng ký nữa.
            4.	Tại bước 1 của luồng cơ bản, khi lớp học đầy. Hệ thống không cho sinh viên đăng ký nữa.
            5.	Tại bất kỳ thời điểm nào trong quá trình thực hiện UseCase nếu không kết nối được với Cơ sở dữ liệu thì hệ thống sẽ hiển thị thông báo lỗi và UseCase kết thúc.
    - Các yêu cầu đặc biệt: 
        - Người quản trị đã mở lớp học trước 1 thời gian cho sinh viên đăng ký.
        - Sinh viên đã học những môn học bắt đầu thì mới được đăng ký tiếp.
    - Tiền điều kiện: Người dùng đăng nhập với vai trò sinh viên.
    - Hậu điều kiện: Nếu usecase kết thúc thành công. Hệ thống lưu lại các thông tin trên CSDL.
    - Điểm mở rộng: Không có.

1. Chức năng Xem kết quả học tập
    - Mô tả vắn tắt use case: UseCase này cho phép sinh viên xem kết quả học tập.
    - Luồng sự kiện:
        - Luồng cơ bản:
            1.	Usecase này bắt đầu khi sinh viên chọn “Xem kết quả học tập” trên thanh menu hệ thống. Hệ thống lấy thống tin danh sách môn học sinh viên đã đăng ký gồm các thông tin: tên môn học, tên phương thức đánh giá, điểm môn học từ các bảng MONHOC, PHUONGTHUCDG, DIEMMH và hiển thị lên màn hình.
        - Luồng rẽ nhánh:
            
            2.	Tại bất kỳ thời điểm nào trong quá trình thực hiện UseCase nếu không kết nối được với Cơ sở dữ liệu thì hệ thống sẽ hiển thị thông báo lỗi và UseCase kết thúc.
    - Các yêu cầu đặc biệt: 
        - Sinh viên đã đăng ký lớp học thành công.
        - Giáo viên đã được phân công giảng dạy lớp học sinh đăng ký.
        - Giáo viên đã thêm các phương thức đánh giá.
        - Giáo viên đã thêm điểm.
    - Tiền điều kiện: Người dùng đăng nhập với vai trò sinh viên.
    - Hậu điều kiện: Không có.
    - Điểm mở rộng: Không có.

   
