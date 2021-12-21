
			{{-- <!--Section Tour Two--> --}}
			<div class="section-tour-two">
				<div class="container">
					<div class="middle-container">
						<div class="tours-items-block">
							<div class="search-tour">
								<form class="d-flex flex-wrap justify-content-center">
									<input class="tour-search-input" type="search" autocomplete="off" value=""
										placeholder="Search our Tours..." wire:model.debounce.500ms="searchTerm" >
									<button type="button" class="tour-filter-submit">
										<i class="fa fa-search"></i>
									</button>
								</form>
							</div>


							<div class="tours-smart-filters-checkboxes">
								<div
									class="d-flex flex-wrap justify-content-center align-items-center cover-tours-checkboxes-list">
									<div
										class="d-flex flex-wrap justify-content-center align-items-center tours-checkboxes-list">
										<div class="tours-checkboxes-list-item">
											<span class="list-checkboxes-icon">
												<i class="fa fa-check check-icon"></i>
											</span>
											<span class="list-checkboxes-label">Adventure</span>
										</div>
										<div class="tours-checkboxes-list-item">
											<span class="list-checkboxes-icon">
												<i class="fa fa-check check-icon"></i>
											</span>
											<span class="list-checkboxes-label">Historical</span>
										</div>
										<div class="tours-checkboxes-list-item">
											<span class="list-checkboxes-icon">
												<i class="fa fa-check check-icon"></i>
											</span>
											<span class="list-checkboxes-label">Nature</span>
										</div>
									</div>
								</div>
							</div>



							<div class="tour-filters-list">
								@if($tours->isEmpty())
									<div class="text-center"><h3>No Tour Found</h3></div>
								@endif
							</div>

							<div class="row flex-wrap row-tour-item">
                                @foreach ($tours as $tour)
									{{-- @if(count($tour->option) > 0 && $tour->active) --}}
										<div class="col-md-4 tour-item">
											<div class="tour-inner-item">
												<div class="tour-item-img"><a class="stretched-link"
														href="{{ route('tour.single',$tour->slug) }}"><img
															src="{{ asset($tour->image) }}" /></a></div>
												<div class="tour-item-content">
													<h4>{{ $tour->title }}</h4>
													<div class="tour-text-editor">{!! substr($tour->description, 0, 100) !!}...</div>
													<div class="tour-more-button"><a class="stretched-link more-details-btn"
															href="{{ route('tour.single',$tour->slug) }}">More Details<i
																class="fa fa-chevron-right" aria-hidden="true"></i></a></div>
												</div>
											</div>
										</div>
									{{-- @endif --}}
                                @endforeach
							</div>
							{{-- <!-- Tour Pagination --> --}}
							{{-- {{ $tours->links('livewire.pagination-template') }} --}}
							<div class="d-flex flex-wrap justify-content-center tour-filters-pagination">
								{{ $tours->links() }}
							</div>
							{{-- <div class="d-flex flex-wrap justify-content-center tour-filters-pagination">
								<span class="tour-pagination-item">
									<a class="tour-pagination-link tour-pagination-current">1</a>
								</span>
								<span class="tour-pagination-item">
									<a class="tour-pagination-link">2</a>
								</span>
								<span class="tour-pagination-item prev-next next">
									<a class="tour-pagination-link prev-next next">Next</a>
								</span>
							</div> --}}
						</div>
					</div>
				</div>
			</div>