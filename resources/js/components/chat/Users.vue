<template>
    <div class="users">

<div class="users__header">
    1 user Online
</div>

<div class="users__user">
    <a href="#"> Auser </a>
</div>

    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Users mounted.')
        }
    }
</script>


<style lang="scss">
    .users{
        background-color: #fff ;
        border: 1px solid #d3e0e9;
        border-radius: 3px;

        &__header{
            padding: 15px;
            font-weight: 800;
            margin: 0;

        }


        &__user {
            padding: 0 15px;

            &:last-child {
                padding-bottom: 15px;
            }
        }

    }

</style>