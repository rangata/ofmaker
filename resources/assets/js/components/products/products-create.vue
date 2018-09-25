<template>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h1>Създаване на продукт</h1>
                <form novalidate v-on:submit.prevent="saveProduct(product)">
                   <b-row>
                       <b-col>
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
                               <label for="model">Категория</label>
                               <input type="text" id="category" v-model.trim="$v.product.category.$model" class="form-control">
                               <div class="" v-if="!$v.product.category.required">Полето е задължително </div>
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
                       </b-col>
                       <b-col>
                           <div>
                               <h3>Атрибути на продукта:</h3>
                               <b-btn @click="show=true" variant="primary" class="btn-lg btn-block">Добавяне на атрибут</b-btn>
                               <b-modal v-model="show"
                                        size="lg"
                                        centered
                                        title="Добавяне на нов атрибут"
                                        header-bg-variant="primary"
                                        header-text-variant="white"
                                        body-bg-variant="light"
                                        body-text-variant="dark"
                                        footer-bg-variant="dark"
                                        footer-text-variant="white">
                                   <b-container fluid>
                                       <b-row class="lg-1">
                                            <b-col>
                                                <label for="optionTitlea">Наименование</label>
                                                <input type="text"
                                                       id="optionTitlea"
                                                       class="form-control form-control-lg"
                                                       placeholder="Наименование"
                                                       v-model="productOption.optionTitle">
                                            </b-col>
                                           <b-col>
                                               <label for="optionDisplayTextz">Стойност</label>
                                               <input type="text"
                                                      id="optionDisplayTextz"
                                                      class="form-control form-control-lg"
                                                      placeholder="Дисплей"
                                                      v-model="productOption.optionValue">
                                           </b-col>
                                       </b-row>
                                   </b-container>
                                   <div slot="modal-footer" class="w-100">
                                       <div class="btn-group">
                                           <b-btn size="sm" class="float-right" variant="primary" @click="incCnt(productOption)">
                                               Добави и затвори
                                           </b-btn>
                                           <b-btn size="sm" class="float-right" variant="danger" @click="show=false">
                                               Откажи
                                           </b-btn>
                                       </div>
                                   </div>
                               </b-modal>
                           </div>

                           <div v-for="option in options">
                               {{ option }}
                               <!--<label for="optionTitle">Наименование</label>-->
                               <!--<input type="text"-->
                                      <!--id="optionTitle"-->
                                      <!--class="form-control form-control-lg"-->
                                      <!--placeholder="Наименование"-->
                                      <!--v-model="option.optionTitle">-->
                           </div>
                           <!--<button @click="incCnt(option)" class="btn btn-primary btn-lg btn-block">Добави атрибут</button>-->
                       </b-col>
                   </b-row>
                    <br>
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
                    category: '',
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
                    category: '',
                    price: {
                        unit_price: 0.00,
                        end_customer_price: 0.00,
                        max_discount: 0.00,
                    },
                    options: [],
                    product_id: ''
                },


                // modal settings
                show: false,
                productOption: {
                    optionTitle: '',
                    optionValue: '',
                    optionDisplayText: ''
                }
            }
        },
        methods: {
            incCnt(option) {
                this.options.push(option)
                this.show=false
                this.productOption = {
                    optionTitle: '',
                    optionValue: '',
                    optionDisplayText: ''
                }
            },
            saveProduct(product) {
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
                category: {
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
            option: {
                optionTitle:{
                    required
                }
            }
        }
    }
</script>

<style scoped>

</style>
