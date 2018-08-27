<template>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h1>Продукти</h1>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">№</th>
                        <th scope="col">Наименование на изделието</th>
                        <th scope="col">Доставна цена</th>
                        <th scope="col">Продажна цена</th>
                        <th scope="col">% макс</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(product, key) in products">
                        <td>
                            {{ key + 1}}
                        </td>
                        <td>
                            {{ product.fulltitle }}
                        </td>
                        <td>
                            {{ product.price[0].unit_price }}
                        </td>
                        <td>
                            {{ product.price[0].end_price }}
                        </td>
                        <td>
                            {{ product.price[0].discount }} %
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "products-index",
        data() {
            return {
                products: []
            }
        },
        mounted() {
            axios.get('/api/products')
                .then(
                    (data) => {
                        this.products = data.data.data
                    }
                )
                .catch()
        }
    }
</script>

<style scoped>

</style>
