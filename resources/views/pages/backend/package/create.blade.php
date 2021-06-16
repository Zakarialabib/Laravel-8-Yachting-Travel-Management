@extends('layouts.backend')

@section('content')
<div class="page-title">
  <div class="title_left">
    <h3>{{ __('Add Package') }}</h3>
  </div>
</div>
<div class="clearfix"></div>

<div class="col-12 bg-white">
  <div class="x_panel">
    <form action="{{ route('package_store') }}" method="post">
      @csrf
      <input type="hidden" name="offer_id" value="{{ $offer->id }}">
      <div class="row">
        <div class="col-6">
          <div class="form-group">
            <label>{{ __('Title') }}</label>
            <input type="text" name="title" placeholder="{{ __('Title') }}" class="form-control">
          </div>
        </div>
        <div class="col-6">
          <div class="form-group">
            <label>{{ __('Period') }}</label>
            <input type="number" name="period" placeholder="{{ __('Period') }}" class="form-control">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-6">
          <div class="form-group">
            <label>{{ __('Start Date') }}</label>
            <input type="date" name="start_date" placeholder="{{ __('Start Date') }}"
              class="form-control">
          </div>
        </div>
        <div class="col-6">
          <div class="form-group">
            <label>{{ __('End Date') }}</label>
            <input type="date" name="end_date" placeholder="{{ __('End Date') }}"
              class="form-control">
          </div>
        </div>
      </div>
      <div class="col-12">
        <div class="row">
          <div class="col-6">
            <div class="row">
              <table id="features" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th class="text-center">{{ __('Features') }}</th>
                    <th class="text-center"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <textarea style="width: 100%;" name="features[]" class="form-control" rows="1"></textarea>
                    </td>
                    <td>
                      <a class="delete-row">X</a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="row justify-content-end">
              <a id="add_feature" class="btn btn-primary text-white pull-left">{{ __('Add') }}</a>
            </div>
          </div>
          <div class="col-6">
            <div class="row">
              <table id="conditions" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th class="text-center">{{ __('Conditions') }}</th>
                    <th class="text-center"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <textarea style="width: 100%;" class="form-control" name="conditions[]" rows="1"></textarea>
                    </td>
                    <td>
                      <a class="delete-row">X</a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="row justify-content-end">
              <a id="add_condition" class="btn btn-primary text-white pull-left">{{ __('Add') }}</a>
            </div>
          </div>
        </div>
      </div>
  <div class="row">
    <div class="col-12">
      <div class="row">
        <table id="rates" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th class="text-center">{{ __('Title') }}</th>
              <th class="text-center">{{ __('Start Date') }}</th>
              <th class="text-center">{{ __('End Date') }}</th>
              <th class="text-center">{{ __('Price') }}</th>
              <th class="text-center">{{ __('Capacity') }}</th>
              <th class="text-center"></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <input type="text" name="rate_title[]" placeholder="{{ __('Title') }}"
                  class="form-control">
              </td>
              <td>
                <input type="date" name="rate_start[]" placeholder="{{ __('Start Date') }}"
                  class="form-control">
              </td>
              <td>
                <input type="date" name="rate_end[]" placeholder="{{ __('End Date') }}"
                  class="form-control">
              </td>
              <td>
                <input type="number" name="rate_price[]" placeholder="{{ __('Price') }}"
                  class="form-control">
              </td>
              <td>
                <input type="number" name="rate_capacity[]" placeholder="{{ __('Capacity') }}"
                  class="form-control">
              </td>
              <td>
                <a class="delete-row">X</a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="row justify-content-end">
        <a id="add_rate" class="btn btn-primary text-white pull-left">{{ __('Add') }}</a>
      </div>
    </div>
  </div>
  <div class="row my-3">
    <div class="col-12">
      <hr>
    </div>
  </div>
  <div class="row justify-content-end">
    <button type="submit" class="btn btn-primary text-white pull-left">{{ __('Create') }}</button>
  </div>
  </form>
</div>
</div>
@endsection

@push('scripts')
  <script>
    $(document).ready(function () {
      $('#add_feature').click(function () {
        duplicateTableRow('features');
      });

      $('#add_condition').click(function () {
        duplicateTableRow('conditions');
      });

      $('#add_rate').click(function () {
        duplicateTableRow('rates');
      });

      $(document).on('click', '.delete-row', function () {
        removeTableRow($(this));
      });

    });

    function duplicateTableRow(target) {
      let tr = $(`#${target}`).find('tr:last').clone();
      tr.find('textarea').val('');
      tr.find('input').val(0);
      $(`#${target}`).append(tr);
    }

    function removeTableRow(element) {
      element.closest("tr").remove();;
    }
  </script>
@endpush