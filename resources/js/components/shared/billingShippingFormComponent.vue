<template>
	<div>
		<h5>{{ text }}</h5>
		<div class='row'>
			<div class='col-xs-12 col-md-6'>
				<v-text-field v-model='data.first' label='First Name' placeholder='eg. Jon' clearable dense />
			</div>
			<div class='col-xs-12 col-md-6'>
				<v-text-field v-model='data.last' label='Last Name' placeholder='eg. Doe' clearable dense />
			</div>
		</div>
		<div class='row'>
			<div class='col-xs-12 col-sm-12 col-md-6'>
				<v-text-field v-model='data.phone' label='Phone Number' placeholder='5555555555' clearable dense />
			</div>
			<div class='col-xs-12 col-sm-12 col-md-6'>
				<v-text-field v-model='data.email' label='Email' placeholder='jon.doe@example.com' clearable dense />
			</div>
		</div>
		<div class='row'>
			<div class='col-xs-12 col-sm-12 col-md-8'>
				<v-text-field v-model='data.street' label='Street Address' placeholder='eg. 123 Appleton Lane' clearable dense />
			</div>
			<div class='col-xs-12 col-sm-12 col-md-4'>
				<v-text-field v-model='data.apt' label='Apartment/Suite #' placeholder='eg. #3' clearable dense />
			</div>
		</div>
		<div class='row'>
			<div class='col-xs-12  col-sm-12 col-md-4'>
				<v-text-field v-model='data.city' label='City' placeholder='eg. Los Angeles' clearable dense />
			</div>
			<div class='col-xs-12 col-sm-6 col-md-4'>
				<v-select v-model='data.state' :items="statesList" :item-text='item => item.state' :item-value='item => item.code' label="State" placeholder='eg. California' clearable dense  />
			</div>
			<div class='col-xs-12 col-sm-6 col-md-4'>
				<v-text-field v-model='data.zip' label='Zip Code' placeholder='eg. 55555' clearable dense />
			</div>
		</div>
		<hr />
	</div>
</template>

<script>
	export default {
		name      : "billing-shipping-form-component",
		props     : [
			'text'
		],
		model: {
			event: 'updateModel'
		},
		components: {},
		created()   {},
		data()      {
			return {
				data: {
					first: null,
					last: null,
					street: null,
					apt: null,
					city: null,
					state: null,
					zip: null,
					phone: null,
					email: null
				}
			}
		},
		computed  : {
			statesList() {
				return this.$store.state.jsonStore.unitedStatesList;
			}
		},
		methods   : {},
		watch     : {
			data: {
				deep: true,
				handler: function(newVal, oldVal) {
					this.$emit('updateModel', newVal);
				}
			}
		}
	};
</script>

<style scoped></style>
