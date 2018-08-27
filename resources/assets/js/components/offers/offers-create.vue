<template>
    <b-container fluid>
        <b-card>
            <b-card-body>
                <form-wizard title="Създаване на нова клиентска оферта"
                             subtitle=""
                             stepSize="lg"
                             :startIndex="1"
                             nextButtonText="Напред"
                             backButtonText="Назад"
                             shape="square"
                >
                    <tab-content title="Основна информация">
                            <b-container fluid>
                                <b-row>
                                    <b-col>
                                        <button class="btn btn-success btn-block btn-lg">
                                            <h1>
                                                <i class="fas fa-user-plus"></i>
                                                Създаване на НОВ клиент
                                            </h1>
                                        </button>
                                    </b-col>
                                    <b-col>
                                        <!--<div>-->
                                            <b-container v-if="this.customerIsSelected">
                                               <b-card>
                                                 <b-card-body>
                                                     {{ this.selectedCustomer.fullname}}
                                                 </b-card-body>
                                               </b-card>
                                            </b-container>
                                            <b-button @click="showModal" v-if="!this.customerIsSelected" class="btn-block btn-lg">
                                                <h1>
                                                    <i class="fas fa-users"></i> Избери от списъка
                                                </h1>
                                            </b-button>

                                            <b-btn v-if="this.customerIsSelected"
                                                   @click="clearCustomer(customer)"
                                                   class="lg-3"
                                                   variant="outline-danger" block>
                                                Изчисти и избери наново друг клиент
                                            </b-btn>

                                            <b-modal ref="myModalRef" hide-footer size="lg">
                                                <div class="title" slot="modal-title">
                                                    <h1>Избор на клиент за оферта</h1>
                                                </div>
                                                <div class="d-block text-center">
                                                    <b-list-group>
                                                        <b-list-group-item v-for="customer in customers" :key="customer.id">
                                                            {{ customer.fullname }}
                                                            <b-btn @click="selectCustomer(customer)">zib</b-btn>
                                                            <br>
                                                        </b-list-group-item>
                                                    </b-list-group>
                                                    --
                                                    {{ meta.total }}
                                                    {{meta.current_page }}
                                                    <b-pagination size="lg" :total-rows="meta.total"
                                                                  v-model="current_page"
                                                                  :per-page="meta.per_page"
                                                                  @change="logPage">

                                                    </b-pagination>

                                                </div>
                                                <b-btn class="mt-3" variant="outline-danger" block @click="hideModal">Затвори</b-btn>
                                            </b-modal>
                                        <!--</div>-->
                                    </b-col>
                                </b-row>

                            </b-container>
                    </tab-content>
                    <tab-content title="Избор на шаблон за оферта">
                        <b-container fluid>
                            <pre>
                                <!--{{ offerBoilerplate }}-->
                                {{ validity }}
                            </pre>
                            <b-form>

                               <b-row>
                                   <b-col>
                                       <fieldset>
                                           <legend>
                                               Детйли
                                           </legend>
                                           <div class="form-group">
                                               <input type="checkbox" v-model="offerBoilerplate.includeImages" id="incI" style="transform: scale(1.5);">
                                               <label for="incI">Постави снимки на всеки продукт, където има такива!</label>
                                           </div>

                                           <div class="form-group">
                                               <input type="checkbox" v-model="offerBoilerplate.withVAT" id="incVAT" style="transform: scale(1.5);">
                                               <label for="incVAT">Всички цени ще ги въвеждам с ДДС!</label>
                                           </div>

                                           <div class="form-group">
                                               <input type="checkbox" v-model="offerBoilerplate.includeFullSpec" id="includeFullSpec" style="transform: scale(1.5);">
                                               <label for="includeFullSpec">В офертата искам да има пълна спецификация на всяко едно изделие.</label>
                                           </div>

                                       </fieldset>
                                   </b-col>
                                   <b-col>
                                       <b-col>
                                           <fieldset>
                                               <legend>
                                                   Допълнителни колони
                                               </legend>
                                               <div class="form-group">
                                                   <input type="checkbox" v-model="offerBoilerplate.includeColumns.regularPrice" id="regularPrice" style="transform: scale(1.5);">
                                                   <label for="regularPrice">Включи колона цена по оферта</label>
                                               </div>

                                               <div class="form-group">
                                                   <input type="checkbox" v-model="offerBoilerplate.includeColumns.specialPrice" id="specialPrice" style="transform: scale(1.5);">
                                                   <label for="specialPrice">Включи колона <span style="color: forestgreen"><strong>СПЕЦИАЛНА ЦЕНА!</strong></span></label>
                                               </div>
                                           </fieldset>
                                       </b-col>
                                   </b-col>
                               </b-row>
                                <b-form-group label="Начин на плащане" label-for="paymentMethods">

                                    <b-form-select id="paymentMethods"
                                                   :options="paymentMethods"
                                                   size="lg"
                                                   v-model="paymentMethod">

                                    </b-form-select>
                                </b-form-group>
                                {{ paymentMethod }}<br>
                                <div class="fop" v-if="paymentMethod === 'Разсрочено'">
                                    <h3>Как ще се разберем?</h3>
                                    <b-form-group label="Radios using sub-components">
                                        <b-form-radio-group id="radios2" v-model="selected" name="radioSubComponent">
                                            <b-form-radio value="first">Toggle this custom radio</b-form-radio>
                                            <b-form-radio value="second">Or toggle this other custom radio</b-form-radio>
                                            <b-form-radio value="third" disabled>This one is Disabled</b-form-radio>
                                            <b-form-radio :value="{fourth: 4}">This is the 4th radio</b-form-radio>
                                        </b-form-radio-group>
                                    </b-form-group>
                                </div>

                                <b-form-group label="Валидност на тази оферта(** в месеци **)" label-for="validity">

                                    <b-form-select id="validity"
                                                   :options="validityPeriods"
                                                   size="lg"
                                                   v-model="period">

                                    </b-form-select>

                                    {{period}} <br>
                                </b-form-group>

                                <b-form-group label="form">
                                    <datepicker :value="nowDate"
                                                :format="customDate"
                                                :bootstrap-styling="true"
                                                :clear-button="true"
                                                size="lg"
                                                @input="validity(validFrom)"
                                                v-model="validFrom">

                                    </datepicker>
                                  {{ validUntil }}
                                </b-form-group>
                            </b-form>
                        </b-container>

                    </tab-content>

                    <tab-content title="Основно оборудване">
                        <b-container fluid>
                            <h1>
                                Избор на основно оборудване
                            </h1>
                            <products-basic></products-basic>
                        </b-container>
                    </tab-content>
                    <tab-content title="Допълнително оборудване">
                        <b-container fluid>
                            <h1>
                                Избор на основно оборудване
                            </h1>
                            <products-basic></products-basic>
                        </b-container>
                    </tab-content>
                    <tab-content title="Начин на плащане и валидност на оферта">
                        <b-form-group>

                            <b-form>
                                <b-form-input type="text">

                                </b-form-input>
                            </b-form>

                        </b-form-group>
                    </tab-content>
                </form-wizard>
            </b-card-body>
        </b-card>
    </b-container>
</template>

<script>
    import Vue from 'vue';
    import {FormWizard, TabContent} from 'vue-form-wizard'
    import 'vue-form-wizard/dist/vue-form-wizard.min.css'

    var moment = require('moment');

    import Datepicker from 'vuejs-datepicker'

    export default {
        name: "offers-create",

        data() {
            return {
                customers: {},
                meta: [],
                current_page: 1,
                from: 1,
                last_page: 1,
                next_page_url: null,
                per_page: 10,
                prev_page_url: null,
                to: 1,
                total: 0,
                links: [],
                selectedCustomer: {},
                customerIsSelected: false,
                paymentMethod: '',
                paymentMethods: ['Авансово 100 % при подписване на договор за покупко-продажба',
                    '50% при подписване на договора, а останалите 50 % при монтаж',
                    'Разсрочено'
                ],
                selected: 'first',
                options: [
                    {text: 'Toggle this custom radio', value: 'first'},
                    {text: 'Or toggle this other custom radio', value: 'second'},
                    {text: 'This one is Disabled', value: 'third', disabled: true},
                    {text: 'This is the 4th radio', value: {fourth: 4}}
                ],
                period: '1',
                offerBoilerplate: {
                    includeImages: false,
                    withVAT: true,
                    includeFullSpec: false,
                    includeColumns: {
                        regularPrice: true,
                        specialPrice: false,

                    }
                },
                validityPeriods: [
                    {
                        text: '1 месец(30 дни)',
                        value: 30
                    },
                    {
                        text: '2 месеца(60 дни)',
                        value: 60
                    },
                    {
                        text: '3 месеца(90 дни)',
                        value: 90
                    },
                ],
                validFrom: '',
                nowDate: moment().format("DD.MM.YYYY"),
                validUntil: ''


            };
        },
        components: {
            FormWizard,
            TabContent,
            Datepicker,
        },
        mounted() {
            this.getCustomers();
            // var dt = Date.now();
            console.log()
        },
        methods: {

            customDate(date) {

                return moment(date).format("DD.MM.YYYY");

            },
            clearCustomer() {
                this.selectedCustomer = {};
                this.customerIsSelected = false
            },
            selectCustomer(customer) {
                this.selectedCustomer = customer;
                this.customerIsSelected = true
            },
            logPage() {
                this.getCustomers(this.current_page);
            },
            getCustomers(page) {

                axios.get('/api/customers?page=' + page)
                    .then(
                        (data) => {
                            this.customers = data.data.data
                            this.meta = data.data.meta
                            this.links = data.data.links

                        }
                    )
                    .catch()

            },
            showModal () {
                this.$refs.myModalRef.show()
            },
            hideModal () {
                this.$refs.myModalRef.hide()
            },
            validity(date) {

                this.validUntil = moment(date).add(30, 'days').format("DD.MM.YYYY")
                console.log(this.validUntil)
            }
        },
        computed: {

        }
    }
</script>

<style scoped>

</style>
