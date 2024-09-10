<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller implements HasMiddleware
{

    public static function middleware(): array
    {
        return [
        new Middleware('permission:role_show', only: ['index']),
            new Middleware('permission:role_edit', only: ['edit']),
            new Middleware('permission:role_create', only: ['create']),
            new Middleware('permission:role_delete', only: ['destroy']),
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return view('role.list', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function guard_filter(Request $request)
    {
        $guard_name = $request->guard_name;
        $permissions = Permission::where('guard_name', $guard_name)
            ->orderBy('name', 'ASC')
            ->pluck('name');

        return response()->json($permissions);
    }


    public function create()
    {
        $guards = array_keys(config('auth.guards'));

        $permissions = Permission::orderBy('name', 'ASC')->get();
        return view('role.create', compact('permissions','guards'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // dd($request);
            // Validate the request
            $validator = Validator::make($request->all(), [
                'name' => 'required|unique:roles,name|min:3',
                'permissions' => 'required|array',
                'guard' => 'required|string|in:web,admin', // Ensure guard_name is valid
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->messages()], 422);
            }

            $role = Role::create([
                'name' => $request->name,
                'guard_name' => $request->guard,
            ]);

            if (!empty($request->permissions)) {
                foreach ($request->permissions as $name) {
                    $role->givePermissionTo($name);
                }
            }

            return redirect()->route('role.list')->with('message', 'Role created successfully!');


        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $guard = Auth::guard()->name;
        $roles = Role::find($id);
        $permissions = Permission::orderBy('name', 'ASC')->where('guard_name',$roles->guard_name)->get();
        $hasPermissions = $roles->permissions->pluck('name');
        return view('role.edit', compact('roles', 'permissions', 'hasPermissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|exists:roles,id',
                'role' => 'required|unique:roles,name,' . $request->id,
                'guard_name' => 'required|string|in:web,admin',
                'permissions' => 'required|array',
            ]);
            // dd($request->toArray());

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->messages()], 422);
            }

            $role = Role::find($request->id);

            $role->name = $request->role;
            $role->guard_name = $request->guard_name;
            $role->save();

            $permissions = Permission::whereIn('id', $request->permissions)
                ->where('guard_name', $role->guard_name)
                ->pluck('name')->toArray();
                // dd($permissions);

            if ($role->guard_name === 'admin') {
                $permissions = Permission::pluck('name')->toArray();
            }

            $role->syncPermissions($permissions);

            return response()->json(['message' => 'Role updated successfully!'], 200);

        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
