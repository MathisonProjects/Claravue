<template>
	<v-card>
		<v-card-text v-if='display != null || displayChosen != null'>
			<whoisComponent v-if='display == "whois" || displayChosen == "whois"' />
			<modulesUsedComponent v-if='display == "modulesUsed" || displayChosen == "modulesUsed"' />
			<functioningStoresComponent v-if='display == "functioningStores" || displayChosen == "functioningStores"' />
		</v-card-text>
		<v-card-text v-if='display == null && displayChosen == null'>
			<v-select :items="optionList" v-model="displayChosen" label="Display"></v-select>
		</v-card-text>
	</v-card>
</template>

<script>
	import whoisComponent from '@/components/admin/dashboard/whoisComponent'
	import modulesUsedComponent from '@/components/admin/dashboard/modulesUsedComponent'
	import functioningStoresComponent from '@/components/admin/dashboard/functioningStoresComponent'
	export default {
		name      : "display-dashboard-item-component",
		props     : [
			'display'
		],
		components: {
			whoisComponent,
			modulesUsedComponent,
			functioningStoresComponent
		},
		created()   {},
		data()      {
			return {
				updating: true,
				displayChosen: null,
				optionList: [
					'whois',
					'modulesUsed',
					'functioningStores'
				]
			}
		},
		computed  : {},
		methods   : {},
		watch     : {}
	};
</script>

<style scoped></style>
