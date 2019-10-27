<template>

<div>
    add
    <form  @submit.prevent="addAd" class="mb-3">
      Nuotrauka:
      <div>
        <input type="file" @change="onFileSelected" class="form-control"></input>
      </div>
      Kaina:
      <div class="form-group">
        <input type="number" class="form-control"  v-model="ad.price"></input>
      </div>
      Tel. nr
      <div class="form-group">
        <input type="tel" class="form-control" v-model="ad.phone_no"></input>
      </div>
      Aprasymas
      <div class="form-group">
        <input type="text" class="form-control" v-model="ad.description"></input>
      </div>
      Pagaminimo data
      <div class="form-group">
        <input type="date" class="form-control" v-model="ad.manufacture_date"></input>
      </div>
      Rida
      <div class="form-group">
        <input type="number" class="form-control" v-model="ad.mileage"></input>
      </div>
      Variklio galia
      <div class="form-group">
        <input type="number" class="form-control" v-model="ad.engine_power"></input>
      </div>
      Variklio turis
      <div class="form-group">
        <input type="number" class="form-control" v-model="ad.engine_volume"></input>
      </div>
      Zala
      <div class="form-group">
        <input type="text" class="form-control" v-model="ad.damage_id"></input>
      </div>
      Kuro tipas
      <div class="form-group">
        <input type="text" class="form-control" v-model="ad.fuel_id"></input>
      </div>
      Pavaru deze
      <div class="form-group">
        <input type="text" class="form-control" v-model="ad.gearbox_id"></input>
      </div>
      Kebulo tipas
      <div class="form-group">
        <input type="text" class="form-control" v-model="ad.body_type_id"></input>
      </div>
      Spalva
      <div class="form-group">
        <input type="text" class="form-control" v-model="ad.color_id"></input>
      </div>
      Vairo padetis
      <div class="form-group">
        <input type="text" class="form-control" v-model="ad.steering_wheel_id"></input>
      </div>
      Duru skaicius
      <div class="form-group">
        <input type="text" class="form-control" v-model="ad.number_of_doors_id"></input>
      </div>
      Varomieji ratai
      <div class="form-group">
        <input type="text" class="form-control" v-model="ad.driven_wheels_id"></input>
      </div>
      Climato valdymas
      <div class="form-group">
        <input type="text" class="form-control" v-model="ad.climate_control_id"></input>
      </div>
      Euro standartas
      <div class="form-group">
        <input type="text" class="form-control" v-model="ad.euro_standard_id"></input>
      </div>
      Marke
      <div class="form-group">
        <input type="text" class="form-control" v-model="ad.brand_id"></input>
      </div>
      Modelis
      <div class="form-group">
        <input type="text" class="form-control" v-model="ad.model_id"></input>
      </div>
      Pardavejas
      <div class="form-group">
        <input type="text" class="form-control" v-model="ad.user_id"></input>
      </div>
        <button type="submit" class="form-control">Save</button>
    </form>
</div>


</template>

<script>
import axios from 'axios';

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
          damage: '',
          fuel: '',
          gearbox: '',
          body_type: '',
          color: '',
          steering_wheel: '',
          number_of_doors: '',
          driven_wheels: '',
          climate_control: '',
          euro_standard: '',
          brand: '',
          model: '',
          user: ''
        }
      };
    },
    created() {
      this.fetchAds();
    },

    methods:
    {
      fetchAds(page_url)  //veikia ok
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
      },
      onFileSelected(e)
      {
        var reader = new FileReader();
        reader.readAsDataURL(e.target.files[0]);
        reader.onload = (e) => {
            this.ad.image = e.target.result;
        }
      }
    }
  };
</script>
