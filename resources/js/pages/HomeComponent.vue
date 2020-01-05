<template>
	<div>
		<div v-if='page == null'>
			<h1>Welcome Home!</h1>
			<p>You are ready to start making your site!!</p>
		</div>

		<v-card class="mx-auto" v-if='page != null && pageData.cardify'>
			<v-card-text>
				<templateFilterComponent :type='page.type' :params='page' />
			</v-card-text>
		</v-card>
		
		<span v-if='page != null && !pageData.cardify'>
			<templateFilterComponent :type='page.type' :params='page' />
		</span>
	</div>
</template>

<script>
	import templateFilterComponent from '@/components/templates/templateFilterComponent'
	import { storeGetters } from '@/enum';
	export default {
		name: 'home-component',
		components: {
			templateFilterComponent
		},
		props: [],
		data() {
			return {}
		},
		computed: {
			page() {
				return this.$store.getters[storeGetters.PAGE_HOME];
			},
			pageData() {
				if (this.page.data !== undefined) {

					return JSON.parse(this.page.data);
				}
				return null;
			}
		},
		methods: {}
	};
</script>

<style scoped>
</style>
