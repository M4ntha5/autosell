<template>

<div>
    add
    <form  @submit.prevent="addAd" class="mb-3">
      <div class="form-group">
        <input type="number" class="form-control" placeholder="price" v-model="ad.price"></input>
      </div>
      <div class="form-group">
        <input type="tel" class="form-control" placeholder="phone number" v-model="ad.phone_no"></input>
      </div>
      <div class="form-group">
        <input type="text" class="form-control" placeholder="description" v-model="ad.description"></input>
      </div>
      <div class="form-group">
        <input type="date" class="form-control"  v-model="ad.manufacture_date"></input>
      </div>
      <div class="form-group">
        <input type="number" class="form-control" placeholder="mileage" v-model="ad.mileage"></input>
      </div>
      <div class="form-group">
        <input type="number" class="form-control" placeholder="engine power" v-model="ad.engine_power"></input>
      </div>
      <div class="form-group">
        <input type="number" class="form-control" placeholder="engine volume" v-model="ad.engine_volume"></input>
      </div>
      <div class="form-group">
        <input type="number" class="form-control" placeholder="damage" v-model="ad.damage_id"></input>
      </div>

      
      <div class="form-group">
        <input type="number" class="form-control" placeholder="price" v-model="ad.fuel_id"></input>
      </div>


      <div class="form-group">
        <input type="number" class="form-control" placeholder="price" v-model="ad.gearbox_id"></input>
      </div>
      <div class="form-group">
        <input type="number" class="form-control" placeholder="price" v-model="ad.body_type_id"></input>
      </div>
      <div class="form-group">
        <input type="number" class="form-control" placeholder="price" v-model="ad.color_id"></input>
      </div>
      <div class="form-group">
        <input type="number" class="form-control" placeholder="price" v-model="ad.steering_wheel_id"></input>
      </div>
      <div class="form-group">
        <input type="number" class="form-control" placeholder="price" v-model="ad.number_of_doors_id"></input>
      </div>
      <div class="form-group">
        <input type="number" class="form-control" placeholder="price" v-model="ad.driven_wheels_id"></input>
      </div>
      <div class="form-group">
        <input type="number" class="form-control" placeholder="price" v-model="ad.climate_control_id"></input>
      </div>
      <div class="form-group">
        <input type="number" class="form-control" placeholder="price" v-model="ad.euro_standard_id"></input>
      </div>
      <div class="form-group">
        <input type="number" class="form-control" placeholder="price" v-model="ad.brand_id"></input>
      </div>
      <div class="form-group">
        <input type="number" class="form-control" placeholder="price" v-model="ad.model_id"></input>
      </div>
      <div class="form-group">
        <input type="number" class="form-control" placeholder="price" v-model="ad.user_id"></input>
      </div>

        <button type="submit" class="form-control">issaugoti</button>
    </form>
</div>


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
          model_id: '',
          user_id: ''
        }
      };
    },
    created() {
      this.fetchAds();
    },
    methods:
    {
      fetchAds()  //veikia ok
      {
        let path = window.location.pathname;
        //Break the path into segments
        let segments = path.split("/");

        let page_url = `/api/ads/${segments[2]}`;
        fetch(page_url)
        .then(res => res.json())
        .then(res => {
          this.ad = res[0];
        })
        .catch(err => console.log(err));
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
          this.ad.image =null;
          this.ad.phone_no = '';
          this.ad.description = '';
          this.ad.manufacture_date = '';
          this.ad.mileage = '';
          this.ad.engine_power = '';
          this.ad.engine_volume = '';
          this.ad.damage_id = '';
          this.ad.fuel_id = '';
          this.ad.gearbox_id = '';
          this.ad.body_type_id = '';
          this.ad.color_id = '';
          this.ad.steering_wheel_id = '';
          this.ad.number_of_doors_id = '';
          this.ad.driven_wheels_id = '';
          this.ad.climate_control_id = '';
          this.ad.euro_standard_id = '';
          this.ad.brand_id = '';
          this.ad.model_id = '';
          this.ad.user_id = '';
          alert('Ad added');
          this.fetchAds();
        })
        .catch(err => console.log(err));
      }
    }
  };
</script>
