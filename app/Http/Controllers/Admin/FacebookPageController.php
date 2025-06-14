<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\FacebookPage;
use App\Models\FacebookMessage;
use App\Http\Controllers\Controller;
use App\Http\Requests\FacebookPageRequest;
use App\Models\FacebookConversation;

class FacebookPageController extends Controller
{

    public function __construct(private FacebookPage $model, private Role $role)
    {
    }
    public function index()
    {
        return view('admin.facebook.pages.index');
    }
    public function create()
    {
        $roles = $this->role->all();
        $model = new FacebookPage();
        // $countries = \App\Models\Country::all();
        // $languages = \App\Models\Language::all();
        return view('admin.facebook.pages.create', get_defined_vars());
    }


    public function store(FacebookPageRequest $request)
    {
        $data = array_filter($request->validated());
        $model = $this->model->create($data);
        toast(__('trans.data_created_successfully'), 'success');
        return redirect()->route('midade.facebookpages.admin.facebookpages.all');
    }


    public function edit($id)
    {
        $roles = $this->role->all();
        $model = $this->model->findOrFail($id);
        return view('admin.facebook.pages.edit', get_defined_vars());
    }


    public function update(FacebookPageRequest $request, $id)
    {
        $model = $this->model->findOrFail($id);
        $data = array_filter($request->validated());
        $model->update($data);

        toast(__('trans.data_updated_successfully'), 'success');
        return redirect()->route('midade.facebookpages.admin.facebookpages.all');
    }


    public function conversations($page_id)
    {
        $page = FacebookPage::where('page_id', $page_id)->first();
        return view('admin.facebook.conversations', get_defined_vars());
    }

    public function messages($conversation_id)
    {
        $model = FacebookConversation::where('conversation_id', $conversation_id)->first();
        if (!$model) {
            return abort(404);
        }
        $messages = $model->messages;
        // if ($model->participants) {
        $value = json_decode($model->participants, true);
        $to = (object) $value['data'][0];
        // }else{
        //     $to = (object) [];
        //     $to->name = '';
        //     $to->id = '';
        // }
        return view('admin.facebook.messages', get_defined_vars());
    }

    
}
