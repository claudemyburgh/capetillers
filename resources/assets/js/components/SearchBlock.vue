<template>

	<div id="searchBlock" class="search__block">
		<div class="wrapper">
			<div class="row">
				<div class="col">
					<img class="algolia" src="/img/search.svg" alt="Algolia Search">
					<form @submit.prevent="send">					
						<div class="form__group ">
							<input autofocus type="text" id="products" class="form__item form__item--xl" placeholder="SEARCH">
							<a href="#" class="btn btn--mute searchTrigger"> <i class="lunacon lunacon-close-small"></i> </a>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>

</template>

<script>

	import {productsautocomplete} from '../helpers/autocomplete.js'

    export default {
        props: [
            'appurl'
        ],
    	data() {
    		return {

    		}
    	},
    	methods: {
    		send() {
    			
    		}

    	},
        mounted() {
        	productsautocomplete('#products', {
        		hitsPerPage: 10,
        		appurl: this.appurl
        	})
            
        }
    }
</script>


<style scoped lang="sass">
	.form__group
		display: flex
		box-shadow: rgba(#000, 0.15) 0px 3px 8px
		margin-bottom: 0
		padding: 0
		text-transform: uppercase
		input.form__item
			margin-bottom: 0
			padding: 30px
			text-transform: uppercase
			font-weight: 700
		button.btn,
		.btn
			padding: 10px 20px 
			line-height: 38px
			min-width: auto
			text-overflow: unset
	
	.algolia
		height: 20px
		max-width: 100%
		margin-left: 10px

</style>
