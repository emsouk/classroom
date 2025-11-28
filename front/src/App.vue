<script setup>
import Navbar from "./components/Navbar.vue";
import Footer from "./components/Footer.vue";
</script>

<template>
  <div class="flex flex-col min-h-screen">
    <Navbar />
    <RouterView class="flex-1" />
    <Footer />
  </div>
</template>
