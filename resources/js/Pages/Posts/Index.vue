<template>
  <div>
    <h1 class="mb-8 font-bold text-3xl">Posts</h1>
    <div class="mb-6 flex justify-between items-center">
      <!-- <search-between-dates v-model="form.search" class="w-full mr-4" @reset="reset">
      </search-between-dates> -->
      <inertia-link class="btn-indigo" :href="route('posts.create')">
        <span>Create</span>
        <span class="hidden md:inline">Post</span>
      </inertia-link>
    </div>
    <div class="bg-white rounded-md shadow overflow-x-auto">
      <table class="w-full whitespace-nowrap">
        <tr class="text-left font-bold">
          <th class="px-6 pt-6 pb-4">Titulo</th>
          <th class="px-6 pt-6 pb-4">Contenido</th>
          <th class="px-6 pt-6 pb-4">Autor</th>
          <th class="px-6 pt-6 pb-4">Creado</th>
          <th class="px-6 pt-6 pb-4">Ficha del autor</th>
        </tr>
        <tr v-for="post in posts.data" :key="post.id" class="hover:bg-gray-100 focus-within:bg-gray-100">
          <td class="border-t px-6 py-4 items-center focus:text-indigo-500">
            <inertia-link class="px-6 py-4 flex items-center" :href="route('users.edit', post.userId)" tabindex="-1">
              {{ post.title }}
            </inertia-link>
          </td>
          <td class="border-t px-6 py-4 items-center focus:text-indigo-500">
            <inertia-link class="px-6 py-4 flex items-center" :href="route('users.edit', post.userId)" tabindex="-1">
              {{ post.content }}
            </inertia-link>
          </td>
          <td class="border-t px-6 py-4 items-center focus:text-indigo-500">
            <inertia-link class="px-6 py-4 flex items-center" :href="route('users.edit', post.userId)" tabindex="-1">
              {{ post.userName }}
            </inertia-link>
          </td>
          <td class="border-t px-6 py-4 items-center focus:text-indigo-500">
            <inertia-link class="px-6 py-4 flex items-center" :href="route('users.edit', post.userId)" tabindex="-1">
              {{ post.createdAt }}
            </inertia-link>
          </td>
          <td class="border-t w-px">
            <inertia-link class="px-6 py-4 flex items-center" :href="route('users.edit', post.userId)" tabindex="-1">
              <icon name="cheveron-right" class="block w-6 h-6 fill-gray-400" />
            </inertia-link>
          </td>
        </tr>
        <tr v-if="posts.data.length === 0">
          <td class="border-t px-6 py-4" colspan="5">No posts found.</td>
        </tr>
      </table>
    </div>
    <pagination class="mt-6" :links="posts.links" />
  </div>
</template>

<script>
// import SearchBetweenDates from '@/Shared/SearchBetweenDates'
import Icon from '@/Shared/Icon'
import pickBy from 'lodash/pickBy'
import Layout from '@/Layouts/DefaultLayout'
import throttle from 'lodash/throttle'
import mapValues from 'lodash/mapValues'
import Pagination from '@/Shared/Pagination'
import SearchFilter from '@/Shared/SearchFilter'

export default {
  metaInfo: { title: 'Posts' },
  components: {
    // SearchBetweenDates,
    Icon,
    Pagination,
    SearchFilter,
  },
  layout: Layout,
  props: {
    filters: Object,
    posts: Object,
  },
  data() {
    return {
      form: {
        search: this.filters.search,
        trashed: this.filters.trashed,
      },
    }
  },
  watch: {
    form: {
      deep: true,
      handler: throttle(function () {
        this.$inertia.get(this.route('posts'), pickBy(this.form), { preserveState: true })
      }, 150),
    },
  },
  methods: {
    reset() {
      this.form = mapValues(this.form, () => null)
    },
  },
}
</script>
