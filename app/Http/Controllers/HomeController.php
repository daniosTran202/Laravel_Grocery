<?php 
    namespace App\Http\Controllers; 
    use Illuminate\Http\Request;
    use App\Models\Product; 
    use App\Models\Category; 
    use App\Models\Cart;
    use App\Models\Blog;
    use App\Models\Comment;
    use App\Models\Customer;

    class HomeController extends Controller
    {
        public function home(Request $req, Cart $cart)
        {
            $blogs = Blog::orderBy('id', 'DESC')->paginate(3); 
            $pros = Product::orderBy('id' , 'DESC')->paginate(4);
            $cats = Category::orderBy('name','ASC')->select('id','name')->get();
            if($req->search){
                $key = $req->search;
                $pros = Product::where('name' ,'LIKE', '%'.$key.'%')->paginate(4);
            }
            return view('client.home', compact('pros', 'cats','cart','blogs'));
        } 


        public function about(Cart $cart)
        {
            return view('client.about',compact('cart'));
        }


        public function contact(Cart $cart)
        {
            return view('client.contact',compact('cart'));
        }


        public function shop(Request $req,Cart $cart)
        {
            
            $pros = Product::orderBy('id' , 'desc')->paginate(9);
            $cats = Category::orderBy('name','ASC')->select('id','name')->get();
            if($req->search){
                $key = $req->search;
                $pros = Product::where('name' ,'LIKE', '%'.$key.'%')->paginate(5);
            }
            return view('client.shop', compact('pros', 'cats','cart'));
        }


        public function gallery(Cart $cart)
        {
            return view('client.gallery',compact('cart'));
        }


        public function check_out(Cart $cart)
        {
            return view('client.check_out',compact('cart'));
        }

        
        public function cart(Cart $cart)
        {
            return view('client.cart',compact('cart'));
        }

       

        public function category($id , $slug,Cart $cart)
        {
            $cat = Category::find($id);
            $pros = $cat->prods()->paginate(9);
            $cats = Category::orderBy('name','ASC')->select('id','name')->get();
            return view('client.shop',compact('pros', 'cats', 'cat','cart'));
        }

        public function search($id , $slug,Cart $cart)
        {
            $product = Product::find($id);
            return view('client.home',compact('product','cart'));
        }

        public function shop_detail($id, Cart $cart)
        {
            $product = Product::find($id);
            $comments = Comment::where('product_id', $product->id)->orderBy('id', 'DESC')->get();
            return view('client.shop_detail', compact('product', 'cart', 'comments'));
        }


         public function post_comment($proId)
        {

            $rules= [
                'comment' => 'required|max:500',
                
            ];
            $messages = [
                'comment.required' => 'Comment required !',
                'comment.max' => 'Comment limit 500 characters !',
            ];
            request()->validate($rules,$messages);
            
            $data = request()->all('comment'); 
            $data['product_id'] = $proId;
            $data['customer_id'] = auth('cus')->id();
            if(Comment::create($data)){
                return redirect()->back()->with('yes','You have posted a new comment');
            }
            return redirect()->back();
        }
    }
 ?>

