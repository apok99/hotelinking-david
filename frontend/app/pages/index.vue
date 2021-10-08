<template>
<div class="w-full grid grid-cols-3 h-screen">
  <div class="col-span-2 flex">
      <img class="w-4/6 m-auto" src="/trip.svg" />
  </div>
  <div class="flex col-span-1 w-full bg-gray-50">
    <div class="form m-auto w-5/6 space-y-5">
      <p class="text-center font-bold text-3xl">Welcome to your Platform</p>  
      <Input title="Email" :keyup="null"  v-model="email" type="email" placeholder="Email..." />
      <Input :keyup="login" title="Password" v-model="password" type="password" placeholder="Password..." />
      <div class="m-auto">
        <p class="text-center text-gray-600 hover:underline cursor-pointer">Forgot password?</p>
      </div>
      <Loader v-if="showLoader" class="m-auto"></Loader>
      <Alert v-if="alert.show" :class="alert.background">{{alert.message}}</Alert>
      <div class="flex">
        <button v-on:click="login" class="bg-blue-600 shadow p-2 text-white m-auto w-4/6 hover:bg-blue-700 hover:cursor-pointer">Sing in</button>
      </div>
    </div>
  </div>
</div>

</template>

<script>
export default {
  data(){
    return {
      email:'',
      pasword:'',
      showLoader:false,
      alert:{show:false, background:null, message:null}
    }
  },
  methods : {
    async login(){
      this.showLoader = true;
      this.alert = {show:false, background:null, message:null};
      let data = await this.fetchLogin().then((res) => {
        this.showLoader = false;
        if(res.error){
          this.alert = {show:true, background:'bg-red-500', message:res.message}
        }else{
          this.alert = {show:true, background:'bg-green-500', message:res.message}
          this.setToken(res.token);
        }
        setTimeout(() => {
          this.alert = {show:false, background:null, message:null};
        }, 2500);
        this.$router.push('main');
      })
      return true;
    },
    async fetchLogin() {
      let data = null;
      await this.$axios.$post('http://localhost:8000/login', {email:this.email,password:this.password}).then(res => data = res);
      return data;
    },
    setToken(token){
     localStorage.setItem('token', token)
    }
  }

}
</script>
