@extends('web::layouts.grids.12')

@section('title', trans('squadsync::sync.configure'))
@section('page_header', trans('squadsync::sync.configure'))

@inject('Squad', 'Seat\Web\Models\Squads\Squad')
@inject('Role', 'Seat\Web\Models\Acl\Role')

@section('full')
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">{{ trans('squadsync::sync.existing_syncs') }}</h3>
            <div class="card-tools float-right">
               <button type="button" class="btn btn-xs btn-tool" id="addSync" data-toggle="tooltip" data-placement="top" title="Add a new sync">
                   <span class="fa fa-plus-square"></span>
               </button>
           </div>
        </div>
        <div class="card-body">
            <table id="syncs" class="table table table-bordered table-striped">
                <thead>
                <tr>
                    <th>{{ trans('squadsync::sync.name') }}</th>
                    <th>{{ trans_choice('web::squads.squad', 1) }}</th>
                    <th>{{ trans_choice('web::seat.role', 1) }}</th>
                    <th>{{ trans('squadsync::sync.delete') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($syncs as $sync)
                    <tr>
                        <td>{{ $sync->name }}</td>
                        <td>{{ $Squad::find($sync->squad_id)->name }}</td>
                        <td>{{ $Role::find($sync->role_id)->title }}</td>
                        <td><a class="btn btn-xs btn-danger" role="button" href="{{ route('squadsync.deleteSync', $sync->id) }}">Delete!</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="syncEditModal">
       <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
           <div class="modal-header bg-primary">
             <h4 class="modal-title">{{ trans('squadsync::sync.new') }}</h4>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           </div>
           <form role="form" action="{{ route('squadsync.createSync') }}" method="post">
               <div class="modal-body">
                   {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name">{{ trans('squadsync::sync.name') }}</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label for="squad">{{ trans_choice('web::squads.squad', 1) }}</label>
                        <select id="squad" name="squad" class="form-control" style="width: 100%;">
                            @foreach($Squad::all() as $sq)
                                <option value="{{ $sq->id }}">{{ $sq->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="role">{{ trans_choice('web::seat.role', 1) }}</label>
                        <select id="role" name="role" class="form-control" style="width: 100%;">
                            @foreach($Role::all() as $rl)
                                <option value="{{ $rl->id }}">{{ $rl->title }}</option>
                            @endforeach
                        </select>
                    </div>
               </div>
               <div class="modal-footer">
                   <div class="btn-group pull-right" role="group">
                       <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                       <input type="submit" class="btn btn-primary" id="savefitting" value="Create Sync" />
                   </div>
              </div>
           </form>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@stop


@push('head')
<link rel="stylesheet" type="text/css" href="{{ asset('web/css/denngarr-srp-hook.css') }}" />
@endpush

@push('javascript')
@include('web::includes.javascript.id-to-name')
    <script type="application/javascript">
        $(function () {
            $('#syncs').DataTable();

            $('#addSync').on('click', function () {
                $('#syncEditModal').modal('show');
            });

            $('#syncEditModal').on('shown.bs.modal', function () {
                $('#syncEditModal').trigger('focus')
            });
        });
    </script>

@endpush
