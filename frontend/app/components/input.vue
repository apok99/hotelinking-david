<template>
<div class="space-y-2">
    <p>{{title}}</p>
    <input v-if="keyup != null" v-on:keyup.13="keyup" v-bind:value="value" v-on:input="$emit('input', $event.target.value)" class="p-2 w-full text-xl shadow" :type="type" :class="classes" :placeholder="placeholder"/>
    <input v-if="keyup  == null"  v-bind:value="value" v-on:input="$emit('input', $event.target.value)" class="p-2 w-full text-xl shadow" :type="type" :class="classes" :placeholder="placeholder"/>

</div>
</template>

<script>

export default {
    'props':[
        'title',
        'type',
        'classes',
        'placeholder',
        'value',
        'keyup'
    ]

}

</script>