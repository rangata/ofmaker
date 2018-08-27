<template>
    <b-container fluid>
        <b-card>
            <b-card-body>
                <table>
                    <thead>
                        <tr>
                            <th>№</th>
                            <th>Наименование</th>
                            <th>Кр. клиентска цена</th>
                            <th>Кол.</th>
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
                                <multiselect v-model="fullProductTitle[key]"
                                             :custome-label="nameWithLang"
                                             :options="products"
                                             @input="filler">

                                </multiselect>
                            </td>
                            <td>
                                <input type="text" v-model="product.end_customer_price" @change="calcTotal(product.id)" class="form-control">
                            </td>
                            <td>
                                <input type="number" v-model="product.qty" @change="calcTotal(product.id)" class="form-control">
                            </td>
                            <td>
                                {{ product.qty * product.end_customer_price }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                            </td>
                            <td>

                                <multiselect v-model="selected"
                                             :custom-label="nameWithLang"
                                             :options="availableProducts"
                                             :reset-after="true"
                                             :selectLabel="'избор'"
                                @input="filler"
                                ></multiselect>

                            </td>
                            <td>
                                <input type="text" class="form-control" v-model="selected.unitPrice">
                            </td>
                            <td>
                                <input type="text" class="form-control" v-model="selected.qty">
                            </td>
                        </tr>
                    <tr>
                        <td>
                           -- {{ total }}
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

        data() {
            return {
                products: [],
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
                selected: '',
                productPrice: '',
                productQty: '',
                sum: ''
            }
        },
        mounted() {
            axios.get('/api/products')
                .then(
                    (data) => {
                         data.data.data.map(i => {

                            this.products.push({
                                id: i.id,
                                label: i.fulltitle,
                                value: i.id,
                                lineTotal: '',
                                qty: 1,
                                unitPrice: (typeof i.price[0] === "undefined") ? '0.00' : i.price[0].unit_price,
                                end_customer_price: (typeof i.price[0] === "undefined") ? '0.00' : i.price[0].end_price

                            })
                             this.availableProducts.push({
                                 id: i.id,
                                 label: i.fulltitle,
                                 value: i.id,
                                 lineTotal: '',
                                 qty: 1,
                                 unitPrice: (typeof i.price[0] === "undefined") ? '0.00' : i.price[0].unit_price,
                                 end_customer_price: (typeof i.price[0] === "undefined") ? '0.00' : i.price[0].end_price
                             })
                        });


                    }
                )
                .catch(
                    (er) => console.log(er)
                )

        },
        methods: {
            nameWithLang({label, end_customer_price}) {
                return `${label}, ${end_customer_price}`
            },

            calcTotal(id) {
                this.products.map((product, key)=> {
                    if(this.products[key].id === id) {
                            this.products[key].lineTotal = this.products[key].qty * this.products[key].end_customer_price

                        console.log(product)
                    }
                    // console.log(this.products[key])
                })
            },
            filler() {
                if(this.products.indexOf(this.selected) === -1) {
                    this.products.push(this.selected);
                } else {
                    this.products[this.products.indexOf(this.selected)].qty +=1;
                    console.log("ER")
                }
                this.selected = '';
            },
            onChange(value){

            }

        },
        computed: {
            total() {
                let sb;
                return this.products.forEach(product => {
                   sb += parseFloat(product.lineTotal)
                    return sb
                });
            },
            fullProductTitle() {
                return this.products.map(function(item) {
                    return item.label;
                });
            }
        }
    }
</script>

<style scoped>

</style>
