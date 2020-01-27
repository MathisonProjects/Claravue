<template>
	<div>
		<div v-if='page == null'>
			<div class='row'>
				<div class='col-md-12 text-center'>
					<img src='/images/logo_claravue.png' width='400px' />
				</div>
			</div>
			<p>This app is developed off of VueJs and Laravel in hopes of streamlining the development of powerful websites.</p>
			<p>Your next steps is to create and log into the <a href='/admin' target='_BLANK'>administration</a> in order to start using your site.</p>
			<p>If you have any ideas, feedback, or requests, please send them to <a href='mailto:jacob@mathisonprojects.com'>jacob@mathisonprojects.com</a></p>
			<p>- Jacob Mathison [Developer]</p>
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
