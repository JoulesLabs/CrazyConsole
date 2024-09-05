<?php

namespace App\Http\Controllers;

use App\Enums\NoticeType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required|confirmed',
            ]);
            $user = User::create($data);
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
                    turbo_stream()->notice(NoticeType::ERROR, "User creation failed!"),
                ]);
            }

            return back()->with('error', 'An error occurred while creating the user.');
        }


        if ($request->wantsTurboStream()) {
            return turbo_stream([
                turbo_stream()->update('user-create', view('users.partials.create')),
                turbo_stream()->notice(NoticeType::SUCCESS, "User {$request->name} was created!"),
            ]);
        }

        return redirect('/users/create');

    }

    public function edit(int $id)
    {
        $user = User::find($id);

        return view('users.edit', compact('user'));
    }

    public function update(Request $request)
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

            $user = User::find($request->id);

            $user->update($data);
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
        $id = $user->id;

        $user->delete();

        if ($request->wantsTurboStream()) {
            return turbo_stream([
                turbo_stream()->update('user-' . $id),
                turbo_stream()->notice(NoticeType::SUCCESS, "User {$user->name} was deleted!"),
            ]);
        }

        return redirect('/users');
    }
}
