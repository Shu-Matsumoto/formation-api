<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * 
     */
    public function store(Request $request, int $userId)
    {
        // 対象ユーザー取得
        $image_path = User::find($userId)->image_path;
        $delete_image_path = $image_path;
        // DB上パスから先頭の"storage/"を削除し、先頭に"public/"を付加する
        if (strncmp($delete_image_path, 'storage/', 8) == 0) {
            $delete_image_path = "public/" . substr($delete_image_path, 8, strlen($delete_image_path) - 8);
            Storage::disk('local')->delete($delete_image_path);
        }

        // 保存場所は、storage/app/public/images/userprofileの下
        $imageFilePath = $request->file('file')->store('public/images/userprofile', 'local');
        $savedPath = $imageFilePath;
        // オリジナルパスから先頭の"public/"を削除し、先頭に"storage/"を付加する
        if (strncmp($savedPath, 'public/', 7) == 0) {
            $savedPath = "storage/" . substr($savedPath, 7, strlen($savedPath) - 7);
        }

        // 後はDBにパスを保存しておく
        User::find($userId)
            ->fill([
                'image_path' => $savedPath,
            ])
            ->save();

        return response()->json([
            'message' => 'success',
            'data' =>  User::find($userId),
        ], 200);
    }
}
