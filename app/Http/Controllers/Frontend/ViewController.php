<?php

namespace App\Http\Controllers\Frontend;

use App\Models\BankDetail;
use App\Models\HotelBooking;
use App\Models\Profile;
use App\Models\Markup;
use App\Models\Title;
use App\Models\Vat;
use App\Models\TravelPackage;
use App\Models\Amenities;
use App\Models\Category;
use App\Models\City;
use App\Models\Slider;
use App\Models\Country;
use App\Models\Place;
use App\Models\PlaceType;
use App\Models\Post;
use App\Models\Page;
use App\Models\Review;
use App\Models\Booking;
use App\Models\Testimonial;
use App\Models\Offer;
use App\Models\Faq;
use App\Models\HomeSettings;
use App\Commons\Response;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use function Symfony\Component\VarDumper\Dumper\esc;
use App\Services\PortalCustomNotificationHandler;


class ViewController extends Controller
{ 
    private $place;
    private $country;
    private $city;
    private $category;
    private $amenities;
    private $response;

    public function __construct(Place $place, Country $country, City $city, Category $category, Amenities $amenities, Response $response){
        $this->place = $place;
        $this->country = $country;
        $this->city = $city;
        $this->category = $category;
        $this->amenities = $amenities;
        $this->response = $response;
    }

    public function home(){

          $blog_posts = Post::query()
            ->with(['categories' => function ($query) {
                $query->where('status', Category::STATUS_ACTIVE)
                    ->select('id', 'name', 'slug');
            }])
            ->where('type', Post::TYPE_BLOG)
            ->where('status', Post::STATUS_ACTIVE)
            ->limit(3)
            ->orderBy('created_at', 'desc')
            ->get(['id', 'category', 'slug', 'thumb']);

            $places = Place::query()
            ->with(['categories' => function ($query) {
                $query->where('type', Category::TYPE_OFFER)
                    ->select('id', 'name', 'slug');
            }])
             ->orWhere('status', Place::STATUS_ACTIVE)
            ->limit(5)
            ->get();

            $offers = Offer::query()
             ->where('status', Offer::STATUS_ACTIVE)
            ->get();

            $featured_offer = Offer::query()
            ->where('is_featured', 1)
            ->limit(1)
             ->get();

            $sliders = Slider::all();

            $categories = Category::query()
            ->where('type', Category::TYPE_OFFER)
            ->get();

            $faqs = Faq::query()
            ->where('type', Faq::TYPE_FAQ)
            ->limit(2)
            ->get();

            $home_settings = HomeSettings::all();

        return view('pages.frontend.home',compact('blog_posts','featured_offer','faqs','home_settings','offers','places','sliders','categories'));

    }

    public function booking(Request $request)
    {
    
        $data = $this->validate($request, [
            'name' => '',
            'email' => '',
            'date' => '',
            'phone_number' => '',
            'message' => '',
            'type' => ''
        ]);
    
        // generate refenrce number
        $reference = Carbon::now()->format('ymd') . mt_rand(1000000, 9999999);

        $booking = new Booking();
        $booking->fill([
            'user_id' => Auth::id() ?? NULL,
            'reference' => $reference,
            'name' => $data['name'],
            'email' => $data['email'],
            'date' => $data['date'],
            'phone_number' => $data['phone_number'],
            'type' => $data['type'],
        ]);

        $booking->save();
                    
        PortalCustomNotificationHandler::bookingCreated($booking);

         
        return back()->with('success', 'Form sent with succes!');

    }

    public function changeLanguage($locale)
    {
        Session::put('language_code', $locale);
        $language = Session::get('language_code');

        return redirect()->back();
    }

    public function pageAbout(Request $request)
    {
        $keyword = $request->keyword;
        $category_id = $request->category_id;
        $city_id = $request->city_id;

        $places = Place::query()
        ->with(['city' => function ($query) {
            return $query->select('id', 'name', 'slug');
        }])
        ->with('place_types')
        ->withCount('reviews')
        ->with('avgReview')
        ->withCount('wishList')
        ->whereTranslationLike('name', "%{$keyword}%")
        ->where('status', Place::STATUS_ACTIVE);

    if ($category_id) {
        $places->where('category', 'like', "%{$category_id}%");
    }

    if ($city_id) {
        $places->where('city_id', $city_id);
    }

    $places = $places->paginate(4);

        return view('pages.frontend.page.about',[
            'places' => $places,
            'keyword' => $keyword
        ]);
    }
    public function sendAbout(Request $request)
    {
        Mail::send('pages.frontend.mail.contact_form', [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'note' => $request->note
        ], function ($message) use ($request) {
            $message->to(config('default_email_address'), "{$request->first_name}")->subject('Contact from ' . $request->first_name);
        });


        return back()->with('success', 'Contact has been send!');
    }
    public function contact()
    {
        return view('pages.frontend.page.contact');
    }
    public function about()
    {
        return view('pages.frontend.page.about');
    }
    public function sendContact(Request $request)
    {
        Mail::send('pages.frontend.mail.contact_form', [
            'username' => $request->username,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'message' => $request->message
        ], function ($message) use ($request) {
            $message->to(config('default_email_address'), "{$request->first_name}")->subject('Contact from ' . $request->first_name);
        });


        return back()->with('success', 'Contact has been send!');
    }
    
    public function termsConditions()
    {
        
        $faqs = Faq::query()
        ->orderBy('id', 'ASC')->get();

        return view('pages.frontend.page.termsconditions', compact('faqs'));
    }

    public function saleConditions()
    {
        $faqs = Faq::query()
        ->where('type', Faq::TYPE_SALE)
        ->get();
        return view('pages.frontend.page.saleconditions');
    }

    public function pageLanding($page_number)
    {
        return view("pages.frontend.page.landing_{$page_number}");
    }

    public function searchListing(Request $request)
    {
        $keyword = $request->keyword;
        $category_id = $request->category_id;
        $city_id = $request->city_id;

        $offers = Offer::query()
            ->with(['city' => function ($query) {
                return $query->select('id', 'name', 'slug');
            }])
            ->whereTranslationLike('name', "%{$keyword}%")
            ->where('status', Offer::STATUS_ACTIVE)
            ->limit(3);

        if ($category_id) {
            $offers->where('category_id', $category_id);
        }

        if ($city_id) {
            $offers->where('city_id', $city_id);
        }

        $offers = $offers->get(['id', 'city_id', 'name', 'slug']);


        $html = '<ul class="listing_items">';
        foreach ($offers as $offer):
            if (isset($offer['city'])):
                $offer_url = route('offer.show', $offer->slug);
                $city_url = route('city_detail', $offer['city']['slug']);
                $html .= "
                <li>
                    <a href=\"{$offer_url}\"><i class=\"la la-globe-africa\"></i>{$offer->name}</a>  
                </li>
                <li>
                    <a href=\"{$city_url}\"><i class=\"la la-city\"></i>{$offer['city']['name']}</a>
                </li>
                ";
            endif;
            endforeach;
        $html .= '</ul>';

        $html_notfound = "<ul><li><a href='#'><span>No Results!</span></a></li></ul>";

        count($offers) ?: $html = $html_notfound;

        return response($html, 200);
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $category_id = $request->category_id;
        $city_id = $request->city_id;

        $places = Place::query()
            ->with(['city' => function ($query) {
                return $query->select('id', 'name', 'slug');
            }])
            ->with('place_types')
            ->with('avgReview')
            ->withCount('wishList')
            ->whereTranslationLike('name', "%{$keyword}%")
            ->where('status', Place::STATUS_ACTIVE);

        if ($category_id) {
            $places->where('category', 'like', "%{$category_id}%");
        }

        if ($city_id) {
            $places->where('city_id', $city_id);
        }

        $places = $places->paginate(20);

        return view('pages.frontend.search.search', [
            'places' => $places,
            'keyword' => $keyword
        ]);
    }

    public function pageSearchListing(Request $request)
    {
        $keyword = $request->keyword;
        $filter_category = $request->category;

        $categories = Category::query()
            ->where('type', Category::TYPE_PLACE)
            ->orWhere('type', Category::TYPE_OFFER)
            ->get();

        $offers = Offer::query()
            ->with('categories')
            ->whereTranslationLike('name', "%{$keyword}%")
            ->where('status', Offer::STATUS_ACTIVE);

        if ($filter_category) {
            foreach ($filter_category as $key => $item) {
                if ($key === 0) {
                    $offers->where('category_id', 'like', "%$item%");
                } else {
                    $offers->orWhere('category_id', 'like', "%$item%");
                }
            }
        }

        $offers = $offers->paginate();

//        return $places;

        return view("pages.frontend.search.search_01", [
            'keyword' => $keyword,
            'categories' => $categories,
            'offers' => $offers,
            'filter_category' => $filter_category,
        ]);
    }



    public function ajaxSearch(Request $request)
    {
        $keyword = $request->keyword;
        $category_id = $request->category_id;
        $city_id = $request->city_id;

        $places = Place::query()
            ->with(['city' => function ($query) {
                return $query->select('id', 'name', 'slug');
            }])
            ->whereTranslationLike('name', "%{$keyword}%")
            ->where('status', Place::STATUS_ACTIVE);

        if ($category_id) {
            $places->where('category', 'like', "%{$category_id}%");
        }

        if ($city_id) {
            $places->where('city_id', $city_id);
        }

        $places = $places->get(['id', 'city_id', 'name', 'slug']);

        $html = '<ul class="custom-scrollbar">';
        foreach ($places as $place):
            if (isset($place['city'])):
                $place_url = route('place_detail', $place->slug);
                $city_url = route('city_detail', $place['city']['slug']);
                $html .= "
                <li>
                    <a href=\"{$place_url}\">{$place->name}</a>
                    <a href=\"{$city_url}\"><i class=\"la la-city\"></i>{$place['city']['name']}</a>
                </li>
                ";
            endif;
        endforeach;
        $html .= '</ul>';

        $html_notfound = "<div class=\"golo-ajax-result\">No place found</div>";

        count($places) ?: $html = $html_notfound;

        return response($html, 200);
    }

}