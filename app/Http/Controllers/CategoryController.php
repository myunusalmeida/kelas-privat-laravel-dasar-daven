<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

// use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        // $categories = Category::all(); // SELECT * FROM categories
        // $categories = Category::where('status', '!=', 'Aktif')
        //     // ->where('')
        //     ->get();
        // $categories = Category::limit(4)->get(['category_name', 'status', 'description']);
        $categories = Category::paginate(10); // SELECT * FROM categories
        $title = 'Categories'; // judul halaman
        return view('pages.categories.index', compact('categories', 'title')); // menjalankan view categories.blade.php dan mengirim variabel categories
    }

    public function create()
    {
        $title = 'Tambah Kategori';
        return view('pages.categories.create', compact('title'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_name' => ['required', 'string', 'min: 5'],
            'image' => ['required', 'mimes:jpeg,png,jpg', 'max:2048'],
            'description' => ['required', 'string'],
        ], [
            'category_name.required' => 'Nama Kategori Harus Diisi',
            'category_name.string' => 'Nama Kategori Harus Berupa String',
            'category_name.min' => 'Nama Kategori Minimal 5 Karakter',
        ]);

        $data = $request->all(); // mengambil semua data yang dikirim oleh form

        $data['image'] = $request->image->store('images', 'public'); // memindahkan file ke folder public/images
        $data['slug'] = Str::slug($request->category_name); // Ikan Nirwana == ikan-nirwana
        Category::create($data); // INSERT INTO categories (nama_kategori, status, deskripsi) VALUES ($request->category_name, $request->status, $request->description)
        return redirect()->route('kategori.index');
    }

    public function edit($id)
    {
        $kategori = Category::find($id); // SELECT * FROM categories WHERE id = $id
        $title = 'Edit Kategori';
        return view('pages.categories.edit', compact('kategori', 'title'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'category_name' => ['required', 'string', 'min: 5'],
            'image' => ['mimes:jpeg,png,jpg', 'max:2048'],
            'description' => ['required', 'string'],
        ], [
            'category_name.required' => 'Nama Kategori Harus Diisi',
            'category_name.string' => 'Nama Kategori Harus Berupa String',
            'category_name.min' => 'Nama Kategori Minimal 5 Karakter',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            // Storage::delete('public/' . $request->old_image); // menghapus file lama
            $data['image'] = $request->image->store('images', 'public'); // memindahkan file ke folder public/images
        } else {
            unset($data['image']);
        }

        $data['slug'] = Str::slug($request->category_name); // Ikan Nirwana == ikan-nirwana
        Category::find($id)->update($data); // INSERT INTO categories (nama_kategori, status, deskripsi) VALUES ($request->category_name, $request->status, $request->description)
        return redirect()->route('kategori.index');
    }

    public function destroy($id)
    {
        Category::find($id)->delete();
        return redirect()->route('kategori.index');
    }

    // create, store, edit, update, destroy
}
