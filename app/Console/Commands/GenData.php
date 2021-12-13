<?php

namespace App\Console\Commands;

use App\Models\ChuongTrinhHoc;
use App\Models\GiaoVien;
use App\Models\HocKy;
use App\Models\Khoa;
use App\Models\KhoaHoc;
use App\Models\Lop;
use App\Models\LopHoc;
use App\Models\MonHoc;
use App\Models\Nganh;
use App\Models\SinhVien;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class GenData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->genHocKy();
        $this->genKhoaHoc();
        $this->genLop();
        $this->genKhoa();
               
        $this->genNganhHoc(); 
        $this->genChuongTrinhHoc();
        $this->genMonHoc();
        $this->genLopHoc();

        $this->genSinhVien();
        $this->genGiaoVien();
    }

    private $hockyData  = [
        [
            "ten_hoc_ky" => "Học Kỳ 1",
            "nam_hoc" => "2019-2020",
        ],
        [
            "ten_hoc_ky" => "Học Kỳ 2",
            "nam_hoc" => "2019-2020",
        ],
        [
            "ten_hoc_ky" => "Học Kỳ 1",
            "nam_hoc" => "2020-2021",
        ],
        [
            "ten_hoc_ky" => "Học Kỳ 2",
            "nam_hoc" => "2020-2021",
        ]
    ];

    public function genHocKy() {
        foreach($this->hockyData as $hocky){
            $hk = new HocKy();
            $hk->ten_hoc_ky = $hocky["ten_hoc_ky"];
            $hk->nam_hoc = $hocky["nam_hoc"];
            $hk->save();
        }
    }

    private $khoaHocdata= [
            [
                "id"=>1,
                "ten_hoc_ky" => "Học Kỳ 1",
                "nam_hoc" => "2019-2020",
            ],
            [
                "id"=>2,
                "ten_hoc_ky" => "Học Kỳ 2",
                "nam_hoc" => "2019-2020",
            ],
            [
                "id"=>3,
                "ten_hoc_ky" => "Học Kỳ 1",
                "nam_hoc" => "2020-2021",
            ],
            [
                "id"=>4,
                "ten_hoc_ky" => "Học Kỳ 2",
                "nam_hoc" => "2020-2021",
            ]
        ];
    public function genKhoaHoc() {        
        foreach($this->khoaHocdata as $hocky){
            $kh = new KhoaHoc();
            $kh->id = $hocky["id"];
            $kh->ma_khoa_hoc = "KH".$hocky["nam_hoc"];
            $kh->ten_khoa_hoc = $hocky["ten_hoc_ky"]." nam hoc ".$hocky["nam_hoc"];
            $kh->save();
        }
    }

    private $nganhHocData = [
        [
            "id" => 1,
            "ten_nganh" => "Công nghệ thông tin",
            "khoa" => "1",
        ],
        [
            "id" => 2,
            "ten_nganh" => "An toàn thông tin",
            "khoa" => "1",
        ],
        [
            "id" => 3,
            "ten_nganh" => "Điện tử ",
            "khoa" => "2",
        ],
        [
            "id" => 4,
            "ten_nganh" => "Điện tử",
            "khoa" => "2",
        ],
        [
            "id" => 5,
            "ten_nganh" => "Quản trị kinh doanh",
            "khoa" => "3",
        ],
        [
            "id" => 6,
            "ten_nganh" => "Kế toán tài chính",
            "khoa" => "3",
        ],
        [
            "id" => 7,
            "ten_nganh" => "Công nghệ đa phương tiện",
            "khoa" => "1",
        ],
        [
            "id" => 8,
            "ten_nganh" => "Marketing",
            "khoa" => "3",
        ],
        [
            "id" => 9,
            "ten_nganh" => "Truyền thông đa phương tiện",
            "khoa" => "1",
        ],
        [
            "id" => 10,
            "ten_nganh" => "Thương mại điện tử",
            "khoa" => "1",
        ],
        [
            "id" => 11,
            "ten_nganh" => "Công nghệ Internet vạn vật",
            "khoa" => "1",
        ],
    ];
    public function genNganhHoc(){        
        foreach($this->nganhHocData as $nganh){
            $kh = new Nganh();
            $kh->id = $nganh["id"];
            $kh->ten_nganh = $nganh["ten_nganh"];
            $kh->khoa_id = $nganh["khoa"];
            $kh->save();
        }
    }

    private $chuongTrinhHocdata = [
        [
            "id" => 1,
            "hoc_ky_id" => 1,
            "ten_chuong_trinh_hoc" => "Chương trình học học kỳ 1 năm 2019-2020",
        ],
        [
            "id" => 2,
            "hoc_ky_id" => 2,
            "ten_chuong_trinh_hoc" => "Chương trình học học kỳ 2 năm 2019-2020",
        ],
        [
            "id" => 3,
            "hoc_ky_id" => 3,
            "ten_chuong_trinh_hoc" => "Chương trình học học kỳ 1 năm 2020-2021",
        ],
        [
            "id" => 4,
            "hoc_ky_id" => 4,
            "ten_chuong_trinh_hoc" => "Chương trình học học kỳ 2 năm 2020-2021",
        ],
    ];
    public function genChuongTrinhHoc(){
        foreach($this->chuongTrinhHocdata as $ct){
            $c = new ChuongTrinhHoc();
            $c->id= $ct["id"];
            $c->hoc_ky_id = $ct["hoc_ky_id"];
            $c->ten_chuong_trinh_hoc = $ct["ten_chuong_trinh_hoc"];
            $c->ghi_chu =  "no";
            $c->save();
        }
    }

    private $khoadata = [
        [
            "ten_khoa" => "Công nghệ thông tin",
            "id" => 1,
        ],
        [
            "ten_khoa" => "Điện tử",
            "id" => 2,
        ],
        [
            "ten_khoa" => "Kinh tế",
            "id" => 3,
        ],
    ];
    public function genKhoa(){        
        foreach($this->khoadata as $khoa){
            $k = new Khoa();
            $k->id = $khoa["id"];
            $k->ten_khoa=$khoa["ten_khoa"];
            $k->save();
        }
    }

    private function getMonHocData() {
        $file_n = Storage::disk('local')->path("seed_data\monhoc.csv");
        echo $file_n;

        $file = fopen($file_n, "r");
        $all_data = [];
        while (($data = fgetcsv($file, 200, ",")) !== FALSE) {
            $all_data[$data[0]] = [
                "id" => $data[0],
                "ten" => $data[1],
                "nganh_id" => "1",
                "so_tin_chi" => $data[3],
            ];
        }
        fclose($file);
        return $all_data;
    }
    public function genMonHoc(){
        foreach ($this->getMonHocData() as $monhoc){           
            $monhoc = new MonHoc();
            $monhoc->id = $monhoc["id"];
            $monhoc->nganh_id = 1;
            $monhoc->ten_mon_hoc = $monhoc["ten"];
            $monhoc->save();
        }
    }


    public function genLop() {
        $lop = new Lop();
        $lop->id = 1;
        $lop->ten_lop =  "Test lop";
        $lop->khoa_hoc_id = 1;
        $lop->save();
    }

    public function genLopHoc() {
        $monhocs = $this->getMonHocData();
        for ($i = 1; $i < 1000; $i++){
            $chuong_trinh_hoc_id = 1;
            $monhoc_id = rand(1, 63);
            
            $lophoc = new LopHoc();
            $lophoc["id"] = $i;
            $lophoc["mon_hoc_id"] = $monhoc_id;
            $lophoc["chuong_trinh_hoc_id"] = $chuong_trinh_hoc_id;
            $lophoc["ten_lop_hoc"] = $monhocs[$monhoc_id]["ten"]."-".$i;
            $lophoc["so_luong_sv"] = 30;
            $lophoc["so_tin_chi"] = $monhocs[$monhoc_id]["so_tin_chi"];
            $lophoc["ngay_bat_dau"] = "2019-09-01";
            $lophoc["ngay_ket_thuc"] = "2019-12-21";
            $lophoc->save();
        }

        for ($i = 1000; $i < 2000; $i++){
            $chuong_trinh_hoc_id = 1;
            $monhoc_id = rand(1, 63);
            
            $lophoc = new LopHoc();
            $lophoc["id"] = $i;
            $lophoc["mon_hoc_id"] = $monhoc_id;
            $lophoc["chuong_trinh_hoc_id"] = $chuong_trinh_hoc_id;
            $lophoc["ten_lop_hoc"] = $monhocs[$monhoc_id]["ten"]."-".$i;
            $lophoc["so_luong_sv"] = 30;
            $lophoc["so_tin_chi"] = $monhocs[$monhoc_id]["so_tin_chi"];
            $lophoc["ngay_bat_dau"] = "2020-01-02";
            $lophoc["ngay_ket_thuc"] = "2020-05-21";
            $lophoc->save();
        }


        for ($i = 2000; $i < 3000; $i++){
            $chuong_trinh_hoc_id = 1;
            $monhoc_id = rand(1, 63);
            
            $lophoc = new LopHoc();
            $lophoc["id"] = $i;
            $lophoc["mon_hoc_id"] = $monhoc_id;
            $lophoc["chuong_trinh_hoc_id"] = $chuong_trinh_hoc_id;
            $lophoc["ten_lop_hoc"] = $monhocs[$monhoc_id]["ten"]."-".$i;
            $lophoc["so_luong_sv"] = 30;
            $lophoc["so_tin_chi"] = $monhocs[$monhoc_id]["so_tin_chi"];
            $lophoc["ngay_bat_dau"] = "2020-09-01";
            $lophoc["ngay_ket_thuc"] = "2020-12-21";
            $lophoc->save();
        }

        for ($i = 3000; $i < 4000; $i++){
            $chuong_trinh_hoc_id = 1;
            $monhoc_id = rand(1, 63);
            
            $lophoc = new LopHoc();
            $lophoc["id"] = $i;
            $lophoc["mon_hoc_id"] = $monhoc_id;
            $lophoc["chuong_trinh_hoc_id"] = $chuong_trinh_hoc_id;
            $lophoc["ten_lop_hoc"] = $monhocs[$monhoc_id]["ten"]."-".$i;
            $lophoc["so_luong_sv"] = 30;
            $lophoc["so_tin_chi"] = $monhocs[$monhoc_id]["so_tin_chi"];
            $lophoc["ngay_bat_dau"] = "2021-01-02";
            $lophoc["ngay_ket_thuc"] = "2021-05-21";
            $lophoc->save();
        }
    }
    

    public function getHo() {
        $file_n = Storage::disk('local')->path("seed_data\people.csv");
        echo $file_n;

        $file = fopen($file_n, "r");
        $all_data = [];
        while (($data = fgetcsv($file, 200, ",")) !== FALSE) {
            if ($data[0] != ""){
                $all_data[] = $data[0];
            }
        }
        fclose($file);
        return $all_data;
    }

    public function getTen() {
        $file_n = Storage::disk('local')->path("seed_data\people.csv");
        echo $file_n;

        $file = fopen($file_n, "r");
        $all_data = [];
        while (($data = fgetcsv($file, 200, ",")) !== FALSE) {
            $all_data[] = $data[2];
        }
        fclose($file);
        return $all_data;
    }

    public function genSinhVien() {
        $ho = $this->getHo();
        $ten = $this->getTen();

        for($i = 1; $i < 1800; $i++){
            $user = new User();
            $user->name = "SV0".$i;
            $user->email = "SV0".$i."@mail.org";
            $user->password = "P@ssw0rd";
            $user->save();
            
            $sv = new SinhVien();
            $svHo = $ho[rand(1, count($ho)) - 1];
            $svTen = $ten[rand(1, count($ten)) -1];
            $sv->ten_ho = $svHo;
            $sv->ten_dem = "";
            $sv->ten = $svTen;
            $sv->lop_id = 1;
            $sv->dia_chi = "no_data";
            $sv->tel = "0123456789";
            $sv->save();
            $sv->user()->save($user);
        }
    }


    public function genGiaoVien() {
        $ho = $this->getHo();
        $ten = $this->getTen();

        for($i = 1; $i < 180; $i++){
            $user = new User();
            $user->name = "GV0".$i;
            $user->email = "GV0".$i."@mail.org";
            $user->password = "P@ssw0rd";
            $user->save();
            
            $gv = new GiaoVien();
            $gvHo = $ho[rand(1, count($ho)) - 1];
            $gvTen = $ten[rand(1, count($ten)) -1];
            $gv->ten_ho = $gvHo;
            $gv->ten_dem = "";
            $gv->khoa_id = rand(1, 3);
            $gv->ten = $gvTen;
            $gv->dia_chi = "no_data";
            $gv->tel = "987654321";
            $gv->save();
            $gv->user()->save($user);
        }
    }
}