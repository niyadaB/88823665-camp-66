<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // ดึงข้อมูลผู้ใช้ทั้งหมดและส่งไปที่ View
    public function index()
    {
        $users = User::all();
        return view('user', ['users' => $users]);
    }

    // ลบผู้ใช้
    public function delete(Request $req)
    {
        $user = User::findOrFail($req->id);
        $user->delete();

        return redirect('/user')->with('success', 'User deleted successfully.');
    }

    // โหลดหน้าแก้ไขผู้ใช้
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user_edit', compact('user'));
    }

    // อัปเดตข้อมูลผู้ใช้
    public function edit_action(Request $req)
    {
        $user = User::findOrFail($req->id);

        $user->name = $req->name;
        $user->email = $req->email;

        // ตรวจสอบว่าผู้ใช้ป้อนรหัสผ่านใหม่หรือไม่
        if (!empty($req->password)) {
            $user->password = bcrypt($req->password);
        }

        $user->save();

        return redirect('/user')->with('success', 'User updated successfully.');
    }
}
