<template>
	<div>
		<div class='row'>
			<div class='col-xs-12 col-md-8'>
				<h1><v-icon x-large>mdi-clipboard-list-outline</v-icon> Todo</h1>
				<div class='overline'>
					<span v-if='breadcrumbs[0]'><a href='javascript:void(0)' @click='resetNav'>Projects</a></span>
					<span v-if='breadcrumbs[0]'><i class='fas fa-angle-right'></i> <a href='javascript:void(0)' @click='navProj(breadcrumbs[0].id)'>{{ breadcrumbs[0].Name }}</a></span>
					<span v-if='breadcrumbs[1]'><i class='fas fa-angle-double-right'></i> <a href='javascript:void(0)' @click='navCat(breadcrumbs[1].id)'>{{ breadcrumbs[1].Name }}</a></span>
					<span v-if='breadcrumbs[2]'><i class='fas fa-angle-double-right'></i> {{ breadcrumbs[2].Name }}</span>
				</div>
				<div class='overline' v-if='tid == null && cid == null'><span>({{ totalItems }})</span> Items</div>
				<div class='overline' v-if='tid == null && cid != null'>
					<span class='overline'>[{{ taskCounter.all }}] Total</span>
					<span class='overline text-info'><i class="fas fa-puzzle-piece"></i> [{{ taskCounter.ready }}] Ready</span>
					<span class='overline text-primary'><i class="fas fa-clock"></i> [{{ taskCounter.active }}] Active</span>
					<span class='overline text-info'><i class="fas fa-chalkboard"></i> [{{ taskCounter.pr }}] PR Pending</span>
					<span class='overline text-warning'><i class="fas fa-cloud-sun"></i> [{{ taskCounter.qa }}] QA</span>
					<span class='overline text-success'><i class="fas fa-check-circle"></i> [{{ taskCounter.complete }}] Complete</span>
					<span class='overline text-danger'><i class="fas fa-dumpster-fire"></i> [{{ taskCounter.roadblock }}] Roadblock</span>
				</div>
			</div>
			<div class='col-xs-12 col-md-4 text-right' v-if='pid == null && cid == null && tid == null'>
				<button type='button' class='btn btn-primary' @click='addItem = true' v-if='!addItem'><i class='fas fa-plus'></i> Add Project</button>
				<button type='button' class='btn btn-danger' @click='reset' v-if='addItem'><i class='fas fa-minus'></i> Stop Adding Project</button>
			</div>
			<div class='col-xs-12 col-md-4 text-right' v-if='pid != null && cid == null && tid == null'>
				<button type='button' class='btn btn-primary' @click='addItem = true' v-if='!addItem'><i class='fas fa-plus'></i> Add Category</button>
				<button type='button' class='btn btn-danger' @click='reset' v-if='addItem'><i class='fas fa-minus'></i> Stop Adding Category</button>
			</div>
			<div class='col-xs-12 col-md-4 text-right' v-if='pid != null && cid != null && tid == null'>
				<button type='button' class='btn btn-primary' @click='addItem = true' v-if='!addItem'><i class='fas fa-plus'></i> Add Task</button>
				<button type='button' class='btn btn-danger' @click='reset' v-if='addItem'><i class='fas fa-minus'></i> Stop Adding Task</button>
			</div>
		</div>
		<div v-if='!isLoading'>
			<div class='row' v-if='addItem'>
				<div class='col' v-if='list.type == "project"'>
					<v-card class="mx-auto">
						<v-card-text>
							<h5>New Project</h5>
							<div class='form-group text-right'>
								<v-text-field v-model="data.project.Name" label="Name*" clearable></v-text-field>
								<v-text-field v-model="data.project.Description" label="Description" clearable></v-text-field>
								<button type='button' class='btn btn-primary' :disabled='(data.project.Name == null) || (data.project.Description == null)' @click='save'><i class='fas fa-save'></i> Save</button>
							</div>
						</v-card-text>
					</v-card>
				</div>
				<div class='col' v-if='list.type == "categorie"'>
					<v-card class="mx-auto">
						<v-card-text>
							<h5>New Category</h5>
							<div class='form-group text-right'>
								<v-text-field v-model="data.category.Name" label="Name" clearable></v-text-field>
								<v-text-field v-model="data.category.Description" label="Description" clearable></v-text-field>
								<button type='button' class='btn btn-primary' :disabled='(data.category.Name == null) || (data.category.Description == null)' @click='save'><i class='fas fa-save'></i> Save</button>
							</div>
						</v-card-text>
					</v-card>
				</div>
				<div class='col' v-if='list.type == "task"'>
					<v-card class="mx-auto">
						<v-card-text>
							<h5>New Task</h5>
							<div class='form-group text-right'>
								<v-text-field v-model="data.task.Name" label="Name" clearable></v-text-field>
								<ckeditor :editor="editor" v-model="data.task.Description" :config="editorConfig"></ckeditor>
								<div class='row'>
									<div class='col-md-6'>
										<v-select v-model='data.task.SubtaskOf' label="Subtask of"></v-select>
									</div>
									<div class='col-md-6'>
										<v-select v-model='data.task.Status' :items="statusTypes" item-value='id' item-text='text' label="Status" autocomplete bottom></v-select>
									</div>
								</div>
								<button type='button' class='btn btn-primary' :disabled='(data.task.Name == null) || (data.task.Status == null)' @click='save'><i class='fas fa-save'></i> Save</button>
							</div>
						</v-card-text>
					</v-card>
				</div>
			</div>
			<div class='row' v-if='totalItems > 0 || filterText.length > 0'>
				<div class='col'>
					<v-card class="mx-auto">
						<v-card-text>
							<v-text-field v-model="filterText" label="Filter" placeholder='Type what you want to filter down...' clearable></v-text-field>
						</v-card-text>
					</v-card>
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
			<div class='row' v-if='tid != null'>
				<div class='col'>
					<v-card class="mx-auto">
						<v-card-text>
							<div class='row'>
								<div class='col-xs-12 col-sm-6 col-md-6 col-lg-8'>
									<h5>T#{{ breadcrumbs[2].id }}: {{ breadcrumbs[2].Name }}</h5>
								</div>
								<div class='col-xs-12 col-sm-3 col-md-3 col-lg-2'>
									<button type='button' class='btn btn-warning btn-block btn-sm' @click='setEdit("task", breadcrumbs[2])'><i class='fas fa-pencil-alt'></i> Edit</button>
								</div>
								<div class='col-xs-12 col-sm-3 col-md-3 col-lg-2 text-right'>
									Status: 
									<span v-if='breadcrumbs[2].Status == 0' class='overline text-info'><i class="fas fa-puzzle-piece"></i> Ready</span>
									<span v-if='breadcrumbs[2].Status == 1' class='overline text-primary'><i class="fas fa-clock"></i> Active</span>
									<span v-if='breadcrumbs[2].Status == 2' class='overline text-info'><i class="fas fa-chalkboard"></i> PR Pending</span>
									<span v-if='breadcrumbs[2].Status == 3' class='overline text-warning'><i class="fas fa-cloud-sun"></i> QA</span>
									<span v-if='breadcrumbs[2].Status == 4' class='overline text-success'><i class="fas fa-check-circle"></i> Complete</span>
									<span v-if='breadcrumbs[2].Status == 5' class='overline text-danger'><i class="fas fa-dumpster-fire"></i> Roadblock</span>
								</div>
							</div>
							<h6>Description</h6>
							<hr />
							<div v-html='breadcrumbs[2].Description'></div>
						</v-card-text>
					</v-card>
				</div>
			</div>
			<div class='row ' v-if='totalItems > 0'>
				<div class='col'>
					<ul class="list-group itemListContainer">
						<li class="list-group-item" v-for="item in list.list">
							<div class='row '>
								<div class='col-md-8'>
									<small>
										<a href='javascript:void(0)' @click='navPage(item.id)'>
											<span v-if='cid != null'>T#{{ item.id }}: </span>
										    {{ item.Name }}
										</a>
										<span v-if='cid == null'> - {{ item.Description }}</span>
										<span v-if='item.Status != undefined'>
											<span v-if='item.Status == 0' class='overline text-info'><i class="fas fa-puzzle-piece"></i> Ready</span>
											<span v-if='item.Status == 1' class='overline text-primary'><i class="fas fa-clock"></i> Active</span>
											<span v-if='item.Status == 2' class='overline text-info'><i class="fas fa-chalkboard"></i> PR Pending</span>
											<span v-if='item.Status == 3' class='overline text-warning'><i class="fas fa-cloud-sun"></i> QA</span>
											<span v-if='item.Status == 4' class='overline text-success'><i class="fas fa-check-circle"></i> Complete</span>
											<span v-if='item.Status == 5' class='overline text-danger'><i class="fas fa-dumpster-fire"></i> Roadblock</span>
										</span>
									</small>
								</div>
								<div class='col-md-4 text-right'>
									<a href='javascript:void(0)' @click='navPage(item.id)' title='View'><v-icon size='17' color='blue'>mdi-magnify-plus</v-icon></a>

									<a href='javascript:void(0)' @click='setEdit("project", item)' title='Edit' v-if='pid == null && cid == null'><v-icon size='17' color='yellow'>mdi-pencil</v-icon></a>
									<a href='javascript:void(0)' @click='setEdit("category", item)' title='Edit' v-if='pid != null && cid == null'><v-icon size='17' color='yellow'>mdi-pencil</v-icon></a>
									<a href='javascript:void(0)' @click='setEdit("task", item)' title='Edit' v-if='pid != null && cid != null'><v-icon size='17' color='yellow'>mdi-pencil</v-icon></a>

									<a href='javascript:void(0)' @click='duplicateTask(item)' title='Duplicate Task' v-if='pid != null && cid != null'><v-icon size='17' color='purple'>mdi-content-duplicate</v-icon></a>
									<a href='javascript:void(0)' @click='archive(item)' title='Archive' v-if='pid != null && cid != null'><v-icon size='17' color='orange'>mdi-archive</v-icon></a>

									<a href='javascript:void(0)' @click='deleteItem(item.id)' title='Delete'><v-icon size='17' color='red'>mdi-trash-can-outline</v-icon></a>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

	export default {
		name      : "todo-component",
		props     : [],
		components: {},
		created()   {
			this.$store.dispatch('todoStore/refreshTasks');
		},
		data()      {
			return {
				editor: ClassicEditor,
                editorData: '<p>Content of the editor.</p>',
                editorConfig: {},
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
						Status: 0
					}
				},
				viewableTasks: {
					ready: true,
					active: true,
					pr: true,
					qa: true,
					complete: true,
					roadblock: true
				},
				statusTypes: [
					{ id: 0, text: 'Ready' },
					{ id: 1, text: 'Active' },
					{ id: 2, text: 'PR Pending' },
					{ id: 3, text: 'QA' },
					{ id: 4, text: 'Complete' },
					{ id: 5, text: 'Roadblock' }
				],
				filterText: ''
			}
		},
		computed  : {
			isLoading() {
				return this.$store.state.todoStore.loading;
			},
			list() {
				if (this.pid == null && this.cid == null && this.tid == null) {
					return {
						type: 'project',
						list: this.$store.state.todoStore.projects.filter(item => {
							return item.Name.toLowerCase().includes(this.filterText.toLowerCase()) || item.Description.toLowerCase().includes(this.filterText.toLowerCase());
						})
					}
				} else if (this.pid != null && this.cid == null && this.tid == null) {
					return {
						type: 'categorie',
						list: this.$store.state.todoStore.categories.filter(item => {
							return item.ProjectId == this.pid && (item.Name.toLowerCase().includes(this.filterText.toLowerCase()) || item.Description.toLowerCase().includes(this.filterText.toLowerCase()));
						})
					}
				} else if (this.pid != null && this.cid != null && this.tid == null) {
					return {
						type: 'task',
						list: this.$store.state.todoStore.tasks.filter(item => {
							return item.CategoryId == this.cid && (("T#" + item.id + ": " + item.Name).toLowerCase().includes(this.filterText.toLowerCase()));
						})
					}
				}
				return {
					type: 'item'
				};
			},
			breadcrumbs() {
				var breadcrumbs = [];
				if (this.pid != null) {
					for (var i in this.$store.state.todoStore.projects) {
						var proj = this.$store.state.todoStore.projects[i];
						if (proj.id == this.pid) {
							breadcrumbs.push(proj);
						}
					}
				}
				if (this.cid != null) {
					for (var i in this.$store.state.todoStore.categories) {
						var category = this.$store.state.todoStore.categories[i];
						if (category.id == this.cid) {
							breadcrumbs.push(category);
						}
					}
				}
				if (this.tid != null) {
					for (var i in this.$store.state.todoStore.tasks) {
						var proj = this.$store.state.todoStore.tasks[i];
						if (proj.id == this.tid) {
							breadcrumbs.push(proj);
						}
					}
				}
				return breadcrumbs;
			},
			totalItems() {
				if (this.list.list) {
					return this.list.list.length;
				}
				return 0;
			},
			pid() {
				if (this.$route.params && this.$route.params.pid) {
					return parseInt(this.$route.params.pid);
				}
				return null;
			},
			cid() {
				if (this.$route.params && this.$route.params.catid) {
					return parseInt(this.$route.params.catid);
				}
				return null;
			},
			tid() {
				if (this.$route.params && this.$route.params.tid) {
					return parseInt(this.$route.params.tid);
				}
				return null;
			},
			taskCounter() {
				var tasks = this.$store.state.todoStore.tasks.filter(item => {
					return item.CategoryId == this.cid
				});
				return {
					all: tasks.length,
					ready: tasks.filter(item => {
						return item.Status == 0;
					}).length,
					active: tasks.filter(item => {
						return item.Status == 1;
					}).length,
					pr: tasks.filter(item => {
						return item.Status == 2;
					}).length,
					qa: tasks.filter(item => {
						return item.Status == 3;
					}).length,
					complete: tasks.filter(item => {
						return item.Status == 4;
					}).length,
					roadblock: tasks.filter(item => {
						return item.Status == 5;
					}).length
				};
			}
		},
		methods   : {
			reset() {
				this.addItem = false;
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
						Status: 0
					}
				};
			},
			setEdit(type, params) {
				if (type == 'task') {
					this.navCat(this.cid)
				}
				this.addItem = true;
				this.data[type] = params;
			},
			save() {
				if (this.list.type == 'project') {
					var payload = this.data.project;
					this.$store.dispatch('todoStore/saveProject', payload);
				} else if (this.list.type == 'categorie') {
					var payload = this.data.category;
					payload.ProjectId = this.pid;
					this.$store.dispatch('todoStore/saveCategory', payload);
				} else if (this.list.type == 'task') {
					var payload = this.data.task;
					payload.CategoryId = this.cid;
					this.$store.dispatch('todoStore/saveTask', payload);
				}
				this.reset();
				this.addItem = false;
			},
			deleteItem(id) {
				var payload = { id: id };

				if (this.list.type == 'project') {
					this.$store.dispatch('todoStore/deleteProject', payload);
				} else if (this.list.type == 'categorie') {
					this.$store.dispatch('todoStore/deleteCategory', payload);
				} else if (this.list.type == 'task') {
					this.$store.dispatch('todoStore/deleteTask', payload);
				}
			},
			navPage(id) {
				if (this.pid == null) {
					this.$router.push('/admin/todo/' + id);
				} else if (this.pid != null && this.cid == null) {
					this.$router.push('/admin/todo/' + this.pid + '/' + id);
				} else if (this.pid != null && this.cid != null) {
					this.$router.push('/admin/todo/' + this.pid + '/' + this.cid + '/' + id);
				}
			},
			duplicateTask(item) {
				var newItem = item;
				newItem.id = null;
				this.$store.dispatch('todoStore/saveTask', newItem);
				this.reset();
			},
			resetNav() {
				this.reset();
				this.$router.push('/admin/todo');
			},
			navProj(id) {
				this.reset();
				this.$router.push('/admin/todo/' + id);
			},
			navCat(id) {
				this.reset();
				this.$router.push('/admin/todo/' + this.pid + '/' + id);
			},
			archive(item) {
				this.$store.dispatch('todoStore/archiveTask', item);
			}
		},
		watch     : {}
	};
</script>

<style scoped>
	.list-group {
		padding-left: 0px;
	}
	.list-group-item {
		padding: 0.0rem 1.25rem;
	}
	.list-group-item:hover {
		background-color: #F0F0F0;
	}
	.itemListContainer {
		height: 500px;
		overflow-y: scroll;
		border-top: solid 1px #000000;
		border-bottom: solid 1px #000000;
	}
	.itemListContainer::-webkit-scrollbar {
	  width: 10px;
	}

	/* Track */
	.itemListContainer::-webkit-scrollbar-track {
	  background: #f1f1f1; 
	}
	 
	/* Handle */
	.itemListContainer::-webkit-scrollbar-thumb {
	  background: #888; 
	}

	/* Handle on hover */
	.itemListContainer::-webkit-scrollbar-thumb:hover {
	  background: #555; 
	}
</style>
