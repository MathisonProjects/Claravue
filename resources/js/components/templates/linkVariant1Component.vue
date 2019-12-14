<template>
	<div class='text-center'>
		<div v-for='link in links'>
			<a :href='link.url' target='_BLANK'>{{link.text}}</a>
		</div>
	</div>
</template>

<script>
	export default {
		name      : "link-variant-1-component",
		props     : [
			'params'
		],
		components: { },
		created()   {},
		data()      { return {} },
		computed  : {
			data() {
				return JSON.parse(this.params.data);
			},
			links() {
				var linkList = [];
				for (var i in this.data.urls) {
					linkList.push({
						url: this.data.urls[i],
						text: this.data.text[i]
					});
				}
				return linkList;
			}
		},
		methods   : {},
		watch     : {}
	};
</script>

<style scoped></style>
