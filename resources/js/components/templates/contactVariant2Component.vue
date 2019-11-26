<template>
	<div>
		<v-card class="mx-auto">
			<v-card-text>
				<ul class="list-group">
					<li class="list-group-item" v-for="item in contactList">
						<i :class='item.icon'></i> {{ item.type }} - {{ item.text }}
					</li>
				</ul>
			</v-card-text>
		</v-card>
		<contactFormComponent :reasons='reasons' />
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
