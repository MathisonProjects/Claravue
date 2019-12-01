<template>
	<div>
		<div class='row'>
			<div class='col-xs-12 col-sm-4 col-md-3'>
				<ul class="list-group">
					<li class="list-group-item" v-for="user in usersMessaged">User</li>
				</ul>
			</div>
			<div class='col-xs-12 col-sm-8 col-md-9'>
				<v-card class="mx-auto">
					<v-card-text>
						<div class='row'>
							<div class='col-xs-12 col-sm-4 col-md-2'>Images</div>
							<div class='col-xs-12 col-sm-8 col-md-10'>
								Username - Last Message Date
							</div>
						</div>
					</v-card-text>
				</v-card>

				<div class='row'>
					<div class='col-xs-12 col-sm-8 col-md-9 col-lg-10'>
						<v-text-field dense placeholder='Enter your message...'></v-text-field>
					</div>
					<div class='col-xs-12 col-sm-4 col-md-3 col-lg-2'>
						<button type='button' class='btn btn-primary btn-block'><i class='far fa-paper-plane'></i> Send</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		name      : "member-message-component",
		props     : [],
		components: {},
		created()   {},
		data()      { return {} },
		computed  : {
			usersMessaged() {
				return [
					{},
					{},
					{}
				];
			},
			messages() {
				return [];
			}
		},
		methods   : {},
		watch     : {}
	};
</script>

<style scoped></style>
