<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;

class RoleController extends Controller
{

    public function __construct(private Role $model, private Permission $permission) {}
    public function index()
    {
        return view('admin.roles.index');
    }
    public function create()
    {
        $permissions = $this->permission->all();
        $model = new Role();
        return view('admin.roles.create', get_defined_vars());
    }


    public function store(RoleRequest $request)
    {
        $data = $request->validated();
        $model = $this->model->create($data);
        $model->permissions()->sync($request->permissions);
        toast(__('trans.data_created_successfully'),  'success');
        return redirect()->route('midade.users.admin.roles.index');
    }


    public function edit($id)
    {
        $permissions = $this->permission->all();
        $model = $this->model->findOrFail($id);
        return view('admin.roles.edit', get_defined_vars());
    }


    public function update(RoleRequest $request, Role $role)
    {
        $data = $request->validated();
        $role->update($data);
        $role->permissions()->sync($request->permissions);
        toast(__('trans.data_created_successfully'),  'success');
        return redirect()->route('midade.users.admin.roles.index');
    }
}
