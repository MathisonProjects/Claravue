<template>
	<v-alert :icon="alert.icon" dense text :type="alert.type" v-if='alert.display'>
      {{alert.text}}
    </v-alert>
</template>

<script>
	export default {
		name      : "alert-component",
		props     : [],
		components: {},
		created()   {},
		data()      {
			return {}
		},
		computed  : {
			alert() {
				return this.$store.state.alertStore;
			}
		},
		methods   : {},
		watch     : {}
	};
</script>

<style scoped></style>
