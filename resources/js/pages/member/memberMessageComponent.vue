<template>
	<div>
		<v-card class="mx-auto bg-danger" v-if='!nodeServerLive'>
			<v-card-text>
				<i class="fas fa-exclamation-triangle text-warning"></i> <span class='text-white'>The chat server is down! Contact the administrator and let them know!</span>
			</v-card-text>
		</v-card>
		<div class='row' v-if='nodeServerLive'>
			<div class='col-xs-12 col-sm-4 col-md-3'>
				<div class="list-group">
					<a href="javascript:void(0)" class="list-group-item list-group-item-action" @click='newContact = true'>
						<i class='fas fa-plus'></i> New Message
					</a>
					<a href="javascript:void(0)" class="list-group-item list-group-item-action" v-for="contactPerson in usersMessaged" @click='setConversation(contactPerson.id)'><i :class="contactPerson.icon"></i>
						<span v-if='contactPerson.id != "global" && contactPerson.id != "self"'>{{ userNameList[contactPerson.id].name }}</span>
						<span v-if='contactPerson.id == "global" || contactPerson.id == "self"'>{{ contactPerson.name }}</span>
						[{{ contactPerson.count }}]</a>
				</div>
			</div>
			<div class='col-xs-12 col-sm-8 col-md-9'>
				<div class='row' v-if='newContact'>
					<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
						<v-text-field dense placeholder='Who you are reaching' v-model='filterContacts'></v-text-field>
					</div>
					<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
						<ul class="list-group mr-5">
							<li class="list-group-item" v-for="activeUser in activeUsersList">
								<div class='row' v-if='activeUser.id > user.id'>
									<div class='col-8'>{{ activeUser.name }}</div>
									<div class='col-4 text-right'>
										<button type='button' class='btn btn-success btn-sm' title='Contact' @click='setConversation(user.id + "-" + activeUser.id)'><i class='fas fa-user'></i></button>
										<button type='button' class='btn btn-danger btn-sm' title='Block' disabled><i class='fas fa-ban'></i></button>
										<button type='button' class='btn btn-warning btn-sm' title='Unblock' disabled><i class='fas fa-ban'></i></button>
									</div>
								</div>
								<div class='row' v-if='activeUser.id < user.id'>
									<div class='col-8'>{{ activeUser.name }}</div>
									<div class='col-4 text-right'>
										<button type='button' class='btn btn-success btn-sm' title='Contact' @click='setConversation(activeUser.id + "-" + user.id)'><i class='fas fa-user'></i></button>
										<button type='button' class='btn btn-danger btn-sm' title='Block' disabled><i class='fas fa-ban'></i></button>
										<button type='button' class='btn btn-warning btn-sm' title='Unblock' disabled><i class='fas fa-ban'></i></button>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
				<div v-if='!newContact && conversation != null'>
					<v-card class="mx-auto">
						<v-card-text>
							<div class='row' v-if='conversation != "global" && conversation != "self"'>
								<div class='col-xs-12 col-sm-4 col-md-2 text-center'>
									<v-avatar color="blue">
										<span class="white--text headline">{{ userSelected.name[0] }}</span>
									</v-avatar>
								</div>
								<div class='col-xs-12 col-sm-8 col-md-10'>
									{{ userSelected.name }}<span v-if='!messagesLoading && messages.length > 0'> - {{ messages[0].datetime }}</span>
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
									<div class='col-xs-8 col-sm-9 col-md-10 bg-secondary pl-2 pr-5 py-1 rounded' v-if='messageItem.senderId != user.id' v-html='messageItem.message'></div>
									<div class='col-xs-4 col-sm-3 col-md-2 text-center text-dark'>
										<div class="h5">
											<v-avatar color="blue">
												<span class='white--text'>{{ getSender(messageItem.senderId) }}</span>
											</v-avatar>
										</div>
									</div>
									<div class='col-xs-8 col-sm-9 col-md-10 bg-primary pr-2 pl-5 py-1 rounded' v-if='messageItem.senderId == user.id' :title='messageItem.datetime' v-html='messageItem.message'></div>
								</div>
							</div>
						</v-card-text>
						<v-card-text class='text-center' v-if='!messagesLoading && messages.length == 0'>
							<p>No messages have been sent yet...</p>
						</v-card-text>
					</v-card>
					<div class='row'>
						<div class='col-xs-12 col-sm-8 col-md-9 col-lg-10'>
							<v-text-field placeholder='Enter your message...' @keyup.enter="sendMessage" v-model='message' dense counter clearable></v-text-field>
						</div>
						<div class='col-xs-12 col-sm-4 col-md-3 col-lg-2'>
							<button type='button' class='btn btn-primary btn-block btn-sm' @click='sendMessage' autofocus :disabled='message == null'><i class='far fa-paper-plane'></i> Send</button>
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
	import moment from 'moment';
	import Autolinker from 'autolinker';

	export default {
		name      : "member-message-component",
		props     : [],
		components: {},
		created()   {
			this.$Helper.nodeServer.getHistorical(this.user.id);
		},
		data()      {
			return {
				newContact: false,
				conversation: null,
				message: null,
				filterContacts: ''
			}
		},
		computed  : {
			nodeServerLive() {
				return this.$store.getters['nodeStore/active'];
			},
			user() {
				return this.$store.state.userStore.user;
			},
			usersMessaged() {
				var historicalChat = this.$store.state.chatStore.historical;
				var returnMessages = [];
				for (var i in historicalChat) {
					var message = historicalChat[i];
					if (message.id == 'global' || message.id == 'self') {
						returnMessages.push(message);
					} else if (message.id > this.user.id) {
						returnMessages.push({
							id: this.user.id + '-' + message.id,
							icon: message.icon,
							count: message.count,
							name: 'user'
						});
					} else if (message.id < this.user.id) {
						returnMessages.push({
							id: message.id + '-' + this.user.id,
							icon: message.icon,
							count: message.count,
							name: 'user'
						});
					}
				}
				return returnMessages;
			},
			messages() {
				var chats = this.$store.state.chatStore.chat;
				return chats.reverse();
			},
			messageSend() {
				return {
					conversation: this.conversation,
					sender: this.user.name,
					senderId: this.user.id,
					message: Autolinker.link(this.message, { className: 'linkableText' })
				}
			},
			messagesLoading() {
				return this.$store.getters['chatStore/loading'];
			},
			activeUsersList() {
				return this.$store.getters['usersStore/activeUsers'].filter(user => {
					return user.id != this.user.id && user.name.includes(this.filterContacts);
				});
			},
			userNameList() {
				var listReturn = [];
				for (var i in this.activeUsersList) {
					var user = this.activeUsersList[i];
					if (user.id > this.user.id) {
						listReturn[this.user.id + '-' + user.id] = user;
					} else if (user.id < this.user.id) {
						listReturn[user.id + '-' + this.user.id] = user;
					}
				}
				return listReturn;
			},
			userSelected() {
				if (this.conversation != null) {
					return this.userNameList[this.conversation];
				}
				return null;
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
				this.$store.dispatch('chatStore/setChatId', id);
				this.$Helper.nodeServer.getChat(payload)
			},
			sendMessage() {
				var message = this.messageSend;
				message.datetime = moment(new Date()).format('lll');

				var msgData = {
					id: this.conversation,
					message: message
				};

				this.message = null;
				this.$Helper.nodeServer.sendMessage(msgData);
			},
			getSender(id) {
				if (id == this.user.id) {
					return this.user.name[0];
				}
				for (var i in this.activeUsersList) {
					var user = this.activeUsersList[i];
					console.log(user);
					if (user.id == id) {
						return user.name[0];
					}
				}
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
