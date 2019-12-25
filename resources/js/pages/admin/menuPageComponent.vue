<template>
	<div>
		<div class='row'>
			<div class='col-xs-12 col-md-6'>
				<h1><v-icon x-large>mdi-menu</v-icon> Main Menu <a href='javascript:void(0)' :title='menuInstructions'><i class="fas fa-exclamation-circle"></i></a></h1>
			</div>
			<div class='col-xs-12 col-md-6 text-right'>
				<button type='button' class='btn btn-success btn-sm' @click='saveAll'><i class='fas fa-save'></i> Save All</button>
				<button type='button' class='btn btn-primary btn-sm' @click='addMenu'><i class='fas fa-plus'></i> Add Menu Item</button>
			</div>
		</div>

		<div class='row mt-2' v-for='(item, index) in menuList'>
			<div class='col-md-2'>
				<div class='form-group'>
					<v-select :items="menuItemType" label="Type" v-model='item.type'></v-select>
				</div>
			</div>
			<div class='col-md-3'>
				<div class='form-group'>
					<v-autocomplete :items="iconList" label="Icon Type" v-model='item.icon'></v-autocomplete>
				</div>
			</div>
			<div class='col-md-2'>
				<div class='form-group'>
					<v-text-field v-model='item.text' label='Menu Text' clearable></v-text-field>
				</div>
			</div>
			<div class='col-md-2'>
				<div class='form-group'>
					<v-select :items="targetList" label="Target Page" v-model='item.target' clearable></v-select>
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
			pages() {
				return this.$store.state.pageStore.pages;
			},
			targetList() {
				var list = [
					'/',
					'/blog',
					'/member',
					'stylesheet'
				];
				for (var i in this.pages) {
					list.push( '/page/' + this.pages[i].key );
				}
				return list;
			},
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
			},
			menuInstructions() {
				return 'Items may only be saved individually, which will reset the other rows. If you wish to save everything simultaneously, click on "Save All".';
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
			},
			saveAll() {
				var items = this.menuList;
				for (var i in this.menuList) {
					this.saveItem(this.menuList[i]);
				}
			}
		},
		watch     : {}
	};
</script>

<style scoped></style>
