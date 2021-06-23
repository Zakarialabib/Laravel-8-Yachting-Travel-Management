@extends('layouts.backend')

@section('page-title')  {{__('Dashboard')}}  @endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if (session('status'))
                <div class="alert round bg-success alert-icon-left alert-arrow-left alert-dismissible mb-2" role="alert">
                    <span class="alert-icon"><i class="la la-thumbs-o-up"></i></span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <strong>{{__('Great !!!')}} </strong> {{ session('status') }}
                </div>
            @endif
            @if($errors->any())
                @foreach($errors->all() as $serial => $error)
                    <div class="alert round bg-danger alert-icon-left alert-arrow-left alert-dismissible mb-2" role="alert">
                        <span class="alert-icon"><i class="la la-thumbs-o-down"></i></span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <strong>{{__('Oops!')}}</strong> {{$error}}
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-xl-3 col-md-4 col-sm-6">
            <div class="card text-center">
                <div class="card-content">
                    <div class="card-body">
                        <div class="avatar bg-rgba-info  m-0 mb-1">
                            <div class="avatar-content">
                                <i class="fa fa-building text-info font-medium-5"></i>
                            </div>
                        </div>
                        <h2 class="text-bold-700">{{$count_categories}}</h2>
                        <p class="mb-0 line-ellipsis">{{__('Categories')}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-4 col-sm-6">
            <div class="card text-center">
                <div class="card-content">
                    <div class="card-body">
                        <div class="avatar bg-rgba-warning  m-0 mb-1">
                            <div class="avatar-content">
                                <i class="fa fa-home text-warning font-medium-5"></i>
                            </div>
                        </div>
                        <h2 class="text-bold-700">{{$count_offers}}</h2>
                        <p class="mb-0 line-ellipsis">{{__('Offers')}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-4 col-sm-6">
            <div class="card text-center">
                <div class="card-content">
                    <div class="card-body">
                        <div class="avatar bg-rgba-primary  m-0 mb-1">
                            <div class="avatar-content">
                                <i class="fa fa-envelope text-secondary font-medium-5"></i>
                            </div>
                        </div>
                        <h2 class="text-bold-700">{{$count_suscribers}}</h2>
                        <p class="mb-0 line-ellipsis">{{__('Subscribers')}}</p>
                    </div>
                </div>
            </div>
        </div>        
        <div class="col-xl-3 col-md-4 col-sm-6">
            <div class="card text-center">
                <div class="card-content">
                    <div class="card-body">
                        <div class="avatar bg-rgba-warning  m-0 mb-1">
                            <div class="avatar-content">
                                <i class="fa fa-pencil text-primary font-medium-5"></i>
                            </div>
                        </div>
                        <h2 class="text-bold-700">{{$count_posts}}</h2>
                        <p class="mb-0 line-ellipsis">{{__('Posts')}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row my-3 w-100">
        <ul class="d-flex justify-content-end w-100">
            <li class="mr-2">
                <button type="button" data-date="today" class="js-date btn btn-outline-secondary btn-round-lg active">{{__('Today')}}</button>
            </li>
            <li class="mr-2">
                <button type="button" data-date="month" class="js-date btn btn-outline-secondary btn-round-lg">{{__('Last month')}}</button>
            </li>
            <li class="mr-2">
                <button type="button" data-date="semi" class="js-date btn btn-outline-secondary btn-round-lg">{{__('Last 6 month')}}</button>
            </li>
            <li class="mr-2">
                <button type="button" data-date="year" class="js-date btn btn-outline-secondary btn-round-lg">{{__('Last year')}}</button>
            </li>
        </ul>
    </div>
    @foreach ($data as $key => $d)
    @if ($loop->first)
    <div class="row js-date-row" id="{{$key}}">
        <div class="row w-100">
            <div class="col-xl-6 col-md-6 col-sm-6">
                <div class="card text-center">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="avatar bg-rgba-info  m-0 mb-1">
                                <div class="avatar-content">
                                    <i class="fa fa-calendar text-danger font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="text-bold-700">{{$d['package_bookings']}}</h2>
                            <p class="mb-0 line-ellipsis">{{__('Bookings')}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-md-6 col-sm-6">
                <div class="card text-center">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="avatar bg-rgba-info  m-0 mb-1">
                                <div class="avatar-content">
                                    <i class="fa fa-user text-success font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="text-bold-700">{{$d['users']}}</h2>
                            <p class="mb-0 line-ellipsis">{{__('Users')}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="row js-date-row" style="display: none" id="{{$key}}">
        <div class="row w-100">
            <div class="col-xl-6 col-md-6 col-sm-6">
                <div class="card text-center">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="avatar bg-rgba-info  m-0 mb-1">
                                <div class="avatar-content">
                                    <i class="fa fa-calendar text-danger font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="text-bold-700">{{$d['package_bookings']}}</h2>
                            <p class="mb-0 line-ellipsis">{{__('Bookings')}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-md-6 col-sm-6">
                <div class="card text-center">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="avatar bg-rgba-info  m-0 mb-1">
                                <div class="avatar-content">
                                    <i class="fa fa-user text-success font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="text-bold-700">{{$d['users']}}</h2>
                            <p class="mb-0 line-ellipsis">{{__('Users')}}</p>
                        </div>
                    </div>
                </div>
            </div>        
        </div>
    </div>
    @endif
    @endforeach
</div>
@endsection


@push('scripts')
    <script>
        document.querySelectorAll('.js-date').forEach(el => {
            el.addEventListener('click', event => {
                clearActive();
                hideAll();
                el.classList.add('active');
                document.querySelector(`#${el.dataset.date}`).style.display = 'flex';
            });
        });

        const clearActive = () => {
            document.querySelectorAll('.js-date').forEach(el => {
                el.classList.remove('active');
            });
        };

        const hideAll = () => {
            document.querySelectorAll('.js-date-row').forEach(el => {
                el.style.display = 'none';
            });
        };
    </script>
@endpush
