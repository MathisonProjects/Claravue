<template>
	<div>
		<h5>Projects</h5>
		<ul class="list-group">
			<li class="list-group-item" v-for="(projectItem, index) in projects" :key='index'>
				<a href='javascript:void(0)' @click='setProject(index)'>{{ projectItem.Name }}</a>
			</li>
		</ul>

		<div class='mt-2' v-if='project != null'>
			<h5>Category</h5>

			<ul class="list-group">
				<li class="list-group-item" v-for="(categoryItem, index) in categories" :key='index'>
					<a href='javascript:void(0)' @click='setCategory(index)'>{{ categoryItem.Name }}</a>
				</li>
			</ul>
		</div>
		<div class='mt-2' v-if='category != null'>
			<h5>Tasks</h5>

			<ul class="list-group">
				<li class="list-group-item" v-for="(taskItem, index) in tasks" :key='index'>
					<a href='javascript:void(0)' @click='setTask(index)'>{{ taskItem.Name }}</a>
					<span v-if='taskItem.Status == 0' class='overline text-info'><i class="fas fa-puzzle-piece"></i> Ready</span>
					<span v-if='taskItem.Status == 1' class='overline text-primary'><i class="fas fa-clock"></i> Active</span>
					<span v-if='taskItem.Status == 2' class='overline text-info'><i class="fas fa-chalkboard"></i> PR Pending</span>
					<span v-if='taskItem.Status == 3' class='overline text-warning'><i class="fas fa-cloud-sun"></i> QA</span>
					<span v-if='taskItem.Status == 4' class='overline text-success'><i class="fas fa-check-circle"></i> Complete</span>
					<span v-if='taskItem.Status == 5' class='overline text-danger'><i class="fas fa-dumpster-fire"></i> Roadblock</span>
				</li>
			</ul>
		</div>

		<div class='mt-2' v-if='task != null'>
			<h6>{{ task.Name }}</h6>
			Status: 
			<span v-if='task.Status == 0' class='overline text-info'><i class="fas fa-puzzle-piece"></i> Ready</span>
			<span v-if='task.Status == 1' class='overline text-primary'><i class="fas fa-clock"></i> Active</span>
			<span v-if='task.Status == 2' class='overline text-info'><i class="fas fa-chalkboard"></i> PR Pending</span>
			<span v-if='task.Status == 3' class='overline text-warning'><i class="fas fa-cloud-sun"></i> QA</span>
			<span v-if='task.Status == 4' class='overline text-success'><i class="fas fa-check-circle"></i> Complete</span>
			<span v-if='task.Status == 5' class='overline text-danger'><i class="fas fa-dumpster-fire"></i> Roadblock</span>
			<div class='overline' v-html='task.Description'></div>
		</div>
	</div>
</template>

<script>
	export default {
		name      : "task-list-component",
		props     : [],
		components: {},
		created()   {},
		data()      {
			return {
				project: null,
				category: null,
				task: null
			}
		},
		computed  : {
			taskStore() {
				return this.$store.state.todoStore;
			},
			projects() {
				return this.taskStore.projects
			},
			categories() {
				if (this.project != null) {
					return this.taskStore.categories.filter(cat => {
						return cat.ProjectId == this.project.id;
					});
				}
				return [];
			},
			tasks() {
				if (this.category != null) {
					return this.taskStore.tasks.filter(task => {
						return task.CategoryId == this.category.id;
					});
				}
				return [];	
			}
		},
		methods   : {
			setProject(index) {
				this.project = this.projects[index];
				this.category = null;
				this.task = null;
			},
			setCategory(index) {
				this.category = this.categories[index];
				this.task = null;
			},
			setTask(index) {
				this.task = this.tasks[index];
			}
		},
		watch     : {}
	};
</script>

<style scoped>
	.list-group-item:hover {
		background-color: #F0F0F0;
	}
</style>
