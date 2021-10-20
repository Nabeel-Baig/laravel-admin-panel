<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\users\StoreUserRequest;
use Gate;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->title = ucwords('users');
    }

    public function index()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if (request()->ajax()) {
            $users = User::orderBy('id','desc')->get();
            return datatables()->of($users)
                ->addColumn('checkbox', function ($data) {
                    return '<input type="checkbox" class="delete_checkbox flat" value="' . $data['id'] . '">';
                })->addColumn('image', function ($data) {
                    return '<img width="65" src="' . asset(!empty($data->avatar) ? $data->avatar : 'assets/images/users/avator.png') . '">';
                })->addColumn('action', function ($data) {
                    $edit = ''; $duplicate = ''; $view = ''; $delete = '';
                    if (Gate::allows('role_edit')) {
                        $edit = '<a title="Edit" href="' . route('admin.users.edit',$data->id) . '" class="btn btn-primary btn-sm"><i class="fas fa-pen"></i></a>&nbsp;';
                    }
                    if (Gate::allows('role_show')) {
                        $view = '<button title="View" type="button" name="view" id="' . $data['id'] . '" class="view btn btn-info btn-sm"><i class="fa fa-eye"></i></button>&nbsp;';
                    }
                    if (Gate::allows('role_delete')) {
                        $delete = '<button title="Delete" type="button" name="delete" id="' . $data['id'] . '" class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>';
                    }
                    return $edit.$view.$delete;
                })->rawColumns(['checkbox', 'action','image'])->make(true);
        }
        $content['title'] = $this->title;
        return view('admin.users.list')->with($content);
    }

    public function create()
    {
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = \App\Models\Role::all()->pluck('title', 'id');
        $title = $this->title;
        return view('admin.users.create', compact('roles','title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $user = User::create(handleFiles(\request()->segment(2),$request->validated()));
        $user->roles()->sync($request->input('roles', []));
        return redirect()->route('admin.users.index');
    }

    public function show($id)
    {
        //
    }

    public function edit(User $user)
    {
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $roles = Role::latest()->get()->pluck('title','id');
        $user->load('roles');
        $title = $this->title;
        return view('admin.users.edit',compact('roles','user','title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
