<template>
	<div>
		<div class='row'>
			<div class='col'>
				<v-card class="mx-auto">
					<v-card-text>
						<div class='row'>
							<div class='col-xs-12 col-sm-6 col-md-6'>
								<button type='button' class='btn btn-warning'><i class='fas fa-pencil-alt'></i> Edit Task</button>
							</div>
							<div class='col-xs-12 col-sm-6 col-md-6 text-right'>
								<button type='button' class='btn btn-danger' @click='deleteItem'><i class='fas fa-trash'></i> Trash Task</button>
							</div>
						</div>
						<div class='row'>
							<div class='col-xs-12 col-sm-6 col-md-6 col-lg-8'>
								<h5>T#{{ task.id }}: {{ task.Name }}</h5>
							</div>
							<div class='col-xs-12 col-sm-6 col-md-6 col-lg-4 text-right'>
								Status: 
								<taskStatusSwitchComponent :item='task' />
							</div>
						</div>
						<div class='overline'>
							<b>Created At: </b>{{ task.created_at }}
						</div>
						<div class='overline'>
							<b>Updated At: </b>{{ task.updated_at }}
						</div>
						<div class='overline'>
							<b>Archived At: </b>
							<span v-if='task.updated_at !== null'>{{ task.updated_at }}</span>
							<span v-if='task.updated_at === null'>Not Archived</span>
						</div>
						<hr />
						<h6>Description</h6>
						<hr />
						<div v-html='task.Description'></div>
					</v-card-text>
				</v-card>
			</div>
		</div>
		<taskCommentaryComponent />
		<confirmationModalComponent v-if='confirmRequest.show' :confirmationText='confirmRequest.text' @confirm='confirmedDelete' @closeDialog='confirmRequest.show = false' />
	</div>
</template>

<script>
	import taskStatusSwitchComponent from './taskStatusSwitchComponent';
	import taskCommentaryComponent from './taskCommentaryComponent';
	import confirmationModalComponent from '@/components/confirmationModalComponent';

	export default {
		name      : "task-verbose-component",
		props     : [
			'task'
		],
		components: {
			taskStatusSwitchComponent,
			taskCommentaryComponent,
			confirmationModalComponent
		},
		created()   {},
		data()      {
			return {
				confirmRequest: {
					show: false,
					text: '',
					value: null
				}
			}
		},
		computed  : {},
		methods   : {
			deleteItem() {
				var item = this.task;
				this.confirmRequest = {
					show: true,
					text: 'Are you sure you want to delete `<b>' + item.Name + '</b>`',
					value: item
				};
			},
			confirmedDelete() {
				var payload = { id: this.confirmRequest.value.id };
				this.$store.dispatch('todoStore/deleteTask', payload);
				this.$router.push('/admin/todo/' + this.$route.params.pid + '/' + + this.$route.params.catid)
			}
		},
		watch     : {}
	};
</script>

<style scoped></style>
