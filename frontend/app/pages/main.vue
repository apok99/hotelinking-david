<template>
<div class="w-full flex h-full">
   <div class="w-full m-auto p-2 grid grid-cols-1 md:grid-cols-3 xl:grid-cols-5 2xl:grid-cols-6 gap-4">
       <Loader v-if="showLoader" class="m-auto w-20 col-span-6"></Loader>
       <div class="col-span-1"  v-for="(coupon, index) in coupons" :key="index">
           <Couponcard :coupon="coupon"/>
       </div>
   </div>

   <img src="/add.png" class="absolute p-2 right-2 top-2 w-14 cursor-pointer" v-on:click="add"/>
</div>
</template>

<script>

export default {

    data(){
        return {
            'coupons' : [],
            'showLoader':false
        }
    },

    async fetch(){
        this.showLoader = true;
        await this.$axios.get('http://localhost:8000/coupons/get').then(res => this.coupons = res.data.coupons);
        this.showLoader = false;
    },
    methods: {
        async use(id){
            await this.$axios.post('http://localhost:8000/coupons/use', {id:id});
            this.coupons.map((coupon) => {
                if(coupon.id == id)
                    coupon.isUsed = true;
                
                return coupon;
            })
        },
        async add(){
            await this.$axios.get('http://localhost:8000/coupons/create').then(res => this.coupons.push(res.data.coupon))
        }
    }

}

</script>