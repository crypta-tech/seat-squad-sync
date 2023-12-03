<?php

namespace CryptaEve\Seat\SquadSync\Models;

use Illuminate\Database\Eloquent\Model;
use Seat\Web\Models\Squads\Squad;
use Seat\Web\Models\Acl\Permission;
use Seat\Web\Models\Acl\Role;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Sync extends Model
{
    public $timestamps = true;

    protected $table = 'crypta_seat_squad_sync';

    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class, 'crypta_seat_squad_sync_permissions');
    }

    public function squad()
    {
        return $this->belongsTo(Squad::class);
    }
    
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function fullSync()
    {
        // Start by clearing out the existing affiliations 

        foreach($this->role->permissions as $permission)
        {
            $this->role->permissions()->detach($permission);
        }

        // Build the filter

        if($this->squad->members->isEmpty()){
            return;
        }

        $characters = array();
        foreach($this->squad->members as $member)
        {
            foreach($member->characters as $character)
            {
                array_push($characters, array('id' => $character->character_id, 'text' => $character->name));
            }
        }

        $json = json_encode(array('character' => $characters));

        foreach($this->permissions as $perm)
        {
            $this->role->permissions()->attach($perm->id, ['filters' => $json]);
        }
    }

}
