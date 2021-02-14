@if(session()->has('message.level'))
    <!-- <div class="alert alert-{{ session('message.level') }}"> 
   		{!! session('message.content') !!}
    </div> -->
@endif

@if(session()->has('message.level'))
<script type="text/javascript">
	alertify.{{ session('message.level') }}('{!! session('message.content') !!}');
</script>
@endif