<template>
  <div>
    <h1 class="mb-8 font-bold text-3xl">Posts Api</h1>

    <div class="mb-8 flex items-center justify-between bg-red-400 rounded max-w-3xl" style="display: none;" id="postErrors">
      <div class="flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="ml-4 mr-2 flex-shrink-0 w-4 h-4 fill-white">
          <path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm1.41-1.41A8 8 0 1 0 15.66 4.34 8 8 0 0 0 4.34 15.66zm9.9-8.49L11.41 10l2.83 2.83-1.41 1.41L10 11.41l-2.83 2.83-1.41-1.41L8.59 10 5.76 7.17l1.41-1.41L10 8.59l2.83-2.83 1.41 1.41z"></path>
        </svg> 
        <div class="py-4 text-white text-sm font-medium">
          <span class="postErrorsMessage" id="postErrorsMessage">***</span>
        </div>
      </div> 
      <button type="button" class="group mr-2 p-2">
        <svg xmlns="http://www.w3.org/2000/svg" width="235.908" height="235.908" viewBox="278.046 126.846 235.908 235.908" class="block w-2 h-2 fill-red-800 group-hover:fill-white">
        <path d="M506.784 134.017c-9.56-9.56-25.06-9.56-34.62 0L396 210.18l-76.164-76.164c-9.56-9.56-25.06-9.56-34.62 0-9.56 9.56-9.56 25.06 0 34.62L361.38 244.8l-76.164 76.165c-9.56 9.56-9.56 25.06 0 34.62 9.56 9.56 25.06 9.56 34.62 0L396 279.42l76.164 76.165c9.56 9.56 25.06 9.56 34.62 0 9.56-9.56 9.56-25.06 0-34.62L430.62 244.8l76.164-76.163c9.56-9.56 9.56-25.06 0-34.62z"></path>
        </svg>
      </button>
    </div>

    <div class="bg-white rounded-md shadow overflow-hidden">
      <form @submit.prevent="addPost">
        <div class="p-8 -mr-6 -mb-8 flex flex-wrap">
          <div class="pr-6 pb-8 w-full">
            <label for="text-input-26" class="form-label">Titulo:</label> 
            <input id="text-input-26" type="text" class="form-input" placeholder="Title" v-model="post.title">
          </div> 
          <div class="pr-6 pb-8 w-full">
            <label for="textarea-input-27" class="form-label">Contenido:</label> 
            <textarea id="textarea-input-27" class="form-textarea" v-model="post.content"></textarea>
          </div> 
          <div class="pr-6 pb-8 w-full">
            <label for="select-input-28" class="form-label">Autor:</label> 
            <select v-model="post.userId" class="form-select" label="Autor">
              <option :value="null" />
              <option v-for="user in users" :key="user.id" :value="user.id">{{ user.name }}</option>
            </select>
          </div>
        </div>
        <div class="px-8 py-4 bg-gray-50 border-t border-gray-100 flex justify-end items-center">
          <button class="flex items-center btn-indigo" type="submit">Crear Post</button>
        </div>
      </form>
    </div>
    <br /><br />
    <div class="bg-white rounded-md shadow overflow-x-auto">
      <table class="w-full whitespace-nowrap">
        <tr class="text-left font-bold">
          <th class="px-6 pt-6 pb-4">Titulo</th>
          <th class="px-6 pt-6 pb-4">Contenido</th>
          <th class="px-6 pt-6 pb-4">Autor</th>
          <th class="px-6 pt-6 pb-4">Creado</th>
          <th class="px-6 pt-6 pb-4">Ficha del autor</th>
        </tr>
        <tr v-for="post in posts" class="hover:bg-gray-100 focus-within:bg-gray-100" v-bind:key="post.id">
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
              {{ post.author }}
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
      </table>
    </div>
  </div>
</template>

<script>
import Icon from '@/Shared/Icon'
import pickBy from 'lodash/pickBy'
import Layout from '@/Layouts/DefaultLayout'
import throttle from 'lodash/throttle'
import mapValues from 'lodash/mapValues'
import Pagination from '@/Shared/Pagination'
import SearchFilter from '@/Shared/SearchFilter'

export default {
  metaInfo: { title: 'Posts Api' },
  props: {
    users: Array,
  },
  data() {
      return {
          posts: [],
          post: {
              id: '',
              title: '',
              content: '',
              userId: ''
          },
      };
  },
  created() {
      this.getPosts();
  },
  methods: {
      reset() {
        this.form = mapValues(this.form, () => null)
      },
      getPosts(api_url) {
          // let vm = this;
          api_url = api_url || '/api/posts';
          fetch(api_url)
              .then(response => response.json())
              .then(response => {
                this.posts = response;
              })
              .catch(err => console.log(err));
      },
      addPost() {
          document.getElementById('postErrors').style.display = 'none';
          fetch('api/posts', {
              method: 'post',
              body: JSON.stringify(this.post),
              headers: {
                  'content-type': 'application/json'
              }
          })
          .then(response => response.json())
          .then(response => {
            console.log(response);
            if(response.error === true) {
              document.getElementById('postErrors').className = 'mb-8 flex items-center justify-between bg-red-400 rounded max-w-3xl'
              document.getElementById('postErrors').style.display = 'flex';
              document.getElementById('postErrorsMessage').innerHTML = response.message;
            }
            else {
              document.getElementById('postErrors').className = 'mb-8 flex items-center justify-between bg-green-400 rounded max-w-3xl'
              document.getElementById('postErrors').style.display = 'flex';
              document.getElementById('postErrorsMessage').innerHTML = response.message;
            }
          })
          .then(data => {
              // this.getPosts();
          })
          .catch(err => console.log(err));
      }
  },
  components: {
    Icon,
    Pagination,
    SearchFilter,
  },
  layout: Layout,
  watch: {
    form: {
      deep: true,
      handler: throttle(function () {
        this.$inertia.get(this.route('posts'), pickBy(this.form), { preserveState: true })
      }, 150),
    },
  },
}
</script>
