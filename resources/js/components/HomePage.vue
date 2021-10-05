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
    </div>  
</template>

<script>
export default {
    
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
</style>
