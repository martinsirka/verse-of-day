<template>
  <div class="verse">
    <div class="verse-box" v-for="verse in verses" :key="`verse-${verse.id}`">
      <div class="verse-box__verse">
        <div class="title">{{ verse.reference }}</div>
        <div class="content">{{ verse.content }}</div>
      </div>
      <div class="verse-box__desc" v-html="verse.comment"></div>
      <div class="rating">
        <RatingSharing />
      </div>
    </div>

    <!-- <div class="verse-box">
      <div class="verse-box__verse">
        <div class="title">Žalm 19:2</div>
        <div class="content">
          Nebesia rozprávajú o Božej sláve, obloha hlása dielo jeho rúk.
        </div>
      </div>
      <div class="verse-box__desc">
        Božia veľkosť je nekonečná a my si často neuvedomujeme ani len jej malú
        čiastku. Zahľadení do seba, do okolností či každonenných bežných dianí,
        tak často nám uniká veľkosť nášho Stvoriteľa. Možno sme kedysi nad tým
        žasli, a teraz nám tá pravda zovšednela. Stačí však len zdvihnúť pohľad
        a pripomenúť si, že oblohu, zem, vrchy, hory... všetko to, ba i omnoho
        viac, Boh utvoril svojím slovom. Začnime si viac všímať všetky tie
        nádherné výtvory Božej moci a uvedomíme si aký veľký a silný je náš Boh.
        Vedie to k pokore, keď vidíme, akí sme v porovnaní s tým my malí a
        mnohokrát bezmocní. Vzbudí to však v nás i nesmiernu vďačnosť, že ten
        Veľký a Silný nás tak veľmi miluje a ponúka lásku a spásu vo svojej
        náruči. Nemiňme možnosti byť v rukách Boha, je to najkrajšie miesto, kde
        môžeme byť. Väčšieho a silnejšieho od Neho niet.
      </div>
      <div class="rating">
        <RatingSharing />
      </div>
    </div>

    <div class="verse-box">
      <div class="verse-box__verse">
        <div class="title">Príslovia 17:1</div>
        <div class="content">
          Lepší je kúsok suchého chleba v pokoji ako dom plný obetných hostín so
          zvadou.
        </div>
      </div>
      <div class="verse-box__desc">
        Požehnanie je tam, kde je spokojnosť, pochopenie, láska a pokoj. Každý z
        nás je iný. Máme iné náhľady, iné myšlienkové procesy, ale Boh nám dal
        zdravý rozum a prikázanie milovať sa navzájom. Buďme si k sebe milí,
        plní súcitu, dobrotiví. Nemusí to byť veľa, ale to, čo máme, dajme v
        pokoji a z ochotného srdca.
      </div>
      <div class="rating">
        <RatingSharing />
      </div>
    </div> -->
  </div>
</template>

<script>
import RatingSharing from "./RatingSharing.vue";

export default {
  name: "verse",

  props: ['verses'],

  mounted() {
    console.log('Verse component', this.verses);
  },

  components: {
    RatingSharing,
  },
};
</script>
