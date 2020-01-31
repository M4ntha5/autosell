<template>
  <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container">

        <div v-if="role != null && role != 'undefined'">
          <a class="navbar-brand" href="/home">AutoSell</a>
        </div>
        <div v-else>
          <a class="navbar-brand" href="/">AutoSell</a>
        </div>

        <button class="navbar-toggler" type="button" 
        data-toggle="collapse" data-target="#navbarSupportedContent" 
        aria-controls="navbarSupportedContent" aria-expanded="false" >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->

            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <a class="nav-link" href="/about">Apie</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/ads">Skelbimai</a>
              </li>

            </ul>

            <!-- Right Side Of Navbar -->
            <div v-if="role == 'admin'"> 
            <ul  class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                <li class="nav-item">
                  <a class="nav-link" href="/orders">Užsakymai</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/users">Naudotojai</a>
                </li>
            </ul>
            </div>
            <div v-else-if="role == 'user'">
            <ul  class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                <li class="nav-item">
                  <a class="nav-link" href="/myorders">Mano užsakymai</a>
                </li>
            </ul>
            </div>
            <div v-if="token == null">
            <ul  class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/signin">Prisijungti</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="signup">Registruotis</a>
                </li>
            </ul >
            </div>
            <div v-else> 
            <ul  class="navbar-nav ml-auto">
                <li class="nav-item">
                  <button @click="logout()" class="btn">Atsijungti</button>
                </li>
            </ul>
            </div>
        </div>
    </div>
</nav>

</template>

<script>
export default {
    data() {
      return {
        token: null,
        role: null,
        exp: null,
        id: null
      }
    },
    created() {
      this.auth();
    },

    methods: {

      logout()
      {
          const token = localStorage.getItem('token');
          axios.post('/api/auth/logout', [], {
            headers: {
                'content-type': 'application/json',
                'Accept': 'application/json',
                'Authorization': 'Bearer '+ token
              }
          })
          .then(
                (response) => {
                    localStorage.removeItem('token');
                    localStorage.removeItem('role');
                    localStorage.removeItem('tokenExp');
                    localStorage.removeItem('userid');
                    this.token = null;
                    this.role = null;
                    this.exp = null;
                    this.id = null;
                    window.location.href = "/signin";
                }
          )             
      },

      auth()
      {
        const token = localStorage.getItem('token');
        if(token !== null && token !== 'undefined')
        {          
            var currentTime = Date.now() / 1000;            

            const role = localStorage.getItem('role');
            const tokenExp = localStorage.getItem('exp');

            if(currentTime > tokenExp)
            {
              //console.log("token expired");
              localStorage.removeItem('token');
              localStorage.removeItem('exp');
              localStorage.removeItem('role');
              localStorage.removeItem('userid');

              this.token = null;
              this.role = null;
              this.exp = null;
              this.id = null;
              window.location.href = "/signin";
            }
            else
            {
              this.exp = tokenExp;
              //console.log("token not expired");
              if(role == 'admin')
              {
                //console.log("ifadmin");
                this.token = token;
                this.role = role;

              }
              else if(role == 'user')
              {
                //console.log("if user");
                this.token = token;
                this.role = role;
              }
            }
        }
        else
        {
          this.token = null;
          this.role = null;
          this.exp = null;
          this.id = null;
          localStorage.removeItem('token');
          localStorage.removeItem('exp');
          localStorage.removeItem('role');
          localStorage.removeItem('userid');
          //console.log("tokenas nullas", token);
        
        }
      }/*,
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
                  this.exp = data.exp;
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
                localStorage.setItem('userid', data.id);
                this.role = data.role;
                this.id = data.id;
            })
            .catch(err => console.log(err));
          }
      }*/ 
    }
}
</script>