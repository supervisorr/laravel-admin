<template>
  <v-card
    class="mx-auto shadow-sm"
    :class="{ 'p-4': padding, cardClass }"
    :color="$vuetify.theme.dark && color == 'white' ? 'dark' : color"
    :dark="$vuetify.theme.dark"
    max-width="100%"
  >
    <v-skeleton-loader height="100%" width="100%" type="card" :loading="getThemeMode.isLoading">
      <slot />
    </v-skeleton-loader>
  </v-card>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
export default {
  name: "Card",

  props: {
    color: {
      type: String,
      default: "white",
    },
    cardClass: {
      type: String,
      default: "",
    },

    padding: {
      type: Boolean,
      default: false,
    },
  },
  computed: {
    ...mapGetters(["getThemeMode"]),
  },
};
</script>
