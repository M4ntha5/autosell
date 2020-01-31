<template>
<div>

  <div v-show="edit_ad">
      <form @submit="checkForm" @submit.prevent="updateAd" class="mb-3">
        
        <div class="form-group">
          <label>Gamintojas</label>
          <select class="form-control" v-model='ad_edit.brand_id' v-on:click='getBrands()' @change='getBrandModels()' required>
            <option value="0">Pasirinkti</option>
            <option v-for='data in brands' :key='data.id' :value='data.id'>{{data.name}}</option>
          </select>
        </div>

        <div class="form-group">
          <label>Modelis</label>
          <select class="form-control" v-model='ad_edit.model_id' v-on:click='getBrandModels()' required>
            <option value="0">Pasirinkti</option>
            <option v-for='data in models' :key='data.id' :value='data.id'>{{data.name}}</option>
          </select>
        </div>

        <div class="form-row">
            <label for="phone_ne">Pagaminimo data</label>
            <input type="date" class="form-control" v-model="ad_edit.manufacture_date" required>
        </div>
        
        <div class="form-row">
            <label for="phone_ne">Variklio galia (kw)</label>
            <input type="number" min="0" class="form-control" v-model="ad_edit.engine_power" required>
        </div>

        <div class="form-row">
            <label>Variklio turis (cm<sup>3</sup>)</label>
            <input type="number" min="0" class="form-control" v-model="ad_edit.engine_volume" required>
        </div>

        <div class="form-group">
          <label>Defektai</label>
          <select class="form-control" v-model='ad_edit.damage_id' required>
            <option value="0">Pasirinkti</option>
            <option v-for='data in damages' :key='data.id' :value='data.id'>{{data.name}}</option>
          </select>
        </div>
        
        <div class="form-group">
          <label>Kuro tipas</label>
          <select class="form-control" v-model='ad_edit.fuel_id' required>
            <option value="0">Pasirinkti</option>
            <option v-for='data in fuelTypes' :key='data.id' :value='data.id'>{{data.name}}</option>
          </select>
        </div>
        
        <div class="form-group">
          <label>Pavaru deze</label>
          <select class="form-control" v-model='ad_edit.gearbox_id' required>
            <option value="0">Pasirinkti</option>
            <option v-for='data in gearboxes' :key='data.id' :value='data.id'>{{data.name}}</option>
          </select>
        </div>
        
        <div class="form-group">
          <label>Kebulo tipas</label>
          <select class="form-control" v-model='ad_edit.body_type_id' required>
            <option value="0">Pasirinkti</option>
            <option v-for='data in bodyTypes' :key='data.id' :value='data.id'>{{data.name}}</option>
          </select>
        </div>

        <div class="form-group">
          <label>Kliamto valdymas</label>
          <select class="form-control" v-model='ad_edit.climate_control_id' required>
            <option value="0">Pasirinkti</option>
            <option v-for='data in climateControls' :key='data.id' :value='data.id'>{{data.name}}</option>
          </select>
        </div>

        <div class="form-group">
          <label>Vairo padetis</label>
          <select class="form-control" v-model='ad_edit.steering_wheel_id' required>
            <option value="0">Pasirinkti</option>
            <option v-for='data in steeringWheels' :key='data.id' :value='data.id'>{{data.name}}</option>
          </select>
        </div>

        <div class="form-group">
          <label>Spalva</label>
          <select class="form-control" v-model='ad_edit.color_id' required>
            <option value="0">Pasirinkti</option>
            <option v-for='data in colors' :key='data.id' :value='data.id'>{{data.name}}</option>
          </select>
        </div>

        <div class="form-group">
          <label>Duru skaicius</label>
          <select class="form-control" v-model='ad_edit.number_of_doors_id'  required>
            <option value="0">Pasirinkti</option>
            <option v-for='data in doors' :key='data.id' :value='data.id'>{{data.name}}</option>
          </select>
        </div>

        <div class="form-group">
          <label>Varomieji ratai</label>
          <select class="form-control" v-model='ad_edit.driven_wheels_id'  required>
            <option value="0">Pasirinkti</option>
            <option v-for='data in drivenWheels' :key='data.id' :value='data.id'>{{data.name}}</option>
          </select>
        </div>

        <div class="form-group">
          <label>Euro standartas</label>
          <select class="form-control" v-model='ad_edit.euro_standard_id' required>
            <option value="0">Pasirinkti</option>
            <option v-for='data in euroStandards' :key='data.id' :value='data.id'>{{data.name}}</option>
          </select>
        </div>

        <div class="form-row">
            <label for="phone_ne">Rida</label>
            <input type="number" min="0" class="form-control" v-model="ad_edit.mileage" required>
        </div>

        <div class="form-row">
            <label for="price">Kaina</label>
            <input type="number" class="form-control" id="price" placeholder="5000" required v-model="ad_edit.price">
        </div>

        <div class="form-row">
            <label for="phone_ne">Tel. nr.</label>
            <input type="tel" class="form-control" id="phone_ne" placeholder="860000000" required v-model="ad_edit.phone_no">
        </div>

        <div class="form-row">
            <label for="phone_ne">Aprasymas</label>
            <textarea type="textarea" class="form-control" v-model="ad_edit.description"></textarea>
        </div>

        <div class="form-row">
            <label for="price">Nuotrauka</label>
            <input type="file" @change="onFileSelected" class="form-control">
        </div>
        <div class="form-row mt-3">
            <button type="submit" class="form-control">Issaugoti</button>
        </div>
      </form>
    </div>


  <div>
    <h1>{{ad.brand}} {{ad.model}}, {{ad.engine_volume /1000}} l., {{ad.body_type}}</h1>
    <h5>Kaina </h5>

    <button v-if="role != null && role != 'undefined' && currUser == ad.user_id" @click="editAd(ad)" 
            class="btn btn-primary" style="float: right;">Redaguoti</button>

    <button v-if="role != null && role != 'undefined' && currUser == ad.user_id" @click="deleteAd(ad.id)" 
            class="btn btn-danger" style="float: right;">Istrinti</button>
    
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
                <td>{{ad.engine_volume}} cm<sup>3</sup>, ({{ad.engine_power}} Kw)</td>
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



        <table class="table">
          <tbody  >
            <tr v-for="eq in equipment" v-bind:key="eq.id">
              <td >{{eq.name}}</td>
            </tr>
          </tbody>
        </table>
     

    </div>
    <hr>
    <h2><b>Aprašymas</b></h2>
      <p>{{ad.description}}</p>
    <hr>
    <h2><b>Pardavėjas</b></h2>
      <h4>Vardas: <b>{{ad.user}}</b></h4>
      <h4>Tel. numeris: <b>{{ad.phone_no}}</b></h4>
    <hr>

      <div v-if="!edit">
        <div v-if="currUser != null && currUser != 'undefined'" mb-3>
          <h3>Pridėti komentarą</h3>
          <form class="form-group" @submit.prevent="addComment"> 
            <div class="form-group">
              <label for="title">Antrastė</label>
              <input type="text" class="form-control" v-model="comment.title">
            </div>
            <div class="form-group">
              <label for="comment">Komentaras</label>
              <textarea class="form-control" v-model="comment.body"></textarea>
            </div>
            
            <button type="submit" class="btn btn-primary">Issaugoti</button>
          </form>
        </div>
        <hr>
      </div>
      <div v-else>
        <div v-if="currUser != null && currUser != 'undefined'" mb-3>
          <h3>Pridėti komentarą</h3>
          <form class="form-group" @submit.prevent="addComment"> 
            <div class="form-group">
              <label for="title">Antraštė</label>
              <input type="text" class="form-control" v-model="comment.title">
            </div>
            <div class="form-group">
              <label for="comment">Komentaras</label>
              <textarea class="form-control" v-model="comment.body"></textarea>
            </div>
            
            <button type="submit" class="btn btn-primary">Issaugoti</button>
          </form>
        </div>
      </div>

      <h1>Komentarai ({{pagination.total_comments}})</h1><br>
      <div v-for="comment in comments" v-bind:key="comment.id">
        <div class=" ml-auto card card-body bg-light mb-3">
            <h3>{{comment.title}}</h3>
            <p>{{comment.body}}</p>
            <button v-if="comment.user_id == currUser" @click="editComment(comment)" class="btn btn-primary mb-2">Redaguoti</button>
            <button v-if="comment.user_id == currUser" @click="deleteComment(comment.id)" class="btn btn-danger ">Istrinti</button>
        </div>
      </div>

      <nav aria-label="page navigation example pt-3">
        <ul class="pagination">
          <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item">
            <a class="page-link" href="#" @click="fetchComments(pagination.prev_page_url)" >Previous</a>
          </li>

          <li class="page-item disabled">
            <a class="page-link text-dark" href="#">Page {{pagination.current_page}} of {{pagination.last_page}}</a>
          </li>

          <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item">
            <a class="page-link" href="#" @click="fetchComments(pagination.next_page_url)">Next</a>
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
        equipment: [],
        role: null,
        currUser: null,
        comments: [],
        bodyTypes: [],
        brands: [],
        climateControls: [],
        colors: [],
        damages: [],
        doors: [],
        drivenWheels: [],
        euroStandards: [],
        fuelTypes: [],
        gearboxes: [],
        models: [],
        steeringWheels: [],
        comment: {
          title: '',
          body: '',
        },
        ad_edit: {
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
        },
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
          user_id: '',
          user: ''
        },
        pagination: {},
        comment_id: '',
        edit: false,
        edit_ad: false
      };
    },
    created() {
      this.fetchAd();
      
    },
    methods:
    {
      checkForm:function(e) 
      {
        if(this.price && this.phone_no && this.manufacture_date && this.mileage && this.engine_power 
        && this.engine_volume && this.damage_id && this.fuel_id && this.gearbox_id && this.body_type_id 
        && this.color_id && this.steering_wheel_id && this.number_of_doors_id && this.model_id
        && this.driven_wheels_id && this.climate_control_id && this.euro_standard_id && this.brand_id )
        {
          return this.addAd();
        }
        this.errors = [];     
        e.preventDefault();
      },

      fetchAd()
      {
        let path = window.location.pathname;
        //Break the path into segments
        let segments = path.split("/");

        this.role = localStorage.getItem('role');
        this.currUser = localStorage.getItem('userid');
        this.getEquipment(segments[2]);

        fetch(`/api/ads/${segments[2]}`)
        .then(res => res.json())
        .then(res => {
          this.ad = res.data[0];
          this.equipment = res.equipment;
          this.fetchComments();
        })
        .catch(err => console.log(err));
      },

      updateAd()
      {
        const token = localStorage.getItem('token');
        let path = window.location.pathname;
        //Break the path into segments
        let segments = path.split("/");
        //update
          fetch(`/api/ads/${segments[2]}`, {
            method: 'put',
            body: JSON.stringify(this.ad_edit),
            headers: {
              'content-type': 'application/json',
              'Accept': 'application/json',
              'Authorization': 'Bearer ' + token
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
            this.edit_ad = false;
            alert('Ad updated');
            this.fetchAd();
          })
          .catch(err => console.log(err));
      },

      deleteComment(comment_id)
      {
        const token = localStorage.getItem('token');
        fetch(`/api/ads/${this.ad.id}/comments/${comment_id}`, {
            method: 'delete',
            headers: {
              'content-type': 'application/json',
              'Accept': 'application/json',
              'Authorization': 'Bearer '+ token
            }
          })
          .then(res => {
            alert('Comment removed');
            this.fetchAd();
          })
          .catch(err => console.log(err));
      },

      updateComment(comment_id)
      {
        const token = localStorage.getItem('token');
        fetch(`/api/ads/${this.ad.id}/comments/${comment_id}`, {
            method: 'put',
            headers: {
              'content-type': 'application/json',
              'Accept': 'application/json',
              'Authorization': 'Bearer '+ token
            }
          })
          .then(res => res.json())
          .then(data => {
            this.comment.title ='';
            this.comment.body ='';
            alert('Comment updated');
            this.fetchComments();
          })
          .catch(err => console.log(err));
      },
      editComment(comment)
      {
        this.edit =true;
        this.comment_id = comment.id;
        this.comment.id = comment.id;
        this.comment.title = comment.title;
        this.comment.body = comment.body;
      },

      addComment()
      {
        if(!this.edit)
        { //add
          const token = localStorage.getItem('token');
          //console.log(token);
          fetch(`/api/ads/${this.ad.id}/comments`, {
                method: 'post',
                body: JSON.stringify(this.comment),
                headers: {
                  'content-type': 'application/json',
                  'Accept': 'application/json',
                  'Authorization': 'Bearer '+ token
                }
              })
              .then(res => res.json())
              .then(data => {
                this.comment.title ='';
                this.comment.body ='';

                alert('Comment added');
                this.fetchAd();
              })
              .catch(err => console.log(err));
        }
        else  //update
        {
          const token = localStorage.getItem('token');
          fetch(`/api/ads/${this.ad.id}/comments/${this.comment_id}`, {
              method: 'put',
              body: JSON.stringify(this.comment),
              headers: {
                'content-type': 'application/json',
                'Accept': 'application/json',
                'Authorization': 'Bearer '+ token
              }
            })
            .then(res => res.json())
            .then(data => {
              this.comment.title ='';
              this.comment.body ='';
              alert('Comment updated');
              this.fetchComments();
            })
            .catch(err => console.log(err));
          }
      },

      fetchComments()
      {
        axios.get(`/api/ads/${this.ad.id}/comments`)
        .then(function (response) {
            this.comments = response.data.data;
            //console.log(response.data);
            this.makePagination(response.data);
          }.bind(this));
      },
      makePagination(res)
      {
        let pagination = {
          current_page: res.current_page,
          last_page: res.last_page,
          next_page_url: res.next_page_url,
          prev_page_url: res.prev_page_url,
          total_comments: res.total
        };
        this.pagination = pagination;
      },
      deleteAd(id)  //veikia ok
      {
        const token = localStorage.getItem('token');
        if(confirm('Ar tikrai norite pasalinti?'))
        {
            fetch(`/api/ads/${id}?token=` + token, {
              method: 'delete'
            })
            .then(res => {
              alert('Ad removed');
              window.location.href = "/ads"; 
            })
            .catch(err => console.log(err));
          }
      },
      editAd(ad)
      {
        this.edit_ad =true;
        this.ad_id = ad.id;
        this.ad_edit.id = ad.id;
        this.ad_edit.brand_id =ad.brand_id;
        this.ad_edit.model_id = ad.model_id;
        this.ad_edit.user_id = ad.user_id;
        this.getBrands();
        this.getBrandModels();
        this.ad_edit.engine_power = ad.engine_power;
        this.ad_edit.engine_volume = ad.engine_volume;
        this.ad_edit.manufacture_date = ad.manufacture_date;
        this.getDamages();
        this.ad_edit.damage_id = ad.damage_id;
        
        this.getBodyTypes(); 
        this.getClimateControls();
        this.getColors();
        this.getNumberOfDoors();
        this.getDrivenWheels();
        this.getEuroStandard();
        this.getFuelTypes();
        this.getGearboxTypes();     
        this.getSteeringWheelTypes();
        //console.log(ad);
        
        this.ad_edit.price = ad.price;
        this.ad_edit.image = ad.image;
        this.ad_edit.phone_no = ad.phone_no;
        this.ad_edit.description = ad.description;
        
        this.ad_edit.mileage = ad.mileage;

        
        this.ad_edit.fuel_id = ad.fuel_id;
        this.ad_edit.gearbox_id = ad.gearbox_id;
        this.ad_edit.body_type_id = ad.body_type_id;
        this.ad_edit.color_id = ad.color_id;
        this.ad_edit.steering_wheel_id = ad.steering_wheel_id;
        this.ad_edit.number_of_doors_id = ad.number_of_doors_id;
        this.ad_edit.driven_wheels_id = ad.driven_wheels_id;
        this.ad_edit.climate_control_id = ad.climate_control_id;
        this.ad_edit.euro_standard_id = ad.euro_standard_id;
        
        
      },
      
      onFileSelected(e)
      {
        var reader = new FileReader();
        reader.readAsDataURL(e.target.files[0]);         
        reader.onload = (e) => {
            this.ad_edit.image = e.target.result;
        }
      },
      

      getDamages()
      {
        axios.get('/api/damages')
          .then(function (response) {
            this.damages = response.data;
          }.bind(this));
      },
      getBodyTypes()
      {
        axios.get('/api/body_types')
          .then(function (response) {
            this.bodyTypes = response.data;
          }.bind(this));
      },
      getBrands()
      {
        axios.get('/api/brands')
          .then(function (response) {
            this.brands = response.data;
          }.bind(this));
      },
      getClimateControls()
      {
        axios.get('/api/climate_controls')
          .then(function (response) {
            this.climateControls = response.data;
          }.bind(this));
      },
      getColors()
      {
        axios.get('/api/colors')
          .then(function (response) {
            this.colors = response.data;
          }.bind(this));
      },
      getNumberOfDoors()
      {
        axios.get('/api/doors')
          .then(function (response) {
            this.doors = response.data;
          }.bind(this));
      },
      getDrivenWheels()
      {
        axios.get('/api/driven_wheels')
          .then(function (response) {
            this.drivenWheels = response.data;
          }.bind(this));
      },
      getEuroStandard()
      {
        axios.get('/api/euro_standard')
          .then(function (response) {
            this.euroStandards = response.data;
          }.bind(this));
      },
      getFuelTypes()
      {
        axios.get('/api/fuel_types')
          .then(function (response) {
            this.fuelTypes = response.data;
          }.bind(this));
      },
      getGearboxTypes()
      {
        axios.get('/api/gearboxes')
          .then(function (response) {
            this.gearboxes = response.data;
          }.bind(this));
      },
      getBrandModels()
      {
        axios.get('/api/models', {
          params: {
            brand_id: this.ad_edit.brand_id
          }
        })
          .then(function (response) {
            this.models = response.data;
          }.bind(this));
      },
      getSteeringWheelTypes()
      {
        axios.get('/api/steering_wheels')
          .then(function (response) {
            this.steeringWheels = response.data;
          }.bind(this));
      },
      getEquipment(id)
      {
        axios.get(`/api/equipment/${id}`)
          .then(function (response) {
            this.equipment = response.data;
          }.bind(this));
      }

    }
  };
</script>
