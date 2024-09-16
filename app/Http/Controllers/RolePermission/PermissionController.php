<?php

namespace App\Http\Controllers\RolePermission;

use App\Helpers\DataTable;
use App\Helpers\Guards;
use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.role-permission.permission.index');
    }

    public function json(Request $request)
    {
        $search = $request->search['value'];
        $query = Permission::query();

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

    // create reusable function to serve Datatable ajax according json function above

    public function create()
    {
        return view('admin.role-permission.permission.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:permissions',
            'guard_name' => ['required', 'string', 'max:255', Rule::in(Guards::list())],
        ]);

        $permission = new Permission();
        $permission->name = $validatedData['name'];
        $permission->guard_name = $validatedData['guard_name'];
        $permission->save();

        return redirect()->route('permission.index')->with('success', 'Permission created successfully.');
    }

    public function show(Request $request)
    {
        //
    }
    
    public function edit(Request $request, $id)
    {
        $permission = Permission::findOrFail($id);
        return view('admin.role-permission.permission.edit', compact('permission'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:permissions,name,' . $id,
            'guard_name' => 'required|string|max:255',
        ]);

        $permission = Permission::findOrFail($id);
        $permission->name = $validatedData['name'];
        $permission->guard_name = $validatedData['guard_name'];
        $permission->save();

        return redirect()->route('permission.index')->with('success', 'Permission updated successfully.');
    }

    public function destroy($id)
    {
        $permission = Permission::findOrFail($id);
        $permission->delete();

        return redirect()->route('permission.index')->with('success', 'Permission deleted successfully.');
    }
}
