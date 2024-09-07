<template>
  <Head title="| About" />
  <div>
    <h1 class="text-4xl">About , {{ props.name }}</h1>
  </div>
</template>

<script setup>
const props = defineProps({
  name: String,
});
</script>