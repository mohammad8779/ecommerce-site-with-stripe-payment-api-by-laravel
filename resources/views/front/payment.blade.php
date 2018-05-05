@extends('layout.main')

@section('content')

<br/>  
<br/> 
<div class="row">
  <div class="small-6 small-centered columns"> 
		  <form action="{{route('payment.store')}}" method="post" id="payment-form">
		  	{{csrf_field()}}
			  <div class="form-row">
			    <label for="card-element">
			      Credit or debit card
			    </label>
			    <div id="card-element">
			      <!-- a Stripe Element will be inserted here. -->
			    </div>

			    <!-- Used to display Element errors -->
			    <div id="card-errors" role="alert"></div>
			  </div>

			  <button>Submit Payment</button>
		</form>

   </div>
</div>

<br/>  
<br/> 
@endsection