<template>

    <form @submit="checkForm" @submit.prevent="signin">

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" v-model="email" required >
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" class="form-control" v-model="password" required>
        </div>

        <button type="submit" class="btn btn-primary" >Prisijungti</button>
    </form>

</template>

<script>

import axios from 'axios';

export default {
    data() {
        return {
            email: '',
            password: '',
            errors: []
        }
    },

    methods: {
         
        checkForm:function(e) 
        {
            //console.log(this.email);
            if(this.email && this.password)
            {
                return this.signin();
            }
            this.errors = [];     
            e.preventDefault();
        },
        signin()
        {
            axios.post('/api/auth/signin', {
                email: this.email,
                password: this.password
            },
            {headers: {'X-Requested-With': 'XMLHttpRequest'}})
            .then(
                (response) => {
                    const token = response.data.token
                    const base64Url = token.split('.')[1];
                    const base64 = base64Url.replace('-', '+').replace('_', '/');
                    JSON.parse(window.atob(base64));
                    localStorage.setItem('token', token);
                    //console.log(localStorage.getItem('token'));

                    this.getPayload();
                    var myTimerPromise = new Promise((resolve, reject) => {
                        setTimeout(() => {
                            //console.log("login-exp",localStorage.getItem('exp'));
                            resolve();
                        }, 500);
                    });
                    //this because local storage has ben accessed before getauth finished
                        //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
                    //doing wait for getAuth to finish before getting role from storage
                    this.getAuth();
                    var myTimerPromise = new Promise((resolve, reject) => {
                        setTimeout(() => {
                            //console.log("login-role", localStorage.getItem('role'));
                            resolve();
                        }, 1000);
                    });
                    var myTimerPromise = new Promise((resolve, reject) => {
                        setTimeout(() => {
                            window.location.href = "/ads";   
                            resolve();
                        }, 1000);
                    });
                    
                                   
                }
            )
            .catch(error => 
                console.log(error),
                localStorage.removeItem('token') // if the request fails, remove any possible user token if possible
            );
        },

        getPayload()
        {
            const token = localStorage.getItem('token');
            if(token != null)
            {
                fetch('api/auth/payload?token=' + token, {
                    method: 'post',
                    headers: {
                            'content-type': 'application/json',
                            'Accept': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        localStorage.setItem('exp', data.exp);
                        //console.log("payload-exp", data.exp);
                    })
                    .catch(err => console.log(err));
            }
        },
        getAuth()
        {
            const token = localStorage.getItem('token');
            if(token != null)
            {
                fetch('api/auth/me?token=' + token, {
                method: 'post',
                headers: {
                        'content-type': 'application/json',
                        'Accept': 'application/json'
                    }
                })
                .then(res => res.json())
                .then(data => {
                    localStorage.setItem('role', data.role);
                    //console.log("auth-role", data.role);
                    localStorage.setItem('userid', data.id);
                    //console.log("auth-id", data.id);
                    this.id = data.id;
                })
                .catch(err => console.log(err));
            }
        }
                  
    }
}
</script>