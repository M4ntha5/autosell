<template>

<div>

<div v-if="!edit">
  add
  <form  @submit.prevent="addAd" class="mb-3">
    <div class="form-group">
      <input type="number" class="form-control"  v-model="ad.price"></input>
    </div>
    <div class="form-group">
      <input type="tel" class="form-control" v-model="ad.phone_no"></input>
    </div>
    <div class="form-group">
      <input type="text" class="form-control" v-model="ad.description"></input>
    </div>
    <div class="form-group">
      <input type="date" class="form-control" v-model="ad.manufacture_date"></input>
    </div>
    <div class="form-group">
      <input type="number" class="form-control" v-model="ad.mileage"></input>
    </div>
    <div class="form-group">
      <input type="number" class="form-control" v-model="ad.engine_power"></input>
    </div>
    <div class="form-group">
      <input type="number" class="form-control" v-model="ad.engine_volume"></input>
    </div>
    <div class="form-group">
      <input type="number" class="form-control" v-model="ad.damage_id"></input>
    </div>
    <div class="form-group">
      <input type="number" class="form-control" v-model="ad.fuel_id"></input>
    </div>
    <div class="form-group">
      <input type="number" class="form-control" v-model="ad.gearbox_id"></input>
    </div>
    <div class="form-group">
      <input type="number" class="form-control" v-model="ad.body_type_id"></input>
    </div>
    <div class="form-group">
      <input type="number" class="form-control" v-model="ad.color_id"></input>
    </div>
    <div class="form-group">
      <input type="number" class="form-control" v-model="ad.steering_wheel_id"></input>
    </div>
    <div class="form-group">
      <input type="number" class="form-control" v-model="ad.number_of_doors_id"></input>
    </div>
    <div class="form-group">
      <input type="number" class="form-control" v-model="ad.driven_wheels_id"></input>
    </div>
    <div class="form-group">
      <input type="number" class="form-control" v-model="ad.climate_control_id"></input>
    </div>
    <div class="form-group">
      <input type="number" class="form-control" v-model="ad.euro_standard_id"></input>
    </div>
    <div class="form-group">
      <input type="number" class="form-control" v-model="ad.brand_id"></input>
    </div>
    <div class="form-group">
      <input type="number" class="form-control" v-model="ad.model_id"></input>
    </div>
    <div class="form-group">
      <input type="number" class="form-control" v-model="ad.user_id"></input>
    </div>

      <button type="submit" class="form-control">Save</button>
  </form>
</div>
<div v-else>
  edit
  <form  @submit.prevent="addAd" class="mb-3">
    <div class="form-group">
      <input type="number" class="form-control"  v-model="ad.price"></input>
    </div>
    <div class="form-group">
      <input type="tel" class="form-control" v-model="ad.phone_no"></input>
    </div>
    <div class="form-group">
      <input type="text" class="form-control" v-model="ad.description"></input>
    </div>
    <div class="form-group">
      <input type="date" class="form-control" v-model="ad.manufacture_date"></input>
    </div>
    <div class="form-group">
      <input type="number" class="form-control" v-model="ad.mileage"></input>
    </div>
    <div class="form-group">
      <input type="number" class="form-control" v-model="ad.engine_power"></input>
    </div>
    <div class="form-group">
      <input type="number" class="form-control" v-model="ad.engine_volume"></input>
    </div>
    <div class="form-group">
      <input type="number" class="form-control" v-model="ad.damage_id"></input>
    </div>
    <div class="form-group">
      <input type="number" class="form-control" v-model="ad.fuel_id"></input>
    </div>
    <div class="form-group">
      <input type="number" class="form-control" v-model="ad.gearbox_id"></input>
    </div>
    <div class="form-group">
      <input type="number" class="form-control" v-model="ad.body_type_id"></input>
    </div>
    <div class="form-group">
      <input type="number" class="form-control" v-model="ad.color_id"></input>
    </div>
    <div class="form-group">
      <input type="number" class="form-control" v-model="ad.steering_wheel_id"></input>
    </div>
    <div class="form-group">
      <input type="number" class="form-control" v-model="ad.number_of_doors_id"></input>
    </div>
    <div class="form-group">
      <input type="number" class="form-control" v-model="ad.driven_wheels_id"></input>
    </div>
    <div class="form-group">
      <input type="number" class="form-control" v-model="ad.climate_control_id"></input>
    </div>
    <div class="form-group">
      <input type="number" class="form-control" v-model="ad.euro_standard_id"></input>
    </div>
    <div class="form-group">
      <input type="number" class="form-control" v-model="ad.brand_id"></input>
    </div>
    <div class="form-group">
      <input type="number" class="form-control" v-model="ad.model_id"></input>
    </div>
    <div class="form-group">
      <input type="number" class="form-control" v-model="ad.user_id"></input>
    </div>
      <button type="submit" class="form-control">Save</button>
  </form>
</div>


  <ul class="list-group" >
     <li class="list-group-item" v-for="ad in ads" v-bind:key="ad.id">
       {{ad.id}} brand: {{ad.brand_id}} model:{{ad.model_id}}
       <span class="badge">fuel:{{ad.fuel_id}}</span>

       <span class="badge">date{{ad.manufacture_date}}</span>
       <span class="badge">gearbox:{{ad.gearbox_id}}</span>
       <span class="badge">body:{{ad.body_type_id}}</span>
       <span class="badge">desc{{ad.description}}</span>
       <span class="badge">price{{ad.price}}</span>
       <hr>
         <button @click="deleteAd(ad.id)" class="btn btn-danger">Delete</button>

         <button @click="editAd(ad)" class="btn btn-warning">edit</button>
      </hr>
     </li>
  </ul>

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
        },
        edit: false,
        ad_id: '',
        pagination: {}
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
      /*fetchAd(id)
      {
        let vm = this;

        fetch(`api/ads/${id}`)
        .then(res => res.json())
        .then(res => {
          this.ad = res;
          vm.makePagination(res);
        })
        .catch(err => console.log(err));
      },*/
      makePagination(res)
      {
        let paginat = {
          current_page: res.current_page,
          last_page: res.last_page,
          next_page_url: res.next_page_url,
          prev_page_url: res.prev_page_url
        };
        this.pagination = paginat;
      },

      deleteAd(id)  //veikia ok
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
          if(!this.edit)
          {
            //add
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
        else
        {
          //update
          fetch(`api/ads/${this.ad_id}`, {
            method: 'put',
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
            alert('Ad updated');
            this.fetchAds();
          })
          .catch(err => console.log(err));
        }
      },
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
      }

      /*editAd()
      {
        if(this.edit)
        {
          console.log(this);
          fetch(`api/ads/${ad.id}`, {
            method: 'put',
            body: JSON.stringify(this.ad),
            headers: {
              'content-type': 'application/json'
            }
          })
          .then(res => res.json())
          .then(data => {
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
            alert('Ad updated');
            this.fetchAds();
          })
          .catch(err => console.log(err));
        }
      }*/
    }
  };
</script>
