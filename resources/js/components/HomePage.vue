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
        <section>
            <p class="button-category">Semua</p>
            <div v-for="(kategories, index) in kategori" :key="index">
                <p class="button-category">{{ kategories.kategori }}</p>
            </div>
        </section>

    </div>  
</template>

<script>
export default {
    data() {
        return {
            kategori: []
        }
    },
    created() {
        let uri = `http://localhost:8000/api/kategori`;
        this.axios.get(uri).then(response => {
            this.kategori = response.data.data;
        });
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
/* box-shadow: 0px 100px 80px rgba(0, 0, 0, 0.07), 0px 41.7776px 33.4221px rgba(0, 0, 0, 0.0503198), 0px 22.3363px 17.869px rgba(0, 0, 0, 0.0417275), 0px 12.5216px 10.0172px rgba(0, 0, 0, 0.035), 0px 6.6501px 5.32008px rgba(0, 0, 0, 0.0282725), 0px 2.76726px 2.21381px rgba(0, 0, 0, 0.0196802);
border-radius: 10px; */
    }

    .button-category:hover {
        box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
        color: #4DA9FF;
    }

    section {
        width: 90%;
        margin: 20px auto;
        display: flex;
        flex-direction: row;
    }
</style>
