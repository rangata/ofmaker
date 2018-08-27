<template>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h1>Създаване на продукт</h1>
                <form novalidate v-on:submit.prevent="saveProduct(product)">
                    <div class="form-group">
                        <label for="title">Наименование</label>
                        <input type="text" id="title" v-model.trim="$v.product.title.$model" class="form-control">
                        <div class="" v-if="!$v.product.title.required">Полето е задължително </div>
                    </div>
                    <div class="form-group">
                        <label for="model">Модел</label>
                        <input type="text" id="model" v-model.trim="$v.product.model.$model" class="form-control">
                        <div class="" v-if="!$v.product.model.required">Полето е задължително </div>
                    </div>
                    <div class="form-group">
                        <label for="title">Тип</label>
                        <multiselect v-model.trim="$v.product.type.$model" :options="['Основен продукт','Вторичен/периферия']">
                        </multiselect>

                        <div class="" v-if="!$v.product.type.required">Полето е задължително </div>
                    </div>


                    <div class="form-group">
                        <label for="model">Дост. цена</label>
                        <input type="text" id="unitPrice" v-model.trim="$v.product.price.unit_price.$model" class="form-control">
                        <!--<div class="" v-if="!$v.product.price.unit_price.required">Полето е задължително </div>-->
                    </div>


                    <div class="form-group">
                        <label for="end_customer_price">end_customer_price</label>
                        <input type="text" id="end_customer_price" v-model.trim="$v.product.price.end_customer_price.$model" class="form-control">
                        <!--<div class="" v-if="!$v.product.price.end_customer_price.required">Полето е задължително </div>-->
                    </div>
                    <button type="submit" :disabled="$v.$invalid" class="btn btn-primary btn-lg btn-block">Създай</button>
                </form>

            </div>
        </div>
    </div>
</template>

<script>
    import { required, minLength, between } from 'vuelidate/lib/validators'
    import Multiselect from 'vue-multiselect';

    export default {
        name: "products-create",
        data() {
            return {
                defaultProduct: {
                title: '',
                    model: '',
                    type: '',
                    price: {
                    unit_price: 0.00,
                        end_customer_price: 0.00,
                        max_discount: 0.00,
                },
                product_id: ''
            },
                product: {
                    title: '',
                    model: '',
                    type: '',
                    price: {
                        unit_price: 0.00,
                        end_customer_price: 0.00,
                        max_discount: 0.00,
                    },
                    product_id: ''
                }
            }
        },
        methods: {
            saveProduct(product) {
// console.log(product)
                if(!this.$v.$invalid) {

                    axios.post('/api/products', { product })
                        .then(
                            (data) => {
                                console.log(data)
                            }
                        )
                        .catch(
                            (er) => console.error(er)
                        )
                        .finally(
                            this.product.text =''
                        )
                }

                // this.$swal("ok");ok
            }

        },
        validations: {
            product: {
                title: {
                    required,
                },
                model: {
                    required
                },
                type: {
                    required
                },
                price: {
                    unit_price: {
                        required
                    },
                    end_customer_price: {
                        required
                    },
                }
            },
        }
    }
</script>

<style scoped>

</style>
