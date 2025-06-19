<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerComponent extends Controller
{
    /**
     * Hiển thị danh sách khách hàng.
     */
    public function index()
    {
        $customers = Customer::orderBy('created_at', 'asc')->get();
        return view('customers.index', compact('customers'));
    }

    /**
     * Hiển thị form thêm khách hàng.
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Lưu khách hàng mới vào database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:customers,email',
            'password' => 'required|string|min:6',
            'name' => 'required|string|max:255',
            'gender' => 'required|in:Nam,Nữ,Khác',
            'dob' => 'nullable|date',
            'phone' => 'nullable|string|max:13',
        ]);

        Customer::create([
            'email' => $request->email,
            'password' => Hash::make($request->password), // nên hash mật khẩu
            'name' => $request->name,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'phone' => $request->phone,
        ]);

        return redirect()->route('customers.index')->with('mess_success', 'Thêm khách hàng thành công!');
    }

    /**
     * Hiển thị chi tiết khách hàng.
     */
    public function show($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers.show', compact('customer'));
    }

    /**
     * Hiển thị form sửa khách hàng.
     */
    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers.edit', compact('customer'));
    }

    /**
     * Cập nhật thông tin khách hàng.
     */
    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);

        $request->validate([
            'email' => 'required|email|unique:customers,email,' . $customer->customerId . ',customerId',
            'password' => 'nullable|string|min:6',
            'name' => 'required|string|max:255',
            'gender' => 'required|in:Nam,Nữ,Khác',
            'dob' => 'nullable|date',
            'phone' => 'nullable|string|max:13',
        ]);

        $data = [
            'email' => $request->email,
            'name' => $request->name,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'phone' => $request->phone,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $customer->update($data);

        return redirect()->route('customers.index')->with('mess_success', 'Cập nhật khách hàng thành công!');
    }

    /**
     * Xoá khách hàng.
     */
    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return redirect()->route('customers.index')->with('mess_success', 'Xoá khách hàng thành công!');
    }
}
