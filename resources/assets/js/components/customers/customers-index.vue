<template>
    <div class="container-fluid">
      <div class="card">
         <div class="card-heading">
             <h1>Клиенти</h1>
             <a class="btn btn-lg btn-success" href="/customers/create">Добави нов клиент</a>
         </div>
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
                          <a @click="deleteCustomer(customer.id)" class="btn btn-danger btn-lg">Изтрий</a>
                          <!--<a :href="'/customers/' + customer.id">Виж</a>-->
                      </div>
                  </td>
              </tr>
              </tbody>
          </table>
      </div>
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
        },
        methods: {

            deleteCustomer(id) {
                // let swal = this.$swal
                this.$swal({
                    title: 'Сигурен ли си, че искаш да го изтриеш?',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Да, изтрий го!'
                }).then((result) => {
                    if (result.value) {
                        axios.delete('/api/customers/' + id)
                            .then(
                                (data) => {
                                    this.$props.customers = this.$props.customers
                                }
                            )
                            .catch(
                                (er) => console.error(er)
                            )

                        const toast = this.$swal.mixin({
                            toast: true,
                            position: 'top-center',
                            showConfirmButton: false,
                            timer: 2000
                        });

                        toast({
                            type: 'success',
                            title: 'Записът беше изтрит успешно!'
                        })

                        // this.$swal(
                        //     'Deleted!',
                        //     'Your file has been deleted.',
                        //     'success'
                        // )
                    }
                });
                // axios.delete('/api/customers/' + id)
                //     .then(
                //         (data) => console.log(data)
                //     )
                //     .catch(
                //         (er) => console.error(er)
                //     )

            }
        }
    }
</script>

<style scoped>

</style>
