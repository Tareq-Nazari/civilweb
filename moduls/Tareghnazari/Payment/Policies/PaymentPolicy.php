<?php

namespace Tareghnazari\Payment\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Tareghnazari\RolePermissions\Models\Permission;
use Tareghnazari\User\Models\User;

class PaymentPolicy
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

    public function index($user)
    { dd(1);
        if ($user->hasPermissionTo(Permission::PERMISSION_MANAGE_PAYMENTS)) return true;
    }
}
