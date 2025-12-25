<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User; // Cần dùng để lấy danh sách tác giả
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Hiển thị danh sách
    public function index()
{
    // Lấy danh sách bài viết với user liên quan, sắp xếp theo ID giảm dần và phân trang
    $posts = Post::with('user')
        ->orderBy('id', 'desc')
        ->paginate(5); // Lấy bài viết kèm user, sắp xếp theo ID giảm dần, phân trang 10 bản ghi/trang
    
    return view('posts.index', compact('posts'));  // Truyền dữ liệu bài viết sang view
}

    // Form thêm mới
    public function create()
    {
        $users = User::all(); // Lấy list users cho dropdown
        return view('posts.create', compact('users')); 
    }

    // Xử lý lưu bài viết
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'user_id' => 'required|exists:users,id', // Kiểm tra user_id tồn tại trong bảng users
            'content' => 'required',
            'category' => 'required',
            'views' => 'required|integer|min:0'
        ]);

        Post::create($request->all());

        return redirect()->route('posts.index') // Chuyển hướng về danh sách bài viết
            ->with('success', 'Post created successfully!'); 
    }

    // Form sửa
    public function edit(Post $post)
    {
        $users = User::all(); // Lấy list users cho dropdown
        return view('posts.edit', compact('post', 'users'));   
    }

    // Xử lý cập nhật
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|max:255', 
            'user_id' => 'required|exists:users,id', 
            'content' => 'required',  
            'category' => 'required',
            'views' => 'required|integer|min:0' 
        ]);

        $post->update($request->all()); 

        return redirect()->route('posts.index')
            ->with('success', 'Post updated successfully!');
    }

    // Xóa bài viết
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index') // Chuyển hướng về danh sách bài viết
            ->with('success', 'Post deleted successfully!');
    }
}