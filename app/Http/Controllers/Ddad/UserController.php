<?php

namespace App\Http\Controllers\Ddad;

use App\Http\Controllers\Controller;
use App\Models\Ddad\Device;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $this->viewData['users'] = User::all();
        return view('ddad.users.index', $this->viewData);
    }

    public function create()
    {

        return view('ddad.users.create', $this->viewData);
    }

    public function store(Request $request)
    {
        $request->validate($this->rules());

        $user = new User($request->all());
        $user->is_client = $request->is_client == 'yes';
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
        $user->delete();
        flash("User successfully deleted")->success();
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
