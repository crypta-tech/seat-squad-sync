<?php

namespace CryptaEve\Seat\SquadSync\Models;

use Illuminate\Database\Eloquent\Model;
use Seat\Web\Models\Squads\Squad;
use Seat\Web\Models\Acl\Role;

class Sync extends Model
{
    public $timestamps = true;

    protected $table = 'crypta_seat_squad_sync';

   

}
