<template>
  <div>
    <div class="mb-4">
      <inertia-link class="flex items-center group py-3" :href="route('dashboard')">
        <icon name="dashboard" class="w-4 h-4 mr-2" :class="isUrl('') ? 'fill-white' : 'fill-indigo-400 group-hover:fill-white'" />
        <div :class="isUrl('') ? 'text-white' : 'text-indigo-300 group-hover:text-white'">Dashboard</div>
      </inertia-link>
    </div>
    <!-- <div class="mb-4">
            <inertia-link class="flex items-center group py-3" :href="route('organizations')">
                <icon name="office" class="w-4 h-4 mr-2"
                      :class="isUrl('organizations') ? 'fill-white' : 'fill-indigo-400 group-hover:fill-white'"/>
                <div :class="isUrl('organizations') ? 'text-white' : 'text-indigo-300 group-hover:text-white'">
                    Organizations
                </div>
            </inertia-link>
        </div> -->
    <div class="mb-4">
      <inertia-link class="flex items-center group py-3" :href="route('posts')">
        <icon name="users" class="w-4 h-4 mr-2" :class="isUrl('posts') ? 'fill-white' : 'fill-indigo-400 group-hover:fill-white'" />
        <div :class="isUrl('posts') ? 'text-white' : 'text-indigo-300 group-hover:text-white'">Posts</div>
      </inertia-link>
    </div>
  </div>
</template>

<script>
import Icon from '@/Shared/Icon'
import Dropdown from '@/Shared/Dropdown'

export default {
  components: {
    Icon,
    Dropdown,
  },
  methods: {
    isUrl(...urls) {
      let currentUrl = this.$page.url.substr(1)
      if (urls[0] === '') {
        return currentUrl === ''
      }
      return urls.filter((url) => currentUrl.startsWith(url)).length
    },
  },
}
</script>
