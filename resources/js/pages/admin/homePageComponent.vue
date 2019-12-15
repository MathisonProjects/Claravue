<template>
	<div>
		<h1><v-icon x-large>mdi-home</v-icon> Home</h1>

		<div class='row'>
			<div class='col-xs-12 col-md-12'>
				<v-card class="mx-auto">
					<v-card-text>
						<div class='row'>
							<div class='col-xs-12 col-md-6'><div class='subtitle-2'>Fullscreen Dashboard</div></div>
							<div class='col-xs-12 col-md-6 text-right'>
		    					<button type="button" class='btn btn-link' @click='fullscreenToggle'><i class="fas fa-expand"></i> Display</button>
							</div>
						</div>
						<fullscreen ref="fullscreen" @change="fullscreenChange">
							<div>
								<div class='row row-full'>
									<div class='col-md-6'>
										<displayDashboardItemComponent display='whois' />
									</div>
									<div class='col-md-6'>
										<displayDashboardItemComponent display='placeholder' />
									</div>
									<div class='col-md-6'>
										<displayDashboardItemComponent display='functioningStores' />
									</div>
									<div class='col-md-6'>
										<displayDashboardItemComponent display='modulesUsed' />
									</div>

								</div>
							</div>
				    	</fullscreen>
					</v-card-text>
				</v-card>
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
				fullscreen: false
			}
		},
		computed  : {},
		methods   : {
			refreshStores() {
				this.$Helper.bootHelper.init();
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
