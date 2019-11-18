<template>
	<div>
		<div class='row'>
			<div class='col-xs-12 col-md-6'>
				<h1>Main Menu</h1>
			</div>
			<div class='col-xs-12 col-md-6 text-right'>
				<button type='button' class='btn btn-primary' v-if='addMenu == false' @click='addMenu = true'><i class='fas fa-plus'></i> Add Menu</button>
				<button type='button' class='btn btn-danger' v-if='addMenu == true' @click='addMenu = false'><i class='fas fa-plus'></i> Done Adding Menu</button>
			</div>
		</div>

		<div class='row mt-2' v-for='(item, index) in menuList'>
			<div class='col-md-3'>
				<div class='form-group'>
					<label for='label'>Type</label>
					<v-select :items="menuItemType" label="Type"></v-select>
				</div>
			</div>
			<div class='col-md-3'>
				<div class='form-group'>
					<label for='label'>Icon</label>
					<v-select :items="iconList" label="Icon Type"></v-select>
				</div>
			</div>
			<div class='col-md-2'>
				<div class='form-group'>
					<label for='label'>Text</label>
					<v-text-field></v-text-field>
				</div>
			</div>
			<div class='col-md-2'>
				<div class='form-group'>
					<label for='label'>Target</label>
					<v-text-field></v-text-field>
				</div>
			</div>
			<div class='col-md-2 text-right mt-5'>
				<button type='button' class='btn btn-primary' :disabled='index == 0'><i class='fas fa-sort-up'></i></button>
				<button type='button' class='btn btn-primary' :disabled='index == (menuList.length - 1)'><i class='fas fa-sort-down'></i></button>
				<button type='button' class='btn btn-danger'><i class='fas fa-trash'></i></button>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		name      : "menu-page-component",
		props     : [],
		components: {},
		created()   {},
		data()      {
			return {
				addMenu: false
			}
		},
		computed  : {
			iconList() {
				return this.$store.state.jsonStore.materialIconsList;
			},
			menuItemType() {
				return [
					'Internal',
					'External'
				];
			},
			menuList() {
				return [
					{},
					{}
				]
			}
		},
		methods   : {
			orderChange(index, direction) {

			}
		},
		watch     : {}
	};
</script>

<style scoped></style>
