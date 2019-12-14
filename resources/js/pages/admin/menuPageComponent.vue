<template>
	<div>
		<div class='row'>
			<div class='col-xs-12 col-md-6'>
				<h1><v-icon x-large>mdi-menu</v-icon> Main Menu</h1>
			</div>
			<div class='col-xs-12 col-md-6 text-right'>
				<button type='button' class='btn btn-primary' @click='addMenu'><i class='fas fa-plus'></i> Add Menu Item</button>
			</div>
		</div>

		<div class='row mt-2' v-for='(item, index) in menuList'>
			<div class='col-md-2'>
				<div class='form-group'>
					<label for='label'>Type</label>
					<v-select :items="menuItemType" label="Type" v-model='item.type'></v-select>
				</div>
			</div>
			<div class='col-md-3'>
				<div class='form-group'>
					<label for='label'>Icon</label>
					<v-select :items="iconList" label="Icon Type" v-model='item.icon'></v-select>
				</div>
			</div>
			<div class='col-md-2'>
				<div class='form-group'>
					<label for='label'>Text</label>
					<v-text-field v-model='item.text'></v-text-field>
				</div>
			</div>
			<div class='col-md-2'>
				<div class='form-group'>
					<label for='label'>Target</label>
					<v-text-field v-model='item.target'></v-text-field>
				</div>
			</div>
			<div class='col-md-3 text-right mt-5'>
				<button type='button' class='btn btn-success' @click='saveItem(item)'><i class='fas fa-save'></i></button>
				<button type='button' class='btn btn-primary' @click='orderChange(item, -1)' :disabled='index == 0 || item.oid < 1'><i class='fas fa-sort-up'></i></button>
				<button type='button' class='btn btn-primary' @click='orderChange(item, 1)' :disabled='index == (menuList.length - 1)'><i class='fas fa-sort-down'></i></button>
				<button type='button' class='btn btn-danger' @click='deleteItem(item)'><i class='fas fa-trash'></i></button>
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
			return {}
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
				return this.$store.state.menuStore.menu;
			}
		},
		methods   : {
			orderChange(item, direction) {
				item.oid += direction;
				this.$store.dispatch('menuStore/saveMenu', item);
			},
			addMenu() {
				var data = {
					icon: 'mdi-lock-question',
					text: 'Text',
					type: 'Internal',
					target: '/',
					oid: 0
				};
				this.$store.dispatch('menuStore/saveMenu', data);
			},
			saveItem(item) {
				this.$store.dispatch('menuStore/saveMenu', item);
			},
			deleteItem(item) {
				this.$store.dispatch('menuStore/deleteMenu', item);
			}
		},
		watch     : {}
	};
</script>

<style scoped></style>
