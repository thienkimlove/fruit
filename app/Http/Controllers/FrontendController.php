<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Setting;

class FrontendController extends Controller
{
    protected $settings;
    protected $categories;

    public function __construct()
    {
        $this->settings = Setting::lists('value', 'name');
        $this->categories = Category::all();
    }

    protected function _buildMeta($records, $setting)
    {
        if (!empty($records->title)) {
            $setting = preg_replace('/\$TITLE\$/', $records->title, $setting);
        }
        if (!empty($records->desc)) {
            $setting = preg_replace('/\$DESC\$/', $records->desc, $setting);
        }
        return $setting;
    }

    public function index()
    {
       $slideProducts = Post::where('home_slide', true)->latest()->take(3)->get();
       return view('frontend.index', compact('slideProducts'))->with([
           'meta_title' => $this->settings['index_meta_title'],
           'meta_desc' => $this->settings['index_meta_desc'],
           'meta_keyword' => $this->settings['index_meta_keyword'],
           'categories' => $this->categories
       ]);
    }
    public function category($slug)
    {
        $category  = Category::findBySlug($slug);
        $products = Post::where('category_id', $category->id)->paginate(5);
        return view('frontend.category', compact('category', 'products'))->with([
            'meta_title' => $this->_buildMeta($category, $this->settings['category_meta_title']),
            'meta_desc' => $this->_buildMeta($category, $this->settings['category_meta_desc']),
            'meta_keyword' => $this->_buildMeta($category, $this->settings['category_meta_keyword']),
            'categories' => $this->categories
        ]);
    }
    public function details($slug)
    {
       $post = Post::findBySlug($slug);
       $related = Post::where('id', '!=', $post->id)->where('category_id', $post->category->id)->latest()->get();

        return view('frontend.details', compact('post', 'related'))->with([
            'meta_title' => $this->_buildMeta($post, $this->settings['product_meta_title']),
            'meta_desc' => $this->_buildMeta($post, $this->settings['product_meta_desc']),
            'meta_keyword' => $this->_buildMeta($post, $this->settings['product_meta_keyword'])
        ]);
    }
}
