@extends('web::layouts.grids.12')

@section('title', trans('squadsync::sync.configure'))
@section('page_header', trans('squadsync::sync.configure'))

@push('head')
<link rel = "stylesheet"
   type = "text/css"
   href = "https://snoopy.crypta.tech/snoopy/seat-squadsync-configure.css" />
@endpush

@section('full')

@if($syncs->isEmpty())

<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title">{{ trans('squadsync::sync.no_syncs') }}</h3>
    </div>
    <div class="card-body">
        <p>You dont appear to have any Syncs configured. Perhaps you should check out the instructions page!</p>
        <a type="button" href="{{ route('squadsync.instructions') }}" class="btn btn-warning">Instructions</a>
    </div>
</div>

@endif

<div class="card card-success">
    <div class="card-header">
        <h3 class="card-title">{{ trans('squadsync::sync.existing_syncs') }}</h3>
        <div class="card-tools float-right">
            <button type="button" class="btn btn-xs btn-tool" id="addSync" data-toggle="tooltip" data-placement="top"
                title="Add a new sync">
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
                    <th>{{ trans_choice('web::seat.permission', 2) }}</th>
                    <th>{{ trans('squadsync::sync.delete') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($syncs as $sync)
                <tr>
                    <td>{{ $sync->name }}</td>
                    <td><a href="{{ route('squads.show', $sync->squad->id) }}">{{ $sync->squad->name }}</a></td>
                    <td><a href="{{ route('configuration.access.roles.edit', $sync->role->id) }}">{{ $sync->role->title }}</a></td>
                    <td>@foreach($sync->permissions as $perm) {{ $perm->title }} @endforeach</td>
                    <td><a class="btn btn-xs btn-danger" role="button"
                            href="{{ route('squadsync.deleteSync', $sync->id) }}">Delete!</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer text-muted">
        Plugin maintained by <a href="{{ route('squadsync.about') }}"> {!! img('characters', 'portrait', 96057938, 64, ['class' => 'img-circle eve-icon small-icon']) !!} Crypta Electrica</a>. <span class="float-right snoopy" style="color: #fa3333;"><i class="fas fa-signal"></i></span>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="syncEditModal">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title">{{ trans('squadsync::sync.new') }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <form role="form" action="{{ route('squadsync.createSync') }}" method="post" class="needs-validation"
                novalidate>
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="form-row">
                        <div class="col">
                            <div class="form-group">
                                <label for="name">{{ trans('squadsync::sync.name') }}</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Name"
                                    required>
                                <div class="valid-feedback">Looks Good!</div>
                                <div class="invalid-feedback">You need to specify a name</div>
                            </div>
                            <div class="form-group">
                                <label for="squad">{{ trans_choice('web::squads.squad', 1) }}</label>
                                <select id="squad" name="squad" class="form-control" style="width: 100%;" required>
                                    @foreach($squads as $sq)
                                    <option value="{{ $sq->id }}">{{ $sq->name }}</option>
                                    @endforeach
                                </select>
                                <div class="valid-feedback">Looks Good!</div>
                                <div class="invalid-feedback">You need to specify a source squad</div>
                            </div>
                            <div class="form-group">
                                <label for="role">{{ trans_choice('web::seat.role', 1) }}</label>
                                <select id="role" name="role" class="form-control" style="width: 100%;" required>
                                    @foreach($roles as $rl)
                                    <option value="{{ $rl->id }}">{{ $rl->title }}</option>
                                    @endforeach
                                </select>
                                <div class="valid-feedback">Looks Good!</div>
                                <div class="invalid-feedback">You need to specify a target role</div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="permissions">{{ trans_choice('web::seat.permission', 2) }}</label>
                                <select multiple="multiple" id="permissions" name="permissions[]" class="form-control selectpicker"
                                    style="width: 100%;" size="7" required>
                                    @foreach($perms as $pm)
                                    <option value="{{ $pm->id }}">
                                        {{ trans('web::permissions.' . str_replace('.', '_', $pm->title) . '_label') }}
                                    </option>
                                    @endforeach
                                </select>
                                <div class="valid-feedback">Looks Good!</div>
                                <div class="invalid-feedback">You need to specify at least one permission to grant</div>
                            </div>
                            <div class="button-group mt-1 float-right">
                                <button type="button" class="btn btn-success btn-xs" id="addall">Add all permissions</button>
                                <button type="button" class="btn btn-danger btn-xs" id="removeall">Remove all permissions</button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="btn-group float-right" role="group">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <input type="submit" class="btn btn-primary" id="savefitting" value="Create Sync" />
                        </div>
                    </div>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@stop

@push('javascript')
@include('web::includes.javascript.id-to-name')
<script type="application/javascript">
    $(function () {
        $('#syncs').DataTable();

        $('#addSync').on('click', function () {
            $('#syncEditModal').modal('show');
        });

        $('#addall').on('click', function () {
            $('#permissions option').prop("selected","selected");
            $('#permissions').selectpicker('refresh');

        });

        $('#removeall').on('click', function () {
            $('#permissions option').prop("selected", false);
            $('#permissions').selectpicker('refresh');

        });

        $('#syncEditModal').on('shown.bs.modal', function () {
            $('#syncEditModal').trigger('focus')
        });

    });
</script>

<script type="application/javascript">
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function () {
        'use strict';
        window.addEventListener('load', function () {
            // Clear out the modals
            document.getElementById("squad").selectedIndex = -1;
            document.getElementById("role").selectedIndex = -1;
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function (form) {
                form.addEventListener('submit', function (event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>



@endpush