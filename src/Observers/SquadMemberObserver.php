<?php

namespace CryptaEve\Seat\SquadSync\Observers;

use CryptaEve\Seat\SquadSync\Models\Sync;
use Seat\Web\Models\Squads\SquadMember;
use Seat\Web\Models\User;

/**
 * Class SquadMemberObserver.
 *
 * @package Seat\Web\Observers
 */
class SquadMemberObserver
{
    /**
     * @param \Seat\Web\Models\Squads\SquadMember $member
     */
    public function created(SquadMember $member)
    {
        // retrieve user from pivot
        $user = User::find($member->user_id);

        // retreieve any relevant syncs, if there are any
        $syncs = Sync::where('squad_id', $member->squad_id)->get();

        foreach($syncs as $sync) {
            $sync->fullSync();
        }
    }

    /**
     * @param \Seat\Web\Models\Squads\SquadMember $member
     */
    public function deleted(SquadMember $member)
    {
        // retrieve user from pivot
        $user = User::find($member->user_id);

        // retreieve any relevant syncs, if there are any
        $syncs = Sync::where('squad_id', $member->squad_id)->get();

        foreach($syncs as $sync) {
            $sync->fullSync();
        }
    }
}