<template>
	<v-app>
		<adminHeaderComponent v-if='loggedIn' />
		<v-content>
			<v-container fluid>
				<div class='container' v-if='loggedIn'>
					<router-view></router-view>
				</div>
				<div class='container' v-if='!loggedIn'>
					<v-card class="mx-auto" max-width="480" elevation='10'>
						<v-card-title>
							<v-icon large left>mdi-account</v-icon>
							<span class="title font-weight-light" v-if='totalUsers > 0'>Login</span>
							<span class="title font-weight-light" v-if='totalUsers === 0'>Register</span>
						</v-card-title>
						<v-card-text>
							<div class="text--primary">
								<registerComponent v-if='totalUsers === 0' />
								<loginComponent v-if='totalUsers > 0' />
							</div>
						</v-card-text>
  					</v-card>
				</div>
			</v-container>
		</v-content>
		<footerComponent v-if='loggedIn' />
	</v-app>
</template>

<script>
	import footerComponent from '@/layouts/footerComponent';
	import adminHeaderComponent from '@/layouts/adminHeaderComponent';
	import loginComponent from '@/components/loginComponent';
	import registerComponent from '@/components/registerComponent';
	export default {
		name: 'admin-layout-component',
		components: {
			footerComponent,
			adminHeaderComponent,
			loginComponent,
			registerComponent
		},
		props: [],
		data() {
			return {}
		},
		created() {
			this.$store.dispatch('counterStore/getUserCount');
		},
		computed: {
			totalUsers() {
				return this.$store.state.counterStore.users;
			},
			loggedIn() {
				return this.$store.getters['userStore/loggedIn'];
			}
		},
		methods: { }
	};
</script>

<style scoped></style>