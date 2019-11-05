<template>
	<div>
		<h1><v-icon x-large>mdi-settings</v-icon> Settings</h1>

		<v-card class="mx-auto">
		    <v-card-text>
				<div>Planned Settings</div>
				<div class="text--primary">
					App Name
					App Description
					Social Media
						- Facebook
						- Twitter
						- Youtube
						- Linkedin
						- Instagram
						- Github
						- Pinterest
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
		created()   {},
		data()      { return {} },
		computed  : {},
		methods   : {},
		watch     : {}
	};
</script>

<style scoped></style>
