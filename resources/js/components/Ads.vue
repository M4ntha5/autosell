<template>


  <!--  <form @submit.prevent="addAd()" class="mb-3">
    <div class="form-group">
      <input type="text" class="form-control" placeholder="price" v-model="ad.price"></input>
    </div>
    <div class="form-group">
      <input type="text" class="form-control" placeholder="img" v-model="ad.image"></input>
    </div>
  </form> -->

<!--    <div class="col-4" v-for="ad in ads" v-bind:key="ad.id">
      <h2>{{ad.phone_no}}</h2>
      <h3>{{ad.price}}</h3>
      <h4>id{{ad.id}}</h4>

      <hr>
        <button @click="deleteAd(ad.id)" class="btn btn-danger">Delete</button>
      </hr>

    </div>
-->



  <ul class="list-group pt-5" >
     <li class="list-group-item" v-for="ad in ads" v-bind:key="ad.id">{{ad.phone_no}}
       <span class="badge">{{ad.price}}</span>
       <span class="badge">id{{ad.id}}</span>
     </li>
  </ul>

<!--
  <nav aria-label="page navigation example">
    <ul class="pagination">
      <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item">
        <a class="page-link" href="#" @click="fetchAds(pagination.prev_page_url)" >Previous</a>
      </li>

      <li class="page-item disabled">
        <a class="page-link text-dark" href="#">Page {{pagination.current_page}} of {{pagination.last_page}}</a>
      </li>

      <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item">
        <a class="page-link" href="#" @click="fetchAds(pagination.next_page_url)">Next</a>
      </li>
    </ul>
  </nav>
-->

</template>


<script>
  export default
  {
    data() {
      return {
        ads: [],
        ad: {
          price: '',
          image: '',
          phone_no: '',
          description: '',
          manufacture_date: '',
          mileage: '',
          engine_power: '',
          engine_volume: '',
          damage_id: '',
          fuel_id: '',
          gearbox_id: '',
          body_type_id: '',
          color_id: '',
          steering_wheel_id: '',
          number_of_doors_id: '',
          driven_wheels_id: '',
          climate_control_id: '',
          euro_standard_id: '',
          brand_id: '',
          euro_standard_id: ''
        },
        pagination: {}
      };
    },
    created() {
      this.fetchAds();
    },

    methods:
    {
      fetchAds(page_url)
      {
        let vm = this;
        page_url = page_url || '/api/ads';
        fetch(page_url)
        .then(res => res.json())
        .then(res => {
          this.ads = res.data;
          vm.makePagination(res);
        })
        .catch(err => console.log(err));
      },
      makePagination(res)
      {
        let pagination = {
          current_page: res.current_page,
          last_page: res.last_page,
          next_page_url: res.next_page_url,
          prev_page_url: res.prev_page_url
        };
        this.pagination = pagination;
      },
      deleteAd(id)
      {
        if(confirm('really??'))
        {
          fetch(`api/ads/${id}`, {
            method: 'delete'
          })
          .then(res => {
            alert('Ad removed');
            this.fetchAds();
          })
          .catch(err => console.log(err));
        }
      },
      addAd()
      {
        fetch('api/ads', {
          method: 'post',
          body: JSON.stringify(this.ad),
          headers: {
            'content-type': 'application/json'
          }
        })
        .then(res => res.json())
        .then(data => {
          this.ad.price ='';
          this.ad.phone_no = '';
          alert('Ad added');
          this.fetchAds();
        })
        .catch(err => console.log(err));
      }
    }
  };
</script>
