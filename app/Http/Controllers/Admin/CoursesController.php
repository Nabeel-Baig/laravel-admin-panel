<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\courses\StoreCourseRequest;
use App\Http\Requests\courses\UpdateCourseRequest;
use App\Http\Requests\courses\MassDestroyCourseRequest;
use Illuminate\Support\Facades\Hash;
use Gate;

class CoursesController extends Controller
{
    public function __construct()
    {
        $this->title = ucwords('courses');
    }

    public function index()
    {
        abort_if(Gate::denies('course_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if (request()->ajax()) {
            $courses = Course::orderBy('id','desc')->get();
            return datatables()->of($courses)
                ->addColumn('checkbox', function ($data) {
                    return '<input type="checkbox" class="delete_checkbox flat" value="' . $data['id'] . '">';
                })->addColumn('image', function ($data) {
                    return '<img width="65" src="' . asset($data->image) . '">';
                })->addColumn('action', function ($data) {
                    $edit = ''; $duplicate = ''; $view = ''; $delete = '';
                    if (Gate::allows('course_edit')) {
                        $edit = '<a title="Edit" href="' . route('admin.courses.edit',$data->id) . '" class="btn btn-primary btn-sm"><i class="fas fa-pen"></i></a>&nbsp;';
                    }
                    if (Gate::allows('course_show')) {
                        $view = '<button title="View" type="button" name="view" id="' . $data['id'] . '" class="view btn btn-info btn-sm"><i class="fa fa-eye"></i></button>&nbsp;';
                    }
                    if (Gate::allows('course_delete')) {
                        $delete = '<button title="Delete" type="button" name="delete" id="' . $data['id'] . '" class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>';
                    }
                    return $edit.$view.$delete;
                })->rawColumns(['checkbox', 'action','image'])->make(true);
        }
        $content['title'] = $this->title;
        return view('admin.courses.list')->with($content);
    }

    public function create()
    {
        abort_if(Gate::denies('course_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::latest()->get()->pluck('name', 'id');
        $title = $this->title;
        return view('admin.courses.create', compact('categories','title'));
    }

    public function store(StoreCourseRequest $request)
    {
        $course = Course::create(handleFiles(\request()->segment(2),$request->validated()));
        return redirect()->route('admin.courses.index')->withToastSuccess('Course Created Successfully!');
    }

    public function show(Course $course)
    {
        $course->load('category');
        return \response()->json($course);
    }

    public function edit(Course $course)
    {
        abort_if(Gate::denies('course_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $categories = Category::latest()->get()->pluck('name', 'id');
        $title = $this->title;
        return view('admin.courses.edit',compact('categories','course','title'));
    }

    public function update(UpdateCourseRequest $request, Course $course)
    {
        $course->update(handleFilesIfPresent(\request()->segment(2),$request->validated(), $course));
        return redirect()->route('admin.courses.index')->withToastSuccess('Course Updated Successfully!');
    }

    public function destroy(Course $course)
    {
        abort_if(Gate::denies('course_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $course->delete();
        return \response()->json('Course Deleted Successfully!');
    }

    public function massDestroy(MassDestroyCourseRequest $request)
    {
        Course::whereIn('id', request('ids'))->delete();
        return \response()->json('Selected records Deleted Successfully.');
    }
}
