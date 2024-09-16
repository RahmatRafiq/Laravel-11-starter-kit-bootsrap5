<?php

namespace App\Http\Controllers\RolePermission;

use App\Helpers\DataTable;
use App\Helpers\Guards;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class RoleController extends Controller
{
    public function index()
    {
        return view('admin.role-permission.role.index');
    }

    public function json(Request $request)
    {
   $search = $request->search['value'];
        $query = Role::query();

        // columns
        $columns = [
            'id',
            'name',
            'guard_name',
            'created_at',
            'updated_at',
        ];

        // search
        if ($request->filled('search')) {
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('guard_name', 'like', "%{$search}%");
        }

        // order
        if ($request->filled('order')) {
            $query->orderBy($columns[$request->order[0]['column']], $request->order[0]['dir']);
        }

        $data = DataTable::paginate($query, $request);

        return response()->json($data);
    }

    public function create()
    {
        return view('admin.role-permission.role.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:roles',
            'guard_name' => ['required', 'string', 'max:255', Rule::in(Guards::list())],
        ]);

        $role = new Role();
        $role->name = $validatedData['name'];
        $role->guard_name = $validatedData['guard_name'];
        $role->save();
        return redirect()->route('role.index')->with('success', 'Role created successfully.');
    }

    public function show(Role $role)
    {
        //
    }
    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('admin.role-permission.role.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, Role $role)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:roles,name,' . $role->id,
            'guard_name' => ['required', 'string', 'max:255', Rule::in(Guards::list())],
            'permissions' => 'required|array',
        ]);

        $role->syncPermissions($validatedData['permissions']);
        $role->name = $validatedData['name'];
        $role->guard_name = $validatedData['guard_name'];
        $role->save();

        return redirect()->route('role.index')->with('success', 'Role updated successfully.');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return response()->json(['message' => 'Role deleted successfully.']);
    }

    // public function addPermissionToRole(Role $role)
    // {
    //     $permissions = Permission::all();
    //     return view('admin.role-permission.role.add-permission', compact('role', 'permissions'));
    // }

}
