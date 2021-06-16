@extends('layouts.backend')

@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>{{__('Edit place')}}</h3>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 bg-white">
            <div class="x_panel">
                <div class="x_content row">
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <ul class="nav nav-pills flex-column tabs-left place_create_menu">
                            <li class="nav-item"><a href="#genaral">{{__('Genaral')}}</a></li>
                            <li class="nav-item"><a href="#hightlight">{{__('Hightlight')}}</a></li>
                            <li class="nav-item"><a href="#location">{{__('Location')}}</a></li>
                            <li class="nav-item"><a href="#media">{{__('Media')}}</a></li>
                            <li class="nav-item"><a href="#seo">{{__('SEO')}}</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-9 col-md-9 col-sm-9 place_create">
                        <form action="{{ route('place_update' , $place->id) }}" enctype="multipart/form-data" method="post">
                            @method('put')
                            @csrf
                            <div class="tab-content">
                                <ul class="nav nav-tabs bar_tabs" role="tablist">
                                    @foreach($languages as $index => $language)
                                        <li class="nav-item">
                                            <a class="nav-link {{$index !== 0 ?: "active"}}" id="home-tab" data-toggle="tab" href="#language_{{$language->code}}" role="tab" aria-controls="" aria-selected="">{{$language->name}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                                
                                <div id="genaral">
                                    <p class="lead">{{__('Genaral')}}</p>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <div class="tab-content">
                                                @foreach($languages as $index => $language)
                                                    @php
                                                        $trans = $place ? $place->translate($language->code) : [];
                                                    @endphp
                                                    <div class="tab-pane fade show {{$index !== 0 ?: "active"}}" id="language_{{$language->code}}" role="tabpanel" aria-labelledby="home-tab">
                                                        <div class="form-group">
                                                            <label for="place_name">{{__('Place name')}} <small>({{$language->code}})</small>: *</label>
                                                            <input type="text" class="form-control" name="{{$language->code}}[name]" value="{{$trans ? $trans['name'] : ''}}" placeholder="{{__('What the name of place')}}" autocomplete="off" {{$index !== 0 ?: "required"}}>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="name">{{__('Description')}}  <small>({{$language->code}})</small>: *</label>
                                                            <textarea type="text" class="form-control" id="ckeditor" name="{{$language->code}}[description]" rows="6" {{$index !== 0 ?: "required"}}>{{$trans ? $trans['description'] : ''}}</textarea>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                      </div>
                                </div>
                        
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="price">{{__('Price')}}: *</label>
                                            <input type="text" class="form-control" id="price" name="price" value="{{$place->price}}"  autocomplete="off">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="booking_type">{{__('Booking type')}}</label>
                                                <select class="form-control" name="booking_type" required>
                                                    <option  value="{{\App\Models\Booking::TYPE_BOOKING_FORM}}" {{isChecked($place->booking_type, \App\Models\Booking::TYPE_BOOKING_FORM)}}>{{__('Booking form')}}</option>
                                                    <option  value="{{\App\Models\Booking::TYPE_CONTACT_FORM}}" {{isChecked($place->booking_type, \App\Models\Booking::TYPE_CONTACT_FORM)}}>{{__('Contact form')}}</option>
                                                    <option  value="{{\App\Models\Booking::TYPE_BANNER}}" {{isChecked($place->booking_type, \App\Models\Booking::TYPE_BANNER)}}>{{__('Banner Ads')}}</option>
                                                </select>
                                        </div>
                                    </div>
                        
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="name">{{__('Category')}}: *</label>
                                            <select class="form-control myselect" id="" name="category[]" multiple data-live-search="true" required>
                                                @foreach($categories as $cat)
                                                    <option value="{{$cat->id}}" {{isSelected($cat->id, $place->category)}}>{{$cat->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                        
                                <div id="hightlight">
                                    <p class="lead">{{__('Amenities')}}</p>
                                    <div class="checkbox row">
                                        @foreach($amenities as $item)
                                            <div class="col-md-3 mb-10">
                                                <label class="p-0"><input type="checkbox" class="flat" name="amenities[]" value="{{$item->id}}" {{isChecked($item->id, $place->amenities)}}> {{$item->name}}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                        
                                <div id="location">
                                    <p class="lead">{{__('Location')}}</p>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="place_address">{{__('Country')}}: *</label>
                                            <select class="form-control" id="select_country" name="country_id" required>
                                                <option value="">{{__('Select Country')}}</option>
                                                @foreach($countries as $country)
                                                    <option value="{{$country->id}}" {{isSelected($country->id, $place->country_id)}}>{{$country->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="place_address">{{__('City')}}: *</label>
                                            <select class="form-control myselect" id="select_city" name="city_id" required>
                                                <option value="">{{__('Please select country first')}}</option>
                                                @foreach($cities as $city)
                                                    <option value="{{$city->id}}" {{isSelected($city->id, $place->city_id)}}>{{$city->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                        
                                <div id="itinerary">
                                    <p class="lead">{{__('itinerary')}}</p>
                                    <div id="itinerary_list">
                                        @if($place->itinerary)
                                            @foreach($place->itinerary as $key => $menu)
                                                <div class="row form-group itinerary_item" id="itinerary_item_{{$key}}">
                                                    <div class="col-md-11">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="itinerary[{{$key}}][question]" value="{{$menu['question']}}" placeholder="{{__('Title')}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <textarea type="text" class="form-control" id="ckeditor" name="itinerary[{{$key}}][answer]" value="{{$menu['answer']}}" rows="3" placeholder="{{__('Description')}}"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <button type="button" class="btn btn-danger itinerary_item_remove" id="{{$key}}">X</button>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <button type="button" class="btn btn-round btn-info" id="itinerary_addmore">+{{__('Add more')}}</button>
                                </div>
                                <div id="media">
                                    <p class="lead">{{__('Media')}}</p>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p><strong>{{__('Thumbnail image')}}:</strong></p>
                                            <img id="preview_thumb" src="{{getImageUrl($place->thumb)}}" alt="">
                                            <input type="file" class="form-control" id="thumb" name="thumb" accept="image/*">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 gallery">
                                            <p><strong>{{__('Gallery images')}}:</strong></p>
                                            <div id="place_gallery_thumbs">
                                                @if($place->gallery)
                                                    @foreach($place->gallery as $image)
                                                        <div class="col-sm-2 media-thumb-wrap">
                                                            <figure class="media-thumb">
                                                                <img src="{{getImageUrl($image)}}">
                                                                <div class="media-item-actions">
                                                                    <a class="icon icon-delete" href="#">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="16" viewBox="0 0 15 16">
                                                                            <g fill="#5D5D5D" fill-rule="nonzero">
                                                                                <path d="M14.964 2.32h-4.036V0H4.105v2.32H.07v1.387h1.37l.924 12.25H12.67l.925-12.25h1.369V2.319zm-9.471-.933H9.54v.932H5.493v-.932zm5.89 13.183H3.65L2.83 3.707h9.374l-.82 10.863z"></path>
                                                                                <path d="M6.961 6.076h1.11v6.126h-1.11zM4.834 6.076h1.11v6.126h-1.11zM9.089 6.076h1.11v6.126h-1.11z"></path>
                                                                            </g>
                                                                        </svg>
                                                                    </a>
                                                                    <input type="hidden" name="gallery[]" value="{{$image}}">
                                                                    <span class="icon icon-loader d-none"><i class="fa fa-spinner fa-spin"></i></span>
                                                                </div>
                                                            </figure>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="file" class="form-control" id="gallery" name="banner" accept="image/*">
                                        </div>
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div id="seo">
                                    <p class="lead">{{__('SEO')}}</p>
                                    <div class="form-group">
                                        <label for="seo_title">{{__('SEO title')}} - <small>{{__('60 characters or less')}}</small> :</label>
                                        <input type="text" class="form-control" id="seo_title" name="seo_title" value="{{$place['seo_title']}}">
                                        <div id="count">
                                          <span id="current_count">0</span>
                                           <span id="maximum_count">/ 60</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="seo_description">{{__('Meta Description')}} - <small>{{__('160 characters or less')}}</small> :</label>
                                        <textarea class="form-control" id="seo_description" name="seo_description">{{$place['seo_description']}}</textarea>
                                          <div id="counter">
                                          <span id="count_current">0</span>
                                           <span id="count_maximum">/ 160</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-20">{{__('Update')}}</button>
                        </form>
                    </div>
                    <div class="clearfix"></div>
                </div>

            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script src="{{asset('admin/js/page_place_create.js')}}"></script>
<script src="{{asset('admin/js/page_post.js')}}"></script>
@endpush