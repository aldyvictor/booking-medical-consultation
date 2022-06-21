<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        return view('admin.pages.customer.index');
    }

    public function create()
    {
        return view('admin.pages.customer.create');
    }

}
