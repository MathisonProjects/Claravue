<template>
	<div>
		<carouselComponent :carouselItems='carouselItems' />

		<div class='row'>
			<div class='col-xs-12 col-sm-12 col-md-4' v-for='(cardItem, index) in cardData'>
				<v-card class="mx-auto">
					<v-card-text>
						<h5>{{ cardItem.header }}</h5>
						<span v-html='cardItem.content'></span>
					</v-card-text>
				</v-card>
			</div>
		</div>

		<accordionComponent v-if='accordionData.length > 0' :records='accordionData' />	
	</div>
</template>

<script>
	import carouselComponent from '@/components/carouselComponent';
	import accordionComponent from '@/components/accordionComponent';
	export default {
		name      : "home-variant-1-component",
		props     : [
			'params'
		],
		components: {
			carouselComponent,
			accordionComponent
		},
		created()   {},
		data()      { return {} },
		computed  : {
			data() {
				return JSON.parse(this.params.data);
			},
			carouselItems() {
				return [
					{
						src: '/upload/' + this.data.image1
					},
					{
						src: '/upload/' +this.data.image2
					},
					{
						src: '/upload/' +this.data.image3
					}
				];
			},
			cardData() {
				return [
					{
						header: this.data.cardHeader1,
						content: this.data.cardContent1
					},
					{
						header: this.data.cardHeader2,
						content: this.data.cardContent2
					},
					{
						header: this.data.cardHeader3,
						content: this.data.cardContent3
					}
				];
			},
			accordionData() {
				var accordionData = [];
				for (var i in this.data.accordionHeaders) {
					accordionData.push({
						title: this.data.accordionHeaders[i],
						text: this.data.accordionContent[i]
					});
				}
				return accordionData;
			}
		},
		methods   : {},
		watch     : {}
	};
</script>

<style scoped></style>
