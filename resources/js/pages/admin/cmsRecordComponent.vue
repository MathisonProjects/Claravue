<template>
	<div>
		<div class='row'>
			<div class='col-md-6'>
				<h1>Record of {{ currentModule.name }}</h1>
			</div>
			<div class='col-md-6 text-right'>
				<button type='button' class='btn btn-primary btn-sm' @click='goBack'><i class='fas fa-caret-square-left'></i> Back</button>
				<button type='button' class='btn btn-primary btn-sm' @click='save'><i class='fas fa-save'></i> Save</button>
			</div>
		</div>

		<v-card class="mx-auto">
			<v-card-text>
				<div class='row'>
					<div class='col-xs-12 col-sm-6 col-md-6'>
						<b>Name:</b>
						<div v-if='keyToEdit !== "name"'>
							{{ currentRecord.data.name }} <a href='javascript:void(0)' @click='editFieldOfRecord("name")'><i class='fas fa-pen-square'></i></a>
						</div>
						<div v-if='keyToEdit === "name"'>
							<fieldTypeComponent v-model='recordSet.data.name' :setValue='recordSet.data.name' :field='fieldEditing' />
						</div>
					</div>
					<div class='col-xs-12 col-sm-6 col-md-6' v-for='(item, index) in currentRecord.data' v-if='index !== "name"'>
						<b>{{ index }}:</b>
						<div v-if='keyToEdit !== index'>
							{{ item }} <a href='javascript:void(0)' @click='editFieldOfRecord(index)'><i class='fas fa-pen-square'></i></a>
						</div>
						<div v-if='keyToEdit === index'>
							<fieldTypeComponent v-model='recordSet.data[keyToEdit]' :setValue='recordSet.data[keyToEdit]' :field='fieldEditing' />
						</div>
					</div>
				</div>
			</v-card-text>
		</v-card>

	</div>
</template>

<script>
	import fieldTypeComponent from '@/components/admin/cms/fieldTypeComponent';

	export default {
		name      : "cms-record-component",
		props     : [],
		components: {
			fieldTypeComponent
		},
		created()   {},
		data()      {
			return {
				keyToEdit: null,
				recordSet: null
			}
		},
		computed  : {
			currentModule() {
				const modules = this.$store.state.cmsStore.modules;
				let currentModule = null;
				for (var i in modules) {
					if (modules[i].id === parseInt(this.$route.params.id)) {
						currentModule = modules[i];
					}
				}
				return currentModule;
			},
			currentRecord() {
				const records = this.$store.state.cmsRecordsStore.records;
				const record = records.filter(item => {
					return item.id === parseInt(this.$route.params.rid);
				});
				if (record.length > 0) {
					return record[0];
				} else {
					return [];
				}
			},
			fieldEditing() {
				const fieldEdit = this.currentModule.fields.filter(item => {
					return item.name === this.keyToEdit;
				});

				if (fieldEdit.length > 0) {
					return fieldEdit[0];
				} else {
					return null
				}
			}
		},
		methods   : {
			editFieldOfRecord(index) {
				if (this.recordSet === null) {
					this.recordSet = this.currentRecord;
				}
				this.keyToEdit = index;
			},
			save() {
				this.keyToEdit = null;
				var data = {
					id: this.recordSet.id,
					mid: this.recordSet.mid,
					data: JSON.stringify(this.recordSet.data)
				};
				this.$store.dispatch('cmsRecordsStore/saveStore', data);
			},
			goBack() {
				this.$router.go(-1);
			}
		},
		watch     : {}
	};
</script>

<style scoped></style>
