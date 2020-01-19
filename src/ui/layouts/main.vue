<template>
  <div id="app" class="app h-screen">
    <nav class="flex items-center justify-between flex-wrap bg-red py-6 lg:sticky top-0 z-50">
      <div class="container mx-auto flex flex-wrap">
        <div class="flex items-center flex-shrink-0 text-white mr-6 h-12">
          <img class="flex items-center max-h-full" src="https://res.cloudinary.com/adaptcms/image/upload/c_fill,q_90,w_150/v1502477866/AdaptCMSLogoPNG_2_vyfnqf.png" />
        </div>
        <div class="block my-auto ml-auto lg:hidden">
          <button id="toggle-menu" class="flex items-center px-3 py-2 border rounded text-white border-white hover:text-white hover:border-white">
            <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <title>Menu</title>
              <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/>
            </svg>
          </button>
        </div>

        <div id="menu" class="w-full block flex-grow flex-wrap lg:flex lg:items-center lg:text-right lg:w-auto hidden">
          <ul class="text-sm lg:flex-grow lg:pr-5">
            <li class="block mt-6 lg:inline-block lg:mt-0 text-teal-200 hover:text-white lg:mr-6">
              <a :href="$route('home')" class="font-semibold lg:font-normal">
                Home
              </a>
            </li>

            <li class="group block mt-4 lg:py-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white lg:mr-6 relative">
                <a href="#" class="font-semibold lg:font-normal">
                  List of Things <span class="caret inline-block ml-1">&or;</span>
                </a>
                <ul class="w-56 lg:mt-4 lg:-ml-3 text-left lg:absolute relative lg:border-t-2 lg:border-black py-3 pl-3 lg:px-8 bg-red lg:text-black font-normal lg:font-semibold lg:hidden group-hover:block">
                  <li
                    class="mt-4 lg:mt-0 lg:py-2"
                  >
                    <a href="#">
                      did is a test
                    </a>
                  </li>
                </ul>
            </li>

            <li class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white lg:mr-6">
              <a href="#" class="font-semibold lg:font-normal">
                Store
              </a>
            </li>

            <li class="group block mt-4 lg:py-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white lg:mr-6 relative">
              <a href="#" class="font-semibold lg:font-normal">
                About <span class="caret inline-block ml-1">&or;</span>
              </a>

              <ul class="w-56 lg:mt-4 lg:-ml-3 text-left lg:absolute relative lg:border-t-2 lg:border-black py-3 pl-3 lg:px-8 bg-red lg:text-black font-normal lg:font-semibold lg:hidden group-hover:block">
                <li class="mt-4 lg:mt-0 lg:py-2">
                  <a href="#">How to Register</a>
                </li>
                <li class="mt-4 lg:mt-0 lg:py-2">
                  <a href="#">Join Email List</a>
                </li>
              </ul>
            </li>

            <li
              v-if="!user"
              class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white"
            >
              <a :href="$route('login')" class="font-semibold lg:font-normal">
                Login
              </a>
            </li>
          </ul>

          <div v-if="user">
            <a
              :href="$route('logout')"
              class="inline-block text-sm px-4 py-2 leading-none border rounded-full text-black bg-white border-white hover:border-transparent hover:text-white hover:bg-black mt-4 lg:mt-0"
            >
              Logout
            </a>
          </div>
        </div>
      </div>
    </nav>

    <div class="content h-auto">
      <slot />

      <template v-if="flashMessage">
        <div
          class="w-56 fixed right-0 top-0 p-6 text-sm shadow text-white bg-blue rounded mr-4 mt-4 z-50 text-sm text-center"
        >
          {{ flashMessage }}
        </div>
      </template>
    </div>

    <div class="top-divider w-full"></div>

    <div id="footer" class="bg-black pt-8 pb-12 w-full">
      <div class="container mx-auto">
        <div class="flex flex-wrap mb-4 w-full">
          <div class="w-full md:w-1/3 h-auto items-center pr-10">
            <img class="mb-5" src="https://res.cloudinary.com/adaptcms/image/upload/c_fill,q_90,w_150/v1502477866/AdaptCMSLogoPNG_2_vyfnqf.png" />
            <a href="#" class="inline-block text-sm px-4 py-2 leading-none border rounded-full text-white bg-red border-red hover:border-transparent hover:text-black hover:bg-white mt-4 lg:mt-0">
              Join our Email List
            </a>
          </div>

          <div class="w-full md:w-2/3 md:pl-10 h-auto">
            <a name="contact-form" />
            <form
              class="w-full mt-10 md:mt-0 md:float-right md:pl-16 flex flex-wrap"
              @submit.prevent="submitContactForm"
            >
              <div class="w-full md:w-1/2 mb-5 md:pr-3">
                <input
                  class="py-4 px-3 w-full text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-grey-500"
                  type="text"
                  placeholder="Name"
                  v-model="contactForm.name"
                />

                <div
                  v-if="errors.name"
                  class="flex items-center w-full p-2 bg-red shadow text-white mb-1 mt-1 text-sm"
                >
                  <span class="ml-1">{{ errors.name[0] }}</span>
                </div>
              </div>

              <div class="w-full md:w-1/2 mb-5 md:pl-3">
                <input
                  class="py-4 px-3 w-full text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-grey-500"
                  type="email"
                  placeholder="Email Address"
                  v-model="contactForm.email"
                />

                <div
                  v-if="errors.email"
                  class="flex items-center w-full p-2 bg-red shadow text-white mb-1 mt-1 text-sm"
                >
                  <span class="ml-1">{{ errors.email[0] }}</span>
                </div>
              </div>

              <div class="w-full mb-5">
                <select
                  class="px-3 h-12 w-full text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-grey-500"
                  placeholder="What city are you in?"
                  v-model="contactForm.market_id"
                >
                  <option
                    v-for="market in $page.markets_list"
                    :key="market.id"
                    :value="market.id"
                  >
                    {{ market.name }}, {{ market.state }}
                  </option>
                </select>

                <div
                  v-if="errors.market_id"
                  class="flex items-center w-full p-2 bg-red shadow text-white mb-1 mt-1 text-sm"
                >
                  <span class="ml-1">The city field is required.</span>
                </div>
              </div>

              <div class="w-full mb-5">
                <textarea
                  class="py-4 px-3 w-full text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-grey-500"
                  placeholder="Message"
                  rows="4"
                  v-model="contactForm.message"
                />

                <div
                  v-if="errors.message"
                  class="flex items-center w-full p-2 bg-red shadow text-white mb-1 text-sm"
                >
                  <span class="ml-1">{{ errors.message[0] }}</span>
                </div>
              </div>

              <div class="w-full mb-5 text-right">
                <button type="submit" class="text-md px-4 py-2 leading-none border rounded-full text-white bg-red border-red hover:border-transparent hover:text-black hover:bg-white mt-4 lg:mt-0">
                  Submit
                </button>
              </div>
            </form>
          </div>
        </div>

        <div class="w-full h-auto text-center pt-5">
          <p class="mb-5 text-xs text-gray">
            <a href="#">Privacy Policy</a> | <a href="#">Terms and Conditions</a>
          </p>
          <p class="text-xs text-gray">
            &copy; Copyright 2020 <a class="underline" href="https://www.adaptcms.com" target="_blank">AdaptCMS</a>.
            All Rights Reserved.
          </p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import get from 'lodash.get'

export default {
  props: {
    title: String
  },

  watch: {
    flashMessage (newVal, oldVal) {
      if (newVal && (newVal !== oldVal)) {
        setTimeout(() => {
          this.$set(this.$page, 'flash', {
            message: null
          })
        }, 2500)
      }
    }
  },

  computed: {
    user () {
      return get(this.$page, 'auth.user', null)
    },

    flashMessage () {
      return get(this.$page, 'flash.message', null)
    }
  },

  data () {
    return {
      contactForm: {
        name: null,
        email: null,
        market_id: null,
        message: null
      },
      errors: {},
      notification: {
        enabled: false,
        type: 'success',
        message: null
      }
    }
  },

  methods: {
    async submitContactForm () {
      this.errors = {}

      // get form data
      let formUrl = this.$route('submit-contact-form')

      // ajax request
      try {
        await axios.post(formUrl, this.contactForm)

        this.contactForm = {
          name: null,
          email: null,
          market_id: null,
          message: null
        }

        this.$set(this.notification, 'enabled', true)
        this.$set(this.notification, 'message', 'Contact form has been submitted.')

        setTimeout(() => {
          this.$set(this.notification, 'enabled', false)
          this.$set(this.notification, 'message', null)
        }, 2500)
      } catch (err) {
        let errors = get(err, 'response.data.errors')

        this.errors = errors
      } finally {
        //
      }
    }
  }
}
</script>
