		<a class="clear dropdown-item">
			@if(count($datas) > 0)
			<span id="user-notf-clear" class="clear-notf" data-href="{{ route('user-notf-clear') }}">
				{{ __('Clear All') }}
			</span>
			@endif
		</a>
		@if(count($datas) > 0)

		<ul>
		@foreach($datas as $data)
			<li>
				<a class="dropdown-item" href="{{ route('admin-user-show',$data->user_id) }}">
					 <i class="fas fa-user"></i> {{ __('A New User Has Registered.') }}
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