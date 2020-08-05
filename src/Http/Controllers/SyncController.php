<?php

namespace CryptaEve\Seat\SquadSync\Http\Controllers;

use Seat\Web\Http\Controllers\Controller;


class SyncController extends Controller 
{
    // public function getDoctrineView()
    // {
    //     $doctrine_list = $this->getDoctrineList();

    //     return view('fitting::doctrine', compact('doctrine_list'));
    // }

    public function getConfigureView()
    {
        return "NYI";
    }

    public function getAboutView()
    {
        return view("squadsync::about");
    }

}
