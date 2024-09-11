@foreach($abilities as $module => $permissions)

    <br/>
    <h5>{{ucfirst($module)}}</h5>
    <div class="row" {{ isset($disable) && $disable ? 'disabled' : ''}}>

        @foreach($permissions as $permission)
            @php
                $ability = $module . '.' . $permission;
                $selectedPermissions = [];
                if (isset($role)) {
                    $selectedPermissions = $role->permission_array;
                }
            @endphp
            <div class="col col-md-3">
                <label class="form-label" for="">{{ $permission }}</label><br/>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <input value="false" class="btn-check deny" id="perm-{{ $module . '-' .$permission }}-deny" type="radio" autocomplete="off"  name="permissions[{{$module}}][{{$permission}}]" {{ \Illuminate\Support\Arr::get($selectedPermissions, $ability) === false ? 'checked="checked"': '' }}>
                    <label class="btn btn-info text-white" for="perm-{{ $module . '-' .$permission }}-deny">Deny</label>

                    <input value="" class="btn-check default" id="perm-{{ $module . '-' .$permission }}-inherit" type="radio"  autocomplete="off"  name="permissions[{{$module}}][{{$permission}}]" {{ \Illuminate\Support\Arr::get($selectedPermissions, $ability) === null ? 'checked="checked"': '' }}>
                    <label class="btn btn-info text-white" for="perm-{{ $module . '-' .$permission }}-inherit">Inherit</label>

                    <input value="true" class="btn-check allow" id="perm-{{ $module . '-' .$permission }}-allow" type="radio"  autocomplete="off"  name="permissions[{{$module}}][{{$permission}}]" {{ \Illuminate\Support\Arr::get($selectedPermissions, $ability) === true ? 'checked="checked"': '' }}>
                    <label class="btn btn-info text-white" for="perm-{{ $module . '-' .$permission }}-allow">Allow</label>
                </div>

            </div>
        @endforeach
    </div>
@endforeach
