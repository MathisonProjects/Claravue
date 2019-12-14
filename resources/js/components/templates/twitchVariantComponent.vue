<template>
	<div>
		<v-card class="mx-auto">
			<v-card-text>
		    	<i class="fab fa-twitch"></i> {{ data.header }}

			    <h5>{{ data.tagline }}</h5>
			    <p>{{ data.message }}</p>

			    <iframe :src="iframeUrl" frameborder="0" allowfullscreen="true" scrolling="no" class='iframeArea'></iframe>
			    <a :href="linkUrl" style="padding:2px 0px 4px; display:block; width:345px; font-weight:normal; font-size:10px; text-decoration:underline;">Watch live video from {{ data.channel }} on www.twitch.tv</a>
			</v-card-text>
		</v-card>
	</div>
</template>

<script>
	export default {
		name      : "twitch-variant-component",
		props     : [
			'params'
		],
		components: {},
		created()   {},
		data()      {
			return {}
		},
		computed  : {
			data() {
				return JSON.parse(this.params.data);
			},
			iframeUrl() {
				return 'https://player.twitch.tv/?channel=' + this.data.channel
			},
			linkUrl() {
				return 'https://www.twitch.tv/' + this.data.channel + '?tt_content=text_link&tt_medium=live_embed'
			}
		},
		methods   : {},
		watch     : {}
	};
</script>

<style scoped>
	.iframeArea {
		height: 360px;
		width: 100%;
	}
</style>
