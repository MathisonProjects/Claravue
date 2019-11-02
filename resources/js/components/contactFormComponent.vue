<template>
	<div>
		<div class='form-group'>
			<label for='reason'><i class="fas fa-lightbulb"></i> Reason</label>
			<select :class='formControlType' v-model='data.reason'>
				<option>--Pick Reason--</option>
				<option></option>
			</select>
		</div>
		<div class='form-group'>
			<label for='subject'><i class="fas fa-pen-fancy"></i> Subject</label>
			<input type='text' v-model='data.subject' :class='formControlType' placeholder='eg. Subject' />
		</div>
		<div class='form-group'>
			<label for='name'><i class="fas fa-signature"></i> Name</label>
			<input type='text' v-model='data.name' :class='formControlType' placeholder='eg. Name' />
		</div>
		<div class='row'>
			<div class='col-xs-12 col-md-6'>
				<div class='form-group'>
					<label for='email'><i class="fas fa-at"></i> Email</label>
					<input type='text' v-model='data.email' :class='formControlType' placeholder='eg. Email' />
				</div>
			</div>
			<div class='col-xs-12 col-md-6'>
				<div class='form-group'>
					<label for='phone'><i class="fas fa-phone"></i> Phone</label>
					<input type='text' v-model='data.phone' :class='formControlType' placeholder='eg. Phone' />
				</div>
			</div>
		</div>
		<div class='row'>
			<div class='col-xs-12 col-md-8'>
				<div class='form-group'>
					<label for='streetAddress'><i class="fas fa-road"></i> Street Address</label>
					<input type='text' v-model='data.address.street' :class='formControlType' placeholder='eg. Street' />
				</div>
			</div>
			<div class='col-xs-12 col-md-4'>
				<div class='form-group'>
					<label for='suite'>Suite/Apt</label>
					<input type='text' v-model='data.address.suite' :class='formControlType' placeholder='eg. Suite' />
				</div>
			</div>
		</div>
		<div class='row'>
			<div class='col'>
				<div class='form-group'>
					<label for='city'><i class="fas fa-city"></i> City</label>
					<input type='text' v-model='data.address.city' :class='formControlType' placeholder='eg. City' />
				</div>
			</div>
			<div class='col'>
				<div class='form-group'>
					<label for='state'><i class="fas fa-door-open"></i>State</label>
					<input type='text' v-model='data.address.state' :class='formControlType' placeholder='eg. State' />
				</div>
			</div>
			<div class='col'>
				<div class='form-group'>
					<label for='zipcode'><i class="fab fa-usps"></i> Zipcode</label>
					<input type='text' v-model='data.address.zip' :class='formControlType' placeholder='eg. Zipcode' />
				</div>
			</div>
		</div>
		<div class='form-group'>
			<label for='message'><i class="fas fa-envelope-open-text"></i> Message</label>
			<input type='text' v-model='data.message' :class='formControlType' placeholder='eg. Message' />
		</div>
		<div class='row'>
			<div class='col text-right'>
				<button type='button' class='btn btn-primary'><i class='fas fa-paper-plane'></i> Send</button>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		name      : "contact-form-component",
		props     : [
			'reasons',
			'small'
		],
		components: {},
		created()   {},
		data()      {
			return {
				data: {
					reason: null,
					subject: null,
					email: null,
					phone: null,
					name: null,
					message: null,
					address: {
						street: null,
						suite: null,
						city: null,
						state: null,
						zip: null
					}
				}
			}
		},
		computed  : {
			formControlType() {
				if (this.small == true || this.small == 'true') {
					return 'form-control form-control-sm';
				} else {
					return 'form-control';
				}
			}
		},
		methods   : {
			sendMessage() {
				this.$emit('messageCallback', this.data);
			}
		},
		watch     : {}
	};
</script>

<style scoped></style>
