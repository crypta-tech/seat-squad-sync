@extends('web::layouts.grids.6-6')

@section('title', trans('squadsync::sync.squad_sync'))
@section('page_header', trans('squadsync::sync.squad_sync'))
@section('page_description', trans('squadsync::sync.squad_sync_about'))

@section('left')

  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">{{ trans('squadsync::sync.squad_sync') }}</h3>
    </div>
    <div class="panel-body">
      <div class="box-body">

        <legend>Thank you</legend>

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

  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">About</h3>
    </div>
    <div class="panel-body">

      <legend>Bugs and Feature Requests</legend>

      <p>If you encounter a bug or have a suggestion, either contact Crypta-Eve on SeAT-Slack or submit an <a href="https://github.com/Crypta-Eve/seat-squad-sync/issues/new">issue on Github</a></p>

    </div>
  </div>

@stop