<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Requests;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Brand;
use App\Models\Unit;
use App\Models\Size;
use App\Models\Color;
use App\Models\Review;
use DB;

class HomeController extends Controller
{
    public function index(){
        $categories=Category::all();
        $subcategories=SubCategory::all();
        $brands=Brand::all();
        $units=Unit::all();
        $sizes=Size::all();
        $colors=Color::all();
        $products=Product::where('status',1)->latest()->limit(12)->get();

        $top_sales = DB::table('products')
            ->leftJoin('order_details','products.id','=','order_details.product_id')
            ->selectRaw('products.id, SUM(order_details.product_sales_quantity) as total')
            ->groupBy('products.id')
            ->orderBy('total','desc')
            ->take(8)
            ->get();
        $topProducts = [];
        foreach ($top_sales as $s){
            $p = Product::findOrFail($s->id);
            $p->totalQty = $s->total;
            $topProducts[] = $p;
        }

        return view('frontend.welcome',compact('categories','subcategories','brands','units','sizes','colors','products','topProducts'));
    }
    public function view_details($id){
        $categories=Category::all();
        $subcategories=SubCategory::all();
        $brands=Brand::all();
        $units=Unit::all();
        $product=Product::findorFail($id);
        $sizes=Size::find($product->size_id);
        $colors=Color::find($product->color_id);
        $cat_id=$product->cat_id;
        $related_products=Product::where('cat_id',$cat_id)->limit(4)->get();
        $reviews = Review::where('product_id', $id)->get();
        return view('frontend.pages.view_details',compact('categories', 'reviews','subcategories','brands','units','sizes','colors','product','related_products'));
    }
    public function product_by_cat($id){
        $categories=Category::all();
        $subcategories=SubCategory::all();
        $brands=Brand::all();
        $products=Product::where('status',1)->where('cat_id',$id)->limit(12)->get();
        return view('frontend.pages.product_by_cat',compact('categories','subcategories','brands','products'));
    }
    public function product_by_subcat($id){
        $categories=Category::all();
        $subcategories=SubCategory::all();
        $brands=Brand::all();
        $products=Product::where('status',1)->where('subcat_id',$id)->limit(12)->get();
        return view('frontend.pages.product_by_subcat',compact('categories','subcategories','brands','products'));
    }
    public function product_by_brand($id){
        $categories=Category::all();
        $subcategories=SubCategory::all();
        $brands=Brand::all();
        $products=Product::where('status',1)->where('br_id',$id)->limit(12)->get();
        return view('frontend.pages.product_by_brand',compact('categories','subcategories','brands','products'));
    }
    public function search(Request $request){
        $products= Product::where('name','LIKE',"%$request->product%");
  
        if($request->category !="all") $products->where('cat_id',$request->category);
        $products=$products->get();
        $categories=Category::all();
        $subcategories=SubCategory::all();
        $brands=Brand::all();
        return view('frontend.pages.product_by_cat',compact('categories','subcategories','brands','products'));
    }
}
