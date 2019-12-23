<?php
namespace Laraspace\Http\Controllers\Ngoaitru;

use Laraspace\Http\Requests;
use Laraspace\Http\Controllers\Controller;

class NgoaitruController extends Controller
{
    // Fix lỗi trong quá trình in phiếu TNT
    public function fix01tnt()
    {
        return view('toolfix.ngoaitru.index');
    }

    // Tìm hs cần chỉnh sửa
    public function find_khambenh()
    {
        return view('toolfix.ngoaitru.index');
    }

    
}
