<template>

		<div class="panel panel--default">
			<div class="panel__header">
				{{ this.title }}
			</div>
			<div v-if="loading" class="panel__body">
				<div class="loader" id="loader-1"></div>
			</div>
			<div class="panel__footer">
				<button @click.prevent="runtask" id="db-clean" v-bind:disabled="disabled"  class="btn btn--block"  :class="this.btn">RUN TASK</button>
			</div>
		</div>

	

</template>

<script>
import swal from 'sweetalert2'
	export default {
		props: [
			'url',
			'title', 
			'btn'
		],
		data () 
		{
			return {
				disabled: false,
				loading: false
			}
		},
		methods: {

			runtask() {
				this.disabled = true
				this.loading = true
				axios.post(this.url).then( () => {
					this.disabled = false
					this.loading = false
				}).catch((error) => {
					this.disabled = false
					this.loading = false
					swal({
						title: 'ERROR!!',
						text: "Someting went wrong",
						type: 'error',
						showCancelButton: false
					})
				})

			}



		},
		mounted() {
			
		}
	}
</script>
