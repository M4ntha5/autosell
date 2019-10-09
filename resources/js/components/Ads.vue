<template>
  <div>
    <h2>Ads</h2>
    <div class="card card-body mb-2" v-for="ad in ads" v-bind:key="ad.id">
      <h3>{{ad.phone_no}}</h3>
      <p>{{ad.price}}</p>
    </div>
  </div>
</template>


<script>
  export default {
    data() {
      return {
        ads: [],
        ad: {
          phone_no: '',
          price: ''
        },
        pagination: {}
      };
    },
    created() {
      this.fetchAds();
    },

    methods: {
      fetchAds() {
        fetch('http://127.0.0.1:8000/api/ads')
        .then(res => res.json())
        .then(res => {
          this.ads = res.data;
        });
      }
    }
  };
</script>
