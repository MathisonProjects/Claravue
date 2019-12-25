<template>
	<v-expansion-panels accordion focusable>
		<v-expansion-panel v-for="(item, index) in headers" :key="index">
			<v-expansion-panel-header>
				<span><i :class='faIcons[index]' v-if='faIcons[index] !== undefined'></i> {{ item }}</span>
			</v-expansion-panel-header>
        	<v-expansion-panel-content class='px-3 pt-3' v-html='content[index]'></v-expansion-panel-content>
		</v-expansion-panel>
	</v-expansion-panels>
</template>

<script>
	export default {
		name      : "accordion-variant-component",
		props     : [
			'params'
		],
		components: {},
		created()   {},
		computed  : {
			data() {
				return JSON.parse(this.params.data);
			},
			headers() {
				return this.data.header;
			},
			content() {
				return this.data.content;
			},
			faIcons() {
				return this.data.faIcon;
			}
		},
		data()      { return {} },
		methods   : {},
		watch     : {}
	};
</script>

<style scoped></style>
