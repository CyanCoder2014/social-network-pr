<?php
/**
 * Created by PhpStorm.
 * User: FARID
 * Date: 9/23/2017
 * Time: 1:20 AM
 */

namespace App\Http\Controllers\Auth;


class UserActivation
{







    public function activateUser($token)
    {
        $activation = $this->activationRepo->getActivationByToken($token);

        if ($activation === null) {
            return null;
        }

        $user = User::find($activation->user_id);

        $user->activated = true;

        $user->save();

        $this->activationRepo->deleteActivation($token);

        return $user;
    }



}