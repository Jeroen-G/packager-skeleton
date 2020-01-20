<template>
  <div>
    <h1>Sample</h1>

    <h2>{{ vendorName }} - {{ packageName }}</h2>

    <ul v-if="items.length">
      <li
        v-for="(item, key) in items"
        :key="`item-${key}`"
      >
        {{ item }}
      </li>
    </ul>
  </div>
</template>

<script>
import get from 'lodash.get'
import Layout from '../../../../../Adaptcms/Base/ui/layouts/layout'

export default {
  layout: (h, page) => h(Layout, [ page ]),

  computed: {
    vendorName () {
      return get(this.$page, 'vendor', null)
    },

    packageName () {
      return get(this.$page, 'package', null)
    },

    items () {
      return get(this.$page, 'items', [])
    }
  }
}
</script>
