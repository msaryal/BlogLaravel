<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class AboutController extends Controller
{
    public function index() {
        return view('about');
    }

}
