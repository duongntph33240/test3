<?php
namespace App\Controllers;
use App\Models\Product;
class ProductController extends BaseController{
    public $product;
    public function __construct()
    {
        $this->product = new Product();
    }
    public function listProduct(){
        $products = $this->product->getProduct();
        $title  = "list product";
        return $this->render('product.list',compact('title','products'));
    }
    public function addProduct(){
        $title  = "add product";
        return $this->render('product.add',compact('title'));
    }
    public function postProduct(){
        $title  = "list product";
        if ($_SERVER['REQUEST_METHOD'] == "POST"){
            $error = [];
            if (empty($_POST['ten_sp'])){
                $error[] = "Tên sản phẩm không được để trống";
            }
            if (empty($_POST['gia'])){
                $error[] = "Giá sản phẩm không được để trống";
            }
            if (count($error)>0){
                flash('error',$error,'add-product');
            }else{
                $result = $this->product->addProduct(null,$_POST['ten_sp'],$_POST['gia']);
                if ($result){
                    flash('success','Thêm thành công','list-product');
                }
            }
        }
    }
    public function deleteProduct($id){
        $title  = "list product";
        $this->product->deleteProduct($id);
        $products = $this->product->getProduct();
        return $this->render('product.list',compact('title','products'));
    }
    public function detailProduct($id){
        $title = "update product";
        $product = $this->product->getDetailProduct($id);
        return $this->render('product.update',compact('title','product'));
    }
    public function postUpdateProduct($id){
        $title = "list product";
        if ($_SERVER['REQUEST_METHOD'] == "POST"){
            $error = [];
            if (empty($_POST['ten_sp'])){
                $error[] = "Tên sản phẩm không được để trống";
            }
            if (empty($_POST['gia'])){
                $error[] = "Giá sản phẩm không được để trống";
            }
            if (count($error)>0){
                flash('error',$error,'update-product');
            }else{
                $result = $this->product->updateProduct($id,$_POST['ten_sp'],$_POST['gia']);
                if ($result){
                    flash('success','Sửa thành công','list-product');
                }
            }
        }
    }
}