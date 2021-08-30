<?php

use Illuminate\Support\Facades\Request;
use Carbon\Carbon;

function formatDate($date, $format)
{
    return Carbon::parse($date)->format($format);
}


if (!function_exists('setting')) {
    function setting($key, $default = null, $cache = false)
    {
        if (is_null($key)) {
            return new \App\Models\Setting();
        }

        if (is_array($key)) {
            return \App\Models\Setting::set($key[0], $key[1]);
        }

        if ($cache) {
            $val = \Illuminate\Support\Facades\Cache::remember("setting_" . $key, 60, function () use ($key) {
                return \App\Models\Setting::get($key);
            });
        } else {
            $val = \App\Models\Setting::get($key);
        }

        return is_null($val) ? value($default) : $val;
    }
}

function isChecked($val1, $val2)
{
    if (is_array($val2)) {
        if (in_array($val1, $val2)) {
            return "checked";
        } else {
            return "";
        }
    } else {
        if ($val1 == $val2) {
            return "checked";
        } else {
            return "";
        }
    }
}

function isSelected($val1, $val2)
{
    if (is_array($val2)) {
        if (in_array($val1, $val2)) {
            return "selected";
        } else {
            return "";
        }
    } else {
        if ($val1 == $val2) {
            return "selected";
        } else {
            return "";
        }
    }
}

function isActive($val1, $val2)
{
    if (is_array($val2)) {
        if (in_array($val1, $val2)) {
            return "active";
        } else {
            return "";
        }
    } else {
        if ($val1 === $val2) {
            return "active";
        } else {
            return "";
        }
    }
}


function isDisabled($val1, $val2)
{
    if ($val1 === $val2) {
        return "disabled";
    } else {
        return "";
    }
}

function getSlug($request, $key)
{
    $language_default = \App\Models\Language::query()
        ->where('is_default', \App\Models\Language::IS_DEFAULT)
        ->select('code')
        ->first();
    $language_code = $language_default->code;
    $value = $request[$language_code][$key];
    $slug = \Illuminate\Support\Str::slug($value);
    return $slug;
}

const DAYS = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];

function SEOMeta($title = '', $description = '', $image = null, $canonical = '', $type = 'website')
{
    $image = $image ? $image : asset('images/common/default-cover-fb-1.jpg');

    SEO::setTitle($title);
    SEO::setDescription($description);
    SEO::opengraph()->setUrl(url()->current());
    SEO::setCanonical(url()->current());
    SEO::opengraph()->addProperty('type', $type);
    SEO::opengraph()->addProperty("image", $image);
    SEO::opengraph()->addProperty("site_name", setting('app_name'));
}

function flagImageUrl($language_code)
{
    return asset("images/flags/{$language_code}.png");
}

function getUserAvatar($image_file)
{
    if ($image_file) {
        return "/uploads/{$image_file}";
    }
    return "/assets/images/default_avatar.svg";
}

function getImageUrl($image_file)
{
    if ($image_file) {
        return asset("uploads/{$image_file}");
    }
    return "https://via.placeholder.com/300x300?text=rentacs-tours";
}

function isRoute($name = '')
{
    if (!$name || (is_array($name) && !count($name)) || !Request::route()) {
        return false;
    }
    if (is_array($name)) {
        return in_array(Request::route()->getName(), $name);
    }
    return Request::route()->getName() === $name;
}

const STATUS = [
    0 => "InActive",
    1 => "Active",
    2 => "Pending",
    4 => "Deleted",
];
