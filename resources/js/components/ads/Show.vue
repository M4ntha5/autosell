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

</script>
