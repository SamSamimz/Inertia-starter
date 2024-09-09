<template>
  <div class="mt-4 flex justify-center">
    <Link
      v-for="link in links"
      :key="link.label"
      :href="link.url"
      class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700"
      :class="{
        hidden: !link.url,
        '!text-slate-100 !bg-slate-900': link.active,
      }"
    >
      <!-- Handle special characters -->
      <span v-if="link.label === '&laquo;'">« Previous</span>
      <span v-else-if="link.label === '&raquo;'">Next »</span>
      <span v-else v-html="link.label"></span>
    </Link>
  </div>
</template>

  <script setup>
const props = defineProps({
  links: Array,
});
</script>
