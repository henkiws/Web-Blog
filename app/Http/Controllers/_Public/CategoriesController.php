<?php

namespace App\Http\Controllers\_Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Category;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::whereNotNull('parent_id')->get();

        return view('_Public.categories.index', compact('categories'));
    }
}
