<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * HomePage
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $courses = Course::withoutTrashed()->latest()->with('category')->get();
        return view('home')->with('courses',$courses);
    }

    /**
     * search
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function search()
    {
        $search = \request('s');
        $courses = Course::withoutTrashed()->where('title','like',"%$search%")->orwhere('brief','like',"%$search%")->latest()->with('category')->get();
        return view('home')->with('courses',$courses);
    }

    /**
     * search
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function category($id)
    {
        $category = Category::find($id);
        if ($category->active != 1)
            abort(404);

        $courses = Course::withoutTrashed()->latest()->whereHas('category', function (Builder $query) use($id) {
            $query->where('id', $id);
        })->with('category')->get();

        return view('home')->with('courses',$courses);
    }
}
