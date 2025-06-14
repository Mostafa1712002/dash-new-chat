<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    public function __construct(private User $model, private Role $role) {}
    public function index()
    {
        return view('admin.users.index');
    }
    public function create()
    {
        $roles = $this->role->all();
        $model = new User();
        // $countries = \App\Models\Country::all();
        // $languages = \App\Models\Language::all();
        return view('admin.users.create', get_defined_vars());
    }


    public function store(UserRequest $request)
    {
        $data = array_filter($request->validated());
        $model = $this->model->create($data);
        $model->roles()->sync($request->roles);
        toast(__('trans.data_created_successfully'),  'success');
        return redirect()->route('midade.users.admin.users.all');
    }


    public function edit($id)
    {
        $roles = $this->role->all();
        $model = $this->model->findOrFail($id);
        // $countries = \App\Models\Country::all();
        // $languages = \App\Models\Language::all();
        return view('admin.users.edit', get_defined_vars());
    }


    public function update(UserRequest $request, $id)
    {
        $model = $this->model->findOrFail($id);
        $data = array_filter($request->validated());

        $model->update($data);
        
        $model->roles()->sync($request->roles);
        toast(__('trans.data_created_successfully'),  'success');
        return redirect()->route('midade.users.admin.users.all');
    }
}
