
				<div class="row gutters-sm">
					<div class="col-sm-12 mb-3">
						<div class="card h-100">
							<div class="card-body">
								<h5 class="d-flex align-items-center mb-3">Booking List</h5>
                  <hr>
                  @if($bookings->total() > 0)
                  @foreach($bookings as $booking)
                  <div class="booking-details-row _121gM">
                    <div class="row duraion-booking">
                    <div class="col-sm-12">
                      <h6 class="duraion-booking-time"><b>{{$booking->user->name}}</b></h6>
                    </div>
                      <div class="col-sm-12">
                      <h6 class="duraion-booking-time"><b>Rent the {{$booking->jetski->title}} in  {{$booking->jetski->city}} - {{$booking->jetski->state}}</b></h6>
                    </div>
                </div>
                    <div class="row duraion-booking">
                    <div class="col-sm-12">
                        <button wire:click="show('{{ $booking->id }}')" class="btn-primary btn"> See Inqury</button>
                    </div>
                </div>
                </div>
                @endforeach
                <div class="row text-center">
                  {{ $bookings->links() }}
                </div>
                @else
                  <h6>You have 0 bookings.</h6>
                @endif
              </div>
               <!-- Modal -->
               <div class="modal fade" id="booking-detail-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                 <div class="modal-dialog" role="document">
                   <div class="modal-content">
                     <div class="modal-header">
                       <h5 class="modal-title" id="exampleModalLabel">Booking Detail</h5>
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                       </button>
                     </div>
                     <div class="modal-body">
                    <div class="card-body">
                        <div class="row duraion-booking">
                           <div class="col-sm-4">
                        Duration
                          </div>
                           <div class="col-sm-8 text-secondary">
                              <span class="duraion-booking-time">{{$duration}}</span>
                              <!-- <span class="duraion-booking-time">30 Minutes</span> -->
                           </div>
                        </div>
                           <hr>
                       <div class="row duraion-booking">
                           <div class="col-sm-4">
                        Arrival Date
                          </div>
                           <div class="col-sm-8 text-secondary">
                              <span class="duraion-booking-time">{{date('m-d-Y', strtotime($date))}}</span>
                           </div>
                        </div>
                           <hr>
                          <div class="row duraion-booking">
                           <div class="col-sm-4">
                        Can Book from
                          </div>
                           <div class="col-sm-8 text-secondary">
                              <span class="duraion-booking-time">{{date('m-d-Y', strtotime($flex_start_date))}}</span>
                           </div>
                        </div>
                           <hr>
                         <div class="row duraion-booking">
                           <div class="col-sm-4">
                        To
                          </div>
                           <div class="col-sm-8 text-secondary">
                              <span class="duraion-booking-time">{{date('m-d-Y', strtotime($flex_end_date))}}</span>
                           </div>
                        </div>
                           <hr>
                          <div class="row duraion-booking">
                           <div class="col-sm-4">
                        Group Size
                          </div>
                           <div class="col-sm-8 text-secondary">
                              <p> {{$total_people}} People</p>
                              <span class="duraion-booking-time">Adults - {{$adults}}</span>
                              <span class="duraion-booking-time">Seniors - {{$seniors}}</span>
                              <span class="duraion-booking-time">Children - {{$children}}</span>
                              <span class="duraion-booking-time">Infants - {{$infants}}</span>
                           </div>
                        </div>
                           <hr>
                            <div class="row duraion-booking">
                           <div class="col-sm-4">
                           Impotant Notes
                          </div>
                           <div class="col-sm-8 text-secondary">
                              <span class="duraion-booking-time">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</span>
                           </div>
                        </div>
                           <hr>
                           <h5 class="d-flex align-items-center mb-3">Contact Details</h5>
                          <hr>
                           <div class="row duraion-booking">
                           <div class="col-sm-4">
                        Name
                          </div>
                           <div class="col-sm-8 text-secondary">
                              <span class="duraion-booking-time">Vikas Saini</span>
                           </div>
                        </div>
                            <hr>
                            <div class="row duraion-booking">
                           <div class="col-sm-4">
                        Email
                          </div>
                           <div class="col-sm-8 text-secondary">
                              <span class="duraion-booking-time">myemail.2gmail.com</span>
                           </div>
                        </div>
                          <hr>
                            <div class="row duraion-booking">
                           <div class="col-sm-4">
                        Mobile No.
                          </div>
                           <div class="col-sm-8 text-secondary">
                              <span class="duraion-booking-time">9876543210</span>
                           </div>
                        </div>
                            <hr>
                           <div class="row duraion-booking">
                           <div class="col-sm-8 text-secondary">
                              <p class="mb-0">Without Captain</p>
                              <span class="duraion-booking-time">I want to book without a captain, guide or host.</span>
                           </div>
                        </div>
                            <hr>
                            <div class="row duraion-booking">
                           <div class="col-sm-8 text-secondary">
                              <p class="mb-0">Payment Status</p>
                              <span class="duraion-booking-time">Payment Complete <i class="fa fa-check"></i></span>
                           </div>
                        </div>
                          
                        </div>
                        </div>
                        <div class="modal-footer d-block">
                          <button type="button" class="btn btn-secondary float-left" data-dismiss="modal">Dicline</button>
                          <button type="button" class="btn btn-primary float-right">Apporve</button>
                        </div>
                      </div>
                    </div>
                  </div>   
                  <!-- Modal close -->

                     </div>
								</div>
							</div>
						</div>
					</div>
				</div>

        @section('scripts')
          <script>
              window.addEventListener('showBookingModel', event => {
                $('#booking-detail-modal').modal('show');
              })
          </script>
        @endsection