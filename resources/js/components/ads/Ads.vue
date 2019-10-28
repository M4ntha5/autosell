<template>

<div>

  <div v-show="show">
    <div v-show="!edit">
      <form  @submit.prevent="addAd" enctype="multipart/form-data" class="mb-3">
        Foto:
        <div>
          <input type="file" @change="onFileSelected" class="form-control"></input>
        </div>
        Kaina:
        <div class="form-group">
          <input type="number" class="form-control"  v-model="ad.price"></input>
        </div>
        Tel. nr.
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
          <input type="number" class="form-control" v-model="ad.damage_id"></input>
        </div>
        Kuro tipas
        <div class="form-group">
          <input type="number" class="form-control" v-model="ad.fuel_id"></input>
        </div>
        Pavaru deze
        <div class="form-group">
          <input type="number" class="form-control" v-model="ad.gearbox_id"></input>
        </div>
        Kebulo tipas
        <div class="form-group">
          <input type="number" class="form-control" v-model="ad.body_type_id"></input>
        </div>
        Spalva
        <div class="form-group">
          <input type="number" class="form-control" v-model="ad.color_id"></input>
        </div>
        Vairo padetis
        <div class="form-group">
          <input type="number" class="form-control" v-model="ad.steering_wheel_id"></input>
        </div>
        Duru skaicius
        <div class="form-group">
          <input type="number" class="form-control" v-model="ad.number_of_doors_id"></input>
        </div>
        Varomieji ratai
        <div class="form-group">
          <input type="number" class="form-control" v-model="ad.driven_wheels_id"></input>
        </div>
        Klimato valdymas
        <div class="form-group">
          <input type="number" class="form-control" v-model="ad.climate_control_id"></input>
        </div>
        Euro standartas
        <div class="form-group">
          <input type="number" class="form-control" v-model="ad.euro_standard_id"></input>
        </div>
        Gamintojas
        <div class="form-group">
          <input type="number" class="form-control" v-model="ad.brand_id"></input>
        </div>
        Modelis
        <div class="form-group">
          <input type="number" class="form-control" v-model="ad.model_id"></input>
        </div>
        Pradavejas
        <div class="form-group">
          <input type="number" class="form-control" v-model="ad.user_id"></input>
        </div>
          <button type="submit" class="form-control">Save</button>
      </form>
    </div>
    <div v-show="edit">
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
  </div>

  <button class="btn btn-primary float-right" @click="showCreate">Sukurti nauja</button>

  <div class="pt-5" v-for="ad in ads" v-bind:key="ad.id">
    <div class="card" >
      <div class="card-body" >
        <div class="row mb-3">
          <div class="col-4">
            <a v-bind:href="'/ads/'+ ad.id">
              <img :src="'/storage/images/'+ ad.image" width="240px" height="180px" class="img-fluid" alt="Responsive image">
            </a>
          </div>
          <div class="col-8">
            <a v-bind:href="'/ads/'+ ad.id">
              <h1>{{ad.brand}} {{ad.model}}, {{ad.engine_volume}} l., {{ad.body_type}}</h1>
            </a>
            <h2><b>{{ad.price}} €</b></h2>
            <p>{{ad.manufacture_date}} {{ad.gearbox}} {{ad.mileage}} km</p>
            <p>{{ad.fuel}} {{ad.engine_power}} kW</p>
          </div>
        </div>
        <button @click="editAd(ad)" class="btn btn-primary">Redaguoti</button>

        <button @click="deleteAd(ad.id)" class="btn btn-danger">Istrinti</button>
      </div>
    </div>
  </div>




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
        },
        edit: false,
        show: false,
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

      deleteAd(id)  //veikia ok
      {
        if(confirm('Ar tikrai norite pasalinti?'))
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
              this.ad.phone_no = '';
              this.ad.description = '';
              this.ad.manufacture_date = '';
              this.ad.mileage = '';
              this.ad.engine_power = '';
              this.ad.engine_volume = '';
              this.ad.fuel_id = '';
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
              this.show = false;
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
            this.ad.image ='';
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
            this.show = false;
            this.fetchAds();
          })
          .catch(err => console.log(err));
        }
      },
      editAd(ad)
      {
        this.edit =true;
        this.show =true;
        this.ad_id = ad.id;
        this.ad.id = ad.id;
        this.ad.price = ad.price;
        this.ad.image =ad.image;
        this.ad.phone_no = ad.phone_no;
        this.ad.description = ad.description;
        this.ad.manufacture_date = ad.manufacture_date;
        this.ad.mileage = ad.mileage;
        this.ad.engine_power = ad.engine_power;
        this.ad.engine_volume = ad.engine_volume;
        this.ad.damage_id = ad.damage;
        this.ad.fuel_id = ad.fuel;
        this.ad.gearbox_id = ad.gearbox;
        this.ad.body_type_id = ad.body_type;
        this.ad.color_id = ad.color;
        this.ad.steering_wheel_id = ad.steering_wheel;
        this.ad.number_of_doors_id = ad.number_of_doors;
        this.ad.driven_wheels_id = ad.driven_wheels;
        this.ad.climate_control_id = ad.climate_control;
        this.ad.euro_standard_id = ad.euro_standard;
        this.ad.brand_id =ad.brand;
        this.ad.model_id = ad.model;
        this.ad.user_id = ad.user;
      },
      onFileSelected(e)
      {
        var reader = new FileReader();
        reader.readAsDataURL(e.target.files[0]);
        reader.onload = (e) => {
            this.ad.image = e.target.result;
        }
      },
      showCreate()
      {
        this.show = true;
      }

    }
  };
</script>
