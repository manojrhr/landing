@extends('layouts.web.master')

@section('title', $cat->meta_title)
@section('keywords', $cat->meta_description)
@section('description', $cat->meta_keywords)

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