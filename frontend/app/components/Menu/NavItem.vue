<template>
<li class="rounded p-3 2xl:p-3  text-white font-bold cursor-pointer" :class="{
    'bg-blue-700' : active == true,
    'text-gray-500 border' : active == false,
}"> 
    <img class="w-8 inline mr-2" :src="imgSrc" />
    {{text}}
</li>
</template>

<script>

export default {
    'props':[
        'imgSrc',
        'text',
        'active' 
    ]
}
</script>