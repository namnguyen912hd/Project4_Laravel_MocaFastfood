<?php

namespace App\Policies;

use App\User;
use App\models\role;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\models\role  $role
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->checkPermissionAccess('list_role');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->checkPermissionAccess('add_role');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\models\role  $role
     * @return mixed
     */
    public function update(User $user)
    {
        return $user->checkPermissionAccess('edit_role');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\models\role  $role
     * @return mixed
     */
    public function delete(User $user)
    {
        return $user->checkPermissionAccess('delete_role');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\models\role  $role
     * @return mixed
     */
    public function restore(User $user, role $role)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\models\role  $role
     * @return mixed
     */
    public function forceDelete(User $user, role $role)
    {
        //
    }
}
