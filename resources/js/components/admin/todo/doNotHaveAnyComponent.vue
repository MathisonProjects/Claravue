<template>
	<div class='row'>
		<div class='col'>
			<v-card class="mx-auto">
				<v-card-text>
					You do not have any {{ type }}s!
				</v-card-text>
			</v-card>
		</div>
	</div>
</template>

<script>
	export default {
		name      : "do-not-have-any-component",
		props     : [
			'type'
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
