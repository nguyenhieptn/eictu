<?php

use Illuminate\Database\Seeder;

use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
<<<<<<< HEAD
        DB::table('schools')
		->insert(['code' =>'ICTU', 'name' => 'CNTT TT TN','user_id'=>'1']);
=======
        // $this->call(seedUserTable::class);
        // $this->call(NganhHocTableSeeder::class);
        // $this->call(LopHocTableSeeder::class);
        // $this->call(SinhVienTableSeeder::class);
        // $this->call(seedUserTable::class);
        // $this->call(seedSchoolTable::class);
        // $this->call(MajorTableSeeder::class);
        // $this->call(ClassTableSeeder::class);
        // $this->call(StudentTableSeeder::class);
        // $this->call(MotelTableSeeder::class);
        // $this->call(TeacherTableSeeder::class);
>>>>>>> 7709b3511774adaf4e6fdf2a9bd9dc6b8d7a7790

		DB::table('majors')->insert(['code' =>'CNTT', 'name' => 'Công nghệ thông tin']);
		DB::table('majors')->insert(['code' =>'HTTTKT', 'name' => 'HTTT Kinh tế']);
		DB::table('majors')->insert(['code' =>'ĐKTĐ', 'name' => 'Điều khiển tự động']);
		DB::table('majors')->insert(['code' =>'CNOT', 'name' => 'Công nghệ ô tô']);

<<<<<<< HEAD
		DB::table('classes')->insert(['name' =>'CNTT K11A', 'major_id' => '1']);
		DB::table('classes')->insert(['name' =>'CNTT K11B', 'major_id' => '1']);
		DB::table('classes')->insert(['name' =>'CNTT K11C', 'major_id' => '1']);
		DB::table('classes')->insert(['name' =>'HTTTKT K11', 'major_id' => '2']);
		DB::table('classes')->insert(['name' =>'HTTTKT K12', 'major_id' => '2']);
		DB::table('classes')->insert(['name' =>'CNOT K12', 'major_id' => '4']);
		
		//sinh vien da colop
		for($i=0;$i<250;$i++)
		{
			//Generate a random year using mt_rand.
			$year= mt_rand(1000, date("Y"));
			 
			//Generate a random month.
			$month= mt_rand(1, 12);
			 
			//Generate a random day.
			$day= mt_rand(1, 28);
			 
			//Using the Y-M-D format.
			$randomDate = $year . "-" . $month . "-" . $day;
			 
			//Echo.
			 
			 DB::table('students')->insert([
			 'code' => str_random(10),
			'name' => str_random(6).' '+str_random(4).' '.str_random(7),
			'gender' => rand(0, 1),		
			'birthday' =>$randomDate,
			'major_id' => rand(1, 4),
			'school_id' => 1,
			 'class_id' => rand(1, 6),
			]);
		}
		for($i=0;$i<250;$i++)
		{
			//Generate a random year using mt_rand.
			$year= mt_rand(1000, date("Y"));
			 
			//Generate a random month.
			$month= mt_rand(1, 12);
			 
			//Generate a random day.
			$day= mt_rand(1, 28);
			 
			//Using the Y-M-D format.
			$randomDate = $year . "-" . $month . "-" . $day;
			 
			//Echo.
			 
			 DB::table('students')->insert([
			 'code' => str_random(10),
			'name' => str_random(6).' '+str_random(4).' '.str_random(7),
			'gender' => rand(0, 1),		
			'birthday' =>$randomDate,
			'major_id' => rand(1, 4),
			'school_id' => 1,
			 'class_id' => null,
			]);
		}
=======
        // $this->call(LopHocTableSeeder::class);

        // $this->call(SinhVienTableSeeder::class);
        // $this->call(seederFindJobTable::class);
<<<<<<< HEAD
    //     DB::table('schools')->insert(['code' =>'ICTU', 'name' => 'CNTT TT TN','user_id'=>'1']);
    //     DB::table('majors')->insert(['code' =>'CNTT', 'name' => 'Công nghệ thông tin']);
    //     DB::table('majors')->insert(['code' =>'HTTTKT', 'name' => 'HTTT Kinh tế']);

    //     DB::table('classes')->insert(['name' =>'CNTT K11A', 'major_id' => '1']);
    //     DB::table('classes')->insert(['name' =>'CNTT K11B', 'major_id' => '1']);
    //     DB::table('classes')->insert(['name' =>'CNTT K11C', 'major_id' => '1']);
        
    //     DB::table('students')->insert(['code' =>'DTC125D4802010062', 'name' => 'Bùi Ngọc Hoàng Anh','gender' => '0','birthday' => '1994/12/20','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010001', 'name' => 'Hoàng Ngọc Anh','gender' => '0','birthday' => '1994/11/11','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4801030002', 'name' => 'Lê Ngô Việt Anh','gender' => '0','birthday' => '1994/11/14','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC14ND4802010007', 'name' => 'Lưu Việt Anh','gender' => '0','birthday' => '1993/11/29','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010065', 'name' => 'Hoàng Quốc Bảo','gender' => '0','birthday' => '1994/09/30','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010004', 'name' => 'Nguyễn Ngọc Chiến','gender' => '0','birthday' => '1993/09/15','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010068', 'name' => 'Nguyễn Thị Chinh','gender' => '0','birthday' => '1994/10/03','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010005', 'name' => 'Hoàng Thị Cúc','gender' => '0','birthday' => '1994/08/25','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4801030007', 'name' => 'Cao Tiến Cường','gender' => '0','birthday' => '1991/03/06','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010300', 'name' => 'Nguyễn Văn Cường','gender' => '0','birthday' => '1994/10/02','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010070', 'name' => 'Lê Thị Dịu','gender' => '0','birthday' => '1994/08/15','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010006', 'name' => 'Nguyễn Thị Dung','gender' => '0','birthday' => '1994/06/12','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010071', 'name' => 'Dương Văn Dũng','gender' => '0','birthday' => '1994/08/09','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010007', 'name' => 'Lê Trung Dũng','gender' => '0','birthday' => '1993/02/02','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4801030070', 'name' => 'Nguyễn Mạnh Dũng','gender' => '0','birthday' => '1994/06/23','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4801030062', 'name' => 'Đặng Thái Duy','gender' => '0','birthday' => '1993/05/24','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4801040002', 'name' => 'Nguyễn Đức Đại','gender' => '0','birthday' => '1993/03/14','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010076', 'name' => 'Nguyễn Trung Đức','gender' => '0','birthday' => '1994/03/02','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4801030012', 'name' => 'Hoàng Văn Đức','gender' => '0','birthday' => '1994/09/14','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4801030013', 'name' => 'Ma Quang Đức','gender' => '0','birthday' => '1992/07/25','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010075', 'name' => 'Nguyễn Lập Đức','gender' => '0','birthday' => '1994/01/01','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010010', 'name' => 'Nguyễn Thị Hà Giang','gender' => '0','birthday' => '1993/09/11','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4801030014', 'name' => 'Phạm Sỹ Giang','gender' => '0','birthday' => '1994/10/26','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D3404050020', 'name' => 'Phạm Trường Giang','gender' => '0','birthday' => '1994/01/20','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010077', 'name' => 'Bùi Văn Giáp','gender' => '0','birthday' => '1984/04/15','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010078', 'name' => 'Vũ Ngọc Hà','gender' => '0','birthday' => '1994/10/03','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4801030015', 'name' => 'Ngô Văn Hải','gender' => '0','birthday' => '1992/09/22','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4801040004', 'name' => 'Nguyễn Ngọc Hải','gender' => '0','birthday' => '1994/03/23','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4801010003', 'name' => 'Phạm Đình Hải','gender' => '0','birthday' => '1993/10/08','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010183', 'name' => 'Vũ Tiến Hải','gender' => '0','birthday' => '1994/03/01','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4801030017', 'name' => 'Nguyễn Minh Hạnh','gender' => '0','birthday' => '1994/03/08','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010012', 'name' => 'Nguyễn Thị Hảo','gender' => '0','birthday' => '1993/06/06','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010079', 'name' => 'Phan Thu Hằng','gender' => '0','birthday' => '1994/08/17','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010081', 'name' => 'Trần Thị Thanh Hiền','gender' => '0','birthday' => '1994/04/28','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010181', 'name' => 'Nguyễn Trung Hiếu','gender' => '0','birthday' => '1994/04/11','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4801030018', 'name' => 'Tạ Văn Hiêú','gender' => '0','birthday' => '1994/06/28','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4801030065', 'name' => 'Lê Trung Hiếu','gender' => '0','birthday' => '1993/12/06','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010013', 'name' => 'Ma Trung Hiếu','gender' => '0','birthday' => '1988/01/02','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010082', 'name' => 'Nông Xuân Hinh','gender' => '0','birthday' => '1994/09/12','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC14ND4802010151', 'name' => 'Nguyễn Thị Hoa','gender' => '0','birthday' => '1993/03/08','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010014', 'name' => 'Phạm Thị Hoa','gender' => '0','birthday' => '1994/08/04','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4801030020', 'name' => 'Nguyễn Huy Hoàng','gender' => '0','birthday' => '1993/07/04','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010168', 'name' => 'Tống Thị Huệ','gender' => '0','birthday' => '1994/04/20','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010084', 'name' => 'Nguyễn Lương Hùng','gender' => '0','birthday' => '1993/07/05','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010017', 'name' => 'Nguyễn Thế Hùng','gender' => '0','birthday' => '1994/04/06','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010018', 'name' => 'Trần Văn Hùng','gender' => '0','birthday' => '1994/09/21','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010019', 'name' => 'Vũ Thế Hùng','gender' => '0','birthday' => '1994/06/14','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4801030083', 'name' => 'Nguyễn Văn Huy','gender' => '0','birthday' => '1994/09/20','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010088', 'name' => 'Trần Quang Huy','gender' => '0','birthday' => '1994/05/22','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4801030250', 'name' => 'Nguyễn Thanh Huyền','gender' => '0','birthday' => '1994/09/16','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D5103022111', 'name' => 'Nguyễn Thị Thanh Huyền','gender' => '0','birthday' => '1994/06/03','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010089', 'name' => 'Ngô Văn Huynh','gender' => '0','birthday' => '1993/02/28','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010085', 'name' => 'Hà Quang Hưng','gender' => '0','birthday' => '1994/09/28','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010020', 'name' => 'Đặng Thị Hương','gender' => '0','birthday' => '1993/05/01','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010023', 'name' => 'Đỗ Văn Khang','gender' => '0','birthday' => '1993/03/10','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010024', 'name' => 'Nguyễn Hữu Khang','gender' => '0','birthday' => '1994/01/14','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010025', 'name' => 'Nguyễn Duy Khánh','gender' => '0','birthday' => '1994/04/05','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010150', 'name' => 'Nguyễn Văn Khoa','gender' => '0','birthday' => '1994/01/09','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC1051200389', 'name' => 'Trần Anh Khoa','gender' => '0','birthday' => '1990/09/30','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010026', 'name' => 'Trần Đăng Khoa','gender' => '0','birthday' => '1994/07/01','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010091', 'name' => 'Đinh Trọng Khôi','gender' => '0','birthday' => '1994/08/09','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010027', 'name' => 'Nguyễn Hữu Kiên','gender' => '0','birthday' => '1994/01/02','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010212', 'name' => 'Nông Trung Kiên','gender' => '0','birthday' => '1994/07/03','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010028', 'name' => 'Đinh Trường Lam','gender' => '0','birthday' => '1994/10/21','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010092', 'name' => 'Triệu Thanh Lam','gender' => '0','birthday' => '1994/11/20','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010029', 'name' => 'Trần Thị Lan','gender' => '0','birthday' => '1994/02/03','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010185', 'name' => 'Nguyễn Thị Thúy Lành','gender' => '0','birthday' => '1994/07/10','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC14ND4802010011', 'name' => 'Nguyễn Đức Lập','gender' => '0','birthday' => '1992/10/01','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4801030029', 'name' => 'Nguyễn Thị Vĩnh Linh','gender' => '0','birthday' => '1994/08/24','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010094', 'name' => 'Giáp Văn Lộc','gender' => '0','birthday' => '1994/08/25','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC135D4802010018', 'name' => 'Đoàn Đức Mạnh','gender' => '0','birthday' => '1994/06/12','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010189', 'name' => 'Trương Văn Mạnh','gender' => '0','birthday' => '1993/02/24','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010096', 'name' => 'Từ Thị Mận','gender' => '0','birthday' => '1994/02/11','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4801030090', 'name' => 'Đoàn Thị Mừng','gender' => '0','birthday' => '1994/11/29','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4801030031', 'name' => 'Nguyễn Văn Nam','gender' => '0','birthday' => '1993/03/11','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010032', 'name' => 'Triệu Bùi Nam','gender' => '0','birthday' => '1994/06/24','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010033', 'name' => 'Lê Trọng Nghĩa','gender' => '0','birthday' => '1994/12/07','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010151', 'name' => 'Nguyễn Thị Ngoan','gender' => '0','birthday' => '1994/05/21','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010098', 'name' => 'Dương Thị Hồng Ngọc','gender' => '0','birthday' => '1993/06/12','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4801040250', 'name' => 'Dương Văn Nguyên','gender' => '0','birthday' => '1994/01/07','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4801010004', 'name' => 'Nguyễn Thị Thu Nguyên','gender' => '0','birthday' => '1994/10/17','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010099', 'name' => 'Đàm Thị Nguyệt','gender' => '0','birthday' => '1994/08/10','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC14ND4802010153', 'name' => 'Nguyễn Văn Nhật','gender' => '0','birthday' => '1993/04/23','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010235', 'name' => 'Đồng Thị Nhung','gender' => '0','birthday' => '1994/09/28','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010036', 'name' => 'Trần Mạnh Ninh','gender' => '0','birthday' => '1994/01/19','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC155D4802010309', 'name' => 'APHAYVONG Phonephukdee','gender' => '0','birthday' => '1993/08/29','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010192', 'name' => 'Đào Nghĩa Phương','gender' => '0','birthday' => '1993/07/28','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010102', 'name' => 'Đào Thị Anh Phương','gender' => '0','birthday' => '1994/11/21','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4801030033', 'name' => 'Phạm Văn Phương','gender' => '0','birthday' => '1993/06/02','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC1151200642', 'name' => 'Lý Thái Quang','gender' => '0','birthday' => '1993/09/14','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010171', 'name' => 'Nguyễn Văn Quân','gender' => '0','birthday' => '1994/04/21','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010166', 'name' => 'Đoàn Văn Quốc','gender' => '0','birthday' => '1992/02/02','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4801030035', 'name' => 'Trần Thanh Quý','gender' => '0','birthday' => '1992/10/12','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010103', 'name' => 'Bùi Thị Quyên','gender' => '0','birthday' => '1994/09/11','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010039', 'name' => 'Lý Văn Quyền','gender' => '0','birthday' => '1993/08/08','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010106', 'name' => 'Quách Thái Sơn','gender' => '0','birthday' => '1993/08/01','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010107', 'name' => 'Trần Trung Sơn','gender' => '0','birthday' => '1994/10/13','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010043', 'name' => 'Ngô Xuân Tài','gender' => '0','birthday' => '1994/11/19','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4801030041', 'name' => 'Vũ Toàn Tâm','gender' => '0','birthday' => '1992/10/03','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010110', 'name' => 'Nguyễn Trọng Thành','gender' => '0','birthday' => '1994/11/09','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010046', 'name' => 'Nguyễn Thị Phương Thảo','gender' => '0','birthday' => '1994/06/17','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010047', 'name' => 'Trần Thu Thảo','gender' => '0','birthday' => '1994/04/01','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010152', 'name' => 'Lê Tràng Thắng','gender' => '0','birthday' => '1994/01/30','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010044', 'name' => 'Nguyễn Quyết Thắng','gender' => '0','birthday' => '1994/11/16','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010236', 'name' => 'Vũ Ngọc Thiện','gender' => '0','birthday' => '1994/09/20','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010111', 'name' => 'Hoàng Văn Thiện','gender' => '0','birthday' => '1994/07/14','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010112', 'name' => 'Nguyễn Thị Thoa','gender' => '0','birthday' => '1994/08/08','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010238', 'name' => 'Nguyễn Văn Thông','gender' => '0','birthday' => '1994/10/20','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010239', 'name' => 'Phạm Thị Thu','gender' => '0','birthday' => '1994/06/08','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010048', 'name' => 'Nông Thị Thuý','gender' => '0','birthday' => '1994/09/26','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4801040011', 'name' => 'Lương Thị Thủy','gender' => '0','birthday' => '1994/04/20','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010113', 'name' => 'Hoàng Văn Thương','gender' => '0','birthday' => '1993/03/05','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010049', 'name' => 'Bàng Văn Tiến','gender' => '0','birthday' => '1994/03/26','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010114', 'name' => 'Nguyễn Quy Toàn','gender' => '0','birthday' => '1994/11/10','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010050', 'name' => 'Nguyễn Đình Toản','gender' => '0','birthday' => '1992/11/07','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010162', 'name' => 'Trần Xuân Tới','gender' => '0','birthday' => '1994/06/14','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010051', 'name' => 'Hoàng Thị Trang','gender' => '0','birthday' => '1994/06/08','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010115', 'name' => 'Phùng Huyền Trang','gender' => '0','birthday' => '1994/07/31','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4801040014', 'name' => 'Trần Thị Vân Trang','gender' => '0','birthday' => '1994/09/27','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010250', 'name' => 'Khuất Đình Trọng','gender' => '0','birthday' => '1994/10/09','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010053', 'name' => 'Cao Văn Trung','gender' => '0','birthday' => '1990/04/04','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4801030045', 'name' => 'Hà Văn Trưởng','gender' => '0','birthday' => '1994/07/05','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010197', 'name' => 'Nguyễn Văn Tú','gender' => '0','birthday' => '1993/05/16','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4801030046', 'name' => 'Lương Văn Tuân','gender' => '0','birthday' => '1994/10/21','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010055', 'name' => 'Đàm Văn Tuấn','gender' => '0','birthday' => '1994/11/13','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4801030047', 'name' => 'Nguyễn Mạnh Tuấn','gender' => '0','birthday' => '1994/03/23','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010193', 'name' => 'Đào Thanh Tùng','gender' => '0','birthday' => '1994/06/26','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010057', 'name' => 'Nguyễn Quang Tùng','gender' => '0','birthday' => '1994/12/01','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010058', 'name' => 'Phạm Mạnh Tùng','gender' => '0','birthday' => '1994/12/19','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4801030049', 'name' => 'Phạm Văn Tùng','gender' => '0','birthday' => '1991/12/08','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4801030050', 'name' => 'Vũ Anh Tùng','gender' => '0','birthday' => '1994/10/29','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4801010010', 'name' => 'Vũ Thiện Tùng','gender' => '0','birthday' => '1994/05/01','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010060', 'name' => 'Hoàng Thị Thuý Tuyên','gender' => '0','birthday' => '1993/10/20','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010122', 'name' => 'Ninh Văn Tuyên','gender' => '0','birthday' => '1992/05/01','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010061', 'name' => 'Vũ Ngọc Tuyên','gender' => '0','birthday' => '1994/03/01','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4801030051', 'name' => 'Vũ Mạnh Tuyến','gender' => '0','birthday' => '1993/12/07','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010059', 'name' => 'Trần Thị Hồng Tươi','gender' => '0','birthday' => '1994/05/09','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010123', 'name' => 'Nguyễn Thị Vân','gender' => '0','birthday' => '1994/12/19','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4801010006', 'name' => 'Đinh Hữu Vĩ','gender' => '0','birthday' => '1994/04/25','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010241', 'name' => 'Lại Đức Việt','gender' => '0','birthday' => '1993/09/28','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010196', 'name' => 'Phạm Bá Việt','gender' => '0','birthday' => '1994/09/22','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010199', 'name' => 'Cao Thị Xuân','gender' => '0','birthday' => '1994/05/02','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4801030080', 'name' => 'Bùi Thị Xuyến','gender' => '0','birthday' => '1994/10/10','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010242', 'name' => 'Nguyễn Hải Yến','gender' => '0','birthday' => '1994/02/02','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC125D4802010234', 'name' => 'Nguyễn Thị Yến','gender' => '0','birthday' => '1993/03/12','school_id' => '1']);
    //     DB::table('students')->insert(['code' =>'DTC1151200663', 'name' => 'Phạm Hải Yến','gender' => '0','birthday' => '1993/03/14','school_id' => '1']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010062@ictu.edu.vn', 'username' => 'DTC125D4802010062','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Bùi Ngọc Hoàng Anh']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010001@ictu.edu.vn', 'username' => 'DTC125D4802010001','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Hoàng Ngọc Anh']);
    //     DB::table('users')->insert(['email' =>'DTC125D4801030002@ictu.edu.vn', 'username' => 'DTC125D4801030002','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Lê Ngô Việt Anh']);
    //     DB::table('users')->insert(['email' =>'DTC14ND4802010007@ictu.edu.vn', 'username' => 'DTC14ND4802010007','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Lưu Việt Anh']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010065@ictu.edu.vn', 'username' => 'DTC125D4802010065','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Hoàng Quốc Bảo']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010004@ictu.edu.vn', 'username' => 'DTC125D4802010004','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Nguyễn Ngọc Chiến']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010068@ictu.edu.vn', 'username' => 'DTC125D4802010068','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Nguyễn Thị Chinh']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010005@ictu.edu.vn', 'username' => 'DTC125D4802010005','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Hoàng Thị Cúc']);
    //     DB::table('users')->insert(['email' =>'DTC125D4801030007@ictu.edu.vn', 'username' => 'DTC125D4801030007','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Cao Tiến Cường']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010300@ictu.edu.vn', 'username' => 'DTC125D4802010300','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Nguyễn Văn Cường']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010070@ictu.edu.vn', 'username' => 'DTC125D4802010070','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Lê Thị Dịu']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010006@ictu.edu.vn', 'username' => 'DTC125D4802010006','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Nguyễn Thị Dung']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010071@ictu.edu.vn', 'username' => 'DTC125D4802010071','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Dương Văn Dũng']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010007@ictu.edu.vn', 'username' => 'DTC125D4802010007','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Lê Trung Dũng']);
    //     DB::table('users')->insert(['email' =>'DTC125D4801030070@ictu.edu.vn', 'username' => 'DTC125D4801030070','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Nguyễn Mạnh Dũng']);
    //     DB::table('users')->insert(['email' =>'DTC125D4801030062@ictu.edu.vn', 'username' => 'DTC125D4801030062','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Đặng Thái Duy']);
    //     DB::table('users')->insert(['email' =>'DTC125D4801040002@ictu.edu.vn', 'username' => 'DTC125D4801040002','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Nguyễn Đức Đại']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010076@ictu.edu.vn', 'username' => 'DTC125D4802010076','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Nguyễn Trung Đức']);
    //     DB::table('users')->insert(['email' =>'DTC125D4801030012@ictu.edu.vn', 'username' => 'DTC125D4801030012','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Hoàng Văn Đức']);
    //     DB::table('users')->insert(['email' =>'DTC125D4801030013@ictu.edu.vn', 'username' => 'DTC125D4801030013','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Ma Quang Đức']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010075@ictu.edu.vn', 'username' => 'DTC125D4802010075','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Nguyễn Lập Đức']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010010@ictu.edu.vn', 'username' => 'DTC125D4802010010','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Nguyễn Thị Hà Giang']);
    //     DB::table('users')->insert(['email' =>'DTC125D4801030014@ictu.edu.vn', 'username' => 'DTC125D4801030014','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Phạm Sỹ Giang']);
    //     DB::table('users')->insert(['email' =>'DTC125D3404050020@ictu.edu.vn', 'username' => 'DTC125D3404050020','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Phạm Trường Giang']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010077@ictu.edu.vn', 'username' => 'DTC125D4802010077','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Bùi Văn Giáp']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010078@ictu.edu.vn', 'username' => 'DTC125D4802010078','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Vũ Ngọc Hà']);
    //     DB::table('users')->insert(['email' =>'DTC125D4801030015@ictu.edu.vn', 'username' => 'DTC125D4801030015','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Ngô Văn Hải']);
    //     DB::table('users')->insert(['email' =>'DTC125D4801040004@ictu.edu.vn', 'username' => 'DTC125D4801040004','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Nguyễn Ngọc Hải']);
    //     DB::table('users')->insert(['email' =>'DTC125D4801010003@ictu.edu.vn', 'username' => 'DTC125D4801010003','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Phạm Đình Hải']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010183@ictu.edu.vn', 'username' => 'DTC125D4802010183','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Vũ Tiến Hải']);
    //     DB::table('users')->insert(['email' =>'DTC125D4801030017@ictu.edu.vn', 'username' => 'DTC125D4801030017','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Nguyễn Minh Hạnh']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010012@ictu.edu.vn', 'username' => 'DTC125D4802010012','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Nguyễn Thị Hảo']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010079@ictu.edu.vn', 'username' => 'DTC125D4802010079','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Phan Thu Hằng']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010081@ictu.edu.vn', 'username' => 'DTC125D4802010081','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Trần Thị Thanh Hiền']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010181@ictu.edu.vn', 'username' => 'DTC125D4802010181','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Nguyễn Trung Hiếu']);
    //     DB::table('users')->insert(['email' =>'DTC125D4801030018@ictu.edu.vn', 'username' => 'DTC125D4801030018','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Tạ Văn Hiêú']);
    //     DB::table('users')->insert(['email' =>'DTC125D4801030065@ictu.edu.vn', 'username' => 'DTC125D4801030065','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Lê Trung Hiếu']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010013@ictu.edu.vn', 'username' => 'DTC125D4802010013','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Ma Trung Hiếu']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010082@ictu.edu.vn', 'username' => 'DTC125D4802010082','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Nông Xuân Hinh']);
    //     DB::table('users')->insert(['email' =>'DTC14ND4802010151@ictu.edu.vn', 'username' => 'DTC14ND4802010151','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Nguyễn Thị Hoa']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010014@ictu.edu.vn', 'username' => 'DTC125D4802010014','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Phạm Thị Hoa']);
    //     DB::table('users')->insert(['email' =>'DTC125D4801030020@ictu.edu.vn', 'username' => 'DTC125D4801030020','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Nguyễn Huy Hoàng']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010168@ictu.edu.vn', 'username' => 'DTC125D4802010168','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Tống Thị Huệ']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010084@ictu.edu.vn', 'username' => 'DTC125D4802010084','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Nguyễn Lương Hùng']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010017@ictu.edu.vn', 'username' => 'DTC125D4802010017','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Nguyễn Thế Hùng']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010018@ictu.edu.vn', 'username' => 'DTC125D4802010018','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Trần Văn Hùng']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010019@ictu.edu.vn', 'username' => 'DTC125D4802010019','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Vũ Thế Hùng']);
    //     DB::table('users')->insert(['email' =>'DTC125D4801030083@ictu.edu.vn', 'username' => 'DTC125D4801030083','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Nguyễn Văn Huy']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010088@ictu.edu.vn', 'username' => 'DTC125D4802010088','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Trần Quang Huy']);
    //     DB::table('users')->insert(['email' =>'DTC125D4801030250@ictu.edu.vn', 'username' => 'DTC125D4801030250','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Nguyễn Thanh Huyền']);
    //     DB::table('users')->insert(['email' =>'DTC125D5103022111@ictu.edu.vn', 'username' => 'DTC125D5103022111','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Nguyễn Thị Thanh Huyền']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010089@ictu.edu.vn', 'username' => 'DTC125D4802010089','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Ngô Văn Huynh']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010085@ictu.edu.vn', 'username' => 'DTC125D4802010085','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Hà Quang Hưng']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010020@ictu.edu.vn', 'username' => 'DTC125D4802010020','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Đặng Thị Hương']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010023@ictu.edu.vn', 'username' => 'DTC125D4802010023','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Đỗ Văn Khang']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010024@ictu.edu.vn', 'username' => 'DTC125D4802010024','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Nguyễn Hữu Khang']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010025@ictu.edu.vn', 'username' => 'DTC125D4802010025','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Nguyễn Duy Khánh']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010150@ictu.edu.vn', 'username' => 'DTC125D4802010150','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Nguyễn Văn Khoa']);
    //     DB::table('users')->insert(['email' =>'DTC1051200389@ictu.edu.vn', 'username' => 'DTC1051200389','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Trần Anh Khoa']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010026@ictu.edu.vn', 'username' => 'DTC125D4802010026','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Trần Đăng Khoa']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010091@ictu.edu.vn', 'username' => 'DTC125D4802010091','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Đinh Trọng Khôi']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010027@ictu.edu.vn', 'username' => 'DTC125D4802010027','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Nguyễn Hữu Kiên']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010212@ictu.edu.vn', 'username' => 'DTC125D4802010212','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Nông Trung Kiên']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010028@ictu.edu.vn', 'username' => 'DTC125D4802010028','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Đinh Trường Lam']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010092@ictu.edu.vn', 'username' => 'DTC125D4802010092','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Triệu Thanh Lam']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010029@ictu.edu.vn', 'username' => 'DTC125D4802010029','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Trần Thị Lan']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010185@ictu.edu.vn', 'username' => 'DTC125D4802010185','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Nguyễn Thị Thúy Lành']);
    //     DB::table('users')->insert(['email' =>'DTC14ND4802010011@ictu.edu.vn', 'username' => 'DTC14ND4802010011','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Nguyễn Đức Lập']);
    //     DB::table('users')->insert(['email' =>'DTC125D4801030029@ictu.edu.vn', 'username' => 'DTC125D4801030029','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Nguyễn Thị Vĩnh Linh']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010094@ictu.edu.vn', 'username' => 'DTC125D4802010094','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Giáp Văn Lộc']);
    //     DB::table('users')->insert(['email' =>'DTC135D4802010018@ictu.edu.vn', 'username' => 'DTC135D4802010018','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Đoàn Đức Mạnh']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010189@ictu.edu.vn', 'username' => 'DTC125D4802010189','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Trương Văn Mạnh']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010096@ictu.edu.vn', 'username' => 'DTC125D4802010096','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Từ Thị Mận']);
    //     DB::table('users')->insert(['email' =>'DTC125D4801030090@ictu.edu.vn', 'username' => 'DTC125D4801030090','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Đoàn Thị Mừng']);
    //     DB::table('users')->insert(['email' =>'DTC125D4801030031@ictu.edu.vn', 'username' => 'DTC125D4801030031','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Nguyễn Văn Nam']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010032@ictu.edu.vn', 'username' => 'DTC125D4802010032','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Triệu Bùi Nam']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010033@ictu.edu.vn', 'username' => 'DTC125D4802010033','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Lê Trọng Nghĩa']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010151@ictu.edu.vn', 'username' => 'DTC125D4802010151','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Nguyễn Thị Ngoan']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010098@ictu.edu.vn', 'username' => 'DTC125D4802010098','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Dương Thị Hồng Ngọc']);
    //     DB::table('users')->insert(['email' =>'DTC125D4801040250@ictu.edu.vn', 'username' => 'DTC125D4801040250','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Dương Văn Nguyên']);
    //     DB::table('users')->insert(['email' =>'DTC125D4801010004@ictu.edu.vn', 'username' => 'DTC125D4801010004','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Nguyễn Thị Thu Nguyên']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010099@ictu.edu.vn', 'username' => 'DTC125D4802010099','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Đàm Thị Nguyệt']);
    //     DB::table('users')->insert(['email' =>'DTC14ND4802010153@ictu.edu.vn', 'username' => 'DTC14ND4802010153','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Nguyễn Văn Nhật']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010235@ictu.edu.vn', 'username' => 'DTC125D4802010235','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Đồng Thị Nhung']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010036@ictu.edu.vn', 'username' => 'DTC125D4802010036','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Trần Mạnh Ninh']);
    //     DB::table('users')->insert(['email' =>'DTC155D4802010309@ictu.edu.vn', 'username' => 'DTC155D4802010309','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'APHAYVONG Phonephukdee']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010192@ictu.edu.vn', 'username' => 'DTC125D4802010192','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Đào Nghĩa Phương']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010102@ictu.edu.vn', 'username' => 'DTC125D4802010102','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Đào Thị Anh Phương']);
    //     DB::table('users')->insert(['email' =>'DTC125D4801030033@ictu.edu.vn', 'username' => 'DTC125D4801030033','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Phạm Văn Phương']);
    //     DB::table('users')->insert(['email' =>'DTC1151200642@ictu.edu.vn', 'username' => 'DTC1151200642','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Lý Thái Quang']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010171@ictu.edu.vn', 'username' => 'DTC125D4802010171','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Nguyễn Văn Quân']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010166@ictu.edu.vn', 'username' => 'DTC125D4802010166','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Đoàn Văn Quốc']);
    //     DB::table('users')->insert(['email' =>'DTC125D4801030035@ictu.edu.vn', 'username' => 'DTC125D4801030035','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Trần Thanh Quý']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010103@ictu.edu.vn', 'username' => 'DTC125D4802010103','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Bùi Thị Quyên']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010039@ictu.edu.vn', 'username' => 'DTC125D4802010039','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Lý Văn Quyền']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010106@ictu.edu.vn', 'username' => 'DTC125D4802010106','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Quách Thái Sơn']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010107@ictu.edu.vn', 'username' => 'DTC125D4802010107','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Trần Trung Sơn']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010043@ictu.edu.vn', 'username' => 'DTC125D4802010043','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Ngô Xuân Tài']);
    //     DB::table('users')->insert(['email' =>'DTC125D4801030041@ictu.edu.vn', 'username' => 'DTC125D4801030041','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Vũ Toàn Tâm']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010110@ictu.edu.vn', 'username' => 'DTC125D4802010110','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Nguyễn Trọng Thành']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010046@ictu.edu.vn', 'username' => 'DTC125D4802010046','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Nguyễn Thị Phương Thảo']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010047@ictu.edu.vn', 'username' => 'DTC125D4802010047','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Trần Thu Thảo']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010152@ictu.edu.vn', 'username' => 'DTC125D4802010152','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Lê Tràng Thắng']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010044@ictu.edu.vn', 'username' => 'DTC125D4802010044','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Nguyễn Quyết Thắng']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010236@ictu.edu.vn', 'username' => 'DTC125D4802010236','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Vũ Ngọc Thiện']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010111@ictu.edu.vn', 'username' => 'DTC125D4802010111','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Hoàng Văn Thiện']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010112@ictu.edu.vn', 'username' => 'DTC125D4802010112','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Nguyễn Thị Thoa']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010238@ictu.edu.vn', 'username' => 'DTC125D4802010238','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Nguyễn Văn Thông']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010239@ictu.edu.vn', 'username' => 'DTC125D4802010239','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Phạm Thị Thu']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010048@ictu.edu.vn', 'username' => 'DTC125D4802010048','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Nông Thị Thuý']);
    //     DB::table('users')->insert(['email' =>'DTC125D4801040011@ictu.edu.vn', 'username' => 'DTC125D4801040011','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Lương Thị Thủy']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010113@ictu.edu.vn', 'username' => 'DTC125D4802010113','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Hoàng Văn Thương']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010049@ictu.edu.vn', 'username' => 'DTC125D4802010049','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Bàng Văn Tiến']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010114@ictu.edu.vn', 'username' => 'DTC125D4802010114','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Nguyễn Quy Toàn']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010050@ictu.edu.vn', 'username' => 'DTC125D4802010050','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Nguyễn Đình Toản']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010162@ictu.edu.vn', 'username' => 'DTC125D4802010162','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Trần Xuân Tới']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010051@ictu.edu.vn', 'username' => 'DTC125D4802010051','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Hoàng Thị Trang']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010115@ictu.edu.vn', 'username' => 'DTC125D4802010115','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Phùng Huyền Trang']);
    //     DB::table('users')->insert(['email' =>'DTC125D4801040014@ictu.edu.vn', 'username' => 'DTC125D4801040014','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Trần Thị Vân Trang']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010250@ictu.edu.vn', 'username' => 'DTC125D4802010250','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Khuất Đình Trọng']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010053@ictu.edu.vn', 'username' => 'DTC125D4802010053','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Cao Văn Trung']);
    //     DB::table('users')->insert(['email' =>'DTC125D4801030045@ictu.edu.vn', 'username' => 'DTC125D4801030045','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Hà Văn Trưởng']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010197@ictu.edu.vn', 'username' => 'DTC125D4802010197','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Nguyễn Văn Tú']);
    //     DB::table('users')->insert(['email' =>'DTC125D4801030046@ictu.edu.vn', 'username' => 'DTC125D4801030046','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Lương Văn Tuân']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010055@ictu.edu.vn', 'username' => 'DTC125D4802010055','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Đàm Văn Tuấn']);
    //     DB::table('users')->insert(['email' =>'DTC125D4801030047@ictu.edu.vn', 'username' => 'DTC125D4801030047','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Nguyễn Mạnh Tuấn']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010193@ictu.edu.vn', 'username' => 'DTC125D4802010193','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Đào Thanh Tùng']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010057@ictu.edu.vn', 'username' => 'DTC125D4802010057','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Nguyễn Quang Tùng']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010058@ictu.edu.vn', 'username' => 'DTC125D4802010058','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Phạm Mạnh Tùng']);
    //     DB::table('users')->insert(['email' =>'DTC125D4801030049@ictu.edu.vn', 'username' => 'DTC125D4801030049','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Phạm Văn Tùng']);
    //     DB::table('users')->insert(['email' =>'DTC125D4801030050@ictu.edu.vn', 'username' => 'DTC125D4801030050','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Vũ Anh Tùng']);
    //     DB::table('users')->insert(['email' =>'DTC125D4801010010@ictu.edu.vn', 'username' => 'DTC125D4801010010','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Vũ Thiện Tùng']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010060@ictu.edu.vn', 'username' => 'DTC125D4802010060','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Hoàng Thị Thuý Tuyên']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010122@ictu.edu.vn', 'username' => 'DTC125D4802010122','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Ninh Văn Tuyên']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010061@ictu.edu.vn', 'username' => 'DTC125D4802010061','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Vũ Ngọc Tuyên']);
    //     DB::table('users')->insert(['email' =>'DTC125D4801030051@ictu.edu.vn', 'username' => 'DTC125D4801030051','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Vũ Mạnh Tuyến']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010059@ictu.edu.vn', 'username' => 'DTC125D4802010059','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Trần Thị Hồng Tươi']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010123@ictu.edu.vn', 'username' => 'DTC125D4802010123','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Nguyễn Thị Vân']);
    //     DB::table('users')->insert(['email' =>'DTC125D4801010006@ictu.edu.vn', 'username' => 'DTC125D4801010006','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Đinh Hữu Vĩ']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010241@ictu.edu.vn', 'username' => 'DTC125D4802010241','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Lại Đức Việt']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010196@ictu.edu.vn', 'username' => 'DTC125D4802010196','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Phạm Bá Việt']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010199@ictu.edu.vn', 'username' => 'DTC125D4802010199','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Cao Thị Xuân']);
    //     DB::table('users')->insert(['email' =>'DTC125D4801030080@ictu.edu.vn', 'username' => 'DTC125D4801030080','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Bùi Thị Xuyến']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010242@ictu.edu.vn', 'username' => 'DTC125D4802010242','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Nguyễn Hải Yến']);
    //     DB::table('users')->insert(['email' =>'DTC125D4802010234@ictu.edu.vn', 'username' => 'DTC125D4802010234','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Nguyễn Thị Yến']);
    //     DB::table('users')->insert(['email' =>'DTC1151200663@ictu.edu.vn', 'username' => 'DTC1151200663','password' => '$2y$10$mvMHoSJLYe3ZYIiGSeln5.phlOhrKcllOPzmt8GwqPUc47WiBxkAC','type' => '1','name' => 'Phạm Hải Yến']);
    // }
=======
>>>>>>> 7709b3511774adaf4e6fdf2a9bd9dc6b8d7a7790
    }
>>>>>>> 07a7710e934b052d1a9125b94149c03ed85f6995
}
