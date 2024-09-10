<template>
  <Head title="| Home" />
  <h1 class="text-4xl text-center py-3">Users Page</h1>
  <div class="py-3">
    <div class="container mx-auto p-4">
      <div class="flex justify-end mb-4">
        <input
          v-model="search"
          type="search"
          placeholder="Search..."
          class="p-2 border border-gray-300 rounded"
        />
      </div>
      <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200">
          <thead>
            <tr>
              <th
                class="px-6 py-3 border-b-2 border-gray-300 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider"
              >
                ID
              </th>
              <th
                class="px-6 py-3 border-b-2 border-gray-300 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider"
              >
                Name
              </th>
              <th
                class="px-6 py-3 border-b-2 border-gray-300 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider"
              >
                Email
              </th>
              <th
                class="px-6 py-3 border-b-2 border-gray-300 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider"
              >
                Role
              </th>
              <th
                class="px-6 py-3 border-b-2 border-gray-300 bg-gray-50 text-right text-xs font-semibold text-gray-600 uppercase tracking-wider"
              >
                Actions
              </th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200">
            <tr v-for="user in props.users.data" :key="user.id">
              <td
                class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"
              >
                {{ user.id }}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                {{ user.name }}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{ user.email }}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                Admin
              </td>
              <td
                class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium"
              >
                <a href="/" class="text-indigo-600 hover:text-indigo-900">
                  Edit
                </a>
                <button
                  @click="deleteUser(user.id)"
                  class="ml-4 text-red-600 hover:text-red-900"
                >
                  Delete
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- Pagination Controls -->
      <Pagination :links="props.users.links" />
    </div>
  </div>
</template>
  <script setup>
import { router } from "@inertiajs/vue3";
import { debounce, throttle } from "lodash";
import { ref, watch } from "vue";
const props = defineProps({
  users: Object,
  searchTerm: String,
});
const search = ref(props.searchTerm);

watch(
  search,
  debounce((query) => {
    router.get("/users", { search: query }, { preserveState: true });
  }, 500)
);

const deleteUser = (id) => {
  if (confirm("Are you sure want to delete?")) {
    router.delete(route("delete", id));
  }
};
</script>