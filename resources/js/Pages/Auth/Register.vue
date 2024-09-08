<template>
  <div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="bg-white p-10 rounded-lg shadow-lg w-full max-w-xl">
      <h2 class="text-3xl font-bold text-center mb-8">Register</h2>

      <form @submit.prevent="register">
        <div class="mb-6">
          <label for="name" class="block text-gray-700 text-sm font-bold mb-2"
            >Name</label
          >
          <input
            v-model="form.name"
            type="text"
            id="name"
            class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            placeholder="Enter your name"
          />
        </div>

        <div class="mb-6">
          <label for="email" class="block text-gray-700 text-sm font-bold mb-2"
            >Email</label
          >
          <input
            v-model="form.email"
            type="email"
            id="email"
            class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            placeholder="Enter your email"
          />
        </div>

        <div class="mb-6">
          <label
            for="password"
            class="block text-gray-700 text-sm font-bold mb-2"
            >Password</label
          >
          <input
            v-model="form.password"
            autocomplete="off"
            type="password"
            id="password"
            class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
            placeholder="Enter your password"
          />
        </div>

        <div class="mb-8">
          <label
            for="confirm-password"
            class="block text-gray-700 text-sm font-bold mb-2"
            >Confirm Password</label
          >
          <input
            v-model="form.password_confirmation"
            autocomplete="off"
            type="password"
            id="confirm-password"
            class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
            placeholder="Confirm your password"
          />
        </div>

        <div class="flex items-center justify-between">
          <button
            type="submit"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded focus:outline-none focus:shadow-outline"
          >
            Register
          </button>
          <Link
            :href="route('login')"
            class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800"
          >
            Already have an account?
          </Link>
        </div>
      </form>
    </div>
  </div>
</template>

<script setup>
import { useForm } from "@inertiajs/vue3";

const form = useForm({
  name: "",
  email: "",
  password: "",
  password_confirmation: "",
});
const register = () => {
  form.post("/register");
};
</script>
