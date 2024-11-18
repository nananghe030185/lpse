<?php

namespace App;

use App\Models\Komisi;
use App\Models\Setting;
use App\Models\User;
use App\Models\UserGroup;
use App\Models\UserProfile;

class AppLpse
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public static function setting($key)
    {
        return Setting::where('key', $key)->first()->value;
    }

    public static function usergroup($id)
    {
        return UserGroup::where('id', $id)->first()->name;
    }

    public static function getUpline()
    {
        $result = [];
        $usernames = Komisi::select('id_upline')->groupBy('id_upline')->where('state', false)->get();
        foreach ($usernames as $userid) {
            $user = User::where('id', $userid->id_upline)->first();

            $result[$user->id] = $user->name;
        }

        return $result;
    }
}
