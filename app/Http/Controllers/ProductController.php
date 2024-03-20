<?php 
    namespace App\Http\Controllers; 

    use App\Models\Product; 
    use App\Models\Category; 
    use App\Models\ProductImage; 
    use  Illuminate\Http\Request;

    class ProductController extends Controller 
    {
        public function index(Request $req )
        {

            $pros = Product::orderBy('price' , 'DESC')->paginate(4);
            $cats = Category::orderBy('name','ASC')->select('id','name')->get();
            if($req->keyword){
                $key = $req->keyword;
                $pros = Product::where('name' ,'LIKE', '%'.$key.'%')->paginate(4);
            }
            return view('admin.product.index', compact('pros','cats')); 

        } 

        public function create(){
            $cats = Category::orderBy('name','ASC')->select('id','name')->get();
            return view('admin.product.create',compact('cats'));
        }

        
        /**
         * Phương thức store để nhận và lưu dữ liệu vào bảng
         */
        public function store(Request $request){
            $rules= [
                'name' => 'required|max:150|unique:products',
                'price' => 'required|numeric|min:10|max:100|',
                'sale_price' => 'required|numeric|min:2|lt:price',
                'description' => 'required|',
                'category_id' =>'required',
                'file_upload' => 'required| mimes:jpg,gif,png',
                'status' => 'required '
            ];
            $messages = [
                'name.required' => 'ProductName required',
                'name.unique' => 'ProductName is unique',
                'name.max' => 'ProductName do not over 150 characters',
                'price.required' => 'Price required',
                'description.required' => 'Description required',
                'price.numeric' => 'Price must be a number',
                'category_id.required' =>'CategoryId required',
                'file_upload.mimes' =>'ProductFile Upload must be jpg,gif,png'


            ];
            $request->validate($rules,$messages);

            if($request-> has('file_upload')){
                $file = $request->file_upload;
                $ext = $request->file_upload->extension();
                $file_name = time().'-'.'product.'. $ext; 
                $file-> move(public_path('uploads'),$file_name);
                $request->merge(['image' => $file_name]);
             }
            
            // dd($request->all());
            if( $product = Product::create($request->all())){
                if($request->has('file_uploads')){
                    foreach($request->file_uploads as $key =>  $file_ul){
                        
                        $ext = $file_ul->extension();
                        $file_name = time().$key.'-'.'product.'. $ext; 
                        
                        ProductImage::create([
                            'name' => $file_name,
                            'image' => $file_name,
                            'product_id' => $product->id,
                        ]);
                        $file_ul-> move(public_path('uploads'),$file_name);
                    }
                }
                return redirect()->route('product.index')->with('yes','Add Product is Successfully');
            }else{
                return redirect()->back()->with('no','Add Product is Failure');
            }
            
             // chuyển hướng về danh sách
        }

        public function delete($id){
            Product::where('id',$id)->delete(); // return true, false
            return redirect()->route('product.index')->with('yes','SoftDelete Successfully '); // chuyển hướng về danh sách
        }
        

        /** phương thức edit hiển thị dữ liệu trên form theo id */
        public function edit($id){
            /** SELECT * FROM categories WHERE id = $id */
            $pro = Product::find($id); 
            /** Gửi dữ liệu qua form edit.blade.php*/
            $cats = Category::orderBy('name','ASC')->select('id','name')->get();
            $images = ProductImage::where('product_id',$pro->id)->get();
            return view('admin.product.edit',compact('pro','cats','images'));
        }
        /** Phương thức update để nhận và lưu dữ liệu vào bảng */
        public function update($id,Request $request){
            $product = Product::find($id);
            $rules = [
                'name' => 'required|max:150',
                'price' => 'required|numeric|min:5|max: 100',
                'sale_price' => 'required|numeric|min:2|lt:price',
                'description' => 'required|',
                'category_id' =>'required',
                'file_upload' => 'mimes:jpg,gif,png',
                'status' => 'required '
            ];
            $messages = [
                'name.required' => 'ProductName required',
                'name.max' => 'ProductName max 150 characters',
                'price.required' => 'Price required',
                'price.required' => 'Description required',
                'file_upload.mimes' =>'File Upload must be jpg,gif,png'
            ];
            $request->validate($rules,$messages);

            if($request-> has('file_upload')){
                $file = $request->file_upload;
                $ext = $request->file_upload->extension();
                $file_name = time().'-'.'product.'. $ext; 
                $file-> move(public_path('uploads'),$file_name);
                $request->merge(['image' =>$file_name]);
             }
             
            $data = $request->only('name','price','category_id','status','image','sale_price','description');
            if($check_update = $product->update($data)){
               
                if($request->has('file_uploads')){
                    foreach($request->file_uploads as $key =>  $file_ul){
                        
                        $ext = $file_ul->extension();
                        $file_name = time().$key.'-'.'product.'. $ext; 
                        
                        ProductImage::create([
                            'name' => $file_name,
                            'image' => $file_name,
                            'product_id' => $product->id
                        ]);
                        $file_ul-> move(public_path('uploads'),$file_name);
                    }
                }
               
                return redirect()->route('product.index')->with('yes','Update Product Successful !' ); // chuyển hướng về danh sách
            }else{
                return redirect()->back()->with('no','Update Product Failed !');
            }
            
        }

        public function trashed()
        {
            $cats = Category::orderBy('name','ASC')->select('id','name')->get();
            $pros = Product::onlyTrashed()->paginate(3);
            return view('admin.product.trash',compact('pros','cats'));
        }

        public function restore($id)
        {
            $pro = Product::withTrashed()->find($id);
            $pro->restore();
            return redirect()->back()->with('yes', 'Restore Successfully !');
        }

        public function forcedelete($id)
        {
            $pro = Product::withTrashed()->find($id);
            $pro->forcedelete();
            return redirect()->back()->with('yes', 'Permanent delete Successfully !');
            
        }

        public function deleteImage($id) 
        {
            ProductImage::where('id', $id)->delete();
            return redirect()->back()->with('yes', 'Delete successfully');
        }
    }

?> 