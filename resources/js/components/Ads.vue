<template>
  <div>
    <h2>Ads</h2>
    <div class="card card-body mb-2" v-for="ad in ads" v-bind:key="ad.id">
      <h3>{{ad.phone_no}}</h3>
      <p>{{ad.price}}</p>

      <hr>
        <button @click="deleteAd(ad.id)" class="btn btn-danger">Delete</button>
      </hr>
    </div>
    <nav aria-label="Page navigation example">
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
          phone_no: '',
          price: ''
        },
        pagination: {}
      };
    },
    created() {
      this.fetchAds();
    },

    methods:
    {
      fetchAds(page_url)
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
      deleteAd(id)
      {
        if(confirm('really??'))
        {
          fetch(`api/ads/${id}`, {
            method: 'delete'
          })
          .then(res => res.json())
          .then(data =>{
            alert('Ad removed');
            this.fetchAds(1);
          })
          .catch(err =>console.log(err));
        }
      }
    }
  };
</script>
