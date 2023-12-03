<?php

namespace CryptaEve\Seat\SquadSync\Http\Controllers;

use Seat\Web\Http\Controllers\Controller;
use CryptaEve\Seat\SquadSync\Models\Sync;
use CryptaEve\Seat\SquadSync\Validation\AddSquadSync;
use Seat\Web\Models\Acl\Role;
use Seat\Web\Models\Acl\Permission;
use Seat\Web\Models\Squads\Squad;
use Illuminate\Database\QueryException;


class SyncController extends Controller 
{

    public function getConfigureView()
    {

        $syncs = Sync::with('permissions')->get();
        $squads = Squad::all();
        $roles = Role::all();
        $perms = Permission::where('title', 'LIKE', 'character.%')->get();

        return view("squadsync::configure", compact('syncs', 'squads', 'roles', 'perms'));
    }

    public function postNewSync(AddSquadSync $request)
    {
        try{
            $sync = new Sync();

            $sync->name = $request->name;
            $sync->squad_id = $request->squad;
            $sync->role_id = $request->role;

            $sync->save();
            $sync = $sync->fresh();

            foreach($request->permissions as $perm)
            {
                $permission = Permission::find($perm);
                $sync->permissions()->save($permission);
            }
    
            return redirect()->route('cryptasquadsync::configure')->with('success', 'Created New Sync');
        }
        catch (QueryException $e)
        {
            return redirect()->route('cryptasquadsync::configure')->with('error', 'Error creating sync, does it already exist?');
        }
        
    }

    public function deleteSyncById($id)
    {
        Sync::destroy($id);

        return redirect()->route('cryptasquadsync::configure')->with('success', 'Deleted Sync');
    }

    public function getAboutView()
    {
        return view("squadsync::about");
    }

    public function getInstructionsView()
    {
        return view("squadsync::instructions");
    }

}
