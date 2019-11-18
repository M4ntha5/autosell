<template>
    <form>
        <div class="form-group">
            <label for="name">Name</label>
            <input  type="text"
                    id="name"
                    name="name"
                    class="form-control"
                    v-model="name">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input  type="email"
                    id="email"
                    name="email"
                    class="form-control"
                    v-model="email">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input  type="password"
                    id="password"
                    name="password"
                    class="form-control"
                    v-model="password">
        </div>
        <button type="submit" class="btn btn-primary" @click.prevent="signup">SignUp</button>
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
                    //console.log(response)
                    window.location.href = "/home";
                }
            )
            .catch(
                (error) => console.log(error)
            );
        }
    }
}
</script>