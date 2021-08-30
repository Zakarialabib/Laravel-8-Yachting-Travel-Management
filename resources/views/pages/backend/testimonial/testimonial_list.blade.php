@extends('layouts.backend')

@section('page-title')  {{__('Testimonials List')}}  @endsection

@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>{{__('Testimonials')}}</h3>
        </div>
        <div class="title_right">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{route('testimonial_page_add')}}">{{__('Add new Testimonial')}}</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 bg-white ">
            <div class="x_panel">
                <div class="x_content">
                    <div class="table-responsive">
                        <table class="table table-striped jambo_table bulk_action">
                            <thead>
                            <tr class="headings">
                                <th class="column-title">{{__('Avatar')}}</th>
                                <th class="column-title">{{__('Name')}}</th>
                                <th class="column-title">{{__('Job title')}}</th>
                                <th class="column-title">{{__('Content')}}</th>
                                <th class="column-title">{{__('Action')}}</th>
                                <th class="bulk-actions" colspan="7">
                                    <a class="antoo" style="color:#fff; font-weight:500;"><span class="action-cnt"> </span> <i class="fa fa-chevron-down"></i></a>
                                </th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($testimonials as $testimonial)
                                <tr class="even pointer">
                                    <td>
                                        @if($testimonial['avatar'])
                                            <img src="{{getImageUrl($testimonial['avatar'])}}" alt="no avt" style="width: 50px;height: 50px; border-radius: 50%">
                                        @else
                                            <img src="https://via.placeholder.com/50x50?text=no avt" alt="no avt" style="width: 50px;height: 50px; border-radius: 50%">
                                        @endif
                                    </td>
                                    <td>
                                        <a href="javascript:" class="edit_cb"
                                           data-id="{{$testimonial['id']}}"
                                           data-name="{{$testimonial['name']}}"
                                        >
                                            <strong>{{$testimonial['name']}}</strong>
                                        </a>
                                    </td>
                                    <td>{{$testimonial['job_title']}}</td>
                                    <td>{{$testimonial['content']}}</td>
                                    <td class="golo-flex">
                                <div class="btn-group row">
                                        <a href="{{route('testimonial_page_edit', $testimonial['id'])}}" class="btn-sm btn-warning city_edit">{{__('Edit')}}</a>
                                        <form class="d-inline" action="" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="button" class="btn-sm btn-danger city_delete">{{__('Delete')}}</button>
                                        </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>


                </div>


            </div>
        </div>
    </div>

@stop

@push('scripts')
    <script>
        $('#add_cb').click(function () {
            $('#submit_customerfeedback').show();
            $('#edit_customerfeedback').hide();
        });

        $('.edit_cb').click(function () {
            let customer_feedback_id = $(this).attr('data-id');
            let customer_name = $(this).attr('data-name');
            let customer_address = $(this).attr('data-address');
            let customer_avatar = $(this).attr('data-avatar');
            let customer_feedback = $(this).attr('data-feedback');

            $('#customer_name').val(customer_name);
            $('#customer_address').val(customer_address);
            $('#customer_feedback').val(customer_feedback);
            $('#thumbnail').val(customer_avatar);
            $('#cb_thumb').attr('src', customer_avatar);

            $('#submit_customerfeedback').hide();
            $('#edit_customerfeedback').show().attr('data-id', customer_feedback_id);
            $('#modal_add_customerfeedback').modal('show');
        });
    </script>
@endpush

@push('style')
    <style>
        .table > tbody > tr > td {
            vertical-align: middle;
        }
    </style>
@endpush

