<template>
  <div class="main-verse">
    <div class="main-verse__wrapper">
      <div class="main-verse__verse">
        <div class="title">Plač Jeremiášov 3:31-32</div>
        <div class="content">Lebo Pán neodvrhne na veky. Lebo hoci aj zarmúti, zase sa zľutuje podľa množstva svojej milosti.</div>
      </div>
      <div class="main-verse__desc">
        Ježišova láska ku nám je neopísateľná. Jeremiáš píše, že je dobre, keď nosíme bremeno, teda keď sa dočasu trápime s niečím. Boh nezavrhne, ale vždy pomôže a vytrhne.
        Dôvod, prečo sa v nebi budeme radovať omnoho viac ako anjeli, je ten, že sme na zemi prešli rozličnými ťažkosťami. Tá radosť bude nekonečná, lebo sme prežili biedu. Potrebné je vytrvať. Boh je verný, zmiluje sa vo svojej láske a pomôže v pravej chvíli.
      </div>
    </div>
    <div class="rating">
      <RatingSharing/>
    </div>
  </div>
</template>

<script>
import RatingSharing from '../components/RatingSharing.vue'

export default {
  name: "main-verse",

   components: {
    RatingSharing,
  },
 
};
</script>

<style scoped lang="scss">

</style>
