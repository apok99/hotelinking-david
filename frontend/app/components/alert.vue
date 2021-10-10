<template>
<div class="p-3 text-white rounded shadow" :class="classes">
    <slot></slot>    
</div> 
</template>

<script>

export default {
    'props':[
        'classes'
    ]
}

</script>