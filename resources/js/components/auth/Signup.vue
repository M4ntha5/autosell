<template>
    <form @submit="checkForm" @submit.prevent="signup">

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="form-control" v-model="name" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" v-model="email" required >
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" class="form-control" v-model="password" required>
        </div>

        <button type="submit" class="btn btn-primary" >Registruotis</button>
    </form>
</template>

<script>

import axios from 'axios';

export default {
    data() {
        return {
            name: '',
            email: '',
            password: ''
        }
    },
    methods: {
        checkForm:function(e) 
        {
            if(this.name && this.email && this.password  )
            {
                return this.signup();
            }
            this.errors = [];     
            e.preventDefault();
        },

        signup() {
            axios.post('/api/auth/signup', {
                name: this.name,
                email: this.email,
                password: this.password
            },
            {
                headers: {'X-Requested-With': 'XMLHttpRequest'}
            })
            .then(
                (response) => {
                    window.location.href = "/signin";
                }
            )
            .catch(
                (error) => console.log(error)
            );
        }
    }
}
</script>