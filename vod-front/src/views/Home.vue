<template>
 <div>
  <MainVerse />
  <Verse />
 </div>
</template>

<script>
// @ is an alias to /src
import MainVerse from "@/components/MainVerse.vue";
import Verse from '../components/Verse.vue'

export default {
  name: "Home",
  components: {
    MainVerse,
    Verse
  },
};
</script>
