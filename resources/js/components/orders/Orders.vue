<template>

<div>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <div v-show="show">
    <div v-show="!edit">
      <form class="needs-validation mb-3" @submit.prevent="addOrder" novalidate>
        <div class="form-row">
            <label for="price">Max kaina</label>
            <input type="number" class="form-control" id="price" placeholder="5000" required v-model="order.price">
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="form-row">
            <label for="phone_ne">Tel. nr.</label>
            <input type="tel" class="form-control" id="phone_ne" placeholder="860000000" required v-model="order.phone_no">
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="form-row">
            <label for="date_from">Pagaminimo data nuo</label>
            <input type="date" class="form-control" id="date_from" required v-model="order.manufacture_date_from">
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>     
        <div class="form-row">
            <label for="date_to">Pagaminimo data iki</label>
            <input type="date" class="form-control" id="date_from" required v-model="order.manufacture_date_to">
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>  
        <div class="form-row">
            <label for="mileage">Rida</label>
            <input type="number" class="form-control" id="mileage" placeholder="123456" v-model="order.mileage">
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>     
        <div class="form-row">
            <label for="engine_power">Variklio galia</label>
            <input type="number" class="form-control" id="engine_power" placeholder="200" v-model="order.engine_power">
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>   
        <div class="form-row">
            <label for="engine_volume">Variklio turis</label>
            <input type="number" class="form-control" id="engine_volume" placeholder="2.5" v-model="order.engine_volume">
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="form-row">
             <label for="damage">Zala</label>
            <input type="number" class="form-control" id="damage" required v-model="order.damage_id">
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="form-row">
            <label for="fuel">Kuro tipas</label>
            <input type="number" class="form-control" id="fuel" required v-model="order.fuel_id">
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>    
        <div class="form-row">
            <label for="gearbox">Pavaru deze</label>
            <input type="number" class="form-control" id="gearbox" required v-model="order.gearbox_id">
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        
        <div class="form-row">
            <label for="body_type">Kebulo tipas</label>
            <input type="number" class="form-control" id="body_type" required v-model="order.body_type_id">
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        
        <div class="form-row">
            <label for="color">Spalva</label>
            <input type="number" class="form-control" id="color" required v-model="order.color_id">
             <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        
        <div class="form-row">
            <label for="steering">Vairo padetis</label>
            <input type="number" class="form-control" id="steering" required v-model="order.steering_wheel_id">
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        
        <div class="form-row">
            <label for="doors">Duru skaicius</label>
            <input type="number" class="form-control" id="doors" required v-model="order.number_of_doors_id">
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>       
        <div class="form-row">
            <label for="driven_wheels">Varomieji ratai</label>
            <input type="number" class="form-control" id="driven_wheels" required v-model="order.driven_wheels_id">
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>     
        <div class="form-row">
            <label for="climate_control">Klimato valdymas</label>
            <input type="number" class="form-control" id="climate_control" required v-model="order.climate_control_id">
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>

        <div class="form-row">
            <label for="euro">Euro standartas</label>
             <input type="number" class="form-control" id="euro" v-model="order.euro_standard_id">
             <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        
        <div class="form-row">
            <label for="status">Statusas</label>
            <input type="number" class="form-control" id="status" v-model="order.euro_standard_id">
             <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        
        <div class="form-row">
            <label for="brand">Gamintojas</label>
            <input type="number" class="form-control" id="brand" required v-model="order.brand_id">
             <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        
        <div class="form-row">
            <label for="model">Modelis</label>
            <input type="number" class="form-control" id="model" required v-model="order.model_id">
             <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        
        <div class="form-row mt-3">
            <button type="submit" class="form-control">Issaugoti</button>
        </div>
         
      </form>
    </div>
    <div v-show="edit">
      <form  @submit.prevent="addOrder" class="mb-3">
        Kaina:
        <div class="form-group">
          <input type="number" class="form-control" min="0" v-model="order.price">
        </div>
        Tel. nr
        <div class="form-group">
          <input type="tel" class="form-control" v-model="order.phone_no">
        </div>
        Pagaminimo data nuo
        <div class="form-group">
          <input type="text" class="form-control" v-model="order.manufacture_date_from">
        </div>
        Pagaminimo data iki
        <div class="form-group">
          <input type="date" class="form-control" v-model="order.manufacture_date_to">
        </div>
        Rida
        <div class="form-group">
          <input type="number" class="form-control" v-model="order.mileage">
        </div>
        Variklio galia
        <div class="form-group">
          <input type="number" class="form-control" v-model="order.engine_power">
        </div>
        Variklio turis
        <div class="form-group">
          <input type="number" class="form-control" v-model="order.engine_volume">
        </div>
        Zala
        <div class="form-group">
          <input type="text" class="form-control" v-model="order.damage_id">
        </div>
        Kuro tipas
        <div class="form-group">
          <input type="text" class="form-control" v-model="order.fuel_id">
        </div>
        Pavaru deze
        <div class="form-group">
          <input type="text" class="form-control" v-model="order.gearbox_id">
        </div>
        Kebulo tipas
        <div class="form-group">
          <input type="text" class="form-control" v-model="order.body_type_id">
        </div>
        Spalva
        <div class="form-group">
          <input type="text" class="form-control" v-model="order.color_id">
        </div>
        Vairo padetis
        <div class="form-group">
          <input type="text" class="form-control" v-model="order.steering_wheel_id">
        </div>
        Duru skaicius
        <div class="form-group">
          <input type="text" class="form-control" v-model="order.number_of_doors_id">
        </div>
        Varomieji ratai
        <div class="form-group">
          <input type="text" class="form-control" v-model="order.driven_wheels_id">
        </div>
        Climato valdymas
        <div class="form-group">
          <input type="text" class="form-control" v-model="order.climate_control_id">
        </div>
        Euro standartas
        <div class="form-group">
          <input type="text" class="form-control" v-model="order.euro_standard_id">
        </div>
        Marke
        <div class="form-group">
          <input type="text" class="form-control" v-model="order.brand_id">
        </div>
        Modelis
        <div class="form-group">
          <input type="text" class="form-control" v-model="order.model_id">
        </div>
          <button type="submit" class="form-control">Issaugoti</button>
      </form>
    </div>
  </div>

  <button class="btn btn-primary float-right mb-5" @click="showCreate">Sukurti nauja</button>

    <table class="table pt-5">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Marke modelis</th>
            <th scope="col">Pagaminimo data nuo-iki</th>
            <th scope="col">Kebulo tipas</th>
            <th scope="col">Kuro tipas</th>
            <th scope="col">Pavaru deze</th>
            <th scope="col">Kliento vardas / tel. nr.</th>
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
                    <button @click="editOrder(order)" class="btn btn-primary">Redaguoti</button>
                    <button @click="deleteOrder(order.id)" class="btn btn-danger">Istrinti</button>
                </td>
            </tr>
        </tbody>
    </table>


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
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
import axios from 'axios';

  export default
  {
    data() {
      return {
        orders: [],
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
          user: ''
        },
        edit: false,
        show: false,
        order_id: '',
        pagination: {}
      };
    },
    created() {
      this.fetchOrders();
    },

    methods:
    {
      fetchOrders(page_url)  //veikia ok
      {
        const token = localStorage.getItem('token');
        let vm = this;
        page_url = page_url || '/api/orders?token=' +token;
        fetch(page_url)
        .then(res => res.json())
        .then(res => {
          this.orders = res.data;
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

      deleteOrder(id)  //veikia ok
      {
        const token = localStorage.getItem('token');
        if(confirm('Ar tikrai norite pasalinti?'))
        {
            fetch(`api/orders/${id}?token=` +token, {
              method: 'delete'
            })
            .then(res => {
              alert('Uzsakymas pasalintas');
              this.fetchAds();
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
                'Autorization': 'Bearer '+ token
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
              'Autorization': 'Bearer '+ token
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
        this.order.damage_id = adorder.damage;
        this.order.fuel_id = order.fuel;
        this.order.gearbox_id = order.gearbox;
        this.order.body_type_id = order.body_type;
        this.order.color_id = order.color;
        this.order.steering_wheel_id = order.steering_wheel;
        this.order.number_of_doors_id = order.number_of_doors;
        this.order.driven_wheels_id = order.driven_wheels;
        this.order.climate_control_id = order.climate_control;
        this.order.euro_standard_id = order.euro_standard;
        this.order.brand_id = order.brand;
        this.order.model_id = order.model;
        this.order.user_id = order.user;
      },
      showCreate()
      {
        this.show = true;
      }

    }
  };
</script>
