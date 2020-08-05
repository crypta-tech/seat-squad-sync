@extends('web::layouts.grids.4-4-4')

@section('title', trans('squadsync::sync.squad_sync'))
@section('page_header', trans('squadsync::sync.squad_sync'))
@section('page_description', trans('squadsync::sync.squad_sync_about'))

@section('left')

  <div class="card card-default">
    <div class="card-header">
      <h3 class="card-title">Functionality</h3>
    </div>
    <div class="card-body">

     <p>This plugin provides a very simple yet powerful functionality that allows syncing squad members to role affiliations.</p>

     <p>This allows for squads to be created which act as for example a recruitment squad. People who want to apply to corp join the squad. This plugin will then sync the character to be a part of the affiliations of the linked recruitment role.</p>

     <p>As this plugin watches for squad member changes, this should be immediate however there is also a job which can be run to refresh all syncs.</p>

     <div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">DANGER</h4>
        Note that there is no checks at all on who will get synced. If a member is part of a synced squad, they will be added to the relevant roles affiliations list, immediately!
        <hr>
        YOU HAVE BEEN WARNED!
     </div>
    </div>
  </div>
@stop

@section('center')

  <div class="card card-default">
    <div class="card-header">
      <h3 class="card-title">THANK YOU!</h3>
    </div>
    <div class="card-body">
      <div class="box-body">

        <p> Both <strong>SeAT</strong> and <strong>SquadSync</strong> are community creations designed to benefit you! I sincerely hope you enjoy using them. If you are feeling generous then please feel free to front up some isk to either of the projects.</p>

        <p>
            <table class="table table-borderless">
                <tr> <td>SquadSync</td> <td> <a href="https://evewho.com/character/96057938"> {!! img('characters', 'portrait', 96057938, 64, ['class' => 'img-circle eve-icon small-icon']) !!} Crypta Electrica</a></td></tr>

                <tr> <td>Seat</td> <td> <a href="https://evewho.com/corporation/98482334"> {!! img('corporations', 'logo', 98482334, 64, ['class' => 'img-circle eve-icon small-icon']) !!} eveseat.net</a></td></tr>
            </table>
        </p>

        <p> If you are one of those people who feels ISK is never enough..... I will just drop this here.... my <a href="https://www.patreon.com/cryptaelectrica"> patreon</a>.</p>
        </div>
    </div>
  </div>

@stop
@section('right')

  <div class="card card-default">
    <div class="card-header">
      <h3 class="card-title">Info</h3>
    </div>
    <div class="card-body">

      <legend>Bugs and Feature Requests</legend>

      <p>If you encounter a bug or have a suggestion, either contact Crypta-Eve on <a href="https://eveseat.github.io/docs/about/contact/">SeAT-Slack</a> or submit an <a href="https://github.com/Crypta-Eve/seat-squad-sync/issues/new">issue on Github</a></p>

    </div>
  </div>

@stop