<template>
<div>

  <table>

    <img :src="'/storage/images/'+ ad.image" class="img-fluid" alt="Responsive image">

    <tr>
      <td>{{ad.price}}</td>
    </tr>
    <tr>
      <td>{{ad.phone_no}}</td>
    </tr>
    <tr>
      <td>{{ad.description}}</td>
    </tr>

    <tr>
      <td>{{ad.manufacture_date}}</td>
    </tr>
    <tr>
      <td>{{ad.mileage}}</td>
    </tr>
    <tr>
      <td>{{ad.engine_power}}</td>
    </tr>

    <tr>
      <td>{{ad.engine_volume}}</td>
    </tr>
    <tr>
      <td>{{ad.damage}}</td>
    </tr>
    <tr>
      <td>{{ad.fuel}}</td>
    </tr>

    <tr>
      <td>{{ad.gearbox}}</td>
    </tr>
    <tr>
      <td>{{ad.body_type}}</td>
    </tr>

    <tr>
      <td>{{ad.color}}</td>
    </tr>
    <tr>
      <td>{{ad.steering_wheel}}</td>
    </tr>
    <tr>
      <td>{{ad.number_of_doors}}</td>
    </tr>
    <tr>
      <td>{{ad.driven_wheels}}</td>
    </tr>
    <tr>
      <td>{{ad.climate_control}}</td>
    </tr>
    <tr>
      <td>{{ad.euro_standard}}</td>
    </tr>
    <tr>
      <td>{{ad.brand}}</td>
    </tr>
    <tr>
      <td>{{ad.model}}</td>
    </tr>
    <tr>
      <td>{{ad.user}}</td>
    </tr>
  </table>
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
      fetchAds() 
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
      }
    }
  };
</script>
