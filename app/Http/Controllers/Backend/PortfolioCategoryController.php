<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Validation\PortfolioCategoryValidator;
use App\Models\PortfolioCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PortfolioCategoryController extends Controller
{
    public function index()
    {
        $categories = $this->getAll();
        return view('backend.pages.portfolio_category',compact('categories'));
    }

    public function add(Request $request)
    {
        $portfolioCategoryValidator = new PortfolioCategoryValidator();
        $validator = Validator::make($request->all(), $portfolioCategoryValidator->rules(), $portfolioCategoryValidator->messages());

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        PortfolioCategory::create([
            'name' => $request->name,
            'status' => $request->status,
            'slug' => Str::slug($request->name),
        ]);

        return response()->json(['message' => 'Kategori Başarıyla Eklendi'], 200);
    }

    public function delete(Request $request)
    {
        try {
            $portfolioCategory = PortfolioCategory::find($request->id);
            $portfolioCategory->delete();

            return response(['message' => 'Kategori başarıyla silindi'], 200);
        } catch (\Throwable $th) {
            return response(['message' => 'Sistemsel bir hata oluştu'], 500);
        }
    }

    public function deleteMultiple(Request $request)
    {
        $ids = $request->ids;
        foreach ($ids as $id) {
            $id = (int) $id;

            try {
                $portfolioCategory = PortfolioCategory::find($id);
                $portfolioCategory->delete();
            } catch (\Throwable $th) {
                return response(['message' => 'Sistemsel bir hata oluştu'], 500);
            }
        }
        return response(['message' => 'Kategoriler başarıyla silindi'], 200);
    }

    public function update(Request $request)
    {
        $oldPortfolioCategory = PortfolioCategory::find($request->id);

        $portfolioCategoryValidator = new PortfolioCategoryValidator();
        $validator = Validator::make($request->all(), $portfolioCategoryValidator->rules($oldPortfolioCategory), $portfolioCategoryValidator->messages());

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        PortfolioCategory::where('id', $request->id)->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'status' => $request->status,
        ]);

        return response()->json(['message' => 'Kategori Başarıyla Güncellendi'], 200);
    }

    public function statusUpdate(Request $request)
    {
        try {
            PortfolioCategory::where('id', $request->id)->first()->update(['status' => $request->status]);
            return response(['message' => 'Kategori başarıyla güncellendi'], 200);
        } catch (\Throwable $th) {
            return response(['message' => 'Sistemsel bir hata oluştu'], 500);
        }
    }

    public function get(Request $request) {
        try {
            $category = PortfolioCategory::where('id', $request->id)->first();
            return response(['data' => $category, 200]);
        } catch (\Throwable $th) {
            return response(['message' => 'Sistemsel bir hata oluştu. Veriler getirelemedi.'], 500);
        }
    }

    public function getAll() {
        return PortfolioCategory::all();
    }
}
