<template>
    <b-container fluid>
        <b-card>
            <!--{{ this.offers }}-->
            <b-card-body>
                <!--<b-table :items="this.offers.products" :fields="fields" striped hover>-->

                    <!--<template slot="title" slot-scope="data">-->
                        <!--{{ data.item.title }} {{ data.item.model }}-->
                    <!--</template>-->
                    <!--<template slot="pivot.qty" slot-scope="data">-->
                        <!--{{ data.item.pivot.qty }}-->
                        <!--<input type="text" v-model="data.item.pivot.qty">-->
                    <!--</template>-->

                    <!--<template slot="pivot.unitPrice" slot-scope="data">-->
                        <!--{{ data.item.pivot.unitPrice }}-->
                        <!--<input type="text" v-model="this.offers.title">-->
                    <!--</template>-->

                <!--</b-table>-->
{{ products }}
                <table>
                    <thead>
                        <tr>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(product,key) in products">
                            <td>
                                <input type="text" v-model="product.title" class="form-control">
                            </td>
                            <td>
                                <input type="text" v-model="product.pivot.unitPrice">
                            </td>
                            <td>
                                <input type="text" v-model="product.pivot.qty"  @change="lineTotal(product.id)">
                            </td>
                            <td>
                            </td>
                            <td>
                                {{ product.pivot.qty * product.pivot.unitPrice }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </b-card-body>
        </b-card>
    </b-container>
</template>

<script>
    export default {
        name: "offers-view",
        props: ['offers'],

        data() {
            return {
                products: this.offers.products,
                fields: [
                    'title',
                    {
                        key: 'pivot.qty', label: 'Количество'
                    },
                    {
                        key: 'pivot.unitPrice', label: 'Ед. цена'
                    },
                    {
                        key: 'pivot.endPrice', label: 'Кр.клиентска цена'
                    },

                    {
                        key: 'pivot.lineTotal', label: 'Общо'
                    },
                ]
            }
        },
        methods: {
            lineTotal(id) {

                this.products.map((product, key)=> {
                    if(this.products[key].id === id) {
                        this.products[key].pivot.lineTotal = this.products[key].pivot.qty * this.products[key].pivot.unitPrice
                    }
                    console.log(this.products[key].pivot)
                })


            }
        },
        computed: {

        }
    }
</script>

<style scoped>

</style>
