<template>
	<div>
		<div class='overline' v-if='data.created_at != null'>
			Created At:  <br />
			Updated At: <br />
		</div>

		<div class='form-group'>
			<label for='label'>URL Key</label>
			<input type='text' id='label' class='form-control' v-model='data.key' placeholder='eg. your-page-url' />
		</div>
		<div class='form-group'>
			<label for='label'>Page Title</label>
			<input type='text' id='label' class='form-control' v-model='data.title' placeholder='eg. Example Name' />
		</div>
		<div class='form-group'>
			<label for='label'>Page Type</label>
			<v-select v-model="data.type" :items="pageTypes" label="Page Type"></v-select>
		</div>
		<div v-if='data.type == "Home1"'>
			<div class='row'>
				<div class='col-xs-12 col-md-4'>
					Carousel Image 1
					Carousel Text 1
				</div>
				<div class='col-xs-12 col-md-4'>
					Carousel Image 2
					Carousel Text 2
				</div>
				<div class='col-xs-12 col-md-4'>
					Carousel Image 3
					Carousel Text 3
				</div>
			</div>	
			<div class='row'>
				<div class='col-xs-12 col-md-4'>
					Header 1
					Subtitle 1
					Text 1
					Button Target
				</div>
				<div class='col-xs-12 col-md-4'>
					Header 2
					Subtitle 2
					Text 2
					Button Target 2
				</div>
				<div class='col-xs-12 col-md-4'>
					Header 3
					Subtitle 3
					Text 3
					Button Target 3
				</div>
			</div>	
			<div class='row'>
				<div class='col-xs-12 col-md-4'>
					Header 1
					Text 1
				</div>
				<div class='col-xs-12 col-md-4'>
					Header 2
					Text 2
				</div>
				<div class='col-xs-12 col-md-4'>
					Header 3
					Text 3
				</div>
			</div>	
		</div>
		<div v-if='data.type == "Home2"'>
			Home2
		</div>
		<div v-if='data.type == "About1"'>
			About1
		</div>
		<div v-if='data.type == "About2"'>
			About2
		</div>

		<div class='row'>
			<div class='col text-right'><button type='button' class='btn btn-primary' :disabled='saveReady'><i class='fas fa-save'></i> Save</button></div>
		</div>
	</div>
</template>

<script>
	export default {
		name      : "set-page-component",
		props     : [],
		components: {
		},
		created()   {},
		data()      {
			return {
				pageTypes: [
					'Home1',
					'Home2',
					'About1',
					'About2'
				],
				data: {
					key: null,
					title: null,
					type: null,
					created_at: null,
					updated_at: null,
					data: []
				}
			}
		},
		computed  : {
			saveReady() {
				if (this.data.key != null && this.data.title != null && this.data.type != null) {
					return false;
				}
				return true;
			}
		},
		methods   : {
			save() {
				this.$store.dispatch('pageStore/savePages', this.data);
			}
		},
		watch     : {}
	};
</script>

<style scoped></style>
