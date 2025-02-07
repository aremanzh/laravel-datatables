@if(session('success'))  
    <div class="alert alert-success alert-dismissible" role="alert">
      {{ session('success') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
@endif


@if(session('error')) 
    <div class="alert alert-danger alert-dismissible" role="alert">
      {{ session('error') }}
    </div>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
@endif