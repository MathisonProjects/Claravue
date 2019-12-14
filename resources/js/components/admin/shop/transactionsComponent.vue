<template>
	<div>
		<v-data-table :headers="headers" :items="transactionList" :items-per-page="perPage" show-select single-select v-model='selected' class="elevation-1" dense></v-data-table>
	</div>
</template>

<script>
	export default {
		name      : "shop-transactions-component",
		props     : [],
		components: {},
		created()   {},
		data()      {
			return {
				perPage: 5,
				headers: [
					{ text: 'Id', value: 'id' },
					{ text: 'Buyer', value: 'name' },
					{ text: 'Transaction Id', value: 'tid' },
					{ text: 'Amount', value: 'amount' },
					{ text: 'Bought At', value: 'created_at' }
				],
				selected: []
			}
		},
		computed  : {
			transactionList() {
				return []
			}
		},
		methods   : {},
		watch     : {}
	};
</script>

<style scoped></style>
