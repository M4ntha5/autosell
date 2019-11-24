<template>

<div>

    <div v-show="edit">
      <form  @submit="checkForm" @submit.prevent="addUser" class="mb-3">
        <div class="form-row">
            <label>Vardas</label>
            <input type="text" class="form-control" v-model="user.name" required>
        </div>
        <div class="form-row">
            <label>El. pastas</label>
            <input type="email" class="form-control" v-model="user.email" required>
        </div>
        <div class="form-group">
          <label>Salis</label>
          <select class="form-control" v-model="user.country_id" v-on:click='getCountrys()' @change='getCitys()' >
            <option value="0">Pasirinkti</option>
            <option v-for='data in countrys' :key='data.id' :value='data.id'>{{data.name}}</option>
          </select>
        </div>
        <div class="form-group">
          <label>Miestas</label>
          <select class="form-control" v-model="user.city_id" v-on:click='getCitys()'>
            <option value="0">Pasirinkti</option>
            <option v-for='data in citys' :key='data.id' :value='data.id'>{{data.name}}</option>
          </select>
        </div>
 
          <button type="submit" class="form-control">Issaugoti</button>
      </form>
    </div>


  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Vardas</th>
        <th scope="col">El. pastas</th>
        <th scope="col">Role</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody v-for="user in users" v-bind:key="user.id">
      <tr>
        <th scope="row">{{user.id}}</th>
        <td>{{user.name}}</td>
        <td>{{user.email}}</td>
        <td>{{user.role}}</td>
        <td>
          <button @click="editUser(user)" class="btn btn-primary">Redaguoti</button>
          <button @click="deleteUser(user.id)" class="btn btn-danger">Istrinti</button>
        </td>
      </tr>
    </tbody>
  </table>


  <nav aria-label="page navigation example">
    <ul class="pagination">
      <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item">
        <a class="page-link" href="#" @click="fetchUsers(pagination.prev_page_url)" >Previous</a>
      </li>

      <li class="page-item disabled">
        <a class="page-link text-dark" href="#">Page {{pagination.current_page}} of {{pagination.last_page}}</a>
      </li>

      <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item">
        <a class="page-link" href="#" @click="fetchUsers(pagination.next_page_url)">Next</a>
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
        users: [],
        countrys: [],
        citys: [],
        user: {
          name: '',
          email: '',
          country: '',
          city: '',
          role: ''
        },
        auth: {
          role: '',
          emial: ''
        },
        edit: false,
        show: false,
        user_id: '',
        pagination: {}
      };
    },
    created() {
      this.fetchUsers();
    },

    methods:
    {
      checkForm:function(e) 
      {
        if(this.user.name && this.user.email)
        {
          return this.addUser();
        }
        this.errors = [];     
        e.preventDefault();
      },
    
    
      fetchUsers(page_url)  //veikia ok
      { 
        const token = localStorage.getItem('token');
        page_url = page_url || '/api/users';
        fetch(page_url, {
          method: 'get',
          headers: {
              'content-type': 'application/json',
              'Accept': 'application/json',
              'Authorization': 'Bearer '+ token
          }
        })
        .then(res => res.json())
        .then(res => {
          this.users = res.data;
          this.makePagination(res);
        })
        .catch(err => 
          console.log(err),
        );
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

      deleteUser(id)  //veikia ok
      {
        const token = localStorage.getItem('token');
        if(confirm('Ar tikrai norite pasalinti naudotoja?'))
        {
            fetch(`api/users/${id}`, {
              method: 'delete',
              headers: {
                'content-type': 'application/json',
                'Accept': 'application/json',
                'Authorization': 'Bearer '+ token
              }
            })
            .then(res => {
              alert('Naudotojas pasalintas');
              this.fetchUsers();
            })
            .catch(err => console.log(err));
          }
        },
        addUser()
        {
          const token = localStorage.getItem('token');
          if(this.edit)
          {
            //update
            fetch(`api/users/${this.user_id}`, {
              method: 'put',
              body: JSON.stringify(this.user),
              headers: {
                'content-type': 'application/json',
                'Accept': 'application/json',
                'Authorization': 'Bearer '+ token
              }
            })
            .then(res => res.json())
            .then(data => {
              this.user.name = '';
              this.user.email = '';
              this.user.country_id = '';
              this.user.city_id = '';
              alert('user updated');
              this.show = false;
              this.edit = false;
              this.fetchUsers();
            })
            .catch(err => console.log(err));
        }
      },
      editUser(user)
      {
        this.edit =true;
        this.show =true;
        this.user_id = user.id;
        this.user.id = user.id;
        this.user.name = user.name;
        this.user.email = user.email;
        this.user.country_id = user.country;
        this.user.city_id = user.city;
        this.getCitys();
        this.getCountrys();
      },
      /*onFileSelected(e)
      {
        var reader = new FileReader();
        reader.readAsDataURL(e.target.files[0]);
        reader.onload = (e) => {
            this.ad.image = e.target.result;
        }
      },*/
      showCreate()
      {
        this.show = true;
      },
      getCountrys()
      {
        axios.get('api/countrys')
          .then(function (response) {
            this.countrys = response.data;
          }.bind(this));
      },
      getCitys()
      {
        axios.get('api/citys', {
          params: {
            country_id: this.user.country_id
          }
        })
          .then(function (response) {
            this.citys = response.data;
          }.bind(this));
      },

    }
  };
</script>
