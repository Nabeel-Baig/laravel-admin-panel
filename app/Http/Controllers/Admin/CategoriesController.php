<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\categories\MassDestroyCategoryRequest;
use App\Http\Requests\categories\StoreCategoryRequest;
use App\Http\Requests\categories\UpdateCategoryRequest;
use App\Models\Category;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->title = ucwords(str_replace('-', ' ', request()->segment(2)));
    }

    public function index()
    {
        abort_if(Gate::denies('category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if (request()->ajax()) {
            $categories = Category::orderBy('id','desc')->get();
            return datatables()->of($categories)
                ->addColumn('checkbox', function ($data) {
                    return '<input type="checkbox" class="delete_checkbox flat" value="' . $data['id'] . '">';
                })->addColumn('action', function ($data) {
                    $edit = ''; $duplicate = ''; $view = ''; $delete = '';
                    if (Gate::allows('category_edit')) {
                        $edit = '<a title="Edit" href="' . route('admin.categories.edit',$data->id) . '" class="btn btn-primary btn-sm"><i class="fas fa-pen"></i></a>&nbsp;';
                    }
                    if (Gate::allows('category_show')) {
                        $view = '<button title="View" type="button" name="view" id="' . $data['id'] . '" class="view btn btn-info btn-sm"><i class="fa fa-eye"></i></button>&nbsp;';
                    }
                    if (Gate::allows('category_delete')) {
                        $delete = '<button title="Delete" type="button" name="delete" id="' . $data['id'] . '" class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>';
                    }
                    return $edit.$view.$delete;
                })->rawColumns(['checkbox', 'action'])->make(true);
        }
        $content['title'] = $this->title;
        return view('admin.' . request()->segment(2) . '.list')->with($content);
    }

    public function create()
    {
        abort_if(Gate::denies('category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $title = $this->title;
        return view('admin.' . request()->segment(2) . '.form',compact('title'));
    }

    public function store(StoreCategoryRequest $request)
    {
        Category::create($request->all());
        return redirect()->route('admin.categories.index')->withToastSuccess('Category Created Successfully!');
    }

    public function show(Category $category)
    {
        return \response()->json($category);
    }

    public function edit(Category $category)
    {
        abort_if(Gate::denies('category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $title = $this->title;
        return view('admin.' . request()->segment(2) . '.form',compact('title','category'));
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update($request->all());
        return redirect()->route('admin.categories.index')->withToastSuccess('Category Updated Successfully!');
    }

    public function destroy(Category $category)
    {
        abort_if(Gate::denies('category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $category->delete();
        return \response()->json('Category Deleted Successfully!');
    }

    public function massDestroy(MassDestroyCategoryRequest $request)
    {
        Category::whereIn('id', request('ids'))->delete();
        return \response()->json('Selected records Deleted Successfully.');
    }
}
