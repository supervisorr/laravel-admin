<template>
  <div>
    <base-card>
      <v-card-text :class="cardColor">
        <div class="flex justify-between items-center p-2">
          <div
            :class="badgeColor"
            class="badge rounded-full"
          >
            <h6
              :class="badgeTextColor"
              class="m-0"
            >
              {{ badgeText }}
            </h6>
          </div>
          <div class="ml-2 flex-grow-1">
            <p class="m-0 text-white">
              {{ text }}
            </p>
            <p class="text-white text-xs m-0">
              {{ textSmall }}
            </p>
          </div>
          <div class="grid-button">
            <v-btn
              class="mx-2 shadow-none"
              fab
              dark
              small
              :class="btnColor"
            >
              <v-icon dark>
                {{ btnIcon }}
              </v-icon>
            </v-btn>
          </div>
        </div>
      </v-card-text>
    </base-card>
  </div>
</template>
<script>
  export default {
    props: {
      badgeColor: {
        type: String,
        default: '',
      },
      cardColor: {
        type: String,
        default: '',
      },
      badgeTextColor: {
        type: String,
        default: '',
      },
      badgeText: {
        type: String,
        default: '',
      },
      text: {
        type: String,
        default: '',
      },
      textSmall: {
        type: String,
        default: '',
      },
      btnIcon: {
        type: String,
        default: '',
      },
      btnColor: {
        type: String,
        default: '',
      },
    },
    data () {
      return {
        hover: false,
      }
    },
  }
</script>
<style>
.badge{
    width: 40px;
    min-width: 40px;
    height: 40px;
    min-height: 40px;
    line-height: 40px;
    font-size: 1.2rem;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 0px !important;
    border-radius: 50%;
}
</style>
