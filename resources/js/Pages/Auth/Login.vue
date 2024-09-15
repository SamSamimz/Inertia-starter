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
        <!-- Remember me   -->
        <div class="flex items-center justify-between my-4">
          <div class="flex items-center">
            <input
              v-model="form.remember"
              id="remember_me"
              name="remember_me"
              type="checkbox"
              class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded"
            />
            <label for="remember_me" class="ml-2 block text-sm text-gray-900">
              Remember me
            </label>
          </div>
        </div>

        <div class="flex items-center justify-between">
          <button
            type="submit"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded focus:outline-none focus:shadow-outline"
            :disabled="processing"
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
import { ref } from "vue";
import Input from "../../components/Input.vue";
import { useForm } from "@inertiajs/vue3";
const processing = ref(false);
const form = useForm({
  email: "",
  password: "",
  remember: false,
});
const signin = () => {
  form.post(route("login"), {
    onError: () => {
      form.reset("password");
    },
    onStart: () => {
      processing.value = true;
    },
    onFinish: () => {
      processing.value = false;
    },
    preserveScroll: true,
  });
};
</script>