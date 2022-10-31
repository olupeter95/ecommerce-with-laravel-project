<?php

namespace App\Http\Controllers\Backend;

use App\Actions\Admin\User\AllUser;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    /**
     * Undocumented function
     *
     * @param AllUser $allUser
     * @return void
     */
    public function allUsers(AllUser $allUser)
    {
        return $allUser->handle();
    }
}
