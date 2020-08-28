<template>
    <div style="float:left">
        <div class="dropdown-menu">
            <span @click="getCartItems">siemanko</span>
            <span>taki</span>
            <span>teścik</span>
            <div class="dropdown-divider"></div>
            <span>hehe</span>
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
                    '/temporary/cart/items'
                );
                console.log(data);
            }
        }

    }
</script>
