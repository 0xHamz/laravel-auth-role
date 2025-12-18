<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AdminCustomerController extends Controller
{
    public function index()
    {
        $customers = User::where('role', 'customer')->get();
        return view('admin.customers.index', compact('customers'));
    }

    public function create()
    {
        return view('admin.customers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'customer'
        ]);

        return redirect('/admin/customers')->with('success', 'Customer berhasil dibuat');
    }

    public function edit($id)
    {
        $customer = User::findOrFail($id);
        return view('admin.customers.edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $customer = User::findOrFail($id);

        $customer->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        return redirect('/admin/customers')->with('success', 'Customer diperbarui');
    }

    public function destroy($id)
    {
        User::destroy($id);
        return back()->with('success', 'Customer dihapus');
    }
}
