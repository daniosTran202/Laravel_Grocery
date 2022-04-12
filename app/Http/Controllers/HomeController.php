<?php 
    namespace App\Http\Controllers; 
    use Illuminate\Http\Request;
    use App\Models\Product; 
    use App\Models\Category; 
    use App\Models\Cart;

    class HomeController extends Controller
    {
        public function home(Request $req, Cart $cart)
        {
            $pros = Product::orderBy('id' , 'desc')->paginate(4);
            $cats = Category::orderBy('name','ASC')->select('id','name')->get();
            if($req->search){
                $key = $req->search;
                $pros = Product::where('name' ,'LIKE', '%'.$key.'%')->paginate(4);
            }
            return view('client.home', compact('pros', 'cats','cart'));
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

        public function shop_detail($id , $slug,Cart $cart)
        {
            $product = Product::find($id);
            return view('client.shop_detail',compact('product','cart'));
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
    }
 ?>

