<template>
	<div>
		<div class='row'>
			<div class='col text-right'>
    			<button type="button" class='btn btn-primary' @click='toggle'><i class="fas fa-expand"></i> Go Fullscreen</button>
			</div>
		</div>
		<fullscreen ref="fullscreen" @change="fullscreenChange">
	    	<v-card class="mx-3 my-3">
				<v-card-text>
					<div class='subtitle-2'>This is test</div>
				</v-card-text>
			</v-card>
    	</fullscreen>
	</div>
</template>

<script>
	
	export default {
		name: 'fullscreen-component',
		components: {},
		props: [],
		data() {
			return {
				fullscreen: false
			}
		},
		computed: {},
		methods: {
			toggle () {
		        this.$refs['fullscreen'].toggle() // recommended
			},
		    fullscreenChange (fullscreen) {
		        this.fullscreen = fullscreen
			}
		}
	};
</script>

<style scoped>

</style>