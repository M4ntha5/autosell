<template>
<div>
  <div>
    <h1>{{ad.brand}} {{ad.model}}, {{ad.engine_volume}} l., {{ad.body_type}}</h1>
    <h5>Kaina </h5>

    <button @click="editAd(ad)" class="btn btn-primary" style="float: right;">Redaguoti</button>

    <button @click="deleteAd(ad.id)" class="btn btn-danger" style="float: right;">Istrinti</button>
    
    <h2 style="color:blue;">{{ad.price}} €</h2>
        <div class="row mb-3">

          <div class="col-4">
              <img :src="'/storage/images/'+ ad.image" width="505px" height="375px" class="img-fluid" alt="Responsive image">
          </div>
          <div class="col-8">
          <br>
            <table class="table ">
              <tr>
                <th>Pagaminimo data</th>
                <td>{{ad.manufacture_date}}</td>
              </tr>
              <tr>
                <th>Variklis</th>
                <td>{{ad.engine_volume*1000}} cm3, ({{ad.engine_power}} Kw)</td>
              </tr>
              <tr>
                <th>Kuro tipas</th>
                <td>{{ad.fuel}}</td>
              </tr>
              <tr>
                <th>Defektai</th>
                <td>{{ad.damage}}</td>
              </tr>
              <tr>
                <th>Kebulo tipas</th>
                <td>{{ad.body_type}}</td>
              </tr>
              <tr>
                <th>Varantieji ratai</th>
                <td>{{ad.driven_wheels}}</td>
              </tr>
              <tr>
                <th>Pavaru deze</th>
                <td>{{ad.gearbox}}</td>
              </tr>
              <tr>
                <th>Klimato valdymas</th>
                <td>{{ad.climate_control}}</td>
              </tr>
              <tr>
                <th>Vairo padetis</th>
                <td>{{ad.steering_wheel}}</td>
              </tr>
              <tr>
                <th>Spalva</th>
                <td>{{ad.color}}</td>
              </tr>
              <tr>
                <th>Duru skaicius</th>
                <td>{{ad.number_of_doors}}</td>
              </tr>
              <tr>
                <th>Euro standartas</th>
                <td>{{ad.euro_standard}}</td>
              </tr>

            </table>
          </div>
        </div>
        <H1 clas="pt-5 mb-5">Iranga</H1>


        <table class="table mt-5" >
          <tbody  >
            <tr v-for="eq in equipment" v-bind:key="eq.id">
              <td >{{eq.features}}</td>
            </tr>

          </tbody>
        </table>

    </div>
</div>

</template>

<script>
  export default
  {
    data() {
      return {
        equipment: [],
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
          this.ad = res.data[0];
          this.equipment = res.equipment;
        })
        .catch(err => console.log(err));
      }
    }
  };
</script>
