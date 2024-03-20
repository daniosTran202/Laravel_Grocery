<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
       public function index(Request $req )
        {
            $blogs = Blog::orderBy('created_at' , 'DESC')->paginate(4);
            if($req->keyword){
                $key = $req->keyword;
                $blogs = Blog::where('name' ,'LIKE', '%'.$key.'%')->paginate(4);
            }
            return view('admin.blog.index', compact('blogs')); 

        } 

        public function create(){
            return view('admin.blog.create');
        }

        
        /**
         * Phương thức store để nhận và lưu dữ liệu vào bảng
         */
        public function store(Request $request){
            $rules= [
                'name' => 'required|max:150|unique:blog',
                'summary' => 'required',
                'description' => 'required',
                'file_upload' => 'required| mimes:jpg,gif,png',
                'status' => 'required '
            ];
            $messages = [
                'name.required' => 'Blog name required',
                'name.unique' => 'Blog Name is unique',
                'name.max' => 'Blog name do not over 150 characters',
                'summary.required' => 'Summary required',
                'description.required' => 'Description required',
                'file_upload.required' =>'Image required',
                'file_upload.mimes' =>'Blog File Upload must be jpg,gif,png',
                'status.required' =>'Status required',
                

            ];
            $request->validate($rules,$messages);

            if($request-> has('file_upload')){
                $file = $request->file_upload;
                $ext = $request->file_upload->extension();
                $file_name = time().'-'.'blog.'. $ext; 
                $file-> move(public_path('uploads'),$file_name);
                $request->merge(['image' => $file_name]);
             }
            
            // dd($request->all());
            if( $blog = Blog::create($request->all())){
                // if($request->has('file_uploads')){
                //     foreach($request->file_uploads as $key =>  $file_ul){
                        
                //         $ext = $file_ul->extension();
                //         $file_name = time().$key.'-'.'product.'. $ext; 
                        
                //         ProductImage::create([
                //             'name' => $file_name,
                //             'image' => $file_name,
                //             'product_id' => $product->id,
                //         ]);
                //         $file_ul-> move(public_path('uploads'),$file_name);
                //     }
                // }
                return redirect()->route('blog.index')->with('yes','Add Bog Successfully');
            }else{
                return redirect()->back()->with('no','Add Blog Failure');
            }
            
             // chuyển hướng về danh sách
        }

        public function delete($id){
            Blog::where('id',$id)->delete(); // return true, false
            return redirect()->route('blog.index')->with('yes','SoftDelete Successfully '); // chuyển hướng về danh sách
        }
        

        /** phương thức edit hiển thị dữ liệu trên form theo id */
        public function edit($id){
            /** SELECT * FROM categories WHERE id = $id */
            $blog = Blog::find($id); 
            /** Gửi dữ liệu qua form edit.blade.php*/
            return view('admin.blog.edit',compact('blog'));
        }


        /** Phương thức update để nhận và lưu dữ liệu vào bảng */
        public function update($id,Request $request){
            $blog = Blog::find($id);
            $rules = [
              'name' => 'required|max:150',
                'summary' => 'required',
                'description' => 'required',
                'file_upload' => 'mimes:jpg,gif,png',
                'status' => 'required '
            ];
            $messages = [
                'name.required' => 'Blog name required',
                'name.max' => 'Blog name do not over 150 characters',
                'summary.required' => 'Summary required',
                'description.required' => 'Description required',
                'price.numeric' => 'Price must be a number',
                'file_upload.required' =>'CategoryId required',
                'file_upload.mimes' =>'Blog File Upload must be jpg,gif,png',
                'status.required' =>'Status required',
            ];
            $request->validate($rules,$messages);

            if($request-> has('file_upload')){
                $file = $request->file_upload;
                $ext = $request->file_upload->extension();
                $file_name = time().'-'.'blog.'. $ext; 
                $file-> move(public_path('uploads'),$file_name);
                $request->merge(['image' =>$file_name]);
             }
             
            $data = $request->only('name','image','summary','description','status');
            if($check_update = $blog->update($data)){
               
                return redirect()->route('blog.index')->with('yes','Update Blog Successful !' ); // chuyển hướng về danh sách
            }else{
                return redirect()->back()->with('no','Update Blog Failed !');
            }
            
        }

        public function trashed()
        {
            $blogs = Blog::onlyTrashed()->paginate(3);
            return view('admin.blog.trash',compact('blogs'));
        }

        public function restore($id)
        {
            $blog = Blog::withTrashed()->find($id);
            $blog->restore();
            return redirect()->back()->with('yes', 'Restore Successfully !');
        }

        public function forcedelete($id)
        {
            $blog = Blog::withTrashed()->find($id);
            $blog->forcedelete();
            return redirect()->back()->with('yes', 'Permanent delete Successfully !');
            
        }

}
