<template>
    <b-container fluid>
        <b-card>
            <table class="table table-hover table-stripped">
                <thead>
                <tr>
                    <th>
                        №
                    </th>
                    <th>
                        № оферта
                    </th>
                    <th>
                        От дата
                    </th>
                    <th>
                        Валидност
                    </th>
                    <th>
                        Стаутс
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(offer,key) in this.offers">
                    <td>
                        {{ key + 1 }}
                    </td>
                    <td>
                        {{ offer.offerUID }}
                    </td>
                    <td>
                        {{ offer.validFrom | moment('DD.MM.YYYY')}}
                    </td>
                    <td>
                        {{ offer.validTo | moment('D.MM.YYYY')}}
                    </td>
                    <td>
                        {{ offer.validTo | moment('from','now')}}
                    </td>
                    <td>
                        соон
                    </td>
                    <td>
                        <div class="btn-group">
                            <a :href="'/offers/' + offer.id">Виж</a>
                            <a href="#">Редакция</a>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </b-card>
    </b-container>
</template>

<script>
    export default {
        name: "offers-index",
        props: ['offers']
    }
</script>

<style scoped>

</style>
