<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class ContactController extends Controller
{
    public function index() {

        return view('contacts');
    }

}
