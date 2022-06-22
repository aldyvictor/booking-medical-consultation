<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = User::where('role', 'Customer')->get();

        return view('admin.pages.customer.index', compact('customers'));
    }

    public function create()
    {
        return view('admin.pages.customer.create');
    }

    public function delete(Request $request)
    {
        try {
            $doctorCategory = User::find($request->id);
            $doctorCategory->delete();

            return redirect()->route('customer.index')->with('success', 'Doctor Category deleted successfully.');
        } catch (\Throwable $th) {
            return redirect()->route('customer.index')->with('error', 'Something went wrong.');
        }
    }

}
