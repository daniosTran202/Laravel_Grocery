<?php 
    namespace App\Http\Controllers; // thư mục chứa file controller

    use App\Models\Category; //gọi model category vào để truy vấn dữ liệu
    use  Illuminate\Http\Request;
    use App\Http\Requests\Category\CategoryUpdateRequest;

    class CategoryController extends Controller // kế thừa Controller gốc của Laravel
    {
        public function index()
        {

            $cats = Category::search()->paginate(3);
            return view('admin.category.index', compact('cats')); // gửi biến cats qua view

        } 

        public function create(){
            return view('admin.category.create');
        }
        
        /**
         * Phương thức store để nhận và lưu dữ liệu vào bảng
         */
        public function store(Request $request){
            $rules= [
                'name' => 'required|unique:categories|max:30',
                'status' => 'required|'
            ];
            $messages = [
                'name.required' => 'Tên danh mục không được để trống',
                'name.max' => 'Tên danh mục không được  quá 30 ký tự',
                'name.unique' => 'Tên danh mục đã được sử dụng',
                'status.required' => 'Vui lòng chọn trạng thái danh mục'

            ];
            $request->validate($rules,$messages);

            // $request->all() lấy dữ liệu từ form giống với $_POST
            //Category::create(); // như lệnh INSERT INTO category
            if( Category::create($request->all())){
                return redirect()->route('category.index')->with('yes', 'Add Is Success  😊'); 
            }else{
                return redirect()->back()->with('no', 'Add Is Failed😥');
            }
            
          // chuyển hướng về danh sách
        }

        public function delete($id){
            $cat = Category::find($id);
            if($cat->prods->count() == 0 && $cat->delete()){
                return redirect()->route('category.index')->with('yes', 'Delete successful , move into trash  😊');
            }else{
                return redirect()->back()->with('no', 'Delete is failed 😥');
            }
            // return true, false
             // chuyển hướng về danh sách
        }
        

        /** phương thức edit hiển thị dữ liệu trên form theo id */
        public function edit($id){
            /** SELECT * FROM categories WHERE id = $id */
            $cat = Category::find($id); 
            /** Gửi dữ liệu qua form edit.blade.php*/
            return view('admin.category.edit',compact('cat'));
        }
        /** Phương thức update để nhận và lưu dữ liệu vào bảng */
        public function update($id,CategoryUpdateRequest $req){
            // $request->validate($rules,$messages);
            // Category::where('id',$id)->update($request->only('name','status'));
            // return redirect()->route('category.index'); // chuyển hướng về danh sách
            $cat = Category::find($id); 
            if(Category::catUpdate($id)){
                return redirect()->route('category.index')->with('yes', 'Update is Success 😊'); // chuyển hướng về danh sách
            }else{
                return redirect()->back()->with('no', 'Update is Failed  😥');
            }
        }

        public function trashed()
        {
            $cats = Category::onlyTrashed()->search()->paginate(3);
            return view('admin.category.trashed',compact('cats'));
        }

        public function restore($id)
        {
            $cat = Category::withTrashed()->find($id);
            $cat->restore();
            return redirect()->back()->with('yes', 'Restore is Successfully 😊');
        }

        public function forcedelete($id)
        {
            $cat = Category::withTrashed()->find($id);
            $cat->forcedelete();
            return redirect()->back()->with('yes', 'Delete Permanent is Successfully 😊');
            
        }

    }

?> 