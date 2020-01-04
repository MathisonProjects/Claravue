<template>
	<div>
		<nav aria-label="Page navigation example">
			<ul class="pagination">
				<li class="page-item"><a href='javascript:void(0)' class='page-link' @click='changePage(page - 1)'><i class="fas fa-chevron-left"></i></a></li>
				<li :class="activePageCheck(index)" v-for='index in pages' :key='index'><a class="page-link" href="#" @click='changePage(index)'>{{ index }}</a></li>
				<li class="page-item"><a href='javascript:void(0)' class='page-link' @click='changePage(page + 1)'><i class="fas fa-chevron-right"></i></a></li>
			</ul>
		</nav>
	</div>
</template>

<script>
	export default {
		name      : "pagination-clean-component",
		props     : [ 'pages' ],
		model: {
			event: 'newPage'
		},
		components: {},
		created()   {},
		data()      { return {} },
		computed  : {},
		methods   : {
			changePage(page) {
				this.$emit('newPage', page);
			},
			activePageCheck(pageId) {
				if (pageId == this.$attrs.value) {
					return 'page-item active';
				}
				return 'page-item';
			}
		},
		watch     : {}
	};
</script>

<style scoped></style>
