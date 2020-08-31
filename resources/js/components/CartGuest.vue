<template>
    <div style="float:left">
        <div class="dropdown-menu">
            <div v-for="item in parsedProducts">
                <div>
                    <a v-bind:href="'/product/' + item[0].id"><img v-bind:src="'/storage/' + item[0].image" alt="" class="productImage"></a>
                    <div>
                        <div>{{item[1]}} X {{item[0].name}}</div>
                        <div>{{convertPrice(item[0].price)}} zł</div>
                        <div>{{item[0].short_description}}</div>
                    </div>
                </div>
                <div class="dropdown-divider"></div>
            </div>
        </div>
        <p></p>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },

        methods: {
            async getCartItems() {
                const { data } = await this.$http.get(
                    '/temporary/cart/items?guest=true'
                );
                console.log(data);
            }, convertPrice(price){
                return price / 100;
            }
        ,


        },
        name: 'CartGuest',
        props:['products'],
        data: function () {
            return{
                parsedProducts: JSON.parse(this.products),
            }
        }

    }
</script>
<style>
    .productImage{
        padding: 1em;
    }
</style>
