<template>
	<v-card>
		<v-card-text>
			<whoisComponent v-if='display == "whois"' />
			<modulesUsedComponent v-if='display == "modulesUsed"' />
			<functioningStoresComponent v-if='display == "functioningStores"' />
			<div v-if='display == "placeholder"'>TBD...</div>
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
		data()      { return {} },
		computed  : {},
		methods   : {},
		watch     : {}
	};
</script>

<style scoped></style>
