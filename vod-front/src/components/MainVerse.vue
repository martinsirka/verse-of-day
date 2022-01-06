<template>
  <div class="main-verse">
    <div class="main-verse__wrapper">
      <div class="main-verse__verse">
        <div class="title">{{ verse.reference }}</div>
        <div class="content">
          {{ verse.content }}
        </div>
      </div>
      <div class="main-verse__desc" v-html="verse.comment"></div>
    </div>
    <div class="rating">
      <RatingSharing />
    </div>
  </div>
</template>

<script>
import RatingSharing from "../components/RatingSharing.vue";

export default {
  name: "main-verse",

  props: ['verse'],

  components: {
    RatingSharing,
  },
};
</script>

<style scoped lang="scss"></style>
