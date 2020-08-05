<?php

namespace CryptaEve\Seat\SquadSync\Http\Controllers;

use Seat\Web\Http\Controllers\Controller;
use CryptaEve\Seat\SquadSync\Models\Sync;
use CryptaEve\Seat\SquadSync\Validation\AddSquadSync;


class SyncController extends Controller 
{
    // public function getDoctrineView()
    // {
    //     $doctrine_list = $this->getDoctrineList();

    //     return view('fitting::doctrine', compact('doctrine_list'));
    // }

    public function getConfigureView()
    {

        $syncs = Sync::all();

        return view("squadsync::configure", compact('syncs'));
    }

    public function postNewSync(AddSquadSync $request)
    {
        $sync = new Sync();

        $sync->name = $request->name;
        $sync->squad_id = $request->squad;
        $sync->role_id = $request->role;

        $sync->save();

        return redirect()->route('squadsync.configure')->with('success', 'Created New Sync');
    }

    public function deleteSyncById($id)
    {
        Sync::destroy($id);

        return redirect()->route('squadsync.configure')->with('success', 'Deleted Sync');
    }

    public function getAboutView()
    {
        return view("squadsync::about");
    }

}
