<?php

namespace App\Http\Controllers;

use App\Dto\Permission\RoleDto;
use App\Dto\Permission\RoleUpdateDto;
use App\Http\Requests\RolePermission\AssignPermission;
use App\Http\Requests\RolePermission\RoleRequest;
use App\Http\Requests\RolePermission\RoleUpdateRequest;
use App\Repositories\PermissionRepository;
use App\Repositories\RoleRepository;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class RoleController extends BaseController
{
    public function __construct(RoleRepository $repo)
    {
        $this->setRepo($repo, "auth.pages.roles", "roles");
    }

    public function index()
    {
        $roles = $this->_repo->get_all_roles();
        $permissionRepo = app(PermissionRepository::class);
        $permissions = $permissionRepo->index();

        return view($this->_directory . '.all', compact('roles', 'permissions'));
    }

    public function store(RoleRequest $request)
    {
        try {
            $this->_repo->store(RoleDto::fromRequest($request->validated()));
            return redirect()->route($this->_route . '.index')->with('success', 'Successfully created.');
        } catch (\Throwable $th) {
            return redirect()->route($this->_route . '.index')->with('error', 'Something went wrong..');
        }
    }

    public function update(RoleUpdateRequest $request, $id)
    {
        try {
            $this->_repo->update($id, RoleUpdateDto::fromRequest($request->validated()));
            return redirect()->route($this->_route . '.index')->with('success', 'Updated succesfully');
        } catch (\Throwable $th) {
            if ($th instanceof NotFoundHttpException) {
                $message = $th->getMessage();
                return redirect()->route($this->_route . '.index')->with('error', $message);
            } else {
                return redirect()->route($this->_route . '.index')->with('error', 'Something went wrong..');
            }
        }
    }

    public function assign_permission(AssignPermission $request)
    {
        try {
            $data = $this->_repo->assign_permission($request->validated());
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            $message = $th->getMessage();
            if ($th instanceof NotFoundHttpException) {
                return response()->json(['warning' => $message], Response::HTTP_BAD_REQUEST);
            } else {
                return response()->json(['error' => "Something went wroung..."], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
        }
    }
}
