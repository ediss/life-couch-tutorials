@if ($message = Session::get('success'))
<div class="alert alert-success alert-block text-message">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif


@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block text-message">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif


@if ($message = Session::get('warning'))
<div class="alert alert-warning alert-block text-message">
	<button type="button" class="close" data-dismiss="alert">×</button>	
	<strong>{{ $message }}</strong>
</div>
@endif


@if ($message = Session::get('info'))
<div class="alert alert-info alert-block text-message text-center">
	<button type="button" class="close" data-dismiss="alert">×</button>	
	<strong class="text-white">{{ $message }}</strong>
</div>
@endif


@if ($errors->any())
<div class="text-message">
	<button type="button" class="close" data-dismiss="alert">×</button>
	@if (count($errors) > 0)
            <div class = "alert alert-danger">
               <ul>
                  @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                  @endforeach
               </ul>
            </div>
            @endif
</div>
@endif