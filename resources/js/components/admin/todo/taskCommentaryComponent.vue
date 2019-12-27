<template>
	<div>
		<v-card class="mx-auto">
			<v-card-text class='text-right'>
				<ckeditor :editor="editor" v-model="data.comment" :config="editorConfig"></ckeditor>
				<button type='button' class='btn btn-primary mt-3' @click='createComment'><i class='fas fa-save'></i> Post Comment</button>
			</v-card-text>
		</v-card>

		<div v-if='comments.length == 0' class='overline text-center mt-5'>
			No comments have been posted on this task...
		</div>

		<div v-if='comments.length > 0'>
			<v-card class="mx-auto mt-2" v-for='commentItem, index in comments.reverse()' :key='index'>
				<v-card-text>
					<div class='row'>
						<div class='col-md-6'>
							<b>Posted By:</b> {{ getUser(commentItem.uid) }}
						</div>
						<div class='col-md-6 text-right overline'>
							<b>Posted:</b> {{ commentItem.created_at }}
						</div>
					</div>
					<hr />
					<span v-html='commentItem.comment'></span>
				</v-card-text>
			</v-card>
		</div>
	</div>
</template>

<script>
	import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

	export default {
		name      : "task-commentary-component",
		props     : [],
		components: {},
		created()   {
			this.refresh();
		},
		data()      {
			return {
				editor: ClassicEditor,
                editorConfig: {},
                data: {
                	uid: null,
                	tid: null,
                	tcid: null,
                	comment: ''
                }
			}
		},
		computed  : {
			tid() {
				return parseInt(this.$route.params.tid);
			},
			user() {
				return this.$store.state.userStore.user;
			},
			users() {
				return this.$store.state.usersStore.users;
			},
			comments() {
				if (this.$store.state.taskCommentStore.comments != null) {
					return this.$store.state.taskCommentStore.comments;
				}
				return [];
			},
			isLoading() {
				return this.$store.getters['taskCommentStore/isLoading'];
			},
			loading() {
				return false;
			}
		},
		methods   : {
			getUser(id) {
				for (var i in this.users) {
					var user = this.users[i];
					if (user.id == id) {
						return user.name;
					}
				}
			},
			createComment() {
				var data = {
					uid: this.user.id,
					tid: this.tid,
					tcid: null,
					comment: this.data.comment
				};

				this.$store.dispatch('taskCommentStore/saveComment', data);
				this.data.comment = '';
			},
			refresh() {
				var data = {
					tid: this.tid
				};
				this.$store.dispatch('taskCommentStore/getComments', data);
			}
		},
		watch     : {}
	};
</script>

<style scoped></style>
