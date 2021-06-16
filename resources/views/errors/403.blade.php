@extends('errors::illustrated-layout')

@section('title', __('Access Denied/Forbidden !'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Access Denied/Forbidden !'))
