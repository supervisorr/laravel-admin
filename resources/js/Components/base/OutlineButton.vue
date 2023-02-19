<template>
  <v-hover
    v-slot:default="{ hover }"
    open-delay="100"
  >
    <v-btn 
      :elevation="hover ? 8 : 0" 
      outlined
      :color="color"
      :block="block"
      :large="large"
      :rounded="rounded"
      :class="[textColor, textHover, bgHover, borderColor]"
      class="bg-transparent border"  
    >
        {{ text }}
    </v-btn>
  </v-hover>
</template>
<script>
export default {
  name: "HoverButton",
  props: {
    text: {
      type: String,
      deault: ''
    },
    color: {
      type: String,
      deault: ''
    },
    block: {
      type: Boolean,
      default: false
    },
    large: {
      type: Boolean,
      default: false
    },
    rounded: {
      type: Boolean,
      default: false
    },
    // customClass: {
    //   type: String,
    //   default: 'border-blue-600  text-blue-600 hover:text-white hover:bg-blue-600'
    // },
   
    textColor: {
      type: String,
      default: 'text-blue-600',
    },
    textHover: {
      type: String,
      default: 'hover:text-white',
    },
    bgHover: {
      type: String,
      default: 'hover:bg-blue-600',
    },
    borderColor: {
      type: String,
      default: ''
    }
     
  },
}
</script>