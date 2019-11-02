<template>
	<div>
		<h1>Stylesheet</h1>
		<p>These are the default components that is made available to help rapidly build out the site of your dreams!</p>

		<v-card>
			<v-card-title><a href='javascript:void(0)' v-if='show.contactForm == false' @click='show.contactForm = true'><i class="fas fa-plus"></i></a> <a href='javascript:void(0)' v-if='show.contactForm == true' @click='show.contactForm = false'><i class="fas fa-minus"></i></a> Contact Form</v-card-title>
			<v-card-subtitle>contactFormComponent [ records="array" small="boolean"]</v-card-subtitle>
			<v-card-text v-if='show.contactForm'>
				<contactFormComponent records='' small='true' @messageCallback='messageCallback' />
			</v-card-text>
		</v-card>
	</div>
</template>

<script>
	import contactFormComponent from '@/components/contactFormComponent'
	export default {
		name: 'default-layout-component',
		components: {
			contactFormComponent
		},
		props: [],
		data() {
			return {
				show: {
					contactForm: false
				}
			}
		},
		computed: {},
		methods: {
			messageCallback(data) {
				console.log('-----------FIRED CONTACT FORM-----------');
				console.log(data);
				console.log('----------------------------------------');
			}
		}
	};
</script>

<style scoped></style>