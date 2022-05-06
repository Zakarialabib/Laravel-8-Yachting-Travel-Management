<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Rentacs Tours</title>
    <link rel="stylesheet" href="{{asset('backend/app-assets/css/bootstrap2.css')}}">
</head>
<body>

	<div class="container" style='margin-left:150px; margin-top:150px;'>

	<div class="row">
			<div class="col-xs-4">
			<div class="panel panel-default">
				@if ($type == App\Models\Invoice::PURCHASE_TYPE)		
				<div class="panel-heading">
					<h4>To : <a href="#"> {{$beneficiary->name}}</a></h4>
				</div>
				<div class="panel-body">
					<p>
						{{$beneficiary->company_name}} <br>
						{{$beneficiary->address}} <br>
						{{$beneficiary->city}}, {{$beneficiary->postal_code}} <br>
						{{__('Phone Number')}}: {{$beneficiary->phone_number}} <br>
						<br>
					</p>
				</div>
				@else	
				<div class="panel-heading">
					<h4>To : <a href="#"> {{$beneficiary->profile->sur_name}}</a></h4>
				</div>
				<div class="panel-body">
					<p>
						{{$beneficiary->profile->first_name}} <br>
						{{$beneficiary->profile->address}} <br>
						{{$beneficiary->profile->city}}, {{$beneficiary->profile->postal_code}} <br>
						{{__('Phone Number')}}: {{$beneficiary->profile->phone_number}} <br>
						<br>
					</p>
				</div>
				@endif
				</div>
			</div>
			<div class="col-xs-6 text-right">
			  <h1>INVOICE</h1>
			  <h1><small>Invoice {{__('reference')}} : {{$entity->reference_no}}</small></h1>
			  <h5>Date d’émission: {{$entity->created_at->toDateString()}}</h5>
			</div>
		</div>
		  <div class="row">
		    
		   
		  </div> <!-- / end client details section -->

		         <table class="table table-bordered" style='width:83%'>
        <thead>
          <tr>
		  <th><h4>{{__('Service')}}</h4></th>
            <th><h4>{{__('Description')}}</h4></th>
            <th><h4>{{__('Qty')}}</h4></th>
            <th><h4>{{__('Price')}}</h4></th>
            <th><h4>{{__('Sub Total')}}</h4></th>
          </tr>
        </thead>
        <tbody>
		<?php $total_product_tax = 0; $i=1;?>
		  @foreach($entity->details as $detail)
			<tr>
				<td>Article</td>
				<td>{{$detail->name}}</td>
				<td class="text-right">{{$detail->qty}}</td>
				<td class="text-right">{{number_format((float)$entity->tax, 2, '.', '')}}</td>
				<td class="text-right">{{number_format((float)$detail->total, 2, '.', '')}}</td>
			</tr>
		  @endforeach
        </tbody>
      </table>

		<div class="row text-right">
			<div class="col-xs-2 col-xs-offset-6">
				<p>
					<strong>
						Total HT : <br>
						TVA : <br>
						Total : <br>
					</strong>
				</p>
			</div>
			<div class="col-xs-2">
				<strong>
				{{number_format((float)$entity->tatal, 2, '.', '')}} <br>
				{{number_format((float)$entity->total_tax, 2, '.', '')}} <br>
			    {{number_format((float)$entity->grand_total, 2, '.', '')}} <br>
				</strong>
			</div>
		</div>


		<div class="row">
		  
		</div>

	</div>

</body>
</html>