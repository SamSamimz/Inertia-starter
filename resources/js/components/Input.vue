<template>
  <div class="mb-6">
    <label :for="name" class="block text-gray-700 text-sm font-bold mb-2">{{
      name
    }}</label>
    <input
      v-model="model"
      :type="type"
      :id="name"
      autocomplete="off"
      :class="{
        '!border-red-500': message,
      }"
      class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
      placeholder="Enter your name"
    />
    <span class="text-red-500" v-if="message">{{ message }}</span>
  </div>
</template>

<script setup>
const model = defineModel({
  type: null,
  required: true,
});
defineProps({
  name: {
    type: String,
    required: true,
  },
  type: {
    type: String,
    default: "text",
  },
  message: {
    type: String,
    default: "",
  },
});
</script>
