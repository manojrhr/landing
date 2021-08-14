@extends('layouts.web.master')

@section('content')

		<div id="main-content">
			<div class="section-tour-one">
				<div class="container">
					<h1 class="tour-page-title">Our Tours</h1>
				</div>
				<img src="{{ asset('assets/web/images/mapbg.png') }}" alt="map">
			</div>
            <livewire:tours-list />
		</div>

@endsection