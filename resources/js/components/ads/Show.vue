<template>

  <ul class="list-group" >
     <li class="list-group-item">
       <a v-bind:href="'/ads/'+ ad.id"></a>

        brand: model:
       <span class="badge">fuel:</span>

       <span class="badge">date</span>
       <span class="badge">gearbox:</span>
       <span class="badge">body:</span>
       <span class="badge">desc</span>
       <span class="badge">price</span>
     </li>
  </ul>


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
      this.fetchAd();
    },
    methods:
    {
      fetchAd(ad)
      {
        /*page_url = `/api/ads${id}`;*/
        fetch(`/api/ads/${ad.id}`)
        .then(res => res.json())
        .then(res => {
          console.log(res);
        })
        .catch(err => console.log(err));
      }
    }
  }
/*
editAd(ad)
{
  this.edit =true;
  this.ad_id = ad.id;
  this.ad.id = ad.id;
  this.ad.price = ad.price;
  this.ad.image =null;
  this.ad.phone_no = ad.phone_no;
  this.ad.description = ad.description;
  this.ad.manufacture_date = ad.manufacture_date;
  this.ad.mileage = ad.mileage;
  this.ad.engine_power = ad.engine_power;
  this.ad.engine_volume = ad.engine_volume;
  this.ad.damage_id = ad.damage_id;
  this.ad.fuel_id = ad.fuel_id;
  this.ad.gearbox_id = ad.gearbox_id;
  this.ad.body_type_id = ad.body_type_id;
  this.ad.color_id = ad.color_id;
  this.ad.steering_wheel_id = ad.steering_wheel_id;
  this.ad.number_of_doors_id = ad.number_of_doors_id;
  this.ad.driven_wheels_id = ad.driven_wheels_id;
  this.ad.climate_control_id = ad.climate_control_id;
  this.ad.euro_standard_id = ad.euro_standard_id;
  this.ad.brand_id =ad.brand_id;
  this.ad.model_id = ad.model_id ;
  this.ad.user_id = ad.user_id;
}*/
</script>
