<template>
  <base-card class="">
    <v-card-text :class="bgCardColor" class="flex items-center h-full">
      <div class="flex flex-grow-1 justify-between items-center flex-wrap">
        <div>
          <p class="m-0 text-white">
            {{ heading }}
          </p>
          <div class="text-xl text-white m-0">
            {{ subHeading }}
          </div>
        </div>
        <v-icon
          :class="mainIconTextColor"
          class="text-5xl"
        >
          <!-- mdi-numeric-9-plus-circle-outline -->
          {{ mainIconName }}
        </v-icon>
      </div>
    </v-card-text>
  </base-card>
</template>
<script>
  export default {
    props: {
      bgCardColor:{
        type: String,
        default: '',
      },
      mainIconTextColor: {
        type: String,
        default: '',
      },
      mainIconName: {
        type: String,
        default: '',
      },
      heading: {
        type: String,
        default: '',
      },
      subHeading: {
        type: String,
        default: '',
      },
    },
  }
</script>
