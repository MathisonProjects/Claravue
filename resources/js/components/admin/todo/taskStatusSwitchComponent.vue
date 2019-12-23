<template>
	<span>
		<span v-if='item.Status == 0' class='overline text-info'><i class="fas fa-puzzle-piece"></i> Ready</span>
		<span v-if='item.Status == 1' class='overline text-primary'><i class="fas fa-clock"></i> Active</span>
		<span v-if='item.Status == 2' class='overline text-info'><i class="fas fa-chalkboard"></i> PR Pending</span>
		<span v-if='item.Status == 3' class='overline text-warning'><i class="fas fa-cloud-sun"></i> QA</span>
		<span v-if='item.Status == 4' class='overline text-success'><i class="fas fa-check-circle"></i> Complete</span>
		<span v-if='item.Status == 5' class='overline text-danger'><i class="fas fa-dumpster-fire"></i> Roadblock</span>
	</span>
</template>

<script>
	export default {
		name      : "task-status-switch-component",
		props     : [
			'item'
		],
		components: {},
		created()   {},
		data()      { return {} },
		computed  : {},
		methods   : {},
		watch     : {}
	};
</script>

<style scoped></style>
