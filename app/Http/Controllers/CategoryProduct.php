<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class CategoryProduct extends Controller
{
    public function add_category_product(){
    	return view('admin.add_category_product');
    }
    public function list_category_product(){
    	$list_category_product = DB::table('db_product')->get();
    	$manager_category_product = view('admin.list_category_product')->with('list_category_product',$list_category_product);
    	return view('admin_layout')->with('admin.list_category_product',$manager_category_product);
    }
    public function save_category_product(Request $Request)
    {
    	$data = array();
    	$data['name'] = $Request->category_product_name;
    	$data['giatruoc'] = $Request->category_product_price;
    	$data['giasau'] = $Request->category_product_discount;
    	$data['thongtin'] = $Request->category_product_desc;
    	$data['hienthi'] = $Request->category_product_status;

    	DB::table('db_product')->insert($data);
    	session::put('message','Thêm sản phẩm thành công');
    	return Redirect::to('add-category-product');
    }
    public function unactive_category_product($product_id)
    {
    	DB::table('db_product')->where('product_id',$product_id)->update(['hienthi'=>0]);
    	Session::put('message','Ẩn sản phẩm thành công');
    	return Redirect::to('list-category-product');
    }
    public function active_category_product($product_id)
    {
    	DB::table('db_product')->where('product_id',$product_id)->update(['hienthi'=>1]);
    	Session::put('message','Hiện sản phẩm thành công');
    	return Redirect::to('list-category-product');
    }
    public function edit_category_product($product_id)
    {
    	$edit_category_product = DB::table('db_product')->where('product_id',$product_id)->get();
    	$manager_category_product = view('admin.edit_category_product')->with('edit_category_product',$edit_category_product);
    	return view('admin_layout')->with('admin.edit_category_product',$manager_category_product);
    }
    public function update_category_product(Request $Request,$product_id)
    {
    	$data = array();
    	$data['name'] = $Request->category_product_name;
    	$data['giatruoc'] = $Request->category_product_price;
    	$data['giasau'] = $Request->category_product_discount;
    	$data['thongtin'] = $Request->category_product_desc;
    	// $data['hienthi'] = $Request->category_product_status;

    	DB::table('db_product')->where('product_id',$product_id)->update($data);
    	session::put('message','Cập nhật sản phẩm thành công');
    	return Redirect::to('list-category-product');

    }
}
