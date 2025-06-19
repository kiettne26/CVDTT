<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class FoodComponent extends Controller
{
    /**
     * Hiển thị danh sách món ăn.
     */
    public function index()
    {
        $foods = Food::orderBy('created_at', 'asc')->get();
        return view('foods.index', compact('foods'));
    }

    /**
     * Hiển thị form thêm món ăn.
     */
    public function create()
    {
        return view('foods.create');
    }

    /**
     * Lưu món ăn mới vào database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'poster' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
        ]);

        $poster = null;
        $posterOriginalName = null;
        if ($request->hasFile('poster')) {
            $file = $request->file('poster');
            $originalName = $file->getClientOriginalName();
            // Lưu vào public/uploads/foods/ giữ nguyên tên gốc
            $file->move(public_path('uploads/foods'), $originalName);
            // Lưu đường dẫn tương đối
            $poster = 'uploads/foods/' . $originalName;
            $posterOriginalName = $originalName;
        }

        Food::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'poster' => $poster,
            'poster_original_name' => $posterOriginalName,
        ]);

        return redirect()->route('foods.index')->with('mess_success', 'Thêm món ăn thành công!');
    }

    /**
     * Hiển thị chi tiết món ăn.
     */
    public function show($id)
    {
        $food = Food::findOrFail($id);
        return view('foods.show', compact('food'));
    }

    /**
     * Hiển thị form sửa món ăn.
     */
    public function edit($id)
    {
        $food = Food::findOrFail($id);
        return view('foods.edit', compact('food'));
    }

    /**
     * Cập nhật thông tin món ăn.
     */
    public function update(Request $request, $id)
    {
        $food = Food::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'poster' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
        ]);

        $poster = $food->poster;
        $posterOriginalName = $food->poster_original_name;

        if ($request->hasFile('poster')) {
            $file = $request->file('poster');
            $originalName = $file->getClientOriginalName();
            // Lưu vào public/uploads/foods/ giữ nguyên tên gốc
            $file->move(public_path('uploads/foods'), $originalName);
            // Lưu đường dẫn tương đối
            $poster = 'uploads/foods/' . $originalName;
            $posterOriginalName = $originalName;
        }

        $food->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'poster' => $poster,
            'poster_original_name' => $posterOriginalName,
        ]);

        return redirect()->route('foods.index')->with('mess_success', 'Cập nhật món ăn thành công!');
    }

    /**
     * Xoá món ăn.
     */
    public function destroy($id)
    {
        $food = Food::findOrFail($id);
        $food->delete();
        return redirect()->route('foods.index')->with('mess_success', 'Xoá món ăn thành công!');
    }
}
