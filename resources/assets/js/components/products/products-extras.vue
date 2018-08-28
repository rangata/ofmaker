<template>
    <b-container>
        <!--<b-card-group deck>-->
            <!--<b-card v-for="product in basicProducts"-->
                    <!--:key="product.id"-->
                    <!--:bg-variant="selectedProducts.indexOf(product) !== -1 ? 'success' : ''">-->
                <!--<div class="do">-->
                    <!--<h4>-->
                        <!--{{ product.fulltitle }}-->

                    <!--</h4>-->
                <!--</div>-->
                <!--<b-card-body>-->
                    <!--<b-card-img src="http://192.168.10.10/images/Capture.PNG">-->

                    <!--</b-card-img>-->
                    <!--<span>-->
                        <!--{{ product.price[0].unit_price }}-->
                    <!--</span>-->

                    <!--<span>-->
                        <!--{{ product.price[0].end_price }}-->
                    <!--</span>-->
                <!--</b-card-body>-->

                <!--<div class="volp" slot="footer">-->
                    <!--<b-button-group>-->
                        <!--<b-button variant="success" class="btn-block"-->
                                  <!--v-if="selectedProducts.indexOf(product) === -1"-->
                                  <!--@click="addProduct(product)">-->
                                  <!--<i class="fa fa-plus"> </i> Добави-->
                        <!--</b-button>-->
                        <!--<b-button variant="danger" v-if="selectedProducts.indexOf(product) !== -1" class="btn-block" @click="removeProduct(product)">-->
                            <!--<i class="fa fa-minus"> </i> Премахни</b-button>-->
                    <!--</b-button-group>-->
                <!--</div>-->
            <!--</b-card>-->
        <!--</b-card-group>-->
        <!--{{ selectedProducts }}-->
        {{ extras }}
    </b-container>
</template>

<script>
    export default {

        name: "products-extras",
        data() {
            return {
                extras: [],
                selectedProducts: []
            }
        },
        mounted() {
            axios.get('/api/products')
                .then(
                    (data) => {
                        data.data.data.filter((product,key) => {
                            if (product.type !== "Основен продукт") {
                                this.extras.push(product)
                            }
                        })
                    }
                )
                .catch()
        },
        methods: {
            removeProduct(product) {

                if(this.selectedProducts.indexOf(product) !== -1) {
                    this.selectedProducts.splice(this.selectedProducts.indexOf(product))
                } else {
                    console.log("Veche go ima")
                }

            },
            addProduct(product) {

                if(this.selectedProducts.indexOf(product) === -1) {
                    this.selectedProducts.push(product)
                } else {
                    console.log("Veche go ima")
                }

            }
        }
    }
</script>

<style scoped>


</style>
