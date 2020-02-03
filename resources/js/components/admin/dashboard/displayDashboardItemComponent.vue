<template>
	<v-card class='displayContainer'>
		<v-card-text v-if='display != null || displayChosen != null'>
			<whoisComponent v-if='display == "whois" || displayChosen == "whois"' />
			<modulesUsedComponent v-if='display == "modulesUsed" || displayChosen == "modulesUsed"' />
			<functioningStoresComponent v-if='display == "functioningStores" || displayChosen == "functioningStores"' />
			<taskListComponent v-if='display == "taskList" || displayChosen == "taskList"' />
			<devModeComponent v-if='display == "devMode" || displayChosen == "devMode"' />
		</v-card-text>
		<v-card-text v-if='display == null && displayChosen == null'>
			<v-select :items="optionList" v-model="displayChosen" label="Display"></v-select>
		</v-card-text>
	</v-card>
</template>

<script>
	import whoisComponent from '@/components/admin/dashboard/whoisComponent';
	import modulesUsedComponent from '@/components/admin/dashboard/modulesUsedComponent';
	import functioningStoresComponent from '@/components/admin/dashboard/functioningStoresComponent';
	import taskListComponent from '@/components/admin/dashboard/taskListComponent';
	import devModeComponent from '@/components/admin/dashboard/devModeComponent';
	export default {
		name      : "display-dashboard-item-component",
		props     : [
			'display'
		],
		components: {
			whoisComponent,
			modulesUsedComponent,
			functioningStoresComponent,
			taskListComponent,
			devModeComponent
		},
		created()   {},
		data()      {
			return {
				updating: true,
				displayChosen: null,
				optionList: [
					'whois',
					'modulesUsed',
					'functioningStores',
					'taskList',
					'devMode'
				]
			}
		},
		computed  : {},
		methods   : {},
		watch     : {}
	};
</script>

<style scoped>
	.displayContainer {
		height: 100%;
		overflow-y: scroll;
		max-height: 515px;
		border-top: solid 1px #000000;
		border-bottom: solid 1px #000000;
	}
	.displayContainer::-webkit-scrollbar {
	  width: 10px;
	}

	/* Track */
	.displayContainer::-webkit-scrollbar-track {
	  background: #f1f1f1; 
	}
	 
	/* Handle */
	.displayContainer::-webkit-scrollbar-thumb {
	  background: #888; 
	}

	/* Handle on hover */
	.displayContainer::-webkit-scrollbar-thumb:hover {
	  background: #555; 
	}
</style>
