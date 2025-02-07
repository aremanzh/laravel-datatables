@props(['heading', 'section', 'subsection', 'icon'])

<div class="panel-heading panel-align">
  <h2 class="panel-heading panel-title" style="display:inline-block;"><button class="btn btn-danger"><strong>{{$heading}}</strong></button></h2>
  <ol class="breadcrumb pull-right" style="margin-bottom: 0px!important;">
      <span class="fa--tachometer"></span>
      <li>{{$section}}</li>
      <li class="active">{{$subsection}}</li>
  </ol> 
</div> 