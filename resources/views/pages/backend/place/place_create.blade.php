@extends('layouts.backend')

@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>{{ __('Add place') }}</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 bg-white">
            <div class="x_panel">
                <div class="x_content row">
                    <div class="col-lg-3 col-xs-3 col-sm-3">
                        <ul class="nav nav-pills flex-column tabs-left place_create_menu">
                            <li class="nav-item"><a href="#genaral">{{ __('Genaral') }}</a></li>
                            <li class="nav-item"><a href="#hightlight">{{ __('Hightlight') }}</a></li>
                            <li class="nav-item"><a href="#location">{{ __('Location') }}</a></li>
                            <li class="nav-item"><a href="#media">{{ __('Media') }}</a></li>
                            <li class="nav-item"><a href="#golo_seo">{{ __('SEO') }}</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-8 col-sm-8 col-xs-8 place_create">
                        <form action="{{ route('place_store') }}" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="tab-content">
                                <ul class="nav nav-tabs bar_tabs" role="tablist">
                                    @foreach ($languages as $index => $language)
                                        <li class="nav-item">
                                            <a class="nav-link {{ $index !== 0 ?: 'active' }}" id="home-tab"
                                                data-toggle="tab" href="#language_{{ $language->code }}" role="tab"
                                                aria-controls="" aria-selected="">{{ $language->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                                <div id="genaral">
                                    <p class="lead">{{ __('Genaral') }}</p>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <div class="tab-content">
                                                @foreach ($languages as $index => $language)
                                                    <div class="tab-pane fade show {{ $index !== 0 ?: 'active' }}"
                                                        id="language_{{ $language->code }}" role="tabpanel"
                                                        aria-labelledby="home-tab">
                                                        <div class="form-group">
                                                            <label for="place_name">{{ __('Place name') }}
                                                                <small>({{ $language->code }})</small> : *</label>
                                                            <input type="text" class="form-control"
                                                                name="{{ $language->code }}[name]" required
                                                                placeholder="{{ __('What the name of place') }}"
                                                                autocomplete="off" {{ $index !== 0 ?: 'required' }}>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="place_description">{{ __('Description') }}
                                                                <small>({{ $language->code }})</small>
                                                                : *</label>
                                                            <textarea type="text" class="form-control" id="description" 
                                                                required
                                                                name="{{ $language->code }}[description]" rows="6"
                                                                {{ $index !== 0 ?: 'required' }}></textarea>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="price">{{ __('Price') }}: *</label>
                                            <input type="text" class="form-control" id="price" name="price"
                                                placeholder="{{ __('Price') }}" autocomplete="off" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="booking_type">{{ __('Booking type') }}</label>
                                            <select class="form-control" name="booking_type" required>
                                                <option value=""></option>
                                                <option value="{{ \App\Models\Booking::TYPE_BOOKING_FORM }}">{{ __('Booking form') }}
                                                </option>
                                                <option value="{{ \App\Models\Booking::TYPE_BANNER }}">{{ __('Banner Ads') }}
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="place_category">{{ __('Category') }}: *</label>
                                            <select class="form-control myselect" id="place_category" name="category[]"
                                                multiple required>
                                                @foreach ($categories as $cat)
                                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    
                                    </div>
                                </div>
                                <div id="hightlight">
                                    <p class="lead">{{ __('Amenities') }}</p>
                                    <div class="checkbox row">
                                        @foreach ($amenities as $item)
                                            <div class="col-md-3 mb-10">
                                                <label class="p-0"><input type="checkbox" class="flat" name="amenities[]"
                                                        value="{{ $item->id }}"> {{ $item->name }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div id="location">
                                    <p class="lead">{{ __('Location') }}</p>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="select_country">{{ __('Country') }}: *</label>
                                            <select class="form-control" id="select_country" name="country_id" required>
                                                <option value="">{{ __('Select Country') }}</option>
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="select_city">{{ __('City') }}: *</label>
                                            <select class="form-control myselect" id="select_city" name="city_id" required>
                                                <option value="">{{ __('Please select country first') }}</option>
                                                @foreach ($cities as $city)
                                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
 
                                </div>
                                <div id="itinerary">
                                    <p class="lead">{{ __('itinerary') }}</p>
                                    <div id="itinerary_list">
                                        <div class="row form-group itinerary_item" id="itinerary_item_0">
                                            <div class="col-md-11">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="itinerary1"  name="itinerary[0][question]"
                                                        placeholder="{{ __('Enter Day') }}">
                                                </div>
                                                <div class="form-group">
                                                    <textarea type="text" class="form-control" id="itinerary2" 
                                                        name="itinerary[0][answer]" rows="3"
                                                        placeholder="Enter Description"> </textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <button type="button" class="btn btn-danger itinerary_item_remove"
                                                    id="0">X</button>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-round btn-primary"
                                        id="itinerary_addmore">+{{ __('Add more') }}</button>
                                </div>
                                <div id="media">
                                    <p class="lead">{{ __('Media') }}</p>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p><strong>{{ __('Thumbnail image') }}:</strong></p>
                                            <img id="preview_thumb"
                                                src="https://via.placeholder.com/120x150?text=thumbnail">
                                            <input type="file" class="form-control" id="thumb" name="thumb"
                                                accept="image/*">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 gallery">
                                            <p><strong>{{ __('Gallery images') }}:</strong></p>
                                            <div id="place_gallery_thumbs"></div>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="file" class="form-control" id="gallery" accept="image/*">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="ln_solid"></div>
                                <div id="golo_seo">
                                    <p class="lead">{{ __('SEO') }}</p>
                                    <div class="form-group">
                                        <label for="seo_title">{{ __('SEO title') }} -
                                            <small>{{ __('60 characters or less') }}</small>:</label>
                                        <input type="text" class="form-control" id="seo_title" name="seo_title">
                                        <div id="count">
                                            <span id="current_count">0</span>
                                            <span id="maximum_count">/ 60</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="seo_description">{{ __('Meta Description') }} -
                                            <small>{{ __('160 characters or less') }}</small>:</label>
                                        <textarea class="form-control" id="seo_description"
                                            name="seo_description"></textarea>
                                        <div id="counter">
                                            <span id="count_current">0</span>
                                            <span id="count_maximum">/ 160</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-20">{{ __('Save') }}</button>
                        </form>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('scripts')
<script src="{{ asset('admin/js/page_place_create.js') }}"></script>
@endpush
