<?php

namespace App\Http\Controllers\Ddad;

use App\Http\Controllers\Controller;
use App\Models\Ddad\Device;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();
        if($request->user_role == 'admin') {
            $query->where('is_client', 0);
        }
        else if($request->user_role == 'client') {
            $query->where('is_client', 1);
        }

        $this->viewData['users'] = $query->get();
        return view('ddad.users.index', $this->viewData);
    }

    public function create()
    {

        return view('ddad.users.create', $this->viewData);
    }

    public function store(Request $request)
    {
        $rules = $this->rules();
        $rules['password'] = 'confirmed|nullable|min:8';
        if($request->is_client == 'yes') {
            $rules['company_name'] = $rules['company_name'] . '|unique:users,company_name';
        }

        $request->validate($rules);

        $user = new User($request->all());
        if($request->is_client == 'yes') {
            $user->is_client = true;
        } else {
            $user->is_client = false;
            $user->company_name = "DDAD";
        }
        $user->is_verified = true;
        $user->password = bcrypt($request->password);
        $user->save();

        flash(($user->is_client? "Client" : "Admin") . " profile successfully created");

        return redirect()->route('users.index');
    }


    private function rules()
    {
        return [
            'company_name' => 'required_if:is_client,yes',
            'first_name' => 'required',
            'last_name' => 'required',
            'mobile_number' => 'required',
            'gender' => 'required',
            'address' => 'required_if:is_client,yes',
            'description' => 'required_if:is_client,yes',
            'email' => 'required:email',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
          ];
    }

    public function destroy(User $user)
    {
        if($user->campaigns->isNotEmpty()) {
            flash("You cannot delete this user because this user created some campaign. First delete these campaigns to delete this user.")->success();
        } else {
            $user->delete();
            flash("User successfully deleted")->success();
        }
        return redirect()->route('users.index');
    }

    public function edit(User $user)
    {
        $this->viewData['user'] = $user;
        return view('ddad.users.edit', $this->viewData);
    }

    public function update(Request $request, User $user)
    {
        $rules = $this->rules();
        $rules['password'] = 'confirmed|nullable|min:8';
        $rules['company_name'] = $rules['company_name'] .($user->company_name != $request->company_name ? '|unique:users,company_name' : '');
        $request->validate($rules);
        $user->fill($request->all());
        if($request->password) {
            $user->password = bcrypt($request->password);
        }
        $user->save();
        flash("Profile successfully updated")->success();

        return redirect()->route('users.index');
    }

    public function show(User $user)
    {
        $this->viewData['user'] = $user;
        return view('ddad.users.show', $this->viewData);
    }
}
