<?php

namespace App\Policies;

use App\User;
use App\models\menu;
use Illuminate\Auth\Access\HandlesAuthorization;

class MenuPolicy
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
     * @param  \App\models\menu  $menu
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->checkPermissionAccess('list_menu');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->checkPermissionAccess('add_menu');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\models\menu  $menu
     * @return mixed
     */
    public function update(User $user)
    {
        return $user->checkPermissionAccess('edit_menu');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\models\menu  $menu
     * @return mixed
     */
    public function delete(User $user)
    {
        return $user->checkPermissionAccess('delete_menu');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\models\menu  $menu
     * @return mixed
     */
    public function restore(User $user, menu $menu)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\models\menu  $menu
     * @return mixed
     */
    public function forceDelete(User $user, menu $menu)
    {
        //
    }
}
