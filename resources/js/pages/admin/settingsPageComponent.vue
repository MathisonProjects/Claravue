<template>
	<div>
		<h1><v-icon x-large>mdi-settings</v-icon> Settings</h1>

		<v-card class="mx-auto">
		    <v-card-text>
				<div class="text--primary">
					<v-expansion-panels accordion focusable>
						<v-expansion-panel>
							<v-expansion-panel-header>Primary</v-expansion-panel-header>
							<v-expansion-panel-content>
								<div class='form-group mt-3'>
									<label for='dataName'><i class="fab fa-dev"></i> App Name</label>
									<input type='text' placeholder='eg. Mathison Projects' id='dataName' class='form-control form-control-sm' v-model='data.name' />
								</div>
								<div class='form-group'>
									<label for='dataDescription'><i class="fas fa-terminal"></i> App Description</label>
									<input type='text' placeholder='eg. App Description' id='dataDescription' class='form-control form-control-sm' v-model='data.description' />
								</div>
							</v-expansion-panel-content>
						</v-expansion-panel>

						<v-expansion-panel>
							<v-expansion-panel-header>Application Theme</v-expansion-panel-header>
							<v-expansion-panel-content>
								<div class='row'>
									<div class='col-xs-12 col-md-6'>
										<div class='form-group mt-3'>
											<label for='dataHeaderColor'><i class="fab fa-dev"></i> Header Color</label>
											<input type='text' placeholder='eg. Mathison Projects' id='dataHeaderColor' class='form-control form-control-sm' v-model='data.headerColor' />
										</div>
									</div>
									<div class='col-xs-12 col-md-6'>
										<div class='form-group mt-3'>
											<label for='dataHeaderTextColor'><i class="fab fa-dev"></i> Header Text Color</label>
											<input type='text' placeholder='eg. Mathison Projects' id='dataHeaderTextColor' class='form-control form-control-sm' v-model='data.headerTextColor' />
										</div>
									</div>
								</div>
								<div class='row'>
									<div class='col-xs-12 col-md-6'>
										<div class='form-group mt-3'>
											<label for='dataBodyColor'><i class="fab fa-dev"></i> Body Color</label>
											<input type='text' placeholder='eg. Mathison Projects' id='dataBodyColor' class='form-control form-control-sm' v-model='data.bodyColor' />
										</div>
									</div>
									<div class='col-xs-12 col-md-6'>
										<div class='form-group mt-3'>
											<label for='dataFooterColor'><i class="fab fa-dev"></i> Footer Color</label>
											<input type='text' placeholder='eg. Mathison Projects' id='dataFooterColor' class='form-control form-control-sm' v-model='data.footerColor' />
										</div>
									</div>
								</div>

								<div class='row'>
									<div class='col-xs-12 col-md-6'>
										<div class='form-group mt-3'>
											<label for='dataFooterTextColor'><i class="fab fa-dev"></i> Footer Text Color</label>
											<input type='text' placeholder='eg. Mathison Projects' id='dataFooterTextColor' class='form-control form-control-sm' v-model='data.footerTextColor' />
										</div>
									</div>
									<div class='col-xs-12 col-md-6'></div>
								</div>

							</v-expansion-panel-content>
						</v-expansion-panel>

						<v-expansion-panel>
							<v-expansion-panel-header>Header</v-expansion-panel-header>
							<v-expansion-panel-content>
								<div class='form-group mt-3'>
									<label for='dataTitleTag'><i class="fas fa-flag"></i> Title Tag</label>
									<input type='text' placeholder='eg. Mathison Projects' id='dataTitleTag' class='form-control form-control-sm' v-model='data.metaTitle' />
								</div>
								<div class='form-group'>
									<label for='dataMetaTagDescription'><i class="fas fa-terminal"></i> Meta Tag Description</label>
									<input type='text' placeholder='eg. App Description' id='dataMetaTagDescription' class='form-control form-control-sm' v-model='data.metaTagDescription' />
								</div>
								<div class='form-group'>
									<label for='dataMetaTagKeywords'><i class="fas fa-search"></i> Meta Tag Keywords</label>
									<input type='text' placeholder='eg. App Description' id='dataMetaTagKeywords' class='form-control form-control-sm' v-model='data.metaTagKeywords' />
								</div>
							</v-expansion-panel-content>
						</v-expansion-panel>

						<v-expansion-panel>
							<v-expansion-panel-header>Footer</v-expansion-panel-header>
							<v-expansion-panel-content>
								<div class='row mt-3'>
									<div class='col-xs-12 col-md-6'>
										<div class='form-group'>
											<label for='dataFooterTagline'><i class="fas fa-shoe-prints"></i> Footer Tagline</label>
											<input type='text' placeholder='eg. Get connected with us on Social Networks!' id='dataFooterTagline' class='form-control form-control-sm' v-model='data.footerTagline' />
										</div>
									</div>
									<div class='col-xs-12 col-md-6'>
										<div class='form-group'>
											<label for='dataMembershipEnabled'>Sticky Footer</label>
											<v-checkbox v-model="data.stickyFooter" label="Enabled"></v-checkbox>
										</div>
									</div>
								</div>
								
								<div class='row'>
									<div class='col-xs-12 col-md-6'>
										<div class='form-group'>
											<label for='footerCompanyName'><i class="fas fa-key"></i> Footer Company Name</label>
											<input type='text' id='footerCompanyName' placeholder='eg. Mathison Projects' class='form-control form-control-sm' v-model='data.footerCompanyName' />
										</div>
									</div>
									<div class='col-xs-12 col-md-6'>
										<div class='form-group'>
											<label for='footerCompanyLink'><i class="fas fa-key"></i> Footer Company Link</label>
											<input type='text' id='footerCompanyLink' placeholder='eg. https://mathisonprojects.com' class='form-control form-control-sm' v-model='data.footerCompanyLink' />
										</div>
									</div>
								</div>
								<div class='row'>
									<div class='col-xs-12 col-md-6'>
										<div class='form-group'>
											<label for='footerCompanyApp'><i class="fas fa-key"></i> Footer Company App Name</label>
											<input type='text' id='footerCompanyApp' placeholder='eg. Vue Laravel Clean' class='form-control form-control-sm' v-model='data.footerCompanyApp' />
										</div>
									</div>
									<div class='col-xs-12 col-md-6'>
										<div class='form-group'>
											<label for='footerCompanyAppLink'><i class="fas fa-key"></i> Footer Company App Link</label>
											<input type='text' id='footerCompanyAppLink' placeholder='eg. https://github.com/Divinityfound/vue-laravel-cleandeploy' class='form-control form-control-sm' v-model='data.footerCompanyAppLink' />
										</div>
									</div>
								</div>
							</v-expansion-panel-content>
						</v-expansion-panel>
						<v-expansion-panel>
							<v-expansion-panel-header>Social Media</v-expansion-panel-header>
							<v-expansion-panel-content>
								<div class='row'>
									<div class='col-xs-12 col-md-6'>
										<div class='form-group'>
											<label for='dataFacebook'><i class="fab fa-facebook"></i> Facebook</label>
											<input type='text' placeholder='eg. https://facebook.com/jacob.mathison' id='dataFacebook' class='form-control form-control-sm' v-model='data.facebook' />
										</div>
										<div class='form-group'>
											<label for='dataTwitter'><i class="fab fa-twitter"></i> Twitter</label>
											<input type='text' placeholder='eg. https://twitter.com/mathisonproject' id='dataTwitter' class='form-control form-control-sm' v-model='data.twitter' />
										</div>
										<div class='form-group'>
											<label for='dataYoutube'><i class="fab fa-youtube"></i> Youtube</label>
											<input type='text' placeholder='eg. https://youtube.com/channel' id='dataYoutube' class='form-control form-control-sm' v-model='data.youtube' />
										</div>
										<div class='form-group'>
											<label for='dataLinkedin'><i class="fab fa-linkedin"></i> Linkedin</label>
											<input type='text' placeholder='eg. https://linkedin.com' id='dataLinkedin' class='form-control form-control-sm' v-model='data.linkedin' />
										</div>
									</div>
									<div class='col-xs-12 col-md-6'>
										<div class='form-group'>
											<label for='dataInstagram'><i class="fab fa-instagram"></i> Instagram</label>
											<input type='text' placeholder='eg. https://instagram.com/mathisonprojects' id='dataInstagram' class='form-control form-control-sm' v-model='data.instagram' />
										</div>
										<div class='form-group'>
											<label for='dataGithub'><i class="fab fa-github"></i> Github</label>
											<input type='text' placeholder='eg. https://github.com/divinityfound' id='dataGithub' class='form-control form-control-sm' v-model='data.github' />
										</div>
										<div class='form-group'>
											<label for='dataPinterest'><i class="fab fa-pinterest"></i> Pinterest</label>
											<input type='text' placeholder='eg. https://pinterest.com' id='dataPinterest' class='form-control form-control-sm' v-model='data.pinterest' />
										</div>
									</div>
								</div>
							</v-expansion-panel-content>
						</v-expansion-panel>
						<v-expansion-panel>
							<v-expansion-panel-header>E-Commerce</v-expansion-panel-header>
							<v-expansion-panel-content>
								<div class='row'>
									<div class='col-xs-12 col-md-6'>
										<div class='form-group'>
											<label for='dataStripeKey'><i class="fas fa-key"></i> Stripe Key</label>
											<input type='text' id='dataStripeKey' placeholder='eg. Stripe Key' class='form-control form-control-sm' v-model='data.stripe_key' />
										</div>
									</div>
									<div class='col-xs-12 col-md-6'>
										<div class='form-group'>
											<label for='dataStripeClient'><i class="fab fa-cc-stripe"></i> Stripe Client</label>
											<input type='text' id='dataStripeClient' placeholder='eg. Stripe Client' class='form-control form-control-sm' v-model='data.stripe_client' />
										</div>
									</div>
								</div>
							</v-expansion-panel-content>
						</v-expansion-panel>

						<v-expansion-panel>
							<v-expansion-panel-header>Modules</v-expansion-panel-header>
							<v-expansion-panel-content>
								<div class='row'>
									<div class='col-xs-12 col-md-3'>
										<div class='form-group'>
											<label for='dataMembershipEnabled'>Membership</label>
											<v-checkbox v-model="data.membershipEnabled" label="Enabled"></v-checkbox>
										</div>
									</div>
									<div class='col-xs-12 col-md-3'>
										<div class='form-group'>
											<label for='label'>Blog</label>
											<v-checkbox v-model="data.blogEnabled" label="Enabled"></v-checkbox>
										</div>
									</div>
									<div class='col-xs-12 col-md-3'>
										<div class='form-group'>
											<label for='label'>Forum</label>
											<v-checkbox v-model="data.forumEnabled" label="Enabled"></v-checkbox>
										</div>
									</div>
									<div class='col-xs-12 col-md-3'>
										<div class='form-group'>
											<label for='label'>Shop</label>
											<v-checkbox v-model="data.shopEnabled" label="Enabled"></v-checkbox>
										</div>
									</div>
								</div>
							</v-expansion-panel-content>
						</v-expansion-panel>
						
						<v-expansion-panel>
							<v-expansion-panel-header>Cloudflare</v-expansion-panel-header>

							<v-expansion-panel-content>
								<div class='row'>
									<div class='col-xs-12 col-md-4'>
										<div class='form-group'>
											<label for='dataCloudflareEmail'><i class="fas fa-envelope"></i> Email</label>
											<input type='text' id='dataCloudflareEmail' placeholder='eg. Email' class='form-control form-control-sm' v-model='data.cf_email' />
										</div>
									</div>
									<div class='col-xs-12 col-md-4'>
											<label for='dataCloudflareReadKey'><i class="fas fa-key"></i> Read Key</label>
											<input type='password' id='dataCloudflareReadKey' placeholder='eg. Read Key' class='form-control form-control-sm' v-model='data.cf_readKey' />
										<div class='form-group'>
										</div>
									</div>
									<div class='col-xs-12 col-md-4'>
											<label for='dataCloudflareCfZone'><i class="fas fa-grip-horizontal"></i> CF Zone</label>
											<input type='text' id='dataCloudflareCfZone' placeholder='eg. CF Zone' class='form-control form-control-sm' v-model='data.cf_zone' />
										<div class='form-group'>
										</div>
									</div>
								</div>
							</v-expansion-panel-content>
						</v-expansion-panel>

						<v-expansion-panel>
							<v-expansion-panel-header>Other</v-expansion-panel-header>

							<v-expansion-panel-content>
								<div class='row'>
									<div class='col-xs-12 col-md-6'>
										<div class='form-group'>
											<v-select v-model="data.backgroundVideo" :items="fileList" label="Background Video"></v-select>
										</div>
									</div>
								</div>
							</v-expansion-panel-content>
						</v-expansion-panel>
					</v-expansion-panels>

					<div class='form-group text-right mt-2'>
						<button type='button' class='btn btn-primary' @click='save'><i class='fas fa-save'></i> Save</button>
					</div>
				</div>
		    </v-card-text>
		</v-card>
	</div>
</template>

<script>
	export default {
		name      : "settings-page-component",
		props     : [],
		components: {},
		created()   {
			this.$store.dispatch('settingsStore/getSettings');
		},
		data()      {
			return {
				data: this.$store.state.settingsStore.settings
			}
		},
		computed  : {
			fileList() {
				return this.$store.state.fileStore.files;
			}
		},
		methods   : {
			save() {
				this.$store.dispatch('settingsStore/saveSettings', this.data);
			}
		},
		watch     : {}
	};
</script>

<style scoped></style>
