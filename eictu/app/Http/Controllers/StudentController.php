<?php

namespace App\Http\Controllers;

use App\Classes;
use App\Major;
use App\NewsFeed;
use App\School;
use App\Student;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use File;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Schema;

class StudentController extends Controller
{
    //

    public function get_id($masv){

    }

    public function vLogin()
    {
        return view("students.login");
    }

    public function login(Request $request)
    {
        $username =$request->input('username'); //Input::get('username');
        $password =$request->input('password'); //Input::get('password');

        if (auth()->attempt(['username' => $username, 'password' => $password])) {
            if (auth()->user()->type == 3) {
                $data = Student::select('*')
                    ->where('code', '=', auth()->user()->username)
                    ->get()->first();
                $classid = $data->class_id;
                $name = Auth::user()->name;
                return view("students.newfeed", compact('name', 'classid'));
            }
            else
                return redirect()->back()->with('global', 'Xin lỗi! bạn không phải sinh viên.');
        }
        return redirect()->back()->with('global', ' Tên đăng nhập hoặc mật khẩu không đúng.');
    }

    public function index()
    {
        if(!Auth::guest()) {
            $type = auth()->user()->type;

//        $type = Auth::user()->type;
            if ($type == 1) {

                $userid= Auth::user()->id;
                $school= School::where('user_id', $userid)->first();
                $school_id = $school->id;

                $data = Student::Where('school_id' , '=' ,$school_id )->paginate(20);
                $stt = 1;
                return view("students.index", compact('data', 'stt'));
            } else if ($type == 3) {
                $data = Student::select('*')
                    ->where('code', '=', Auth::user()->username)
                    ->get()->first();
                $classid = $data->class_id;
                $name = Auth::user()->name;
                $avatar = $data== null ? $data->avatar==null ? "/img/avatar.jpg" : $data->avatar."" : "/img/avatar.jpg";
                return view("students.studentHomepage", compact('name', 'classid','avatar'));
            }
        }else{
            return redirect('students/login');
        }
    }

    public function create()
    {
        $data = School::select('*')->get();
        $majors= Major::select('*')->get();
        return view('students.create',compact('data','majors'));
    }

    /**
     * @return string
     */
    public function AddingColum()
    {
//        Schema::create('newsfeed', function ($table) {
//            $table->increments('id');
//            $table->integer('student_id');
//        });
//
//        Schema::table('newsfeed', function ($table) {
//            $table->integer('type')->nullable();
//        });
//
//        $columns1 = Schema::getColumnListing('newsfeed'); // users table
//        dd($columns1);
//        Schema::table('teacher', function ($table) {
//            $table->string('avatar')->nullable();
//        });

        $columns = Schema::getColumnListing('students'); // users table

        dd($columns );
//
//        DB::statement('ALTER TABLE newsfeed MODIFY COLUMN content text');
////
//        $columns = Schema::getColumnListing('newsfeed'); // users table
//        $student = Student::select('*')->get();
//        foreach ($student as $st)
//        {
//            echo $st->code." | ";
//            echo $st->name." | ";
//            echo $st->avatar."|---------";
//        }
//       // dd($student);
    }

    /**
     * @return string
     */

    public  function  profile()
    {
        $data = Student::select('*')
            ->where('code', '=', Auth::user()->username)
            ->get()->first();
        $majors= Major::select('*')->get();
        return view('students.profile',compact('data','majors'));
    }

    public function EditStudent(Request $request)
    {

        $this->validate($request, [
            'Code'    => 'required',
            'Name'    => 'required'
        ]);
        //update thông tin
        Student::where('code', Auth::user()->username)
            ->update(['name'=>$request->input('Name'),'gender' => $request->input('gender'),
                'birthday' =>$request->input('birthday') ,'major_id' =>$request->input('Major_Id')]);
        $content="Cập nhật thông tin cá nhân.";
        if (Input::hasFile('image')) {
            $extension = $request->file('image')->guessClientExtension();
            $image_name = time().$extension.$request->file('image')->getClientOriginalName();

            //update avatar
            Student::where('code', Auth::user()->username)
                ->update(['avatar' =>"/upload/avatar/".$image_name]);

            Input::file('image')->move('upload/avatar/', $image_name);

            $content="Cập nhật ảnh đại diện mới.";
        }

        $st = Student::select('*')
            ->where('code', '=', Auth::user()->username)
            ->get()->first();
        $news = new NewsFeed();
        $news->student_id   =$st->id;
        $news->content      =$content;
        $news->type         =3;
        $news->save();
        return redirect('student/newsfeed');
    }

    public function adding()
    {
        //  Schema::table('newsfeed', function ($table) {
        //         $table->integer('type')->nullable();
        //     });

        //   $columns1 = Schema::getColumnListing('newsfeed'); // users table

        //     Schema::table('teacher', function ($table) {
        //         $table->string('avatar')->nullable();
        //      });

        //   $columns2 = Schema::getColumnListing('teacher'); // users table

        //       DB::statement('ALTER TABLE newsfeed MODIFY COLUMN content text');
//
        Schema::table('students', function ($table) {
            $table->text('address')->nullable();
        });
        $columns = Schema::getColumnListing('students'); // users table

        dd($columns);
        /*   $student = Student::select('*')->get();
         foreach ($student as $st)
         {
             echo $st->code." | ";
             echo $st->name." | ";
             echo $st->avatar."|---------";
         }*/
    }

    //add
    public function store(Request $request)
    {
        $data = array();
        $data['code']       = $request->input('Code');
        $data['name']       = $request->input('Name');
        $data['gender']     = $request->input('gender');
        $data['birthday']   = $request->input('birthday');
        $data['major_id']   = $request->input('Major_Id');

        // lấy mã trường do quản trị viên quản lý
        $userid= Auth::user()->id;
        $school= School::where('user_id', $userid)->first();
        $data['school_id']  = $school->id;

        $this->validate($request, [
            'Code'    => 'required',
            'Name'    => 'required'
        ]);

        //add student

        $student = new Student();
        $student->code      = $data['code'];
        $student->name      = $data['name'];
        $student->gender    = $data['gender'];
        $student->birthday  = $data['birthday'];
        $student->major_id  = $data['major_id'];
        $student->class_id  = Null;
        $student->school_id =$data['school_id'];
        $student->avatar  = Null;
        $student->address  = Null;
        $student->save();
       if ($student->save() == true) {
           $user = new User();
           $user->name = $data['name'];
           $user->username = $data['code'];
           $user->email =$data['code']."@ictu.edu.vn";
           $user->type = 3;
           $user->password = bcrypt($data['code']);
           $user->save();
           return redirect("student");
       }
    }

    public function logout(){
        Auth::logout();
        return redirect()->back();
    }

    public  function deleteall()
    {
        DB::table('users')->where('type', '=', 3)->delete();
        DB::table('wants')->delete();
        DB::table('areas')->delete();
        DB::table('have')->delete();
        DB::table('motels')->delete();
        DB::table('secondhands')->delete();
        DB::table('dormitories')->delete();
        DB::table('schedules')->delete();
        DB::table('students')->delete();
        DB::table('classes')->delete();
        return redirect()->back();
    }

    /**
     * @return string
     */
    public function NewFeeds()
    {
        return view("students.newfeed");
    }

    public function impost()
    {



        $userid= Auth::user()->id;
        $school= School::where('user_id', $userid)->first();
        $school_id = $school->id;

        $nganh = Major::where('code', 'CNTT')->first();
        $manganh = $nganh!=null ? $nganh->id : 0;

        DB::table('students')->insert(['code' =>'DTC125D4802010062', 'name' => 'Bùi Ngọc Hoàng Anh','gender' => '1','birthday' => '1994/12/20','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010001', 'name' => 'Hoàng Ngọc Anh','gender' => '1','birthday' => '1994/11/11','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4801030002', 'name' => 'Lê Ngô Việt Anh','gender' => '1','birthday' => '1994/11/14','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC14ND4802010007', 'name' => 'Lưu Việt Anh','gender' => '1','birthday' => '1993/11/29','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010065', 'name' => 'Hoàng Quốc Bảo','gender' => '1','birthday' => '1994/09/30','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010004', 'name' => 'Nguyễn Ngọc Chiến','gender' => '1','birthday' => '1993/09/15','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010068', 'name' => 'Nguyễn Thị Chinh','gender' => '0','birthday' => '1994/10/03','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010005', 'name' => 'Hoàng Thị Cúc','gender' => '0','birthday' => '1994/08/25','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4801030007', 'name' => 'Cao Tiến Cường','gender' => '1','birthday' => '1991/03/06','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010300', 'name' => 'Nguyễn Văn Cường','gender' => '1','birthday' => '1994/10/02','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010070', 'name' => 'Lê Thị Dịu','gender' => '0','birthday' => '1994/08/15','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010006', 'name' => 'Nguyễn Thị Dung','gender' => '0','birthday' => '1994/06/12','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010071', 'name' => 'Dương Văn Dũng','gender' => '1','birthday' => '1994/08/09','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010007', 'name' => 'Lê Trung Dũng','gender' => '1','birthday' => '1993/02/02','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4801030070', 'name' => 'Nguyễn Mạnh Dũng','gender' => '1','birthday' => '1994/06/23','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4801030062', 'name' => 'Đặng Thái Duy','gender' => '1','birthday' => '1993/05/24','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4801040002', 'name' => 'Nguyễn Đức Đại','gender' => '1','birthday' => '1993/03/14','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010076', 'name' => 'Nguyễn Trung  Đức','gender' => '1','birthday' => '1994/03/02','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4801030012', 'name' => 'Hoàng Văn Đức','gender' => '1','birthday' => '1994/09/14','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4801030013', 'name' => 'Ma Quang Đức','gender' => '1','birthday' => '1992/07/25','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010075', 'name' => 'Nguyễn Lập Đức','gender' => '1','birthday' => '1994/01/01','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010010', 'name' => 'Nguyễn Thị Hà Giang','gender' => '0','birthday' => '1993/09/11','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4801030014', 'name' => 'Phạm Sỹ Giang','gender' => '1','birthday' => '1994/10/26','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D3404050020', 'name' => 'Phạm Trường Giang','gender' => '1','birthday' => '1994/01/20','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010077', 'name' => 'Bùi Văn Giáp','gender' => '1','birthday' => '1984/04/15','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010078', 'name' => 'Vũ Ngọc Hà','gender' => '1','birthday' => '1994/10/03','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4801030015', 'name' => 'Ngô Văn Hải','gender' => '1','birthday' => '1992/09/22','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4801040004', 'name' => 'Nguyễn Ngọc Hải','gender' => '1','birthday' => '1994/03/23','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4801010003', 'name' => 'Phạm Đình Hải','gender' => '1','birthday' => '1993/10/08','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010183', 'name' => 'Vũ Tiến Hải','gender' => '1','birthday' => '1994/03/01','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4801030017', 'name' => 'Nguyễn Minh Hạnh','gender' => '1','birthday' => '1994/03/08','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010012', 'name' => 'Nguyễn Thị Hảo','gender' => '0','birthday' => '1993/06/06','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010079', 'name' => 'Phan Thu Hằng','gender' => '0','birthday' => '1994/08/17','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010081', 'name' => 'Trần Thị Thanh Hiền','gender' => '0','birthday' => '1994/04/28','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010181', 'name' => 'Nguyễn Trung Hiếu','gender' => '1','birthday' => '1994/04/11','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4801030018', 'name' => 'Tạ Văn Hiêú','gender' => '1','birthday' => '1994/06/28','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4801030065', 'name' => 'Lê Trung Hiếu','gender' => '1','birthday' => '1993/12/06','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010013', 'name' => 'Ma Trung Hiếu','gender' => '1','birthday' => '1988/01/02','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010082', 'name' => 'Nông Xuân Hinh','gender' => '1','birthday' => '1994/09/12','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC14ND4802010151', 'name' => 'Nguyễn Thị Hoa','gender' => '0','birthday' => '1993/03/08','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010014', 'name' => 'Phạm Thị Hoa','gender' => '0','birthday' => '1994/08/04','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4801030020', 'name' => 'Nguyễn Huy Hoàng','gender' => '1','birthday' => '1993/07/04','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010168', 'name' => 'Tống Thị Huệ','gender' => '0','birthday' => '1994/04/20','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010084', 'name' => 'Nguyễn Lương Hùng','gender' => '1','birthday' => '1993/07/05','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010017', 'name' => 'Nguyễn Thế Hùng','gender' => '1','birthday' => '1994/04/06','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010018', 'name' => 'Trần Văn Hùng','gender' => '1','birthday' => '1994/09/21','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010019', 'name' => 'Vũ Thế  Hùng','gender' => '1','birthday' => '1994/06/14','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4801030083', 'name' => 'Nguyễn Văn Huy','gender' => '1','birthday' => '1994/09/20','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010088', 'name' => 'Trần Quang Huy','gender' => '1','birthday' => '1994/05/22','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4801030250', 'name' => 'Nguyễn Thanh Huyền','gender' => '0','birthday' => '1994/09/16','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D5103022111', 'name' => 'Nguyễn Thị Thanh Huyền','gender' => '0','birthday' => '1994/06/03','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010089', 'name' => 'Ngô Văn Huynh','gender' => '1','birthday' => '1993/02/28','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010085', 'name' => 'Hà Quang Hưng','gender' => '1','birthday' => '1994/09/28','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010020', 'name' => 'Đặng Thị Hương','gender' => '0','birthday' => '1993/05/01','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010023', 'name' => 'Đỗ Văn  Khang','gender' => '1','birthday' => '1993/03/10','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010024', 'name' => 'Nguyễn Hữu  Khang','gender' => '1','birthday' => '1994/01/14','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010025', 'name' => 'Nguyễn Duy Khánh','gender' => '1','birthday' => '1994/04/05','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010150', 'name' => 'Nguyễn Văn  Khoa','gender' => '1','birthday' => '1994/01/09','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC1051200389', 'name' => 'Trần Anh Khoa','gender' => '1','birthday' => '1990/09/30','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010026', 'name' => 'Trần Đăng Khoa','gender' => '1','birthday' => '1994/07/01','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010091', 'name' => 'Đinh Trọng Khôi','gender' => '1','birthday' => '1994/08/09','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010027', 'name' => 'Nguyễn Hữu  Kiên','gender' => '1','birthday' => '1994/01/02','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010212', 'name' => 'Nông Trung Kiên','gender' => '1','birthday' => '1994/07/03','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010028', 'name' => 'Đinh Trường Lam','gender' => '1','birthday' => '1994/10/21','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010092', 'name' => 'Triệu Thanh Lam','gender' => '1','birthday' => '1994/11/20','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010029', 'name' => 'Trần Thị Lan','gender' => '0','birthday' => '1994/02/03','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010185', 'name' => 'Nguyễn Thị Thúy Lành','gender' => '0','birthday' => '1994/07/10','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC14ND4802010011', 'name' => 'Nguyễn Đức Lập','gender' => '1','birthday' => '1992/10/01','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4801030029', 'name' => 'Nguyễn Thị Vĩnh Linh','gender' => '0','birthday' => '1994/08/24','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010094', 'name' => 'Giáp Văn Lộc','gender' => '1','birthday' => '1994/08/25','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC135D4802010018', 'name' => 'Đoàn Đức Mạnh','gender' => '1','birthday' => '1994/06/12','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010189', 'name' => 'Trương Văn Mạnh','gender' => '1','birthday' => '1993/02/24','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010096', 'name' => 'Từ Thị Mận','gender' => '0','birthday' => '1994/02/11','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4801030090', 'name' => 'Đoàn Thị Mừng','gender' => '1','birthday' => '1994/11/29','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4801030031', 'name' => 'Nguyễn Văn  Nam','gender' => '1','birthday' => '1993/03/11','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010032', 'name' => 'Triệu Bùi Nam','gender' => '1','birthday' => '1994/06/24','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010033', 'name' => 'Lê Trọng  Nghĩa','gender' => '1','birthday' => '1994/12/07','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010151', 'name' => 'Nguyễn Thị Ngoan','gender' => '0','birthday' => '1994/05/21','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010098', 'name' => 'Dương Thị Hồng Ngọc','gender' => '0','birthday' => '1993/06/12','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4801040250', 'name' => 'Dương Văn Nguyên','gender' => '1','birthday' => '1994/01/07','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4801010004', 'name' => 'Nguyễn Thị Thu Nguyên','gender' => '0','birthday' => '1994/10/17','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010099', 'name' => 'Đàm Thị Nguyệt','gender' => '0','birthday' => '1994/08/10','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC14ND4802010153', 'name' => 'Nguyễn Văn Nhật','gender' => '1','birthday' => '1993/04/23','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010235', 'name' => 'Đồng Thị Nhung','gender' => '1','birthday' => '1994/09/28','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010036', 'name' => 'Trần Mạnh Ninh','gender' => '1','birthday' => '1994/01/19','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC155D4802010309', 'name' => 'APHAYVONG Phonephukdee','gender' => '1','birthday' => '1993/08/29','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010192', 'name' => 'Đào Nghĩa Phương','gender' => '1','birthday' => '1993/07/28','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010102', 'name' => 'Đào Thị Anh Phương','gender' => '0','birthday' => '1994/11/21','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4801030033', 'name' => 'Phạm Văn Phương','gender' => '1','birthday' => '1993/06/02','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC1151200642', 'name' => 'Lý Thái Quang','gender' => '1','birthday' => '1993/09/14','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010171', 'name' => 'Nguyễn Văn Quân','gender' => '1','birthday' => '1994/04/21','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010166', 'name' => 'Đoàn Văn Quốc','gender' => '1','birthday' => '1992/02/02','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4801030035', 'name' => 'Trần Thanh Quý','gender' => '1','birthday' => '1992/10/12','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010103', 'name' => 'Bùi Thị Quyên','gender' => '0','birthday' => '1994/09/11','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010039', 'name' => 'Lý Văn Quyền','gender' => '1','birthday' => '1993/08/08','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010106', 'name' => 'Quách Thái Sơn','gender' => '1','birthday' => '1993/08/01','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010107', 'name' => 'Trần Trung Sơn','gender' => '1','birthday' => '1994/10/13','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010043', 'name' => 'Ngô Xuân Tài','gender' => '1','birthday' => '1994/11/19','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010110', 'name' => 'Nguyễn Trọng Thành','gender' => '1','birthday' => '1994/11/09','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010046', 'name' => 'Nguyễn Thị Phương Thảo','gender' => '0','birthday' => '1994/06/17','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010047', 'name' => 'Trần Thu  Thảo','gender' => '1','birthday' => '1994/04/01','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010152', 'name' => 'Lê Tràng Thắng','gender' => '1','birthday' => '1994/01/30','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010044', 'name' => 'Nguyễn Quyết Thắng','gender' => '1','birthday' => '1994/11/16','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010236', 'name' => 'Vũ Ngọc Thiện','gender' => '1','birthday' => '1994/09/20','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010111', 'name' => 'Hoàng Văn Thiện','gender' => '1','birthday' => '1994/07/14','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010112', 'name' => 'Nguyễn Thị Thoa','gender' => '0','birthday' => '1994/08/08','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010238', 'name' => 'Nguyễn Văn Thông','gender' => '1','birthday' => '1994/10/20','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010239', 'name' => 'Phạm Thị Thu','gender' => '0','birthday' => '1994/06/08','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010048', 'name' => 'Nông Thị Thuý','gender' => '0','birthday' => '1994/09/26','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4801040011', 'name' => 'Lương Thị Thủy','gender' => '0','birthday' => '1994/04/20','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010113', 'name' => 'Hoàng Văn Thương','gender' => '1','birthday' => '1993/03/05','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010049', 'name' => 'Bàng Văn Tiến','gender' => '1','birthday' => '1994/03/26','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010114', 'name' => 'Nguyễn Quy Toàn','gender' => '1','birthday' => '1994/11/10','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010050', 'name' => 'Nguyễn Đình Toản','gender' => '1','birthday' => '1992/11/07','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010162', 'name' => 'Trần Xuân Tới','gender' => '1','birthday' => '1994/06/14','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010051', 'name' => 'Hoàng Thị Trang','gender' => '0','birthday' => '1994/06/08','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010115', 'name' => 'Phùng Huyền Trang','gender' => '0','birthday' => '1994/07/31','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4801040014', 'name' => 'Trần Thị Vân Trang','gender' => '0','birthday' => '1994/09/27','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010250', 'name' => 'Khuất Đình  Trọng','gender' => '1','birthday' => '1994/10/09','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010053', 'name' => 'Cao Văn Trung','gender' => '1','birthday' => '1990/04/04','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4801030045', 'name' => 'Hà Văn Trưởng','gender' => '1','birthday' => '1994/07/05','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010197', 'name' => 'Nguyễn Văn Tú','gender' => '1','birthday' => '1993/05/16','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4801030046', 'name' => 'Lương Văn Tuân','gender' => '1','birthday' => '1994/10/21','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010055', 'name' => 'Đàm Văn Tuấn','gender' => '1','birthday' => '1994/11/13','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4801030047', 'name' => 'Nguyễn Mạnh Tuấn','gender' => '1','birthday' => '1994/03/23','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010193', 'name' => 'Đào Thanh Tùng','gender' => '1','birthday' => '1994/06/26','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010057', 'name' => 'Nguyễn Quang Tùng','gender' => '1','birthday' => '1994/12/01','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010058', 'name' => 'Phạm Mạnh Tùng','gender' => '1','birthday' => '1994/12/19','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4801030049', 'name' => 'Phạm Văn Tùng','gender' => '1','birthday' => '1991/12/08','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4801030050', 'name' => 'Vũ Anh Tùng','gender' => '1','birthday' => '1994/10/29','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4801010010', 'name' => 'Vũ Thiện Tùng','gender' => '1','birthday' => '1994/05/01','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010060', 'name' => 'Hoàng Thị Thuý Tuyên','gender' => '0','birthday' => '1993/10/20','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010122', 'name' => 'Ninh Văn Tuyên','gender' => '1','birthday' => '1992/05/01','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010061', 'name' => 'Vũ Ngọc Tuyên','gender' => '1','birthday' => '1994/03/01','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4801030051', 'name' => 'Vũ Mạnh Tuyến','gender' => '1','birthday' => '1993/12/07','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010059', 'name' => 'Trần Thị Hồng Tươi','gender' => '0','birthday' => '1994/05/09','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010123', 'name' => 'Nguyễn Thị Vân','gender' => '0','birthday' => '1994/12/19','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4801010006', 'name' => 'Đinh Hữu Vĩ','gender' => '1','birthday' => '1994/04/25','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010241', 'name' => 'Lại Đức Việt','gender' => '1','birthday' => '1993/09/28','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010196', 'name' => 'Phạm Bá Việt','gender' => '1','birthday' => '1994/09/22','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010199', 'name' => 'Cao Thị Xuân','gender' => '0','birthday' => '1994/05/02','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4801030080', 'name' => 'Bùi Thị Xuyến','gender' => '0','birthday' => '1994/10/10','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010242', 'name' => 'Nguyễn Hải Yến','gender' => '1','birthday' => '1994/02/02','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC125D4802010234', 'name' => 'Nguyễn Thị Yến','gender' => '0','birthday' => '1993/03/12','major_id' => $manganh, 'school_id'=>$school_id]);
        DB::table('students')->insert(['code' =>'DTC1151200663', 'name' => 'Phạm Hải Yến','gender' => '1','birthday' => '1993/03/14','major_id' => $manganh, 'school_id'=>$school_id]);


        DB::table('users')->insert(['email' =>'DTC125D4802010062@ictu.edu.vn', 'username' => 'DTC125D4802010062','password' => bcrypt('DTC125D4802010062'),'type' => '3','name'=>'Bùi Ngọc Hoàng Anh']);
        DB::table('users')->insert(['email' =>'DTC125D4802010001@ictu.edu.vn', 'username' => 'DTC125D4802010001','password' => bcrypt('DTC125D4802010001'),'type' => '3','name'=>'Hoàng Ngọc Anh']);
        DB::table('users')->insert(['email' =>'DTC125D4801030002@ictu.edu.vn', 'username' => 'DTC125D4801030002','password' => bcrypt('DTC125D4801030002'),'type' => '3','name'=>'Lê Ngô Việt Anh']);
        DB::table('users')->insert(['email' =>'DTC14ND4802010007@ictu.edu.vn', 'username' => 'DTC14ND4802010007','password' => bcrypt('DTC14ND4802010007'),'type' => '3','name'=>'Lưu Việt Anh']);
        DB::table('users')->insert(['email' =>'DTC125D4802010065@ictu.edu.vn', 'username' => 'DTC125D4802010065','password' => bcrypt('DTC125D4802010065'),'type' => '3','name'=>'Hoàng Quốc Bảo']);
        DB::table('users')->insert(['email' =>'DTC125D4802010004@ictu.edu.vn', 'username' => 'DTC125D4802010004','password' => bcrypt('DTC125D4802010004'),'type' => '3','name'=>'Nguyễn Ngọc Chiến']);
        DB::table('users')->insert(['email' =>'DTC125D4802010068@ictu.edu.vn', 'username' => 'DTC125D4802010068','password' => bcrypt('DTC125D4802010068'),'type' => '3','name'=>'Nguyễn Thị Chinh']);
        DB::table('users')->insert(['email' =>'DTC125D4802010005@ictu.edu.vn', 'username' => 'DTC125D4802010005','password' => bcrypt('DTC125D4802010005'),'type' => '3','name'=>'Hoàng Thị Cúc']);
        DB::table('users')->insert(['email' =>'DTC125D4801030007@ictu.edu.vn', 'username' => 'DTC125D4801030007','password' => bcrypt('DTC125D4801030007'),'type' => '3','name'=>'Cao Tiến Cường']);
        DB::table('users')->insert(['email' =>'DTC125D4802010300@ictu.edu.vn', 'username' => 'DTC125D4802010300','password' => bcrypt('DTC125D4802010300'),'type' => '3','name'=>'Nguyễn Văn Cường']);
        DB::table('users')->insert(['email' =>'DTC125D4802010070@ictu.edu.vn', 'username' => 'DTC125D4802010070','password' => bcrypt('DTC125D4802010070'),'type' => '3','name'=>'Lê Thị Dịu']);
        DB::table('users')->insert(['email' =>'DTC125D4802010006@ictu.edu.vn', 'username' => 'DTC125D4802010006','password' => bcrypt('DTC125D4802010006'),'type' => '3','name'=>'Nguyễn Thị Dung']);
        DB::table('users')->insert(['email' =>'DTC125D4802010071@ictu.edu.vn', 'username' => 'DTC125D4802010071','password' => bcrypt('DTC125D4802010071'),'type' => '3','name'=>'Dương Văn Dũng']);
        DB::table('users')->insert(['email' =>'DTC125D4802010007@ictu.edu.vn', 'username' => 'DTC125D4802010007','password' => bcrypt('DTC125D4802010007'),'type' => '3','name'=>'Lê Trung Dũng']);
        DB::table('users')->insert(['email' =>'DTC125D4801030070@ictu.edu.vn', 'username' => 'DTC125D4801030070','password' => bcrypt('DTC125D4801030070'),'type' => '3','name'=>'Nguyễn Mạnh Dũng']);
        DB::table('users')->insert(['email' =>'DTC125D4801030062@ictu.edu.vn', 'username' => 'DTC125D4801030062','password' => bcrypt('DTC125D4801030062'),'type' => '3','name'=>'Đặng Thái Duy']);
        DB::table('users')->insert(['email' =>'DTC125D4801040002@ictu.edu.vn', 'username' => 'DTC125D4801040002','password' => bcrypt('DTC125D4801040002'),'type' => '3','name'=>'Nguyễn Đức Đại']);
        DB::table('users')->insert(['email' =>'DTC125D4802010076@ictu.edu.vn', 'username' => 'DTC125D4802010076','password' => bcrypt('DTC125D4802010076'),'type' => '3','name'=>'Nguyễn Trung  Đức']);
        DB::table('users')->insert(['email' =>'DTC125D4801030012@ictu.edu.vn', 'username' => 'DTC125D4801030012','password' => bcrypt('DTC125D4801030012'),'type' => '3','name'=>'Hoàng Văn Đức']);
        DB::table('users')->insert(['email' =>'DTC125D4801030013@ictu.edu.vn', 'username' => 'DTC125D4801030013','password' => bcrypt('DTC125D4801030013'),'type' => '3','name'=>'Ma Quang Đức']);
        DB::table('users')->insert(['email' =>'DTC125D4802010075@ictu.edu.vn', 'username' => 'DTC125D4802010075','password' => bcrypt('DTC125D4802010075'),'type' => '3','name'=>'Nguyễn Lập Đức']);
        DB::table('users')->insert(['email' =>'DTC125D4802010010@ictu.edu.vn', 'username' => 'DTC125D4802010010','password' => bcrypt('DTC125D4802010010'),'type' => '3','name'=>'Nguyễn Thị Hà Giang']);
        DB::table('users')->insert(['email' =>'DTC125D4801030014@ictu.edu.vn', 'username' => 'DTC125D4801030014','password' => bcrypt('DTC125D4801030014'),'type' => '3','name'=>'Phạm Sỹ Giang']);
        DB::table('users')->insert(['email' =>'DTC125D3404050020@ictu.edu.vn', 'username' => 'DTC125D3404050020','password' => bcrypt('DTC125D3404050020'),'type' => '3','name'=>'Phạm Trường Giang']);
        DB::table('users')->insert(['email' =>'DTC125D4802010077@ictu.edu.vn', 'username' => 'DTC125D4802010077','password' => bcrypt('DTC125D4802010077'),'type' => '3','name'=>'Bùi Văn Giáp']);
        DB::table('users')->insert(['email' =>'DTC125D4802010078@ictu.edu.vn', 'username' => 'DTC125D4802010078','password' => bcrypt('DTC125D4802010078'),'type' => '3','name'=>'Vũ Ngọc Hà']);
        DB::table('users')->insert(['email' =>'DTC125D4801030015@ictu.edu.vn', 'username' => 'DTC125D4801030015','password' => bcrypt('DTC125D4801030015'),'type' => '3','name'=>'Ngô Văn Hải']);
        DB::table('users')->insert(['email' =>'DTC125D4801040004@ictu.edu.vn', 'username' => 'DTC125D4801040004','password' => bcrypt('DTC125D4801040004'),'type' => '3','name'=>'Nguyễn Ngọc Hải']);
        DB::table('users')->insert(['email' =>'DTC125D4801010003@ictu.edu.vn', 'username' => 'DTC125D4801010003','password' => bcrypt('DTC125D4801010003'),'type' => '3','name'=>'Phạm Đình Hải']);
        DB::table('users')->insert(['email' =>'DTC125D4802010183@ictu.edu.vn', 'username' => 'DTC125D4802010183','password' => bcrypt('DTC125D4802010183'),'type' => '3','name'=>'Vũ Tiến Hải']);
        DB::table('users')->insert(['email' =>'DTC125D4801030017@ictu.edu.vn', 'username' => 'DTC125D4801030017','password' => bcrypt('DTC125D4801030017'),'type' => '3','name'=>'Nguyễn Minh Hạnh']);
        DB::table('users')->insert(['email' =>'DTC125D4802010012@ictu.edu.vn', 'username' => 'DTC125D4802010012','password' => bcrypt('DTC125D4802010012'),'type' => '3','name'=>'Nguyễn Thị Hảo']);
        DB::table('users')->insert(['email' =>'DTC125D4802010079@ictu.edu.vn', 'username' => 'DTC125D4802010079','password' => bcrypt('DTC125D4802010079'),'type' => '3','name'=>'Phan Thu Hằng']);
        DB::table('users')->insert(['email' =>'DTC125D4802010081@ictu.edu.vn', 'username' => 'DTC125D4802010081','password' => bcrypt('DTC125D4802010081'),'type' => '3','name'=>'Trần Thị Thanh Hiền']);
        DB::table('users')->insert(['email' =>'DTC125D4802010181@ictu.edu.vn', 'username' => 'DTC125D4802010181','password' => bcrypt('DTC125D4802010181'),'type' => '3','name'=>'Nguyễn Trung Hiếu']);
        DB::table('users')->insert(['email' =>'DTC125D4801030018@ictu.edu.vn', 'username' => 'DTC125D4801030018','password' => bcrypt('DTC125D4801030018'),'type' => '3','name'=>'Tạ Văn Hiêú']);
        DB::table('users')->insert(['email' =>'DTC125D4801030065@ictu.edu.vn', 'username' => 'DTC125D4801030065','password' => bcrypt('DTC125D4801030065'),'type' => '3','name'=>'Lê Trung Hiếu']);
        DB::table('users')->insert(['email' =>'DTC125D4802010013@ictu.edu.vn', 'username' => 'DTC125D4802010013','password' => bcrypt('DTC125D4802010013'),'type' => '3','name'=>'Ma Trung Hiếu']);
        DB::table('users')->insert(['email' =>'DTC125D4802010082@ictu.edu.vn', 'username' => 'DTC125D4802010082','password' => bcrypt('DTC125D4802010082'),'type' => '3','name'=>'Nông Xuân Hinh']);
        DB::table('users')->insert(['email' =>'DTC14ND4802010151@ictu.edu.vn', 'username' => 'DTC14ND4802010151','password' => bcrypt('DTC14ND4802010151'),'type' => '3','name'=>'Nguyễn Thị Hoa']);
        DB::table('users')->insert(['email' =>'DTC125D4802010014@ictu.edu.vn', 'username' => 'DTC125D4802010014','password' => bcrypt('DTC125D4802010014'),'type' => '3','name'=>'Phạm Thị Hoa']);
        DB::table('users')->insert(['email' =>'DTC125D4801030020@ictu.edu.vn', 'username' => 'DTC125D4801030020','password' => bcrypt('DTC125D4801030020'),'type' => '3','name'=>'Nguyễn Huy Hoàng']);
        DB::table('users')->insert(['email' =>'DTC125D4802010168@ictu.edu.vn', 'username' => 'DTC125D4802010168','password' => bcrypt('DTC125D4802010168'),'type' => '3','name'=>'Tống Thị Huệ']);
        DB::table('users')->insert(['email' =>'DTC125D4802010084@ictu.edu.vn', 'username' => 'DTC125D4802010084','password' => bcrypt('DTC125D4802010084'),'type' => '3','name'=>'Nguyễn Lương Hùng']);
        DB::table('users')->insert(['email' =>'DTC125D4802010017@ictu.edu.vn', 'username' => 'DTC125D4802010017','password' => bcrypt('DTC125D4802010017'),'type' => '3','name'=>'Nguyễn Thế Hùng']);
        DB::table('users')->insert(['email' =>'DTC125D4802010018@ictu.edu.vn', 'username' => 'DTC125D4802010018','password' => bcrypt('DTC125D4802010018'),'type' => '3','name'=>'Trần Văn Hùng']);
        DB::table('users')->insert(['email' =>'DTC125D4802010019@ictu.edu.vn', 'username' => 'DTC125D4802010019','password' => bcrypt('DTC125D4802010019'),'type' => '3','name'=>'Vũ Thế  Hùng']);
        DB::table('users')->insert(['email' =>'DTC125D4801030083@ictu.edu.vn', 'username' => 'DTC125D4801030083','password' => bcrypt('DTC125D4801030083'),'type' => '3','name'=>'Nguyễn Văn Huy']);
        DB::table('users')->insert(['email' =>'DTC125D4802010088@ictu.edu.vn', 'username' => 'DTC125D4802010088','password' => bcrypt('DTC125D4802010088'),'type' => '3','name'=>'Trần Quang Huy']);
        DB::table('users')->insert(['email' =>'DTC125D4801030250@ictu.edu.vn', 'username' => 'DTC125D4801030250','password' => bcrypt('DTC125D4801030250'),'type' => '3','name'=>'Nguyễn Thanh Huyền']);
        DB::table('users')->insert(['email' =>'DTC125D5103022111@ictu.edu.vn', 'username' => 'DTC125D5103022111','password' => bcrypt('DTC125D5103022111'),'type' => '3','name'=>'Nguyễn Thị Thanh Huyền']);
        DB::table('users')->insert(['email' =>'DTC125D4802010089@ictu.edu.vn', 'username' => 'DTC125D4802010089','password' => bcrypt('DTC125D4802010089'),'type' => '3','name'=>'Ngô Văn Huynh']);
        DB::table('users')->insert(['email' =>'DTC125D4802010085@ictu.edu.vn', 'username' => 'DTC125D4802010085','password' => bcrypt('DTC125D4802010085'),'type' => '3','name'=>'Hà Quang Hưng']);
        DB::table('users')->insert(['email' =>'DTC125D4802010020@ictu.edu.vn', 'username' => 'DTC125D4802010020','password' => bcrypt('DTC125D4802010020'),'type' => '3','name'=>'Đặng Thị Hương']);
        DB::table('users')->insert(['email' =>'DTC125D4802010023@ictu.edu.vn', 'username' => 'DTC125D4802010023','password' => bcrypt('DTC125D4802010023'),'type' => '3','name'=>'Đỗ Văn  Khang']);
        DB::table('users')->insert(['email' =>'DTC125D4802010024@ictu.edu.vn', 'username' => 'DTC125D4802010024','password' => bcrypt('DTC125D4802010024'),'type' => '3','name'=>'Nguyễn Hữu  Khang']);
        DB::table('users')->insert(['email' =>'DTC125D4802010025@ictu.edu.vn', 'username' => 'DTC125D4802010025','password' => bcrypt('DTC125D4802010025'),'type' => '3','name'=>'Nguyễn Duy Khánh']);
        DB::table('users')->insert(['email' =>'DTC125D4802010150@ictu.edu.vn', 'username' => 'DTC125D4802010150','password' => bcrypt('DTC125D4802010150'),'type' => '3','name'=>'Nguyễn Văn  Khoa']);
        DB::table('users')->insert(['email' =>'DTC1051200389@ictu.edu.vn', 'username' => 'DTC1051200389','password' => bcrypt('DTC1051200389'),'type' => '3','name'=>'Trần Anh Khoa']);
        DB::table('users')->insert(['email' =>'DTC125D4802010026@ictu.edu.vn', 'username' => 'DTC125D4802010026','password' => bcrypt('DTC125D4802010026'),'type' => '3','name'=>'Trần Đăng Khoa']);
        DB::table('users')->insert(['email' =>'DTC125D4802010091@ictu.edu.vn', 'username' => 'DTC125D4802010091','password' => bcrypt('DTC125D4802010091'),'type' => '3','name'=>'Đinh Trọng Khôi']);
        DB::table('users')->insert(['email' =>'DTC125D4802010027@ictu.edu.vn', 'username' => 'DTC125D4802010027','password' => bcrypt('DTC125D4802010027'),'type' => '3','name'=>'Nguyễn Hữu  Kiên']);
        DB::table('users')->insert(['email' =>'DTC125D4802010212@ictu.edu.vn', 'username' => 'DTC125D4802010212','password' => bcrypt('DTC125D4802010212'),'type' => '3','name'=>'Nông Trung Kiên']);
        DB::table('users')->insert(['email' =>'DTC125D4802010028@ictu.edu.vn', 'username' => 'DTC125D4802010028','password' => bcrypt('DTC125D4802010028'),'type' => '3','name'=>'Đinh Trường Lam']);
        DB::table('users')->insert(['email' =>'DTC125D4802010092@ictu.edu.vn', 'username' => 'DTC125D4802010092','password' => bcrypt('DTC125D4802010092'),'type' => '3','name'=>'Triệu Thanh Lam']);
        DB::table('users')->insert(['email' =>'DTC125D4802010029@ictu.edu.vn', 'username' => 'DTC125D4802010029','password' => bcrypt('DTC125D4802010029'),'type' => '3','name'=>'Trần Thị Lan']);
        DB::table('users')->insert(['email' =>'DTC125D4802010185@ictu.edu.vn', 'username' => 'DTC125D4802010185','password' => bcrypt('DTC125D4802010185'),'type' => '3','name'=>'Nguyễn Thị Thúy Lành']);
        DB::table('users')->insert(['email' =>'DTC14ND4802010011@ictu.edu.vn', 'username' => 'DTC14ND4802010011','password' => bcrypt('DTC14ND4802010011'),'type' => '3','name'=>'Nguyễn Đức Lập']);
        DB::table('users')->insert(['email' =>'DTC125D4801030029@ictu.edu.vn', 'username' => 'DTC125D4801030029','password' => bcrypt('DTC125D4801030029'),'type' => '3','name'=>'Nguyễn Thị Vĩnh Linh']);
        DB::table('users')->insert(['email' =>'DTC125D4802010094@ictu.edu.vn', 'username' => 'DTC125D4802010094','password' => bcrypt('DTC125D4802010094'),'type' => '3','name'=>'Giáp Văn Lộc']);
        DB::table('users')->insert(['email' =>'DTC135D4802010018@ictu.edu.vn', 'username' => 'DTC135D4802010018','password' => bcrypt('DTC135D4802010018'),'type' => '3','name'=>'Đoàn Đức Mạnh']);
        DB::table('users')->insert(['email' =>'DTC125D4802010189@ictu.edu.vn', 'username' => 'DTC125D4802010189','password' => bcrypt('DTC125D4802010189'),'type' => '3','name'=>'Trương Văn Mạnh']);
        DB::table('users')->insert(['email' =>'DTC125D4802010096@ictu.edu.vn', 'username' => 'DTC125D4802010096','password' => bcrypt('DTC125D4802010096'),'type' => '3','name'=>'Từ Thị Mận']);
        DB::table('users')->insert(['email' =>'DTC125D4801030090@ictu.edu.vn', 'username' => 'DTC125D4801030090','password' => bcrypt('DTC125D4801030090'),'type' => '3','name'=>'Đoàn Thị Mừng']);
        DB::table('users')->insert(['email' =>'DTC125D4801030031@ictu.edu.vn', 'username' => 'DTC125D4801030031','password' => bcrypt('DTC125D4801030031'),'type' => '3','name'=>'Nguyễn Văn  Nam']);
        DB::table('users')->insert(['email' =>'DTC125D4802010032@ictu.edu.vn', 'username' => 'DTC125D4802010032','password' => bcrypt('DTC125D4802010032'),'type' => '3','name'=>'Triệu Bùi Nam']);
        DB::table('users')->insert(['email' =>'DTC125D4802010033@ictu.edu.vn', 'username' => 'DTC125D4802010033','password' => bcrypt('DTC125D4802010033'),'type' => '3','name'=>'Lê Trọng  Nghĩa']);
        DB::table('users')->insert(['email' =>'DTC125D4802010151@ictu.edu.vn', 'username' => 'DTC125D4802010151','password' => bcrypt('DTC125D4802010151'),'type' => '3','name'=>'Nguyễn Thị Ngoan']);
        DB::table('users')->insert(['email' =>'DTC125D4802010098@ictu.edu.vn', 'username' => 'DTC125D4802010098','password' => bcrypt('DTC125D4802010098'),'type' => '3','name'=>'Dương Thị Hồng Ngọc']);
        DB::table('users')->insert(['email' =>'DTC125D4801040250@ictu.edu.vn', 'username' => 'DTC125D4801040250','password' => bcrypt('DTC125D4801040250'),'type' => '3','name'=>'Dương Văn Nguyên']);
        DB::table('users')->insert(['email' =>'DTC125D4801010004@ictu.edu.vn', 'username' => 'DTC125D4801010004','password' => bcrypt('DTC125D4801010004'),'type' => '3','name'=>'Nguyễn Thị Thu Nguyên']);
        DB::table('users')->insert(['email' =>'DTC125D4802010099@ictu.edu.vn', 'username' => 'DTC125D4802010099','password' => bcrypt('DTC125D4802010099'),'type' => '3','name'=>'Đàm Thị Nguyệt']);
        DB::table('users')->insert(['email' =>'DTC14ND4802010153@ictu.edu.vn', 'username' => 'DTC14ND4802010153','password' => bcrypt('DTC14ND4802010153'),'type' => '3','name'=>'Nguyễn Văn Nhật']);
        DB::table('users')->insert(['email' =>'DTC125D4802010235@ictu.edu.vn', 'username' => 'DTC125D4802010235','password' => bcrypt('DTC125D4802010235'),'type' => '3','name'=>'Đồng Thị Nhung']);
        DB::table('users')->insert(['email' =>'DTC125D4802010036@ictu.edu.vn', 'username' => 'DTC125D4802010036','password' => bcrypt('DTC125D4802010036'),'type' => '3','name'=>'Trần Mạnh Ninh']);
        DB::table('users')->insert(['email' =>'DTC155D4802010309@ictu.edu.vn', 'username' => 'DTC155D4802010309','password' => bcrypt('DTC155D4802010309'),'type' => '3','name'=>'APHAYVONG Phonephukdee']);
        DB::table('users')->insert(['email' =>'DTC125D4802010192@ictu.edu.vn', 'username' => 'DTC125D4802010192','password' => bcrypt('DTC125D4802010192'),'type' => '3','name'=>'Đào Nghĩa Phương']);
        DB::table('users')->insert(['email' =>'DTC125D4802010102@ictu.edu.vn', 'username' => 'DTC125D4802010102','password' => bcrypt('DTC125D4802010102'),'type' => '3','name'=>'Đào Thị Anh Phương']);
        DB::table('users')->insert(['email' =>'DTC125D4801030033@ictu.edu.vn', 'username' => 'DTC125D4801030033','password' => bcrypt('DTC125D4801030033'),'type' => '3','name'=>'Phạm Văn Phương']);
        DB::table('users')->insert(['email' =>'DTC1151200642@ictu.edu.vn', 'username' => 'DTC1151200642','password' => bcrypt('DTC1151200642'),'type' => '3','name'=>'Lý Thái Quang']);
        DB::table('users')->insert(['email' =>'DTC125D4802010171@ictu.edu.vn', 'username' => 'DTC125D4802010171','password' => bcrypt('DTC125D4802010171'),'type' => '3','name'=>'Nguyễn Văn Quân']);
        DB::table('users')->insert(['email' =>'DTC125D4802010166@ictu.edu.vn', 'username' => 'DTC125D4802010166','password' => bcrypt('DTC125D4802010166'),'type' => '3','name'=>'Đoàn Văn Quốc']);
        DB::table('users')->insert(['email' =>'DTC125D4801030035@ictu.edu.vn', 'username' => 'DTC125D4801030035','password' => bcrypt('DTC125D4801030035'),'type' => '3','name'=>'Trần Thanh Quý']);
        DB::table('users')->insert(['email' =>'DTC125D4802010103@ictu.edu.vn', 'username' => 'DTC125D4802010103','password' => bcrypt('DTC125D4802010103'),'type' => '3','name'=>'Bùi Thị Quyên']);
        DB::table('users')->insert(['email' =>'DTC125D4802010039@ictu.edu.vn', 'username' => 'DTC125D4802010039','password' => bcrypt('DTC125D4802010039'),'type' => '3','name'=>'Lý Văn Quyền']);
        DB::table('users')->insert(['email' =>'DTC125D4802010106@ictu.edu.vn', 'username' => 'DTC125D4802010106','password' => bcrypt('DTC125D4802010106'),'type' => '3','name'=>'Quách Thái Sơn']);
        DB::table('users')->insert(['email' =>'DTC125D4802010107@ictu.edu.vn', 'username' => 'DTC125D4802010107','password' => bcrypt('DTC125D4802010107'),'type' => '3','name'=>'Trần Trung Sơn']);
        DB::table('users')->insert(['email' =>'DTC125D4802010043@ictu.edu.vn', 'username' => 'DTC125D4802010043','password' => bcrypt('DTC125D4802010043'),'type' => '3','name'=>'Ngô Xuân Tài']);
        DB::table('users')->insert(['email' =>'DTC125D4802010110@ictu.edu.vn', 'username' => 'DTC125D4802010110','password' => bcrypt('DTC125D4802010110'),'type' => '3','name'=>'Nguyễn Trọng Thành']);
        DB::table('users')->insert(['email' =>'DTC125D4802010046@ictu.edu.vn', 'username' => 'DTC125D4802010046','password' => bcrypt('DTC125D4802010046'),'type' => '3','name'=>'Nguyễn Thị Phương Thảo']);
        DB::table('users')->insert(['email' =>'DTC125D4802010047@ictu.edu.vn', 'username' => 'DTC125D4802010047','password' => bcrypt('DTC125D4802010047'),'type' => '3','name'=>'Trần Thu  Thảo']);
        DB::table('users')->insert(['email' =>'DTC125D4802010152@ictu.edu.vn', 'username' => 'DTC125D4802010152','password' => bcrypt('DTC125D4802010152'),'type' => '3','name'=>'Lê Tràng Thắng']);
        DB::table('users')->insert(['email' =>'DTC125D4802010044@ictu.edu.vn', 'username' => 'DTC125D4802010044','password' => bcrypt('DTC125D4802010044'),'type' => '3','name'=>'Nguyễn Quyết Thắng']);
        DB::table('users')->insert(['email' =>'DTC125D4802010236@ictu.edu.vn', 'username' => 'DTC125D4802010236','password' => bcrypt('DTC125D4802010236'),'type' => '3','name'=>'Vũ Ngọc Thiện']);
        DB::table('users')->insert(['email' =>'DTC125D4802010111@ictu.edu.vn', 'username' => 'DTC125D4802010111','password' => bcrypt('DTC125D4802010111'),'type' => '3','name'=>'Hoàng Văn Thiện']);
        DB::table('users')->insert(['email' =>'DTC125D4802010112@ictu.edu.vn', 'username' => 'DTC125D4802010112','password' => bcrypt('DTC125D4802010112'),'type' => '3','name'=>'Nguyễn Thị Thoa']);
        DB::table('users')->insert(['email' =>'DTC125D4802010238@ictu.edu.vn', 'username' => 'DTC125D4802010238','password' => bcrypt('DTC125D4802010238'),'type' => '3','name'=>'Nguyễn Văn Thông']);
        DB::table('users')->insert(['email' =>'DTC125D4802010239@ictu.edu.vn', 'username' => 'DTC125D4802010239','password' => bcrypt('DTC125D4802010239'),'type' => '3','name'=>'Phạm Thị Thu']);
        DB::table('users')->insert(['email' =>'DTC125D4802010048@ictu.edu.vn', 'username' => 'DTC125D4802010048','password' => bcrypt('DTC125D4802010048'),'type' => '3','name'=>'Nông Thị Thuý']);
        DB::table('users')->insert(['email' =>'DTC125D4801040011@ictu.edu.vn', 'username' => 'DTC125D4801040011','password' => bcrypt('DTC125D4801040011'),'type' => '3','name'=>'Lương Thị Thủy']);
        DB::table('users')->insert(['email' =>'DTC125D4802010113@ictu.edu.vn', 'username' => 'DTC125D4802010113','password' => bcrypt('DTC125D4802010113'),'type' => '3','name'=>'Hoàng Văn Thương']);
        DB::table('users')->insert(['email' =>'DTC125D4802010049@ictu.edu.vn', 'username' => 'DTC125D4802010049','password' => bcrypt('DTC125D4802010049'),'type' => '3','name'=>'Bàng Văn Tiến']);
        DB::table('users')->insert(['email' =>'DTC125D4802010114@ictu.edu.vn', 'username' => 'DTC125D4802010114','password' => bcrypt('DTC125D4802010114'),'type' => '3','name'=>'Nguyễn Quy Toàn']);
        DB::table('users')->insert(['email' =>'DTC125D4802010050@ictu.edu.vn', 'username' => 'DTC125D4802010050','password' => bcrypt('DTC125D4802010050'),'type' => '3','name'=>'Nguyễn Đình Toản']);
        DB::table('users')->insert(['email' =>'DTC125D4802010162@ictu.edu.vn', 'username' => 'DTC125D4802010162','password' => bcrypt('DTC125D4802010162'),'type' => '3','name'=>'Trần Xuân Tới']);
        DB::table('users')->insert(['email' =>'DTC125D4802010051@ictu.edu.vn', 'username' => 'DTC125D4802010051','password' => bcrypt('DTC125D4802010051'),'type' => '3','name'=>'Hoàng Thị Trang']);
        DB::table('users')->insert(['email' =>'DTC125D4802010115@ictu.edu.vn', 'username' => 'DTC125D4802010115','password' => bcrypt('DTC125D4802010115'),'type' => '3','name'=>'Phùng Huyền Trang']);
        DB::table('users')->insert(['email' =>'DTC125D4801040014@ictu.edu.vn', 'username' => 'DTC125D4801040014','password' => bcrypt('DTC125D4801040014'),'type' => '3','name'=>'Trần Thị Vân Trang']);
        DB::table('users')->insert(['email' =>'DTC125D4802010250@ictu.edu.vn', 'username' => 'DTC125D4802010250','password' => bcrypt('DTC125D4802010250'),'type' => '3','name'=>'Khuất Đình  Trọng']);
        DB::table('users')->insert(['email' =>'DTC125D4802010053@ictu.edu.vn', 'username' => 'DTC125D4802010053','password' => bcrypt('DTC125D4802010053'),'type' => '3','name'=>'Cao Văn Trung']);
        DB::table('users')->insert(['email' =>'DTC125D4801030045@ictu.edu.vn', 'username' => 'DTC125D4801030045','password' => bcrypt('DTC125D4801030045'),'type' => '3','name'=>'Hà Văn Trưởng']);
        DB::table('users')->insert(['email' =>'DTC125D4802010197@ictu.edu.vn', 'username' => 'DTC125D4802010197','password' => bcrypt('DTC125D4802010197'),'type' => '3','name'=>'Nguyễn Văn Tú']);
        DB::table('users')->insert(['email' =>'DTC125D4801030046@ictu.edu.vn', 'username' => 'DTC125D4801030046','password' => bcrypt('DTC125D4801030046'),'type' => '3','name'=>'Lương Văn Tuân']);
        DB::table('users')->insert(['email' =>'DTC125D4802010055@ictu.edu.vn', 'username' => 'DTC125D4802010055','password' => bcrypt('DTC125D4802010055'),'type' => '3','name'=>'Đàm Văn Tuấn']);
        DB::table('users')->insert(['email' =>'DTC125D4801030047@ictu.edu.vn', 'username' => 'DTC125D4801030047','password' => bcrypt('DTC125D4801030047'),'type' => '3','name'=>'Nguyễn Mạnh Tuấn']);
        DB::table('users')->insert(['email' =>'DTC125D4802010193@ictu.edu.vn', 'username' => 'DTC125D4802010193','password' => bcrypt('DTC125D4802010193'),'type' => '3','name'=>'Đào Thanh Tùng']);
        DB::table('users')->insert(['email' =>'DTC125D4802010057@ictu.edu.vn', 'username' => 'DTC125D4802010057','password' => bcrypt('DTC125D4802010057'),'type' => '3','name'=>'Nguyễn Quang Tùng']);
        DB::table('users')->insert(['email' =>'DTC125D4802010058@ictu.edu.vn', 'username' => 'DTC125D4802010058','password' => bcrypt('DTC125D4802010058'),'type' => '3','name'=>'Phạm Mạnh Tùng']);
        DB::table('users')->insert(['email' =>'DTC125D4801030049@ictu.edu.vn', 'username' => 'DTC125D4801030049','password' => bcrypt('DTC125D4801030049'),'type' => '3','name'=>'Phạm Văn Tùng']);
        DB::table('users')->insert(['email' =>'DTC125D4801030050@ictu.edu.vn', 'username' => 'DTC125D4801030050','password' => bcrypt('DTC125D4801030050'),'type' => '3','name'=>'Vũ Anh Tùng']);
        DB::table('users')->insert(['email' =>'DTC125D4801010010@ictu.edu.vn', 'username' => 'DTC125D4801010010','password' => bcrypt('DTC125D4801010010'),'type' => '3','name'=>'Vũ Thiện Tùng']);
        DB::table('users')->insert(['email' =>'DTC125D4802010060@ictu.edu.vn', 'username' => 'DTC125D4802010060','password' => bcrypt('DTC125D4802010060'),'type' => '3','name'=>'Hoàng Thị Thuý Tuyên']);
        DB::table('users')->insert(['email' =>'DTC125D4802010122@ictu.edu.vn', 'username' => 'DTC125D4802010122','password' => bcrypt('DTC125D4802010122'),'type' => '3','name'=>'Ninh Văn Tuyên']);
        DB::table('users')->insert(['email' =>'DTC125D4802010061@ictu.edu.vn', 'username' => 'DTC125D4802010061','password' => bcrypt('DTC125D4802010061'),'type' => '3','name'=>'Vũ Ngọc Tuyên']);
        DB::table('users')->insert(['email' =>'DTC125D4801030051@ictu.edu.vn', 'username' => 'DTC125D4801030051','password' => bcrypt('DTC125D4801030051'),'type' => '3','name'=>'Vũ Mạnh Tuyến']);
        DB::table('users')->insert(['email' =>'DTC125D4802010059@ictu.edu.vn', 'username' => 'DTC125D4802010059','password' => bcrypt('DTC125D4802010059'),'type' => '3','name'=>'Trần Thị Hồng Tươi']);
        DB::table('users')->insert(['email' =>'DTC125D4802010123@ictu.edu.vn', 'username' => 'DTC125D4802010123','password' => bcrypt('DTC125D4802010123'),'type' => '3','name'=>'Nguyễn Thị Vân']);
        DB::table('users')->insert(['email' =>'DTC125D4801010006@ictu.edu.vn', 'username' => 'DTC125D4801010006','password' => bcrypt('DTC125D4801010006'),'type' => '3','name'=>'Đinh Hữu Vĩ']);
        DB::table('users')->insert(['email' =>'DTC125D4802010241@ictu.edu.vn', 'username' => 'DTC125D4802010241','password' => bcrypt('DTC125D4802010241'),'type' => '3','name'=>'Lại Đức Việt']);
        DB::table('users')->insert(['email' =>'DTC125D4802010196@ictu.edu.vn', 'username' => 'DTC125D4802010196','password' => bcrypt('DTC125D4802010196'),'type' => '3','name'=>'Phạm Bá Việt']);
        DB::table('users')->insert(['email' =>'DTC125D4802010199@ictu.edu.vn', 'username' => 'DTC125D4802010199','password' => bcrypt('DTC125D4802010199'),'type' => '3','name'=>'Cao Thị Xuân']);
        DB::table('users')->insert(['email' =>'DTC125D4801030080@ictu.edu.vn', 'username' => 'DTC125D4801030080','password' => bcrypt('DTC125D4801030080'),'type' => '3','name'=>'Bùi Thị Xuyến']);
        DB::table('users')->insert(['email' =>'DTC125D4802010242@ictu.edu.vn', 'username' => 'DTC125D4802010242','password' => bcrypt('DTC125D4802010242'),'type' => '3','name'=>'Nguyễn Hải Yến']);
        DB::table('users')->insert(['email' =>'DTC125D4802010234@ictu.edu.vn', 'username' => 'DTC125D4802010234','password' => bcrypt('DTC125D4802010234'),'type' => '3','name'=>'Nguyễn Thị Yến']);
        DB::table('users')->insert(['email' =>'DTC1151200663@ictu.edu.vn', 'username' => 'DTC1151200663','password' => bcrypt('DTC1151200663'),'type' => '3','name'=>'Phạm Hải Yến']);

        return redirect()->back();


    }

}
