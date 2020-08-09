@extends('web::layouts.grids.12')

@section('title', trans('squadsync::sync.squad_sync'))
@section('page_header', trans('squadsync::sync.squad_sync'))
@section('page_description', trans('squadsync::sync.instructions'))

@section('full')

<!-- TOP BANNER -->
<div class="row w-100">
  <div class="col">
    <div class="card card-default">
      <div class="card-header">
        <h1 class="card-title">Preface</h1>
      </div>
      <div class="card-body">
        <p>The following instruction page will demonstrate how to set up SquadSync for its most common intended use case, to allow seat for easy use as a recruitment platform. You should read the entire page before attempting to configure a sync.</p>

        <strong>The Problem</strong>

        <p>
          Traditionally SeAT has required a lot of manual work in order to work as a recruitment platform. 
          The problem is that it is very hard to automatically restrict recruiters to only be able to see the data of recruits, and not their own members.
        </p>

        <p>
          One common method to achieve this with SeAT3 was to create a recruitment role, which gave acess to all character data and then manually add recruits to the affiliations when they apply.
          In SeAT4 this would be a much more involved tasks as the recruit would need to be added to each individual limit. Therefore this plugin has been created to automate the work.
          This is possible due to the amazing new squads that have been added.
        </p>

        <p>
          The below instructions will create a <strong><em>squad</em></strong>, which recruits can apply to; a <strong><em>role</em></strong> which will be assigned to recruitment officers; and a <strong><em>sync</em></strong> which will link the two together.
        </p>
        <p>
          Once complete the recruitment officers access to recruits data is goverened by the recruits presence in the relevant squad.
        </p>
        <div class="alert alert-warning" role="alert">
          <h5 class="alert-heading">Warning!</h5>
          <hr>
          Created syncs will take effect immediately, make sure the squad and role are correct prior to creating the sync
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Middle Instructions -->
<div class="row w-100">
  <div class="col">
    <div class="card-deck">
      <div class="card">
        <div class="card-header" >Step 1</div>
        <div class="card-body">
          <p class="card-text">
            The first step is to create the squad for which recruits should apply to. The squad should be given an informative name and description and maybe even a nice image. The type of group should be changed to <strong>Manual</strong>.
            That is it for the squad, nice and easy. 
          </p>
        </div>
      </div>
      <div class="card">
        <div class="card-header" >Step 2</div>
        <div class="card-body">
          <p class="card-text">
            Next create a new Role from the Access Management screen. This should have a descriptive name as it will be assigned to the recruitment officers. Eg. <em>EHEXP Recruitment</em>. There is no need to assign any permissions to this role.
            All of the recruitment officers should be added to the <em>Members</em> tab of the role.
          </p>
        </div>
      </div>
      <div class="card">
        <div class="card-header" >Step 3</div>
        <div class="card-body">
          <p class="card-text">
            Now that the squad and role have been created, we can create the 'sync'. Head to the <strong>Squad Sync -> Configure page</strong>, and click the + in the top right corner to create a new sync.
            In the modal that appears, enter a name for this sync, select the squad you created in step 1. Also select the role you created in step 2.
            Lastly, add all of the permissions that you need to the list. Once done click create sync. You should see a success window, you are done!
          </p>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Notes -->

<div class="row w-100 mt-3">
  <div class="col">
    <div class="card">
      <div class="card-header" >Notes</div>
      <div class="card-body">
        <div class="alert alert-info" role="alert">
          <h6 class="alert-heading">Unique Sync link</h6>
          <hr>
          Only one sync can exist between a squad and role. Multiple syncs can source the same squad so long as they point to different roles and vice versa.
        </div>
        <div class="alert alert-info" role="alert">
          <h6 class="alert-heading">Roles</h6>
          <hr>
          <p>Once a sync is targetted at a role, you relinquish all control over the permissions of the role to the sync. </p>
          <p>This means it does not matter what permissions you assigned to the role prior to creating the sync, the sync will overwrite them. Similarly the sync will continuosly remove permissions that are not configured in the sync. <p>
        </div>
      </div>
    </div>
  </div>
</div>

@stop