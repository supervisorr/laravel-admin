<template>
  <base-card class="">
    <v-card-text class="p-4 ">
      <div class="flex justify-between">
        <div class="pr-4">
          <h5 class="text-lg "> {{ title }} </h5>
          <p class=""> {{ subTitle }} </p>
        </div>
        <img class="w-24 h-24" :src="image" v-if="image" />
      </div>
      <slot name="basic-info-slot"></slot>
    </v-card-text>
    <v-divider></v-divider>
    <v-card-actions class="hover:bg-gray-100 p-4 text-blue-600 cursor-pointer" v-if="link">
      
        {{ link }}
      
    </v-card-actions>
  </base-card>
</template>
<script>
export default {
  props: {
    title: {
      type: String,
      default: '',
    },
    subTitle: {
      type: String,
      default: '',

    },
    image: {
      type: String,
      default: '',
    },
    link: {
      type: String,
      default: '',
    }
  }
}
</script>