<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Validation\CommentValidator;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

// class CommentController extends Controller
// {
//     public function index()
//     {
//         $comments = $this->getAll();
//         return view('backend.pages.comment',compact('comments'));
//     }

//     public function add(Request $request)
//     {
//         $commentValidator = new CommentValidator();
//         $validator = Validator::make($request->all(), $commentValidator->rules(), $commentValidator->messages());

//         if ($validator->fails()) {
//             return response()->json(['errors' => $validator->errors()], 422);
//         }

//         Comment::create([
//             'user_id' => Auth::user()->id,
//             // 'blog_id' => ,
//             // 'parent_id' => ,
//             // 'like' => ,
//             // 'dislike' => ,
//             // 'content' => ,
//             // 'status' => ,
//             // 'is_reported' => ,
//             // 'report_count' => ,
//         ]);

//         return response()->json(['message' => 'İletişim Başarıyla Eklendi'], 200);
//     }

//     public function delete(Request $request)
//     {
//         try {
//             $comment = Comment::find($request->id);
//             $comment->delete();

//             return response(['message' => 'İletişim başarıyla silindi'], 200);
//         } catch (\Throwable $th) {
//             return response(['message' => 'Sistemsel bir hata oluştu'], 500);
//         }
//     }

//     public function deleteMultiple(Request $request)
//     {
//         $ids = $request->ids;
//         foreach ($ids as $id) {
//             $id = (int) $id;

//             try {
//                 $comment = Comment::find($id);
//                 $comment->delete();
//             } catch (\Throwable $th) {
//                 return response(['message' => 'Sistemsel bir hata oluştu'], 500);
//             }
//         }
//         return response(['message' => 'İletişimler başarıyla silindi'], 200);
//     }

//     public function update(Request $request)
//     {
//         $commentValidator = new CommentValidator();
//         $validator = Validator::make($request->all(), $commentValidator->rules(), $commentValidator->messages());

//         if ($validator->fails()) {
//             return response()->json(['errors' => $validator->errors()], 422);
//         }

//         Comment::where('id', $request->id)->update([
//             'name' => $request->name,
//             'email' => $request->email,
//             'phone' => $request->phone,
//             'title' => $request->title,
//             'content' => $request->content,
//             'status' => $request->status,
//         ]);

//         return response()->json(['message' => 'İletişim Başarıyla Güncellendi'], 200);
//     }

//     public function statusUpdate(Request $request)
//     {
//         try {
//             Comment::where('id', $request->id)->first()->update(['status' => $request->status]);
//             return response(['message' => 'Durum başarıyla güncellendi'], 200);
//         } catch (\Throwable $th) {
//             return response(['message' => 'Sistemsel bir hata oluştu'], 500);
//         }
//     }

//     public function get(Request $request) {
//         try {
//             $comment = Comment::where('id', $request->id)->first();
//             return response(['data' => $comment, 200]);
//         } catch (\Throwable $th) {
//             return response(['message' => 'Sistemsel bir hata oluştu. Veriler getirelemedi.'], 500);
//         }
//     }

//     public function getAll() {
//         return Comment::all();
//     }
// }
