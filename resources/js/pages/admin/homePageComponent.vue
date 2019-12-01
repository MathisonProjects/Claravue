<template>
	<div>
		<h1><v-icon x-large>mdi-home</v-icon> Home</h1>
		<div class='row'>
			<div class='col-xs-12 col-md-4'>
				<v-card class="mx-auto">
					<v-card-text>
						<div class='subtitle-2'>User</div>
						<div class='overline'>Username: {{ user.name }}</div>
						<div class='overline'>Email: {{ user.email }}</div>
						<div class='overline'>Created: {{ user.created_at }}</div>
					</v-card-text>
				</v-card>
			</div>
			<div class='col-xs-12 col-md-4'>
				<v-card class="mx-auto">
					<v-card-text>
						Modules Used
						<ul class="list-group">
							<li class="list-group-item"><i class="fas fa-circle text-success" v-if='settings.membershipEnabled == "1"'></i> <i class="fas fa-circle text-danger" v-if='settings.membershipEnabled == "0"'></i> Membership</li>
							<li class="list-group-item"><i class="fas fa-circle text-success" v-if='settings.blogEnabled == "1"'></i> <i class="fas fa-circle text-danger" v-if='settings.blogEnabled == "0"'></i> Blog</li>
							<li class="list-group-item"><i class="fas fa-circle text-success" v-if='settings.shopEnabled == "1"'></i> <i class="fas fa-circle text-danger" v-if='settings.shopEnabled == "0"'></i> Shopping</li>
							<li class="list-group-item"><i class="fas fa-circle text-success" v-if='settings.forumEnabled == "1"'></i> <i class="fas fa-circle text-danger" v-if='settings.forumEnabled == "0"'></i> Forum</li>
						</ul>
					</v-card-text>
				</v-card>
			</div>
			<div class='col-xs-12 col-md-4'>
				<v-card class="mx-auto">
					<v-card-text>
						Functioning Stores
						<ul class="list-group">
							<li class="list-group-item"><i class="fas fa-circle text-success" v-if='storeCounter.blog > 0'></i> <i class="fas fa-circle text-danger" v-if='storeCounter.blog == 0'></i> Blogs</li>
							<li class="list-group-item"><i class="fas fa-circle text-success" v-if='storeCounter.files > 0'></i> <i class="fas fa-circle text-danger" v-if='storeCounter.files == 0'></i> Files</li>
							<li class="list-group-item"><i class="fas fa-circle text-success" v-if='storeCounter.interest > 0'></i> <i class="fas fa-circle text-danger" v-if='storeCounter.interest == 0'></i> Interest</li>
							<li class="list-group-item"><i class="fas fa-circle text-success" v-if='storeCounter.menu > 0'></i> <i class="fas fa-circle text-danger" v-if='storeCounter.menu == 0'></i> Menu</li>
							<li class="list-group-item"><i class="fas fa-circle text-success" v-if='storeCounter.pages > 0'></i> <i class="fas fa-circle text-danger" v-if='storeCounter.pages == 0'></i> Pages</li>
							<li class="list-group-item"><i class="fas fa-circle text-success" v-if='storeCounter.node'></i> <i class="fas fa-circle text-danger" v-if='!storeCounter.node'></i> Node</li>
						</ul>
						<button type='button' class='btn btn-primary btn-block mt-2' @click='refreshStores'><i class='fas fa-sync'></i> Refresh Stores</button>
					</v-card-text>
				</v-card>
			</div>
		</div>
		<div class='row'>
			<div class='col-xs-12 col-md-6'>
				<v-card class="mx-auto">
					<v-card-text>
						Filler 4
					</v-card-text>
				</v-card>
			</div>
			<div class='col-xs-12 col-md-6'>
				<v-card class="mx-auto">
					<v-card-text>
						Filler 5
					</v-card-text>
				</v-card>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		name      : "admin-home-component",
		props     : [],
		components: {},
		created()   {},
		data()      { return {} },
		computed  : {
			user() {
				return this.$store.state.userStore.user;
			},
			settings() {
				return this.$store.state.settingsStore.settings;
			},
			storeCounter() {
				return {
					blog: this.$store.getters['blogStore/counter'],
					files: this.$store.getters['fileStore/counter'],
					interest: this.$store.getters['interestCheckStore/counter'],
					menu: this.$store.getters['menuStore/counter'],
					pages: this.$store.getters['pageStore/counter'],
					node: this.$store.getters['nodeStore/active']
				}
			}
		},
		methods   : {
			refreshStores() {
				this.$Helper.bootHelper.init();
			}
		},
		watch     : {}
	};
</script>

<style scoped></style>
