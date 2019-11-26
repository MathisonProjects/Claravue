<div>
	Reason: {{ $data['data']['reason'] }}<br />
	Subject: {{ $data['data']['subject'] }}<br />
	Name: {{ $data['data']['name'] }}<br />
	Email: {{ $data['data']['email'] }}<br />
	Phone: {{ $data['data']['phone'] }}<br />
	Street: {{ $data['data']['address']['street'] }}<br />
	Suite: {{ $data['data']['address']['suite'] }}<br />
	City: {{ $data['data']['address']['city'] }}<br />
	State: {{ $data['data']['address']['state'] }}<br />
	Zip: {{ $data['data']['address']['zip'] }}<br /><br />

	Message: {{ $data['data']['message'] }}
</div>