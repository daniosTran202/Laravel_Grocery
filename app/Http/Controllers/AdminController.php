<?php 

    namespace App\Http\Controllers;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use App\Http\Requests;
    use App\Models\User;
    use Auth;

    class AdminController extends Controller
    {
        public function index()
        {
            return view('admin.index');
        }
        
        public function login()
        {
            
            return view('admin.login');
            
        }

        public function check_login(Request $req)
        {
            $data = $req ->only('email', 'password');
            $check_login = Auth::attempt($data , $req -> has('remember'));
            if($check_login){
                return redirect()->route('admin.index')->with('yes','Chào mừng quản trị viên đến trang đăng nhập');
            }else{
                return redirect()->back()->with('no','Email hoặc mật khẩu không chính xác !');
            }
               
        }

        public function logout()
        {
            Auth::logout();
            return redirect()->route('admin.login')->with('yes', 'Bạn đã đăng xuất ');
        }

    }
 ?>

