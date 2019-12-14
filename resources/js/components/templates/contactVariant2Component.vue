<template>
	<div>
		<v-card class="mx-auto pr-5">
			<v-card-text>
				<h3>Social Media</h3>
				<ul class="list-group">
					<li class="list-group-item" v-for="item in contactList">
						<span class='text-dark'><i :class='item.icon'></i> <b>{{ item.type }}</b></span> - <a :href='item.text' target='_BLANK'>{{ item.text }}</a>
					</li>
				</ul>
			</v-card-text>
		</v-card>

		<v-card class="mx-auto mt-3">
			<v-card-text>
				<h3>Contact Me</h3>
				<contactFormComponent :reasons='reasons' />
			</v-card-text>
		</v-card>
	</div>
</template>

<script>
	import contactFormComponent from '@/components/contactFormComponent'
	export default {
		name      : "contact-variant-2-component",
		props     : [
			'params'
		],
		components: {
			contactFormComponent
		},
		created()   {},
		data()      { return {} },
		computed  : {
			data() {
				return JSON.parse(this.params.data);
			},
			contactList() {
				var list = [];
				for (var i in this.data.icons) {
					list.push( {
						icon: this.data.icons[i],
						type: this.data.type[i],
						text: this.data.text[i]
					} );
				}
				return list;
			},
			reasons() {
				return this.data.reasons;
			}
		},
		methods   : { },
		watch     : {}
	};
</script>

<style scoped></style>
