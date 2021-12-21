
<!--Danh sách menu-->
<a href="{{ url('/sinhvien/thongtin/{id}') }}" class="list-group-item list-group-item-action">
    Thông tin sinh viên
</a>

<a href="{{ route('course_registration', ['id']) }}" class="list-group-item list-group-item-action">
    Đăng ký môn học
</a>

<a href="{{ url('/sinhvien/index/{id}') }}" class="list-group-item list-group-item-action">
    Xem kết quả học tập
</a>
