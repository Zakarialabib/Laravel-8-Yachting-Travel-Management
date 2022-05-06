<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Rentacs Tours</title>
  <link rel="stylesheet" href="{{asset('backend/app-assets/css/bootstrap2.css')}}">
</head>
<body>
	<div class="container" style='margin-right:10px;'>
		<div class="row">
			<div class="col-xs-5">
			  <h1>
				<img src="{{getImageUrl(setting('logo'))}}" width="120px" height="100px" style="margin:10px 0">
			  </h1>
			</div>
			<div class="col-xs-5 text-right">
			  <h1>{{__('Invoice')}}</h1>
			  <h1><small>{{__('Invoice')}} {{__('reference')}} : {{$entity->reference_no}}</small></h1>
			  <h5>{{__('Date d’émission')}}: {{$entity->created_at->toDateString()}}</h5>
			</div>
		</div>
		  <div class="row">
		    <div class="col-xs-4">
		      <div class="panel panel-default">
		              <div class="panel-heading">
		                <h4>{{__('From')}}: <a href="#">Rentacs Tours</a></h4>
										</div>
		              <div class="panel-body">
		                <p>
                        13, Rue El Kassar, 1er Etage Maarif <br>
                        20100 Casablanca, Maroc<br>
                        {{__('Phone Number')}}: {{setting('home_phone')}}<br>
                        {{__('Email')}}: {{setting('home_email')}}<br>
		                </p>
		              </div>
		            </div>
		    </div>
		    <div class="col-xs-4 col-xs-offset-2 text-right">
		      <div class="panel panel-default">
						@if ($type == App\Models\Invoice::PURCHASE_TYPE)
						<div class="panel-heading">
							<h4>{{__('To')}} : <a href="#"> {{$beneficiary->name}}</a></h4>
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
							<h4>{{__('To')}} : <a href="#"> {{$beneficiary->profile->sur_name}}</a></h4>
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
				<td> </td>
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
				{{number_format((float)$entity->total, 2, '.', '')}} <br>
				{{number_format((float)$entity->total_tax, 2, '.', '')}} <br>
			    {{number_format((float)$entity->grand_total, 2, '.', '')}} <br>
				</strong>
			</div>
		</div>


		<div class="row">
		  <div class="col-xs-3">
		    <div class="panel panel-info">
			  <div class="panel-heading">
			    <h4>{{__('Bon pour Accord')}}</h4>
				<br>
				<br>
				<br>
			  </div>
			  <div class="panel-body">
			    <p></p>
			  </div>
			</div>
		  </div>
		  <div class="col-xs-7">
		   <div class="span7">
			  <div class="panel panel-info">
			    <div class="panel-heading">
			      <h4>{{__('Contact Details')}}</h4>
			    </div>
			     <div class="panel-body" >
                                 <p>RENTACS TOURS - Capital:  300.000DH
								 Adresse: 13, Rue El Kassar, 1er Etage Maarif 20100 Casablanca, Maroc    
								 Code Postal:  20100 - Tél:+212 522 252 386 - Email: info@rentacstours.com </p>
			     </div>
			    </div>
			  </div>
			</div>
		  </div>
		</div>
	</div>
	<div class="page-break"></div>
</body>
</html>