<?php

namespace App\Repositories;

use App\Dto\Permission\RoleDto;
use App\Dto\Permission\RoleUpdateDto;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleRepository extends BaseRepository
{
    /**
     * Create a new service instance.
     *
     * @return $reauest, $modal
     */
    public function __construct(Role $model)
    {
        $this->setModel($model);
    }

    public function get_all_roles()
    {
        return $this->_model->where('name', '!=', 'admin')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleDto $data)
    {
        return $this->add($this->_model, $data->toArray());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, RoleUpdateDto $data)
    {
        $result = $this->checkRecord($id);
        return $result ? $result->update($data->toArray()) : null;
    }

    public function assign_permission($data)
    {
        $role = $this->checkRecord($data['role']);
        $permission = Permission::where('id', $data['permission'])->first();

        if ($data['status']) {
            $permission->assignRole($role);
            return ['success' => 'Permission assigned.'];
        } else {
            $role->revokePermissionTo($permission->id);
            return ['warning' => "Permission removed."];
        }
    }
}
