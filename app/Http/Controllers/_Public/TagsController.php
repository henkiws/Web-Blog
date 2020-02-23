<?php

namespace App\Http\Controllers\_Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function index()
    {
        return view('_Public.tags.index');
    }
}
