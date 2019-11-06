<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function userManagementView()
    {
        $hotelsList = DB::table('hotels')->pluck('name');
        return view('hotelmanagement.user_manage', compact('hotelsList'));
    }

    public function searchUsers(Request $request)
    {
        $users = DB::table('users')
            ->join('hotels', 'hotels.id', '=', 'users.hotel_id')
            ->select('hotels.name AS hotel_name', 'users.*')
            ->where('users.role', 'LIKE', '%'. $request->role .'%')
            ->where('hotels.name', 'LIKE', '%'. $request->hotel .'%')
            ->where('users.name', 'LIKE', '%'. $request->user .'%')
            ->orderBy('users.id', 'DESC')
            ->paginate(6);
        $usersTable = view('hotelmanagement.components.user_table', compact('users'))->render();
        return response()->json(['usersTable' => $usersTable]);
    }

    //delete
    public function deleteUser()
    {
        $result = DB::table('users')->where('id', request()->id)->delete();
        if($result) {
            return response()->json([
                'status' => 'success',
                'message' => 'Xóa thành công!'
            ]);
        }
        return response()->json([
            'status' => 'fail',
            'message' => 'Xóa thất bại!'
        ]);
    }

    public function showUser()
    {
        $user = DB::table('users')->where('id', request()->id)->first();
        return response()->json($user);
    }

    //create
    public function storeUser(Request $request)
    {
        $message = [
            'required' => 'Không được để trống!',
            'max:15' => 'Được điền tối đa 15 kí tự!',
            'max:35' => 'Được điền tối đa 35 kí tự!',
            'integer' => 'Chỉ được phép nhập kí tự là số',
        ];

        $rules = [
            'name' => 'required|max:35',
            'birthday' => 'required|max:15',
            'hotel_id' => 'required|integer',
            'role' => 'required|max:15',
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if($validator->fails()) {
            return ['errors' => $validator->errors()];
        }

        $result = DB::table('users')
            ->updateOrInsert(
                ['id' => $request->id],
                [
                    'name' => $request->name,
                    'birthday' => $request->birthday,
                    'hotel_id' => $request->hotel_id,
                    'role' => $request->role,
                ]
            );

        if($result) {
            return response()->json([
                'status' => 'success',
                'message' => 'Cập nhật thành công!'
            ]);
        }
        return response()->json([
            'status' => 'fail',
            'message' => 'Cập nhật thất bại!'
        ]);
    }
}
