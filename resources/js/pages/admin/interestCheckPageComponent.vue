<template>
	<div>
		<h1><v-icon>mdi-lightbulb</v-icon>Interest Check</h1>

		<v-data-table :headers="headers" :items="interestList" :items-per-page="perPage" show-select single-select v-model='selected' class="elevation-1" dense></v-data-table>

	</div>
</template>

<script>
	export default {
		name      : "interest-check-page-component",
		props     : [],
		components: {},
		created()   {},
		data()      {
			return {
				perPage: 5,
				headers: [
					{ text: 'Name', value: 'name' },
					{ text: 'Email', value: 'email' },
					{ text: 'Suggestion', value: 'suggestion' },
					{ text: 'Street', value: 'street1' },
					{ text: 'Apt', value: 'street2' },
					{ text: 'City', value: 'city' },
					{ text: 'State', value: 'state' },
					{ text: 'Zip', value: 'zipCode' }
		        ],
		        selected: [],
			}
		},
		computed  : {
			interestList() {
				var interest = this.$store.state.interestCheckStore.results;
				var returnItems = [];
				for (var i in interest) {
					var data = JSON.parse(interest[i].data);
					returnItems.push({
						name: data.name,
						email: data.email,
						suggestion: data.suggestion,
						street1: data.address.street1,
						street2: data.address.street2,
						city: data.address.city,
						state: data.address.state,
						zipCode: data.address.zipCode
					});
				}
				return returnItems;
			}
		},
		methods   : {},
		watch     : {}
	};
</script>

<style scoped></style>
