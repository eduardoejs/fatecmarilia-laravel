<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\ControleAcesso\Permission;

class PermissionsController extends Controller
{
    private $limitPagination = 20;

    public function __construct()
    {
        $this->authorize('permission_admin');
    }
    public function index()
    {
        $permissions = Permission::paginate($this->limitPagination);
        return view('admin.permissions.index', compact('permissions'));
    }

    public function create()
    {
        return view('admin.permissions.create');
    }

    public function store(Request $request)
    {
        Permission::create($request->all());
        return redirect()->route('admin.permissions.index');
    }

    public function edit($id)
    {
        $permission = Permission::find($id);
        return view('admin.permissions.edit', compact('permission'));
    }

    public function update(Request $request, $id)
    {
        Permission::find($id)->update($request->all());
        return redirect()->route('admin.permissions.index');
    }

    public function destroy($id)
    {
        $permission = Permission::find($id);
        Permission::find($id)->delete();
        return redirect()->route('admin.permissions.index')->with(['status' => 'Permissão: '.$permission->name.' foi excluída']);
    }
    
    public function search(Request $request)
    { 
        $search = $request->input('search');  
        if(!empty($request->input('search'))){
            $permissions = Permission::where('name', 'like', '%'.$request->input('search').'%')->orWhere('description','like', '%'.$request->input('search').'%')->paginate($this->limitPagination);
            return view('admin.permissions.index', compact('permissions', 'search'));
        }        
        return redirect()->route('admin.permissions.index');
    }
}
