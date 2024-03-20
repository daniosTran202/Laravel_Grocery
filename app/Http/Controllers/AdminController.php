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
            request()->validate([
                'email' => 'required|email|exists:users',
                'password' => 'required'
            ]);
            $data = $req ->only('email', 'password');
            // $check_login = Auth::attempt($data , $req -> has('remember'));
            if(auth()->attempt($data)){
                return redirect()->route('admin.index')->with('yes','Welcome to Admin . Let get started !');
            }else{
                return redirect()->back()->with('no','Email or password is not invalid !');
            }
               
        }

        public function register()
        {
            
            return view('admin.register');
            
        }

        public function check_register(Request $req)
        {
            request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'confirm_password' => 'required:same:password ',
            ]);
            $data = request()->all('name','email');
            $data['password'] = bcrypt($req->password);
            if(User::create($data)){
                return redirect()->route('admin.login');
            }else{
                return redirect()->back();
            }
               
        }

        public function logout()
        {
            Auth::logout();
            return redirect()->route('admin.login')->with('no', 'Logout Successfully !');
        }

    }
 ?>

