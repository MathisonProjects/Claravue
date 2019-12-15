<template>
	<div>
		<div class='subtitle-2'>Functioning Stores</div>
		<ul class="list-group">
			<li class="list-group-item"><i class="fas fa-circle text-success" v-if='storeCounter.blog > 0'></i> <i class="fas fa-circle text-danger" v-if='storeCounter.blog == 0'></i> Blogs</li>
			<li class="list-group-item"><i class="fas fa-circle text-success" v-if='storeCounter.files > 0'></i> <i class="fas fa-circle text-danger" v-if='storeCounter.files == 0'></i> Files</li>
			<li class="list-group-item"><i class="fas fa-circle text-success" v-if='storeCounter.interest > 0'></i> <i class="fas fa-circle text-danger" v-if='storeCounter.interest == 0'></i> Interest</li>
			<li class="list-group-item"><i class="fas fa-circle text-success" v-if='storeCounter.menu > 0'></i> <i class="fas fa-circle text-danger" v-if='storeCounter.menu == 0'></i> Menu</li>
			<li class="list-group-item"><i class="fas fa-circle text-success" v-if='storeCounter.pages > 0'></i> <i class="fas fa-circle text-danger" v-if='storeCounter.pages == 0'></i> Pages</li>
			<li class="list-group-item"><i class="fas fa-circle text-success" v-if='storeCounter.node'></i> <i class="fas fa-circle text-danger" v-if='!storeCounter.node'></i> Node</li>
		</ul>
		<button type='button' class='btn btn-primary btn-block mt-2' @click='refreshStores'><i class='fas fa-sync'></i> Refresh Stores</button>
	</div>
</template>

<script>
	export default {
		name      : "functioning-stores-component",
		props     : [],
		components: {},
		created()   {},
		data()      { return {} },
		computed  : {
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
