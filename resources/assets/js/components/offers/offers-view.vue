<template>
    <b-container fluid>
        <b-card>
            {{ this.offers }}
            <b-card-body>
                <table>
                    <thead>
                        <tr>
                            <th>№</th>
                            <th>Наименование</th>
                            <th>Ед. цена с ДДС</th>
                            <th>Кр. клиентска цена</th>
                            <th>Общо</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(product,key) in products">
                            <td>
                                {{ key + 1}}
                            </td>
                            <td width="800">
                                <!--{{ fullProductTitle[key] }}-->

                                <input type="text" v-model="fullProductTitle[key]" value="sd" class="form-control">
                            </td>
                            <td>
                                <input type="text" v-model="product.pivot.unitPrice" @change="lineTotal(product.id)" class="form-control">
                            </td>
                            <td>
                                <input type="number" v-model="product.pivot.qty" @change="lineTotal(product.id)" class="form-control">
                            </td>
                            <td>
                                {{ product.pivot.qty * product.pivot.unitPrice }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                            </td>
                            <td>
                                {{ availableProducts }}
                                <Select2 v-model="myValue"
                                         :options="availableProducts"

                                         @change="myChangeEvent($event)"
                                         @select="mySelectEvent($event)" />


                            </td>
                            <td>
                                <input type="text" class="form-control">
                            </td>
                            <td>
                                <input type="text" class="form-control">
                            </td>
                        </tr>
                    <tr>
                        <td>
                            {{ total }}
                        </td>
                    </tr>
                    </tbody>
                </table>
            </b-card-body>
        </b-card>
    </b-container>
</template>

<script>
    import Select2 from 'v-select2-component';

    export default {
        name: "offers-view",
        props: ['offers'],
        components: {Select2},


        data() {
            return {
                products: this.offers.products,
                // fields: [
                //     'title',
                //     {
                //         key: 'pivot.qty', label: 'Количество'
                //     },
                //     {
                //         key: 'pivot.unitPrice', label: 'Ед. цена'
                //     },
                //     {
                //         key: 'pivot.endPrice', label: 'Кр.клиентска цена'
                //     },
                //
                //     {
                //         key: 'pivot.lineTotal', label: 'Общо'
                //     },
                // ],
                availableProducts: [],
                pk: [],
                myValue: '',
                myOptions: [{
                    a: 'bb',
                    c: 'sdfs'
                }, 'op2', 'op3'] // or [{id: key, text: value}, {id: key, text: value}]
            }
        },
        mounted() {
            axios.get('/api/products')
                .then(
                    (data) => {
                        // this.availableProducts = data.data.data
                        const products = Object.keys(data.data.data).map(i =>{
                            this.availableProducts.push(data.data.data[i])
                        })

                    }
                )
                .catch(
                    (er) => console.log(er)
                )
        },
        methods: {
            lineTotal(id) {

                this.products.map((product, key)=> {
                    if(this.products[key].id === id) {
                        this.products[key].pivot.lineTotal = this.products[key].pivot.qty * this.products[key].pivot.unitPrice
                    }
                    console.log(this.products[key].pivot)
                })
            },
            lop(to) {
                console.log(to)
            },
            myChangeEvent(val){
                console.log("change,",val);
            },
            mySelectEvent({id, text}){
                console.log({id, text})
            }

        },
        computed: {
            total() {
                let sb;
                return this.products.forEach(product => {
                   return sb += parseFloat(product.pivot.lineTotal)
                });
            },
            fullProductTitle() {
                return this.products.map(function(item) {
                    return item.title + ' ' + item.model;
                });
            }
        }
    }
</script>

<style scoped>

</style>
