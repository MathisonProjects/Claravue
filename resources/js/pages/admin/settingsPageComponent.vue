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
								<div class='row mt-2'>
									<div class='col-xs-12 col-md-1' :style='"border: black 1px solid; background-color: " + data.headerColor'></div>
									<div class='col-xs-12 col-md-5'>
										<div class='form-group mt-3'>
											<label for='dataHeaderColor'><i class="fas fa-palette"></i> Header Color</label>
											<input type='text' placeholder='eg. #ffffff' id='dataHeaderColor' class='form-control form-control-sm' v-model='data.headerColor' />
										</div>
									</div>
									<div class='col-xs-12 col-md-1' :style='"border: black 1px solid; background-color: " + data.headerTextColor'></div>
									<div class='col-xs-12 col-md-5'>
										<div class='form-group mt-3'>
											<label for='dataHeaderTextColor'><i class="fas fa-palette"></i> Header Text Color</label>
											<input type='text' placeholder='eg. #000000' id='dataHeaderTextColor' class='form-control form-control-sm' v-model='data.headerTextColor' />
										</div>
									</div>
								</div>
								<div class='row'>
									<div class='col-xs-12 col-md-1' :style='"border: black 1px solid; background-color: " + data.bodyColor'></div>
									<div class='col-xs-12 col-md-5'>
										<div class='form-group mt-3'>
											<label for='dataBodyColor'><i class="fas fa-palette"></i> Body Color</label>
											<input type='text' placeholder='eg. #fafafa' id='dataBodyColor' class='form-control form-control-sm' v-model='data.bodyColor' />
										</div>
									</div>
									<div class='col-xs-12 col-md-1' :style='"border: black 1px solid; background-color: " + data.footerColor'></div>
									<div class='col-xs-12 col-md-5'>
										<div class='form-group mt-3'>
											<label for='dataFooterColor'><i class="fas fa-palette"></i> Footer Color</label>
											<input type='text' placeholder='eg. #212121' id='dataFooterColor' class='form-control form-control-sm' v-model='data.footerColor' />
										</div>
									</div>
								</div>

								<div class='row'>
									<div class='col-xs-12 col-md-1' :style='"border: black 1px solid; background-color: " + data.footerTextColor'></div>
									<div class='col-xs-12 col-md-5'>
										<div class='form-group mt-3'>
											<label for='dataFooterTextColor'><i class="fas fa-palette"></i> Footer Text Color</label>
											<input type='text' placeholder='eg. #ffffff' id='dataFooterTextColor' class='form-control form-control-sm' v-model='data.footerTextColor' />
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
										<v-text-field v-model='data.facebook' label='Facebook' placeholder='eg. https://facebook.com/jacob.mathison' prepend-icon='mdi-facebook-box' clearable dense />
										<v-text-field v-model='data.twitter' label='Twitter' placeholder='eg. https://twitter.com/mathisonproject' prepend-icon='mdi-twitter-box' clearable dense />
										<v-text-field v-model='data.youtube' label='Youtube' placeholder='eg. https://youtube.com/channel' prepend-icon='mdi-youtube-tv' clearable dense />
										<v-text-field v-model='data.linkedin' label='Linkedin' placeholder='eg. https://linkedin.com' prepend-icon='mdi-linkedin-box' clearable dense />
									</div>
									<div class='col-xs-12 col-md-6'>
										<v-text-field v-model='data.instagram' label='Instagram' placeholder='eg. https://instagram.com/mathisonprojects' prepend-icon='mdi-image-filter' clearable dense />
										<v-text-field v-model='data.github' label='Github' placeholder='eg.  https://github.com/divinityfound' prepend-icon='mdi-github-circle' clearable dense />
										<v-text-field v-model='data.pinterest' label='Pinterest' placeholder='eg. https://pinterest.com' prepend-icon='mdi-pinterest-box' clearable dense />
									</div>
								</div>
							</v-expansion-panel-content>
						</v-expansion-panel>
						<v-expansion-panel>
							<v-expansion-panel-header>E-Commerce</v-expansion-panel-header>
							<v-expansion-panel-content>
								<div class='row'>
									<div class='col-xs-12 col-md-4'>
										<v-checkbox v-model="data.stripePayment" label="Enabled"></v-checkbox>
									</div>
									<div class='col-xs-12 col-md-4'>
										<v-text-field v-model='data.stripe_key' label='Stripe Key' placeholder='eg. Stripe Key' clearable dense />
									</div>
									<div class='col-xs-12 col-md-4'>
										<v-text-field v-model='data.stripe_client' label='Stripe Client' placeholder='eg. Stripe Client' clearable dense />
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
										<v-text-field v-model='data.cf_email' label='Email' placeholder='eg. Email' clearable dense />
									</div>
									<div class='col-xs-12 col-md-4'>
										<v-text-field v-model='data.cf_readKey' label='Read Key' placeholder='eg. Read Key' clearable dense />
									</div>
									<div class='col-xs-12 col-md-4'>
										<v-text-field v-model='data.cf_zone' label='CF Zone' placeholder='eg. CF Zone.' clearable dense />
									</div>
								</div>
							</v-expansion-panel-content>
						</v-expansion-panel>

						<v-expansion-panel>
							<v-expansion-panel-header>Other</v-expansion-panel-header>

							<v-expansion-panel-content>
								<div class='row'>
									<div class='col-xs-12 col-md-6'>
										<v-select v-model="data.backgroundVideo" :items="fileList" label="Background Video" prepend-icon='mdi-video-check' dense></v-select>
									</div>
									<div class='col-xs-12 col-md-6'>
										<v-select v-model="data.titleBranding" :items="fileList" label="Menu Brand" dense></v-select>
									</div>
									<div class='col-xs-12 col-md-6'>
										<v-text-field v-model='data.arrivalPopup' label='Arrival Popup' placeholder='What people see when they first arrive...' prepend-icon='mdi-comment-text-outline' clearable dense />
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
		computed  : {
			fileList() {
				return this.$store.state.fileStore.files;
			}
		},
		data()      {
			return {
				data: this.$store.state.settingsStore.settings
			}
		},
		methods   : {
			save() {
				this.$store.dispatch('settingsStore/saveSettings', this.data);
				this.$Helper.alertHelper.settingsSaved();
			}
		},
		watch     : {}
	};
</script>

<style scoped></style>
