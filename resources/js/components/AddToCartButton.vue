<template>
    <div>
        <button class="addToCart h-25 btn btn-light" @click="addToCart">ADD TO CART</button>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },

        methods: {
            addToCart() {
                alert('test');
            }
    }

    }
</script>
