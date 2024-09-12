<?php

namespace App\Http\Controllers;

use App\Enums\NoticeType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Nahid\Permit\Facades\Permit;
use Nahid\Permit\Roles\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required|confirmed',
            ]);
            $user = new User();
            $user->fill($data);

            if ($user->save()) {
                $user->roles()->withTimestamps()->sync($request->input('roles', []));
            }
        } catch (\Illuminate\Validation\ValidationException $e) {
            if ($request->wantsTurboStream()) {
                return turbo_stream([
                    turbo_stream()->notice(NoticeType::ERROR, $e->validator->errors()->first()),
                ]);
            }

            return back()->with('error', $e->validator->errors()->first());
        }

        catch (\Exception $e) {
            if ($request->wantsTurboStream()) {
                return turbo_stream([
                    turbo_stream()->notice(NoticeType::ERROR, $e->getMessage()),
                ]);
            }

            return back()->with('error', 'An error occurred while creating the user.');
        }


        if ($request->wantsTurboStream()) {
            $roles = Role::all();
            return turbo_stream([
                turbo_stream()->update('user-create', view('users.partials.create', compact('roles'))),
                turbo_stream()->notice(NoticeType::SUCCESS, "User {$request->name} was created!"),
            ]);
        }

        return redirect('/users/create');

    }

    public function edit(int $id)
    {
        $user = User::find($id);
        $abilities = Permit::getAbilities();
        $roles = Role::all();

        return view('users.edit', compact('user', 'abilities', 'roles'));
    }

    public function update(int $id, Request $request)
    {
        try {
            $data = $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'sometimes|confirmed',
            ]);

            if (empty($data['password'])) {
                unset($data['password']);
            }

            $data['permissions'] = $request->input('permissions');

            $user = User::findOrFail($id);

            $user->fill($data);

            if ($user->save()) {
                $user->roles()->sync($request->input('roles', null));
            }
        } catch (\Illuminate\Validation\ValidationException $e) {
            if ($request->wantsTurboStream()) {
                return turbo_stream([
                    turbo_stream()->notice(NoticeType::ERROR, $e->validator->errors()->first()),
                ]);
            }

            return back()->with('error', $e->validator->errors()->first());
        }

        catch (\Exception $e) {
            if ($request->wantsTurboStream()) {
                return turbo_stream([
                    turbo_stream()->notice(NoticeType::ERROR, "User update failed!"),
                ]);
            }

            return back()->with('error', 'An error occurred while creating the user.');
        }

        return redirect('/users')->with(['_notice' => 'User updated successfully!', '_status' => 'success']);

    }

    public function destroy(int $id, Request $request)
    {
        $user = User::find($id);

        $user->delete();

        if ($request->wantsTurboStream()) {
            return turbo_stream([
                turbo_stream()->replace(frame($user)),
                turbo_stream()->notice(NoticeType::SUCCESS, "User {$user->name} was deleted!"),
            ]);
        }

        return redirect('/users');
    }
}
