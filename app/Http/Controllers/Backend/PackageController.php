<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Offer;
use App\Models\Package;
use App\Models\PackageCondition;
use App\Models\PackageFeature;
use App\Models\PackageRate;

class PackageController extends Controller
{
    public function index(Request $request)
    {
        $offer = Offer::find($request->offer);
        return view('pages.backend.package.index', compact('offer'));
    }

    public function create(Request $request)
    {
        $offer = Offer::find($request->offer);
        return view('pages.backend.package.create', compact('offer'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'offer_id' => '',
            'title' => '',
            'period' => '',
            'start_date' => '',
            'end_date' => '',
            'features' => '',
            'conditions' => '',
            'rate_title' => '',
            'rate_start' => '',
            'rate_end' => '',
            'rate_price' => '',
            'rate_capacity' => '',
        ]);

        $offer = Offer::find($data['offer_id']);
        
        if($offer)
        {
            $package = $offer->packages()->create([
                'title' => $data['title'],
                'period' => $data['period'],
                'start_date' => $data['start_date'],
                'end_date' => $data['end_date'],
            ]);

            foreach ($data['features'] as $key => $feature) {
                if($feature !== '')
                    $package->features()->create([
                        'title' => $feature,
                    ]);
            }

            foreach ($data['conditions'] as $key => $condition) {
                if($condition !== '')
                    $package->conditions()->create([
                        'title' => $condition,
                    ]);
            }

            foreach ($data['rate_title'] as $key => $rate_title) {
                if($rate_title !== '')
                    $package->rates()->create([
                        'title' => $rate_title,
                        'start_date' => $data['rate_start'][$key],
                        'end_date' => $data['rate_end'][$key],
                        'price' => $data['rate_price'][$key],
                        'capacity' => $data['rate_capacity'][$key],
                    ]);
            }

            return redirect()->route('package_index', ['offer' => $offer])->with('success', 'package creer avec succes!');

        }

        return redirect()->route('package_index', ['offer' => $offer])->with('error', 'package creating failed!');

    }

    public function edit($id)
    {
        $package = Package::find($id);
        return view('pages.backend.package.edit', compact('package'));
    }

    public function update($id, Request $request)
    {
        $data = $request->validate([
            'offer_id' => '',
            'title' => '',
            'period' => '',
            'start_date' => '',
            'end_date' => '',
            'featuresId' => '',
            'features' => '',
            'conditionsId' => '',
            'conditions' => '',
            'rate_id' => '',
            'rate_title' => '',
            'rate_start' => '',
            'rate_end' => '',
            'rate_price' => '',
            'rate_capacity' => '',
        ]);

        $package = Package::find($id);        

        if($package)
        {

            Package::find($id)->update([
                'title' => $data['title'],
                'period' => $data['period'],
                'start_date' => $data['start_date'],
                'end_date' => $data['end_date'],
            ]);

            PackageController::handleDelete($package, $data['featuresId'], 'feature');
            PackageController::handleDelete($package, $data['conditionsId'], 'condition');
            PackageController::handleDelete($package, $data['rate_id'], 'rate');

            foreach ($data['featuresId'] as $key => $featureId) {
                if($featureId != 0)
                    PackageFeature::find($featureId)->update(['title' => $data['features'][$key]]);
                else
                    $package->features()->create(['title' => $data['features'][$key]]);
            }

            foreach ($data['conditionsId'] as $key => $conditionId) {
                if($conditionId != 0)
                    PackageCondition::find($conditionId)->update(['title' => $data['conditions'][$key]]);
                else
                    $package->conditions()->create(['title' => $data['conditions'][$key]]);
            }

            foreach ($data['rate_id'] as $key => $rateId) {
                if($rateId != 0)
                    PackageRate::find($rateId)->update([
                        'title' => $data['rate_title'][$key],
                        'start_date' => $data['rate_start'][$key],
                        'end_date' => $data['rate_end'][$key],
                        'price' => $data['rate_price'][$key],
                        'capacity' => $data['rate_capacity'][$key],
                    ]);
                else
                    $package->rates()->create([
                        'title' => $data['rate_title'][$key],
                        'start_date' => $data['rate_start'][$key],
                        'end_date' => $data['rate_end'][$key],
                        'price' => $data['rate_price'][$key],
                        'capacity' => $data['rate_capacity'][$key],
                    ]);
            }

            return redirect()->route('package_index', ['offer' => $package->offer])->with('success', 'package creer avec succes!');

        }

        return redirect()->route('package_index', ['offer' => $package->offer])->with('error', 'package creating failed!');
    }

    public function delete($id)
    {
        try {
            //code...
            $package = Package::find($id);
            $offer = $package->offer;
            $package->delete();
    
            return redirect()->route('package_index', ['offer' => $offer])->with('success', 'package deleted success');
        } catch (\Throwable $th) {
            return redirect()->route('package_index', ['offer' => $offer])->with('error', 'package deleted fail');
        }
    }

    public static function handleDelete($package, $array, $type)
    {
        $deleteIds = PackageController::getDeletedElements($package, $array, $type);

        foreach ($deleteIds as $id) {
            switch ($type) {
                case 'feature':
                    PackageFeature::find($id)->delete();
                    break;
                
                case 'condition':
                    PackageCondition::find($id)->delete();
                    break;
                
                
                default:
                    PackageRate::find($id)->delete();
                    break;
            }
        }
        
    }

    public static function getDeletedElements($package, $array, $type)
    {
        switch ($type) {
            case 'feature':
                $elements = $package->features;
                break;
            
            case 'condition':
                $elements = $package->conditions;
                break;
            
            
            default:
                $elements = $package->rates;
                break;
        }

        $filter = [];
        foreach ($elements as $element) {
            $found = false;
            foreach ($array as $id) {
                if($element->id == $id) {
                    $found = true;
                    break;
                }
            }
            if(! $found)
                $filter[] = $element->id;
        }

        return $filter;

    }
}
