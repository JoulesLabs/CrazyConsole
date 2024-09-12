<?php

namespace App\Http\Controllers;

use App\Enums\NoticeType;
use App\Models\User;
use HotwiredLaravel\TurboLaravel\Http\MultiplePendingTurboStreamResponse;
use HotwiredLaravel\TurboLaravel\Http\PendingTurboStreamResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Nahid\Permit\Facades\Permit;
use Nahid\Permit\Roles\Role;


class RoleController extends Controller
{
    public function index(): View
    {
        //user()->allows('role.list'); //user()->allows(['customer.list' => [$id]]); for passing id, we can pass multiple params

        $roles = Role::paginate(20);

        return view('roles.index', compact('roles'));
    }

    public function create(): View
    {
        //user()->allows('role.create');

        $abilities = Permit::getAbilities();

        return view('roles.create', compact('abilities'));
    }

    public function store(Request $request): MultiplePendingTurboStreamResponse|PendingTurboStreamResponse|RedirectResponse
    {
        //user()->allows('role.create');

        try {
            $request->validate([
                'role_name' => ['required'],
                'permissions' => ['required', 'array']
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            if ($request->wantsTurboStream()) {
                return turbo_stream([
                    turbo_stream()->notice(NoticeType::ERROR, $e->validator->errors()->first()),
                ]);
            }

            return back()->with(['_status' => 'error','_notice' => $e->validator->errors()->first()]);
        }



        /*if (user()->canDo('user.store')) {
            $this->validate($request, [
                'role_name' => ['required']
            ]);
        }*/

        $data['role_name'] = $request->input('role_name');
        $data['permission'] = $request->input('permissions', []);

        $role = new Role();
        $role->fill($data);

        if (!$role->save()) {
            if ($request->wantsTurboStream()) {
                return turbo_stream([
                    turbo_stream()->notice(NoticeType::ERROR, "Unable to save the data!"),
                ]);
            }

            return redirect()->back()->with(['_status' => 'error', '_notice' => 'Unable to save the data!']);
        }

        if ($request->wantsTurboStream()) {
            return turbo_stream([
                turbo_stream()->update('role-create', view('roles.partials.create', ['abilities' => Permit::getAbilities()])),
                turbo_stream()->notice(NoticeType::SUCCESS, "Successfully created role!"),
            ]);
        }

        return redirect()->back()->with(['_status' => 'success', '_notice' => 'Successfully created role!']);
    }


        public function edit(string $id): View
        {
//            user()->allows('role.update');

            $role = Role::findOrFail((int) $id);
            $abilities = Permit::getAbilities();

            return view('roles.edit', compact('role', 'abilities'));
        }


        public function update(string $id, Request $request): MultiplePendingTurboStreamResponse|PendingTurboStreamResponse|RedirectResponse
        {
           // user()->allows('role.update');

            try {
                $request->validate([
                    'role_name' => ['required'],
                    'permissions' => ['required', 'array']
                ]);

                $role = Role::findOrFail((int) $id);
            } catch (\Illuminate\Validation\ValidationException $e) {
                if ($request->wantsTurboStream()) {
                    return turbo_stream([
                        turbo_stream()->notice(NoticeType::ERROR, "Unable to update the data!"),
                    ]);
                }

                return redirect()->back()->with(['_status' => 'error', '_notice' => 'Unable to update the data!']);
            }

            $data['role_name'] = $request->input('role_name');
            $data['permission'] = $request->input('permissions', []);

            $role->fill($data);

            if (!$role->save()) {
                if ($request->wantsTurboStream()) {
                    return turbo_stream([
                        turbo_stream()->notice(NoticeType::ERROR, "Unable to update the data!"),
                    ]);
                }

                return redirect()->back()->with(['_status' => 'error', '_notice' => 'Unable to update the data!']);
            }

            return redirect('/roles')->with(['_status' => 'success', '_notice' => 'Successfully updated role!']);
        }

    public function destroy(int $id, Request $request)
    {
        $role = Role::find($id);
        $id = $role->id;

        $role->delete();

        if ($request->wantsTurboStream()) {
            return turbo_stream([
                turbo_stream()->update('role-' . $id),
                turbo_stream()->notice(NoticeType::SUCCESS, "Role {$role->name} was deleted!"),
            ]);
        }

        return redirect('/roles')->with(['_notice' => 'Role deleted successfully!', '_status' => 'success']);
    }
}

