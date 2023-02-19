<template>
  <v-btn
    
    :block="block"
    :class="[bgColor, textColor, textHover, bgHover, customClass]"
    class=" shadow-sm transition duration-300 ease-in-out "
    :small="small"
    :x-small="xSmall"
    :large="large"
    :color="color"
   
  >
    <v-icon 
      :small="smallIcon"
      v-if="iconName"  
      class="transition-none"
      :class="[iconMr]"
    >
        {{ iconName }}
    </v-icon>
    {{ text }}
  </v-btn>
</template>
<script>
export default {
  name: "HoverButton",
  props: {
     
      text: {
        type: String,
        default: '',
      },
      color: {
        type: String,
        default: '',
      },
      bgColor: {
        type: String,
        default: 'bg-blue-100',
      },
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
      block: {
        type: Boolean,
        default: false,
      },
      small: {
        type: Boolean,
        default: false
      },
      iconName: {
        type: String,
        default: ''
      },
      customClass: {
        type: String,
        default: ''
      },
      large: {
        type: Boolean,
        default: false
      },
      xSmall: {
        type: Boolean,
        default: false
      },
      iconMr: {
        type: String,
        default: ''
      },
      smallIcon: {
        type: Boolean,
        default: false
      },
      clickEvent: {
        type: String,
        default: ''
      },
     
    },
}
</script>