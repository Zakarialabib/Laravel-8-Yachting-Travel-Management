@extends('layouts.backend')

@section('content')
<div class="page-title">
    <div class="title_left">
        <h3>{{ __('Add Offer') }}</h3>
    </div>
</div>
<div class="clearfix"></div>
<div class="col-12 col-lg-12 offer_create">
    <form action="{{ route('offer_store') }}" enctype="multipart/form-data" method="post">
        @csrf
        <div class="">
            <ul class="nav nav-tabs bar_tabs" role="tablist">
                @foreach($languages as $index => $language)
                    <li class="nav-item">
                        <a class="nav-link {{ $index !== 0 ?: "active" }}"
                            id="home-tab" data-toggle="tab" href="#language_{{ $language->code }}" role="tab"
                            aria-controls="" aria-selected="">{{ $language->name }}</a>
                    </li>
                @endforeach
            </ul>
            <div class="form-group row">
                <div class="col-md-12">
                    <div class="tab-content">
                        @foreach($languages as $index => $language)
                            <div class="tab-pane fade show {{ $index !== 0 ?: "active" }}"
                                id="language_{{ $language->code }}" role="tabpanel" aria-labelledby="home-tab">
                                <div class="form-group">
                                    <label for="offer_name">{{ __('Offer name') }}
                                        <small>({{ $language->code }})</small> : *</label>
                                    <input type="text" class="form-control" name="{{ $language->code }}[name]"
                                        required
                                        placeholder="{{ __('What the name of offer') }}"
                                        autocomplete="off"
                                        {{ $index !== 0 ?: "required" }}>
                                </div>
                                <div class="form-group">
                                    <label for="short_desc">{{ __('Short Description') }}
                                        <small>({{ $language->code }})</small> : *</label>
                                    <textarea type="text" class="form-control" 
                                    name="{{ $language->code }}[short_desc]" 
                                    id="{{ $language->code }}[short_desc]"   
                                        {{ $index !== 0 ?: "" }}></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="offer_description">{{ __('Description') }}
                                        <small>({{ $language->code }})</small>
                                        : *</label>
                                    <textarea type="text" class="form-control" required
                                        name="{{ $language->code }}[description]" id="{{ $language->code }}[description]" rows="6"
                                        {{ $index !== 0 ?: "required" }}></textarea>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-6">
                    <label for="category">{{ __('City') }}: *</label>
                    <select class="form-control myselect" id="city_id" name="city_id" required>
                        @foreach($cities as $city)
                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-lg-6">
                    <label for="category">{{ __('Category') }}: *</label>
                    <select class="form-control myselect" id="category_id" name="category_id" required>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
         <div class="row ">
            <div class="form-group col-lg-6">
                <label for="price">{{ __('Price') }}: *</label>
                <input type="text" class="form-control" id="price" name="price"
                    placeholder="{{ __('Price') }}" autocomplete="off" required>
            </div>
            <div class="form-group col-lg-6">
                <label for="is_featured">{{ __('Is Featured')}}</label><br>
               <select class="form-control" name="is_featured" id="is_featured">
                   <option value="1">{{ __('Active')}}</option>
                   <option value="0">{{ __('Inactive')}}</option>
               </select>
            </div>
        </div>
            <div class="form-group">
                <p class="lead">{{ __('itinerary') }}</p>
                <div id="itinerary_list">
                    <div class="row form-group itinerary_item" id="itinerary_item_0">
                        <div class="col-md-11">
                            <div class="form-group">
                                <input type="text" class="form-control" name="itinerary[0][title]"
                                    placeholder="{{ __('Title') }}">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="ckeditor" name="itinerary[0][description]"
                                    rows="3" placeholder="{{ __('Description') }}">
                            </div>
                        </div>
                        <div class="col-md-1">
                            <button type="button" class="btn btn-danger itinerary_item_remove" id="0">X</button>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-round btn-primary"
                    id="itinerary_addmore">+{{ __('Add more') }}</button>
            </div>

            <div class="form-group">
                <div class="form-group">
                    <label for="inputthumb" class="col-form-label">{{ __('thumb') }} <span
                            class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-btn">
                            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                <i class="fa fa-picture-o"></i> {{ __('Choose') }}
                            </a>
                        </span>
                        <input id="thumbnail" class="form-control" type="text" name="thumb"
                            value="{{ old('thumb') }}">
                    </div>
                    <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                    @error('thumb')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
         
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
                    <textarea class="form-control" id="seo_description" name="seo_description"></textarea>
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
@endsection

@push('scripts')
    <script src="{{ asset('admin/js/page_offer.js') }}"></script>
@endpush
