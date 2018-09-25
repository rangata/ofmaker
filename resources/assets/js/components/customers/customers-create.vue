<template>
    <b-container fluid>
            <b-card>
                <b-card-body>
                    <b-form>

                        <b-form-group label="Име на клиента" label-for="customer.firstname">
                            <b-form-input v-model="customer.firstname">

                            </b-form-input>
                        </b-form-group>


                        <b-form-group label="Презиме" label-for="customer.middlename">
                            <b-form-input v-model="customer.middlename">
                            </b-form-input>
                        </b-form-group>

                        <b-form-group label="Фамилия" label-for="customer.lastname">
                            <b-form-input v-model="customer.lastname">
                            </b-form-input>
                        </b-form-group>

                        <b-form-group label="Email" label-for="customer.email">
                            <b-form-input v-model="customer.email">
                            </b-form-input>
                        </b-form-group>

                        <b-form-group label="Мобилен телефон" label-for="customer.mobile">
                            <b-form-input v-model="customer.mobile">
                            </b-form-input>
                        </b-form-group>

                        <b-form-group label="Град" label-for="customer.city">
                            <b-form-input v-model="customer.city">
                            </b-form-input>
                        </b-form-group>
                        <b-btn @click="saveCustomer()">Запази</b-btn>

                    </b-form>
                </b-card-body>
            </b-card>
    </b-container>
</template>

<script>
    import {required} from 'vuelidate/lib/validators';

    export default {
        name: "customers-create",
        data() {
            return {
                customer: {
                    firstname: '',
                    middlename: '',
                    lastname: '',
                    mobile: '',
                    email: '',
                    city: ''
                }
            }
        },
        methods: {
            saveCustomer() {
                axios.post('/api/customers', this.customer)
                    .then(
                        (data) => {
                            console.log(data)
                            if(data.status === 200) {
                                this.$swal('Klienta')
                                window.location.href = '/customers'
                            }
                        }
                    )
                    .catch(
                        (er) => {
                            console.log(er.request)
                        }
                    )
            }
        }
    }
</script>

<style scoped>

</style>
