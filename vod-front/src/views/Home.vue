<template>
  <div>
    <MainVerse :verse="todaysVerse"/>
    <Verse :verses="verses" />
  </div>
</template>

<script>
// @ is an alias to /src
import MainVerse from "@/components/MainVerse.vue";
import Verse from "../components/Verse.vue";
import axios from "axios";

export default {
  name: "Home",

  components: {
    MainVerse,
    Verse,
  },

  data() {
    return {
      todaysVerse: null,
      verses: [],
    }
  },

  mounted() {
    axios.get('/api/verses')
      .then(response => {
        const {data} = response
        this.todaysVerse = data.verses[0]
        this.verses = data.verses.slice(1)
      })
      .catch(err => console.error(err));
  },
};
</script>
