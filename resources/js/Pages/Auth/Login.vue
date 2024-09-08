<template>
  <div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="bg-white p-10 rounded-lg shadow-lg w-full max-w-md">
      <h2 class="text-3xl font-bold text-center mb-8">Login</h2>

      <form @submit.prevent="signin">
        <Input
          name="Email"
          type="email"
          v-model="form.email"
          :message="form.errors.email"
        />
        <Input name="Password" type="password" v-model="form.password" />

        <div class="flex items-center justify-between">
          <button
            type="submit"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded focus:outline-none focus:shadow-outline"
          >
            Sign In
          </button>
          <Link
            :href="route('register')"
            class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800"
          >
            Don't have an account?
          </Link>
        </div>
      </form>
    </div>
  </div>
</template>

<script setup>
import Input from "../../components/Input.vue";
import { useForm } from "@inertiajs/vue3";
const form = useForm({
  email: "",
  password: "",
});
const signin = () => {
  form.post(route("login"));
};
</script>