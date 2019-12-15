<template>
	<div>
		<div class='row'>
			<div class='col-xs-12 col-md-6'>
				<h1><v-icon x-large>mdi-clipboard-list-outline</v-icon> Todo</h1>
				<div class='overline'><span>({{ totalItems }})</span> Items</div>
			</div>
			<div class='col-xs-12 col-md-6 text-right' v-if='pid == null && pid == cid && tid == null'>
				<button type='button' class='btn btn-primary' @click='addItem = true' v-if='!addItem'><i class='fas fa-plus'></i> Add Project</button>
				<button type='button' class='btn btn-danger' @click='addItem = false' v-if='addItem'><i class='fas fa-minus'></i> Stop Adding Project</button>
			</div>
			<div class='col-xs-12 col-md-6 text-right' v-if='pid != null && pid == cid && tid == null'>
				<button type='button' class='btn btn-primary' @click='addItem = true' v-if='!addItem'><i class='fas fa-plus'></i> Add Category</button>
				<button type='button' class='btn btn-danger' @click='addItem = false' v-if='addItem'><i class='fas fa-minus'></i> Stop Adding Category</button>
			</div>
			<div class='col-xs-12 col-md-6 text-right' v-if='pid != null && pid != cid && tid == null'>
				<button type='button' class='btn btn-primary' @click='addItem = true' v-if='!addItem'><i class='fas fa-plus'></i> Add Task</button>
				<button type='button' class='btn btn-danger' @click='addItem = false' v-if='addItem'><i class='fas fa-minus'></i> Stop Adding Task</button>
			</div>
		</div>
		<div class='row' v-if='addItem'>
			<div class='col' v-if='list.type == "project"'>
				<v-card class="mx-auto">
					<v-card-text>
						<div class='form-group text-right'>
							<v-text-field v-model="data.project.Name" label="Name" clearable></v-text-field>
							<v-text-field v-model="data.project.Description" label="Description" clearable></v-text-field>
							<button type='button' class='btn btn-primary' @click='save'><i class='fas fa-save'></i> Save</button>
						</div>
					</v-card-text>
				</v-card>
			</div>
			<div class='col' v-if='list.type == "categorie"'>
				<v-card-text>
					<div class='form-group text-right'>
						<v-text-field v-model="data.project.Name" label="Name" clearable></v-text-field>
						<v-text-field v-model="data.project.Description" label="Description" clearable></v-text-field>
						<button type='button' class='btn btn-primary' @click='save'><i class='fas fa-save'></i> Save</button>
					</div>
				</v-card-text>
			</div>
			<div class='col' v-if='list.type == "task"'>
				<v-card-text>
					<div class='form-group text-right'>
						<v-text-field v-model="data.project.Name" label="Name" clearable></v-text-field>
						<v-text-field v-model="data.project.Description" label="Description" clearable></v-text-field>
						<button type='button' class='btn btn-primary' @click='save'><i class='fas fa-save'></i> Save</button>
					</div>
				</v-card-text>
			</div>
		</div>
		<div class='row' v-if='totalItems == 0 && list.type != "item"'>
			<div class='col'>
				<v-card class="mx-auto">
					<v-card-text>
						You do not have any {{ list.type }}s!
					</v-card-text>
				</v-card>
			</div>
		</div>
		<div class='row' v-if='totalItems > 0'>
			<div class='col'>
				<ul class="list-group">
					<li class="list-group-item" v-for="item in list.list">this</li>
				</ul>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		name      : "todo-component",
		props     : [],
		components: {},
		created()   {
			this.$store.dispatch('todoStore/refreshTasks');
		},
		data()      {
			return {
				addItem: false,
				data: {
					project: {
						id: null,
						Name: null,
						Description: null
					},
					category: {
						id: null,
						ProjectId: null,
						Name: null,
						Description: null
					},
					task: {
						id: null,
						CategoryId: null,
						Name: null,
						Description: null,
						SubtaskOf: null,
						Status: null
					}
				}
			}
		},
		computed  : {
			list() {
				if (this.pid == null && this.cid == null && this.tid == null) {
					return {
						type: 'project',
						list: this.$store.state.todoStore.projects
					}
				} else if (this.pid != null && this.cid == null && this.tid == null) {
					return {
						type: 'categorie',
						list: this.$store.state.todoStore.projects
					}
				} else if (this.pid != null && this.cid != null && this.tid == null) {
					return {
						type: 'task',
						list: this.$store.state.todoStore.projects
					}
				}
				return {
					type: 'item'
				};
			},
			breadcrumbs() {
				return [];
			},
			totalItems() {
				return this.list.list.length;
			},
			pid() {
				return null;
			},
			cid() {
				return null;
			},
			tid() {
				return null;
			}
		},
		methods   : {
			reset() {
				this.data = {
					project: {
						id: null,
						Name: null,
						Description: null
					},
					category: {
						id: null,
						ProjectId: null,
						Name: null,
						Description: null
					},
					task: {
						id: null,
						CategoryId: null,
						Name: null,
						Description: null,
						SubtaskOf: null,
						Status: null
					}
				};
			},
			save() {
				if (this.list.type == 'project') {
					var payload = this.data.project;
					this.$store.dispatch('todoStore/saveProject');
				} else if (this.list.type == 'categorie') {
					var payload = this.data.category;
					this.$store.dispatch('todoStore/saveCategory');
				} else if (this.list.type == 'task') {
					var payload = this.data.task;
					this.$store.dispatch('todoStore/saveTask');
				}
				this.reset();
				this.addItem = false;
			},
			deleteItem(id) {
				var payload = { id: id };

				if (this.list.type == 'project') {
					this.$store.dispatch('todoStore/deleteProject');
				} else if (this.list.type == 'categorie') {
					this.$store.dispatch('todoStore/deleteCategory');
				} else if (this.list.type == 'task') {
					this.$store.dispatch('todoStore/deleteTask');
				}
			}
		},
		watch     : {}
	};
</script>

<style scoped></style>
