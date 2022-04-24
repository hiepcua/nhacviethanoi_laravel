<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Configsite;
use App\Models\Mnuitems;
use App\Models\Product;
use App\Models\Product_group;
use App\Models\Product_type;
use App\Models\Categories;
use App\Models\Slide;
use App\Models\Content;

class HomeController extends Controller
{
    private $config;
    private $menuitem;
    private $product;
    private $product_group;
    private $product_type;
    private $categories;
    private $slide;
    private $content;

    public function __construct(){
        $this->config = new Configsite();
        $this->menuitem = new Mnuitems();
        $this->product = new Product();
        $this->product_group = new Product_group();
        $this->product_type = new Product_type();
        $this->categories = new Categories();
        $this->slide = new Slide();
        $this->content = new Content();
    }

    public function index(Request $request){
        $web_config = $this->config->get();
        $web_config->url = $request->url();
        $menu_top = $this->menuitem->getByMenuId(3);

        $product_all = $this->product->getAll();
        $product_sale = $this->product->getProductSale(0, 10);
        $product_mega_menu = $this->product_group->getMenuProduct();
        $product_group_all = $this->product_group->getAll();
        $product_type_all = $this->product_type->getAll();

        $categories = $this->categories->get();
        $slide = $this->slide->getAll();

        $arr_product_group = array();
        foreach ($product_all as $key => $value) {
            $group_id = $value->group_id;
            $arr_product_group[$group_id][] = $value;
        }

        $content_hot = $this->content->getHot();

        return view('clients.home', compact('content_hot','web_config','menu_top','product_group_all','product_type_all','categories','slide','product_all','product_sale','arr_product_group'));
    }
}
