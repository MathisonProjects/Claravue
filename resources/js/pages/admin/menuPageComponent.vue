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
			<div class='col-xs-12 col-sm-12 col-md-7'>
				<div class='row'>
					<div class='col-md-4'>
						<div class='form-group'>
							<v-select :items="menuItemType" label="Type" v-model='item.type'></v-select>
						</div>
					</div>
					<div class='col-md-4'>
						<div class='form-group'>
							<v-autocomplete :items="iconList" label="Icon Type" v-model='item.icon'></v-autocomplete>
						</div>
					</div>
					<div class='col-md-4'>
						<div class='form-group'>
							<v-text-field v-model='item.text' label='Menu Text' clearable></v-text-field>
						</div>
					</div>
				</div>
			</div>
			<div class='col-xs-12 col-sm-12 col-md-5'>
				<div class='row'>
					<div class='col-md-6'>
						<div class='form-group'>
							<v-select :items="targetList" label="Target Page" v-model='item.target' clearable></v-select>
						</div>
					</div>
					<div class='col-md-6 text-right mt-5'>
						<button type='button' class='btn btn-success btn-sm' @click='saveItem(item)'><i class='fas fa-save'></i></button>
						<button type='button' class='btn btn-primary btn-sm' @click='orderChange(item, -1)' :disabled='index == 0 || item.oid < 1'><i class='fas fa-sort-up'></i></button>
						<button type='button' class='btn btn-primary btn-sm' @click='orderChange(item, 1)' :disabled='index == (menuList.length - 1)'><i class='fas fa-sort-down'></i></button>
						<button type='button' class='btn btn-danger btn-sm' @click='deleteItem(item)'><i class='fas fa-trash'></i></button>
					</div>
				</div>
			</div>

			
		</div>
		<confirmationModalComponent v-if='confirmRequest.show' :confirmationText='confirmRequest.text' @confirm='confirmedSaveAll' @closeDialog='confirmRequest.show = false' />
	</div>
</template>

<script>
	import confirmationModalComponent from '@/components/confirmationModalComponent'

	export default {
		name      : "menu-page-component",
		props     : [],
		components: {
			confirmationModalComponent
		},
		created()   {},
		data()      {
			return {
				confirmRequest: {
					show: false,
					text: '',
					value: null
				}
			}
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
					'/shop',
					'/stylesheet'
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
					oid: this.menuList.length
				};
				this.$store.dispatch('menuStore/saveMenu', data);
			},
			confirmedSaveAll() {
				var items = this.menuList;
				for (var i in this.menuList) {
					this.saveItem(this.menuList[i]);
				}
			},
			saveItem(item) {
				this.$store.dispatch('menuStore/saveMenu', item);
			},
			deleteItem(item) {
				this.$store.dispatch('menuStore/deleteMenu', item);
			},
			saveAll() {
				this.confirmRequest = {
					show: true,
					text: 'Are you sure you want to save all of the current menu?',
					value: null
				}
			}
		},
		watch     : {}
	};
</script>

<style scoped></style>
