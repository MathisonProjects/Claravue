<template>
	<div>
		<div class='row'>
			<div class='col-xs-12 col-sm-4 col-md-3'>
				<div class="list-group">
					<a href="javascript:void(0)" class="list-group-item list-group-item-action" @click='newContact = true'>
						<i class='fas fa-plus'></i> New Message
					</a>
					<a href="javascript:void(0)" class="list-group-item list-group-item-action" v-for="user in usersMessaged" @click='setConversation(user.id)'><i :class="user.icon"></i> {{ user.name }} [{{ user.count }}]</a>
				</div>
			</div>
			<div class='col-xs-12 col-sm-8 col-md-9'>
				<div class='row' v-if='newContact'>
					<div class='col-xs-12 col-sm-8 col-md-9 col-lg-10'>
						<v-text-field dense placeholder='Who you are reaching'></v-text-field>
					</div>
					<div class='col-xs-12 col-sm-4 col-md-3 col-lg-2'>
						<button type='button' class='btn btn-primary btn-block' @click='newContact = false'><i class='far fa-user'></i> Contact</button>
					</div>
				</div>
				<div v-if='!newContact && conversation != null'>
					<v-card class="mx-auto">
						<v-card-text>
							<div class='row' v-if='conversation != "global" && conversation != "self"'>
								<div class='col-xs-12 col-sm-4 col-md-2'>Images</div>
								<div class='col-xs-12 col-sm-8 col-md-10'>
									Username - Last Message Date
								</div>
							</div>
							<div class='row' v-if='conversation == "global"'>
								<div class='col-xs-12 col-sm-4 col-md-2 text-center'>
									<v-avatar color="red">
										<i class='fas fa-globe text-white'></i>
									</v-avatar>
								</div>
								<div class='col-xs-12 col-sm-8 col-md-10'>
									<h6>Server Messages</h6>
									Talk with everyone else on the server!
								</div>
							</div>
							<div class='row' v-if='conversation == "self"'>
								<div class='col-xs-12 col-sm-4 col-md-2 text-center'>
									<v-avatar color="red">
										<span class="white--text headline">ME</span>
									</v-avatar>
								</div>
								<div class='col-xs-12 col-sm-8 col-md-10'>
									<h6>{{ user.name }}</h6>
									Place to keep your personal notes!
								</div>
							</div>
						</v-card-text>
					</v-card>

					<v-card class="mx-auto mt-3 messageArea">
						<v-card-text v-if='messagesLoading' class='text-center'>
							<p>Loading Messages...</p>
							<v-progress-circular indeterminate color="primary"></v-progress-circular>
						</v-card-text>
						<v-card-text v-if='!messagesLoading && messages.length > 0'>
							<div v-for='messageItem in messages' class='mt-1 px-3 text-white'>

								<div class='row' :title='messageItem.datetime'>
									<div class='col-xs-8 col-sm-9 col-md-10 bg-secondary pl-2 pr-5 py-1 rounded' v-if='messageItem.sender != user.id'>
										{{ messageItem.message }}
									</div>
									<div class='col-xs-4 col-sm-3 col-md-2 text-center text-dark'>
										<div class="h5">M</div>
										<small class='text-muted text-small'>{{ messageItem.datetime }}</small>
									</div>
									<div class='col-xs-8 col-sm-9 col-md-10 bg-primary pr-2 pl-5 py-1 rounded' v-if='messageItem.sender == user.id'>
										{{ messageItem.message }}
									</div>
								</div>
							</div>
						</v-card-text>
						<v-card-text class='text-center' v-if='!messagesLoading && messages.length == 0'>
							<p>No messages have been sent yet...</p>
						</v-card-text>
					</v-card>

					<div class='row'>
						<div class='col-xs-12 col-sm-8 col-md-9 col-lg-10'>
							<v-text-field dense placeholder='Enter your message...' v-model='message'></v-text-field>
						</div>
						<div class='col-xs-12 col-sm-4 col-md-3 col-lg-2'>
							<button type='button' class='btn btn-primary btn-block' @click='sendMessage' :disabled='message == null'><i class='far fa-paper-plane'></i> Send</button>
						</div>
					</div>
				</div>

				<div v-if='!newContact && conversation == null'>
					<v-card class="mx-auto">
						<v-card-text>
							<p>No conversation has beel selected!</p>
							<p>Feel free to start a new one, talk globally, or reach out to your friends!</p>
						</v-card-text>
					</v-card>
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
		created()   {
			this.$Helper.nodeServer.getHistorical();
		},
		data()      {
			return {
				newContact: false,
				conversation: null,
				receiver: null,
				message: null
			}
		},
		computed  : {
			user() {
				return this.$store.state.userStore.user;
			},
			usersMessaged() {
				return this.$store.state.chatStore.historical;
			},
			messages() {
				return this.$store.state.chatStore.chat;
				// return [
				// 	{ sender: 2, receiver: 1, datetime: '2019-12-01 23:59:59', message: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur est purus, sagittis quis augue et, malesuada tristique ligula. Quisque pellentesque urna quis aliquam vestibulum. Donec bibendum posuere diam sed maximus. Maecenas a justo sed neque dictum varius. Morbi porta congue suscipit. Nulla interdum sem vitae orci pellentesque pharetra. Duis venenatis felis et nibh scelerisque, pretium gravida tellus hendrerit. Mauris accumsan dolor vitae varius mattis. Morbi elementum urna dictum, feugiat urna et, facilisis ligula. Ut mattis sit amet diam nec ornare. Sed vestibulum lacus ut vestibulum pretium. Aliquam lacinia erat sed nisi aliquam venenatis. Duis eget nulla augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;' },
				// 	{ sender: 1, receiver: 2, datetime: '2019-12-01 23:59:59', message: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur est purus, sagittis quis augue et, malesuada tristique ligula. Quisque pellentesque urna quis aliquam vestibulum. Donec bibendum posuere diam sed maximus. Maecenas a justo sed neque dictum varius. Morbi porta congue suscipit. Nulla interdum sem vitae orci pellentesque pharetra. Duis venenatis felis et nibh scelerisque, pretium gravida tellus hendrerit. Mauris accumsan dolor vitae varius mattis. Morbi elementum urna dictum, feugiat urna et, facilisis ligula. Ut mattis sit amet diam nec ornare. Sed vestibulum lacus ut vestibulum pretium. Aliquam lacinia erat sed nisi aliquam venenatis. Duis eget nulla augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;' },
				// 	{ sender: 2, receiver: 1, datetime: '2019-12-01 23:59:59', message: 'test' },
				// 	{ sender: 1, receiver: 2, datetime: '2019-12-01 23:59:59', message: 'test 2' },
				// 	{ sender: 2, receiver: 1, datetime: '2019-12-01 23:59:59', message: 'test' },
				// 	{ sender: 1, receiver: 2, datetime: '2019-12-01 23:59:59', message: 'test 2' },
				// 	{ sender: 2, receiver: 1, datetime: '2019-12-01 23:59:59', message: 'test' },
				// 	{ sender: 1, receiver: 2, datetime: '2019-12-01 23:59:59', message: 'test 2' },
				// 	{ sender: 2, receiver: 1, datetime: '2019-12-01 23:59:59', message: 'test' },
				// 	{ sender: 1, receiver: 2, datetime: '2019-12-01 23:59:59', message: 'test 2' },
				// 	{ sender: 1, receiver: 2, datetime: '2019-12-01 23:59:59', message: 'test 2' },
				// 	{ sender: 2, receiver: 1, datetime: '2019-12-01 23:59:59', message: 'test' },
				// 	{ sender: 1, receiver: 2, datetime: '2019-12-01 23:59:59', message: 'test 2' },
				// 	{ sender: 1, receiver: 2, datetime: '2019-12-01 23:59:59', message: 'test 2' },
				// 	{ sender: 2, receiver: 1, datetime: '2019-12-01 23:59:59', message: 'test' },
				// 	{ sender: 1, receiver: 2, datetime: '2019-12-01 23:59:59', message: 'test 2' },
				// 	{ sender: 1, receiver: 2, datetime: '2019-12-01 23:59:59', message: 'test 2' },
				// 	{ sender: 2, receiver: 1, datetime: '2019-12-01 23:59:59', message: 'test' },
				// 	{ sender: 1, receiver: 2, datetime: '2019-12-01 23:59:59', message: 'test 2' }
				// ];
			},
			messageSend() {
				return {
					conversation: this.conversation,
					sender: this.user.name,
					receiver: null,
					message: this.message
				}
			},
			messagesLoading() {
				return this.$store.getters['chatStore/loading'];
			}
		},
		methods   : {
			setConversation(id) {
				this.newContact = false;
				this.conversation = id;

				var payload = {
					id: id,
					user: this.user.id
				};
				this.$store.dispatch('chatStore/setChatNull');
				this.$Helper.nodeServer.getChat(payload)
			},
			sendMessage() {

			}
		},
		watch     : {}
	};
</script>

<style scoped>
	.messageArea {
		min-height: 500px;
		max-height: 500px;
		overflow-y: scroll;
	}

	.messagePost {
		width: auto;
		min-width: 150px;
		max-width: 450px;
  		text-align: justify;
  		text-justify: inter-word;
	}
</style>
