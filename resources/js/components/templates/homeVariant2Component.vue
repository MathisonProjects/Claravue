<template>
	<div>
		<div class='row'>
			<div class='col-xs-12 col-sm-4 col-md-4 div100 text-center' @click='navPage(data.imageUrl1)'>
				<div :style='imageStyleFormat(data.image1)' :class='inactiveCheck(data.imageActive1)'></div>
				<div class='displayText'>
					<span :class='inactiveTextCheck(data.imageActive1)'>{{ data.imageText1 }}</span>
				</div>
			</div>
			<div class='col-xs-12 col-sm-4 col-md-4 div100 text-center' @click='navPage(data.imageUrl2)'>
				<div :style='imageStyleFormat(data.image2)' :class='inactiveCheck(data.imageActive2)'></div>
				<div class='displayText'>
					<span :class='inactiveTextCheck(data.imageActive2)'>{{ data.imageText2 }}</span>
				</div>
			</div>
			<div class='col-xs-12 col-sm-4 col-md-4 div100 text-center' @click='navPage(data.imageUrl3)'>
				<div :style='imageStyleFormat(data.image3)' :class='inactiveCheck(data.imageActive3)'></div>
				<div class='displayText'>
					<span :class='inactiveTextCheck(data.imageActive3)'>{{ data.imageText3 }}</span>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		name      : "home-variant-2-component",
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
			}
		},
		methods   : {
			navPage(target) {
				this.$router.push(target)
			},
			imageStyleFormat(image) {
				var fullUrl = '/upload/'+image;
				return 'background-image: url("'+fullUrl+'")';
			},
			inactiveTextCheck(active) {
				if (active == '1') {
					return 'activeText';
				} else {
					return 'inactiveText';
				}
			},
			inactiveCheck(active) {
				if (active == '1') {
					return 'imageDisplay active';
				} else {
					return 'imageDisplay inactive';
				}
			}
		},
		watch     : {}
	};
</script>

<style scoped>
	.div100 {
		height: 100px;
		overflow: hidden;
	}
	.imageDisplay {
		width: 100%;
		height: 100px;
		position: absolute;
		z-index: 0;
		background-size: cover;
		background-position: center;
		margin: -10px -15px -10px -15px;
	}
	.activeText {
		color: red !important;
		background-color: white;
		padding: 10px 25px;
		border-radius: 25px;
		border: 2px solid red;
	}
	.active {
		filter: blur(3px);
		-webkit-filter: blur(3px);
		-moz-filter: blur(3px);
		-o-filter: blur(3px);
		-ms-filter: blur(3px);
	}
	.inactive {
		filter: blur(8px);
		-webkit-filter: blur(8px);
		-moz-filter: blur(8px);
		-o-filter: blur(8px);
		-ms-filter: blur(8px);
	}
	.displayText {
		right: 0px;
		left: 0px;
		position: absolute;
		z-index: 1;
		margin-top: 25px;
		color: white;
	}
</style>
