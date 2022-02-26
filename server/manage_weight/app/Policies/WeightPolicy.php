<?php

namespace App\Policies;

use App\User;
use App\Weight;
use Illuminate\Auth\Access\HandlesAuthorization;

class WeightPolicy
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

    /**
     * フォルダの閲覧権限
     * @param User $user
     * @param Weight $weight
     * @return bool
     */
    public function view(User $user, Weight $weight)
    {
        return $user ->id === $weight->user_id;
    }
}
