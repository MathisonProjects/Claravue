<template>
	<div>
		<div class='form-group'>
			<label for='txtUser'><i class="fas fa-at"></i>Your Username/Email</label>
			<input type='text' id='txtUser' class='form-control' v-model='data.email' placeholder='eg. MathisonProjects' />
		</div>
		<div class='form-group text-right'>
			<button type='button' class='btn btn-primary' @click='submitChangeRequest'><i class='fas fa-user'></i> Request Change</button>
		</div>
	</div>
</template>

<script>
	export default {
		name      : "forgot-password-component",
		props     : [],
		components: {},
		created()   {},
		data()      {
			return {
				data: {
					email: null
				}
			}
		},
		computed  : {},
		methods   : {
			submitChangeRequest() {
				console.log('Need to build out logic...');
			}
		},
		watch     : {}
	};
</script>

<style scoped></style>
