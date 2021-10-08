<template>
    <div class="kontainer">
        <div class="box">
            <div class="box2">
                <div class="searchh">
                    <div class="has-search">
                        <span class="fa fa-search form-control-feedback"></span>
                        <input type="text" class="form-control search" placeholder="Search">
                    </div>
                </div>
                <div class="filterr">
                    <div class="has-search">
                        <span class="fa fa-filter form-control-feedback"></span>
                        <input type="text" class="form-control filter" placeholder="Filter">
                    </div>
                </div>
            </div>
        </div> 
        <section >
            <!-- <div class="button-category">
                <div class="text-button">Semua</div>            
            </div>
            
            <div class="button-category" v-for="(kategories, index) in kategori" :key="index">
                <div class="text-button">{{ kategories.kategori }}</div>
            </div> -->
            <div class="section-kategori">
                <button class="button-category" @click="setFilter(0)">Semua</button>
                <div v-for="(kategories, index) in kategori" :key="index">
                    <button class="button-category" @click="setFilter(kategories.id)">{{ kategories.kategori }}</button>
                </div>
            </div> 
        </section>
        <section>
            <div v-for="menus in menu" :key="menus.id">
                <div v-if="currentFilter === 0 || currentFilter === menus.kategori_id" :key="menus.id">
                    <div class="section-filter">
                        <div class="row">
                            <div class="col-4 col-md-4 col-sm-4">
                                lalalal
                            </div>
                            <div class="col-8 col-md-8 col-sm-8">
                                <div class="card-menu">
                                    <div class="cont">
                                        <div class="card-nama">{{ menus.nama }}</div>
                                        <i class="fa fa-thumbs-up rights" aria-hidden="true"></i>
                                    </div>
                                    <div class="cont">
                                        <div class="card-harga">Rp {{ menus.harga }}</div>
                                    </div>
                                    <div class="cont">
                                        <div class="btn-right">
                                            <button class="button-tambah">+</button>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <!-- <h6>{{ filter.nama }}</h6> -->
                </div>
            </div>
        </section>

    </div>  
</template>

<script>
export default {
    data() {
        return {
            kategori: [],
            menu: [],
            currentFilter: 0
        }
    },
    created() {
        let uri = `http://localhost:8000/api/kategori`;
        let url = `http://localhost:8000/api/menu`;

        this.axios.get(uri).then(response => {
            this.kategori = response.data.data;
        });
        this.axios.get(url).then(response => {
            this.menu = response.data.data;
        });
    },
    methods: {
        setFilter: function(filter) {
    	    this.currentFilter = filter;
        }
    }
} 
</script>

<style>
    .kontainer {
        margin: 0 auto;
    }

    .kontainer h2 {
        font-family: 'Montserrat', sans-serif;
        font-weight: 700;
        font-size: 24px;
        margin-bottom: 0;
    }

    .kontainer p {
        font-family: 'Montserrat', sans-serif;
        font-weight: 300;
        font-size: 16px;
    }

    .box {
        background-color: rgba(77, 169, 255);
        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
    }

    .box2 {
        width: 90%;
        margin: 0 auto;
        display: flex;
        flex-direction: row;
    }

    .has-search {
        padding: 0 0 10px 0;
    }

    .has-search input::-webkit-input-placeholder {
        font-family: 'Montserrat', sans-serif;
        font-weight: 400;
        font-size: 12px;
        line-height: 3;
    }

    .has-search .form-control {
        padding-left: 2rem;
        border: 0 solid transparent;
        border-radius: 10px;
    }

    .has-search .form-control-feedback {
        position: absolute;
        z-index: 2;
        display: block;
        width: 2.375rem;
        height: 2.375rem;
        line-height: 2.375rem;
        text-align: center;
        pointer-events: none;
        color: #aaa;
    }

    .searchh {
        width: 78%;
        margin-right: 10px;
    }

    .filterr {
        width: 22%;
    }

    .button-category {
        border: 0 solid black;
        padding: 5px 10px;
        background: #FFFDFD;
        margin-right: 10px;
        border-radius: 10px;
        font-family: Montserrat;
        font-style: normal;
        font-weight: 300;
        font-size: 14px;
        color: #000000;
/* box-shadow: 0px 100px 80px rgba(0, 0, 0, 0.07), 0px 41.7776px 33.4221px rgba(0, 0, 0, 0.0503198), 0px 22.3363px 17.869px rgba(0, 0, 0, 0.0417275), 0px 12.5216px 10.0172px rgba(0, 0, 0, 0.035), 0px 6.6501px 5.32008px rgba(0, 0, 0, 0.0282725), 0px 2.76726px 2.21381px rgba(0, 0, 0, 0.0196802);
border-radius: 10px; */
    }

    .button-category:hover {
        box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
        color: #4DA9FF;
        font-weight: 600;
    }

    .section-kategori {
        width: 90%;
        margin: 20px auto;
        display: flex;
        flex-direction: row;
    }

    .section-filter {
        width: 90%;
        margin: 20px auto;
        display: flex;
        flex-direction: column;
    }

    .cont {
        width: 100%;
        display: flex;
        flex-direction: row;
        position: relative;
    }

    .card-menu {
        background: #FFFEFE;
        box-shadow: 1px 1px 5px 1px rgba(0, 0, 0, 0.1);
        border-radius: 15px;
        padding: 10px 16px;
    }

    .card-nama {
        font-family: 'Montserrat';
        font-style: normal;
        font-weight: 600;
        font-size: 14px;
        line-height: 17px;
        color: #000000;
        width: fit-content;
    }

    .card-harga {
        font-family: 'Montserrat';
        font-style: normal;
        font-weight: normal;
        font-size: 12px;
        line-height: 18px;
        margin-top: 5px;
    }

    .rights {
        position: absolute;
        top: 0px;
        right: 0px;
        color: #F7CC74;
    }

    .button-tambah {
        border: 1px solid #E2E2E2;
        border-radius: 50%;
        width: 18px;
        height: 18px;
        padding: 0;
        font-size: 20px;
        line-height:0;
        float: right;
        color: #53B175;
        background-color: #ffffff;
    }

    .btn-right {
        width: 100%;
        text-align: right;
    }
</style>
