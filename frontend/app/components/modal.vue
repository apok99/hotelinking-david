<template>
<div class="flex items-center justify-center fixed left-0 bottom-0 w-full h-full bg-transparent">
  <div class="bg-white rounded-lg w-1/2">
    <div class="flex flex-col items-start p-4">
      <div class="flex items-center w-full">
        <div class="text-gray-900 font-medium text-2xl">{{title}}</div>
	  	<svg v-on:click="closeModal" class="ml-auto fill-current text-gray-700 w-6 h-6 cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
			<path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"/>
     	</svg>
      </div>
      <hr>
      <div class="text-gray-800 text-semibold monospace mt-1">{{message}}</div>
      <hr>
      <div class="ml-auto">
        <button v-on:click="acceptButton" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
          {{accept}}
        </button>
        <button v-on:click="closeModal" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">
          {{cancel}}
        </button>
      </div>
    </div>
  </div>
</div>  
</template>


<script>
export default {
    'props': [
        'title',
        'message', 
        'accept',
        'cancel',
    ],
    methods: {
      acceptButton(){
       this.$parent.use();      
      },
      closeModal(){
       this.$parent.close();
      }
    } 
}
</script>

<style scoped>

  .bg-transparent{
    background-color:rgba(216, 215, 215, 0.76);
  }

</style>