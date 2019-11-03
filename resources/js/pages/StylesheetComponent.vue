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

		<v-card class='mt-3'>
			<v-card-title><a href='javascript:void(0)' v-if='show.accordion == false' @click='show.accordion = true'><i class="fas fa-plus"></i></a> <a href='javascript:void(0)' v-if='show.accordion == true' @click='show.accordion = false'><i class="fas fa-minus"></i></a> Accordion</v-card-title>
			<v-card-subtitle>accordionComponent [ records="array" ]</v-card-subtitle>
			<v-card-text v-if='show.accordion'>
				<accordionComponent :records='arrays.accordionRecords' />
			</v-card-text>
		</v-card>
		<v-card class='mt-3'>
			<v-card-title><a href='javascript:void(0)' v-if='show.carousel == false' @click='show.carousel = true'><i class="fas fa-plus"></i></a> <a href='javascript:void(0)' v-if='show.carousel == true' @click='show.carousel = false'><i class="fas fa-minus"></i></a> Carousel</v-card-title>
			<v-card-subtitle>carouselComponent [ records="array" ]</v-card-subtitle>
			<v-card-text v-if='show.carousel'>
				<carouselComponent :carouselItems='arrays.carouselRecords' />
			</v-card-text>
		</v-card>

	</div>
</template>

<script>
	import contactFormComponent from '@/components/contactFormComponent'
	import accordionComponent from '@/components/accordionComponent'
	import carouselComponent from '@/components/carouselComponent'
	export default {
		name: 'default-layout-component',
		components: {
			contactFormComponent,
			accordionComponent,
			carouselComponent
		},
		props: [],
		data() {
			return {
				show: {
					contactForm: false,
					accordion: false,
					carousel: false
				},
				arrays: {
					contactOptions: [],
					accordionRecords: [
						{
							title: 'Example 1',
							text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id sodales nibh. Sed vitae ex congue augue semper varius. Aenean scelerisque posuere sapien nec semper. Praesent laoreet egestas ante sed suscipit. Nullam molestie enim in augue consequat, cursus rutrum est pellentesque. Vestibulum ac congue felis, sed commodo justo. Mauris non sapien at nisl dictum finibus. Morbi rutrum massa eu velit scelerisque, ac vulputate arcu tincidunt. Vivamus sapien eros, vestibulum nec pulvinar eu, interdum quis nisi. Curabitur ornare viverra justo id ullamcorper. Proin tempus sem sollicitudin, blandit mi sed, bibendum lectus.'
						},
						{
							title: 'Example 2',
							text: 'Pellentesque eu ligula tempor dui semper eleifend eu nec nisl. Sed posuere dui tellus, nec vestibulum mi venenatis at. Integer posuere at ipsum eu iaculis. Proin volutpat vestibulum lectus at volutpat. Aenean aliquet laoreet tortor quis faucibus. Phasellus auctor ornare gravida. Aliquam erat volutpat. Etiam leo massa, iaculis vitae ipsum eget, vehicula scelerisque nisi. Suspendisse tristique fringilla sem a eleifend.'
						},
						{
							title: 'Example 3',
							text: 'Etiam feugiat, erat et laoreet cursus, turpis dolor molestie sem, ac hendrerit velit quam et nisl. Maecenas lacus nisi, efficitur sit amet consectetur facilisis, porttitor quis nunc. Nunc fringilla at mi quis vestibulum. Donec sed massa et tellus interdum volutpat sit amet sit amet eros. Vivamus id ipsum tortor. Phasellus eu nunc turpis. Nam ultrices tortor arcu, nec hendrerit enim porta pharetra. Praesent fermentum nisi mi, vel blandit metus laoreet ut. Quisque urna nisi, fermentum quis luctus ut, volutpat id ante. Duis eleifend, justo et hendrerit dapibus, ex ex placerat eros, vitae volutpat eros ex sed nibh. Aliquam purus est, commodo sit amet dapibus ut, ultricies sit amet risus.'
						}
					],
					carouselRecords: [
						{
							src: 'http://placekitten.com/500/200'
						},
						{
							src: 'http://placekitten.com/500/200'
						},
						{
							src: 'http://placekitten.com/500/200'
						}
					]
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