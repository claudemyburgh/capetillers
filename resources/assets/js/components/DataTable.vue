<template>
	
	<div> 

		<div class="the__loader" v-if="!loaded" >
			<div class="sk-folding-cube">
			  <div class="sk-cube1 sk-cube"></div>
			  <div class="sk-cube2 sk-cube"></div>
			  <div class="sk-cube4 sk-cube"></div>
			  <div class="sk-cube3 sk-cube"></div>
			</div>
				
		</div>
		<div v-else>
				
			<template v-if="response.allow.creation">
				<div class="panel pane--default" >
					<div class="panel__header">
						<a class="btn btn--primary" href="#" @click.prevent="creating.active = !creating.active">
							{{ creating.active ? "Cancel" : `Create ${response.table}`  }}
						</a>
					</div>
				</div>



				<div class="modal__holder" v-if="creating.active">
					<div class="modal">
						<div class="modal__header">{{ response.modal_text }}</div>
						<div class="modal__body">
							<form action="#" @submit.prevent="store">
								<div class="form__group" v-for="column in response.updatable" :class="{ 'has__danger': creating.errors[column] }">
									<label :for="column" class="form__label font--bold">{{ response.custom_columns[column] || column.toUpperCase() }}</label>

									<div v-if="response.form_field_type[column] !== 'textarea'">
										<input :type="response.form_field_type[column] === 'textarea' ? 'text' : response.form_field_type[column]  " :id="column" class="form__item" v-model="creating.form[column]">
									</div>
									<div v-else>
										<textarea :id="column" class="form__item" cols="30" rows="6" v-model="creating.form[column]"></textarea>
									</div>

									<span class="form__helper" v-if="creating.errors[column]">
										{{ creating.errors[column][0] }}
									</span>
								</div>
								<div class="form__group text--danger">
									<button type="submit" class="btn btn--primary">Create</button>
								</div>
							</form>
						</div>
						<div class="modal__close background--danger color--white border--danger" @click.prevent="creating.active = !creating.active"></div>
					</div>
				</div>
				<div class="modal__overlay" @click.prevent="creating.active = !creating.active" v-if="creating.active"></div>


				


			</template>

			
				
			<template v-if="response.allow.searchable">
				<div class="panel panel--default" v-if="!creating.active">
					<div class="panel__header"><h2>{{ response.table }}</h2></div>
					<div class="panel__body">
						<div class="row">
							<div class="col"><label for="search" class="form__label">Search</label></div>
						</div>
						<form action="#" @submit.prevent="getRecords">
							<div class="row">
								<div class="md-col-3 form__group">
									<select  class="form__item" v-model="search.column">
										<option :value="column" v-for="column in response.displayable" >{{ column }}</option>
									</select>
								</div>

								<div class="md-col-3 form__group">
									<select class="form__item" v-model="search.operator">
										<option value="equels">Equels</option>
										<option value="contains">Contains</option>
										<option value="starts_with">Starts With</option>
										<option value="ends_with">Ends With</option>
										<option value="greater_than">Greater Than</option>
										<option value="less_than">Less Than</option>
									</select>
								</div>

								<div class="md-col-6 form__group">
									<div class="form__item__group">
										<input class="form__item" type="search" id="search" v-model="search.value">
										<button type="submit" class="btn btn--primary">Search</button>
									</div>
								</div>
							</div>
						</form>
						<div class="row">
							<div class="md-col-10 form__group">
								<label for="filter" class="form__label">Quick search current results</label>
								<input type="text" id="filter" class="form__item" v-model="quickSearchQuery">
							</div>
							<div class="md-col-2 form__group">
								<label for="limit" class="form__label">Display records</label>
								<select name="limit" id="limit" class="form__item" v-model="limit" @change="getRecords">
									<option value="50">50</option>
									<option value="100">100</option>
									<option value="1000">1000</option>
									<option value="">All</option>
								</select>
							</div>
						</div>
					</div>
				</div>    
			</template>

			<div class="panel panel--default">
				<div class="panel__header" v-if="selected.length">
					<a href="#" @click.prevent="destroy(selected)">Delete</a>
				</div>
				<div class="table__responsive">
					<table class="table table--striped table--bordered table--hover">
						<thead class="table__head">
							<tr>
								<th v-if="canSelectItems && response.allow.deletion"> 
									<input 
									:checked="filteredRecords.length === selected.length"
									type="checkbox" 

									@change="toggleSelectAll">
								</th>
								<th v-for="column in response.displayable"> 
									<span class="sortable" @click="sortBy(column)"> {{ response.custom_columns[column] || column.toUpperCase() }}</span>
									<div 
									class="arrow" 
									v-if="sort.key === column"
									:class="{ 'arrow--asc': sort.order === 'asc', 'arrow--desc': sort.order === 'desc'}"
									></div>    
								</th>
								<th>&nbsp;</th>
								<th v-if="response.allow.deletion">&nbsp;</th>
							</tr>
						</thead>
						<tbody class="table__body">
							<tr v-for="records in filteredRecords">
								<td v-if="canSelectItems && response.allow.deletion">
									<input type="checkbox" v-model="selected" :value="records.id">
								</td>
								<td :data-title="column" v-for="columnValue, column in records">
									<template v-if="editing.id === records.id && isUpdatable(column)">
										<div class="from__group" :class="{'has__danger': editing.errors[column] }">
											<input v-model="editing.form[column]" class="form__item"  :type="response.form_field_type[column]" >
											<span class="form__helper" v-if="editing.errors[column]">
												{{ editing.errors[column][0] }}
											</span>
										</div>
									   
									</template>
									<template v-else>
									   {{ columnValue }}
									</template>


								</td>
								<td>
									<a class="btn btn--sm btn--info" href="#" @click.prevent="edit(records)" v-if="editing.id !== records.id"><i class="lunacon lunacon-pencil"></i></a>

									<template v-if="editing.id === records.id">
										<a class="btn btn--sm btn--success" href="#" @click.prevent="update"><i class="lunacon lunacon-download"></i></a> <br>
										<a class="btn btn--sm btn--warning" href="#" @click.prevent="editing.id = null"><i class="lunacon lunacon-close"></i></a>
									</template>
								</td>
								<td v-if="response.allow.deletion"><a  href="#" @click.prevent="destroy(records.id)">Delete</a></td>

							</tr>
						</tbody>
					</table>
				</div>
			</div>

		</div>
	</div>
	 

</template>

<script>
	import queryString from 'query-string'
	import swal from 'sweetalert2'

	export default {
		props: ['endpoint'],
		data () {
			return {
				loaded: false,
				response: {
					table: '',
					displayable: [],
					records: [],
					allow: {},
					errors: [],
					modal_text: '',
					form_field_type: []
				},
				sort: {
					key: 'id',
					order: 'asc'
				},
				limit: "100",
				quickSearchQuery: '',
				editing: {
					id: null,
					form: {},
					errors: []
				},
				creating: {
				  active: false,
				  form: {},
				  errors: []
				},
				search: {
					value: '',
					operator: 'equels',
					column: 'id'
				},
				selected: [],


			}

		},
		computed: {
			filteredRecords() {
			   let data = this.response.records

			   data = data.filter((row) => {
					return Object.keys(row).some((key)=> {

						return String(row[key]).toLowerCase().indexOf(this.quickSearchQuery.toLowerCase()) > -1
					})
			   })

			   if (this.sort.key) {
					data = _.orderBy(data, (i) => {
						let value = i[this.sort.key]
						if (!isNaN(parseFloat(value))){
							return parseFloat(value)
						}
						return String(i[this.sort.key]).toLowerCase()
					}, this.sort.order)
			   }
			   return data
			},
			canSelectItems () {
				return this.filteredRecords.length <= 500
			}
		},
		methods: {
			getRecords () {
				// console.log(this.getQueryParameters());
				return axios.get(`${this.endpoint}?${this.getQueryParameters()}`).then((response) => {
					this.response = response.data.data
					this.loaded = true
				})
			},

			showSwal () {
				swal({
				  title: 'Error!',
				  text: 'Do you want to continue',
				  type: 'error',
				  confirmButtonText: 'Cool'
				})
			},

			getQueryParameters () {
				return queryString.stringify({
					limit: this.limit,
					...this.search
				})
			},

			sortBy (column) {
				this.sort.key = column
				this.sort.order = this.sort.order === 'asc' ? 'desc' : 'asc'
			},

			edit (records) {
				this.editing.errors = []
				this.editing.id = records.id
				this.editing.form = _.pick(records, this.response.updatable)
			   
			},

			isUpdatable (column) {
				return this.response.updatable.includes(column)
			},

			update () {
				axios.patch(`${this.endpoint}/${this.editing.id}`, this.editing.form).then(() => {
					this.getRecords().then(() => {
						this.editing.id = null
						this.editing.form = {}
					})
				}).catch((error) => {
					if (error.response.status === 422) {
						this.editing.errors = error.response.data.errors
					}

				})
			},

			store () {
				axios.post(`${this.endpoint}`, this.creating.form).then(() => {
				  this.getRecords().then(() => {
					this.creating.active = false
					this.creating.form = {}
					this.creating.errors = []
					swal({
					  title: 'Success!',
					  text: 'Successfully created',
					  type: 'success',
					})
				  })
				  
				}).catch((error) => {

				  if (error.response.status === 422) {                
					this.creating.errors = error.response.data.errors
				  }

				})
			},

			destroy (record) {
				
				// if (!window.confirm('Are you sure you want to delete this')) {
				//     return
				// }

				swal({
				  title: 'Are you sure?',
				  text: "Are you sure you want to delete this!",
				  type: 'error',
				  showCancelButton: true,
				  confirmButtonColor: 'teal',
				  cancelButtonColor: '#e07070',
				  confirmButtonText: 'Yes, delete it!'
				}).then((result) => {
				  if (result.value) {
					axios.delete(`${this.endpoint}/${record}`).then(() => {
						this.selected = []
						this.getRecords()
						swal({
							title: 'Deleted!',
							text: "Your file has been deleted.",
							type: 'success',
							showCancelButton: false,
							confirmButtonColor: 'teal',
						})

					})
				  }else{
					return
				  }
				})


			},

			toggleSelectAll () {
				if (this.selected.length > 0) {
					this.selected = []
					return
				}
				this.selected = _.map(this.filteredRecords, 'id')
			}
		},

		mounted() {
			this.getRecords()

			console.log(this.endpoint)
		}
	}
</script>


<style lang="sass">

	.table__responsive
		overflow-x: auto

	.sortable 
		cursor: pointer
		display: inline-block

	.arrow 
		display: inline-block
		vertical-align: middle 
		width: 0
		height: 0
		margin-left: 5px

		&--asc 
			border-bottom: 4px solid #444
			border-left: 4px solid transparent
			border-right: 4px solid transparent

		&--desc 
			border-top: 4px solid #444
			border-left: 4px solid transparent
			border-right: 4px solid transparent

</style>
