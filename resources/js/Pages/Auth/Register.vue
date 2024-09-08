<template>
  <div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="bg-white p-10 rounded-lg shadow-lg w-full max-w-xl">
      <h2 class="text-3xl font-bold text-center mb-8">Register</h2>

      <form @submit.prevent="register">
        <Input name="Name" v-model="form.name" :message="form.errors.name" />

        <Input
          name="Email"
          type="email"
          v-model="form.email"
          :message="form.errors.email"
        />

        <Input
          name="Password"
          type="password"
          v-model="form.password"
          :message="form.errors.password"
        />

        <Input
          name="Confirm Password"
          type="password"
          v-model="form.password_confirmation"
          :message="form.errors.password_confirmation"
        />

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
import Input from "../../components/Input.vue";

const form = useForm({
  name: "",
  email: "",
  password: "",
  password_confirmation: "",
});
const register = () => {
  form.post(route("register"), {
    onError: () => {
      form.reset("password", "password_confirmation");
    },
  });
};
</script>
