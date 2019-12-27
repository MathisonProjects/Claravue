<template>
	<div>
		<div class='row'>
			<div class='col'>
				<v-card class="mx-auto">
					<v-card-text>
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
	</div>
</template>

<script>
	import taskStatusSwitchComponent from './taskStatusSwitchComponent';
	import taskCommentaryComponent from './taskCommentaryComponent'

	export default {
		name      : "task-verbose-component",
		props     : [
			'task'
		],
		components: {
			taskStatusSwitchComponent,
			taskCommentaryComponent
		},
		created()   {},
		data()      { return {} },
		computed  : {},
		methods   : {},
		watch     : {}
	};
</script>

<style scoped></style>
