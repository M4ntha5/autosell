<template>

<div>
  <div v-show="show">
    <div v-show="!edit">
      <form @submit="checkForm" @submit.prevent="addOrder" enctype="multipart/form-data" class="mb-3">
        
        <div class="form-group">
          <label>Marke</label>
          <select class="form-control" v-model='order.brand_id' v-on:click='getBrands()' @change='getBrandModels()' required>
            <option value="0">Pasirinkti</option>
            <option v-for='data in brands' :key='data.id' :value='data.id'>{{data.name}}</option>
          </select>
        </div>

        <div class="form-group">
          <label>Modelis</label>
          <select class="form-control" v-model='order.model_id' v-on:click='getBrandModels()' required>
            <option value="0">Pasirinkti</option>
            <option v-for='data in models' :key='data.id' :value='data.id'>{{data.name}}</option>
          </select>
        </div>

        <div class="form-row">
            <label for="date_from">Pagaminimo data nuo</label>
            <input type="date" class="form-control" id="date_from" required v-model="order.manufacture_date_from">

        </div>     
        <div class="form-row">
            <label for="date_to">Pagaminimo data iki</label>
            <input type="date" class="form-control" id="date_from" required v-model="order.manufacture_date_to">

        </div>  
        <div class="form-row">
            <label for="mileage">Rida</label>
            <input type="number" class="form-control" id="mileage" placeholder="123456" v-model="order.mileage">
        </div>   

        <div class="form-row">
            <label for="engine_power">Variklio galia (kw)</label>
            <input type="number" class="form-control" id="engine_power" required placeholder="200" v-model="order.engine_power">
        </div>   
        <div class="form-row">
            <label for="engine_volume">Variklio turis (cm<sup>3</sup>)</label>
            <input type="number" class="form-control" id="engine_volume" required placeholder="1900" v-model="order.engine_volume">
        </div>
        <div class="form-group">
          <label>Defektai</label>
          <select class="form-control" v-model='order.damage_id' required>
            <option value="0">Pasirinkti</option>
            <option v-for='data in damages' :key='data.id' :value='data.id'>{{data.name}}</option>
          </select>
        </div>
        
        <div class="form-group">
          <label>Kuro tipas</label>
          <select class="form-control" v-model='order.fuel_id' required>
            <option value="0">Pasirinkti</option>
            <option v-for='data in fuelTypes' :key='data.id' :value='data.id'>{{data.name}}</option>
          </select>
        </div>
        
        <div class="form-group">
          <label>Pavaru deze</label>
          <select class="form-control" v-model='order.gearbox_id' required>
            <option value="0">Pasirinkti</option>
            <option v-for='data in gearboxes' :key='data.id' :value='data.id'>{{data.name}}</option>
          </select>
        </div>
        
        <div class="form-group">
          <label>Kebulo tipas</label>
          <select class="form-control" v-model='order.body_type_id' required>
            <option value="0">Pasirinkti</option>
            <option v-for='data in bodyTypes' :key='data.id' :value='data.id'>{{data.name}}</option>
          </select>
        </div>

        <div class="form-group">
          <label>Kliamto valdymas</label>
          <select class="form-control" v-model='order.climate_control_id' required>
            <option value="0">Pasirinkti</option>
            <option v-for='data in climateControls' :key='data.id' :value='data.id'>{{data.name}}</option>
          </select>
        </div>

        <div class="form-group">
          <label>Vairo padetis</label>
          <select class="form-control" v-model='order.steering_wheel_id' required>
            <option value="0">Pasirinkti</option>
            <option v-for='data in steeringWheels' :key='data.id' :value='data.id'>{{data.name}}</option>
          </select>
        </div>

        <div class="form-group">
          <label>Spalva</label>
          <select class="form-control" v-model='order.color_id' required>
            <option value="0">Pasirinkti</option>
            <option v-for='data in colors' :key='data.id' :value='data.id'>{{data.name}}</option>
          </select>
        </div>

        <div class="form-group">
          <label>Duru skaicius</label>
          <select class="form-control" v-model='order.number_of_doors_id' required>
            <option value="0">Pasirinkti</option>
            <option v-for='data in doors' :key='data.id' :value='data.id'>{{data.name}}</option>
          </select>
        </div>

        <div class="form-group">
          <label>Varomieji ratai</label>
          <select class="form-control" v-model='order.driven_wheels_id' required>
            <option value="0">Pasirinkti</option>
            <option v-for='data in drivenWheels' :key='data.id' :value='data.id'>{{data.name}}</option>
          </select>
        </div>

        <div class="form-group">
          <label>Euro standartas</label>
          <select class="form-control" v-model='order.euro_standard_id' required>
            <option value="0">Pasirinkti</option>
            <option v-for='data in euroStandards' :key='data.id' :value='data.id'>{{data.name}}</option>
          </select>
        </div>
        
        <div class="form-row">
            <label for="price">Max kaina</label>
            <input type="number" class="form-control" id="price" placeholder="5000" required v-model="order.price">
        </div>
        <div class="form-row">
            <label for="phone_ne">Tel. nr.</label>
            <input type="tel" class="form-control" id="phone_ne" placeholder="860000000" required v-model="order.phone_no">
        </div>
           
        <div class="form-row mt-3">
            <button type="submit" class="form-control">Issaugoti</button>
        </div>
         
      </form>
    </div>
    <div v-show="edit">
      <form @submit="checkForm" @submit.prevent="addOrder" enctype="multipart/form-data" class="mb-3">
         <div class="form-group">
          <label>Marke</label>
          <select class="form-control" v-model='order.brand_id' v-on:click='getBrands()' @change='getBrandModels()' required>
            <option value="0">Pasirinkti</option>
            <option v-for='data in brands' :key='data.id' :value='data.id'>{{data.name}}</option>
          </select>
        </div>

        <div class="form-group">
          <label>Modelis</label>
          <select class="form-control" v-model='order.model_id' v-on:click='getBrandModels()' required>
            <option value="0">Pasirinkti</option>
            <option v-for='data in models' :key='data.id' :value='data.id'>{{data.name}}</option>
          </select>
        </div>

        <div class="form-row">
            <label for="date_from">Pagaminimo data nuo</label>
            <input type="date" class="form-control" id="date_from" required v-model="order.manufacture_date_from">

        </div>     
        <div class="form-row">
            <label for="date_to">Pagaminimo data iki</label>
            <input type="date" class="form-control" id="date_from" required v-model="order.manufacture_date_to">

        </div>  
        <div class="form-row">
            <label for="mileage">Rida</label>
            <input type="number" class="form-control" id="mileage" placeholder="123456" v-model="order.mileage">
        </div>   

        <div class="form-row">
            <label for="engine_power">Variklio galia (kw)</label>
            <input type="number" class="form-control" id="engine_power" required placeholder="200" v-model="order.engine_power">
        </div>   
        <div class="form-row">
            <label for="engine_volume">Variklio turis (cm<sup>3</sup>)</label>
            <input type="number" class="form-control" id="engine_volume" required placeholder="1900" v-model="order.engine_volume">
        </div>
        <div class="form-group">
          <label>Defektai</label>
          <select class="form-control" v-model='order.damage_id' required>
            <option value="0">Pasirinkti</option>
            <option v-for='data in damages' :key='data.id' :value='data.id'>{{data.name}}</option>
          </select>
        </div>
        
        <div class="form-group">
          <label>Kuro tipas</label>
          <select class="form-control" v-model='order.fuel_id' required>
            <option value="0">Pasirinkti</option>
            <option v-for='data in fuelTypes' :key='data.id' :value='data.id'>{{data.name}}</option>
          </select>
        </div>
        
        <div class="form-group">
          <label>Pavaru deze</label>
          <select class="form-control" v-model='order.gearbox_id' required>
            <option value="0">Pasirinkti</option>
            <option v-for='data in gearboxes' :key='data.id' :value='data.id'>{{data.name}}</option>
          </select>
        </div>
        
        <div class="form-group">
          <label>Kebulo tipas</label>
          <select class="form-control" v-model='order.body_type_id'  required>
            <option value="0">Pasirinkti</option>
            <option v-for='data in bodyTypes' :key='data.id' :value='data.id'>{{data.name}}</option>
          </select>
        </div>

        <div class="form-group">
          <label>Kliamto valdymas</label>
          <select class="form-control" v-model='order.climate_control_id'  required>
            <option value="0">Pasirinkti</option>
            <option v-for='data in climateControls' :key='data.id' :value='data.id'>{{data.name}}</option>
          </select>
        </div>

        <div class="form-group">
          <label>Vairo padetis</label>
          <select class="form-control" v-model='order.steering_wheel_id'  required>
            <option value="0">Pasirinkti</option>
            <option v-for='data in steeringWheels' :key='data.id' :value='data.id'>{{data.name}}</option>
          </select>
        </div>

        <div class="form-group">
          <label>Spalva</label>
          <select class="form-control" v-model='order.color_id'  required>
            <option value="0">Pasirinkti</option>
            <option v-for='data in colors' :key='data.id' :value='data.id'>{{data.name}}</option>
          </select>
        </div>

        <div class="form-group">
          <label>Duru skaicius</label>
          <select class="form-control" v-model='order.number_of_doors_id' required>
            <option value="0">Pasirinkti</option>
            <option v-for='data in doors' :key='data.id' :value='data.id'>{{data.name}}</option>
          </select>
        </div>

        <div class="form-group">
          <label>Varomieji ratai</label>
          <select class="form-control" v-model='order.driven_wheels_id'  required>
            <option value="0">Pasirinkti</option>
            <option v-for='data in drivenWheels' :key='data.id' :value='data.id'>{{data.name}}</option>
          </select>
        </div>

        <div class="form-group">
          <label>Euro standartas</label>
          <select class="form-control" v-model='order.euro_standard_id'  required>
            <option value="0">Pasirinkti</option>
            <option v-for='data in euroStandards' :key='data.id' :value='data.id'>{{data.name}}</option>
          </select>
        </div>
        
        <div class="form-row">
            <label for="price">Max kaina</label>
            <input type="number" class="form-control" id="price" placeholder="5000" required v-model="order.price">
        </div>
        <div class="form-row">
            <label for="phone_ne">Tel. nr.</label>
            <input type="tel" class="form-control" id="phone_ne" placeholder="860000000" required v-model="order.phone_no">
        </div>
           
        <div class="form-row mt-3">
            <button type="submit" class="form-control">Issaugoti</button>
        </div>
      </form>
    </div>
  </div>

  <button v-if="role == 'user'" class="btn btn-primary float-right mb-5" @click="showCreate">Sukurti nauja</button>

    <table class="table pt-5">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Marke modelis</th>
            <th scope="col">Pagaminimo data nuo-iki</th>
            <th scope="col">Kebulo tipas</th>
            <th scope="col">Kuro tipas</th>
            <th scope="col">Pavaru deze</th>
            <th scope="col">Vardas / tel. nr.</th>
            <th scope="col">Statusas</th>
            <th scope="col">Funkcijos</th>
            </tr>
        </thead>
        <tbody v-for="order in orders" v-bind:key="order.id">
            <tr>
                <th scope="row">{{order.id}}</th>
                <td>{{order.brand}} {{order.model}}</td>
                <td>{{order.manufacture_date_from}} - {{order.manufacture_date_to}}</td>
                <td>{{order.body_type}}</td>
                <td>{{order.fuel}}</td>
                <td>{{order.gearbox}}</td>
                <td>{{order.user}} / {{order.phone_no}}</td>
                <td>{{order.status}}</td>
                <td>
                    <button v-if="role == 'user' && order.status_id != 7" @click="editOrder(order)" class="btn btn-primary">Redaguoti</button>
                    <button v-if="role == 'user' && order.status_id != 7" @click="deleteOrder(order)" class="btn btn-danger">Atsaukti</button>
                </td>
            </tr>
        </tbody>
    </table>


  <nav aria-label="page navigation example">
    <ul class="pagination">
      <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item">
        <a class="page-link" href="#" @click="fetchOrders(pagination.prev_page_url)" >Previous</a>
      </li>

      <li class="page-item disabled">
        <a class="page-link text-dark" href="#">Page {{pagination.current_page}} of {{pagination.last_page}}</a>
      </li>

      <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item">
        <a class="page-link" href="#" @click="fetchOrders(pagination.next_page_url)">Next</a>
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
        orders: [],
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
        order: {
          price: '',
          phone_no: '',
          manufacture_date_from: '',
          manufacture_date_to: '',
          engine_power: '',
          engine_volume: '',
          mileage: '',
          damage: '',
          status: '',
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
          user: '',
          status_id: '',
          brand_id: '',
          model_id: '',
          user_id: ''
        },
        edit: false,
        show: false,
        order_id: '',
        role: null,
        delete: false,
        pagination: {}
      };
    },
    created() {
      this.fetchOrders();
    },

    methods:
    {
      checkForm:function(e) 
      {
        if(this.price && this.phone_no && this.manufacture_date_from && this.manufacture_date_to && this.mileage 
        && this.engine_power && this.status_id 
        && this.engine_volume && this.damage_id && this.fuel_id && this.gearbox_id && this.body_type_id 
        && this.color_id && this.steering_wheel_id && this.number_of_doors_id && this.model_id
        && this.driven_wheels_id && this.climate_control_id && this.euro_standard_id && this.brand_id )
        {
          return this.addOrder();
        }
        this.errors = [];     
          e.preventDefault();
      },
      fetchOrders(page_url)  //veikia ok
      {
        const token = localStorage.getItem('token');
        const role = localStorage.getItem('role');
        this.role = role;
        page_url = page_url || '/api/myorders?token=' +token;
        fetch(page_url)
        .then(res => res.json())
        .then(res => {
          this.orders = res.data;
          this.makePagination(res);  
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

      deleteOrder(order)  //veikia ok
      {
        const token = localStorage.getItem('token');
        if(confirm('Ar tikrai norite pasalinti?'))
        {
            this.delete = true;
            this.editOrder(order);
            this.order.status_id = 7;
            console.log(this.order);
            fetch(`api/orders/${order.id}`, {
              method: 'put',
              body: JSON.stringify(this.order),
              headers: {
                'content-type': 'application/json',
                'Accept': 'application/json',
                'Authorization': 'Bearer '+ token
              }
            })
            .then(res => {
              this.order.price ='';
                this.order.phone_no = '';
                this.order.manufacture_date_from = '';
                this.order.manufacture_date_to = '';
                this.order.engine_power = '';
                this.order.engine_volume = '';
                this.order.mileage = '';
                this.order.fuel_id = '';
                this.order.fuel_id = '';
                this.order.gearbox_id = '';
                this.order.body_type_id = '';
                this.order.color_id = '';
                this.order.steering_wheel_id = '';
                this.order.number_of_doors_id = '';
                this.order.driven_wheels_id = '';
                this.order.climate_control_id = '';
                this.order.euro_standard_id = '';
                this.order.brand_id = '';
                this.order.model_id = '';
                this.order.user_id = '';
              alert('Uzsakymas atsauktas');
              this.fetchOrders();
            })
            .catch(err => console.log(err));
          }
        },
        addOrder()
        {
          const token = localStorage.getItem('token');
          if(!this.edit)
          {
            //add
            fetch('api/orders', {
              method: 'post',
              body: JSON.stringify(this.order),
              headers: {
                'content-type': 'application/json',
                'Accept': 'application/json',
                'Authorization': 'Bearer '+ token
              }
            })
            .then(res => res.json())
            .then(data => {
                this.order.price ='';
                this.order.phone_no = '';
                this.order.manufacture_date_from = '';
                this.order.manufacture_date_to = '';
                this.order.engine_power = '';
                this.order.engine_volume = '';
                this.order.mileage = '';
                this.order.fuel_id = '';
                this.order.fuel_id = '';
                this.order.gearbox_id = '';
                this.order.body_type_id = '';
                this.order.color_id = '';
                this.order.steering_wheel_id = '';
                this.order.number_of_doors_id = '';
                this.order.driven_wheels_id = '';
                this.order.climate_control_id = '';
                this.order.euro_standard_id = '';
                this.order.brand_id = '';
                this.order.model_id = '';
                this.order.user_id = '';
                alert('Order added');
                this.show = false;
                this.fetchOrders();
            })
            .catch(err => console.log(err));
        }
        else
        {
          //update
          fetch(`api/orders/${this.order_id}`, {
            method: 'put',
            body: JSON.stringify(this.order),
            headers: {
              'content-type': 'application/json',
              'Accept': 'application/json',
              'Authorization': 'Bearer '+ token
            }
          })
          .then(res => res.json())
          .then(data => {
                this.order.price ='';
                this.order.phone_no = '';
                this.order.manufacture_date_from = '';
                this.order.manufacture_date_to = '';
                this.order.engine_power = '';
                this.order.engine_volume = '';
                this.order.mileage = '';
                this.order.fuel_id = '';
                this.order.fuel_id = '';
                this.order.gearbox_id = '';
                this.order.body_type_id = '';
                this.order.color_id = '';
                this.order.steering_wheel_id = '';
                this.order.number_of_doors_id = '';
                this.order.driven_wheels_id = '';
                this.order.climate_control_id = '';
                this.order.euro_standard_id = '';
                this.order.brand_id = '';
                this.order.model_id = '';
                this.order.user_id = '';
                alert('Order updated');
                this.show = false;
                this.fetchOrders();
          })
          .catch(err => console.log(err));
        }
      },
      editOrder(order)
      {
        if(this.delete)
        {
          this.order_id = order.id;
          this.order.id = order.id;
          this.order.price = order.price;
          this.order.phone_no = order.phone_no;
          this.order.manufacture_date_from = order.manufacture_date_from;
          this.order.manufacture_date_to = order.manufacture_date_from;
          this.order.mileage = order.mileage;
          this.order.engine_power = order.engine_power;
          this.order.engine_volume = order.engine_volume;
          this.order.damage_id = order.damage_id;
          this.order.status_id = order.status_id;
          this.order.fuel_id = order.fuel_id;
          this.order.gearbox_id = order.gearbox_id;
          this.order.body_type_id = order.body_type_id;
          this.order.color_id = order.color_id;
          this.order.steering_wheel_id = order.steering_wheel_id;
          this.order.number_of_doors_id = order.number_of_doors_id;
          this.order.driven_wheels_id = order.driven_wheels_id;
          this.order.climate_control_id = order.climate_control_id;
          this.order.euro_standard_id = order.euro_standard_id;
          this.order.brand_id = order.brand_id;
          this.order.model_id = order.model_id;
          this.order.user_id = order.user_id;
        }
        else
        {
          this.edit =true;
          this.show =true;
          this.order_id = order.id;
          this.order.id = order.id;
          this.order.price = order.price;
          this.order.phone_no = order.phone_no;
          this.order.manufacture_date_from = order.manufacture_date_from;
          this.order.manufacture_date_to = order.manufacture_date_from;
          this.order.mileage = order.mileage;
          this.order.engine_power = order.engine_power;
          this.order.engine_volume = order.engine_volume;
          this.order.damage_id = order.damage_id;
          this.order.status_id = order.status_id;
          this.order.fuel_id = order.fuel_id;
          this.order.gearbox_id = order.gearbox_id;
          this.order.body_type_id = order.body_type_id;
          this.order.color_id = order.color_id;
          this.order.steering_wheel_id = order.steering_wheel_id;
          this.order.number_of_doors_id = order.number_of_doors_id;
          this.order.driven_wheels_id = order.driven_wheels_id;
          this.order.climate_control_id = order.climate_control_id;
          this.order.euro_standard_id = order.euro_standard_id;
          this.order.brand_id = order.brand_id;
          this.order.model_id = order.model_id;
          this.order.user_id = order.user_id;
          this.getDamages();
          this.getBodyTypes();
          this.getBrands();
          this.getClimateControls();
          this.getColors();
          this.getNumberOfDoors();
          this.getDrivenWheels();
          this.getEuroStandard();
          this.getFuelTypes();
          this.getGearboxTypes();
          this.getBrandModels();
          this.getSteeringWheelTypes();
        }
      },

      showCreate()
      {
        this.show = true;
        this.getDamages();
        this.getBodyTypes();
        this.getBrands();
        this.getClimateControls();
        this.getColors();
        this.getNumberOfDoors();
        this.getDrivenWheels();
        this.getEuroStandard();
        this.getFuelTypes();
        this.getGearboxTypes();
        this.getBrandModels();
        this.getSteeringWheelTypes();
      },
      getDamages()
      {
        axios.get('api/damages')
          .then(function (response) {
            this.damages = response.data;
          }.bind(this));
      },
      getBodyTypes()
      {
        axios.get('api/body_types')
          .then(function (response) {
            this.bodyTypes = response.data;
          }.bind(this));
      },
      getBrands()
      {
        axios.get('api/brands')
          .then(function (response) {
            this.brands = response.data;
          }.bind(this));
      },
      getClimateControls()
      {
        axios.get('api/climate_controls')
          .then(function (response) {
            this.climateControls = response.data;
          }.bind(this));
      },
      getColors()
      {
        axios.get('api/colors')
          .then(function (response) {
            this.colors = response.data;
          }.bind(this));
      },
      getNumberOfDoors()
      {
        axios.get('api/doors')
          .then(function (response) {
            this.doors = response.data;
          }.bind(this));
      },
      getDrivenWheels()
      {
        axios.get('api/driven_wheels')
          .then(function (response) {
            this.drivenWheels = response.data;
          }.bind(this));
      },
      getEuroStandard()
      {
        axios.get('api/euro_standard')
          .then(function (response) {
            this.euroStandards = response.data;
          }.bind(this));
      },
      getFuelTypes()
      {
        axios.get('api/fuel_types')
          .then(function (response) {
            this.fuelTypes = response.data;
          }.bind(this));
      },
      getGearboxTypes()
      {
        axios.get('api/gearboxes')
          .then(function (response) {
            this.gearboxes = response.data;
          }.bind(this));
      },
      getBrandModels()
      {
        axios.get('api/models', {
          params: {
            brand_id: this.order.brand_id
          }
        })
          .then(function (response) {
            this.models = response.data;
          }.bind(this));
      },
      getSteeringWheelTypes()
      {
        axios.get('api/steering_wheels')
          .then(function (response) {
            this.steeringWheels = response.data;
          }.bind(this));
      }

    }
  };
</script>
