<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * 
     */
    public function store(Request $request, int $userId)
    {
        // これだけでimagesディレクトリにローカル（非公開で）保存
        // 保存場所は、storage/app/images/　の下
        $savedPath = $request->file->store('images', 'local');

        // 後はDBにパスを保存しておく
        User::find($userId)
            ->fill([
                'image_path' => $savedPath,
            ])
            ->save();

        return response()->json([
            'message' => 'success',
        ], 200);
    }
}
