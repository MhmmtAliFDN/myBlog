<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Validation\PortfolioValidator;
use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = $this->getAll();
        $categories = PortfolioCategory::get();
        return view('backend.pages.portfolio', compact('portfolios', 'categories'));
    }

    public function add(Request $request)
    {
        $portfolioValidator = new PortfolioValidator();
        $validator = Validator::make($request->all(), $portfolioValidator->rules(), $portfolioValidator->messages());

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        if ($request->hasFile('image')) {
            $image = ImageHelper::upload($request->file('image'), Str::slug($request->name), $request->segment(2));
            if ($image) {
                Portfolio::create([
                    'user_id' => Auth::user()->id,
                    'category_id' => $request->category,
                    'name' => $request->name,
                    'slug' => Str::slug($request->name),
                    'image' => $image,
                    'content' => $request->content,
                    'status' => $request->status,
                ]);

                return response()->json(['message' => 'Çalışma Başarıyla Eklendi'], 200);
            }
        }
    }

    public function delete(Request $request)
    {
        try {
            $portfolio = Portfolio::find($request->id);
            ImageHelper::delete($portfolio->image, $request->segment(2));
            $portfolio->delete();

            return response(['message' => 'Çalışma başarıyla silindi'], 200);
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
                $portfolio = Portfolio::find($id);
                ImageHelper::delete($portfolio->image, $request->segment(2));
                $portfolio->delete();
            } catch (\Throwable $th) {
                return response(['message' => $th->getMessage()], 500);
            }
        }
        return response(['message' => 'Çalışmalar başarıyla silindi'], 200);
    }

    public function update(Request $request)
    {
        $oldPortfolio = Portfolio::find($request->id);

        $portfolioValidator = new PortfolioValidator();
        $validator = Validator::make($request->all(), $portfolioValidator->rules($oldPortfolio), $portfolioValidator->messages());

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $oldImage = $oldPortfolio->image;
        $image = ImageHelper::update($request->image, Str::slug($request->name), $request->segment(2), $oldImage);
        if ($image) {
            Portfolio::where('id', $request->id)->update([
                'category_id' => $request->category,
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'image' => $image,
                'content' => $request->content,
                'status' => $request->status,
            ]);
        }

        return response()->json(['message' => 'Çalışma Başarıyla Güncellendi'], 200);
    }

    public function statusUpdate(Request $request)
    {
        try {
            Portfolio::where('id', $request->id)->first()->update(['status' => $request->status]);
            return response(['message' => 'Durum başarıyla güncellendi'], 200);
        } catch (\Throwable $th) {
            return response(['message' => 'Sistemsel bir hata oluştu'], 500);
        }
    }

    public function get(Request $request)
    {
        try {
            $portfolio = Portfolio::where('id', $request->id)->first();
            $user = Portfolio::find($request->id)->user->name;
            $category = Portfolio::find($request->id)->category->name;
            $image = asset($portfolio->image);
            return response(['data' => [$portfolio, $user, $category, $image], 200]);
        } catch (\Throwable $th) {
            return response(['message' => 'Sistemsel bir hata oluştu. Veriler getirelemedi.'], 500);
        }
    }

    public function getAll()
    {
        return Portfolio::all();
    }
}
