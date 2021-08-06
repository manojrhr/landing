@if(session()->has('message.level'))
    <!-- <div class="alert alert-{{ session('message.level') }}"> 
   		{!! session('message.content') !!}
    </div> -->
@endif

@if(session()->has('message.level'))
	<script type="text/javascript">
		alertify.set('notifier','position', 'top-right');
		alertify.{{ session('message.level') }}('{!! session('message.content') !!}', '', 5,);
		window.timeout = setTimeout(function(){
		alertify.dismissAll();
		},2000);	
	</script>
@endif