<html>
	<head>
        <link rel="stylesheet" href="https://dev-vuelaravelclean-com.mathisonprojects.dev/css/app.css">
    </head>
    <body>
    	<div class='container'>
    		<p>
    			Your order is being processed! Here is your order information.
    		</p>
	    	<div class='row'>
	    		<div class='col-md-6'>
					<h5>Billing</h5>

					<address>
						{{ $data['billing']['first'] }} {{ $data['billing']['last'] }}<br />
						{{ $data['billing']['street'] }} {{ $data['billing']['apt'] }}<br />
						{{ $data['billing']['city'] }} {{ $data['billing']['state'] }}, {{ $data['billing']['zip'] }}<br />
						{{ $data['billing']['phone'] }}<br />
						{{ $data['billing']['email'] }}
					</address>
	    		</div>
	    		<div class='col-md-6'>
					<h5>Shipping</h5>

					<address>
						{{ $data['shipping']['first'] }} {{ $data['shipping']['last'] }}<br />
						{{ $data['shipping']['street'] }} {{ $data['shipping']['apt'] }}<br />
						{{ $data['shipping']['city'] }} {{ $data['shipping']['state'] }}, {{ $data['shipping']['zip'] }}<br />
						{{ $data['shipping']['phone'] }}<br />
						{{ $data['shipping']['email'] }}
					</address>
	    		</div>
	    	</div>

			<h5>Order: ${{ money_format('%(#10n', $data['amount']) }}</h5>
			<div class='row'>
				@foreach ($data['cart'] as $key => $item)
				<div class='col-md-12'>
					${{ money_format('%(#10n', $item['amount']) }} - <b>{{ $item['name'] }}</b> - <i>{{ $item['short_description'] }}</i>
				</div>
				@endforeach
			</div>

    	</div>
    </body>
</html>
