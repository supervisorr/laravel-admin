<template>
  <div>
    <base-card class="relative">
      <v-btn
        v-if="floatingButtonBackgroundColor"
        absolute
        fab
        right
        top
        x-small
        :color="floatingButtonBackgroundColor"
      >
        <v-icon :class="floatingButtonIconTextColor">
          {{
            floatingButtonIconName
          }}
        </v-icon>
      </v-btn>
      <v-card-text>
        <div class="flex flex-col justify-center items-center">
          <div
            :class="mainIconBackgroundColorClass"
            class="rounded-full h-10 w-10 flex items-center justify-center mb-4"
          >
            <v-icon :class="mainIconTextColor">
              {{ mainIconName }}
            </v-icon>
          </div>
          <h3 class="font-bold m-0">
            {{ headingText }}
          </h3>
          <h6 class="text-xs mb-8 font-normal">{{ subHeadingText }}</h6>

          <v-btn
            depressed
            rounded
            :class="[
              mainIconTextColor,
              mainIconBackgroundColorClass,
              bottomButtonHoverClass
            ]"
            class="text-xs   hover:text-white  font-bold py-2 px-4  inline-flex items-center"
          >
            <v-icon class=" text-xs mr-1 ">
              {{ bottomButtonIcon }}
            </v-icon>
            <span class="">{{ bottomButtonText }}</span>
          </v-btn>
        </div>
      </v-card-text>
    </base-card>
  </div>
</template>
<script>
  export default {
    name: 'TestCard',

    props: {
      // Floating Button icon Color
      floatingButtonIconTextColor: {
        type: String,
        default: 'text-white',
      },

      // Floating Button Background Color
      floatingButtonBackgroundColor: {
        type: String,
        default: '',
      },

      // Floating Button Icon Name
      floatingButtonIconName: {
        type: String,
        default: 'mdi-plus',
      },
      // card  main icon color
      mainIconTextColor: {
        type: String,
        default: 'text-primary',
      },
      // card  main icon background color
      mainIconBackgroundColorClass: {
        type: String,
        default: 'bg-indigo-200',
      },
      // card  main icon name
      mainIconName: {
        type: String,
        default: 'mdi-account-multiple-outline',
      },

      //  Heading Text
      headingText: {
        type: String,
        default: '30.2k',
      },

      // card Sub Heading Text
      subHeadingText: {
        type: String,
        default: 'Total Followers',
      },

      // bottom button text
      bottomButtonText: {
        type: String,
        default: '12.6%',
      },
      // bottom button icon
      bottomButtonIcon: {
        type: String,
        default: 'mdi-arrow-down-drop-circle-outline',
      },
      // bottom button hover class
      bottomButtonHoverClass: {
        type: String,
        default: 'hover:bg-primary',
      },
    },
  }
</script>
