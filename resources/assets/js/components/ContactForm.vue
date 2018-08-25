<template>

	<div v-if="!alertSuccess">

		<form @submit.prevent="sendform"  method="post" >
			<div class="notify notify--warning-light">
				<span class="form__helper">The <strong class="text--danger">*</strong> indicate required fields</span>
			</div>
			<div class="form__group" :class="errors.agent ? 'has__danger' : ''">
				<label for="agent" class="form__label">Sales Agent <strong class="text--danger">*</strong></label>
				<select name="agent" id="agent" class="form__item" v-model="form.agent">
					<option selected="selected" value="">Select Your Sales Agent</option>
					<option  v-for="(i, key) in response" :value="i.email">{{ i.area }} - {{ i.name }} </option>
				</select>
				<strong v-if="errors.agent" class="form__helper">
				    {{ errors.agent[0] }}
				</strong>
			</div>

			<div v-if="hasProduct">
				<div class="form__group">
					<label for="product" class="form__label">Product Name</label>
					<input type="text" name="product" id="product" disabled :value="product" class="form__item">
				</div>
			</div>

			<div class="form__group" :class="errors.subject ? 'has__danger' : ''">
				<label for="subject" class="form__label">Subject <strong class="text--danger">*</strong></label>
				<input type="text" name="subject" id="subject" v-model="form.subject" class="form__item" >
				<strong v-if="errors.subject" class="form__helper">
				    {{ errors.subject[0] }}
				</strong>
			</div>
			<div class="row">
				<div class="form__group md-col-6" :class="errors.name ? 'has__danger' : ''">
					<label for="name" class="form__label">Name <strong class="text--danger">*</strong></label>
					<input type="text" name="name" id="name" v-model="form.name" class="form__item" >
					<strong v-if="errors.name" class="form__helper">
					    {{ errors.name[0] }}
					</strong>
				</div>
				<div class="form__group md-col-6" :class="errors.email ? 'has__danger' : ''">
					<label for="email" class="form__label">Email <strong class="text--danger">*</strong></label>
					<input type="text" name="email" id="email" v-model="form.email" class="form__item" >
					<strong v-if="errors.email" class="form__helper">
					    {{ errors.email[0] }}
					</strong>
				</div>				
			</div>
			<div class="form__group" :class="errors.phone ? 'has__danger' : ''">
				<label for="phone" class="form__label">Phone <strong class="text--danger">*</strong></label>
				<input type="text" name="phone" id="phone" v-model="form.phone" class="form__item">
				<strong v-if="errors.phone" class="form__helper">
				    {{ errors.phone[0] }}
				</strong>
			</div>
			<div class="form__group" :class="errors.message_body ? 'has__danger' : ''">
				<label for="message_body" class="form__label">Message  <strong class="text--danger">*</strong></label>
				<textarea name="message_body" id="message_body" cols="30" rows="8" class="form__item" v-model="form.message_body" ></textarea>
				<strong v-if="errors.message_body" class="form__helper">
				    {{ errors.message_body[0] }}
				</strong>
				<strong v-else class="form__helper">
					Message form supports <em>Markdown</em> <b class="text--danger">😠</b>
				</strong>
			</div>
			<div class="form__group">
				<button v-if="!working" type="submit" class="btn btn--primary">SEND MAIL</button>
				<button v-else type="submit" disabled class="btn btn--primary">SEND MAIL <i class="btn__icon--right lunacon lunacon-settings-tool lunacon-spin-animation"></i></button>
			</div>
		</form>
	</div>
	<div v-else>
		<div class="modal__overlay">
			<div class="modal background--success text--white font--bold text-align-center">
				<div @click.prevent="alertSuccess = !alertSuccess" class="modal__close background--success">
					<i class="lunacon lunacon-close-small"></i>
				</div>
				<div class="modal__body">
					<h2>Successfully send email</h2>
				</div>
			</div>
		</div>
	</div>
</template>


<script>
	export default {

		props: {
			posturl: {
				type: String
			},
			clienturl: {
				type: String
			},
			product: {
				type: String,
				required: false,
				default: null
			}
		},
		data(){
			return {
				working: false,
				response: '',
				errors: {},
				form: {
					subject: '',
					name: '',
					agent: '',
					email: '',
					phone: '',
					message_body: '',
					product: this.product
				},
				alertSuccess: false,
			}
		},
		computed: {

			hasProduct() {
				return this.product !== null ? true : false
			}


		},
		methods: {
			sendform() {
				this.errors = ''
				this.working = true
				axios.post(this.posturl, this.form).then((response) => {

					this.form = {}
					this.errors = {}
					this.alertSuccess = true 
					setTimeout(() => {
						this.alertSuccess = false
					}, 10000)
					this.working = false

				}).catch((error) => {
                    if (error.response.status === 422) {
                        this.errors = error.response.data.errors
                    }
                         this.working = false
                })
				
			}
		},
		mounted() {
			return axios.get(this.clienturl).then((response) => {
				this.response = response.data.data
			}) 

		}

	}

</script>

<style lang="sass" scoped>
	
	.modal 
		display: block	

		&__body 
			padding: 80px 15px

	option
		background: #eee 
		padding-top: 10px !important

	label.form__label 
		font-weight: bold

</style>
