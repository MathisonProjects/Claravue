<template>
	<div>
		<h1><i class="fas fa-lightbulb"></i> Interest Check</h1>

		<v-card class="mx-auto">
			<v-card-text v-if='step == 0'>
				<div class='form-group'>
					<label for='label'><i class="fas fa-signature"></i> Name</label>
					<input type='text' id='label' class='form-control form-control-sm' placeholder='eg. Jon Doe' v-model='data.name' />
				</div>
				<div class='form-group'>
					<label for='label'><i class="fas fa-at"></i> Email</label>
					<input type='text' id='label' class='form-control form-control-sm' placeholder='eg. jon@example.com' v-model='data.email' />
				</div>
				<div class='form-group'>
					<label for='label'><i class="fas fa-comments"></i> Suggestion</label>
					<input type='text' id='label' class='form-control form-control-sm' placeholder='eg. Improve my golf swing' v-model='data.suggestion' />
				</div>
				<div class='row'>
					<div class='col-xs-12 col-md-6'>
						<div class='form-group'>
							<label for='label'><i class="fas fa-road"></i> Street Address</label>
							<input type='text' id='label' class='form-control form-control-sm' placeholder='eg. 123 Example Ave' v-model='data.address.street1' />
						</div>
					</div>
					<div class='col-xs-12 col-md-6'>
						<div class='form-group'>
							<label for='label'><i class="fas fa-list-ol"></i> Apartment/Suite</label>
							<input type='text' id='label' class='form-control form-control-sm' placeholder='eg. Apt #k' v-model='data.address.street2' />
						</div>
					</div>
				</div>
				<div class='row'>
					<div class='col-xs-12 col-md-4'>
						<div class='form-group'>
							<label for='label'><i class="fas fa-city"></i> City</label>
							<input type='text' id='label' class='form-control form-control-sm' placeholder='eg. Example City' v-model='data.address.city' />
						</div>
					</div>
					<div class='col-xs-12 col-md-4'>
						<div class='form-group'>
							<label for='label'><i class="fas fa-open"></i> State</label>
							<input type='text' id='label' class='form-control form-control-sm' placeholder='eg. US State Name' v-model='data.address.state' />
						</div>
					</div>
					<div class='col-xs-12 col-md-4'>
						<div class='form-group'>
							<label for='label'><i class="fas fa-usps"></i> Zip Code</label>
							<input type='text' id='label' class='form-control form-control-sm' placeholder='eg. 54321-1235' v-model='data.address.zipCode' />
						</div>
					</div>
				</div>
				<div class='row'>
					<div class='col text-right'>
						<button type='button' class='btn btn-primary' @click='submitInterest'><i class='fas fa-paper-plane'></i> Submit Interest</button>
					</div>
				</div>
			</v-card-text>
			<v-card-text v-if='step == 1'>
				<p>Thank you for your interest!</p>
				<p>We will reach out to you pertaining to your interest when we are ready for you!</p>
			</v-card-text>
		</v-card>
	</div>
</template>

<script>
	export default {
		name      : "interest-check-component",
		props     : [],
		components: {},
		created()   {},
		data()      {
			return {
				step: 0,
				data: {
					name: null,
					email: null,
					suggestion: null,
					address: {
						street1: null,
						street2: null,
						city: null,
						state: null,
						zipCode: null
					}
				}
			}
		},
		computed  : {},
		methods   : {
			submitInterest() {
				var data = {
					data: JSON.stringify(this.data)
				};
				this.$store.dispatch('interestCheckStore/saveResult', data);
				this.step++;
			}
		},
		watch     : {}
	};
</script>

<style scoped></style>
