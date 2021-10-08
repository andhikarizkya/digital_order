<template>
    <div>
        <h1>Daftar Pesanan</h1>
        <div class="card">
            <div class="card-body">
                <div class="image-product">
                    <img :src="'/images/nasgor.jpeg'">
                </div>

                <div class="col">
                    <label for="" class="card-title">Nasi Goreng Ayam</label>
                    <label for="" class="card-price">Rp 5.000</label>
                </div>

                <div class="col quantity buttons_added">
                    <label for="jumlah_pemesanan" class="jumlah_pemesanan">Jumlah Pesanan</label>
                    <input type="button" value="-" class="minus">
                    <input type="number" step="1" min="1" max="" name="jumlah_pesan" value="1" title="Qty" class="input-text qty text" size="4" pattern="" inputmode="" id="quantity">
                    <input type="button" value="+" class="plus">
                </div>

                <div class="col">
                    <button type="submit" class="btn btn-danger mx-auto d-block" onclick="return confirm('Anda yakin akan menghapus data ?');"><i class="fa fa-trash"></i></button>
                </div>
            </div>
        </div>
    </div>
</template>

<style>
.card {
    font-family: 'Montserrat', sans-serif;
    margin: 30px 20px 30px 20px;
    background: #FFFFFF;
    border-radius: 15px;
    box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
}

.card-title {
    font-style: normal;
    font-weight: 600;
    font-size: 14px;
}

.card-price {
    font-style: normal;
    font-weight: 600;
    font-size: 14px;
}

.image-product {
    width: 100px;
    height: 100px;
    position: relative;
    overflow: hidden;
    border-radius: 10px;
}

.image-product img {
  display: inline;
  margin: 0 auto;
  margin-left: -25%;
  height: 100%;
  width: auto;
}

.riwayat {
    text-align: left;
}

hr {
    border: 1px solid;
}

.btn {
    display: flex;
    width: 20%;
    height: 55px;
    border: 1px solid;
    border-radius: 10px;
    padding: 14px 28px;
    cursor: pointer;
    float: left;
}

/* -- quantity box -- */

.quantity {
    display: inline-block; }

.quantity .input-text.qty {
    width: 35px;
    height: 39px;
    padding: 0 5px;
    text-align: center;
    background-color: transparent;
    border: 1px solid #efefef;
}

.quantity.buttons_added {
    text-align: right;
    position: relative;
    white-space: nowrap;
    vertical-align: top; }

.quantity.buttons_added input {
    display: inline-block;
    margin: 0;
    vertical-align: top;
    box-shadow: none;
}

.quantity.buttons_added label {
    float: left;
    justify-content: left;
    font-size: 16px;
    margin: 12px 0 0 0;
    vertical-align: top;
    box-shadow: none;
}

.quantity.buttons_added .minus,
.quantity.buttons_added .plus {
    padding: 7px 10px 8px;
    height: 41px;
    background-color: #ffffff;
    border: 1px solid #efefef;
    cursor:pointer;}

.quantity.buttons_added .minus {
    border-right: 0; }

.quantity.buttons_added .plus {
    border-left: 0; }

.quantity.buttons_added .minus:hover,
.quantity.buttons_added .plus:hover {
    background: #eeeeee; }

.quantity input::-webkit-outer-spin-button,
.quantity input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    -moz-appearance: none;
    margin: 0; }

.quantity.buttons_added .minus:focus,
.quantity.buttons_added .plus:focus {
    outline: none; }
</style>
