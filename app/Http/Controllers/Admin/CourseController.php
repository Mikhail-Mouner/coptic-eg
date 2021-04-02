<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\Level;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::withTrashed()->with('category')->with('tags')->get();
        return view('admin.courses.index')->with('courses',$courses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'categories' => Category::whereActive(1)->get(),
            'tags' => Tag::all(),
            'levels' => Level::all(),
        ];
        return view('admin.courses.form')
            ->with('data',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->hasFile('photo')){
            $photo = Storage::putFile('courses',$request->file('photo'));
        }else{
            $photo = 'courses/no-img.png';
        }

        $course = Course::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'brief' => $request->about,
            'description' => $request->description,
            'duration' => $request->duration,
            'location' => $request->location,
            'main_photo' => $photo,
            'online' => boolval($request->online),
            'category_id' => $request->category,
            'level_id' => $request->level,
            'add_by' => Auth::id(),
        ]);

        if ($request->tags)
            $course->tags()->attach($request->tags);

        session()->flash('success','Courses added successfully');
        return redirect()->route('admin.courses.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $course = Course::whereSlug($slug)->with('category')->with('tags')->get();
        return view('courses.details.index')->with('course',$course[0]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::find($id);
        $data = [
            'categories' => Category::whereActive(1)->get(),
            'tags' => Tag::all(),
            'levels' => Level::all(),
        ];
        return view('admin.courses.form')
            ->with('data',$data)
            ->with('course',$course);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $course = Course::find($id);

        if ($request->hasFile('photo')){
            Storage::delete($course->main_photo);
            $photo = Storage::putFile('courses',$request->file('photo'));
        }else{
            $photo = $course->main_photo;
        }

        $course->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'brief' => $request->about,
            'description' => $request->description,
            'duration' => $request->duration,
            'location' => $request->location,
            'main_photo' => $photo,
            'online' => boolval($request->online),
            'category_id' => $request->category,
            'level_id' => $request->level,
        ]);

        if ($request->tags)
            $course->tags()->sync($request->tags);

        session()->flash('success','Courses edited successfully');
        return redirect()->route('admin.courses.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::find($id);
        Storage::delete($course->main_photo);
        $course->tags()->delete();
        $course->delete();
        session()->flash('success','Courses remove successfully');
        return redirect()->back();
    }
}
