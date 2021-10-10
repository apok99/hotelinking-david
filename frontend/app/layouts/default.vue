<template>
<div class="w-full h-screen grid grid-cols-9 2xl:grid-cols-12">
    <div class="col-span-2 2xl:col-span-1 h-full bg-gray-50">
        <p class="text-center p-4 text-xl font-bold">Your platform</p>
        <div class="h-5/6 flex">
            <div class="list flex m-auto">
                <MenuNav/>      
            </div>
        </div>
    </div>
    <div class="col-span-7 2xl:col-span-11 bg-gray-100">
        <Nuxt/>
    </div>
</div>
</template>

<script>

    export default {
        fetch(){
            this.$axios.setHeader('Authorization', 'Bearer ' + localStorage.getItem('token'))
        }
    }

</script>