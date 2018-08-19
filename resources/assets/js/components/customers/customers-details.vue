<template>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h1>{{ custDetails.firstname }} {{ custDetails.lastname }}</h1>
            </div>
            <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
            <b-card no-body bg-variant="light">
                <b-tabs card>
                    <b-tab title="Оферти" active>
                        <offers-index :offers="custDetails.offers"></offers-index>
                    </b-tab>
                    <b-tab title="Неприключили оферти">
                        Tab Contents 2
                    </b-tab>
                </b-tabs>
            </b-card>

        </div>
    </div>
</template>

<script>
    export default {
        name: "customer-details",
        props: ['customer'],
        data() {
            return {
                custDetails: this.$props.customer
            }
        },
        mounted() {
            console.log(this.$props)
        }
    }
</script>

<style scoped>

</style>
