<?php

namespace Tareghnazari\User\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Tareghnazari\RolePermissions\Models\Permission;
use Tareghnazari\User\Models\User;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function edit($user)
    {
        if ($user->hasPermissionTo(Permission::PERMISSION_MANAGE_USERS)) {
            return true;
        }

    }

}
