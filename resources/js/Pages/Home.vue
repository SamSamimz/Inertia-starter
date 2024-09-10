<template>
  <Head title="| Home" />
  <!-- <div>
    {{ $page.props.flash.success }}
  </div> -->
  <h1 class="text-4xl text-center py-3">
    Welcome Home , {{ $page.props.auth.user.name }}
  </h1>
</template>
<script setup>
</script>