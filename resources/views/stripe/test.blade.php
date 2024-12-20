@extends('layouts.app-public')

@section('content')

     @include('includes.header')

     <!-- main-container start -->
			<!-- ================ -->
			<section class="main-container">

				<div class="container">
					<div class="row">
						@include('flash::message')

						<!-- main start -->
						<!-- ================ -->
						<div class="main object-non-visible" data-animation-effect="fadeInDownSmall" data-effect-delay="300">
							<div class="form-block center-block">
								<h2 class="title">Stripe Payment Testing</h2>
								<hr>
								<form action="{{url('/stripe/charge')}}" method="POST">
									{{ csrf_field() }}
						            <script
						                    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
						                    data-key="{{ env('STRIPE_PUB_KEY') }}"
						                    data-amount="1999"
						                    data-name="Stripe Demo"
						                    data-description="Online course about integrating Stripe"
						                    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
						                    data-locale="auto"
						                    data-currency="usd">
						            </script>
						        </form>
							</div>
						</div>
						<!-- main end -->

					</div>
				</div>
			</section>
			<!-- main-container end -->



	@include('includes.footer')

    @include('includes.subfooter')
			
@endsection