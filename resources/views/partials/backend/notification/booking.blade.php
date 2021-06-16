		<a class="clear dropdown-item">
			@if(count($datas) > 0)
			<span id="booking-notf-clear" class="clear-notf" data-href="{{ route('booking-notf-clear') }}">
				{{ __('Clear All') }}
			</span>
			@endif
		</a>
		@if(count($datas) > 0)

		<ul>
		@foreach($datas as $data)
			<li>
				<a class="dropdown-item" >
					 <i class="fas fa-newspaper-o"></i> {{ __('You Have a reservation.') }}
					<small class="d-block notf-time ">{{ $data->created_at->diffForHumans() }}</small>
				</a>
			</li>
		@endforeach

		</ul>

		@else 

		<a class="clear dropdown-item" href="javascript:;">
			{{ __('No New Notifications.') }}
		</a>

		@endif