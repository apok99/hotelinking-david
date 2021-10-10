<template>
<div class="w-full h-full">
    <Modal v-if="toggleModal" title="Use this coupon?" message="This coupon is one time use. Note: this action is irreversible." accept="Accept" cancel="Cancel" :confirm=confirm @toggle-modal = "listener"></Modal>
    <div class="shadow w-full bg-white rounded h-full "  v-on:click="showModal" :class="{
        'cursor-pointer hover:bg-gray-200' : !coupon.isUsed,
    }">
        <p class="text-center p-2 font-bold text-xl">{{coupon.code}}</p>
        <div class="flex justify-center">
            <div class="m-auto">
                <span class="text-5xl text-blue-700 font-semibold">{{coupon.discount}} %</span>
            </div>           
        </div>
        <div class="flex justify-center mt-3 mb-3">
            <div class="m-auto">
                <img v-if="coupon.isUsed" class="w-8" src="/error.png">
                <img v-if="!coupon.isUsed" class="w-8" src="/ready.png">
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    'props':[
        'coupon',
    ],
    data(){
        return {
            toggleModal : false,
        }
    },
    methods:{
        use(){
            this.$parent.use(this.coupon.id);
            this.close();
        },
        showModal(){
            if(!this.coupon.isUsed && this.toggleModal == false){
                return this.toggleModal = true;
            }else{
                return true;
            }
        },
        close(){
            return this.toggleModal = false;
        }
    }
}

</script>