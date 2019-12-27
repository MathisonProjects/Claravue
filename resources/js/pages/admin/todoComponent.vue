<template>
	<div>
		<div class='row'>
			<div class='col-xs-12 col-md-8'>
				<h1><v-icon x-large>mdi-clipboard-list-outline</v-icon>
					<span v-if='breadcrumbs[0] === undefined'>Todo</span>
					<span v-if='breadcrumbs[0] !== undefined && breadcrumbs[1] === undefined'>{{ breadcrumbs[0].Name }}</span>
					<span v-if='breadcrumbs[1] !== undefined && breadcrumbs[2] === undefined'>{{ breadcrumbs[1].Name }}</span>
					<span v-if='breadcrumbs[2] !== undefined'>{{ breadcrumbs[2].Name }}</span>
				</h1>
				
			</div>
			<div class='col-xs-12 col-md-4 text-right' v-if='pid == null && cid == null && tid == null'>
				<button type='button' class='btn btn-primary btn-sm' @click='addItem = true' v-if='!addItem'><i class='fas fa-plus'></i> Add Project</button>
				<button type='button' class='btn btn-danger btn-sm' @click='addItem = false' v-if='addItem'><i class='fas fa-minus'></i> Stop Adding Project</button>
			</div>
			<div class='col-xs-12 col-md-4 text-right' v-if='pid != null && cid == null && tid == null'>
				<button type='button' class='btn btn-primary btn-sm' @click='addItem = true' v-if='!addItem'><i class='fas fa-plus'></i> Add Category</button>
				<button type='button' class='btn btn-danger btn-sm' @click='addItem = false' v-if='addItem'><i class='fas fa-minus'></i> Stop Adding Category</button>
			</div>
			<div class='col-xs-12 col-md-4 text-right' v-if='pid != null && cid != null && tid == null'>
				<button type='button' class='btn btn-primary btn-sm' @click='addItem = true' v-if='!addItem'><i class='fas fa-plus'></i> Add Task</button>
				<button type='button' class='btn btn-danger btn-sm' @click='addItem = false' v-if='addItem'><i class='fas fa-minus'></i> Stop Adding Task</button>
			</div>
		</div>
		<taskBreadcrumbsComponent :breadcrumbs='breadcrumbs' @resetNav='resetNav' @navProj='navProj' @navCat='navCat' />
		<div class='row'>
			<div class='col-xs-12 col-md-9'>
				<div class='overline' v-if='tid == null && cid == null'><span>({{ totalItems }})</span> Items</div>
				<div class='overline' v-if='tid == null && cid != null'>
					<span class='overline'>[{{ taskCounter.all }}] Total</span>
					<a href='javascript:void(0)' @click='viewableTasks.ready = !viewableTasks.ready'><span class='overline text-info'><i class="fas fa-puzzle-piece"></i> [{{ taskCounter.ready }}] Ready</span></a>
					<a href='javascript:void(0)' @click='viewableTasks.active = !viewableTasks.active'><span class='overline text-primary'><i class="fas fa-clock"></i> [{{ taskCounter.active }}] Active</span></a>
					<a href='javascript:void(0)' @click='viewableTasks.pr = !viewableTasks.pr'><span class='overline text-info'><i class="fas fa-chalkboard"></i> [{{ taskCounter.pr }}] PR Pending</span></a>
					<a href='javascript:void(0)' @click='viewableTasks.qa = !viewableTasks.qa'><span class='overline text-warning'><i class="fas fa-cloud-sun"></i> [{{ taskCounter.qa }}] QA</span></a>
					<a href='javascript:void(0)' @click='viewableTasks.complete = !viewableTasks.complete'><span class='overline text-success'><i class="fas fa-check-circle"></i> [{{ taskCounter.complete }}] Complete</span></a>
					<a href='javascript:void(0)' @click='viewableTasks.roadblock = !viewableTasks.roadblock'><span class='overline text-danger'><i class="fas fa-dumpster-fire"></i> [{{ taskCounter.roadblock }}] Roadblock</span></a>
				</div>
			</div>
			<div class='col-xs-12 col-md-3 text-right'>
				<div class='overline' v-if='tid == null && cid != null'>
					<a href='javascript:void(0)' @click='viewableTasks.archived = !viewableTasks.archived'><span class='overline text-warning'><i class="fas fa-archive"></i> [{{ taskCounter.archived }}] Archive</span></a>
					<a href='javascript:void(0)' @click='viewableTasks.trashed = !viewableTasks.trashed'><span class='overline text-danger'><i class="fas fa-trash"></i> Trashed</span></a>
				</div>
			</div>
		</div>
		<div v-if='!isLoading'>
			<addItemComponent v-if='addItem' :type='list.type' :dialogData='dialogData' @closeDialog='addItem = false' />
			<confirmationModalComponent v-if='confirmRequest.show' :confirmationText='confirmRequest.text' @confirm='confirmedDelete' @closeDialog='confirmRequest.show = false' />

			<div class='row' v-if='totalItems > 0 || filterText.length > 0'>
				<div class='col'>
					<v-card class="mx-auto">
						<v-card-text>
							<v-text-field v-model="filterText" label="Filter" placeholder='Type what you want to filter down...' clearable></v-text-field>
						</v-card-text>
					</v-card>
				</div>
			</div>
			<doNotHaveAnyComponent  v-if='totalItems == 0 && list.type != "item"' :type='list.type' />
			<taskVerboseComponent v-if='tid != null' :task='breadcrumbs[2]' />
			<div class='row ' v-if='totalItems > 0'>
				<div class='col'>
					<ul class="list-group itemListContainer">
						<li :class="setPriorityListItem(item)" v-for="item in list.list">
							<div class='row '>
								<div class='col-md-8'>
									<small>
										<a href='javascript:void(0)' @click='navPage(item.id)'>
											<span v-if='cid != null'>T#{{ item.id }}: </span>
										    {{ item.Name }}
										</a>
										<span v-if='cid == null'> - {{ item.Description }}</span>
										<taskStatusSwitchComponent v-if='item.Status != undefined' :item='item' />
										<span class='overline' v-if='item.archived_at != null'>- Archived At: {{ item.archived_at }}</span>
									</small>
								</div>
								<div class='col-md-4 text-right'>
									<a href='javascript:void(0)' @click='copyToClipboard(item.Description)'><span href='javascript:void(0)' :title='item.Description' v-if='cid != null'><v-icon size='17' color='teal'>mdi-clipboard</v-icon></span></a>

									<a href='javascript:void(0)' @click='navPage(item.id)' title='View'><v-icon size='17' color='blue'>mdi-magnify-plus</v-icon></a>

									<a href='javascript:void(0)' @click='setEdit("project", item)' title='Edit' v-if='pid == null && cid == null'><v-icon size='17' color='yellow'>mdi-pencil</v-icon></a>
									<a href='javascript:void(0)' @click='setEdit("category", item)' title='Edit' v-if='pid != null && cid == null'><v-icon size='17' color='yellow'>mdi-pencil</v-icon></a>
									<a href='javascript:void(0)' @click='setEdit("task", item)' title='Edit' v-if='pid != null && cid != null'><v-icon size='17' color='yellow'>mdi-pencil</v-icon></a>

									<a href='javascript:void(0)' @click='duplicateTask(item)' title='Duplicate Task' v-if='pid != null && cid != null'><v-icon size='17' color='purple'>mdi-content-duplicate</v-icon></a>
									<a href='javascript:void(0)' @click='archive(item)' title='Archive' v-if='pid != null && cid != null'><v-icon size='17' color='orange'>mdi-archive</v-icon></a>

									<a href='javascript:void(0)' @click='deleteItem(item)' title='Delete'><v-icon size='17' color='red'>mdi-trash-can-outline</v-icon></a>
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
	import doNotHaveAnyComponent from '@/components/admin/todo/doNotHaveAnyComponent';
	import taskStatusSwitchComponent from '@/components/admin/todo/taskStatusSwitchComponent';
	import taskBreadcrumbsComponent from '@/components/admin/todo/taskBreadcrumbsComponent';
	import addItemComponent from '@/components/admin/todo/addItemComponent';
	import taskVerboseComponent from '@/components/admin/todo/taskVerboseComponent';
	import confirmationModalComponent from '@/components/confirmationModalComponent'

	export default {
		name      : "todo-component",
		props     : [],
		components: {
			doNotHaveAnyComponent,
			taskStatusSwitchComponent,
			taskBreadcrumbsComponent,
			addItemComponent,
			taskVerboseComponent,
			confirmationModalComponent
		},
		created()   {
			this.$store.dispatch('todoStore/refreshTasks');
		},
		data()      {
			return {
				editor: ClassicEditor,
                editorConfig: {},
				addItem: false,
				viewableTasks: {
					ready: true,
					active: true,
					pr: true,
					qa: true,
					complete: true,
					roadblock: true,
					archived: false,
					trashed: false
				},
				filterText: '',
				dialogData: null,
				confirmRequest: {
					show: false,
					text: '',
					value: null
				}
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
							return item.ProjectId == this.pid &&
								(
							 		item.Name.toLowerCase().includes(this.filterText.toLowerCase()) ||
									item.Description.toLowerCase().includes(this.filterText.toLowerCase())
								);
						})
					}
				} else if (this.pid != null && this.cid != null && this.tid == null) {
					return {
						type: 'task',
						list: this.$store.state.todoStore.tasks.filter(item => {
							return item.CategoryId == this.cid && 
								(("T#" + item.id + ": " + item.Name).toLowerCase().includes(this.filterText.toLowerCase())) &&
								(
									(
										item.archived_at == null && !this.viewableTasks.archived && 
										(
											( item.Status == 0 && this.viewableTasks.ready) ||
											( item.Status == 1 && this.viewableTasks.active) ||
											( item.Status == 2 && this.viewableTasks.pr) ||
											( item.Status == 3 && this.viewableTasks.qa) ||
											( item.Status == 4 && this.viewableTasks.complete) ||
											( item.Status == 5 && this.viewableTasks.roadblock)
										)
									) ||
									(
										item.archived_at != null && this.viewableTasks.archived
									)
								)
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
					}).length,
					archived: tasks.filter(item => {
						return item.archived_at != null
					}).length
				};
			}
		},
		methods   : {
			setPriorityListItem(item) {
				if (item.priority === undefined) {
					return 'list-group-item';
				} else if (item.priority == 0 ) {
					return 'list-group-item quality-of-life';
				} else if (item.priority == 1 ) {
					return 'list-group-item low-priority';
				} else if (item.priority == 2 ) {
					return 'list-group-item mid-priority';
				} else if (item.priority == 3 ) {
					return 'list-group-item high-priority';
				} else if (item.priority == 4 ) {
					return 'list-group-item top-priority';
				}
			},
			setEdit(type, params) {
				if (type == 'task') {
					this.navCat(this.cid)
				}
				this.dialogData = params;
				this.addItem = true;
			},
			deleteItem(item) {
				this.confirmRequest = {
					show: true,
					text: 'Are you sure you want to delete `<b>' + item.Name + '</b>`',
					value: item
				};
			},
			confirmedDelete() {
				var payload = { id: this.confirmRequest.value.id };

				if (this.list.type == 'project') {
					this.$store.dispatch('todoStore/deleteProject', payload);
				} else if (this.list.type == 'categorie') {
					this.$store.dispatch('todoStore/deleteCategory', payload);
				} else if (this.list.type == 'task') {
					this.$store.dispatch('todoStore/deleteTask', payload);
				}
			},
			navPage(id) {
				this.filterText = '';
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
			},
			resetNav() {
				this.$router.push('/admin/todo');
			},
			navProj(id) {
				this.$router.push('/admin/todo/' + id);
			},
			navCat(id) {
				this.$router.push('/admin/todo/' + this.pid + '/' + id);
			},
			archive(item) {
				this.$store.dispatch('todoStore/archiveTask', item);
			},
			copyToClipboard(value) {
				navigator.clipboard.writeText(value);
			}
		},
		watch     : {
			addItem(newval) {
				if (newval == false) {
					this.dialogData = null;
				}
			}
		}
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

	.list-group-item.top-priority {
		background-color: #FFEBEE;
	}

	.list-group-item.high-priority {
		background-color: #FCE4EC;
	}

	.list-group-item.mid-priority {
		background-color: #F3E5F5;
	}

	.list-group-item.low-priority {
		background-color: #EDE7F6;
	}

	.list-group-item.quality-of-life {
		background-color: #E8EAF6;
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
