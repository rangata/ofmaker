<template>
    <div class="container-fluid">
        <h1>Клиенти</h1>
        <!--<ejs-grid :dataSource="customersData"-->
                  <!--:allowSorting="true"-->
                  <!--:allowFiltering="true"-->
                  <!--:allowPaging="true"-->
                  <!--:pageSettings='pageSettings'>-->
            <!--<e-columns>-->
                <!--<e-column field='firstname' headerText='Име' ></e-column>-->
                <!--<e-column field='middlename' headerText='Презиме' ></e-column>-->
                <!--<e-column field='lastname' headerText='Фамилия' ></e-column>-->
                <!--<e-column field='mobile' headerText='Мобилен'></e-column>-->
                <!--<e-column field='email' headerText='Емайл'></e-column>-->
            <!--</e-columns>-->
        <!--</ejs-grid>-->
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>
                        №
                    </th>
                    <th>
                        Име и Фамилия
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(customer, key) in customers">
                    <td>
                        {{ key +1 }}
                    </td>
                    <td>
                        {{ customer.firstname }} {{ customer.lastname }}
                    </td>
                    <td>
                        <div class="btn-group">
                            <a :href="'/customers/' + customer.id" class="btn btn-primary">Виж</a>
                            <a :href="'/customers/' + customer.id + '/edit'" class="btn btn-primary">Редактирай</a>
                            <!--<a :href="'/customers/' + customer.id">Виж</a>-->
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    import { GridPlugin, Filter, Group, Sort, Page } from '@syncfusion/ej2-vue-grids'

    export default {
        name: "customers-index",
        props: ['customers'],
        provide: {
            grid: [Group, Sort,Filter, Page]
        },
        data(){
            return  {
                customersData: this.$props.customers,
                pageSettings: {
                    pageSize: 10
                }
            }
        },
        mounted(){
            console.log(this.$props)
        }
    }
</script>

<style scoped>

</style>
