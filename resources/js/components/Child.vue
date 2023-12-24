<template>
  <div>
    <h1></h1>
    {{ name }}
  </div>
</template>
<script>
import { inject } from "vue";
const test = inject("msg");
</script>
