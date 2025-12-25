<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SinhVien extends Model
{
    use HasFactory;

    // Khai báo tên bảng (không bắt buộc nếu tuân thủ quy tắc tên số nhiều, nhưng khai báo cho chắc)
    protected $table = 'sinh_viens';

    // TODO 8: Khai báo các cột được phép gán dữ liệu
    protected $fillable = ['ten_sinh_vien', 'email'];
}