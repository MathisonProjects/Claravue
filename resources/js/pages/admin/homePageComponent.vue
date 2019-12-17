<template>
	<div>
		<div class='row'>
			<div class='col-xs-12 col-md-12'>
				<div class='row'>
					<div class='col-xs-12 col-md-7'>
						<h1><v-icon x-large>mdi-home</v-icon> Home</h1>
					</div>
					<div class='col-xs-12 col-md-2 text-right'>
    					<v-select :items="variants" v-model="displayVariant" label="Display Variant" dense></v-select>
					</div>
					<div class='col-xs-12 col-md-3 text-right'>
    					<button type="button" class='btn btn-link' @click='customOnly'><i class="fas fa-trash"></i> Cutomize</button>
    					<button type="button" class='btn btn-link' @click='fullscreenToggle'><i class="fas fa-expand"></i> Display</button>
					</div>
				</div>
				<fullscreen ref="fullscreen" @change="fullscreenChange">
					<div class='row row-full' v-if='displayVariant == 1'>
						<div class='col-md-6' v-for='item in displayItems'>
							<displayDashboardItemComponent :display='item' v-if='item != "loading"' />
						</div>
					</div>
					<div class='row row-full' v-if='displayVariant == 2'>
						<div class='col-md-4' v-for='item in displayItems'>
							<displayDashboardItemComponent :display='item' v-if='item != "loading"' />
						</div>
					</div>
				</fullscreen>
			</div>
		</div>
	</div>
</template>

<script>
	import displayDashboardItemComponent from '@/components/admin/dashboard/displayDashboardItemComponent'
	export default {
		name      : "admin-home-component",
		props     : [],
		components: {
			displayDashboardItemComponent
		},
		created()   {},
		data()      {
			return {
				fullscreen: false,
				displayVariant: 1,
				variants: [
					1,
					2
				],
				displayItems: [
					'whois',
					'modulesUsed',
					'functioningStores',
					null
				]
			}
		},
		computed  : {},
		methods   : {
			customOnly() {
				this.displayItems = [ 'loading', 'loading', 'loading', 'loading' ];
				setTimeout(() => {
					this.displayItems = [ null, null, null, null ];
				}, 1)
			},
			fullscreenToggle () {
		        this.$refs['fullscreen'].toggle() // recommended
			},
		    fullscreenChange (fullscreen) {
		        this.fullscreen = fullscreen
			}
		},
		watch     : {}
	};
</script>

<style scoped>
	.row-full {
	    margin-right: 0px;
	    margin-left: 0px;
	}
</style>
