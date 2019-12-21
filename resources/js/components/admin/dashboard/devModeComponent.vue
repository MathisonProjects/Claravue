<template>
	<div>
		<button type='button' class='btn btn-info btn-block' v-if='!devMode' @click='setMode("on")'>
			<i class="fab fa-dev"></i><br />
			Cache Mode
		</button>
		<button type='button' class='btn btn-warning btn-block' v-if='devMode' @click='setMode("off")'>
			<i class="fab fa-dev"></i><br />
			Dev Mode
		</button>
	</div>
</template>

<script>
	export default {
		name      : "dev-mode-component",
		props     : [],
		components: {},
		created()   {

		},
		data()      { return {} },
		computed  : {
			devMode() {
				return this.$store.state.cloudflareStore.devMode;
			}
		},
		methods   : {
			setMode(type) {
				this.$Helper.nodeServer.changeDevelopmentMode(type);
			}
		},
		watch     : {}
	};
</script>

<style scoped></style>
